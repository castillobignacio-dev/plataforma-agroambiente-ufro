<?php
/**
 * CPT "Artículo divulgativo" (articulo-divulgativo).
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\PostTypes;

defined( 'ABSPATH' ) || exit;

class Articulo_Divulgativo {

	const POST_TYPE = 'articulo-divulgativo';

	public static function register(): void {
		register_post_type(
			self::POST_TYPE,
			[
				'labels'             => self::labels(),
				'description'        => __( 'Artículos de divulgación sobre temas agroambientales.', 'agroambiente-cpts' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_nav_menus'  => true,
				'show_in_admin_bar'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'articulos-divulgativos',
				'menu_icon'          => 'dashicons-welcome-write-blog',
				'menu_position'      => 23,
				'hierarchical'       => false,
				'has_archive'        => 'articulos-divulgativos',
				'rewrite'            => [
					'slug'       => 'articulo-divulgativo',
					'with_front' => false,
				],
				'capability_type'    => 'post',
				'map_meta_cap'       => true,
				'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'author' ],
				'taxonomies'         => [ 'area-tematica', 'etiqueta-agroambiente' ],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'                  => __( 'Artículos divulgativos', 'agroambiente-cpts' ),
			'singular_name'         => __( 'Artículo divulgativo', 'agroambiente-cpts' ),
			'add_new'               => __( 'Añadir nuevo', 'agroambiente-cpts' ),
			'add_new_item'          => __( 'Añadir nuevo artículo divulgativo', 'agroambiente-cpts' ),
			'edit_item'             => __( 'Editar artículo divulgativo', 'agroambiente-cpts' ),
			'new_item'              => __( 'Nuevo artículo divulgativo', 'agroambiente-cpts' ),
			'view_item'             => __( 'Ver artículo divulgativo', 'agroambiente-cpts' ),
			'view_items'            => __( 'Ver artículos divulgativos', 'agroambiente-cpts' ),
			'search_items'          => __( 'Buscar artículos divulgativos', 'agroambiente-cpts' ),
			'not_found'             => __( 'No se encontraron artículos divulgativos', 'agroambiente-cpts' ),
			'not_found_in_trash'    => __( 'No hay artículos divulgativos en la papelera', 'agroambiente-cpts' ),
			'all_items'             => __( 'Todos los artículos divulgativos', 'agroambiente-cpts' ),
			'archives'              => __( 'Archivo de artículos divulgativos', 'agroambiente-cpts' ),
			'attributes'            => __( 'Atributos del artículo divulgativo', 'agroambiente-cpts' ),
			'insert_into_item'      => __( 'Insertar en artículo divulgativo', 'agroambiente-cpts' ),
			'uploaded_to_this_item' => __( 'Subido a este artículo divulgativo', 'agroambiente-cpts' ),
			'featured_image'        => __( 'Imagen destacada', 'agroambiente-cpts' ),
			'set_featured_image'    => __( 'Establecer imagen destacada', 'agroambiente-cpts' ),
			'remove_featured_image' => __( 'Quitar imagen destacada', 'agroambiente-cpts' ),
			'use_featured_image'    => __( 'Usar como imagen destacada', 'agroambiente-cpts' ),
			'menu_name'             => __( 'Artículos divulgativos', 'agroambiente-cpts' ),
		];
	}
}
