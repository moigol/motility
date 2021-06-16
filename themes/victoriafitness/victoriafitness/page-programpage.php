<?php 
/*
Template Name: Program Page
*/
get_header(); ?>


        <?php echo get_template_part('heading'); ?>

        <section class="page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-content pc">
                            <div class="img col-sm-12 col-md-5">
                                <img src="<?php echo get_field('image', $post->ID); ?>">
                                <div class="register-btn">
                                    <span class="price">$<?php echo get_field('price', $post->ID); ?> USD</span>
                                    <?php echo print_wp_cart_button_for_product(get_field('title', $post->ID), get_field('price', $post->ID)); ?>
                                </div>
                            </div>
                            <div class="page-text col-sm-12 col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                    	<div class="program-description">
                                            <div><?php echo get_field('content', $post->ID); ?></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="program-includes">
                                            <div class="row">
                                                <div class="pc-include col-md-6">
                                                	<strong style="text-transform:uppercase;">Here is what is included:</strong>
                                                	<?php foreach(get_field('challenge_includes', $post->ID) as $pc) { ?>
                                                	<div><strong><?php echo $pc['no']; ?>.</strong> 
            											<div class="pc-title"><strong><?php echo $pc['title']; ?></strong><br />
                                                    	<div style="font-style: italic;"><i class="far fa-calendar-alt"></i> <?php echo $pc['date']; ?></div></div>
                                                    </div>
                                                	<?php } ?>
                                                </div>
                                                <div class="other-include col-md-6">
                                                	<?php echo get_field('other_includes', $post->ID); ?>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php get_footer(); ?>    