# Plataforma Agroambiente UFRO

Sitio WordPress + Divi para la Plataforma Agroambiente UFRO. Este repositorio versiona el **entorno de desarrollo local** (`wp-env`) y el **plugin propio `agroambiente-cpts`**, que registra los Custom Post Types (CPTs), taxonomías y campos ACF del proyecto. El diseño y la maquetación se trabajan aparte, en Divi Builder.

> ⚠️ **Nota sobre el spec de contenidos:** al generar este scaffolding no se recibió el documento de especificación de campos/taxonomías, así que las taxonomías y los grupos ACF de `acf-json/` son una propuesta inicial razonable, documentada más abajo. Ajústalas (o pídeme que las ajuste) según la especificación real antes de dar por cerrado el modelo de datos.

## Requisitos previos

- [Docker](https://www.docker.com/products/docker-desktop/) (Desktop o Engine) corriendo.
- [Node.js](https://nodejs.org/) ≥ 18 y npm.
- Licencia de **Divi** y de **ACF PRO** (ambos se instalan manualmente, no se versionan en este repo — ver más abajo).

Este proyecto usa [`@wordpress/env` (wp-env)](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/), la herramienta oficial de WordPress para levantar un entorno local con Docker (WordPress + MySQL + PHP 8.2), sin necesidad de tener el core de WordPress descargado en el repositorio.

## Puesta en marcha

```bash
# 1. Instalar dependencias (wp-env)
npm install

# 2. Levantar el entorno (crea los contenedores la primera vez)
npm run start
```

Al terminar, wp-env deja disponibles:

- Sitio: http://localhost:8888
- Admin: http://localhost:8888/wp-admin (usuario `admin`, contraseña `password`)
- Entorno de tests: http://localhost:8889

Otros comandos útiles:

```bash
npm run stop      # detener los contenedores
npm run destroy   # eliminar contenedores y volúmenes (borra la BD local)
npm run cli       # ejecutar WP-CLI dentro del contenedor, ej: npm run cli -- plugin list
npm run logs      # ver logs del entorno
```

El plugin `agroambiente-cpts` (`wp-content/plugins/agroambiente-cpts/`) se monta automáticamente vía `.wp-env.json`, pero **actívalo manualmente** desde `wp-admin → Plugins` (o con `npm run cli -- plugin activate agroambiente-cpts`).

## Instalar Divi y ACF PRO (manual, no versionado)

Ambos son plugins/temas con licencia y están excluidos de git (ver `.gitignore`). Con el entorno levantado:

1. `wp-admin → Apariencia → Temas → Subir tema` y sube el `.zip` de Divi.
2. `wp-admin → Plugins → Añadir nuevo → Subir plugin` y sube el `.zip` de ACF PRO (o el ACF gratuito, si aún no compras PRO).
3. Activa ambos.

También puedes copiar las carpetas descomprimidas directamente en `wp-content/themes/Divi` y `wp-content/plugins/advanced-custom-fields-pro` — quedarán ignoradas por git automáticamente.

## Plugin `agroambiente-cpts`

Estructura (namespace `Agroambiente\Cpts`, sin dependencia de Composer):

```
wp-content/plugins/agroambiente-cpts/
├── agroambiente-cpts.php          Header del plugin, autoloader, activación
├── includes/
│   ├── class-plugin.php           Bootstrap: registra taxonomías y CPTs en `init`
│   ├── class-activator.php        register_activation_hook / flush_rewrite_rules
│   ├── class-acf-json.php         Apunta la carga/guardado de ACF a acf-json/
│   ├── PostTypes/                 Un archivo por CPT
│   └── Taxonomies/                Un archivo por taxonomía
├── acf-json/                      Grupos de campos ACF (Local JSON, versionado en git)
└── readme.txt
```

### CPTs registrados

| CPT | Slug | rest_base |
|---|---|---|
| Manual técnico | `manual-tecnico` | `manuales-tecnicos` |
| Guía de campo | `guia-campo` | `guias-de-campo` |
| Artículo divulgativo | `articulo-divulgativo` | `articulos-divulgativos` |
| Recurso multimedia | `recurso-multimedia` | `recursos-multimedia` |

Todos con `show_in_rest => true` (necesario para Divi Builder / Gutenberg) y `supports => title, editor, excerpt, thumbnail, custom-fields, revisions, author`.

### Taxonomías

| Taxonomía | Slug | Tipo | CPTs |
|---|---|---|---|
| Área temática | `area-tematica` | Jerárquica | Los 4 CPTs |
| Etiqueta | `etiqueta-agroambiente` | No jerárquica | Los 4 CPTs |
| Nivel educativo | `nivel-educativo` | Jerárquica | Manual técnico |
| Región | `region-geografica` | Jerárquica | Guía de campo |
| Tipo de recurso | `tipo-recurso` | Jerárquica | Recurso multimedia |

### Campos ACF (`acf-json/`)

Grupos de campos con Local JSON (se sincronizan automáticamente al activar ACF; también quedan disponibles para exportar/editar desde `wp-admin → Custom Fields`):

- **Manual técnico** (`group_manual_tecnico.json`): autores, institución, año de publicación, idioma, resumen, archivo PDF.
- **Guía de campo** (`group_guia_campo.json`): autores, especies relacionadas, temporada, ubicación de referencia (mapa), archivo PDF.
- **Artículo divulgativo** (`group_articulo_divulgativo.json`): autor, fecha de publicación, fuente/medio original, tiempo de lectura estimado.
- **Recurso multimedia** (`group_recurso_multimedia.json`): origen (archivo subido / enlace externo), archivo, enlace externo, duración, créditos.

El campo de tipo `google_map` (Guía de campo) requiere configurar una API key de Google Maps (filtro `acf/fields/google_map/api`) para mostrar el mapa en el admin; sin la key el campo sigue guardando lat/lng normalmente.

Estos grupos son un punto de partida — agrega, quita o renombra campos según el spec real editando los `.json` en `acf-json/` (o desde el admin de ACF, que reescribe el JSON automáticamente gracias a `class-acf-json.php`).

## Control de versiones

`.gitignore` excluye el core de WordPress, `wp-config.php`, `/wp-content/uploads/`, y todos los plugins/temas de terceros (incluyendo Divi y ACF PRO por ser de licencia), dejando sólo versionado el plugin `agroambiente-cpts`.
