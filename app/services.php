<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 7/30/2017
 * Time: 8:27 PM
 */

namespace App;

// Register Custom Post Type
function services_post_type() {

	$labels = array(
		'name'                  => _x( 'Servicios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Servicio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Servicios', 'text_domain' ),
		'name_admin_bar'        => __( 'Servicios', 'text_domain' ),
		'archives'              => __( 'Servicios Archives', 'text_domain' ),
		'attributes'            => __( 'Servicio Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos los Servicios', 'text_domain' ),
		'add_new_item'          => __( 'Añadir Servicio', 'text_domain' ),
		'add_new'               => __( 'Añadir Servicio', 'text_domain' ),
		'new_item'              => __( 'Nuevo Servicio', 'text_domain' ),
		'edit_item'             => __( 'Editar Servicio', 'text_domain' ),
		'update_item'           => __( 'Actualizar Servicio', 'text_domain' ),
		'view_item'             => __( 'Ver Servicio', 'text_domain' ),
		'view_items'            => __( 'Ver Servicios', 'text_domain' ),
		'search_items'          => __( 'Buscar Servicio', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Servicio', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Servicio', 'text_domain' ),
		'items_list'            => __( 'Lista de Servicios', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de la lista de Servicios', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar la lista de Servicios', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Servicio', 'text_domain' ),
		'description'           => __( 'Servicios que se prestan', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'query_var'             => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'rewrite'               => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'services', $args );

}
add_action( 'init', __NAMESPACE__ . '\\services_post_type', 0 );