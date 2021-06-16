<?php 
/*
Template Name: Home
*/
get_header(); ?>

		<section>
        	<div class="banner">
                
                <div class="banner-content">
                    <div class="banner-slider">
                    	<?php foreach(get_field('banners', $post->ID) as $b) { ?>
                        <div>
                            <h1 class="banner-text"><?php echo $b['text']; ?></h1>
                            <div class="clear"></div>
                            <a href="<?php echo $b['link']; ?>" class="banner-btn"><?php echo $b['button']; ?></a>
                      	</div>
                        <?php } ?>
                   	</div>
                </div>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="wb">
        	<div class="banner-column">
            	<div class="commercial">
                	<h3><?php echo get_field('column_left_title', $post->ID); ?></h3>
                    <div class="red-line"></div>
                    <a href="<?php echo get_field('column_left_link', $p->ID); ?>" class="com-btn"><?php echo get_field('column_left_button', $post->ID); ?></a>
                    <div class="bc-text com-text">
                    	<p><?php echo get_field('column_left_content', $p->ID); ?></p>
                    </div>
                    <img src="<?php echo get_field('column_left_image', $p->ID); ?>">
                </div>
                
                <div class="industrial">
                	<h3><?php echo get_field('column_right_title', $post->ID); ?></h3>
                    <div class="red-line"></div>
                    <a href="<?php echo get_field('column_right_link', $p->ID); ?>" class="ind-btn"><?php echo get_field('column_right_button', $post->ID); ?></a>
                    <div class="bc-text ind-text">
                    	<p><?php echo get_field('column_right_content', $p->ID); ?></p>
                    </div>
                    <img src="<?php echo get_field('column_right_image', $p->ID); ?>">
                </div>
                <div class="clear"></div>
            </div>
        </section>
        
        <section class="about">
        	<div class="wrap home-about">
            	<img src="<?php echo get_field('about_image', $p->ID); ?>">
                <div class="a-content">
                    <h2 class="title"><?php echo get_field('about_title', $p->ID); ?></h2>
                    <p><?php echo get_field('about_content', $p->ID); ?></p>
                    <a href="<?php echo get_field('about_button_link', $p->ID); ?>" class="about-btn"><?php echo get_field('about_button_text', $p->ID); ?></a>
                </div>
                <div class="clear"></div>
            </div>
            
        </section>		

        <section class="wn">
        	<div class="news">
            <div class="news-item">
                    <h3 class="title"><?php echo get_field('news', $post->ID); ?></h3>
                    <ul>
                    
                    <?php
						$args = array(
							'post_type'      => 'post',
							'orderby'        => 'post_date',
							'order'          => 'DESC',
							'posts_per_page' => 3
							);
						query_posts( $args );
						if(have_posts()): while(have_posts()): the_post(); ?>
                            <li class="n-item <?php echo $post->ID; ?>">
                            <div class="">
                                <h4 class="heading"><?php the_title(); ?></h4>  
                                <span class="date"><?php the_time('F d, Y'); ?></span>             
                                <?php if ( has_post_thumbnail() ) { ?>
                            	<img src="<?php the_post_thumbnail_url(); ?>" />
                                <?php } ?>
                                <p><?php echo the_excerpt(); ?></p>
                                <span class="r-more"><a href="<?php echo the_permalink(); ?>">Read more</a></span>
                            </div>		
                            <p><span class="comments"><i class="fa fa-comments-o"></i> <?php comments_number( 'no responses', 'one response', '% responses' ); ?></span> <span class="social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></span></p>
                            <div class="clear"></div>
                        </li>
						<?php endwhile; endif; 
						wp_reset_query();
						?>
                
                        
                    </ul>
                    
                </div>
                
                <div class="sidebar">
                    <?php dynamic_sidebar('home-widget'); ?>
                </div>
                <div class="clear"></div>
            </div>
            
            
        </section>
        
      <section class="cl">
        	<div class="wrap clients">
                <h2 class="c-title"><?php echo get_field('client_header', 'option'); ?></h2>
                <div class="boxes">
					<?php foreach(get_field('client', 'option') as $c) { ?> 
						<div>        	
                            <a href="<?php echo $c['link']; ?>" class="c-logo"><img src="<?php echo $c['image']; ?>" /></a>
                    	</div>
                    <?php } ?>
                </div>
            </div>
            <div class="clear"></div>
            
        </section>
        
<?php get_footer(); ?>