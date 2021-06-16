         <footer  style="background: url(<?php echo get_field('footer_bg_image', 'options'); ?>) center top no-repeat transparent; background-size: cover;">
         	
            <?php if(is_front_page()) { ?>
            <div id="contact" class="contact">
                <div class="container">
                    <div class="form">
                        <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-8">
                            <div class="contact-form" style="background: url(<?php echo get_field('form_bg_image', 'options'); ?>) right top no-repeat transparent; background-size: cover;">
                                <?php echo get_field('cf_code','options'); ?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4">
                            <div class="contact-info">
                                <h3>Contact Victoria</h3>
                                <div class="info">
                                    <a href="tel:<?php echo get_field('phone','options'); ?>"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; <?php echo get_field('phone','options'); ?></a>
                                    <a href="mailto:<?php echo get_field('email','options'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i> &nbsp; <?php echo get_field('email','options'); ?></a>  
                                </div>
                                <a href="<?php echo site_url(); ?>"><img src="<?php echo get_field('logo_footer','options'); ?>"></a>
                                <div class="sm">
                                    <a href="https://www.instagram.com/<?php echo get_field('ig_id','options'); ?>" class="media"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/channel/<?php echo get_field('yt_id','options'); ?>" class="media"><i class="fab fa-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>    
            </div>
            <?php } ?>
            
            <div class="bottom">
            	<div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-8">
                            <nav>
                                <div class="container-fluid">
                                    <div class="navbar-header">
                                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
                                          <span class="sr-only">Toggle navigation</span>
                                          <span class="icon-bar"></span>
                                          <span class="icon-bar"></span>
                                          <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div id="navbar1" class="navbar-collapse collapse">
                                        <ul class="nav navbar-nav">
                                        <!--li><a href="#" class="btn-link">Home</a></li>
                                        <li><a href="#" class="btn-link">About</a></li>
                                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Program</a>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Sample 1</a></li>
                                                <li><a href="#">Sample 2</a></li>
                                                <li><a href="#">Sample 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="#" class="btn-link">Online Couching</a></li>
                                        <li><a href="#" class="btn-link">Youtube</a></li>
                                        <li><a href="#" class="btn-link">Contact</a></li-->

                                        <?php 
                                            $MainMenu = array(
                                                'container' => false, 
                                                'theme_location'  => 'footer_menu',
                                                'menu_class'      => 'main-menu-item',
                                                'items_wrap' => __('%3$s')
                                            );
                                        wp_nav_menu( $MainMenu ); 
                                        ?>
                                    </ul>
                                  </div>
                                  <!--/.nav-collapse -->
                                </div>
                            </nav>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="designed">
                                <span><?php echo get_field('development_text','options'); ?></span><a href="http://creativeimpression.ca"><img src="<?php echo get_field('developer_logo','options'); ?>"></a>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    	<div class="col-md-12">
                        	<span class="copyright"><?php echo get_field('copyright','options'); ?></span>
                        </div>
                    </div>
                </div> 
			</div>
        </footer>
        
        <script type="text/javascript">
			var $mg=jQuery.noConflict();
			$mg(document).ready(function() {
				$mg('.banner-slide').slick({
					dots: true,
                    arrows: false,
					infinite: true,
					slidesToShow: 1,
					adaptiveHeight: true,
					speed: 2000,
					fade: true,
					autoplay: true,
					autoplaySpeed: 4000
				});
				$mg('.testimony').slick({
                    dots: false,
                    arrows: false,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 3000,
                    responsive: [
                        {
                          breakpoint: 998,
                          settings: {
                            slidesToShow: 2
                          }
                        },
                        {
                          breakpoint: 598,
                          settings: {
                            slidesToShow: 1
                          }
                        }
                    ]
                });
                $mg('.video-slide').slick({
                    dots: false,
                    arrows: true,
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 4000,
                    responsive: [
                        {
                          breakpoint: 768,
                          settings: {
                            slidesToShow: 2
                          }
                        },
                        {
                          breakpoint: 598,
                          settings: {
                            slidesToShow: 1,
                            arrows: false
                          }
                        }
                    ]
                });
				$mg("a[rel^='prettyPhoto']").prettyPhoto();
				
				$mg("#gallery-img").tabs({
					show: { effect: "fade", duration: 1000 },
					hide: { effect: "fade", duration: 800 }
				});
				
                $mg(".menu-item-has-children").addClass('dropdown');
                $mg(".menu-item-has-children > a").addClass('dropdown-toggle');
                $mg(".menu-item-has-children > a").attr('data-toggle','dropdown');
                $mg(".menu-item-has-children ul").addClass('dropdown-menu');
				//$mg(".card").flip({trigger:'hover'});
			});
			
			$mg(window).scroll(function(){
				if ($mg(window).scrollTop() >= 300) {
				   $mg('.top').addClass('fixed-header');
				}
				else {
				   $mg('.top').removeClass('fixed-header');
				}
			});
		</script>

        <?php wp_footer(); ?>

    </body>
</html>

