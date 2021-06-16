<?php 
/*
Template Name: Contact Us
*/
get_header(); ?>

<?php echo get_template_part('heading'); ?>

	<section class="contact-form">
        <div class="wrap">
        	<?php if(have_posts()): while(have_posts()): the_post();?>
        	<h3 class="heading"><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <?php endwhile; endif;  ?>
            <div class="clear"></div>
        </div>
            </div>
        <div class="clear"></div>
        
    </section>
        
    <section class="location">
        <div class="wrap">
            <h3 class="heading"><?php echo apply_filters('the_title',get_field('location_header', $post->ID)); ?></h3>
            
            <div class="wrapper">
                <div class="address">
                    <h4><?php echo get_field('top_text', $post->ID); ?></h4>
                    <div class="a-icon"><img src="<?php echo IMG; ?>/address.png" /></div>  <div class="add-info"><?php echo get_field('address_info', $post->ID); ?></div>
                    <div class="clear"></div>
                    <div class="a-icon"><img src="<?php echo IMG; ?>/phone.png" /></div>  <div class="add-info"><a href="tel:<?php echo get_field('phone', $post->ID); ?>"><?php echo get_field('phone', $post->ID); ?></a></div>
                    <div class="clear"></div>
                    <div class="a-icon"><img src="<?php echo IMG; ?>/email.png" /></div>  <div class="add-info"><a href="mail:<?php echo get_field('email', $post->ID); ?>"><?php echo get_field('email', $post->ID); ?></a></div>
                    <div class="clear"></div>
                    <div class="a-icon"><img src="<?php echo IMG; ?>/time.png" /></div>  <div class="add-info"><?php echo get_field('time', $post->ID); ?></div>
                    <div class="clear"></div>
                </div>
                
                <div class="map">
                    <span><?php echo get_field('map_code', $post->ID); ?></span>
                </div>
                <div class="clear"></div>
            </div>
            
        </div>
    </section>

<?php get_footer(); ?>