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
define('AJAXLINK', SITEURL.'/ajax.php');

// URL Segment
$uri_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri_segments = '<script>document.write(document.location.hash)</script>';

// Required files
require_once (TEMPLATEPATH . '/inc/class-tgm-plugin-activation.php');
require_once (TEMPLATEPATH . '/inc/required-plugins.php');

use Dompdf\Dompdf;


function my_add_frontend_scripts() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-effects-core');
	wp_enqueue_script('jquery-ui-tabs');
  	wp_enqueue_script('bootstrap',THEMEURL.'/vendor/Bootstrap-v3/js/bootstrap.min.js');
	wp_enqueue_script('jQhammer',THEMEURL.'/js/hammer.min.js');
	wp_enqueue_script('jQimgCompare',THEMEURL.'/js/jquery.images-compare.js');
	wp_enqueue_script('jQslick',THEMEURL.'/slick/slick.js');
	wp_enqueue_script('jQflip',THEMEURL.'/js/jquery.flip.min.js');
	wp_enqueue_script('prettyPhoto',THEMEURL.'/js/jquery.prettyPhoto.js');
	wp_enqueue_script('wizard',THEMEURL.'/vendor/Bootstrap-v3/jquery.bootstrap.wizard.min.js');
  	wp_enqueue_script('BScolorpicker',THEMEURL.'/vendor/bgrins-spectrumColorpicker/spectrum.js');
  	wp_enqueue_script('jQfontselect', THEMEURL.'/vendor/fontselect-jquery/jquery.fontselect.js');
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
}

// ACF Options Page Register
if(function_exists("register_options_page")) {
	register_options_page('General');
	register_options_page('Home');
	register_options_page('Header');	
	register_options_page('Footer');
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

if ( ! function_exists('mg_custom_product') ) {

// Register Custom Post Type
function mg_custom_product() {

 $labels = array(
  'name'                  => _x( 'Products', 'Post Type General Name', 'mog' ),
  'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'mog' ),
  'menu_name'             => __( 'Products', 'mog' ),
  'name_admin_bar'        => __( 'Products', 'mog' ),
  'archives'              => __( 'Products', 'mog' ),
  'attributes'            => __( 'Products', 'mog' ),
  'parent_item_colon'     => __( 'Products:', 'mog' ),
  'all_items'             => __( 'All Products', 'mog' ),
  'add_new_item'          => __( 'Add New Product', 'mog' ),
  'add_new'               => __( 'Add New', 'mog' ),
  'new_item'              => __( 'New Product', 'mog' ),
  'edit_item'             => __( 'Edit Product', 'mog' ),
  'update_item'           => __( 'Update Product', 'mog' ),
  'view_item'             => __( 'View Product', 'mog' ),
  'view_items'            => __( 'View Products', 'mog' ),
  'search_items'          => __( 'Search Product', 'mog' ),
  'not_found'             => __( 'Not found', 'mog' ),
  'not_found_in_trash'    => __( 'Not found in Trash', 'mog' ),
  'featured_image'        => __( 'Featured Image', 'mog' ),
  'set_featured_image'    => __( 'Set featured image', 'mog' ),
  'remove_featured_image' => __( 'Remove featured image', 'mog' ),
  'use_featured_image'    => __( 'Use as featured image', 'mog' ),
  'insert_into_item'      => __( 'Insert into Product', 'mog' ),
  'uploaded_to_this_item' => __( 'Uploaded to this Product', 'mog' ),
  'items_list'            => __( 'Products list', 'mog' ),
  'items_list_navigation' => __( 'Product list navigation', 'mog' ),
  'filter_items_list'     => __( 'Filter products list', 'mog' ),
 );
 $args = array(
  'label'                 => __( 'Product', 'mog' ),
  'description'           => __( 'Products', 'mog' ),
  'labels'                => $labels,
  'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes' ),
  'hierarchical'          => false,
  'public'                => true,
  'show_ui'               => true,
  'show_in_menu'          => true,
  'menu_position'         => 5,
  'show_in_admin_bar'     => true,
  'show_in_nav_menus'     => true,
  'can_export'            => true,
  'exclude_from_search'   => false,
  'publicly_queryable'    => true,
  'capability_type'       => 'page',
	 'rewrite' => array( 'slug' => 'products' ),
 );
 register_post_type( 'custom_product', $args );
	flush_rewrite_rules();

}
add_action( 'init', 'mg_custom_product', 0 );
}



add_action( 'admin_menu', 'project_orders' );

/** Step 1. */
function project_orders() {
	add_options_page( 'My Project Orders', 'Project Orders', 'project_orders_options', 'project-orders', 'project_orders_options' );
}

/** Step 3. */
function project_orders_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	echo '<div class="wrap">';
	echo '<p>Here is where the form would go if I actually had options.</p>';
	echo '</div>';
}

function custom_project_page() {	
	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'mg' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'mg' ),
		'menu_name'           => __( 'Projects', 'mg' ),
		'name_admin_bar'      => __( 'Projects', 'mg' ),
		'parent_item_colon'   => __( 'Parent Project:', 'mg' ),
		'all_items'           => __( 'All Projects', 'mg' ),
		'add_new_item'        => __( 'Add New Project', 'mg' ),
		'add_new'             => __( 'Add New', 'mg' ),
		'new_item'            => __( 'New Project', 'mg' ),
		'edit_item'           => __( 'Edit Project', 'mg' ),
		'update_item'         => __( 'Update Project', 'mg' ),
		'view_item'           => __( 'View Project', 'mg' ),
		'search_items'        => __( 'Search Projects', 'mg' ),
		'not_found'           => __( 'Not found', 'mg' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'mg' ),
	);

	$args = array(
		'label'               => __( 'project', 'mg' ),
		'description'         => __( 'Project', 'mg' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'page-attributes' ),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'project', $args );	
}

add_action( 'init', 'custom_project_page', 0 );