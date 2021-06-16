<?php
/*
Template Name: Portfolio Archive
 */
get_header(); ?>			
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
                    'posts_per_page' => 18, 
                    'term' => $term->slug
                );
                $query = new WP_Query( $args ); 
                
                $term_slug = $term->slug;
                $term_link = get_term_link($term_slug, $tax);
                
                $posts = $query->get_posts();  
				
				$current_term = $term->slug; 
				get_template_part('project','navigation');
				
				$tabitems .= '<div id="'.$term_slug.'" class="project-wrap target">';
				if ( $posts ) {
					foreach ( $posts as $post ) {                   
						$tabitems .= '<div class="project-item '.$term->name.'">
							 <div class="portfolio">
								  <div class="hoverInfo">
									  <a href="'. get_field('project_full_image', $post->ID).'" rel="prettyPhoto['.$term_slug.']"><img src="https://creativeimpression.ca/wp-content/uploads/2017/08/ico-link.png" class="hvr-pulse-grow" alt="" /></a>
								  </div>
								  <figure>
									  <img src="'.get_field('project_full_image', $post->ID).'" width="350px" title="'.$post->post_title.'" alt="'.$post->post_title.'" />
								  </figure>
							 </div>
						</div> ';                   
					}
						
				}
				$tabitems .= '</div>';                
                 ?>
                 <?php echo $tabitems; ?>
                 <div class="pagination">
					  <?php wp_pagenavi( array( 'query' => $query ) ); ?>
                </div>
                <?php wp_reset_query(); ?>
                <div class="clearfix"></div>
            </div>            
        </section>
<?php get_footer(); ?>