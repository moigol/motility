<?php
// Definitions
define('THEME', 'VMF');
define('PREFIX', THEME.'_');
define('PREMETA', '_'.THEME.'_');
define('THEMENAME', 'Victoria McDonald Fitness');
define('SITEURL', get_bloginfo('url'));
define('THEMEURL', get_bloginfo('template_url')); // Or TEMPLATEPATH (UNIX)
define('IMG', THEMEURL.'/img');
define('JS', THEMEURL.'/js'); 
define('CSS', THEMEURL.'/css'); 
//define('INC', THEMEURL.'/Inc');


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
	//wp_enqueue_script('jQhammer',THEMEURL.'/js/hammer.min.js');
	//wp_enqueue_script('jQimgCompare',THEMEURL.'/js/jquery.images-compare.js');
	wp_enqueue_script('jQslick',THEMEURL.'/slick/slick.js');
	//wp_enqueue_script('jQflip',THEMEURL.'/js/jquery.flip.min.js');
	wp_enqueue_script('prettyPhoto',THEMEURL.'/js/jquery.prettyPhoto.js');
}

add_action('wp_enqueue_scripts', 'my_add_frontend_scripts');

// Register Menus

if (function_exists('register_nav_menus')) {
	register_nav_menus(
		array(
		  'main_menu' => 'Main Menu',
		  'footer_menu' => 'Footer Menu',
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
		'id'=> 'footer-widget',
		'name'=> 'Footer Widget', 
		'description' => '', 
		'before_widget' => '<div class="footer-column">', 
		'after_widget' => '</div>',
		'before_title' => '<h3>', 
		'after_title' => '</h3>'
	));
}


// ACF Options Page Register
if(function_exists("register_options_page")) {
	register_options_page('Site Options');
}

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

function mg_programs_posts() 
{
  $labels = array(
    'name' => _x('Programs', 'post type general name'),
    'singular_name' => _x('Program', 'post type singular name'),
    'add_new' => _x('Add Item', 'Program'),
    'add_new_item' => __('Add New Program'),
    'edit_item' => __('Edit Program'),
    'new_item' => __('New Program'),
    'all_items' => __('All Programs'),
    'view_item' => __('View Programs'),
    'search_items' => __('Search Programs'),
    'not_found' =>  __('No Programs found'),
    'not_found_in_trash' => __('No Programs found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Programs'

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
    'menu_position' => 4,
	'menu_icon' => get_template_directory_uri() . "/img/news.png",
    'supports' => array('title','thumbnail','editor',"slug")
  ); 
  register_post_type('programs',$args);
  
  flush_rewrite_rules();
}

add_action('init', 'mg_programs_posts');


function mg_online_coaching_posts() 
{
  $labels = array(
    'name' => _x('Online Coaching', 'post type general name'),
    'singular_name' => _x('Coaching', 'post type singular name'),
    'add_new' => _x('Add Item', 'Coaching'),
    'add_new_item' => __('Add New Coaching'),
    'edit_item' => __('Edit Coaching'),
    'new_item' => __('New Coaching'),
    'all_items' => __('All Online Coaching'),
    'view_item' => __('View Online Coaching'),
    'search_items' => __('Search Online Coaching'),
    'not_found' =>  __('No Online Coaching found'),
    'not_found_in_trash' => __('No Online Coaching found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Online Coaching'

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
    'menu_position' => 4,
	'menu_icon' => get_template_directory_uri() . "/img/news.png"
    //'supports' => array('title','thumbnail','editor')
  ); 
  register_post_type('online_coaching',$args);
  
  flush_rewrite_rules();
}

add_action('init', 'mg_online_coaching_posts');

function mg_videos_posts() 
{
  $labels = array(
    'name' => _x('Videos', 'post type general name'),
    'singular_name' => _x('Video', 'post type singular name'),
    'add_new' => _x('Add Item', 'Video'),
    'add_new_item' => __('Add New Video'),
    'edit_item' => __('Edit Video'),
    'new_item' => __('New Video'),
    'all_items' => __('All Videos'),
    'view_item' => __('View Videos'),
    'search_items' => __('Search Videos'),
    'not_found' =>  __('No Videos found'),
    'not_found_in_trash' => __('No Videos found in Trash'), 
    'parent_item_colon' => '',
    'menu_name' => 'Videos'

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
    'menu_position' => 4,
    'menu_icon' => get_template_directory_uri() . "/img/news.png",
    'supports' => array('title','thumbnail','editor',"slug")
  ); 
  register_post_type('video',$args);
  
  flush_rewrite_rules();
}

add_action('init', 'mg_videos_posts');