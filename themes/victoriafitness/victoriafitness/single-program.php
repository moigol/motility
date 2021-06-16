<?php get_header(); ?>

        <?php echo get_template_part('heading'); ?>

        <section class="page">
            <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                            <div class="page-content right">
                                <div class="img">
                                    <img src="<?php echo get_field('image', $post->ID); ?>">
                                </div>
                                <div class="page-text">
                                    <div class="program">
                                        <h2><?php echo get_field('title', $post->ID); ?></h2>
                                        <div class="description"><?php echo get_field('content', $post->ID); ?></div>
                                        <div class="include"><?php echo get_field('includes', $post->ID); ?></div>
                                        <span>*<?php echo get_field('note', $post->ID); ?></span>
                                        <div class="register-btn">
                                            <a href="#" class="btn btn-default btn-lg active price" role="button">$<?php echo get_field('price', $post->ID); ?> USD</a>
                                            <a href="#" class="btn btn-primary btn-lg active" role="button">Register Now</a>
                                            <?php echo get_field('shortcode', $post->ID); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php get_footer(); ?>    