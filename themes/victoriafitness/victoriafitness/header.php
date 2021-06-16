<?php 
global $post;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width; initial-scale=1; maximum-scale=1">
        <title>Victoria McDonald Fitness</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700|Playfair+Display:700" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="<?php echo THEMEURL; ?>/slick/slick-theme.css">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/css/prettyPhoto.css">
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <link rel="stylesheet" href="<?php echo THEMEURL; ?>/responsive.css">
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?> >

        <header>
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-md-12 col-lg-6 admin">
                            <div class="row">
                                <div class="col-sm-4 phone">
                                    <a href="tel:<?php echo get_field('phone','options'); ?>"><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; <?php echo get_field('phone','options'); ?></a>
                                </div>
                                <div class="col-sm-4 email">
                                    <a href="mailto:<?php echo get_field('email','options'); ?>"><i class="fas fa-envelope-open"></i>&nbsp; <?php echo get_field('email','options'); ?></a>                                
                                </div>
                                <div class="col-sm-4">
                                    <div class="row">
                                        <div class="col-sm-6 login">
                                        	<div class="btn btn-primary btn-lg active"><?php wp_loginout(); ?></div>
                                           <?php /*?> <a href="https://victoriamcdonaldfitness.com/login/" class="btn btn-primary btn-lg active" role="button">Login</a><?php */?>
                                        </div>
                                        <div class="col-sm-6 social">
                                            <a href="https://victoriamcdonaldfitness.com/<?php echo get_field('cart','options'); ?>" class="media"><i class="fas fa-shopping-cart"></i></a>
                                            <a href="https://www.instagram.com/<?php echo get_field('ig_id','options'); ?>" class="media"><i class="fab fa-instagram"></i></a>
                                            <a href="https://www.youtube.com/channel/<?php echo get_field('yt_id','options'); ?>" class="media"><i class="fab fa-youtube"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="logo">
                                <a href="<?php echo site_url(); ?>"><img src="<?php echo get_field('logo','options'); ?>"></a>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-8">
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
                                                'theme_location'  => 'main_menu',
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
                    </div>
                </div>
            </div>
        </header>