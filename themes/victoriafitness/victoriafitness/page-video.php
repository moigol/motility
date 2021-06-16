<?php 
/*
Template Name: Video
*/


if(is_user_logged_in()) { 
get_header(); 
?>

	<?php echo get_template_part('heading'); ?>
    <?php if(have_posts()): while(have_posts()): the_post(); ?><?php endwhile; endif; wp_reset_query(); ?>
    <section class="page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-pages">
                        <div class="row one">
                             <?php
                            $args = array(
                                'post_type'      => 'video',
                                'orderby'        => 'post_date',
                                'order'          => 'ASC',
                                'posts_per_page' => 3
                                );
                            $postss = new WP_query( $args );
                            if($postss->have_posts()): while($postss->have_posts()): $postss->the_post(); ?>
                            <div class="col-md-12 p-<?php echo $post->ID; ?>">
                                <div class="content">
                                    <div class="heading">
                                        <h3 class="title"><?php echo get_the_title(); ?></h3>
                                        <span class="date"><?php echo get_the_date(); ?></span>
                                    </div>
                                    <div class="vid-play">
                                        <?php echo do_shortcode('[fvplayer src="'. get_field('video_link', $post->ID).'" splash="'. get_field('featured_image', $post->ID).'" width="800" height="500"]'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php break; endwhile; endif; 
                            wp_reset_query();
                            ?>
                        </div>

                        <div class="row two">
                            <div class="video-slide">
                                <?php
                                $args = array(
                                    'post_type'      => 'video',
                                    'orderby'        => 'post_date',
                                    'order'          => 'ASC',
                                    'posts_per_page' => 3
                                    );
                                $posts = new WP_query( $args );
                                if($posts->have_posts()): while($posts->have_posts()): $posts->the_post(); ?>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="featured-vid">
                                        <a href="<?php echo get_permalink(); ?>">
                                            <h4 class="title"><?php the_title(); ?></h4>
                                        </a>
                                            <span class="date"><?php echo get_the_date(); ?></span>
                                        <a href="<?php echo get_permalink(); ?>">
                                            <div class="content featured-img">
                                                <img src="<?php echo get_field('featured_image', $post->ID); ?>">
                                            </div> 
                                        </a>
                                    </div>
                                </div>
                                <?php endwhile; endif; 
                                wp_reset_query();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); 
} else { header('location: https://victoriamcdonaldfitness.com/'); }?>