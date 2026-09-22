<?php
/**
 * CPT "Manual técnico" (manual-tecnico).
 *
 * @package Agroambiente_Cpts
 */

namespace Agroambiente\Cpts\PostTypes;

defined( 'ABSPATH' ) || exit;

class Manual_Tecnico {

	const POST_TYPE = 'manual-tecnico';

	public static function register(): void {
		register_post_type(
			self::POST_TYPE,
			[
				'labels'             => self::labels(),
				'description'        => __( 'Manuales técnicos de gestión agroambiental.', 'agroambiente-cpts' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'show_in_nav_menus'  => true,
				'show_in_admin_bar'  => true,
				// Requerido para editar el contenido con Divi Builder y para exponerlo en la API REST.
				'show_in_rest'       => true,
				'rest_base'          => 'manuales-tecnicos',
				'menu_icon'          => 'dashicons-media-document',
				'menu_position'      => 21,
				'hierarchical'       => false,
				'has_archive'        => 'manuales-tecnicos',
				'rewrite'            => [
					'slug'       => 'manual-tecnico',
					'with_front' => false,
				],
				'capability_type'    => 'post',
				'map_meta_cap'       => true,
				'supports'           => [ 'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'revisions', 'author' ],
				'taxonomies'         => [ 'area-tematica', 'etiqueta-agroambiente', 'nivel-educativo' ],
			]
		);
	}

	private static function labels(): array {
		return [
			'name'                  => __( 'Manuales técnicos', 'agroambiente-cpts' ),
			'singular_name'         => __( 'Manual técnico', 'agroambiente-cpts' ),
			'add_new'               => __( 'Añadir nuevo', 'agroambiente-cpts' ),
			'add_new_item'          => __( 'Añadir nuevo manual técnico', 'agroambiente-cpts' ),
			'edit_item'             => __( 'Editar manual técnico', 'agroambiente-cpts' ),
			'new_item'              => __( 'Nuevo manual técnico', 'agroambiente-cpts' ),
			'view_item'             => __( 'Ver manual técnico', 'agroambiente-cpts' ),
			'view_items'            => __( 'Ver manuales técnicos', 'agroambiente-cpts' ),
			'search_items'          => __( 'Buscar manuales técnicos', 'agroambiente-cpts' ),
			'not_found'             => __( 'No se encontraron manuales técnicos', 'agroambiente-cpts' ),
			'not_found_in_trash'    => __( 'No hay manuales técnicos en la papelera', 'agroambiente-cpts' ),
			'all_items'             => __( 'Todos los manuales técnicos', 'agroambiente-cpts' ),
			'archives'              => __( 'Archivo de manuales técnicos', 'agroambiente-cpts' ),
			'attributes'            => __( 'Atributos del manual técnico', 'agroambiente-cpts' ),
			'insert_into_item'      => __( 'Insertar en manual técnico', 'agroambiente-cpts' ),
			'uploaded_to_this_item' => __( 'Subido a este manual técnico', 'agroambiente-cpts' ),
			'featured_image'        => __( 'Imagen destacada', 'agroambiente-cpts' ),
			'set_featured_image'    => __( 'Establecer imagen destacada', 'agroambiente-cpts' ),
			'remove_featured_image' => __( 'Quitar imagen destacada', 'agroambiente-cpts' ),
			'use_featured_image'    => __( 'Usar como imagen destacada', 'agroambiente-cpts' ),
			'menu_name'             => __( 'Manuales técnicos', 'agroambiente-cpts' ),
		];
	}
}
