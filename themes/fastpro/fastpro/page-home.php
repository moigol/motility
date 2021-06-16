<?php 
/*
Template Name: Home
*/
get_header(); ?>

		<section class="banner">
            <div class="banner-slider">
            	<?php foreach(get_field('banners', $post->ID) as $b) { ?> 
            	<div>
                    <div class="slider-item" style="background: url(<?php echo $b['background_image']; ?>) center top no-repeat transparent; height: 473px;">
                    	
                        <div class="wrap">
                        	<div class="slide-content">
                                <h1 class="title"><?php echo $b['header_text']; ?></h1>
                                <?php echo $b['content']; ?>
                        	</div>

                            <div class="slide-form">
                                <?php echo $b['cf_code']; ?>
                            </div>
                            <div class="slide-form-mobile">
                                <a href="http://fastprohomebuyers.com/contact-us/" class="btn">Contact Us</a>
                            </div>
                        </div>
					</div>
                </div>
				<?php } ?> 
            </div>
            <div class="clear"></div>
        </section>

        <section class="category">
        	<div class="wrap">
                <h3><?php echo get_field('header_text', $post->ID); ?></h3>
                <?php foreach(get_field('category', $post->ID) as $c) { ?> 
                <div class="column">
                    <a href="<?php echo $c['link']; ?>"><img src="<?php echo $c['image']; ?> " />
                    <span><?php echo $c['title']; ?> </span></a>
                </div>
                <?php } ?>  
                <div class="clear"></div>
            </div>
        </section>

        <section class="real-estate">
        	<div class="wrap">
        		<h3><?php echo get_field('how_it_works_header_text', $post->ID); ?></h3>
                <?php foreach(get_field('steps', $post->ID) as $re) { ?> 
                <div class="item">
                    <span class="icon"><?php echo $re['number']; ?></span>
                    <div class="column-info">
                        <h2><?php echo $re['header_text']; ?></h2>
                        <?php echo $re['content']; ?>
                    </div>
                </div>
                <?php } ?> 
                <div class="clear"></div>

                <a href="<?php echo get_field('consultation_link','options'); ?>" class="btn"><?php echo get_field('consultation_text','options'); ?></a>
            <div class="clear"></div>
            </div>
        </section>

<?php get_footer(); ?>