<?php 
/*
Template Name: Web Design
*/
get_header(); ?>
        
        <section class="page-header">
        	<div class="wrap">
        		<h1 class="heading"><?php echo get_field('web_design_title', $post->ID); ?></h1>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="page-content">
        	<div class="wrap">
        		<h4 class="title"><?php the_title(); ?></h4>
                <?php echo get_field('web_design_content', $post->ID); ?>
			<div class="clear"></div>
			<a href="<?php echo get_field('web_design_button_link', $post->ID); ?>" class="btn"><?php echo get_field('web_design_button_text', $post->ID); ?></a>
			</div>
        </section>
        
        <section>
        	<div class="wrap">
            	<div class="process">
                    <h2 class="title"><?php echo get_field('process_title', $post->ID); ?></h2>
					<div class="process-intro"><?php echo get_field('process_intro', $post->ID); ?></div>
                    <?php foreach(get_field('process_items', $post->ID) as $op) { ?>  
                    <div class="p-item">
                    	<img src="<?php echo $op['image']; ?>" />
                        <div class="p-item-r">
                            <h4 class="title"><?php echo $op['title']; ?></h4>
                            <?php echo $op['content']; ?>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <?php } ?> 
				</div>
            </div>
        </section>
        
        
        
<?php get_footer(); ?>