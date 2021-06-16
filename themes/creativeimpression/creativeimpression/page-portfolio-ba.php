<?php
/*
Template Name: Before and After
 */
get_header(); global $current_term; ?>			
    <section class="page-header">
        <div class="wrap">
            <h1 class="heading"><?php the_title(); ?></h1>
        </div>
        <div class="clear"></div>        
    </section>
    
    <section class="page-content">
        <div class="wrap projects">
            
            <?php 
                $term = get_field('portfolio_category', $post->ID);
                $tax = 'project-type'; // Your Taxonomy, change it if you not using wordpress native category
                                    
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                
                //Query argument for post
                $args = array( 
                    'post_type' => 'projects', // Or Custom Post Type, 
                    'paged' => $paged,
                    'order' => 'DESC', 
                    'orderby' => 'post_date',
                    'taxonomy' => $tax,
                    'posts_per_page' => 10, 
                    'term' => $term->slug, // Query posts for each term based on term slug
                    'meta_key'		=> 'show_before_and_after',
                    'meta_value'	=> 'yes'
                );
                $query = new WP_Query( $args ); 
                
                $term_slug = $term->slug;
                $term_link = get_term_link($term_slug, $tax);
                
                $posts = $query->get_posts();  
				$current_term = 'before-after-web-design'; 
				get_template_part('project','navigation');

                echo '<div id="'.$term_slug.'" class="project-wrap target">';
                if ( $posts ) {
                    foreach ( $posts as $post ) {                   
                        echo '<div class="project-items">
                             <div class="portfolio beforeandafter">
                                  <figure>
									  <div class="img-compare-holder" id="mo-ba-'. $post->ID .'">
										  <div class="js-img-compare">
											  <div style="display: none;">
												  <img src="'.get_field('project_before_image', $post->ID).'" width="100%" title="'.$post->post_title.'" alt="'.$post->post_title.'" alt="Before" />
											  </div>
											  <div>
												  <img src="'.get_field('project_after_image', $post->ID).'" width="100%" title="'.$post->post_title.'" alt="'.$post->post_title.'" alt="After" />
											  </div>
										  </div>
										  <div>
											  <button class="js-front-btn">Before</button>
											  <button class="js-back-btn">After</button>
											  <div class="clearfix"></div>
											  <a href="'.get_field('project_site_url', $post->ID).'" target="_blank">Visit Website</a>
										  </div>
									  </div> 
									  <div class="clearfix"></div>								  
                                  </figure>
                             </div>
                        </div> ';                   
                    }
                        
                }
                echo '</div>';              
             ?>
             <div class="pagination">
                  <?php wp_pagenavi( array( 'query' => $query ) ); ?>
            </div>
            <?php wp_reset_query(); ?>
            <div class="clearfix"></div>
        </div>            
    </section>
<?php get_footer(); ?>