<?php 
/*
Template Name: Graphic Design
*/
get_header(); ?>
        
        <section class="page-header">
        	<div class="wrap">
        		<h1 class="heading"><?php echo get_field('graphic_design_title', $post->ID); ?></h1>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="page-content-left" style="background-image:url(<?php echo get_field('graphic_design_bg', $post->ID); ?>);">
        	<div class="wrap left-content">
        		<h4 class="title"><?php the_title(); ?></h4>
                <?php echo get_field('graphic_design_content', $post->ID); ?>
                <div class="clear"></div>
			<a href="<?php echo get_field('graphic_design_button_link', $post->ID); ?>" class="btn"><?php echo get_field('graphic_design_button_text', $post->ID); ?></a>
			</div>
            
            <div class="clear"></div>
        </section>        
        
        
<?php get_footer(); ?>