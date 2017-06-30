<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 6/28/2017
 * Time: 8:21 PM
 */

// Register Custom Post Type
function testimony_post_type() {

	$labels = array(
		'name'                  => _x( 'Testimonios', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Testimonio', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Testimonios', 'text_domain' ),
		'name_admin_bar'        => __( 'Testimonio', 'text_domain' ),
		'archives'              => __( 'Testimonio Archives', 'text_domain' ),
		'attributes'            => __( 'Testimonio Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Testimonio:', 'text_domain' ),
		'all_items'             => __( 'Todos los testimonios', 'text_domain' ),
		'add_new_item'          => __( 'Añadir Testimonio', 'text_domain' ),
		'add_new'               => __( 'Añadir Testimonio', 'text_domain' ),
		'new_item'              => __( 'Nuevo Testimonio', 'text_domain' ),
		'edit_item'             => __( 'Editar Testimonio', 'text_domain' ),
		'update_item'           => __( 'Actualizar Testimonio', 'text_domain' ),
		'view_item'             => __( 'Ver Testimonio', 'text_domain' ),
		'view_items'            => __( 'Ver Testimonios', 'text_domain' ),
		'search_items'          => __( 'Buscar Testimonio', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into testimonio', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this testimonio', 'text_domain' ),
		'items_list'            => __( 'Lista de Testimonios', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de la lista de testimonios', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar la lista de testimonios', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Testimonio', 'text_domain' ),
		'description'           => __( 'testimonio de clientes y colaboradores', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array('title', 'editor', 'thumbnail', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-comments',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'testimony', $args );

}
add_action( 'init', __NAMESPACE__ . '\\testimony_post_type', 0 );