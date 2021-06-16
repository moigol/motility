<?php 
/*
Template Name: Commercial
*/
get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="page-content">
        	<div class="wrap about-us">
                <div class="pc">
                    <h2 class="title"><?php echo apply_filters('the_title',get_field('commercial_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('commercial_content', $post->ID)); ?></p>
                </div>
                <div class="clear"></div>
            
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="commercial-section">
            <div class="wrap">
                <div class="cs">
                	<h2 class="title"><?php echo apply_filters('the_title',get_field('what_we_do_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('what_we_do_content', $post->ID)); ?> </p>
                </div>
                
                <div class="clear"></div>
            </div>
        </section>
        
        <section class="com-cat">
            <div class="wrap">
                <div class="cd">
                	<?php foreach(get_field('commercial_categories', $post->ID) as $cc) { ?> 
                    <div class="cat">
                        <h3 class="title"><span><?php echo $cc['title']; ?></span></h3>
                        <img src="<?php echo $cc['image']; ?>" />
                        <p class="pb"><?php echo $cc['content']; ?></p>
					</div>
                    <?php } ?>
					<div class="clear"></div>
                </div>
                
                <div class="clear"></div>
            </div>
        </section>
        
        <section class="commercial-section">
            <div class="wrap">
                <div class="cs">
                	<h2 class="title"><?php echo apply_filters('the_title',get_field('call_to_action_title', $post->ID)); ?></h2>
                    <p class="pb"><?php echo apply_filters('the_content',get_field('call_to_action_content', $post->ID)); ?> </p>
                    <a href="<?php echo get_field('call_to_action_link', $p->ID); ?>" class="about-btn"><?php echo get_field('call_to_action_button', $p->ID); ?></a>
                </div>
                
                <div class="clear"></div>
            </div>
        </section>
        
        
        
<?php get_footer(); ?>