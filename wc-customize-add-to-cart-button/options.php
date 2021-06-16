<?php
defined ('ABSPATH') or exit;

if (!class_exists ('OptionsAddToCart')) :

	Class OptionsAddToCart {

		public function __construct () {

			if (!is_admin())
				return;

			add_action ('admin_menu', [$this, 'create_menu']);
			add_action ('admin_init', [$this, 'register_options']);
			}

		public function create_menu () {

			add_options_page (__('Add to Cart Custom Text', 'customize-add-to-cart-button'), __('Add to Cart Button', 'customize-add-to-cart-button'), 'manage_options', 'add-to-cart', [$this, 'add_to_cart_options']);
			}

		public function register_options () {

			register_setting ('addtocart-options', 'customize_add_to_cart_button_settings');
			}

		public function add_to_cart_options () {

			current_user_can ('manage_options') or wp_die (__('Sorry, you are not allowed to access this page.'));

			$this->load_options();

			?>

			<div class="wrap">

				<h2><?php _e('Options', 'customize-add-to-cart-button'); ?></h2>

				<form method="post" action="options.php">

					<?php

						settings_fields ('addtocart-options');
						do_settings_sections ('addtocart-options');

						$idioma  = get_locale();
						$general = substr ($idioma, 0, 2);

					?>

					<h3><?php _e('Category Slug', 'customize-add-to-cart-button'); ?></h3>

					<p><?php echo __('Apply setting only on specific product category', 'customize-add-to-cart-button'); ?></p>

					<table class="form-table">

						<tr valign="top">

							<th scope="row"><?php _e('Enter product category slug e.g. pre-order', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_category]" value="<?php _e(esc_attr ($this->add_to_cart_category)); ?>" /></td>

						</tr>

						

					</table>

					<hr />

					<h3><?php _e('Button text in single product pages', 'customize-add-to-cart-button'); ?></h3>

					<p><?php printf(__('Custom text for the %s button in single product pages by product type', 'customize-add-to-cart-button'), '<em>' . $this->addtocart . '</em>'); ?></p>

					<table class="form-table">
		        
						<tr valign="top">

							<th scope="row"><?php _e('Simple product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_simple_single]" value="<?php _e(esc_attr ($this->add_to_cart_simple_single)); ?>" /></td>

						</tr>

						<tr valign="top">

							<th scope="row"><?php _e('External/Affiliate product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_external_single]" value="<?php _e(esc_attr ($this->add_to_cart_external_single)); ?>" /></td>

						</tr>
		        
						<tr valign="top">

							<th scope="row"><?php _e('Variable product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_variable_single]" value="<?php _e(esc_attr ($this->add_to_cart_variable_single)); ?>" /></td>

						</tr>
		        
						<tr valign="top">

							<th scope="row"><?php _e('Grouped product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_grouped_single]" value="<?php _e(esc_attr ($this->add_to_cart_grouped_single)); ?>" /></td>

						</tr>

						<?php if (post_type_exists ('bookable_resource')) : ?>
		        
							<tr valign="top">

								<th scope="row"><?php _e('Bookable product', 'woocommerce-bookings'); ?></th>
								<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_bookable_single]" value="<?php _e(esc_attr ($this->add_to_cart_bookable_single)); ?>" /></td>

							</tr>

						<?php endif; ?>

					</table>

					<hr />

					<h3><?php _e('Button text in archive pages', 'customize-add-to-cart-button'); ?></h3>

					<p><?php printf(__('Custom text for the %s button in archive pages (shop, category, tags...) by product type', 'customize-add-to-cart-button'), '<em>' . $this->addtocart . '</em>'); ?></p>

					<table class="form-table">

						<tr valign="top">

							<th scope="row"><?php _e('Simple product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_simple]" value="<?php _e(esc_attr ($this->add_to_cart_simple)); ?>" /></td>

						</tr>

						<tr valign="top">

							<th scope="row"><?php _e('External/Affiliate product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_external]" value="<?php _e(esc_attr ($this->add_to_cart_external)); ?>" /></td>

						</tr>
		        

						<tr valign="top">

							<th scope="row"><?php _e('Variable product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_variable]" value="<?php _e(esc_attr ($this->add_to_cart_variable)); ?>" /></td>

						</tr>
		        
						<tr valign="top">

							<th scope="row"><?php _e('Grouped product', 'woocommerce'); ?></th>
							<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_grouped]" value="<?php _e(esc_attr ($this->add_to_cart_grouped)); ?>" /></td>

						</tr>

						<?php if (post_type_exists ('bookable_resource')): ?>
		        
							<tr valign="top">

								<th scope="row"><?php _e('Bookable product', 'woocommerce-bookings'); ?></th>
								<td><input type="text" name="customize_add_to_cart_button_settings[add_to_cart_bookable]" value="<?php _e(esc_attr ($this->add_to_cart_bookable), 'woocommerce-bookings'); ?>" /></td>

							</tr>

						<?php endif; ?>

					</table>
		    
					<?php submit_button(); ?>

				</form>

			
			</div>

			<?php
			}

		/**
		 * For retrocompatibility purposes
		 *
		 * @since 3.0.0
		 *
		 */
		private function load_options () {

			$this->addtocart     = __('Add to cart', 'woocommerce');
			$this->buyproduct    = _x('Buy product', 'placeholder', 'woocommerce');
			$this->selectoptions = __('Select options', 'woocommerce');
			$this->viewproducts  = __('View products', 'woocommerce');
			$this->booknow       = __('Book now', 'woocommerce-bookings');

			$options = array(
				'add_to_cart_category' 			=> 'pre-order',
				'add_to_cart_external' 			=> $this->buyproduct,
				'add_to_cart_grouped' 			=> $this->viewproducts,
				'add_to_cart_simple' 			=> $this->addtocart,
				'add_to_cart_variable' 			=> $this->selectoptions,
				'add_to_cart_external_single' 	=> $this->buyproduct,
				'add_to_cart_grouped_single' 	=> $this->addtocart,
				'add_to_cart_simple_single' 	=> $this->addtocart,
				'add_to_cart_variable_single' 	=> $this->addtocart,
				'add_to_cart_bookable' 			=> $this->booknow,
				'add_to_cart_bookable_single' 	=> $this->booknow,
				);

			if ($this->settings = get_option ('customize_add_to_cart_button_settings'))
				foreach ($options as $option => $default)
					$this->$option = $this->settings[$option];

			else { //New install or updated from 2.3.0

				foreach ($options as $option => $default) {

					$this->$option          = get_option ($option, $default);
					$this->settings[$option] = $this->$option;
					}

				update_option ('customize_add_to_cart_button_settings', $this->settings);
				}
			}

		}

endif;