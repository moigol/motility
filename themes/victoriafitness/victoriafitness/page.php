<?php 
/*
Template Name: Page
*/

get_header(); ?>

	<?php echo get_template_part('heading'); ?>
    
    <section class="page">
        <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-pages">
                            <div>
                            <?php if(have_posts()): while(have_posts()): the_post();?>
                            <h2><?php the_title(); ?></h2>
                            <div class="content">
                                <?php the_content(); ?>
                            </div>
                            <?php endwhile; endif;  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php get_footer(); ?>