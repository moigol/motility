<?php 
/*
Template Name: Contact Us
*/
get_header(); ?>

	<?php echo get_template_part('heading'); ?>
    
    <section class="cf">
    	<div class="wrap">
        	<div class="fields">
            	<?php echo get_field('form_shortcode', $post->ID); ?>
            </div>
            <div class="address">
				<div class="info"><i class="fa fa-home" aria-hidden="true"></i> <?php echo get_field('address', $post->ID); ?></div>
            	<div class="info"><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:<?php echo get_field('email', $post->ID); ?>"><?php echo get_field('email', $post->ID); ?></a></div><div class="info"><i class="fa fa-phone-square" aria-hidden="true"></i> <a href="tel:4038005159"><?php echo get_field('phone', $post->ID); ?></a></div>
            </div>
            
            <div class="clear"></div>
		</div>
        
    </section>
        
<?php get_footer(); ?>