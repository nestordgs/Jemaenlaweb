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
	/**
	 * Subscripcion
	 */
	$wp_customize->add_section(
		'subscripcion_home_page', array(
			'title'    => __( 'Subscripción', 'theme' ),
			'priority' => 1,
			'panel'    => 'theme_options'
		)
	);
		/**
		 * Type Video
		 */
		$wp_customize->add_setting(
			'type_video', array(
				'default' => '',
				'type' => 'theme_mod',
			)
		);
		$wp_customize->add_control(
			'type_video', array(
				'type' => 'radio',
				'section' => 'subscripcion_home_page',
				'label' => __( 'Tipo de Video' ),
				'description' => __( 'Seleccione el tipo de video' ),
				'priority' => 0,
				'choices' => array(
					'1' => __( 'Youtube' ),
					'2' => __( 'Vimeo' ),
				),
			)
		);
		/**
		 * Video Youtube
		 */
		$wp_customize->add_setting(
			'link_video_subscripcion', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'link_video_subscripcion', array(
				'type'     => 'text',
				'priority' => 1,
				'section'  => 'subscripcion_home_page',
				'label'    => __( 'Link Video de Youtube', 'textdomain' ),
			)
		);
	/**
	 * Testimony
	 */
	$wp_customize->add_section(
		'testimony_home_page', array(
			'title'    => __( 'Testimonios', 'theme' ),
			'priority' => 1,
			'panel'    => 'theme_options'
		)
	);
		/**
		 * Carousel Options
		 */
			/**
			 * draggable
			 */
			$wp_customize->add_setting(
				'draggable', array(
					'default'    => '',
					'capability' => 'edit_theme_options',
					'type'       => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'draggable', array(
					'type'        => 'checkbox',
					'section'     => 'testimony_home_page',
					'label'       => __( 'Se puede arrastrar el Carousel?' ),
					'description' => __( 'En caso de querer pasar el contenido arrastrando el carousel.' ),
					'priority'    => 0,
				)
			);
			/**
			 * autoplaySpeed
			 */
			$wp_customize->add_setting(
				'autoplaySpeed', array(
					'default' => 3000,
					'type'    => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'autoplaySpeed', array(
					'type'     => 'numeric',
					'section'  => 'testimony_home_page',
					'label'    => __( 'Velocidad de reproducción automática' ),
					'priority' => 0,
				)
			);
			/**
			 * slidesToShow
			 */
			$wp_customize->add_setting(
				'slidesToShow', array(
					'default' => 16,
					'type'    => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'slidesToShow', array(
					'type'     => 'numeric',
					'section'  => 'testimony_home_page',
					'label'    => __( 'Testimonios para mostrar' ),
					'priority' => 0,
				)
			);
			/**
			 * slidesToScroll
			 */
			$wp_customize->add_setting(
				'slidesToScroll', array(
					'default' => 1,
					'type'    => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'slidesToScroll', array(
					'type'     => 'numeric',
					'section'  => 'testimony_home_page',
					'label'    => __( 'Testimonios para desplazarse' ),
					'priority' => 0,
				)
			);
			/**
			 * Text 1
			 */
			$wp_customize->add_setting(
				'text_1', array(
					'default' => 'Say Hi & Get in Touch',
					'type'    => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'text_1', array(
					'type'     => 'text',
					'section'  => 'testimony_home_page',
					'label'    => __( 'Texto Uno' ),
					'priority' => 0,
				)
			);
			/**
			 * Text 2
			 */
			$wp_customize->add_setting(
				'text_2', array(
					'default' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit suspendisse',
					'type'    => 'theme_mod',
				)
			);
			$wp_customize->add_control(
				'text_2', array(
					'type'     => 'text',
					'section'  => 'testimony_home_page',
					'label'    => __( 'Texto Dos' ),
					'priority' => 0,
				)
			);
}

add_action( 'customize_register', __NAMESPACE__ . '\\customize_register' );