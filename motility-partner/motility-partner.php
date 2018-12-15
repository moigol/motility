<?php
/**
 * Plugin Name: MotilityPartner
 * Description: MotilityPartner View, put this shortcode '[partners]' on the post wysiwyg where you want the partners to appear.
 * Author: Mo
 * Version: 1.00
 * Author URI: http://www.cutearts.org
*/

if(!class_exists('MotilityPartner'))
{
    class MotilityPartner 
    {
        static public function printScripts() 
        {
            wp_register_style( 'partnerStyle', plugins_url('/css/style.css', __FILE__) );
            wp_enqueue_style( 'partnerStyle' );
        }

        static public function doShortCode($atts, $content = null) 
        {
            extract(shortcode_atts(array(
		'columns' =>3,
		'number' =>-1
		), $atts));

            $output = '';
            
            if ($number) { $number = intval($number); }
            
            $loop = new WP_Query(array(
                    'post_type' =>__('partner', 'hbthemes'),
                    'orderby' =>'menu_order',
                    'order' =>'ASC',
                    'posts_per_page' =>$number
                    ));
            
            $post_count_partner = $loop->post_count;
            $counter = 0;

            while ($loop->have_posts()):$loop->the_post();
                    $counter++;
                    $last_column_class = "";
                    $thumb = get_post_thumbnail_id();
                    $image = hb_resize($thumb, '', 450, 301, true);
                    $full_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'original');
                    $default_img = get_option('siteurl').'/wp-content/plugins/motility-partner/default.png';
                    
                    $output .= '<div class="partnerItem">';
                    $output .= '<div class="partnerImg">';
                    if($full_thumb[0])
                    {
                        $output .= '<a href="' . $full_thumb[0] . '" class="fancybox"><img width="250" class="team-member-img" src="' . $full_thumb[0] . '"/></a>';
                    }
                    else 
                    {
                        $output .= '<a href="' . $default_img . '" class="fancybox"><img width="250" class="team-member-img" src="' . $default_img . '"/></a>';
                    }
                    $output .= '</div>';
                    $output .= '<div class="partnerContent">';
                    $output .= do_shortcode(get_the_content());
                    $output .= '</div>';                    
                    $output .= '<div class="clear"></div>';
                    $output .= '</div>';
                    
            endwhile;

            wp_reset_query();

            return '<div class="partnerItems">'.$output.'</div>';
        }
        
        static public function registerPostType()
        {
            register_post_type ( __('partner','hbthemes') , 
                        array(
                                'labels' => array ( 
                                        'name' => __('Partners','hbthemes'),
                                        'all_items' => __( 'All Partners' , 'hbthemes' ),
                                        'singular_name' => __( 'Partner' , 'hbthemes' ) ,		
                                        'add_new' => __( 'Add New Partner', 'hbthemes' ),
                                        'add_new_item' => __( 'Add New Partner', 'hbthemes' ),
                                        'edit_item' => __( 'Edit Partner', 'hbthemes' ),
                                        'new_item' =>  __( 'New Partner', 'hbthemes' ),
                                        'view_item' =>  __( 'View Partner', 'hbthemes' ),
                                        'search_items' =>  __( 'Search For Partners', 'hbthemes' ),
                                        'not_found' =>  __( 'No Partners found', 'hbthemes' ),
                                        'not_found_in_trash' => __( 'No Partners found in Trash', 'hbthemes' ),
                                        'parent_item_colon' => ''
                                ),
                                'public' => true,
                                'show_ui' => true,
                                '_builtin' => false,
                                '_edit_link' => 'post.php?post=%d',
                                'capability_type' => 'post',
                                'hierarchical' => false,
                                'menu_position' => 53,
                                'supports' => array(
                                                'title', 
                                                'page-attributes',
                                                'thumbnail',
                                                'editor',
                                                ),
                                'query_var' => false,
                                'exclude_from_search' => true,
                                'show_in_nav_menus' => false,
                        )
            );
        }
    }
    
    add_action( 'init', 'MotilityPartner::registerPostType' );
    add_action( 'wp_enqueue_scripts', 'MotilityPartner::printScripts' );
    add_shortcode( 'partners', 'MotilityPartner::doShortCode' );
}