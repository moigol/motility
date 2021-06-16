<?php 
global $post;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
		<meta name="google-site-verification" content="ksxC3a5PtyeQFV8R13IKSTmV11Ls5sk1YS56kTzfAB4" />
        <title>Creative Impression</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo THEMEURL; ?>/css/prettyPhoto.css">
		<link rel="stylesheet" href="<?php echo THEMEURL; ?>/css/images-compare.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/responsive.css">
		<?php wp_head(); ?>
        <script>
			jQuery( function() {
				var myAnimations = {
					show: { effect: "fade", duration: "slow" }
				};
				jQuery( "#tabs" ).tabs(myAnimations);
				jQuery(".card").flip({trigger:'hover'});
				jQuery("a[rel^='prettyPhoto']").prettyPhoto();
			
    
				jQuery(window).scroll(function(){
					if (jQuery(window).scrollTop() >= 300) {
						jQuery('header').addClass('fixed-header');
						jQuery('.page-content').addClass('fixed-content');
					}
					else {
						jQuery('header').removeClass('fixed-header');
						jQuery('.page-content').removeClass('fixed-content');
					}
				});
			});

            /*jQuery(window).load( function() {          
            } );*/
        </script>
        <meta name="google-site-verification" content="Ae5-PK7gM8kYnszvApqUyfNfpYi8jPAoHkMPS6byew0" />
    </head>
    
    <body <?php body_class(); ?> >


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-105411195-1', 'auto');
  ga('send', 'pageview');

</script>



        <header>
            <div class="top-bar icon">
                <p class="email"><i class="fa fa-envelope"></i> <a href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a></p>
                <p class="phone"><i class="fa fa-phone"></i> <a href="tel:<?php echo get_field('phone', 'option'); ?>"><?php echo get_field('phone', 'option'); ?></a></p>
                <a href="<?php echo get_field('header_button_link', 'option'); ?>" class="free-quote-btn"><?php echo get_field('header_button_text', 'option'); ?></a>
                <p class="social">
					<?php $sms = get_field('social_media_header','option'); ?>
                      <?php foreach($sms as $sm) { ?>
                           <a href="<?php echo $sm['link']; ?>"><img src="<?php echo $sm['icon']; ?>" alt="" /></a>
                      <?php } ?>
                </p>
            </div>
            
            <div class="nav-bar">
                <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_field('logo', 'option'); ?>" alt="" /></a>
                <ul class="menu">
					<?php 
						$MainMenu = array(
							'container' => false, 
							'theme_location'  => 'main_menu',
							'menu_class'      => 'main-menu-item',
							'items_wrap' => __('%3$s')
						);	
                    
                    wp_nav_menu( $MainMenu ); 
                    ?>
                </ul>
            </div>
            <div class="clear"></div>
            
        </header>
    
