<?php 
/*
Template Name: Contact
*/
get_header(); ?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="page-content">
        	<div class="wrap contact-us">
                <div class="cu-left">
                	<h4 class="title"><?php echo get_field('address_title', $post->ID); ?></h4>
                    <div class="a-icon"><i class="fa fa-map-o"></i></div>  <div class="add-info"><?php echo get_field('contact_address', $post->ID); ?><br/><a href="<?php echo get_field('direction_link', $post->ID); ?>"><?php echo get_field('direction_text', $post->ID); ?></a></div>
                    <div class="clear"></div>
                    <div class="a-icon"><i class="fa fa-phone"></i></div>  <div class="add-info"><?php echo get_field('contact_phone', $post->ID); ?></div>
                    <div class="clear"></div>
                    <div class="a-icon"><i class="fa fa-envelope-o"></i></div>  <div class="add-info"><a href="<?php echo get_field('contact_email', $post->ID); ?>"><?php echo get_field('contact_email', $post->ID); ?></a></div>
                    <div class="clear"></div>
                    <div class="a-icon"><i class="fa fa-clock-o"></i></div>  <div class="add-info"><?php echo get_field('contact_time', $post->ID); ?></div>
                    <div class="clear"></div>
                    
                    <h4 class="title s"><?php echo get_field('social_follow_title', $post->ID); ?></h4>
						<?php foreach(get_field('social_follow', $post->ID) as $sf) { ?> 
                            <div>
                                <p><a class="sf" href="<?php echo $hc['link']; ?>"><img src="<?php echo $sf['icon']; ?>"></a></p>
                            </div>
                        <?php } ?> 
                    <div class="clear"></div>
                </div>
                
                <div class="cu-right">
                	<h2 class="title"><?php echo get_field('contact_title', $post->ID); ?></h2>
					<div class="cform">
						<?php echo get_field('contact_form', $post->ID); ?>
					</div>
                    
                </div>
                
                <div class="clear"></div>
            </div>
            
            
        </section>
        
        
        
<?php get_footer(); ?>