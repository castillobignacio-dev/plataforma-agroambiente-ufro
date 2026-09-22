<?php
/**
 * Taxonomía "Área temática" (jerárquica), compartida por los 4 CPTs.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\Taxonomies;

defined( 'ABSPATH' ) || exit;

class Area_Tematica {

	const TAXONOMY = 'area-tematica';

	const POST_TYPES = [
		'manual-tecnico',
		'guia-campo',
		'articulo-divulgativo',
		'recurso-multimedia',
	];

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
				'rest_base'         => 'areas-tematicas',
				'query_var'         => true,
				'rewrite'           => [
					'slug'       => 'area-tematica',
					'with_front' => false,
				],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'              => __( 'Áreas temáticas', 'agroambiente-cpts' ),
			'singular_name'     => __( 'Área temática', 'agroambiente-cpts' ),
			'search_items'      => __( 'Buscar áreas temáticas', 'agroambiente-cpts' ),
			'all_items'         => __( 'Todas las áreas temáticas', 'agroambiente-cpts' ),
			'parent_item'       => __( 'Área temática padre', 'agroambiente-cpts' ),
			'parent_item_colon' => __( 'Área temática padre:', 'agroambiente-cpts' ),
			'edit_item'         => __( 'Editar área temática', 'agroambiente-cpts' ),
			'update_item'       => __( 'Actualizar área temática', 'agroambiente-cpts' ),
			'add_new_item'      => __( 'Añadir nueva área temática', 'agroambiente-cpts' ),
			'new_item_name'     => __( 'Nombre de la nueva área temática', 'agroambiente-cpts' ),
			'menu_name'         => __( 'Áreas temáticas', 'agroambiente-cpts' ),
			'not_found'         => __( 'No se encontraron áreas temáticas', 'agroambiente-cpts' ),
		];
	}
}
