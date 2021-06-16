<?php get_header(); ?>

        <?php echo get_template_part('heading'); ?>

        <section class="page">
            <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                            <div class="page-content <?php echo get_field('position', $post->ID); ?>">
                                <div class="img">
                                    <img src="<?php echo get_field('image', $post->ID); ?>">
                                </div>
                                <div class="page-text">
                                    <div class="program">
                                        <h2><?php echo get_field('title', $post->ID); ?></h2>
                                        <div class="description"><?php echo get_field('content', $post->ID); ?></div>
                                        <div class="include"><?php echo get_field('includes', $post->ID); ?></div>
                                        <span>*<?php echo get_field('note', $post->ID); ?></span>
                                        <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="paypal"><!-- Identify your business so that you can collect the payments. -->
										   <input name="business" type="hidden" value="<?php echo get_field('paypal_email','option'); ?>" /><!-- Specify a PayPal Shopping Cart Add to Cart button. -->
										   <input name="cmd" type="hidden" value="_cart" />
										   <input name="add" type="hidden" value="1" /><!-- Specify details about the item that buyers will purchase. -->
										   <input name="item_name" type="hidden" value="<?php the_title(); ?>" />
										   <input name="amount" type="hidden" value="<?php echo get_field('price', $post->ID); ?>" />
										   <input name="currency_code" type="hidden" value="USD" />

										   <!-- Display the payment button. -->
										   <div class="register-btn">
											   <span class="price">$<?php echo get_field('price', $post->ID); ?> USD</span>
											   <input class="btn btn-primary btn-lg active" alt="Add to Cart" name="Add to Cart" value="Purchase Now" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" type="submit" />
										   </div>
										</form>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<?php get_footer(); ?>    