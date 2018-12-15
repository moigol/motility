<?php
/**
 * Plugin Name: MotilityNews
 * Description: MotilityNews View, put this shortcode '[news]' on the post wysiwyg where you want the newss to appear.
 * Author: Mo
 * Version: 1.00
 * Author URI: http://www.cutearts.org
*/

if(!class_exists('MotilityNews'))
{
    class MotilityNews 
    {
        static public function printScripts() 
        {
            wp_enqueue_script( 'newsScript' , plugins_url('/js/custom.js', __FILE__), array('jquery') );
			wp_register_style( 'newsStyle', plugins_url('/css/style.css', __FILE__) );
            wp_enqueue_style( 'newsStyle' );
        }

        static public function doShortCode($atts, $content = null) 
        {
            $return = '';
            
            $args = array(
                'post_type'     => 'post',
                'post_status'   => 'publish',
                'category'      => 1,
                'orderby'       => 'post_date',
                'order'         => 'DESC',
                'numberposts'   =>  -1
            );
            
            $news           = get_posts($args);
            $newsCounter     = 1;
            $newsCount      = count($news);
            $newsContents    = '';
            $newsPagination  = '';
            
            
            foreach($news as $news)
            {
                $newsContents .= '<div class="newsItem" id="news'.$news->ID.'">';
                $newsContents .= '<h3>'.apply_filters('the_title', $news->post_title).'</h3>';
                $newsContents .= '<p class="dateMeta">'.get_the_time('l, F j, Y',$news->ID).'</p>';
                $newsContents .= apply_filters('the_content', $news->post_content);
                $newsContents .= '</div>';
                
                $newsPagination .= '<li><a href="'.$newsCounter.'" rel="#news'.$news->ID.'" id="j'.$newsCounter.'">'.$newsCounter.'</a></li>';
                $newsCounter++;
            }
            
            $newsPagination = '<li><span class="prev">Forrige</span></li>'.$newsPagination.'<li><span class="next">Næste</span></li>';
            
            echo '<div class="newsItems" rel="'.$newsCount.'">'.$newsContents.'</div>';
            
            if($newsCount > 1)
            {
                echo '<ul class="newsPagination">'.$newsPagination.'</ul>';
            }
        }
    }
    
    add_action( 'wp_enqueue_scripts', 'MotilityNews::printScripts' );
    add_shortcode( 'news', 'MotilityNews::doShortCode' );
}