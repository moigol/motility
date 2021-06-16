<?php 
/*
Template Name: Foreclosure
*/
get_header(); ?>

	<?php get_template_part('heading'); ?>
        
	<section class="main">
        <div class="wrap">
        	<div class="main-content">
            	<h2 class="page-content"><?php echo get_field('foreclosure_title', $post->ID); ?></h2>
                <?php echo get_field('foreclosure_content', $post->ID); ?>
                <div class="clear"></div>
            </div>
		</div>
        <div class="clear"></div>
    </section>

	<section class="sub process">
        <div class="wrap">
        	<div class="content-box">
            	<h2 class="page-content"><?php echo get_field('process_title', $post->ID); ?></h2>
                <div class=""><?php echo get_field('process_content', $post->ID); ?></div>
            </div>
        </div>
        <div class="clear"></div>
    </section>
    
    <section class="bottom learn" style="background: url(<?php echo get_field('learn_the_process_bg', $post->ID); ?>) center top no-repeat transparent;">
        <div class="wrap">
        	<div class="main-content request">
                <h3><?php echo get_field('learn_the_process_title', $post->ID); ?></h3>
                <div class="content"><?php echo get_field('learn_the_process_content', $post->ID); ?></div>
                <a href="<?php echo get_field('download_link', $post->ID); ?>" class="btn"><?php echo get_field('download_button', $post->ID); ?></a> <a href="<?php echo get_field('contact_link', $post->ID); ?>" class="btn"><?php echo get_field('contact_button', $post->ID); ?></a>
                <div class="clear"></div>
            </div>
            
            
		</div>
        <div class="clear"></div>
    </section>
        
<?php get_footer(); ?>