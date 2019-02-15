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
			'category_blog' => __( 'Category Navigation Blog', 'sage' ),
		);
		register_nav_menus( $locations );

	}
	add_action( 'init', __NAMESPACE__ . '\\custom_navigation_menus' );
}

if (!function_exists( 'jema_sidebars')) {
	// Register Sidebars
	function jema_sidebars() {

		$args = array(
			'id'            => 'sidebar-blog',
			'class'         => 'sidebar-blog',
			'name'          => __( 'Blog', 'sage' ),
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
			'before_widget' => '<section class="widget pad-btn-15 %1$s %2$s">',
			'after_widget'  => '</section>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'sidebar-blog-images',
			'class'         => 'sidebar-blog-images',
			'name'          => __( 'Blog Images', 'sage' ),
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
			'before_widget' => '<section class="widget pad-btn-15 sidebar-blog-images %1$s %2$s">',
			'after_widget'  => '</section>',
		);
		register_sidebar( $args );

		$args = array(
			'id'            => 'sidebar-footer-2',
			'class'         => 'sidebar-footer-2',
			'name'          => __( 'Footer 2', 'sage' ),
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
			'before_widget' => '<section class="widget %1$s %2$s sidebar-footer-2">',
			'after_widget'  => '</section>',
		);
		register_sidebar( $args );
	}
	add_action( 'widgets_init', __NAMESPACE__ . '\\jema_sidebars' );
}

if (!function_exists( 'modify_contact_methods')) {
	// Add new fields
	function modify_contact_methods($profile_fields) {

		$profile_fields['twitter'] = 'Twitter Username';
		$profile_fields['facebook'] = 'Facebook URL';
		$profile_fields['gplus'] = 'Google+ URL';
		$profile_fields['linkedin'] = 'Linkedin URL';

		return $profile_fields;
	}
	add_filter('user_contactmethods', __NAMESPACE__ . '\\modify_contact_methods');
}

if (!function_exists( 'jema_theme_features')) {
	// Register Theme Features
	function jema_theme_features()  {

		// Add image size
		add_image_size('jema-300x165', 300, 165);
		add_image_size('jema-560x360', 560, 360);
	}
	add_action( 'after_setup_theme', __NAMESPACE__ . '\\jema_theme_features' );
}

