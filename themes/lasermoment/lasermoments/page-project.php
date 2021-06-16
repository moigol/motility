<?php get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="post-content">
        	<div class="wrap">
                <?php the_content(); ?>
			<div class="clear"></div>
			</div> 
        </section>        
        
<?php get_footer(); ?>