<?php

namespace A3Rev\LazyLoad;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Hook_Filter
{
	public static function a3_wp_admin() {
		wp_enqueue_style( 'a3rev-wp-admin-style', A3_LAZY_LOAD_CSS_URL . '/a3_wp_admin.css' );
	}

	public static function admin_sidebar_menu_css() {
		wp_enqueue_style( 'a3rev-admin-lazy-load-sidebar-menu-style', A3_LAZY_LOAD_CSS_URL . '/admin_sidebar_menu.css' );
	}

	public static function plugin_extension_box( $boxes = array() ) {
		$support_box = '<a href="https://wordpress.org/support/plugin/a3-lazy-load" target="_blank" alt="'.__('Go to Support Forum', 'a3-lazy-load' ).'"><img src="'.A3_LAZY_LOAD_IMAGES_URL.'/go-to-support-forum.png" /></a>';
		$boxes[] = array(
			'content' => $support_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

		$first_box = '<a href="https://profiles.wordpress.org/a3rev/#content-plugins" target="_blank" alt="'.__('Free WordPress Plugins', 'a3-lazy-load' ).'"><img src="'.A3_LAZY_LOAD_IMAGES_URL.'/free-wordpress-plugins.png" /></a>';

		$boxes[] = array(
			'content' => $first_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

		$second_box = '<a href="https://profiles.wordpress.org/a3rev/#content-plugins" target="_blank" alt="'.__('Free WooCommerce Plugins', 'a3-lazy-load' ).'"><img src="'.A3_LAZY_LOAD_IMAGES_URL.'/free-woocommerce-plugins.png" /></a>';

		$boxes[] = array(
			'content' => $second_box,
			'css' => 'border: none; padding: 0; background: none;'
		);

        $third_box = '<div style="margin-bottom: 5px; font-size: 12px;"><strong>' . __('Is this plugin is just what you needed? If so', 'a3-lazy-load' ) . '</strong></div>';
        $third_box .= '<a href="https://wordpress.org/support/view/plugin-reviews/a3-lazy-load#postform" target="_blank" alt="'.__('Submit Review for Plugin on WordPress', 'a3-lazy-load' ).'"><img src="'.A3_LAZY_LOAD_IMAGES_URL.'/a-5-star-rating-would-be-appreciated.png" /></a>';

        $boxes[] = array(
            'content' => $third_box,
            'css' => 'border: none; padding: 0; background: none;'
        );

        $four_box = '<div style="margin-bottom: 5px;">' . __('Connect with us via','a3-lazy-load' ) . '</div>';
		$four_box .= '<a href="https://www.facebook.com/a3rev" target="_blank" alt="'.__('a3rev Facebook', 'a3-lazy-load' ).'" style="margin-right: 5px;"><img src="'.A3_LAZY_LOAD_IMAGES_URL.'/follow-facebook.png" /></a> ';
		$four_box .= '<a href="https://twitter.com/a3rev" target="_blank" alt="'.__('a3rev Twitter', 'a3-lazy-load' ).'"><img src="'.A3_LAZY_LOAD_IMAGES_URL.'/follow-twitter.png" /></a>';

		$boxes[] = array(
			'content' => $four_box,
			'css' => 'border-color: #3a5795;'
		);

		return $boxes;
	}

	public static function plugin_extra_links($links, $plugin_name) {
		if ( $plugin_name != A3_LAZY_LOAD_NAME) {
			return $links;
		}
		$links[] = '<a href="https://wordpress.org/support/plugin/a3-lazy-load/" target="_blank">'.__('Support', 'a3-lazy-load' ).'</a>';
		return $links;
	}

	public static function settings_plugin_links( $actions ) {
		$actions = array_merge( array( 'settings' => '<a href="'.admin_url( 'options-general.php?page=a3-lazy-load', 'relative' ).'">' . __( 'Settings', 'a3-lazy-load' ) . '</a>' ), $actions );

		return $actions;
	}

}
