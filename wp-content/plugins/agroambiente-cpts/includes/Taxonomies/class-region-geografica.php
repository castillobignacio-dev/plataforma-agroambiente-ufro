<?php
/**
 * Taxonomía "Región" (jerárquica), específica de Guía de campo.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\Taxonomies;

defined( 'ABSPATH' ) || exit;

class Region_Geografica {

	const TAXONOMY = 'region-geografica';

	const POST_TYPES = [ 'guia-campo' ];

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
				'rest_base'         => 'regiones',
				'query_var'         => true,
				'rewrite'           => [
					'slug'       => 'region',
					'with_front' => false,
				],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'              => __( 'Regiones', 'agroambiente-cpts' ),
			'singular_name'     => __( 'Región', 'agroambiente-cpts' ),
			'search_items'      => __( 'Buscar regiones', 'agroambiente-cpts' ),
			'all_items'         => __( 'Todas las regiones', 'agroambiente-cpts' ),
			'parent_item'       => __( 'Región padre', 'agroambiente-cpts' ),
			'parent_item_colon' => __( 'Región padre:', 'agroambiente-cpts' ),
			'edit_item'         => __( 'Editar región', 'agroambiente-cpts' ),
			'update_item'       => __( 'Actualizar región', 'agroambiente-cpts' ),
			'add_new_item'      => __( 'Añadir nueva región', 'agroambiente-cpts' ),
			'new_item_name'     => __( 'Nombre de la nueva región', 'agroambiente-cpts' ),
			'menu_name'         => __( 'Regiones', 'agroambiente-cpts' ),
			'not_found'         => __( 'No se encontraron regiones', 'agroambiente-cpts' ),
		];
	}
}
