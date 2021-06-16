        <section class="fu">
            <div class="wrap follow-us">
            	<p class="follow"><?php echo get_field('social_media_text', 'option'); ?></p>
                <p class="f-social">
                <?php $sms = get_field('social_media_footer','option'); ?>
				  <?php foreach($sms as $sm) { ?>
                       <a href="<?php echo $sm['link']; ?>"><img src="<?php echo $sm['icon']; ?>" alt="" /></a>
                  <?php } ?>
                </p>
            </div>	
            <div class="clear"></div>
            
        </section>
        
        <footer>
            <div class="wrap">
				<div class="left">
                    <ul class="footer-menu">
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
                </div>
                
                <a href="<?php echo SITEURL; ?>" class="logo"><img src="<?php echo get_field('logo_footer', 'option'); ?>" alt="" /></a>
                
                <div class="right">
                   <?php echo get_field('copyright', 'option'); ?>
                </div>
            </div>
            <div class="clear"></div>
            
        </footer>
        
		<script type="text/javascript">
			jQuery.noConflict();
			jQuery(document).on('ready', function() {
				jQuery('.testimonial-slide').slick({
					dots: true,
					infinite: true,
					speed: 500,
					fade: true,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 2000,
				});
				jQuery('.banner-slider').slick({
					dots: true,
					infinite: true,
					speed: 500,
					cssEase: 'linear',
					autoplay: true,
					autoplaySpeed: 2000,
				});
				jQuery('.cform .r-item').click(function(){
					var rtype = jQuery(this).html();
					jQuery('.cform .r-item').removeClass('active');
					jQuery(this).addClass('active');
					jQuery('#rtype').val(rtype);
					return false;
				});

			});
			
			jQuery(function () {
				jQuery('.img-compare-holder').each(function() {
					var imagesCompareElement = jQuery(this).find('.js-img-compare').imagesCompare();
					var imagesCompare = imagesCompareElement.data('imagesCompare');
					var events = imagesCompare.events();
	
					imagesCompare.on(events.changed, function (event) {
						console.log(events.changed);
						console.log(event.ratio);
						if (event.ratio < 0.4) {
							console.log('We see more than half of the back image');
						}
						if (event.ratio > 0.6) {
							console.log('We see more than half of the front image');
						}
	
						if (event.ratio <= 0) {
							console.log('We see completely back image');
						}
	
						if (event.ratio >= 1) {
							console.log('We see completely front image');
						}
					});
	
					jQuery(this).find('.js-front-btn').on('click', function (event) {
						event.preventDefault();
						imagesCompare.setValue(1, true);
					});
	
					jQuery(this).find('.js-back-btn').on('click', function (event) {
						event.preventDefault();
						imagesCompare.setValue(0, true);
					});
	
					jQuery(this).find('.js-toggle-btn').on('click', function (event) {
						event.preventDefault();
						if (imagesCompare.getValue() >= 0 && imagesCompare.getValue() < 1) {
							imagesCompare.setValue(1, true);
						} else {
							imagesCompare.setValue(0, true);
						}
					});
				});
			});
		</script>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-106682503-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments)};
  gtag('js', new Date());

  gtag('config', 'UA-106682503-1');
</script>


		<?php wp_footer(); ?>
    </body>
</html>