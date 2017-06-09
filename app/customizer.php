<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 6/7/2017
 * Time: 2:43 PM
 */

namespace App;

function customize_register( $wp_customize ) {

//	$wp_customize->get_setting('blogname')->transport = 'postMessage';

	$wp_customize->add_section(
		'logo_header',
		array(
			'title'    => __( 'Navigation Bar', 'logo' ),
			'priority' => 10,
		)
	);
	/**
	 * Logo Upload
	 */
	$wp_customize->add_setting(
		'site_logo',
		array(
			'default-image'     => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'site_logo',
			array(
				'label'       => __( 'Seleccione el Logo', 'logo' ),
				'description' => __( 'Recomendación: Cargar la imagen del logo sin fondo para que este no interfiera con el background de la pagina', 'logo' ),
				'type'        => 'image',
				'section'     => 'logo_header',
				'priority'    => 11,
			)
		)
	);
	/**
	 * Panel Home Page
	 */
	$wp_customize->add_panel(
		'theme_options', array(
			'priority'       => 1,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Pagina de Inicio', 'theme' ),
			'description'    => __( 'Several settings pertaining my theme', 'theme' ),
		)
	);

	$wp_customize->add_section(
		'header_home_page', array(
			'title'    => __( 'Header', 'theme' ),
			'priority' => 1,
			'panel'    => 'theme_options'
		)
	);
	/**
	 * Titulo del Sitio
	 */
	$wp_customize->add_setting(
		'title_site', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => '',
			'sanitize_callback' => 'esc_textarea',
		)
	);
	$wp_customize->add_control(
		'title_site', array(
		'type'     => 'text',
		'priority' => 0,
		'section'  => 'header_home_page',
		'label'    => __( 'Site Title', 'textdomain' ),
		)
	);
	/**
	 * Background Header
	 */
	$wp_customize->add_setting(
		'background_image',
		array(
			'default-image'     => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'background_image',
			array(
				'label'       => __( 'Select an Background', 'theme' ),
				'description' => __( 'Recomendación: Cargar la imagen del logo sin fondo para que este no interfiera con el background de la pagina', 'theme' ),
				'type'        => 'image',
				'section'     => 'header_home_page',
				'priority'    => 2,
			)
		)
	);
	/**
	 * Logo Header
	 */
	$wp_customize->add_setting(
		'logo_header',
		array(
			'default-image'     => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'logo_header',
			array(
				'label'       => __( 'Select an Logo', 'theme' ),
				'description' => __( 'Recomendación: Cargar la imagen del logo sin fondo para que este no interfiera con el background de la pagina', 'theme' ),
				'type'        => 'image',
				'section'     => 'header_home_page',
				'priority'    => 3,
			)
		)
	);
	/**
	 * Username Header
	 */
	$wp_customize->add_setting(
		'username', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => '',
		)
	);
	$wp_customize->add_control(
		'username', array(
			'type'     => 'text',
			'priority' => 0,
			'section'  => 'header_home_page',
			'label'    => __( 'Username', 'textdomain' ),
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\\customize_register' );