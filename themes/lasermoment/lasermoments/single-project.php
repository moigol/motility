<?php get_header(); 

$filename = get_the_title().'.pdf';
$path = SITEURL.'/wp-content/themes/lasermoments/pdf/'.$filename;
?>
        
        <?php echo get_template_part('heading'); ?>
        
        <section class="post-content">
        	<div class="wrap">
				<a href="<?php echo $path; ?>" download>Download Project</a>
			<div class="clear"></div>
			</div> 
        </section>        
        
<?php get_footer(); ?>