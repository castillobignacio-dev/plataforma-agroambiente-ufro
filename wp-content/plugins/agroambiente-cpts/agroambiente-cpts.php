<?php
/**
 * Plugin Name:       Agroambiente CPTs
 * Plugin URI:        https://github.com/castillobignacio-dev/plataforma-agroambiente-ufro
 * Description:       Registra los tipos de contenido (Manual técnico, Guía de campo, Artículo divulgativo, Recurso multimedia), sus taxonomías y expone los grupos de campos ACF (acf-json) para la Plataforma Agroambiente UFRO. No interviene en diseño/maquetación (Divi).
 * Version:           0.1.0
 * Requires at least: 6.4
 * Requires PHP:      8.0
 * Author:            Plataforma Agroambiente UFRO
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       agroambiente-cpts
 * Domain Path:       /languages
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts;

defined( 'ABSPATH' ) || exit;

define( 'AGROAMBIENTE_CPTS_VERSION', '0.1.0' );
define( 'AGROAMBIENTE_CPTS_FILE', __FILE__ );
define( 'AGROAMBIENTE_CPTS_DIR', plugin_dir_path( __FILE__ ) );
define( 'AGROAMBIENTE_CPTS_URL', plugin_dir_url( __FILE__ ) );

/**
 * Autoloader ligero (sin Composer) para el namespace Agroambiente\Cpts.
 *
 * Convención: Agroambiente\Cpts\PostTypes\Manual_Tecnico
 *          -> includes/posttypes/class-manual-tecnico.php
 */
spl_autoload_register(
	function ( string $class ): void {
		$prefix = __NAMESPACE__ . '\\';

		if ( 0 !== strpos( $class, $prefix ) ) {
			return;
		}

		$relative   = substr( $class, strlen( $prefix ) );
		$parts      = explode( '\\', $relative );
		$class_name = array_pop( $parts );
		$file_name  = 'class-' . strtolower( str_replace( '_', '-', $class_name ) ) . '.php';
		$sub_dir    = implode( '/', array_map( 'strtolower', $parts ) );

		$path = AGROAMBIENTE_CPTS_DIR . 'includes/' . ( $sub_dir ? $sub_dir . '/' : '' ) . $file_name;

		if ( file_exists( $path ) ) {
			require_once $path;
		}
	}
);

register_activation_hook( __FILE__, [ Activator::class, 'activate' ] );
register_deactivation_hook( __FILE__, [ Activator::class, 'deactivate' ] );

add_action(
	'plugins_loaded',
	static function (): void {
		load_plugin_textdomain( 'agroambiente-cpts', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
		Plugin::instance();
	}
);
