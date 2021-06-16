<?php get_header(); ?>

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
                                                <div class="other-include list">
                                                    <?php echo get_field('includes', $post->ID); ?>
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
            </div>
        </section>


<?php get_footer(); ?>