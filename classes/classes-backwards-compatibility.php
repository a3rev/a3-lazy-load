<?php

use A3Rev\LazyLoad;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class A3_Lazy_Load_Hook_Filter
{
	public static function a3_wp_admin() {
		LazyLoad\Hook_Filter::a3_wp_admin();
	}

	public static function admin_sidebar_menu_css() {
		LazyLoad\Hook_Filter::admin_sidebar_menu_css();
	}

	public static function plugin_extension_box( $boxes = array() ) {

		return LazyLoad\Hook_Filter::plugin_extension_box( $boxes );
	}

	public static function plugin_extra_links($links, $plugin_name) {
		return LazyLoad\Hook_Filter::plugin_extra_links( $links, $plugin_name );
	}

	public static function settings_plugin_links( $actions ) {
		return LazyLoad\Hook_Filter::settings_plugin_links( $actions );
	}
}

class A3_Lazy_Load
{
	const version = A3_LAZY_VERSION;
	protected $iframe_placeholder_url;
	protected $_placeholder_url;
	protected $_skip_images_classes;
	protected $_skip_videos_classes;
	protected static $_instance;

	function __construct() {
		LazyLoad::_instance();
	}

	static function _instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new A3_Lazy_Load;
		}
		return self::$_instance;
	}

	static function enqueue_scripts() {
		LazyLoad::enqueue_scripts();
	}

	static function localize_printed_scripts() {
		LazyLoad::localize_printed_scripts();
	}

	static function is_wptouch() {
		return LazyLoad::is_wptouch();
	}

	static function has_wptouch() {
		return LazyLoad::has_wptouch();
	}

	static function is_mobilepress() {
		return LazyLoad::is_mobilepress();
	}

	static function has_mobilepress() {
		return LazyLoad::has_mobilepress();
	}

	static public function preg_quote_with_wildcards( $what ){
		return LazyLoad::preg_quote_with_wildcards( $what );
	}

	static function add_lazy_attributes( $allowedposttags, $context ) {
		return LazyLoad::add_lazy_attributes( $allowedposttags, $context );
	}

	static function filter_html( $content, $include_noscript = null ) {
		return LazyLoad::filter_html( $content, $include_noscript = null );
	}

	static function filter_images( $content, $include_noscript = null ) {
		return LazyLoad::filter_images( $content, $include_noscript = null );
	}

	static function sidebar_before_filter_images() {
		LazyLoad::sidebar_before_filter_images();
	}

	static function sidebar_after_filter_images() {
		LazyLoad::sidebar_after_filter_images();
	}

	static function filter_content_images( $content ) {
		return LazyLoad::filter_content_images( $content );
	}

	static function get_attachment_image_attributes( $attr ) {
		return LazyLoad::get_attachment_image_attributes( $attr );
	}

	protected function _filter_images( $content, $include_noscript = null ) {
		return false;
	}

	function get_color( $type = 'background' ) {
		return LazyLoad::get_color( $type );
	}
 
	static function filter_videos( $content, $include_noscript = null ) {
		return LazyLoad::filter_videos( $content, $include_noscript = null );
	}

	static function sidebar_before_filter_videos() {
		LazyLoad::sidebar_before_filter_videos();
	}

	static function sidebar_after_filter_videos() {
		LazyLoad::sidebar_after_filter_videos();
	}

	protected function _filter_videos( $content, $include_noscript = null ) {
		return false;
	}
}
