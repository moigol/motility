<?php
/*
Template Name: Portfolio
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
                  $tax = 'project-type'; // Your Taxonomy, change it if you not using wordpress native category
                    $terms = get_terms( $tax ,array( // get all taxonomy terms
                        'orderby'    => 'name',
                        'order'      => 'ASC',
                        'hide_empty' => 0,
                    ));
					//print_r($terms);
					$cntrl = 0;
                    //Loop throug each taxonomy terms, 
                    foreach ( $terms as $term ) { $cntrl++;

                        //Query argument for post
                        $args = array( 
                            'post_type' => 'projects', // Or Custom Post Type, 
                            'order' => 'DESC', 
                            'orderby' => 'post_date',
                            'taxonomy' => $tax,
                            'posts_per_page' => 3, 
                            'term' => $term->slug, // Query posts for each term based on term slug
                        );
                        $query = new WP_Query( $args ); 
                        
                        $term_slug = $term->slug;
                        $term_link = get_term_link($term_slug, $tax);
                        
                        $posts = $query->get_posts();  
						//echo '<pre>';
						//print_r($posts);
                        echo '<h4 class="cat-title '.$term_slug.'">'.$term->name.'<a class="btn" href="'.SITEURL.'/'.$term_slug.'">See more</a></h4>';
						if($cntrl <= 1) {
						echo '<h4 class="cat-title before-and-after">Before & After Web Design <a class="btn" href="'.SITEURL.'/before-after-web-design/">Click Here</a></h4>';
						}
                        echo '<div class="project-wrap">';
                        if ( $posts ) {
                            foreach ( $posts as $post ) {                   
			                ?>
                                <div class="project-item <?php echo $term->name; ?>">
                                     <div class="portfolio">
                                          <div class="hoverInfo">
                                              <a href="<?php echo get_field('project_full_image', $post->ID); ?>" rel="prettyPhoto[<?php echo $term_slug; ?>]"><img src="https://creativeimpression.ca/wp-content/uploads/2017/08/ico-link.png" class="hvr-pulse-grow" alt="" /></a>
                                          </div>
                                          <figure>
                                     		  <img src="<?php echo get_field('project_full_image', $post->ID); ?>" width="350px" title="<?php the_title(); ?>" alt="<?php the_title(); ?>" />
                                          </figure>
                                     </div>
                                </div>                    
                            <?php }
                                
                        }
                        echo '</div>';
						echo '<div class="clearfix"></div>';
                    }                 
                 ?>
            </div>            
        </section>
<?php get_footer(); ?>