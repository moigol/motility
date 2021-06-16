<?php global $post; ?>
    <section class="page-header" style="background: url(<?php echo get_field('header_background_image', $post->ID); ?>) center top no-repeat transparent;">
        <div class="wrap">
            <h2 class="heading"><?php the_title(); ?></h2>
            <div class="header-content"><?php echo (get_field('header_content', $post->ID)) ? get_field('header_content', $post->ID) : ''; ?></div>
        </div>
        <div class="clear"></div>
    </section>
    