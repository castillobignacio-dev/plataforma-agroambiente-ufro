<?php
/**
 * Sincroniza los grupos de campos ACF con la carpeta acf-json/ del plugin,
 * para que los grupos definidos aquí viajen con el código (versionados en git)
 * en lugar de depender solo de la base de datos.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts;

defined( 'ABSPATH' ) || exit;

class Acf_Json {

	public static function register(): void {
		add_filter( 'acf/settings/save_json', [ self::class, 'save_point' ] );
		add_filter( 'acf/settings/load_json', [ self::class, 'load_point' ] );
	}

	/**
	 * Los grupos creados/editados desde el admin (con ACF PRO activo)
	 * se guardan directamente en la carpeta del plugin.
	 */
	public static function save_point( string $path ): string {
		return AGROAMBIENTE_CPTS_DIR . 'acf-json';
	}

	/**
	 * Además de las rutas por defecto de ACF, cargamos los JSON del plugin.
	 *
	 * @param array<int,string> $paths
	 * @return array<int,string>
	 */
	public static function load_point( array $paths ): array {
		$paths[] = AGROAMBIENTE_CPTS_DIR . 'acf-json';

		return $paths;
	}
}
