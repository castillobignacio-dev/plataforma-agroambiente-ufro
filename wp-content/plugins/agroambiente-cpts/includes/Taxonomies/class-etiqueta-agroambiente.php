<?php
/**
 * Taxonomía "Etiqueta" (no jerárquica, tipo tag), compartida por los 4 CPTs.
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\Taxonomies;

defined( 'ABSPATH' ) || exit;

class Etiqueta_Agroambiente {

	const TAXONOMY = 'etiqueta-agroambiente';

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
				'hierarchical'      => false,
				'public'            => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'show_in_rest'      => true,
				'show_tagcloud'     => true,
				'rest_base'         => 'etiquetas-agroambiente',
				'query_var'         => true,
				'rewrite'           => [
					'slug'       => 'etiqueta',
					'with_front' => false,
				],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'                       => __( 'Etiquetas', 'agroambiente-cpts' ),
			'singular_name'              => __( 'Etiqueta', 'agroambiente-cpts' ),
			'search_items'               => __( 'Buscar etiquetas', 'agroambiente-cpts' ),
			'all_items'                  => __( 'Todas las etiquetas', 'agroambiente-cpts' ),
			'edit_item'                  => __( 'Editar etiqueta', 'agroambiente-cpts' ),
			'update_item'                => __( 'Actualizar etiqueta', 'agroambiente-cpts' ),
			'add_new_item'               => __( 'Añadir nueva etiqueta', 'agroambiente-cpts' ),
			'new_item_name'              => __( 'Nombre de la nueva etiqueta', 'agroambiente-cpts' ),
			'separate_items_with_commas' => __( 'Separar etiquetas con comas', 'agroambiente-cpts' ),
			'choose_from_most_used'      => __( 'Elegir entre las etiquetas más usadas', 'agroambiente-cpts' ),
			'menu_name'                  => __( 'Etiquetas', 'agroambiente-cpts' ),
			'not_found'                  => __( 'No se encontraron etiquetas', 'agroambiente-cpts' ),
		];
	}
}
