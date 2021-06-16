<?php 
/*
Template Name: Industrial
*/
get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="page-content">
        	<div class="wrap about-us">
                <div class="pc">
                    <h2 class="title"><?php echo apply_filters('the_title',get_field('industrial_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('industrial_content', $post->ID)); ?></p>
                </div>
                <div class="clear"></div>
            
            </div>
            <div class="clear"></div>
            
        </section>
        
		<section class="industrial-thumbnails">
            <div class="wrap">
            	<?php foreach(get_field('industrial_thumbnails', $post->ID) as $it) { ?> 
            	<img src="<?php echo $it['image']; ?>" />
                <div class="it-content">
                	<h2 class="title"><?php echo $it['title']; ?></h2>
                    <p><?php echo $it['content']; ?></p>
                    <div class="clear"></div>
                </div>
				<div class="clear"></div>
				<?php } ?>   
            </div>
            
        </section>
        
        <section class="laser-services">
            <div class="wrap">
                <div class="services">
                	<h2 class="title"><?php echo apply_filters('the_title',get_field('industrial_bottom_title', $post->ID)); ?></h2>
                    <p><?php echo apply_filters('the_content',get_field('industrial_bottom_content', $post->ID)); ?> </p>
                    <a href="<?php echo get_field('industrial_button_link', $p->ID); ?>" class="about-btn"><?php echo get_field('industrial_button_text', $p->ID); ?></a>
                </div>
                
                <div class="clear"></div>
            </div>
        </section>
        
        
<?php get_footer(); ?>