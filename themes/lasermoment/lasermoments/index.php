<?php 
/*
Template Name: Home
*/
get_header(); ?>

		<section>
        	<div class="banner">
                
                <div class="banner-content">
                    <div class="banner-slider">
                    	<?php foreach(get_field('banners', $post->ID) as $b) { ?>
                        <div>
                            <h1 class="banner-text"><?php echo $b['text']; ?></h1>
                            <div class="clear"></div>
                            <a href="<?php echo $b['link']; ?>" class="banner-btn"><?php echo $b['button']; ?></a>
                      	</div>
                        <?php } ?>
                   	</div>
                </div>
            </div>
            <div class="clear"></div>
            
        </section>
        
        <section class="wb">
        	<div class="banner-column">
            	<div class="commercial">
                	<h3><?php echo get_field('column_left_title', $post->ID); ?></h3>
                    <div class="red-line"></div>
                    <a href="<?php echo get_field('column_left_link', $p->ID); ?>" class="com-btn"><?php echo get_field('column_left_button', $post->ID); ?></a>
                    <div class="bc-text com-text">
                    	<p><?php echo get_field('column_left_content', $p->ID); ?></p>
                    </div>
                    <img src="<?php echo get_field('column_left_image', $p->ID); ?>">
                </div>
                
                <div class="industrial">
                	<h3><?php echo get_field('column_right_title', $post->ID); ?></h3>
                    <div class="red-line"></div>
                    <a href="<?php echo get_field('column_right_link', $p->ID); ?>" class="ind-btn"><?php echo get_field('column_right_button', $post->ID); ?></a>
                    <div class="bc-text ind-text">
                    	<p><?php echo get_field('column_right_content', $p->ID); ?></p>
                    </div>
                    <img src="<?php echo get_field('column_right_image', $p->ID); ?>">
                </div>
                <div class="clear"></div>
            </div>
        </section>
        
        <section class="about">
        	<div class="wrap home-about">
            	<img src="<?php echo get_field('about_image', $p->ID); ?>">
                <div class="a-content">
                    <h2 class="title"><?php echo get_field('about_title', $p->ID); ?></h2>
                    <p><?php echo get_field('about_content', $p->ID); ?></p>
                    <a href="<?php echo get_field('about_button_link', $p->ID); ?>" class="about-btn"><?php echo get_field('about_button_text', $p->ID); ?></a>
                </div>
                <div class="clear"></div>
            </div>
            
        </section>		

        <section class="wn">
        	<div class="news">
            <div class="news-item">
                    <h3 class="title">What's New?</h3>
                    <ul>
                        <li class="n-item">
                            <div class="container">
                                <h4 class="heading">Lorem iPsum dipsum sit</h4>  
                                <span class="date">September 25, 2017</span>             
                                <img src="<?php echo IMG; ?>/news.jpg" /><p>Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmod tehampor incididunt uts laboasre et Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmod Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmoddolhvaliqua. Ut enim  vem, nostrasuaations ullamco labiosi ut saaliquip exoi asea comoodo Disco choice is the have great work.</p>
                                <span class="r-more"><a href="#">Read more</a></span>
                            </div>		
                            <p><span class="comments"><i class="fa fa-comments-o"></i> No Comment</span> <span class="social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></span></p>
                            <div class="clear"></div>
                        </li>
                        
                        <li class="n-item">
                            <div class="container">
                                <h4 class="heading">Lorem iPsum dipsum sit</h4>  
                                <span class="date">September 25, 2017</span>             
                                <p>Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmod tehampor incididunt uts laboasre et Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmod Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmoddolhvaliqua. Ut enim  vem, nostrasuaations ullamco labiosi ut saaliquip exoi asea comoodo Disco choice is the have great work.</p>
                                <span class="r-more"><a href="#">Read more</a></span>
                            </div>		
                            <p><span class="comments"><i class="fa fa-comments-o"></i> No Comment</span> <span class="social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></span></p>
                            <div class="clear"></div>
                        </li>
                        
                        <li class="n-item">
                        	<div class="container">
                                <h4 class="heading">Lorem iPsum dipsum sit</h4>  
                                <span class="date">September 25, 2017</span>             
                                <p>Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmod tehampor incididunt uts laboasre et Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmod Lorem ipsum doloirs sit amet, csatetur adipisicin, sed does eiusmoddolhvaliqua. Ut enim  vem, nostrasuaations ullamco labiosi ut saaliquip exoi asea comoodo Disco choice is the have great work.</p>
                                <span class="r-more"><a href="#">Read more</a></span>
                            </div>		
                            <p><span class="comments"><i class="fa fa-comments-o"></i> No Comment</span> <span class="social"><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-linkedin"></i></a></span></p>
                            <div class="clear"></div>
                        </li>
                    </ul>
                </div>
                
                <div class="sidebar">
                    <img src="<?php echo IMG; ?>/sidebar.jpg" />
                </div>
            <div class="clear"></div>
            </div>
            
            
        </section>
        
      <section class="cl">
        	<div class="wrap clients">
                <h2 class="c-title"><?php echo get_field('client_header', 'option'); ?></h2>
                <div class="boxes">
					<?php foreach(get_field('client', 'option') as $c) { ?> 
						<div>        	
                            <a href="<?php echo $c['link']; ?>" class="c-logo"><img src="<?php echo $c['image']; ?>" /></a>
                    	</div>
                    <?php } ?>
                </div>
            </div>
            <div class="clear"></div>
            
        </section>
        
<?php get_footer(); ?>