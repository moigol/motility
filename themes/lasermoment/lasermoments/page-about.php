<?php 
/*
Template Name: About
*/
get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="page-content">
        	<div class="wrap about-us">
            	<img src="<?php echo get_field('about_image', $post->ID); ?>" />
                <div class="pc">
                    <h2 class="title"><?php echo apply_filters('the_title',get_field('about_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('about_content', $post->ID)); ?></p>
                </div>
                <div class="clear"></div>
            
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="about-column">
            <div class="wrap ac">
                <div class="ac-left">
                	<h2 class="title"><?php echo apply_filters('the_title',get_field('mission_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('mission_content', $post->ID)); ?> </p>
                    <div class="clear"></div>
                </div>
                
                <div class="ac-right">
                	<h2 class="title"><?php echo apply_filters('the_title',get_field('vision_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('vision_content', $post->ID)); ?></p>
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