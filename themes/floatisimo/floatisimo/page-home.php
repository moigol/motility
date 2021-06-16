<?php 
/*
Template Name: Home
*/
get_header(); ?>

		<section class="banner">
        	<div class="wrap">
            	<div class="banner-slider">
					<?php foreach(get_field('banners', $post->ID) as $b) { ?> 
                    <div>
                    <div class="slide" style="background: url(<?php echo $b['background_image']; ?>) center top no-repeat transparent;">
                        <div class="banner-content">
                            <span><?php echo $b['top_text']; ?></span>
                            <h1 class="header"><?php echo $b['header_text']; ?></h1>
                            <p><?php echo $b['content']; ?></p>
                            <a href="<?php echo $b['link']; ?>" class="btn"><?php echo $b['button']; ?></a>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    </div>
                    <?php } ?>
				</div>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="about">
        	<div class="wrap">
            	<h2 class="heading"><?php echo apply_filters('the_title',get_field('about_header', $post->ID)); ?></h2>
                <a href=""><img src="<?php echo get_field('about_image', $post->ID); ?>" /></a>
                <p class="a-content"><?php echo get_field('about_content', $post->ID); ?></p>
				<a href="<?php echo get_field('about_link', $post->ID); ?>" class="btn"><?php echo get_field('about_button', $post->ID); ?></a>
                <div class="clear"></div>
            </div>
        </section>
        
        <section class="cards">
        	<div class="wrap">
                <h2 class="heading"><?php echo apply_filters('the_title',get_field('card_header', $post->ID)); ?></h2>
                
                <div class="left gift">
                    <p class="c-content"><?php echo get_field('gift_cards_content', $post->ID); ?></p>
                    <a href=""><img src="<?php echo get_field('gift_cards_image', $post->ID); ?>" /></a>
                    <a href="<?php echo get_field('gift_cards_button_link', $post->ID); ?>" class="btn"><?php echo get_field('gift_cards_button_text', $post->ID); ?></a>
                </div>
                
                <div class="right loyalty">
                    <p class="c-content"><?php echo get_field('loyalty_cards_content', $post->ID); ?></p>
                    <a href=""><img src="<?php echo get_field('loyalty_cards_image', $post->ID); ?>" /></a>
                    <a href="<?php echo get_field('loyalty_cards_button_link', $post->ID); ?>" class="btn"><?php echo get_field('loyalty_cards_button_text', $post->ID); ?></a>
                </div>
                <div class="clear"></div>
			</div>
        
        </section>
        
        <section class="social">
            <div class="wrap">
                <h3 class="heading">Follow Us</h3>
                
                <div class="left fb">
					<?php dynamic_sidebar('home-widget-left'); ?>
                </div>
                
                <div class="left tw">
                    <?php dynamic_sidebar('home-widget-right'); ?>
                </div>
                <div class="clear"></div>
                
                <?php dynamic_sidebar('home-widget'); ?>
			</div>
                
                <?php /*?><span class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i> @floatisimo</span><?php */?>
                
                
                <?php /*?><div class="ig">
                <img src="<?php echo IMG; ?>/floatisimo-ig1.jpg" />
                <img src="<?php echo IMG; ?>/floatisimo-ig2.jpg" />
                <img src="<?php echo IMG; ?>/floatisimo-ig3.jpg" />
                <img src="<?php echo IMG; ?>/floatisimo-ig4.jpg" />
                <img src="<?php echo IMG; ?>/floatisimo-ig5.jpg" />
                <img src="<?php echo IMG; ?>/floatisimo-ig6.jpg" />
                </div><?php */?>
            <div class="clear"></div>
            
        </section>
        
        <section class="location">
        	<div class="wrap">
            	<h3 class="heading"><?php echo apply_filters('the_title',get_field('location_header', $post->ID)); ?></h3>
                
                <div class="wrapper">
                    <div class="address">
                    	<h4><?php echo get_field('location_top_text', $post->ID); ?></h4>
                        <div class="a-icon"><img src="<?php echo IMG; ?>/address.png" /></div>  <div class="add-info"><?php echo get_field('address', $post->ID); ?></div>
                        <div class="clear"></div>
                        <div class="a-icon"><img src="<?php echo IMG; ?>/phone.png" /></div>  <div class="add-info"><a href="tel:<?php echo get_field('phone', $post->ID); ?>"><?php echo get_field('phone', $post->ID); ?></a></div>
                        <div class="clear"></div>
                        <div class="a-icon"><img src="<?php echo IMG; ?>/email.png" /></div>  <div class="add-info"><a href="mail:<?php echo get_field('email', $post->ID); ?>"><?php echo get_field('email', $post->ID); ?></a></div>
                        <div class="clear"></div>
                        <div class="a-icon"><img src="<?php echo IMG; ?>/time.png" /></div>  <div class="add-info"><?php echo get_field('time', $post->ID); ?></div>
                        <div class="clear"></div>
                    </div>
                    
                    <div class="map">
                        <span><?php echo get_field('map_code', $post->ID); ?></span>
                    </div>
                    <div class="clear"></div>
                </div>
                
            </div>
        </section>
                
<?php get_footer(); ?>