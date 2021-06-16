		<footer>
            <div class="footer-widgets">
                <div class="wrap">
                    <div class="nav">
                        <ul class="menu">
                            <?php 
								$MainMenu = array(
								  'container' => false, 
								  'theme_location'  => 'foot_menu',
								  'menu_class'      => 'footer-menu',
								  'items_wrap' => __('%3$s')
								);	

								wp_nav_menu( $MainMenu ); 
							?>
                        </ul>
                    </div>

                <a href="#" class="logo"><img src="<?php echo get_field('footer_logo','options'); ?>" /></a>
                </div>
                <div class="clear"></div>
            </div>

            <div class="footer-bar">
                <div class="wrap f-c">
                    <div class="footer-column left">
                        <?php echo get_field('copyright','options'); ?>
                    </div>

	               <div class="footer-column right">
                        <span><?php echo get_field('developer_text','options'); ?></span>
                        <a href="http://creativeimpression.ca/"><img src="<?php echo get_field('developer_logo','options'); ?>" /></a>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </footer>
		<?php wp_footer(); ?>
        
        <script type="text/javascript">
			var $mg=jQuery.noConflict();
			$mg(document).ready(function() {
				$mg('.banner-slider').slick({
					dots: false,
					infinite: true,
					speed: 500,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 5000,
				});
			});
		</script>
        
    </body>
</html>