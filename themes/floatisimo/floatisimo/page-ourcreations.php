<?php 
/*
Template Name: Our Creations
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
            
            <?php foreach(get_field('creations', $post->ID) as $cs) { ?>
                <h3 class="heading"><?php echo $cs['title']; ?></h3>
            	<?php echo $cs['content']; ?>
				<?php foreach($cs['items'] as $ci) { ?> 
                <div class="<?php echo ($ci['width']=='full') ? 'wtfull' : 'ci'; ?> <?php echo $ci['position']; ?>">
                    <h4 class="title"><?php echo $ci['title']; ?></h4>
                    <p><?php echo $ci['content']; ?></p>
                </div>
                <?php } ?>    
            <div class="clear"></div>
           	<?php } ?> 
        </div>
    </section>
    
    <section class="page-content treats">
        <div class="wrap">
        	<h3 class="heading"><?php echo get_field('bottom_header_title', $p->ID); ?></h3>
            <div class="text-t"><?php echo get_field('bottom_content', $p->ID); ?></div>
            <img src="<?php echo get_field('bottom_image', $p->ID); ?>">
            <div class="clear"></div>
        </div>
    </section>

<?php get_footer(); ?>