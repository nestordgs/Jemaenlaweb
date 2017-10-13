<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 8/7/2017
 * Time: 11:34 PM
 */

namespace App;

// Register Custom Post Type
function academy_post_type() {

	$labels = array(
		'name'                  => _x( 'Academia', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Recurso', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Academia', 'text_domain' ),
		'name_admin_bar'        => __( 'Recursos', 'text_domain' ),
		'archives'              => __( 'Recursos Archives', 'text_domain' ),
		'attributes'            => __( 'Recurso Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'Todos los Recursos', 'text_domain' ),
		'add_new_item'          => __( 'Añadir Recurso', 'text_domain' ),
		'add_new'               => __( 'Añadir Recurso', 'text_domain' ),
		'new_item'              => __( 'Nuevo Recurso', 'text_domain' ),
		'edit_item'             => __( 'Editar Recurso', 'text_domain' ),
		'update_item'           => __( 'Actualizar Recurso', 'text_domain' ),
		'view_item'             => __( 'Ver Recurso', 'text_domain' ),
		'view_items'            => __( 'Ver Recursos', 'text_domain' ),
		'search_items'          => __( 'Buscar Recurso', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into Recurso', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Recurso', 'text_domain' ),
		'items_list'            => __( 'Lista de Recursos', 'text_domain' ),
		'items_list_navigation' => __( 'Navegación de la lista de Recursos', 'text_domain' ),
		'filter_items_list'     => __( 'Filtrar la lista de Recursos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Recurso', 'text_domain' ),
		'description'           => __( 'Recursos que se prestan', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag', 'academy-type' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-welcome-learn-more',
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
	register_post_type( 'academy', $args );

}

add_action( 'init', __NAMESPACE__ . '\\academy_post_type', 0 );

if (! function_exists( 'create_academy_taxonomy')) {

	function create_academy_taxonomy() {
		// Add new taxonomy, make it hierarchical (like categories)
		$labels = array(
			'name'              => _x( 'Tipos', 'taxonomy general name', 'textdomain' ),
			'singular_name'     => _x( 'Tipo', 'taxonomy singular name', 'textdomain' ),
			'search_items'      => __( 'Buscar Tipos', 'textdomain' ),
			'all_items'         => __( 'Todos los Tipos', 'textdomain' ),
			'parent_item'       => __( 'Tipo Padre', 'textdomain' ),
			'parent_item_colon' => __( 'Parent Genre:', 'textdomain' ),
			'edit_item'         => __( 'Editar Tipo', 'textdomain' ),
			'update_item'       => __( 'Actualizar Tipo', 'textdomain' ),
			'add_new_item'      => __( 'Nuevo Tipo', 'textdomain' ),
			'new_item_name'     => __( 'Nuevo Nombre de Tipo', 'textdomain' ),
			'menu_name'         => __( 'Tipo', 'textdomain' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'academy-type' ),
		);

		register_taxonomy( 'academy-type', array( 'academy' ), $args );

	}
	add_action( 'init', __NAMESPACE__ . '\\create_academy_taxonomy', 0 );
}

function register_meta_academy_fields() {
	register_meta(
		'post',
		'url_pago',
		array( 'description' => __('Ingrese Url de Pago', 'meta description', 'text_domain'),
		       'single'=> true,
		       'sanitize_callback' => 'sanitize_text_field',
		       'auth_callback' => 'custom_field_auth_callback'
		)
	);
}

add_action('init', __NAMESPACE__ . '\\register_meta_academy_fields');

function custom_field_auth_academy_callback($allowed, $meta_key, $post_id, $user_id, $cap, $caps) {
	if ( 'post' == get_post_type( $post_id ) && current_user_can( 'edit_post', $post_id) ) {
		$allowed = true;
	} else {
		$allowed = false;
	}

	return $allowed;
}

function register_metabox_academy() {
	add_meta_box( 'url_pago_academy', __( 'Url Pago', 'text_domain' ), __NAMESPACE__ . '\\metabox_callback_academy', 'academy', 'side', 'high' );
}

add_action('add_meta_boxes', __NAMESPACE__ . '\\register_metabox_academy');

function metabox_callback_academy( $post ) {
	wp_nonce_field( 'register_metabox_academys', 'register_metabox_academys_noncename' );

	?>
	<p>
		<label for="url_pago_academy"><?php __('Ingrese Url de Pago', 'text_domain'); ?></label>
		<input type="url" name="url_pago_academy" id="url_pago_academy" value="<?= esc_attr( get_post_meta( $post->ID, 'url_pago_academy', true ) ) ?>">
	</p>
	<?php
}

function save_custom_field_academy( $post_id, $post ) {
	if ( ! isset( $_POST[ 'register_metabox_academys_noncename' ] ) || ! wp_verify_nonce( $_POST[ 'register_metabox_academys_noncename' ] , 'register_metabox_academys' ) ) {
		return;
	}

	if ( isset( $_POST[ 'url_pago_academy' ] ) && $_POST[ 'url_pago_academy' ] != '' ) {
		update_post_meta( $post_id, 'url_pago_academy', $_POST['url_pago_academy'] );
	} else {
		delete_post_meta( $post_id, 'url_pago_academy' );
	}
}

add_action( 'save_post', __NAMESPACE__ . '\\save_custom_field_academy', 10, 2);