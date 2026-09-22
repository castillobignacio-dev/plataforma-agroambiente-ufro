<?php
/**
 * CPT "Guía de campo" (guia-campo).
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\PostTypes;

defined( 'ABSPATH' ) || exit;

class Guia_Campo {

	const POST_TYPE = 'guia-campo';

	public static function register(): void {
		register_post_type(
			self::POST_TYPE,
			[
				'labels'             => self::labels(),
				'description'        => __( 'Guías de campo para identificación y manejo en terreno.', 'agroambiente-cpts' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_nav_menus'  => true,
				'show_in_admin_bar'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'guias-de-campo',
				'menu_icon'          => 'dashicons-location-alt',
				'menu_position'      => 22,
				'hierarchical'       => false,
				'has_archive'        => 'guias-de-campo',
				'rewrite'            => [
					'slug'       => 'guia-campo',
					'with_front' => false,
				],
				'capability_type'    => 'post',
				'map_meta_cap'       => true,
				'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'author' ],
				'taxonomies'         => [ 'area-tematica', 'etiqueta-agroambiente', 'region-geografica' ],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'                  => __( 'Guías de campo', 'agroambiente-cpts' ),
			'singular_name'         => __( 'Guía de campo', 'agroambiente-cpts' ),
			'add_new'               => __( 'Añadir nueva', 'agroambiente-cpts' ),
			'add_new_item'          => __( 'Añadir nueva guía de campo', 'agroambiente-cpts' ),
			'edit_item'             => __( 'Editar guía de campo', 'agroambiente-cpts' ),
			'new_item'              => __( 'Nueva guía de campo', 'agroambiente-cpts' ),
			'view_item'             => __( 'Ver guía de campo', 'agroambiente-cpts' ),
			'view_items'            => __( 'Ver guías de campo', 'agroambiente-cpts' ),
			'search_items'          => __( 'Buscar guías de campo', 'agroambiente-cpts' ),
			'not_found'             => __( 'No se encontraron guías de campo', 'agroambiente-cpts' ),
			'not_found_in_trash'    => __( 'No hay guías de campo en la papelera', 'agroambiente-cpts' ),
			'all_items'             => __( 'Todas las guías de campo', 'agroambiente-cpts' ),
			'archives'              => __( 'Archivo de guías de campo', 'agroambiente-cpts' ),
			'attributes'            => __( 'Atributos de la guía de campo', 'agroambiente-cpts' ),
			'insert_into_item'      => __( 'Insertar en guía de campo', 'agroambiente-cpts' ),
			'uploaded_to_this_item' => __( 'Subido a esta guía de campo', 'agroambiente-cpts' ),
			'featured_image'        => __( 'Imagen destacada', 'agroambiente-cpts' ),
			'set_featured_image'    => __( 'Establecer imagen destacada', 'agroambiente-cpts' ),
			'remove_featured_image' => __( 'Quitar imagen destacada', 'agroambiente-cpts' ),
			'use_featured_image'    => __( 'Usar como imagen destacada', 'agroambiente-cpts' ),
			'menu_name'             => __( 'Guías de campo', 'agroambiente-cpts' ),
		];
	}
}
