<?php
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 6/7/2017
 * Time: 2:43 PM
 */

namespace App;

if (!function_exists( 'custom_navigation_menus')) {
	// Register Navigation Menus
	function custom_navigation_menus() {

		$locations = array(
			'social_header' => __( 'Social Navigation Header', 'sage' ),
			'social_footer' => __( 'Social Navigation Footer', 'sage' ),
		);
		register_nav_menus( $locations );

	}
	add_action( 'init', __NAMESPACE__ . '\\custom_navigation_menus' );
}

function customize_register( $wp_customize ) {

//	$wp_customize->get_setting('blogname')->transport = 'postMessage';

	$wp_customize->add_section(
		'logo_header', array(
			'title'    => __( 'Navigation Bar', 'logo' ),
			'priority' => 10,
		)
	);
	/**
	 * Logo Upload
	 */
	$wp_customize->add_setting(
		'site_logo', array(
			'default-image'     => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'site_logo', array(
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
		'background_image', array(
			'default-image'     => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	$wp_customize->add_control(
		new \WP_Customize_Image_Control(
			$wp_customize,
			'background_image', array(
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
		'logo_header', array(
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

	/**
	 * About Me Section
	 */
	$wp_customize->add_section(
		'about_home_page', array(
			'title'    => __( 'Sobre Mi', 'theme' ),
			'priority' => 1,
			'panel'    => 'theme_options'
		)
	);
		/**
		 * Name About Me
		 */
		$wp_customize->add_setting(
			'name_about', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'name_about', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'about_home_page',
				'label'    => __( 'Nombre', 'textdomain' ),
			)
		);
		/**
		 * text About Me
		 */
		$wp_customize->add_setting(
			'text_about', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'text_about', array(
				'type'     => 'textarea',
				'priority' => 0,
				'section'  => 'about_home_page',
				'label'    => __( 'Texto Sobre Mi', 'textdomain' ),
				'description' => __('Se puede utilizar el caracter "|"(pipe) para realizar saltos de linea'),
			)
		);
		/**
		 * About image
		 */
		$wp_customize->add_setting(
			'site_icon',
			array(
				'default-image'     => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'site_icon',
				array(
					'label'       => __( 'Imagen "Sobre Mi', 'theme' ),
					'description' => __( 'Imagen de tablet en seccion Sobre Mi', 'theme' ),
					'type'        => 'image',
					'section'     => 'about_home_page',
					'priority'    => 3,
				)
			)
		);
		/**
		 * Service Number 1
		 */
		$wp_customize->add_setting(
			'about_title_service_1', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'about_title_service_1', array(
				'type'     => 'text',
				'priority' => 3,
				'section'  => 'about_home_page',
				'label'    => __( 'Nombre Servicio 1', 'textdomain' ),
			)
		);
		$wp_customize->add_setting(
			'about_text_service_1', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'about_text_service_1', array(
				'type'     => 'textarea',
				'priority' => 3,
				'section'  => 'about_home_page',
				'label'    => __( 'Texto Servicio 1', 'textdomain' ),
				'description' => __('Se puede utilizar el caracter "|"(pipe) para realizar saltos de linea'),
			)
		);
		/**
		 * Service Number 2
		 */
		$wp_customize->add_setting(
			'about_title_service_2', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'about_title_service_2', array(
				'type'     => 'text',
				'priority' => 3,
				'section'  => 'about_home_page',
				'label'    => __( 'Nombre Servicio 2', 'textdomain' ),
			)
		);
		$wp_customize->add_setting(
			'about_text_service_2', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'about_text_service_2', array(
				'type'     => 'textarea',
				'priority' => 3,
				'section'  => 'about_home_page',
				'label'    => __( 'Texto Servicio 2', 'textdomain' ),
				'description' => __('Se puede utilizar el caracter "|"(pipe) para realizar saltos de linea'),
			)
		);
		/**
		 * Service Number 3
		 */
		$wp_customize->add_setting(
			'about_title_service_3', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'about_title_service_3', array(
				'type'     => 'text',
				'priority' => 3,
				'section'  => 'about_home_page',
				'label'    => __( 'Nombre Servicio 3', 'textdomain' ),
			)
		);
		$wp_customize->add_setting(
			'about_text_service_3', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'about_text_service_3', array(
				'type'     => 'textarea',
				'priority' => 3,
				'section'  => 'about_home_page',
				'label'    => __( 'Texto Servicio 3', 'textdomain' ),
				'description' => __('Se puede utilizar el caracter "|"(pipe) para realizar saltos de linea'),
			)
		);
}

add_action( 'customize_register', __NAMESPACE__ . '\\customize_register' );