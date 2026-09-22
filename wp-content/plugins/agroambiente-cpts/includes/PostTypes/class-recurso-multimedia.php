<?php
/**
 * CPT "Recurso multimedia" (recurso-multimedia).
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\PostTypes;

defined( 'ABSPATH' ) || exit;

class Recurso_Multimedia {

	const POST_TYPE = 'recurso-multimedia';

	public static function register(): void {
		register_post_type(
			self::POST_TYPE,
			[
				'labels'             => self::labels(),
				'description'        => __( 'Videos, audios, infografías y otros recursos multimedia.', 'agroambiente-cpts' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_nav_menus'  => true,
				'show_in_admin_bar'  => true,
				'show_in_rest'       => true,
				'rest_base'          => 'recursos-multimedia',
				'menu_icon'          => 'dashicons-format-video',
				'menu_position'      => 24,
				'hierarchical'       => false,
				'has_archive'        => 'recursos-multimedia',
				'rewrite'            => [
					'slug'       => 'recurso-multimedia',
					'with_front' => false,
				],
				'capability_type'    => 'post',
				'map_meta_cap'       => true,
				'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'author' ],
				'taxonomies'         => [ 'area-tematica', 'etiqueta-agroambiente', 'tipo-recurso' ],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'                  => __( 'Recursos multimedia', 'agroambiente-cpts' ),
			'singular_name'         => __( 'Recurso multimedia', 'agroambiente-cpts' ),
			'add_new'               => __( 'Añadir nuevo', 'agroambiente-cpts' ),
			'add_new_item'          => __( 'Añadir nuevo recurso multimedia', 'agroambiente-cpts' ),
			'edit_item'             => __( 'Editar recurso multimedia', 'agroambiente-cpts' ),
			'new_item'              => __( 'Nuevo recurso multimedia', 'agroambiente-cpts' ),
			'view_item'             => __( 'Ver recurso multimedia', 'agroambiente-cpts' ),
			'view_items'            => __( 'Ver recursos multimedia', 'agroambiente-cpts' ),
			'search_items'          => __( 'Buscar recursos multimedia', 'agroambiente-cpts' ),
			'not_found'             => __( 'No se encontraron recursos multimedia', 'agroambiente-cpts' ),
			'not_found_in_trash'    => __( 'No hay recursos multimedia en la papelera', 'agroambiente-cpts' ),
			'all_items'             => __( 'Todos los recursos multimedia', 'agroambiente-cpts' ),
			'archives'              => __( 'Archivo de recursos multimedia', 'agroambiente-cpts' ),
			'attributes'            => __( 'Atributos del recurso multimedia', 'agroambiente-cpts' ),
			'insert_into_item'      => __( 'Insertar en recurso multimedia', 'agroambiente-cpts' ),
			'uploaded_to_this_item' => __( 'Subido a este recurso multimedia', 'agroambiente-cpts' ),
			'featured_image'        => __( 'Imagen destacada', 'agroambiente-cpts' ),
			'set_featured_image'    => __( 'Establecer imagen destacada', 'agroambiente-cpts' ),
			'remove_featured_image' => __( 'Quitar imagen destacada', 'agroambiente-cpts' ),
			'use_featured_image'    => __( 'Usar como imagen destacada', 'agroambiente-cpts' ),
			'menu_name'             => __( 'Recursos multimedia', 'agroambiente-cpts' ),
		];
	}
}
