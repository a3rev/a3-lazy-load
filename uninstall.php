<?php
/**
 * a3 Lazy Load Uninstall
 *
 * Uninstalling deletes options, tables, and pages.
 *
 */
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) )
	exit();

global $wpdb;

// Delete Google Font
delete_option('a3_lz_google_api_key');
delete_option('a3_lz_google_api_key' . '_enable');
delete_transient('a3_lz_google_api_key' . '_status');
delete_option('a3_lazy_load' . '_google_font_list');

if ( get_option('a3_lazy_load_clean_on_deletion') == 1 ) {
	delete_option('a3_lz_toggle_box_open');
	delete_option('a3_lazy_load' . '-custom-boxes');

	delete_metadata( 'user', 0, 'a3_lazy_load' . '-' . 'plugin_framework_global_box' . '-' . 'opened', '', true );

	delete_option( 'a3_lazy_load_global_settings' );

	delete_option( 'a3_lazy_load_clean_on_deletion' );
}