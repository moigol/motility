<?php 
/*
Template Name: About
*/
get_header(); ?>


        <?php echo get_template_part('heading'); ?>

        <section class="page">
            <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="page-content">
                                <div class="img">
                                    <img src="<?php echo get_field('about_image', $post->ID); ?>">
                                </div>
                                <div class="page-text">
                                    <div><?php echo get_field('about_content', $post->ID); ?></div>
                                    <span class="sign"><img src="/wp-content/uploads/2018/04/victoria.png"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php get_footer(); ?>    