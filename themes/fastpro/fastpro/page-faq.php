<?php 
/*
Template Name: FAQ
*/
get_header(); ?>

	<?php get_template_part('heading'); ?>
        
	<section class="faq">
        <div class="wrap">
			<?php foreach(get_field('faq_lists', $post->ID) as $re) { ?> 
        	<div class="content-box">
                <span class="icon"><?php echo $re['no']; ?></span>
                <div class="column-info">
                    <h2><?php echo $re['title']; ?></h2>
                    <?php echo $re['content']; ?>
                </div>                
            </div>
			<?php } ?> 
		<div class="clear"></div>
        </div>
        <div class="clear"></div>
    </section>
        
<?php get_footer(); ?>