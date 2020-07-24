<?php

if ( ! function_exists( 'cst_setup' ) ) :
	
	function cst_setup() {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'cst' ),
			)
		);
		
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);
		
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'cst_setup' );

/**
 * Register widget area.
 
 */
function cst_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( ' Sidebar', 'cst' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'cst' ),
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1 Sidebar', 'cst' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'cst' ),
			'before_widget' => '<div id="%1$s" class="col-md-6 col-12 left">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
        register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2 Sidebar', 'cst' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'cst' ),
			'before_widget' => '<div id="%1$s" class="col-md-6 col-12 right">',
			'after_widget'  => '</div>',
			'before_title'  => '',
			'after_title'   => '',
		)
	);
}
add_action( 'widgets_init', 'cst_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function cst_scripts() {
        //Enqueue style
	wp_enqueue_style( 'cst-style', get_stylesheet_uri() );
	wp_enqueue_style('cst-bootstrap-style', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css',array(), '4.5.0');
        wp_enqueue_style('cst-icon-style', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css',array(), '5.11.2' );
        wp_enqueue_style('cst-main-style',get_template_directory_uri() . '/css/main.css');        
        
        //Enqueue_scripts
	wp_enqueue_script( 'cst-jquery','https://code.jquery.com/jquery-3.5.1.min.js', array(), '3.5.1', true );
        wp_enqueue_script('cst-bootstrap-js','https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js',array(), '4.5.0', true );
        wp_enqueue_script('cst-main-js',get_template_directory_uri() .'/js/main.js',array(), '', true);
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'cst_scripts' );
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';



