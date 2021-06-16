<?php 
global $post;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
        <title>Laser Moments</title>
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/vendor/Bootstrap-v3/css/bootstrap.min.css">        
        
        <link href="https://fonts.googleapis.com/css?family=Exo:400,500,600|Hind+Guntur:300,400" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/fonts/fontface-styles.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/responsive.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/vendor/bgrins-spectrumColorpicker/spectrum.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/vendor/fontselect-jquery/styles/fontselect-alternate.css">

		<?php wp_head(); ?>

    </head>
    
    <body>
        <header class="head">
        	<div class="top">
            	<div class="left">
            		 <a href="<?php echo site_url(); ?>"><img src="<?php echo get_field('logo', 'option'); ?>" /></a>
                </div>
                <div class="right">
                    <!--<a class="in" href="#"><img src="<?php echo IMG; ?>/in.png"></a>
                    <a class="fb" href="#"><img src="<?php echo IMG; ?>/fb.png"></a>-->
                    <p>
						<?php $sms = get_field('header_social_media','option'); ?>
                      	<?php foreach($sms as $sm) { ?>
                           <a href="<?php echo $sm['link']; ?>"><img src="<?php echo $sm['icon']; ?>" /></a>
                      	<?php } ?>
                    	<a class="quote-btn" href="<?php echo get_field('header_btn_link', 'option'); ?>"><?php echo get_field('header_btn_text', 'option'); ?></a>
					</p>
                    
                    <div class="clear"></div>
                    
                    <p>
						<a class="phone" href="tel:<?php echo get_field('phone', 'option'); ?>"><?php echo get_field('phone', 'option'); ?></a>
                    	<a class="email" href="mailto:<?php echo get_field('email', 'option'); ?>"><?php echo get_field('email', 'option'); ?></a>
					</p>
                </div>
            	<div class="clear"></div>
                
            </div>
            
            <div class="nav">
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
                <div class="clear"></div>
            </div>
            
        </header>

    
<body <?php body_class(); ?> >