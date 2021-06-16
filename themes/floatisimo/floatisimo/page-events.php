<?php 
/*
Template Name: Events
*/
get_header(); ?>

<?php echo get_template_part('heading'); ?>

	<section class="event">
        <div class="wrap">
        	<h3 class="heading"><?php echo get_field('header_title', $post->ID); ?></h3>
            <span class="subtitle"><?php echo get_field('subheading_title', $post->ID); ?></span>
            <span class="subtext"><?php echo get_field('subheading_content', $post->ID); ?></span>

            <div class="clear"></div>

            <div class="events">
                <?php foreach(get_field('package', $post->ID) as $p) { ?>
                <div class="package">
                    <div class="snack">
                        <div class="party-title" style="background-color: <?php echo $p['heading_color']; ?>;">
                            <span class="ptitle"><?php echo $p['package_name']; ?></span>
                            <div class="content">
                                <span><?php echo $p['package_age']; ?></span>
                                <span><?php echo $p['age_note']; ?></span>
                            </div>
                        </div>
                        <div class="party-content" style="background-color: <?php echo $p['content_color']; ?>;">
                            <span>Your Party Includes:</span>
                            <div class="content"><?php echo $p['package_includes']; ?></div>
                            <span>Extra Options Available:</span>
                            <div class="content"><?php echo $p['package_options']; ?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php } ?>
                <div class="clear"></div>
            </div>

            <h4 class="note"><?php echo get_field('book_your_party_text', $post->ID); ?></h4>
        </div>
            </div>
        <div class="clear"></div>
        
    </section>
        
    <section class="location">  
        <div class="wrap">
            <div class="fundraise">
                <h3 class="heading"><?php echo get_field('bottom_title', $post->ID); ?></h3>
                <div class="content"><?php echo get_field('content', $post->ID); ?></div>
                <div class="steps">
                    <span class="">Easy Steps:</span>
                    <div><?php echo get_field('steps', $post->ID); ?></div>
                </div>
                <h4 class="note"><?php echo get_field('to_enquire_text', $post->ID); ?></h4>
                <?php echo get_field('form', $post->ID); ?>
            </div>
        </div>
    </section>

<?php get_footer(); ?>