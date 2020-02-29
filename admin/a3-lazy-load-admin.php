<?php

function a3_lazy_load_activated(){
	update_option('a3_lazy_load_version', A3_LAZY_VERSION );

	delete_metadata( 'user', 0, $GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_init']->plugin_name . '-' . 'plugin_framework_global_box' . '-' . 'opened', '', true );

	update_option('a3_lazy_load_just_installed', true);
}

/**
 * Load languages file
 */
function a3_lazy_load_init() {

	if ( get_option( 'a3_lazy_load_just_installed' ) ) {
		delete_option( 'a3_lazy_load_just_installed' );

		// Set Settings Default from Admin Init
		$GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_init']->set_default_settings();
	}

	a3_lazy_load_plugin_textdomain();

	a3_lazy_load_upgrade_plugin();
}

$GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_init']->init();

// Add upgrade notice to Dashboard pages
add_filter( $GLOBALS[A3_LAZY_LOAD_PREFIX.'admin_init']->plugin_name . '_plugin_extension_boxes', array( '\A3Rev\LazyLoad\Hook_Filter', 'plugin_extension_box' ) );

// Add language
add_action('init', 'a3_lazy_load_init', 105);

// Add custom style to dashboard
add_action( 'admin_enqueue_scripts', array( '\A3Rev\LazyLoad\Hook_Filter', 'a3_wp_admin' ) );

// Add extra link on left of Deactivate link on Plugin manager page
add_action( 'plugin_action_links_'.A3_LAZY_LOAD_NAME, array( '\A3Rev\LazyLoad\Hook_Filter', 'settings_plugin_links' ) );

// Add text on right of Visit the plugin on Plugin manager page
add_filter( 'plugin_row_meta', array( '\A3Rev\LazyLoad\Hook_Filter', 'plugin_extra_links'), 10, 2 );

// Add admin sidebar menu css
add_action( 'admin_enqueue_scripts', array( '\A3Rev\LazyLoad\Hook_Filter', 'admin_sidebar_menu_css' ) );

// Init lazy load Instance
add_action( 'wp', 'a3_lazy_load_instance', 10, 0 );
function a3_lazy_load_instance() {
	$allow_instance = true;

	if ( is_feed() ) {
		$allow_instance = false;
	}

	if ( function_exists( 'is_amp_endpoint' ) && is_amp_endpoint() ) {
		$allow_instance = false;
	}

	// Compatibility with Better AMP plugin
	if ( function_exists( 'is_better_amp' ) && is_better_amp() ) {
		$allow_instance = false;
	}

	if ( $allow_instance ) {
		\A3Rev\LazyLoad::_instance();
	}
}

// Check upgrade functions
function a3_lazy_load_upgrade_plugin() {

    if (version_compare(get_option('a3_lazy_load_version'), '1.1.0') === -1) {
    	update_option('a3_lazy_load_version', '1.1.0');
    	include( A3_LAZY_LOAD_DIR. '/includes/updates/a3-lazy-load-update-1.1.0.php' );
    }

    // Upgrade to 1.7.0
	if ( version_compare(get_option('a3_lazy_load_version'), '1.7.0') === -1 ) {
		update_option('a3_lazy_load_version', '1.7.0');
		update_option('a3_lazy_load_style_version', time() );
	}

    update_option('a3_lazy_load_version', A3_LAZY_VERSION );
}
