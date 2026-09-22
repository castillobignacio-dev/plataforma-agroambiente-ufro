<?php
/**
 * Taxonomía "Tipo de recurso" (jerárquica), específica de Recurso multimedia.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\Taxonomies;

defined( 'ABSPATH' ) || exit;

class Tipo_Recurso {

	const TAXONOMY = 'tipo-recurso';

	const POST_TYPES = [ 'recurso-multimedia' ];

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
				'rest_base'         => 'tipos-de-recurso',
				'query_var'         => true,
				'rewrite'           => [
					'slug'       => 'tipo-de-recurso',
					'with_front' => false,
				],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'              => __( 'Tipos de recurso', 'agroambiente-cpts' ),
			'singular_name'     => __( 'Tipo de recurso', 'agroambiente-cpts' ),
			'search_items'      => __( 'Buscar tipos de recurso', 'agroambiente-cpts' ),
			'all_items'         => __( 'Todos los tipos de recurso', 'agroambiente-cpts' ),
			'parent_item'       => __( 'Tipo de recurso padre', 'agroambiente-cpts' ),
			'parent_item_colon' => __( 'Tipo de recurso padre:', 'agroambiente-cpts' ),
			'edit_item'         => __( 'Editar tipo de recurso', 'agroambiente-cpts' ),
			'update_item'       => __( 'Actualizar tipo de recurso', 'agroambiente-cpts' ),
			'add_new_item'      => __( 'Añadir nuevo tipo de recurso', 'agroambiente-cpts' ),
			'new_item_name'     => __( 'Nombre del nuevo tipo de recurso', 'agroambiente-cpts' ),
			'menu_name'         => __( 'Tipos de recurso', 'agroambiente-cpts' ),
			'not_found'         => __( 'No se encontraron tipos de recurso', 'agroambiente-cpts' ),
		];
	}
}
