<?php get_header(); ?>

<section class="post">
	<div class="wrap">
    	<?php if(have_posts()): while(have_posts()): the_post(); ?>
            <a href="<?php echo the_permalink(); ?>"><h3><?php the_title(); ?></h3></a> 
            
            <?php echo the_content(); ?>
            <?php /*if(get_field('video_code', $post->ID)) { ?>
            	<?php echo get_field('video_code', $post->ID); ?>
            <?php } else { ?>
            	<img src="<?php echo get_field('featured_image', $post->ID); ?>" />
            <?php }*/ ?>
            
        <?php endwhile; endif; wp_reset_query(); ?>
    </div>	
</section>
<div class="clear"></div>

<?php get_footer(); ?>