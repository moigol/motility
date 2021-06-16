<?php
// Definitions
define('THEME', 'lasermoments');
define('PREFIX', THEME.'_');
define('PREMETA', '_'.THEME.'_');
define('THEMENAME', 'Infinite');
define('SITEURL', get_bloginfo('url'));
define('THEMEURL', get_bloginfo('template_url')); // Or TEMPLATEPATH (UNIX)
define('IMG', THEMEURL.'/img');
define('JS', THEMEURL.'/js'); 
define('CSS', THEMEURL.'/css'); 
define('INC', THEMEURL.'/Inc');

// URL Segment
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = '<script>document.write(document.location.hash)</script>';

// Required files
require_once (TEMPLATEPATH . '/inc/class-tgm-plugin-activation.php');
require_once (TEMPLATEPATH . '/inc/required-plugins.php');

function my_add_frontend_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('jquery-ui-tabs');
	wp_enqueue_script('jQhammer',THEMEURL.'/js/hammer.min.js');
	wp_enqueue_script('jQimgCompare',THEMEURL.'/js/jquery.images-compare.js');
	wp_enqueue_script('jQslick',THEMEURL.'/slick/slick.js');
	wp_enqueue_script('jQflip',THEMEURL.'/js/jquery.flip.min.js');
	wp_enqueue_script('prettyPhoto',THEMEURL.'/js/jquery.prettyPhoto.js');
}
add_action('wp_enqueue_scripts', 'my_add_frontend_scripts');

// Register Menus
if (function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
		  'main_menu' => 'Main Menu',
		  'foot_menu' => 'Footer Menu'
		)
	);
}

// Register Sidebars
if(function_exists('register_sidebar')) {	
	register_sidebar(array(
		'id'=> 'main-widget',
		'name'=> 'Main Sidebar', 
		'description' => '', 
		'before_widget' => '<div class="widget">', 
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h3>', 
		'after_title' => '</h3></div>'
	));
	
	register_sidebar(array(
		'id'=> 'home-widget',
		'name'=> 'Home Sidebar', 
		'description' => '', 
		'before_widget' => '<div class="widget">', 
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h3>', 
		'after_title' => '</h3></div>'
	));

	register_sidebar(array(
		'id'=> 'home-widget-left',
		'name'=> 'Home Sidebar Left', 
		'description' => '', 
		'before_widget' => '<div class="widget">', 
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h3>', 
		'after_title' => '</h3></div>'
	));
	
	register_sidebar(array(
		'id'=> 'home-widget-right',
		'name'=> 'Home Sidebar Right', 
		'description' => '', 
		'before_widget' => '<div class="widget">', 
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title"><h3>', 
		'after_title' => '</h3></div>'
	));	
}

// ACF Options Page Register
/*if(function_exists("register_options_page")) {
	register_options_page('General');
	register_options_page('Home');
	register_options_page('Header');	
	register_options_page('Footer');
}*/


function theme_setup() {
	
	// Add featured image support
	add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_setup');

//Removed website url on comment form
/*function disable_website_field($fields) {
	if(isset($fields['url'])) {
		print_r($fields['url']);
		die();
		unset($fields['url']);
	}
	return $fields;
}

add_filter('comment_form_default_fields', 'disable_website_field');*/



function crunchify_init() {
	add_filter('comment_form_defaults','crunchify_comments_form_defaults');
}
add_action('after_setup_theme','crunchify_init');
 
function crunchify_comments_form_defaults($default) {
	unset($default['comment_notes_after']);
	return $default;
}

/*function mg_project_posts() 
{
  $labels = array(
    'name' => _x('Projects', 'post type general name'),
    'singular_name' => _x('Project', 'post type singular name'),
    'add_new' => _x('Add Item', 'Project'),
    'add_new_item' => __('Add New Project'),
    'edit_item' => __('Edit Project'),
    'new_item' => __('New Project'),
    'all_items' => __('All Projects'),
    'view_item' => __('View Projects'),
    'search_items' => __('Search Projects'),
    'not_found' =>  __('No Projects found'),
    'not_found_in_trash' => __('No Projects found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Projects'

  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true, 
    'show_in_menu' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'has_archive' => true, 
    'hierarchical' => false,
    'menu_position' => 4
    //'supports' => array('title','thumbnail','editor')
  ); 
  register_post_type('projects',$args);
  

  $labels = array(
    'name' => _x( 'Type', 'taxonomy general name' ),
    'singular_name' => _x( 'Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Type' ),
    'all_items' => __( 'All Type' ),
    'parent_item' => __( 'Parent Type' ),
    'parent_item_colon' => __( 'Parent Type:' ),
    'edit_item' => __( 'Edit Type' ), 
    'update_item' => __( 'Update Type' ),
    'add_new_item' => __( 'Add New Type' ),
    'new_item_name' => __( 'New Type Name' ),
    'menu_name' => __( 'Type' ),
  );    
  register_taxonomy('project-type', 'projects', array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));
  
  flush_rewrite_rules();
}

add_action('init', 'mg_project_posts');*/
