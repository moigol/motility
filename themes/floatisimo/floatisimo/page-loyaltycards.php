<?php 
/*
Template Name: Loyalty and Gift Cards
*/
get_header(); ?>

<?php echo get_template_part('heading'); ?>

    <section class="page-content">
        <div class="wrap">
        	<?php if(have_posts()): while(have_posts()): the_post();?>
            <p><?php the_content(); ?></p>
            <?php endwhile; endif;  ?>
            <div class="clear"></div>
        </div>
    </section>
    
	<section class="lg-cards">
    	<div class="wrap">
        	<div class="g-card">
            	<img src="<?php echo get_field('gift_card_image', $post->ID); ?>" />
                <div class="g-content">
                	<h4><?php echo get_field('gift_card_title', $post->ID); ?></h4>
                    <p><?php echo get_field('gift_card_content', $post->ID); ?></p>
                    <h5><?php echo get_field('gift_card_bottom_text', $post->ID); ?></h5>
                    <p><?php echo get_field('gift_card_bottom_content', $post->ID); ?></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="l-card">
            	<img src="<?php echo get_field('loyalty_card_image', $post->ID); ?>" />
                <div class="l-content">
                	<h4><?php echo get_field('loyalty_card_title', $post->ID); ?></h4>
                    <p><?php echo get_field('loyalty_card_content', $post->ID); ?></p>
                    <h5><?php echo get_field('loyalty_card_bottom_text', $post->ID); ?></h5>
                    <p><?php echo get_field('loyalty_card_bottom_content', $post->ID); ?></p>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
    </section>

<?php get_footer(); ?>