function customize_register( $wp_customize ) {

    /**
	 * Meta description
	 */
	$wp_customize->add_setting(
		'meta_description', array(
			'default'           => '',
			'type'              => 'theme_mod',
			'capability'        => 'edit_theme_options',
			'transport'         => '',
			'sanitize_callback' => 'esc_textarea',
		)
	);

    $wp_customize->add_control(
		'meta_description', array(
			'type'        => 'textarea',
			'section'     => 'title_tagline',
			'priority'    => 1,
			'label'       => __( 'Meta Descripcion' ),
		)
    );

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
		'label'    => __( 'Título del sitio', 'textdomain' ),
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
				'label'       => __( 'Seleccione un Fondo', 'theme' ),
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
				'label'       => __( 'Seleccione un Logo', 'theme' ),
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
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
			)
		);
		/**
		 * About image
		 */
		$wp_customize->add_setting(
			'about_me_site_icon',
			array(
				'default-image'     => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'about_me_site_icon',
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
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
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
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
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
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
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

	/**
	 * Panel Blog Page
	 */
	$wp_customize->add_panel(
		'theme_options_2', array(
			'priority'       => 2,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Blog', 'theme' ),
			'description'    => __( 'Several settings pertaining my theme', 'theme' ),
		)
	);

		$wp_customize->add_section(
			'header_blog_page', array(
				'title'    => __( 'Header', 'theme' ),
				'priority' => 1,
				'panel'    => 'theme_options_2'
			)
		);

		/**
		 * Titulo del Sitio
		 */
		$wp_customize->add_setting(
			'title_blog', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'title_blog', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'header_blog_page',
				'label'    => __( 'Titulo del Blog', 'textdomain' ),
			)
		);

		$wp_customize->add_section(
			'footer_blog_page', array(
				'title'    => __( 'Footer', 'theme' ),
				'priority' => 2,
				'panel'    => 'theme_options_2'
			)
		);
		/**
		 * Title form - Footer
		 */
		$wp_customize->add_setting(
			'form-title', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'form-title', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'footer_blog_page',
				'label'    => __( 'Titulo Formulario', 'textdomain' ),
			)
		);
		/**
		 * Text form - Footer
		 */
		$wp_customize->add_setting(
			'form-text', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'form-text', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'footer_blog_page',
				'label'    => __( 'Texto Formulario', 'textdomain' ),
			)
		);
		/**
		 * Contact Email - Footer
		 */
		$wp_customize->add_setting(
			'email_footer', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'email_footer', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'footer_blog_page',
				'label'    => __( 'Email de Contacto', 'textdomain' ),
			)
		);
		/**
		 * Contact Phone - Footer
		 */
		$wp_customize->add_setting(
			'phone_footer', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'phone_footer', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'footer_blog_page',
				'label'    => __( 'Telefono de Contacto', 'textdomain' ),
			)
		);
		/**
		 * Contact Address - Footer
		 */
		$wp_customize->add_setting(
			'address_footer', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'address_footer', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'footer_blog_page',
				'label'    => __( 'Dirección de Contacto', 'textdomain' ),
			)
		);

	/**
	 * Panel Services Page
	 */
	$wp_customize->add_panel(
		'theme_options_3', array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Servicios', 'sage' ),
			'description'    => __( 'Several settings pertaining my theme', 'sage' ),
		)
	);

		$wp_customize->add_section(
			'header_service_page', array(
				'title'    => __( 'Header', 'theme' ),
				'priority' => 1,
				'panel'    => 'theme_options_3'
			)
		);

		/**
		 * Titulo del Sitio
		 */
		$wp_customize->add_setting(
			'title_services', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'title_services', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'header_service_page',
				'label'    => __( 'Titulo Pagina de Servicios', 'textdomain' ),
			)
		);
	/**
	 * Panel Academy Page
	 */
	$wp_customize->add_panel(
		'theme_options_4', array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Academia', 'sage' ),
			'description'    => __( 'Several settings pertaining my theme', 'sage' ),
		)
	);

		$wp_customize->add_section(
			'header_academy_page', array(
				'title'    => __( 'Header', 'theme' ),
				'priority' => 1,
				'panel'    => 'theme_options_4'
			)
		);
		/**
		 * Titulo del Sitio
		 */
		$wp_customize->add_setting(
			'title_academy', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'title_academy', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'header_academy_page',
				'label'    => __( 'Titulo Pagina de Academia', 'textdomain' ),
			)
		);
	/**
	 * Panel About-Me Page
	 */
	$wp_customize->add_panel(
		'theme_options_5', array(
			'priority'       => 3,
			'capability'     => 'edit_theme_options',
			'theme_supports' => '',
			'title'          => __( 'Sobre Mi', 'sage' ),
			'description'    => __( 'Several settings pertaining my theme', 'sage' ),
		)
	);
		$wp_customize->add_section(
			'header_about_page', array(
				'title'    => __( 'Header', 'theme' ),
				'priority' => 1,
				'panel'    => 'theme_options_5'
			)
		);
		/**
		 * Titulo del Sitio
		 */
		$wp_customize->add_setting(
			'title_about', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'title_about', array(
				'type'     => 'text',
				'priority' => 0,
				'section'  => 'header_about_page',
				'label'    => __( 'Titulo Pagina Sobre Mi', 'textdomain' ),
			)
		);

		$wp_customize->add_section(
			'content_about_page', array(
				'title'    => __( 'Content', 'theme' ),
				'priority' => 1,
				'panel'    => 'theme_options_5'
			)
		);
		/**
		 * Background Header
		 */
		$wp_customize->add_setting(
			'background_image_about', array(
				'default-image'     => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'background_image_about', array(
					'label'       => __( 'Seleccione un Fondo', 'theme' ),
					'description' => __( 'Recomendación: Cargar la imagen del logo sin fondo para que este no interfiera con el background de la pagina', 'theme' ),
					'type'        => 'image',
					'section'     => 'content_about_page',
					'priority'    => 0
				)
			)
		);
		/**
		 * Text About-Me 1
		 */
		$wp_customize->add_setting(
			'paragraph_0', array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'transport'         => '',
				'sanitize_callback' => 'esc_textarea',
			)
		);
		$wp_customize->add_control(
			'paragraph_0', array(
				'type'        => 'textarea',
				'priority'    => 1,
				'section'     => 'content_about_page',
				'label'       => __( 'Ingrese el Texto', 'textdomain' ),
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
			)
		);
		/**
		 * Text About-Me 2
		 */
		$wp_customize->add_setting(
			'paragraph_1', array(
				'capability' => 'edit_theme_options',
				'default' => '',
			)
		);

		$wp_customize->add_control(
			'paragraph_1', array(
				'type'        => 'textarea',
				'section'     => 'content_about_page',
				'priority'    => 2,
				'label'       => __( 'Ingrese el texto' ),
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
			)
		);
		/**
		 * Text About-Me 3
		 */
		$wp_customize->add_setting(
			'my_formula', array(
				'capability' => 'edit_theme_options',
				'default' => '',
			)
		);

		$wp_customize->add_control(
			'my_formula', array(
				'type'        => 'text',
				'section'     => 'content_about_page',
				'priority'    => 3,
				'label'       => __( 'Mi Formula' ),
			)
		);
		/**
		 * Text About-Me 4
		 */
		$wp_customize->add_setting(
			'paragraph_3', array(
				'capability' => 'edit_theme_options',
				'default' => '',
			)
		);

		$wp_customize->add_control(
			'paragraph_3', array(
				'type'        => 'textarea',
				'section'     => 'content_about_page',
				'priority'    => 4,
				'label'       => __( 'Ingrese el texto' ),
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
			)
		);
		/**
		 * Text About-Me 5
		 */
		$wp_customize->add_setting(
			'paragraph_4', array(
				'capability' => 'edit_theme_options',
				'default' => '',
			)
		);

		$wp_customize->add_control(
			'paragraph_4', array(
				'type'        => 'textarea',
				'section'     => 'content_about_page',
				'priority'    => 5,
				'label'       => __( 'Ingrese el texto' ),
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
			)
		);
		/**
		 * Text About-Me 6
		 */
		$wp_customize->add_setting(
			'paragraph_5', array(
				'capability' => 'edit_theme_options',
				'default' => '',
			)
		);

		$wp_customize->add_control(
			'paragraph_5', array(
				'type'        => 'textarea',
				'section'     => 'content_about_page',
				'priority'    => 6,
				'label'       => __( '¿Cómo aterricé aqui?' ),
				'description' => __( 'Colocar texto en Negrita *Texto*.<br> Colocar texto en Cursiva _Texto_.' )
			)
		);

		/**
		 * Image JeanMary
		 */
		$wp_customize->add_setting(
			'personal_image', array(
				'default-image'     => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);
		$wp_customize->add_control(
			new \WP_Customize_Image_Control(
				$wp_customize,
				'personal_image', array(
					'label'       => __( 'Seleccione una imagen', 'theme' ),
					'description' => __( 'Recomendación: Cargar la imagen sin fondo para que este no interfiera con el background de la pagina', 'theme' ),
					'type'        => 'image',
					'section'     => 'content_about_page',
					'priority'    => 10,
				)
			)
		);

}

add_action( 'customize_register', __NAMESPACE__ . '\\customize_register' );

function hook_metaData() {
    ?>
        <meta name="description" content="<?php echo get_theme_mod('meta_description') ?>">
        <meta name="twitter:title" content="<?php echo bloginfo( 'name' ) ?>">
        <meta property="twitter:description" content="<?php echo get_theme_mod('meta_description') ?>">
        <meta property="og:title" content="<?php echo bloginfo( 'name' ) ?>">
        <meta property="og:description" content="<?php echo get_theme_mod('meta_description') ?>">
    <?php
}

add_action('wp_head',  __NAMESPACE__ . '\\hook_metaData', 1);
