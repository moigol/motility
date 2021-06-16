<?php 
/*
Template Name: Our Company
*/
get_header(); ?>

<?php echo get_template_part('heading'); ?>

    <section class="page-content">
        <div class="wrap">
        	<ul class="menu-tabs">
            	<?php 
				
				$args = array(
				 	'sort_order' => 'asc',
 					'sort_column' => 'menu_order',
                    'parent' => wp_get_post_parent_id( $post->ID ),
                    'post_type' => 'page',
					'hierarchical' => 0,
                    'post_status' => 'publish'
                    ); 
                	$pages = get_pages($args); 
					
					foreach($pages as $page) {
                 ?>
                <li class="<?php echo ($page->ID == $post->ID) ? 'active' : ''; ?>" ><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a>
				<?php } ?>
            </ul>
        	<?php if(have_posts()): while(have_posts()): the_post();?>
        	<h3 class="heading"><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <div class="text-l"><?php echo get_field('top_left_content', $p->ID); ?></div>
            <img class="image-r" src="<?php echo get_field('top_right_image', $p->ID); ?>">
            <?php endwhile; endif;  ?>
            <div class="clear"></div>
        </div>
    </section>
    
    <section class="page-content mission" style="background:url(<?php echo get_field('background', $p->ID); ?>) no-repeat 135px 35px">
        <div class="wrap m">
        	<h3 class="heading"><?php echo get_field('bottom_header', $p->ID); ?></h3>
        	<img class="image-l" src="<?php echo get_field('bottom_left_image', $p->ID); ?>">
            <div class="text-r"><?php echo get_field('bottom_content', $p->ID); ?></div>
            <div class="clear"></div>
        </div>
    </section>

<?php get_footer(); ?>