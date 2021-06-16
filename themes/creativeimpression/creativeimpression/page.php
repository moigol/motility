<?php get_header(); ?>
        
        <section class="page-header">
        	<div class="wrap">
        		<h1 class="heading"><?php the_title(); ?></h1>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="page-content">
        	<div class="wrap">
                <?php the_content(); ?>
			<div class="clear"></div>
			</div>
        </section>        
        
<?php get_footer(); ?>