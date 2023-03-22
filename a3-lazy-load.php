<?php
/*
Plugin Name: a3 Lazy Load
Description: Speed up your site and enhance frontend user's visual experience in PC's, Tablets and mobile with a3 Lazy Load.
Version: 2.7.0
Author: a3rev Software
Author URI: https://a3rev.com/
Requires at least: 5.6
Tested up to: 6.2
Text Domain: a3-lazy-load
Domain Path: /languages
License: GPLv2 or later
	Copyright © 2011 a3 Revolution Software Development team
	a3 Revolution Software Development team
	admin@a3rev.com
	PO Box 1170
	Gympie 4570
	QLD Australia
*/
?>
<?php
define('A3_LAZY_LOAD_FILE_PATH', dirname(__FILE__));
define('A3_LAZY_LOAD_DIR_NAME', basename(A3_LAZY_LOAD_FILE_PATH));
define('A3_LAZY_LOAD_FOLDER', dirname(plugin_basename(__FILE__)));
define('A3_LAZY_LOAD_NAME', plugin_basename(__FILE__));
define('A3_LAZY_LOAD_URL', str_replace(array('http:','https:'), '', untrailingslashit(plugins_url('/', __FILE__))));
define('A3_LAZY_LOAD_DIR', WP_CONTENT_DIR . '/plugins/' . A3_LAZY_LOAD_FOLDER);
define('A3_LAZY_LOAD_JS_URL', A3_LAZY_LOAD_URL . '/assets/js');
define('A3_LAZY_LOAD_CSS_URL', A3_LAZY_LOAD_URL . '/assets/css');
define('A3_LAZY_LOAD_IMAGES_URL', A3_LAZY_LOAD_URL . '/assets/images');

define( 'A3_LAZY_LOAD_KEY', 'a3_lazy_load' );
define( 'A3_LAZY_LOAD_PREFIX', 'a3_lazy_load_' );
define( 'A3_LAZY_VERSION', '2.7.0' );
define( 'A3_LAZY_LOAD_G_FONTS', false );

use \A3Rev\LazyLoad\FrameWork;

if ( version_compare( PHP_VERSION, '5.6.0', '>=' ) ) {
	require __DIR__ . '/vendor/autoload.php';

	/**
	 * Plugin Framework init
	 */
	$GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_interface'] = new FrameWork\Admin_Interface();

	global $a3_lazy_load_settings_page;
	$a3_lazy_load_settings_page = new FrameWork\Pages\Settings();

	$GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_init'] = new FrameWork\Admin_Init();

	$GLOBALS[A3_LAZY_LOAD_PREFIX.'less'] = new FrameWork\Less_Sass();

	// End - Plugin Framework init


	global $a3_lazy_load_excludes;
	$a3_lazy_load_excludes = new \A3Rev\LazyLoad\Excludes();
	
} else {
	return;
}

/**
 * Load Localisation files.
 *
 * Note: the first-loaded translation file overrides any following ones if the same translation is present.
 *
 * Locales found in:
 * 		- WP_LANG_DIR/a3-lazy-load/a3-lazy-load-LOCALE.mo
 * 	 	- WP_LANG_DIR/plugins/a3-lazy-load-LOCALE.mo
 * 	 	- /wp-content/plugins/a3-lazy-load/languages/a3-lazy-load-LOCALE.mo (which if not found falls back to)
 */
function a3_lazy_load_plugin_textdomain() {
	$locale = apply_filters( 'plugin_locale', get_locale(), 'a3-lazy-load' );

	load_textdomain( 'a3-lazy-load', WP_LANG_DIR . '/a3-lazy-load/a3-lazy-load-' . $locale . '.mo' );
	load_plugin_textdomain( 'a3-lazy-load', false, A3_LAZY_LOAD_FOLDER.'/languages' );
}

// Disable for load new google font faces
add_filter( A3_LAZY_LOAD_KEY . '_new_google_fonts_enable', '__return_false' );

// Backwards compatibility for 3rd party plugin use functions from this plugin
include( 'classes/classes-backwards-compatibility.php' );

include( 'admin/a3-lazy-load-admin.php' );

// Defined this function for check Lazy Load is enabled that 3rd party plugins or theme can use to check
$a3_lazy_load_global_settings = get_option( 'a3_lazy_load_global_settings', array( 'a3l_apply_lazyloadxt' => 1, 'a3l_wpcore_lazyload' => 1, 'a3l_apply_to_images' => 1, 'a3l_apply_to_videos' => 1 ) );
if ( 1 == $a3_lazy_load_global_settings['a3l_apply_lazyloadxt'] && !is_admin() && ( 1 == $a3_lazy_load_global_settings['a3l_apply_to_images'] || 1 == $a3_lazy_load_global_settings['a3l_apply_to_videos'] ) ) {
	function a3_lazy_load_enable() {
		return true;
	}
}
if ( 1 == $a3_lazy_load_global_settings['a3l_apply_lazyloadxt'] && !is_admin() &&  1 == $a3_lazy_load_global_settings['a3l_apply_to_images'] ) {
	function a3_lazy_load_image_enable() {
		return true;
	}
}
if ( 1 == $a3_lazy_load_global_settings['a3l_apply_lazyloadxt'] && !is_admin() &&  1 == $a3_lazy_load_global_settings['a3l_apply_to_videos'] ) {
	function a3_lazy_load_video_enable() {
		return true;
	}
}
if ( !is_admin() && isset( $a3_lazy_load_global_settings['a3l_wpcore_lazyload'] ) && 0 == $a3_lazy_load_global_settings['a3l_wpcore_lazyload'] ) {
	add_filter( 'wp_lazy_loading_enabled', '__return_false' );
}

/**
 * Call when the plugin is activated
 */
register_activation_hook(__FILE__, 'a3_lazy_load_activated');
