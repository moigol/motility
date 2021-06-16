<?php

/**
 *
 * Plugin Name: 			ACF Data to Elementor
 * Description: 			Customize the "Add to Cart" button text in WooCommerce by product type in both archive and product pages using shortcode [acftoelementor key="acf_field"]
 * Plugin URI: 				https://www.movidev.com/
 * Author: 					MoViDev
 * Author URI: 				https://www.movidev.com/
 * Version: 				1.0.0
 * License: 				GNU General Public License v2 or later
 * License URI: 			http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 			acf-data-to-elementor
 * Requires PHP: 			7.0
 *
 * @author 					Mo G
 * @link              		https://www.movidev.com/
 * @since             		1.0.0
 * @package           		ACF Data to Elementor
 *
 */

/*
    Copyright 2016 - 2021 MoViDev (email: info@movidev.com)

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

if (!class_exists ('Mo_ACFDataElementor')) {
	class Mo_ACFDataElementor {

		private static $instance;

		private function __construct () {

			$this->name     = __('ACF Data to Elementor', 'acf-data-to-elementor');
			$this->domain   = 'acf-data-to-elementor';
			$this->link     = 'options-general.php?page=acf-data-to-elementor';
			$this->dirname  = dirname (__FILE__);

			register_activation_hook (__FILE__, function () {
				set_transient ('acf-data-to-elementor-active', true, 5);
				}, 10 );

			//add_action ('init', [$this, 'init_plugin'], 10);
			add_shortcode( 'acftoelementor', [$this, 'load_shortcodes'] );

		}

		public function __clone () {
			_doing_it_wrong (__FUNCTION__, sprintf (__('You cannot clone instances of %s.', 'acf-data-to-elementor'), get_class ($this)), '1.0.0');
		}

		public function init_plugin () {
			
		}

		public function load_shortcodes ( $atts ) 
		{
			global $post;
			$return = ''; 
			$acfkey = isset($atts['key']) ? $atts['key'] : false;
			$showid = isset($atts['showid']) ? $atts['showid'] : false;
			$relid = isset($atts['rel']) ? $atts['rel'] : false;
			
			$css = '<style>';
			$js = '<script>';
			
			if($showid) {
				$css .= 'body.elementor-editor-active #'.$showid.'{display:block;}';
			} 
			
			switch($atts['type']) {
				case 'video':
					$vid = [];
					$vid['width'] = isset($atts['width']) ? $atts['width'] : 640;
					$vid['height'] = isset($atts['height']) ? $atts['height'] : 390;
					$vid['src'] = get_field($acfkey, $post->ID);				
					
					if($showid && $vid['src']) {
						$css .= '#'.$showid.'{display:block !important;}';
					}

					$return .= wp_video_shortcode( $vid );					
					break;
				default:
					$acfkey = isset($atts['key']) ? $atts['key'] : false;
					$thevalue = get_field($acfkey, $post->ID);
					
					if($showid && $thevalue) {
						$css .= '#'.$showid.'{display:block !important;}';
					}
					
					if($relid && $thevalue) {
						$css .= '#'.$showid.' '.$relid.'{display:block !important;}';
						$js .= 'jQuery("#'.$showid.' '.$relid.'").addClass("custom-item-enabled");';
					} else {
						$css .= '#'.$showid.' '.$relid.'{display:none !important;}';
					}
					
					if($thevalue) {
						$return .= apply_filters('the_content', $thevalue);
					}
					break;
			} 
			
			$css .= '</style>';
			$js .= 'jQuery(document).ready(function(){ setTimeout(function() { jQuery("body .custom-item-enabled:first").click(); },3000); });</script>';
			
			return $css.$js.$return;
		}

		public static function instance () {

			if (null === self::$instance)
				self::$instance = new self();

				return self::$instance;
			}

		}

}

Mo_ACFDataElementor::instance();