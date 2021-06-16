<?php 
/*
Template Name: Services
*/
get_header(); ?>

	<?php get_template_part('heading'); ?>
        
	<section class="main">
        <div class="wrap">
        	<div class="main-content service">
                <h3><?php echo get_field('top_content', $post->ID); ?></h3>
                <div class="clear"></div>
            </div>
		</div>
        <div class="clear"></div>
    </section>

	<section class="sub sale">
        <div class="wrap">
        	<?php foreach(get_field('custom_sale', $post->ID) as $cs) { ?> 
        	<div class="cs-box">
            	
                <div class="cs-content">
                    <div class="cs-title">
                        <h2><?php echo $cs['title']; ?></h2>
                    </div>
                	<p><?php echo $cs['content']; ?></p>
                </div>
            </div>
            <?php } ?>  
		<div class="clear"></div>
        </div>
    </section>
    
    <section class="bottom">
        <div class="wrap">
        	<div class="main-content request">
                <span class="bc"><?php echo get_field('bottom_content', $post->ID); ?></span>
                <div class="clear"></div>
            </div>
            
            <a href="<?php echo get_field('consultation_link','options'); ?>" class="btn"><?php echo get_field('consultation_text','options'); ?></a>
		</div>
        <div class="clear"></div>
    </section>
        
<?php get_footer(); ?>