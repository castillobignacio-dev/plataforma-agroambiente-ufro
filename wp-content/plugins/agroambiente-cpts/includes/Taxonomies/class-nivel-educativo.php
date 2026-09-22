<?php
/**
 * Taxonomía "Nivel educativo" (jerárquica), específica de Manual técnico.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\Taxonomies;

defined( 'ABSPATH' ) || exit;

class Nivel_Educativo {

	const TAXONOMY = 'nivel-educativo';

	const POST_TYPES = [ 'manual-tecnico' ];

	public static function register(): void {
		register_taxonomy(
			self::TAXONOMY,
			self::POST_TYPES,
			[
				'labels'            => self::labels(),
				'hierarchical'      => true,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
				'rest_base'         => 'niveles-educativos',
				'query_var'         => true,
				'rewrite'           => [
					'slug'       => 'nivel-educativo',
					'with_front' => false,
				],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'              => __( 'Niveles educativos', 'agroambiente-cpts' ),
			'singular_name'     => __( 'Nivel educativo', 'agroambiente-cpts' ),
			'search_items'      => __( 'Buscar niveles educativos', 'agroambiente-cpts' ),
			'all_items'         => __( 'Todos los niveles educativos', 'agroambiente-cpts' ),
			'parent_item'       => __( 'Nivel educativo padre', 'agroambiente-cpts' ),
			'parent_item_colon' => __( 'Nivel educativo padre:', 'agroambiente-cpts' ),
			'edit_item'         => __( 'Editar nivel educativo', 'agroambiente-cpts' ),
			'update_item'       => __( 'Actualizar nivel educativo', 'agroambiente-cpts' ),
			'add_new_item'      => __( 'Añadir nuevo nivel educativo', 'agroambiente-cpts' ),
			'new_item_name'     => __( 'Nombre del nuevo nivel educativo', 'agroambiente-cpts' ),
			'menu_name'         => __( 'Niveles educativos', 'agroambiente-cpts' ),
			'not_found'         => __( 'No se encontraron niveles educativos', 'agroambiente-cpts' ),
		];
	}
}
