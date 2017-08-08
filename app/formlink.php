<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 8/6/2017
 * Time: 9:20 PM
 */

namespace App;

function register_meta_fields() {
	register_meta(
		'post',
		'url_form',
		array( 'description' => __('Ingrese el url del Formulario', 'meta description', 'text_domain'), 'single'=> true, 'sanitize_callback' => 'sanitize_text_field', 'auth_callback' => 'custom_field_auth_callback' )
	);
}

add_action('init', __NAMESPACE__ . '\\register_meta_fields');

function custom_field_auth_callback($allowed, $meta_key, $post_id, $user_id, $cap, $caps) {
	if ( 'post' == get_post_type( $post_id ) && current_user_can( 'edit_post', $post_id) ) {
		$allowed = true;
	} else {
		$allowed = false;
	}

	return $allowed;
}

function register_metabox_services() {
	add_meta_box( 'formurl_service', __( 'Url de Formulario', 'text_domain' ), __NAMESPACE__ . '\\metabox_callback_service', 'services', 'side', 'high' );
}
add_action('add_meta_boxes', __NAMESPACE__ . '\\register_metabox_services');


function metabox_callback_service( $post ) {
	wp_nonce_field( 'register_metabox_services', 'register_metabox_services_noncename' );

	?>
	<p>
		<label for="formurl_service"><?php __('Ingresa el url del formulario', 'text_domain'); ?></label>
		<input type="url" name="formurl_service" id="formurl_service" value="<?= esc_attr( get_post_meta( $post->ID, 'formurl_service', true ) ) ?>">
	</p>
	<?php
}

function save_custom_field_service( $post_id, $post ) {
	if ( ! isset( $_POST[ 'register_metabox_services_noncename' ] ) || ! wp_verify_nonce( $_POST[ 'register_metabox_services_noncename' ] , 'register_metabox_services' ) ) {
	    return;
    }

    if ( isset( $_POST[ 'formurl_service' ] ) && $_POST[ 'formurl_service' ] != '' ) {
	    update_post_meta( $post_id, 'formurl_service', $_POST['formurl_service'] );
    } else {
	    delete_post_meta( $post_id, 'formurl_service' );
    }
}
add_action( 'save_post', __NAMESPACE__ . '\\save_custom_field_service', 10, 2);