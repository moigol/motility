<?php
defined ('ABSPATH') or exit;

if (!class_exists ('MoAddToCart')) :

	Class MoAddToCart {

		public function __construct () {

			add_filter ('add_to_cart_text', [$this, 'change_text_button'], 10, 1); //WooCommerce <2.1
			add_filter ('woocommerce_product_add_to_cart_text', [$this, 'change_text_button'], 10, 1);
			add_filter ('woocommerce_product_single_add_to_cart_text', [$this, 'change_text_button'], 10, 1);
			add_filter ('woocommerce_booking_single_add_to_cart_text', [$this, 'change_text_button'], 10, 1); //WC Bookings
			}

		public function change_text_button ($text) {

			global $product;

			if (!isset ($product) || !is_object ($product))
				return $text;

			$product_type = $product->get_type();

			$this->load_options();
			$text_category = esc_attr (get_option ('add_to_cart_category', 'pre-order'));
			$text_external = esc_attr (get_option ('add_to_cart_external', __('Buy product', 'woocommerce')));
			$text_group = esc_attr (get_option ('add_to_cart_grouped', __('View products', 'woocommerce')));
			$text_simple = esc_attr (get_option ('add_to_cart_simple', __('Add to cart', 'woocommerce')));
			$text_variable = esc_attr (get_option ('add_to_cart_variable', __('Select options', 'woocommerce')));
			$text_bookable = esc_attr (get_option ('add_to_cart_bookable', __('Book now', 'woocommerce')));
			$text_external_single = esc_attr (get_option ('add_to_cart_external_single', $text_external));
			$text_group_single = esc_attr (get_option ('add_to_cart_grouped_single', $text_simple));
			$text_simple_single = esc_attr (get_option ('add_to_cart_simple_single', $text_simple));
			$text_variable_single = esc_attr (get_option ('add_to_cart_variable_single', $text_simple));
			$text_bookable_single = esc_attr (get_option ('add_to_cart_bookable_single', $texto_bookable));
			if(has_term($text_category, 'product_cat', $product->get_id())){
				if (is_product()) {  // Single
					switch ($product_type) {
						case 'external':
							return $this->add_to_cart_external_single;
							break;

						case 'grouped':
							return $this->add_to_cart_grouped_single;
							break;

						case 'simple':
							return $this->add_to_cart_simple_single;
							break;

						case 'variable':
							return $this->add_to_cart_variable_single;
							break;

						case 'booking':
							return $this->add_to_cart_bookable_single;
							break;

						default:
							return $this->addtocart;
							break;
					}
				} else { // Archives
					switch ($product_type) {
						case 'external':
							return $this->add_to_cart_external;
							break;

						case 'grouped':
							return $this->add_to_cart_grouped;
							break;

						case 'simple':
							return $this->add_to_cart_simple;
							break;

						case 'variable':
							return $this->add_to_cart_variable;
							break;

						case 'booking':
							return $this->add_to_cart_bookable;
							break;

						default:
							return $this->addtocart;
							break;
					}
				}
			} else {
				return $text;
			}

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