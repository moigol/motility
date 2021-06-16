<?php 
/*
Template Name: Equity
*/
get_header(); ?>

	<?php get_template_part('heading'); ?>
        
	<section class="main">
        <div class="wrap">
        	<div class="main-content">
            	<h2 class="page-content"><?php echo get_field('top_header', $post->ID); ?></h2>
                <?php echo get_field('top_content', $post->ID); ?>
                <div class="clear"></div>
            </div>
		</div>
        <div class="clear"></div>
    </section>

	<section class="sub">
        <div class="wrap">
        	<div class="content-box">
            	<h2 class="page-content"><?php echo get_field('situation_title', $post->ID); ?></h2>
            	<?php if(get_field('form', $post->ID)){ ?>
                	<?php echo get_field('form', $post->ID); ?>
                    <div class="clear"></div>
                <?php } else { ?>
                    <?php echo get_field('situation_text', $post->ID); ?>
                    <div class="gt-box" style="background: #017a96 left top no-repeat; background-size: contain;">
                        <img src="<?php echo get_field('bg_image', $post->ID); ?> " />
                        <div class="gt-text">
                            <div class="content"> <?php echo get_field('content_box', $post->ID); ?></div><br>
                            <a href="<?php echo get_field('button_link', $post->ID); ?>" class="btn"><?php echo get_field('button_text', $post->ID); ?></a>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
               	<?php } ?>
            </div>
        </div>
        <div class="clear"></div>
    </section>
        
<?php get_footer(); ?>