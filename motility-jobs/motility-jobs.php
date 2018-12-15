<?php
/**
 * Plugin Name: MotilityJobs
 * Description: MotilityJobs View, put this shortcode '[motilityjobs]' on the post wysiwyg where you want the jobs to appear.
 * Author: Mo
 * Version: 1.00
 * Author URI: http://www.cutearts.org
*/

if(!class_exists('MotilityJobs'))
{
    class MotilityJobs 
    {
        static public function printScripts() 
        {
            wp_enqueue_script( 'jobsSmartPaginator' , plugins_url('/js/smartpaginator.js', __FILE__), array('jquery') );
            wp_enqueue_script( 'jobsScript' , plugins_url('/js/custom.js', __FILE__), array('jquery') );
            wp_register_style( 'jobsStyle', plugins_url('/css/style.css', __FILE__) );
            wp_enqueue_style( 'jobsStyle' );
        }

        static public function doShortCode() 
        {
            $return = '';
            
            $args = array(
                'post_type'     => 'motilityjobs',
                'post_status'   => 'publish',
                'orderby'       => 'menu_order',
                'order'         => 'ASC',
                'numberposts'   =>  -1
            );
            
            $jobs           = get_posts($args);
            $jobCounter     = 1;
            $jobsCount      = count($jobs);
            $jobContents    = '';
            $jobPagination  = '';
            
            
            foreach($jobs as $job)
            {
                $jobContents .= '<div class="jobItem" id="job'.$job->ID.'">';
                $jobContents .= apply_filters('the_content', $job->post_content);
                $jobContents .= '</div>';
                
                $jobPagination .= '<li><a href="'.$jobCounter.'" rel="#job'.$job->ID.'" id="j'.$jobCounter.'">'.$jobCounter.'</a></li>';
                $jobCounter++;
            }
            
            $jobPagination = '<li><span class="prev">Forrige</span></li>'.$jobPagination.'<li><span class="next">Næste</span></li>';
            
            echo '<div class="jobItems" rel="'.$jobsCount.'">'.$jobContents.'</div>';
            
            if($jobsCount > 1)
            {
                echo '<ul class="jobPagination">'.$jobPagination.'</ul>';
            }
            
        }
        
        static public function registerJobPostType()
        {
            register_post_type ( __('motilityjobs','hbthemes') , 
                        array(
                                'labels' => array ( 
                                        'name' => __('Jobs','hbthemes'),
                                        'all_items' => __( 'All Jobs' , 'hbthemes' ),
                                        'singular_name' => __( 'Job' , 'hbthemes' ) ,		
                                        'add_new' => __( 'Add New Job', 'hbthemes' ),
                                        'add_new_item' => __( 'Add New Job', 'hbthemes' ),
                                        'edit_item' => __( 'Edit Job', 'hbthemes' ),
                                        'new_item' =>  __( 'New Job', 'hbthemes' ),
                                        'view_item' =>  __( 'View Job', 'hbthemes' ),
                                        'search_items' =>  __( 'Search For Jobs', 'hbthemes' ),
                                        'not_found' =>  __( 'No Jobs found', 'hbthemes' ),
                                        'not_found_in_trash' => __( 'No Jobs found in Trash', 'hbthemes' ),
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
                                                'thumbnails',
                                                'editor',
                                                ),
                                'query_var' => false,
                                'exclude_from_search' => true,
                                'show_in_nav_menus' => false,
                        )
            );
        }
    }
    
    add_action( 'init', 'MotilityJobs::registerJobPostType' );
    add_action( 'wp_enqueue_scripts', 'MotilityJobs::printScripts' );
    add_shortcode( 'motilityjobs', 'MotilityJobs::doShortCode' );
}