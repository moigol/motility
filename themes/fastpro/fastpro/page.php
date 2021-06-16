<?php 
/*
Template Name: Page
*/
get_header(); ?>

	<section class="page-header" style="background: url(http://fastprohomebuyers.com/wp-content/uploads/2017/12/no-low-equity-bg.jpg) center top no-repeat transparent;">
        <div class="wrap">
            <h2 class="heading"><?php the_title(); ?></h2>
        </div>
        <div class="clear"></div>
    </section>
        
	<section class="product-content">
        <div class="wrap">
        	<?php if(have_posts()): while(have_posts()): the_post();?>
        	<div class="page-cont">
        		<?php the_content(); ?>
            </div>
            <?php endwhile; endif;  ?>
            <div class="clear"></div>
        </div>
    </section>
        
<?php get_footer(); ?>