<?php

/**
 *
 * Plugin Name: 			Customize Add to Cart Button
 * Description: 			Customize the "Add to Cart" button text in WooCommerce by product type in both archive and product pages
 * Plugin URI: 				https://www.movidev.com/
 * Author: 					Mo G
 * Author URI: 				https://www.movidev.com/
 * Version: 				1.0.0
 * License: 				GNU General Public License v2 or later
 * License URI: 			http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 			customiz-add-to-cart-button
 * Domain Path: 			/lang/
 * Requires at least:		5.0
 * Tested up to:			5.7
 * Requires PHP: 			7.0
 * WC requires at least:	3.0
 * WC tested up to: 		5.1
 *
 * @author 					Mo G
 * @link              		https://www.movidev.com/
 * @since             		1.0.0
 * @package           		AddToCart
 *
 */

/*
    Copyright 2016 - 2021 Mo G (email: mo@movidev.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

defined ('ABSPATH') or exit;
if (!class_exists ('Mo_AddToCart')) :

	Class Mo_AddToCart {
		private static $instance;
		private function __construct () {

			$this->name   = __('Customize Add to Cart Button', 'customize-add-to-cart-button');
			$this->domain   = 'customize-add-to-cart-button';
			$this->link   = 'options-general.php?page=add-to-cart';
			$this->cats   = false;
			$this->archives = ['class', 'options'];
			$this->clases   = ['MoAddToCart', 'OptionsAddToCart'];
			$this->dirname  = dirname (__FILE__);

			$this->load_archives($this->archives, $this->cats);
			$this->load_locales($this->domain);

			register_activation_hook (__FILE__, function () {
				set_transient ('customize-add-to-cart-button-active', true, 5);
				}, 10 );

			add_action ('init', [$this, 'init_plugin'], 10);
			add_action ('admin_notices' , [$this, 'help_notice'], 10);
			add_filter ('plugin_action_links', [$this, 'load_action'], 10, 2);
		}

		public function __clone () {

			_doing_it_wrong (__FUNCTION__, sprintf (__('You cannot clone instances of %s.', 'customize-add-to-cart-button'), get_class ($this)), '2.1.2');
		}

		public function load_archives ($archives, $cats) {

			foreach ($archives as $archive)
				require (sprintf ('%s/%s.php', $this->dirname, $archive));
		}

		public function init_plugin () {

			if ($this->woocommerce_active())
				foreach ($this->clases as $clase)
					new $clase;
		}

		private function woocommerce_active () {

			if (!class_exists ('WooCommerce')) {

				add_action ('admin_notices', function () {
					?>
						<div class="notice notice-error is-dismissible">
							<p><?php printf (__('The plugin %s needs WooCommerce to be active in order to work. Please, activate WooCommerce first.', 'customize-add-to-cart-button'), '<i>' . $this->name . '</i>'); ?></p>
						</div>
					<?php
					}, 10);

				return false;
				}

			return true;
		}

		public function help_notice () {

			if (get_transient ('customize-add-to-cart-button-active')) {
			?>
				<div class="updated notice is-dismissible woocommerce-message">
					<p><?php printf (__('Thanks for using %s. Go to the settings page to configure the plugin.', 'customize-add-to-cart-button'), '<i>' . $this->name . '</i>' ); ?></p>
					<p><?php printf ('<a href="%s" class="button button-primary">%s</a>', $this->link, __('Settings')); ?></p>
				</div>
			<?php
			}
		}

		public function load_locales () {

			$locale = function_exists ('determine_locale') ? determine_locale() : (is_admin() && function_exists ('get_user_locale') ? get_user_locale() : get_locale());
			$locale = apply_filters ('plugin_locale', $locale, $this->domain);
			unload_textdomain ($this->domain);
			load_textdomain ($this->domain, $this->dirname . '/lang/' . $this->domain . '-' . $locale . '.mo');
			load_plugin_textdomain ($this->domain, false, $this->dirname . '/lang');
		}

		public function load_action ($damelinks, $plugin) {

			static $addtocart;
			isset ($addtocart) or $addtocart = plugin_basename (__FILE__);

			if ($addtocart == $plugin) {

				$enlaces['settings'] = '<a href="' . $this->link . '">' . __('Settings') . '</a>';
				$damelinks = array_merge ($enlaces, $damelinks);
				}
			
			return $damelinks;
		}

		public static function instance () {

			if (null === self::$instance)
				self::$instance = new self();

			return self::$instance;
		}
	}
endif;

Mo_AddToCart::instance();
