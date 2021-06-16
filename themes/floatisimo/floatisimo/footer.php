        <footer class="foot">
        	<div class="wrap">
            	<div class="footer left">
                    <ul class="menu">
                        <?php 
                            $MainMenu = array(
                              'container' => false, 
                              'theme_location'  => 'main_menu',
                              'menu_class'      => 'footer-menu',
                              'items_wrap' => __('%3$s')
                            );	
        
                            wp_nav_menu( $MainMenu ); 
                        ?>
                    </ul>
                    <div class="clear"></div>
                </div>
                
                <div class="social-icon">
                	<a href="http://facebook.com/<?php echo get_field('facebook','options'); ?>"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                    <a href="http://twitter.com/<?php echo get_field('twitter','options'); ?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                    <a href="http://instagram.com/<?php echo get_field('instagram','options'); ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                </div>
                
                <div class="footer right">
                    <span><?php echo get_field('development_text','options'); ?></span> <a href="http://creativeimpression.ca"><img src="<?php echo get_field('dev_logo','options'); ?>" /></a>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
            
        </footer>
        <script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).on('ready', function() {
				jQuery('.boxes').slick({
					dots: true,
					infinite: true,
					slidesToShow: 5,
					slidesToScroll: 1,
					speed: 500,
					fade: false,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 2000,
				});
				
				jQuery('.banner-slider').slick({
					dots: false,
					infinite: true,
					speed: 500,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 5000,
				});
				
				jQuery('.cform .r-item').click(function(){
					var rtype = jQuery(this).html();
					jQuery('.cform .r-item').removeClass('active');
					jQuery(this).addClass('active');
					jQuery('#rtype').val(rtype);
					return false;
				});

			});
		</script>
		<?php wp_footer(); ?>
    </body>
</html>