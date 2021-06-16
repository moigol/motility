<?php 
global $post;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
        <title>Floatisimo</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Signika:400,600,700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/responsive.css">
		<?php wp_head(); ?>
    </head>
    
    <body>
        <header class="head">
        	<div class="wrap">
                <a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo get_field('logo','options'); ?>" /></a>
                
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
			</div>
            
        </header>
        
        <body <?php body_class(); ?> >