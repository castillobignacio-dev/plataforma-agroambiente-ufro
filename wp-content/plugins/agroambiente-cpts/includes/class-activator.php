<?php
/**
 * Rutinas de activación/desactivación del plugin.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts;

defined( 'ABSPATH' ) || exit;

use Agroambiente\Cpts\PostTypes\Manual_Tecnico;
use Agroambiente\Cpts\PostTypes\Guia_Campo;
use Agroambiente\Cpts\PostTypes\Articulo_Divulgativo;
use Agroambiente\Cpts\PostTypes\Recurso_Multimedia;
use Agroambiente\Cpts\Taxonomies\Area_Tematica;
use Agroambiente\Cpts\Taxonomies\Etiqueta_Agroambiente;
use Agroambiente\Cpts\Taxonomies\Nivel_Educativo;
use Agroambiente\Cpts\Taxonomies\Region_Geografica;
use Agroambiente\Cpts\Taxonomies\Tipo_Recurso;

class Activator {

	/**
	 * Registra taxonomías y CPTs antes de vaciar las reglas de reescritura,
	 * para que los slugs queden operativos desde la primera visita.
	 */
	public static function activate(): void {
		Area_Tematica::register();
		Etiqueta_Agroambiente::register();
		Nivel_Educativo::register();
		Region_Geografica::register();
		Tipo_Recurso::register();

		Manual_Tecnico::register();
		Guia_Campo::register();
		Articulo_Divulgativo::register();
		Recurso_Multimedia::register();

		flush_rewrite_rules();
	}

	public static function deactivate(): void {
		flush_rewrite_rules();
	}
}
