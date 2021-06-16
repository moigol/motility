<?php 
/*
Template Name: Printing
*/
get_header(); ?>
        
        <section class="page-header">
        	<div class="wrap">
        		<h1 class="heading"><?php the_title(); ?></h1>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="page-content-left" style="background-image:url(<?php echo get_field('printing_background_image', $post->ID); ?>);">
        	<div class="wrap left-content">
        		<h4 class="title"><?php echo get_field('printing_title', $post->ID); ?></h4>
                <?php echo get_field('printing_content', $post->ID); ?>
                <div class="clear"></div>
			<a href="<?php echo get_field('printing_button_link', $post->ID); ?>" class="btn"><?php echo get_field('printing_button_text', $post->ID); ?></a>
			</div>
            
            <div class="clear"></div>
        </section>        
        
        
<?php get_footer(); ?>