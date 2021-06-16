<?php 
/*
Template Name: About Creative Impression
*/
get_header(); ?>
        
        <section class="page-header">
        	<div class="wrap">
        		<h1 class="heading"><?php the_title(); ?></h1>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="page-content">
        	<div class="wrap">
        		<h4 class="title"><?php echo get_field('about_title', $post->ID); ?></h4>
                <?php echo get_field('about_content', $post->ID); ?>
			<div class="clear"></div>
			</div>
        </section>
        
        <section class="column mv" style="background-image:url(<?php echo get_field('about_bg', $post->ID); ?>);">
        	<div class="wrap">
            	<div class="column-left">
					<div class="content">
						<h4 class="tw"><?php echo get_field('mv_title', $post->ID); ?></h4>
						<?php echo get_field('mv_content', $post->ID); ?>
					</div>
					<div class="clear"></div>
                </div>
                
                <div class="column-right">
					<div class="content">
						<h4 class="tw"><?php echo get_field('wmud_title', $post->ID); ?></h4>
						<?php echo get_field('wmud_content', $post->ID); ?>
					</div>
					<div class="clear"></div>
                </div>
				<div class="clear"></div>
            </div>
            <div class="clear"></div>
        </section>
        
        
        
<?php get_footer(); ?>