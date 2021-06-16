<?php 
get_header(); ?>
<?php echo get_template_part('heading'); ?>    
	<section class="page-content">
        <div class="wrap">
        	<?php if(have_posts()): while(have_posts()): the_post();?>
        	<?php /*?><h3 class="heading"><?php the_title(); ?></h3><?php */?>
            <p><?php the_content(); ?></p>
            <?php endwhile; endif;  ?>
            <div class="clear"></div>
        </div>
            </div>
        <div class="clear"></div>
        
    </section>
        
<?php get_footer(); ?>