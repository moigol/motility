<?php
/**
 * Plugin Name: MotilityStaff
 * Description: MotilityStaff View, put this shortcode '[staffs]' on the post wysiwyg where you want the staffs to appear.
 * Author: Mo G
 * Version: 1.00
 * Author URI: https://www.movidev.com/
*/

if(!class_exists('MotilityStaff'))
{
    class MotilityStaff 
    {
        static public function resizeImg($img,$w=NULL,$h=NULL)
        {
            $width = '';
            $height = '';
            if($w != NULL)
            {
                $width = '&width='.$w;
            }
            if($w != NULL)
            {
                $height = '&height='.$h;
            }
            return get_option('siteurl').'/imgresize/?image='.$img.$width.$height;
        }
        
        static public function printScripts() 
        {
            wp_register_style( 'staffStyle', plugins_url('/css/style.css', __FILE__) );
            wp_enqueue_style( 'staffStyle' );
        }

        static public function doShortCode($atts, $content = null) 
        {
            extract(shortcode_atts(array(
		'columns' =>3,
		'number' =>-1,
		'departments' =>''
		), $atts));

            $output = '';
            $dept_new = string_to_array_names_categories($departments);
            
            if ($number) { $number = intval($number); }

            if ($departments) {
                    $loop = new WP_Query(array(
                            'post_type' =>__('staff', 'hbthemes'),
                            'orderby' =>'menu_order',
                            'order' =>'ASC',
                            'posts_per_page' =>$number,
                            'tax_query' =>array(
                                    array(
                                            'taxonomy' =>'staff_departments',
                                            'field' =>'slug',
                                            'terms' =>$dept_new
                                            )
                                    )
                            ));

            } else {
                    $loop = new WP_Query(array(
                            'post_type' =>__('staff', 'hbthemes'),
                            'orderby' =>'menu_order',
                            'order' =>'ASC',
                            'posts_per_page' =>$number
                            ));
            }


            $post_count_staff = $loop->post_count;
            $counter = 0;

            while ($loop->have_posts()):$loop->the_post();
                    $counter++;
                    $last_column_class = "";
                    $thumb = get_post_thumbnail_id();
                    $image = hb_resize($thumb, '', 150, 150, true);
                    $full_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'original');
                    $default_img = get_option('siteurl').'/wp-content/plugins/motility-staff/default.png';
                    
                    $last_column_class = $counter % $columns == 0 ? ' lastItem' : '';

                    $output .= '<div class="staffItem' . $last_column_class . '">';
                    $output .= '<div class="team-member-box">';
                    if($image['url'])
                    {
                        $output .= '<a href="' . $full_thumb[0] . '" style="background:url('.self::resizeImg($full_thumb[0],150).') no-repeat center center transparent;" class="fancybox">&nbsp;</a>';
                    }
                    else 
                    {
                        $output .= '<a href="' . $default_img . '" class="fancybox"><img width="150" class="team-member-img" src="' . $default_img . '"/></a>';
                    }
                    $output .= '<div class="team-member-description">';
                    $output .= '<div class="team-header-info clearfix">';
                    $output .= '<h4 class="team-member-name">' . get_the_title() . '</h4>';
                    $output .= '<h4 class="team-member-name">' . get_post_meta(get_the_ID(), 'hb_team_member_position', true) . '</h4>';
                    $output .= '<h5>' . get_post_meta(get_the_ID(), '_staff_phone', true) . '</h5>';
                    $output .= '<h5>' . get_post_meta(get_the_ID(), '_staff_email', true) . '</h5>';
                    $output .= '<div class="social-list clearfix">';
                    $output .= '<ul class="social">';

                    $social_links = get_staff_social_links(get_the_ID());
                    if (!empty($social_links)) {

                            foreach ($social_links as $soc_network => $soc_link) {
                                    $output .= '<li><a class="' . $soc_network . '" href="' . $soc_link . '" target="_blank"></a></li>';
                            }
                    }
                    $output .= '</ul>';
                    $output .= '</div>';

                    $output .= '</div>';

                    $output .= '<div class="team-member-content">';
                    $output .= do_shortcode(get_the_content());
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    
                    if ($counter % $columns == 0 && $counter != $post_count_staff) {
                            $output .= '<div class="clear"></div>';
                            $output .= '<div class="spacer"></div>';
                    } else if ($counter == $post_count_staff) {
                            $output .= '<div class="clear"></div>';
                    }

            endwhile;

            wp_reset_query();

            return '<div class="staffItems">'.$output.'</div>';
        }
        
        static public function metaBox() 
        {
            $screens = array( 'staff' );
            foreach ($screens as $screen) {
                 add_meta_box('staff_box', __( 'Contact Info', 'motility' ), 'MotilityStaff::metaBoxView', $screen, 'side', 'high'
                );
            }
        }
        
        static public function metaBoxView( $post ) 
        {
            wp_nonce_field( plugin_basename( __FILE__ ), 'motility_nonce' );
            echo '<div class="misc-publishing-actions" style="padding:10px 0;"><table><tr><td>';
                 _e("Phone: ", 'motility' );
            echo '</td><td>';
            echo '<input type="text" id="_staff_phone" name="_staff_phone" value="'.get_post_meta( $post->ID, '_staff_phone', true ).'" style="width:208px;"/>';
            echo '</td></tr><tr><td>';
                 _e("Email: ", 'motility' );
            echo '</td><td> ';
            echo '<input type="text" id="_staff_email" name="_staff_email" value="'.get_post_meta( $post->ID, '_staff_email', true ).'" style="width:208px;"/>';
            echo '</td></tr></table></div>';
        }
        
        static public function saveMeta( $post_id ) 
        {
            if ( 'page' == $_POST['post_type'] ) 
            {
                if ( ! current_user_can( 'edit_page', $post_id ) )
                    return;
            } 
            else 
            {
                if ( ! current_user_can( 'edit_post', $post_id ) )
                return;
            }

            if ( ! isset( $_POST['motility_nonce'] ) || ! wp_verify_nonce( $_POST['motility_nonce'], plugin_basename( __FILE__ ) ) )
            return;

            $phone = sanitize_text_field( $_POST['_staff_phone'] );
            $email = sanitize_text_field( $_POST['_staff_email'] );

            add_post_meta($post_id, '_staff_phone', $phone, true) or update_post_meta($post_id, '_staff_phone', $phone);
            add_post_meta($post_id, '_staff_email', $email, true) or update_post_meta($post_id, '_staff_email', $email);
        }
    }
    
    add_action( 'add_meta_boxes', 'MotilityStaff::metaBox' );
    add_action( 'save_post', 'MotilityStaff::saveMeta' );
    add_action( 'wp_enqueue_scripts', 'MotilityStaff::printScripts' );
    add_shortcode( 'staffs', 'MotilityStaff::doShortCode' );
}