<?php 
/*
Creative Impression - Web Design & Development Calgary
*/
global $post;
get_header(); ?>

		<section>
        	<div class="banner" style="background-image:url(<?php echo get_field('banner_background', $post->ID); ?>);">
            	<div class="banner-slider">
                <?php foreach(get_field('banners', $post->ID) as $b) { ?>
                    <div>
                        <div class="banner-item">
                            <div class="banner-content">
                                <h1 class="banner-title"><?php echo $b['text']; ?></h1>
                                <a href="<?php echo $b['link']; ?>" class="btn"><?php echo $b['button']; ?></a>
                            </div>
                            <div class="banner-image">
                                <img src="<?php echo $b['image']; ?>" alt="" />
                            </div>
                        </div>
                    </div>
                 <?php } ?>   
                 
              	</div>
            </div>
            <div class="clear"></div>
        </section>
        
        <section class="wwd">
            <div class="wrap what-we-do">
            	<h2 class="title"><?php echo get_field('what_we_do_text', $post->ID); ?></h2>
            	<div class="items">  
                	<?php foreach(get_field('what_we_do_item', $post->ID) as $wwd) { ?>          	
                    <div class="item">
						<div class="card"> 
							<div class="front"> 
								<a href="<?php echo $wwd['link']; ?>" class="img">
									<img class="imgg" src="<?php echo $wwd['image']; ?>" alt="" />
								</a>
							</div> 
							<div class="back">
								<a href="<?php echo $wwd['link']; ?>" class="img">
									<img class="imgg" src="<?php echo $wwd['image']; ?>" alt="" />
								</a>
							</div> 
						</div>
                    	
                        <a href="<?php echo $wwd['link']; ?>" class="ttl">
                        	<span class="heading"><?php echo $wwd['title']; ?></span>
                        </a>
						<span class="blurb"><?php echo $wwd['description']; ?></span>
                    </div>
                    <?php } ?> 
                </div>
            </div>
            <div class="clear"></div>
            
        </section>		

        <section>
            <div class="wrap clients">
            	<h3 class="title"><?php echo get_field('happy_client_text', $post->ID); ?></h3>
                <div class="testimonial-slide">
				<?php foreach(get_field('clients', $post->ID) as $hc) { ?> 
                  <div>
                  	<p class="client-text"><?php echo $hc['text']; ?></p>
                        <p class="client-name"><?php echo $hc['name']; ?></p>
                        <p class="client-position"><?php echo $hc['position']; ?></p>
                        <p class="client-company"><?php echo $hc['company']; ?></p>
                  </div>
				<?php } ?> 
                </div>
                
            </div>	
            <div class="clear"></div>
            
        </section>
        
        <section class="rp">
            <div class="wrap recent-projects">
            	<h3 class="title"><?php echo get_field('recent_project_text', $post->ID); ?></h3>
                <div class="rps"> 
                <?php 
					$args = array( 
						'post_type' => 'projects', // Or Custom Post Type, 
						'order' => 'DESC', 
						'orderby' => 'post_date',
						'posts_per_page' => 8
					);
					$query = new WP_Query( $args ); 
					$posts = $query->get_posts();  

					if ( $posts ) {
						foreach ( $posts as $p ) { ?>            	
                    <a href="<?php echo get_field('project_full_image', $p->ID); ?>" rel="prettyPhoto[<?php echo $term_slug; ?>]" class="project"><img src="<?php echo get_field('project_full_image', $p->ID); ?>" width="260" alt="" /></a>
                <?php } } ?> 
                </div>
                <a href="<?php echo get_field('project_button_link', $post->ID); ?>" class="btn"><?php echo get_field('project_button_text', $post->ID); ?></a>
            </div>	
            <div class="clear"></div>
            
        </section>
        
<?php get_footer(); ?>