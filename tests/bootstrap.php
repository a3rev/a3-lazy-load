<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Sample_Plugin
 */

$_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_tests_dir ) {
	$_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?";
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _manually_load_plugin() {
	update_option('pvc_just_installed', false);

	require dirname( dirname( __FILE__ ) ) . '/a3-lazy-load.php';
	update_option('a3_pvc_version', A3_LAZY_VERSION);
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

function _manual_install_data() {

	$GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_init']->set_default_settings();

	echo esc_html( 'Installing My Plugin Data ...' . PHP_EOL );
}
tests_add_filter( 'setup_theme', '_manual_install_data' );

// Start up the WP testing environment.
require $_tests_dir . '/includes/bootstrap.php';
