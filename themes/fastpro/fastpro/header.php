<?php 
global $post;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
        <title><?php echo get_bloginfo( 'name' ); ?></title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/responsive.css">
		<?php wp_head(); ?>
    </head>
    
    <body>
        <header style="background: url(<?php echo IMG; ?>/fastpro-header.jpg) center top no-repeat transparent; border-bottom: #012339 3px solid; background-repeat-y: repeat;">
        	<div class="wrap top">
                <a href="<?php echo site_url(); ?>"" class="logo"><img src="<?php echo get_field('logo','options'); ?>" /></a>
                <div class="user">
                	<span class="phone"><a href="tel:4038005159"><i class="fa fa-phone-square" aria-hidden="true"></i></i> <?php echo get_field('phone','options'); ?></a></span>&nbsp; <span class="email"><a href="mailto:<?php echo get_field('email','options'); ?>"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo get_field('email','options'); ?></a></span> <a href="<?php echo get_field('consultation_link','options'); ?>" class="btn"><?php echo get_field('consultation_text','options'); ?></a>
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
				</div>
            </div>
            <div class="clear"></div>
        </header>
        
        <body <?php body_class(); ?> >