<?php
/**
 * Bootstrap del plugin: registra taxonomías, CPTs y la sincronización ACF JSON.
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

final class Plugin {

	private static ?Plugin $instance = null;

	public static function instance(): Plugin {
		if ( null === self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	private function __construct() {
		$this->init_hooks();
	}

	private function init_hooks(): void {
		// Prioridad 0 para que las taxonomías existan antes de asociarlas a los CPTs.
		add_action( 'init', [ $this, 'register_taxonomies' ], 0 );
		add_action( 'init', [ $this, 'register_post_types' ], 5 );

		Acf_Json::register();
	}

	public function register_taxonomies(): void {
		Area_Tematica::register();
		Etiqueta_Agroambiente::register();
		Nivel_Educativo::register();
		Region_Geografica::register();
		Tipo_Recurso::register();
	}

	public function register_post_types(): void {
		Manual_Tecnico::register();
		Guia_Campo::register();
		Articulo_Divulgativo::register();
		Recurso_Multimedia::register();
	}
}
