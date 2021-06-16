<?php 
/*
Template Name: Product Slides
*/
get_header(); ?>

<?php echo get_template_part('heading'); 
$productid = isset($_GET['product']) ? $_GET['product'] : '0';
?>

    <section class="page-content">
        <div class="wrap pd">
        	<ul class="menu-pd-tabs">
				<?php 
				$lolo = wp_get_post_parent_id( $post->ID );				
				$args = array(
					'sort_order' => 'asc',
 					'sort_column' => 'menu_order',
                     'parent' => $lolo,
                     'post_type' => 'page',
					 'hierarchical' => 0,
                     'post_status' => 'publish'
                    ); 
                	$pages = get_pages($args); 
					
					foreach($pages as $page) {
                 ?>
                <li class="<?php echo ($page->ID == $post->ID) ? 'active' : ''; ?>" ><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></li>
                <?php } ?>
            </ul>
            
            <div class="clear"></div>
            <?php if(isset($_GET['product'])) { $link = array(); $cntr = 0; ?>
            <div class="product-slider">
				<?php foreach(get_field('product_details', $post->ID) as $pd) { $link[$pd['slug']] = $cntr; ?>
                	<div> 
                        <img src="<?php echo $pd['image']; ?>" />                        
                        <div class="details <?php echo $pd['slug']; ?>">
                            <h3 class="heading"><?php echo $pd['title']; ?></h3>
                            <p><?php echo $pd['content']; ?></p>
                            <div class="clear"></div>
                            <?php if(strlen($pd['price']) > 0) { ?>
                            <div class="price">
                                <span><?php echo $pd['price']; ?></span>
                            </div>
                            <div class="clear"></div>
                            <?php } ?>
                            <div class="sizes">
                                <span>Sizes Available:</span><?php foreach($pd['size'] as $s){ ?><span><?php echo $s;  ?></span><?php } ?>
                            </div>
                            <div class="clear"></div>
                            
                            <?php foreach($pd['nutrition_facts'] as $f){ ?> 
                            <div class="facts">
                                <span><?php echo $f['value']; ?></span>
                                <p><?php echo $f['name']; ?></p>
                            </div>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
					</div>
                <?php $cntr++; } $prodid = $link[$productid]; ?>                
			</div>
            <div class="clear"></div>
            <script type="text/javascript">
				jQuery.noConflict();
				jQuery(document).on('ready', function() {
					
					jQuery('.product-slider').slick({
						dots: true,
						infinite: true,
						speed: 500,
						cssEase: 'linear',
						autoplay: true,
						autoplaySpeed: 5000
					});
					
					jQuery('#slick-slide0<?php echo $prodid; ?> button').click();
		
				});
			</script>
            <?php } else { ?>
            	<div class="product-list">
					<?php
					$cntr = 0;
                    foreach(get_field('product_details', $post->ID) as $pd) {
                         ?>
                        <div class="product-item">
                            <a href="?product=<?php echo $pd['slug']; ?>">
                                <img src="<?php echo $pd['image']; ?>" />
                                <span class="text"><?php echo $pd['title']; ?></span>
                            </a>
                        </div>
                        <?php 
						$cntr++;
                    }
                    ?>
            	</div>
            	<?php
            } ?>
        </div>
    </section>
	
<?php get_footer(); ?>