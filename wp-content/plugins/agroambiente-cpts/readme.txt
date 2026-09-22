=== Agroambiente CPTs ===
Contributors: plataforma-agroambiente-ufro
Tags: custom-post-type, acf, divi, agroambiente
Requires at least: 6.4
Tested up to: 6.6
Requires PHP: 8.0
Stable tag: 0.1.0
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Registra los tipos de contenido, taxonomías y grupos de campos ACF de la Plataforma Agroambiente UFRO. No incluye diseño ni maquetación (se trabaja con Divi Builder por separado).

== Description ==

Este plugin registra 4 Custom Post Types:

* **Manual técnico** (`manual-tecnico`)
* **Guía de campo** (`guia-campo`)
* **Artículo divulgativo** (`articulo-divulgativo`)
* **Recurso multimedia** (`recurso-multimedia`)

Cada uno con sus taxonomías (`area-tematica` y `etiqueta-agroambiente` compartidas; `nivel-educativo`, `region-geografica` y `tipo-recurso` específicas), y sus grupos de campos ACF definidos como JSON en `acf-json/` (ACF Local JSON), lo que permite versionarlos en git y sincronizarlos entre entornos sin depender de la base de datos.

Todos los CPTs tienen `show_in_rest` activo para ser compatibles con Divi Builder y con Gutenberg/REST API.

**Dependencia:** requiere el plugin Advanced Custom Fields (o ACF PRO) activo para que los campos definidos en `acf-json/` se muestren en el editor. El plugin funciona sin ACF, pero los campos personalizados no tendrán interfaz.

**Nota sobre el spec:** las taxonomías y campos ACF de esta versión son una propuesta inicial razonable (no se recibió el documento de especificación al momento de generar este scaffolding). Ver el README del repositorio para el detalle de los supuestos usados y ajustarlos a la especificación real del proyecto.

== Estructura ==

`
agroambiente-cpts.php          Archivo principal (headers, autoload, activación)
includes/class-plugin.php      Bootstrap (hooks de registro)
includes/class-activator.php   Activación/desactivación (flush_rewrite_rules)
includes/class-acf-json.php    Sincronización de acf-json/
includes/PostTypes/            Un archivo por CPT
includes/Taxonomies/           Un archivo por taxonomía
acf-json/                      Grupos de campos ACF (Local JSON)
`

== Changelog ==

= 0.1.0 =
* Scaffolding inicial: 4 CPTs, 5 taxonomías y 4 grupos de campos ACF.
