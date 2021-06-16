<?php 
/*
Template Name: Product Category
*/
get_header(); ?>

<?php echo get_template_part('heading'); 
$col = (get_field('column', $post->ID)) ? get_field('column', $post->ID) : 'four';
$sag = (get_field('show_as_grid', $post->ID)) ? get_field('show_as_grid', $post->ID) : 'no';
$args = array(
	'sort_order' => 'asc',
	'sort_column' => 'menu_order',
	'parent' => $post->ID,
	'post_type' => 'page',
	'hierarchical' => 0,
	'post_status' => 'publish'
); 
$pages = get_pages($args); 
?>
    <section class="page-content">
        <div class="wrap pd">
        	<?php if($sag == 'yes') { ?>
            <div class="product-list <?php echo $col; ?>">
				<?php                 
                foreach($pages as $page) {                    
                    $pd = get_field('featured_image', $page->ID);
                    ?><div class="product-cat-item">
                        <a href="<?php echo get_permalink($page->ID); ?>">
                            <img src="<?php echo $pd; ?>" />
                            <span class="text"><?php echo $page->post_title; ?></span>
                        </a>
                    </div><?php 
                } ?>
            </div>
            <?php } else { ?>
        	<ul class="menu-pd-tabs">
				<?php foreach($pages as $page) { ?>
                <li class="<?php echo ($page->ID == $post->ID) ? 'active' : ''; ?>" ><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
                <?php } ?>
            </ul>
            <p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
            <?php } ?>
            
			
            <div class="clear"></div>
            <div class="product-list">
            	<?php 
				//print_r($magulang);
				/*$prodquery = new WP_Query( array(
					'posts_per_page' => -1,
					'post_type' => array( 'page' ),
					'orderby' => 'rand',
					'order' => 'none',
					'post_parent__in' => $magulang
				) );
				
				while ( $prodquery->have_posts() ) :
					$prodquery->the_post();
					$pd = get_field('product_details', $post->ID);
					 ?>
					<div class="product-item">
						<a href="<?php echo get_permalink(); ?>">
                        	<img src="<?php echo $pd[0]['image']; ?>" />
                            <span class="text"><?php echo get_the_title(); ?></span>
                       	</a>
					</div>
					<?php 
				endwhile;
				
				wp_reset_postdata();*/
				
				/*$args = array(
					'sort_order' => 'asc',
 					'sort_column' => 'menu_order',
                     'parent' => $post->ID,
                     'post_type' => 'page',
					 'hierarchical' => 0,
                     'post_status' => 'publish'
				); 
				$pages = get_pages($args); 
				
				foreach($pages as $page) {
					$pd = get_field('featured_image', $page->ID);
					 ?>
					<div class="product-item">
						<a href="<?php echo get_permalink($page->ID); ?>">
							<img src="<?php echo $pd; ?>" />
							<span class="text"><?php echo $page->post_title; ?></span>
						</a>
					</div>
					<?php 
				}*/ ?>
                
            	
                <div class="clear"></div>
			</div>
            <div class="clear"></div>
        </div>
    </section>

<?php get_footer(); ?>