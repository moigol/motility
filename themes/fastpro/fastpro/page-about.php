<?php 
/*
Template Name: About
*/
get_header(); ?>
<?php global $post; ?>
	<section class="page-header about" style="background: url(<?php echo get_field('header_background_image', $post->ID); ?>) center top no-repeat #00a7f6;">
        <div class="wrap">
            <h2 class="heading"><?php the_title(); ?></h2>
            <div class="header-content"><?php echo (get_field('header_content', $post->ID)) ? get_field('header_content', $post->ID) : ''; ?></div>
        </div>
        <div class="clear"></div>
    </section>
    

	<section class="services">
        <div class="wrap">
        	<h3 class="page-content"><?php echo get_field('service_title', $post->ID); ?></h3>
			<?php foreach(get_field('services', $post->ID) as $s) { ?>
            <div class="service-box">
                <div class="content"><?php echo $s['content']; ?></div>
                <span class="number"><?php echo $s['number']; ?></span>
			</div>
            <?php } ?> 
        </div>
        <div class="clear"></div>
    </section>
    
	<section class="objectives" style="background: url(<?php echo get_field('bottom_bg', $post->ID); ?>) center top no-repeat transparent;">
        <div class="wrap">
        	<div class="mv">
                <div class="mission">
                    <h3><?php echo get_field('mission_header', $post->ID); ?></h3>
                    <div class="text"><?php echo get_field('mission_content', $post->ID); ?></div>
                </div>
                <div class="vision">
                    <h3><?php echo get_field('vision_header', $post->ID); ?></h3>
                    <div class="text"><?php echo get_field('vision_content', $post->ID); ?></div>
                </div>
                <div class="clear"></div>
			</div>
            <div class="core">
            	<h3><?php echo get_field('core_title', $post->ID); ?></h3>
                <div class="desktop-content"><?php echo get_field('core_content', $post->ID); ?></div>
                <div class="mobile-content">
                	<ul>
                    	<li>Honesty</li>
                        <li>Patience</li>
                        <li>Positivity</li>
                        <li>respect consistency</li>
					</ul>
                </div>
            </div>
		</div>
        <div class="clear"></div>
    </section>
        
<?php get_footer(); ?>