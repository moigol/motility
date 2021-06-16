<?php 
/*
Template Name: Home
*/
get_header(); ?>


        <section class="banner" style="background: url(<?php echo get_field('banner_bg_image', $post->ID); ?>) center top no-repeat transparent; background-size: cover;">
            <div class="container">
                <div class="banner-slide">
                    <?php foreach(get_field('banners', $post->ID) as $b) { ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="banner-box">
                                <div class="banner-text">
                                    <span><?php echo $b['header']; ?></span>
                                    <h1><?php echo $b['sub_header']; ?></h1>
                                    <div class="text-desc"><?php echo $b['text']; ?></div>
                                    <a href="<?php echo $b['button_link']; ?>" class="btn btn-primary btn-lg active" role="button"><?php echo $b['button_text']; ?></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="banner-img pull-center">
                               <img src="<?php echo $b['banner_image']; ?>">
                            </div>
                        </div>
                    </div>
                    <?php } ?> 
                </div>
            </div>            
        </section>


        <section class="about">
            <div class="container">
                <div class="about-box">
                    <div class="row">
                        <div class="col-xs-12 col-md-4">
                            <img src="<?php echo get_field('about_image', $post->ID); ?>">
                        </div>
                        <div class="col-xs-12 col-md-8">
                            <div class="about-text">
                                <h2><?php echo get_field('about_title', $post->ID); ?></h2>
                                <div><?php echo get_field('about_content', $post->ID); ?></div>
                                <a href="<?php echo get_field('about_button_link', $post->ID); ?>" class="btn btn-primary btn-lg active" role="button"><?php echo get_field('about_button_text', $post->ID); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="programs">
            <div class="container-fluid">
                <div class="program-container">
                    <h2><?php echo get_field('program_header', $post->ID); ?></h2>
                    <div class="row">
                        <?php
                        $args = array(
                            'post_type'      => 'programs',
                            'orderby'        => 'post_date',
                            'order'          => 'ASC',
                            'posts_per_page' => 5
                            );
                        query_posts( $args );$cntr = 0;
                        if(have_posts()): while(have_posts()): the_post(); $cntr++ ?>
                        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-2 <?php echo ($cntr == 1) ? 'col-md-offset-1': ''; ?>">
                            <div class="box">
                                <div class="program-img">
                                    <img src="<?php echo get_field('image', $post->ID); ?>">
                                    <span class="title"><h5><?php echo get_field('title', $post->ID); ?></h5></span>
                                </div>
                                <div class="program-text">
                                    <div class="content"><?php echo get_field('excerpt', $post->ID); ?></div>
                                    <span class="price">$<?php echo get_field('price', $post->ID); ?> USD</span>
                                    <a href="<?php echo the_permalink(); ?>" class="btn btn-primary btn-lg active" role="button">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; endif; 
                        wp_reset_query();
                        ?>
                    </div>
                </div>
            </div>
        </section>


        <section class="how-it-works" style="background: url(<?php echo get_field('process_bg_image', $post->ID); ?>) center top no-repeat transparent; background-size: cover;">
            <div class="container">
                <h2><?php echo get_field('how_it_works_header', $post->ID); ?></h2>
                <div class="plans">
                    <div class="row">
                        <?php foreach(get_field('process', $post->ID) as $s) { ?> 
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="plan-box">
                                <span class="icon"><?php echo $s['number']; ?></span>
                                <div class="plan-content">
                                    <h3><?php echo $s['title']; ?></h3>
                                    <div><?php echo $s['content']; ?></div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>


        <section class="testimonials">
            <div class="container">
                <h2><?php echo get_field('testimonial_header', $post->ID); ?></h2>
                <div class="review-container">
                    <div class="row">
                        <div class="testimony">
                            <?php foreach(get_field('testimonies', $post->ID) as $t) { ?>
                            <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="testimony-box">
                                    <img src="<?php echo $t['image']; ?>">
                                    <div class="content">
                                        <div><?php echo $t['content']; ?></div>
                                        <h4><?php echo $t['name']; ?></h4>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php get_footer(); ?>    