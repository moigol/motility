<?php

/**
 *
 * Plugin Name: 			Toolset Form Addon
 * Description: 			Custom plugin to address toolsetup form submission and etc.
 * Plugin URI: 				https://www.movidev.com/
 * Author: 					MoViDev
 * Author URI: 				https://www.movidev.com/
 * Version: 				1.0.0
 * License: 				GNU General Public License v2 or later
 * License URI: 			http://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: 			toolset-form-addon
  * Requires PHP: 			7.0
 *
 * @author 					Mo G
 * @link              		https://www.movidev.com/
 * @since             		1.0.0
 * @package           		Toolset Form Addon
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

if (!class_exists ('Mo_ToolsetFormAddOn')) {
	class Mo_ToolsetFormAddOn {

		private static $instance;

		private function __construct () {

			$this->name     = __('Toolset Form Addon', 'toolset-form-addon');
			$this->domain   = 'toolset-form-addon';
			$this->dirname  = dirname (__FILE__);

			register_activation_hook (__FILE__, function () {
				set_transient ('toolset-form-addon-active', true, 5);
				add_role( 'agency', 'Agency', get_role( 'subscriber' )->capabilities );
			}, 10 );

			register_deactivation_hook (__FILE__, function () {
				set_transient ('toolset-form-addon-active', false, 5);
				remove_role( 'agency' );
			}, 10 );

            add_action('cred_save_data', [$this, 'post_capture'],10,2);
			
			add_action('show_user_profile', [$this, 'custom_user_profile_fields']);
			add_action('edit_user_profile', [$this, 'custom_user_profile_fields']);

			add_action( 'personal_options_update', [$this, 'update_extra_profile_fields'] );
			add_action( 'edit_user_profile_update', [$this, 'update_extra_profile_fields'] );
			
			add_action('init', [$this, 'custom_login']);
		}

		public function __clone () {
			_doing_it_wrong (__FUNCTION__, sprintf (__('You cannot clone instances of %s.', 'toolset-form-addon'), get_class ($this)), '1.0.0');
		}

		public function init_plugin () {
			
		}
		
		function custom_login(){
		 	global $pagenow;
		 	
		 	 $action = (isset($_GET['action'])) ? $_GET['action'] : '';
            // Check if we're on the login page, and ensure the action is not 'logout'
            if( $pagenow == 'wp-login.php' && ( ! $action || ( $action && ! in_array($action, ['logout', 'lostpassword', 'rp', 'resetpass'])))) {
                // Load the home page url
                $page = get_bloginfo('url').'/login/';
                // Redirect to the home page
                if( !is_user_logged_in() && !$_POST ) {
                    wp_redirect($page);
                    // Stop execution to prevent the page loading for any reason
                    exit();
                }
            }
		}
		
		// @param WP_User $user
		function custom_user_profile_fields( $user ) {
			$thePost = esc_attr( get_the_author_meta( '_related_post_id', $user->ID ) );
			$page = get_bloginfo('url');
			?>
			<table class="form-table">
				<tr>
					<th>
						<label for="code"><?php _e( 'Related Page Info' ); ?></label>
					</th>
					<td>
						<input type="text" name="_related_post_id" id="_related_post_id" value="<?php echo $thePost; ?>" class="regular-text" /><br>
						<a href="<?php echo $page; ?>/wp-admin/post.php?post=<?php echo $thePost; ?>&action=edit" target="_blank">Update page</a>
					</td>
				</tr>
			</table>
			<?php
		}
		
		function update_extra_profile_fields( $user_id ) {
			if ( current_user_can( 'edit_user', $user_id ) )
				update_user_meta( $user_id, '_related_post_id', $_POST['_related_post_id'] );
		}

		public function post_capture ( $post_id, $form_data ) 
		{			
            // if a specific form
            if ($form_data['id']==97)
            {
                error_log(json_encode($_POST));
                if (isset($_POST['agency_location']))
                {
                    // add it to saved post meta
                    if( get_post_meta($post_id, 'wpcf-location', true) )
                    {
                        update_post_meta( $post_id, 'wpcf-location', $_POST['agency_location'] );
                    } else {
                        add_post_meta( $post_id, 'wpcf-location', $_POST['agency_location'], true );
                    }
                }

                if (isset($_POST['agency_country']))
                {
                    // add it to saved post meta
                    if( get_post_meta($post_id, 'wpcf-location-country', true) )
                    {
                        update_post_meta( $post_id, 'wpcf-location-country', $_POST['agency_country'] );
                    } else {
                        add_post_meta( $post_id, 'wpcf-location-country', $_POST['agency_country'], true );
                    }
                }
				
				if (isset($_POST['wpcf-contact-person-email']))
                {
					$userdata = array(
						'user_pass'     => '1234567890', 
						'user_login'    => $_POST['wpcf-contact-person-email'], 
						'user_nicename' => $_POST['wpcf-contact-person-name'], 
						'user_url'      => $_POST['wpcf-website-url'], 
						'user_email'    => $_POST['wpcf-contact-person-email'], 
						'display_name'  => $_POST['wpcf-contact-person-name'], 
						'nickname'      => $_POST['wpcf-contact-person-name'], 
						'first_name'    => $_POST['wpcf-contact-person-name'],
						'role'          => 'agency'
					);

					$user_id = wp_insert_user( $userdata ) ;

					// On success.
					if ( ! is_wp_error( $user_id ) ) {
						update_user_meta( $user_id, 'show_admin_bar_front', false);
						
					}
                }
            }
		}

		public static function instance () {

			if (null === self::$instance)
				self::$instance = new self();

				return self::$instance;
			}

		}

}

Mo_ToolsetFormAddOn::instance();