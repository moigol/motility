<?php 
/*
Template Name: Welcome to Laser
*/
get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="page-content">
        	<div class="wrap about-us">
                <div class="pc">
                    <p class="pb"><?php echo apply_filters('the_content',get_field('welcome_content', $post->ID)); ?> </p>
                </div>
                <div class="clear"></div>
            
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="welcome-thumbnails">
            <div class="wrap">
				<?php foreach(get_field('welcome_thumbnails', $post->ID) as $wt) { ?> 
                <div class="<?php echo ($wt['width']=='full') ? 'wtfull' : 'wt'; ?> <?php echo $wt['position']; ?>">
                    <h2 class="title"><?php echo $wt['title']; ?></h2>
                    <img src="<?php echo $wt['image']; ?>" />
                    <p><?php echo $wt['content']; ?></p>
                </div>
                <?php } ?>                
                <div class="clear"></div>
            </div>
        </section>
        
        
        <section class="laser-services">
			<div class="wrap">
				<div class="services">
					<h2 class="title"><?php echo apply_filters('the_title',get_field('services_title', $post->ID)); ?></h2>
					<p><?php echo apply_filters('the_content',get_field('services_content_top', $post->ID)); ?> </p>
				</div>
				<div class="wrap ls">                
					<div class="ls-left">
						<h3 class="service-heading"><?php echo apply_filters('the_title',get_field('commercial_service_title', $post->ID)); ?></h3>
						<p class="pb"><?php echo apply_filters('the_content',get_field('commercial_service_content', $post->ID)); ?> </p>
						<div class="clear"></div>
					</div>

					<div class="ls-right">
						<h3 class="service-heading"><?php echo apply_filters('the_title',get_field('industrial_service_title', $post->ID)); ?></h3>
						<p class="pb"><?php echo apply_filters('the_content',get_field('industrial_service_content', $post->ID)); ?></p>
					</div>

					<div class="clear"></div>
				</div>
				<div class="services">
					<p><?php echo apply_filters('the_content',get_field('services_content_bottom', $post->ID)); ?> </p>
					<a href="<?php echo get_field('welcome_button_link', $p->ID); ?>" class="about-btn"><?php echo get_field('welcome_button_text', $p->ID); ?></a>
				</div>
            </div>
			
            <div class="clear"></div>
        </section>
        
        
        
<?php get_footer(); ?>