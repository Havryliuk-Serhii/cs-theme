<?php


/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function cst_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'cst_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cst_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cst_pingback_header' );

/**
 * Bootstrap Walker Nav menu
**/
class Bootstrap_Menu_Walker extends Walker_Nav_Menu {

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

      if ( isset( $args->item_spacing ) && 'discard' === $args->item_spacing ) {
        $t = '';
        $n = '';
      } else {
        $t = "\t";
        $n = "\n";
      }
      $indent = ( $depth ) ? str_repeat( $t, $depth ) : '';

      $classes = empty( $item->classes ) ? array() : (array) $item->classes;
      $classes[] = 'menu-item-' . $item->ID;

      // Filters the arguments for a single nav menu item
      $args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

      // Filters the CSS class(es) applied to a menu item's list item element
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

      // Filters the ID applied to a menu item's list item element
      $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

      $output .= $indent . '<li' . $id . $class_names .'>';

      // it would be better to enter the class in Appearance -> Menus -> Screen Options -> CSS classes
      // $output .= $indent . '<li' . $id . $class_names .'>';
      $output .= $indent . '<li class="nav-item">';

      $atts = array();
      $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
      $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
      $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
      $atts['href']   = ! empty( $item->url )        ? $item->url        : '';

      // Filters the HTML attributes applied to a menu item's anchor element
      $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

      $attributes = '';
      foreach ( $atts as $attr => $value ) {
        if ( ! empty( $value ) ) {
          $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
          $attributes .= ' ' . $attr . '="' . $value . '"';
        }
      }
      $title = apply_filters( 'the_title', $item->title, $item->ID );

      // Filters a menu item's title
      $title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

      $item_output = $args->before;
      $item_output .= '<a class="nav-link js-scroll-trigger"'. $attributes .'>';
      $item_output .= $args->link_before . $title . $args->link_after;
      $item_output .= '</a>';
      $item_output .= $args->after;

	  $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}
/**
 * Delete menu item class
**/
add_filter('nav_menu_item_id', 'filter_menu_id');
add_filter( 'nav_menu_css_class', 'filter_menu_li' );
function filter_menu_li(){
    return array('');
}
function filter_menu_id(){
    return;
}

/**
* Custom background for Hero section
**/
function cst_hero_background($field, $cat = null, $position=true){
    if( get_field($field, $cat) ){
        $add_style=$position ? 'background-position: center;':'';
        return ' style="background: url(' . get_field($field, $cat) . ') fixed 50% 50%; '.$add_style.'"';
            }
    return null;
}
/**
 * Custom post Feature
 **/
add_action('init', 'cst_feature_post');
function cst_feature_post(){
	register_post_type('feature_post', array(
		'labels'             => array(
			'name'               => 'Feature',
			'singular_name'      => 'Feature',
			'add_new'            => 'Add new',
			'add_new_item'       => 'Add new feature',
			'edit_item'          => 'Edit feature',
			'new_item'           => 'New feature ',
			'view_item'          => 'View feature',
			'search_items'       => 'Search feature',
			'not_found'          =>  'Feature not found',
			'not_found_in_trash' => 'Feature not found in trash',
			'parent_item_colon'  => '',
			'menu_name'          => 'Feature',
		  ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
                'menu_icon'          => 'dashicons-welcome-widgets-menus',
                'menu_position'      => 9,
		'supports'           => array('title','editor', 'thumbnail', )
	) );
}

/**
 * Custom background for Contacts section
**/
function cst_contacts_background($field, $cat = null, $cover=true){
    if( get_field($field, $cat) ){
        $contacts_style=$cover ? 'background-size: cover;':'';
        return ' style="background: url(' . get_field($field, $cat) . ') center no-repeat; '.$contacts_style.'"';
            }
    return null;
}

/**
 * Theme option page
 */
function cst_add_admin_page() {
	
	//Generate Custom Admin Page
	add_menu_page( 'CS Theme Options', 'Theme Options', 'manage_options', 'cst_theme', 'cst_create_page','dashicons-admin-generic', 110 );
	
	//Generate Admin Sub Pages
	add_submenu_page( 'cst_theme', 'CS Theme Option', 'Theme Option', 'manage_options', 'cst_theme', 'cst_create_page' );
	add_submenu_page( 'cst_theme', 'CS Header Option', 'Header', 'manage_options', '', 'cst_support_page' );
	
}
add_action( 'admin_menu', 'cst_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'cst_custom_settings' );

function cst_custom_settings() {
	//Sidebar Options
	
	register_setting( 'cst-settings-group', 'twitter_handler');
	register_setting( 'cst-settings-group', 'facebook_handler' );
	register_setting( 'cst-settings-group', 'skype_handler' );
        register_setting( 'cst-settings-group', 'linkedin_handler' );
	
	add_settings_section( 'cst-header-options', 'Social network links', 'cst_header_options', 'cst_theme');
		
	add_settings_field( 'twitter-link', 'Twitter Link', 'cst_twitter', 'cst_theme', 'cst-header-options');
	add_settings_field( 'facebook-link', 'Facebook Link', 'cst_facebook', 'cst_theme', 'cst-header-options');
	add_settings_field( 'skype-link', 'Skype Link', 'cst_skype', 'cst_theme', 'cst-header-options');
	add_settings_field( 'linkedin-link', 'LinkedIn Link', 'cst_linkedin', 'cst_theme', 'cst-header-options');	
}
// Sidebar Options Functions
function cst_header_options() {
	echo 'Customize your Social network links';
}
function cst_twitter() {
	$twitter = esc_attr( get_option( 'twitter_handler' ) );
	echo '<input type="text" name="twitter_handler" value="'.$twitter.'" >';
}
function cst_facebook() {
	$facebook = esc_attr( get_option( 'facebook_handler' ) );
	echo '<input type="text" name="facebook_handler" value="'.$facebook.'">';
}
function cst_skype() {
	$skype = esc_attr( get_option( 'skype_handler' ) );
	echo '<input type="text" name="skype_handler" value="'.$skype.'">';
}
function cst_linkedin() {
	$linkedin = esc_attr( get_option( 'linkedin_handler' ) );
	echo '<input type="text" name="linkedin_handler" value="'.$linkedin.'">';
}

//Template submenu functions
function cst_create_page() {
	require_once( get_template_directory() . '/inc/admin/cst-admin.php' );
}

function cst_support_page() {
	require_once( get_template_directory() . '/inc/admin/cst-theme-support.php' );
}
