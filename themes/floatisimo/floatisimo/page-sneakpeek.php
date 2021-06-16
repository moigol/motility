<?php 
/*
Template Name: Sneak Peak
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
            <div class="clear"></div>
        </div>
    </section>


    <section class="page-float">
        <div class="wrap-wrap">
        	<h3 class="heading"><?php the_title(); ?></h3>
            
            
            <div class="page-bg" style="background:url(<?php echo get_field('sneak_background', $p->ID); ?>)">
            <?php foreach(get_field('sneak_peeks', $post->ID) as $sp) { ?>
            	<div class="wrap box-<?php echo $sp['position']; ?>">
                    <img class="sweets" src="<?php echo $sp['image']; ?>" />
                    <div class="content-wrapping">
                        <h4 class="title"><?php echo $sp['header']; ?></h4>
                        <p><?php echo $sp['content']; ?></p>
                    </div>
              	</div>
                <div class="clear"></div>
            <?php } ?>   
            </div>
           
            <div class="clear"></div>
        </div>
    </section>
<?php get_footer(); ?>