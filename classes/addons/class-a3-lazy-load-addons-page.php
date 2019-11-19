<?php

namespace A3Rev\LazyLoad;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Addons
{
	public function __construct() {

		if ( is_admin() ) {
			add_action( 'admin_menu', array( $this, 'admin_menu' ), 11 );

			// Add style for Portfolio Add-ons page
			if ( isset( $_GET['page'] ) && 'a3-lazy-load-addons' == $_GET['page'] ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'load_addons_page_scripts' ) );
			}
		}
	}

	public function admin_menu() {
		$parent_page = 'a3-lazy-load';
	    if ( current_user_can( 'manage_options' ) )
	    	add_submenu_page( $parent_page, __( 'a3 Lazy Load Add-ons/Extensions', 'a3-lazy-load' ), '<span style="color:#2ea2cc">' . __( 'Add-ons', 'a3-lazy-load' ) .'</span>', 'manage_options', 'a3-lazy-load-addons', array( $this, 'output' ) );
	}

	public function load_addons_page_scripts() {
		wp_enqueue_style( 'a3-lazy-load-addons-style', A3_LAZY_LOAD_CSS_URL . '/a3.lazyload.addons.admin.css' );

		if ( is_rtl() ) {
			wp_enqueue_style( 'a3-lazy-load-addons-style-rtl', A3_LAZY_LOAD_CSS_URL . '/a3.lazyload.addons.admin.rtl.css' );
		}
	}

	public function output() {
	?>
<div class="wrap a3-lazyload-addons-container">

	<h2 id="a3-lazyload-addons-title"><?php echo __( 'a3 Lazy Load Add-ons/Extensions', 'a3-lazy-load' ); ?></h2>

	<?php
		/**
		 * Example about addon data
		 *
		 * $addons_tabs = array(
		 * 	'extensions' => array(
		 *		'name'				=> __( 'Add-ons', 'a3-lazy-load' ),
		 * 		'view'				=> 'extensions',
		 * 		'callback_action'	=> 'a3_lazyload_extensions_wrap',
		 * 	)
		 * );
		*/
		$addons_tabs = apply_filters( 'a3_lazyload_addons_tabs', array() );
	?>

	<?php if ( is_array( $addons_tabs ) && count( $addons_tabs ) > 0 ) : ?>

	<h2 class="a3-lazyload-addons-nav-tab-wrapper nav-tab-wrapper" id="a3-lazyload-addons-tabs">
		<a class="nav-tab" id="extensions-tab" href="admin.php?page=a3-lazy-load-addons"><?php echo __( 'Add-ons', 'a3-lazy-load' ); ?></a>
		<?php foreach ( $addons_tabs as $key => $tab ) : ?>

		<a class="nav-tab" id="<?php echo esc_attr( $key ); ?>-tab" href="admin.php?page=a3-lazy-load-addons&view=<?php echo $tab['view']; ?>"><?php echo $tab['name']; ?></a>

		<?php endforeach; ?>
	</h2>

	<?php endif; ?>

	<div class="a3-lazyload-addons-tabwrapper tabwrapper">

	<?php if ( isset( $_GET['view'] ) && $_GET['view'] != 'extensions' ) : ?>

		<?php if ( is_array( $addons_tabs ) && count( $addons_tabs ) > 0 ) : ?>

			<?php foreach ( $addons_tabs as $key => $tab ) : ?>

				<?php if ( $tab['view'] == $_GET['view'] ) : ?>

				<div id="<?php echo esc_attr( $key ); ?>" class="a3-lazyload-addons-tab-wrap">

					<?php do_action( $tab['callback_action'] ); ?>

				</div>

				<?php endif; ?>

			<?php endforeach; ?>

		<?php endif; ?>

	<?php else : ?>

		<div id="extensions" class="a3-lazyload-addons-tab-wrap">

			<?php $this->extensions_output(); ?>

		</div>

	<?php endif; ?>

	</div>

</div>
	<?php
	}

	public function extensions_output() {
		$addons = get_transient( 'a3_lazyload_addons_data' );

		if ( !$addons ) {
			$addons_json = wp_remote_get( 'http://d2bdzxhogubfxe.cloudfront.net/lazyload-addons.json', array( 'user-agent' => 'a3 LazyLoad Addons Page' ) );
			if ( ! is_wp_error( $addons_json ) ) {
				$addons = json_decode( wp_remote_retrieve_body( $addons_json ), true );
				if ( $addons ) {
					set_transient( 'a3_lazyload_addons_data', $addons, 60*60*24 ); // 1 day
				}
			} else {
				$addons_json = wp_remote_get( 'https://s3.amazonaws.com/a3lazyload/lazyload-addons.json', array( 'user-agent' => 'a3 LazyLoad Addons Page' ) );
				if ( ! is_wp_error( $addons_json ) ) {
					$addons = json_decode( wp_remote_retrieve_body( $addons_json ), true );
					if ( $addons ) {
						set_transient( 'a3_lazyload_addons_data', $addons, 60*60*24 ); // 1 day
					}
				}
			}
		}

		/**
		 * Example about addon data
		 *
		 * $addon = array(
		 *		'url'             => 'http://a3rev.com/shop/a3-lazyloads-extra/',
		 * 		'title'           => __( 'Lazyload Extra', 'a3-lazy-load' ),
		 * 		'header_bg'		  => '#9378d9',
		 * 		'title_color'	  => '#fff',
		 * 		'title_bg'		  => '#000',
		 * 		'image'           => 'https://s3.amazonaws.com/a3_plugins/a3LazyLoadAddon/a3-Lazy-Load-Extra-Addon/plugin.png',
		 * 		'desc'            => __( 'Support for lazy load video, audio, iframe.', 'a3-lazy-load' ),
		 * 		'php_class_check' => 'A3_Lazy_Load_Extra_Addon',
		 * 		'folder_name'     => 'a3-lazyload-extra-addon',
		 * 		'is_free'         => false
		 * );
		*/

		$third_party_addons = apply_filters( 'a3_lazyload_third_party_addons', array() );

		$all_addons = array_merge( $addons, $third_party_addons );
		$all_addons = array_merge( $all_addons, $addons );

		if ( is_array( $all_addons ) && count( $all_addons ) > 0 ) :

			foreach ( $all_addons as $id => $addon ) :
				$had_plugin = false;
				$is_installed = false;
				$addon = (object) $addon;
				if ( class_exists( $addon->php_class_check ) ) {
					$is_installed = true;
				} else {
					$activate_plugin_able = get_plugins('/' . $addon->folder_name );

					if ( ! empty( $activate_plugin_able ) && count( $activate_plugin_able ) == 1 ) {
						$had_plugin = true;
						$key = array_keys( $activate_plugin_able );
						$key = array_shift( $key ); //Use the first plugin regardless of the name, Could have issues for multiple-plugins in one directory if they share different version numbers
						$plugin_slug = $addon->folder_name.'/'.$key;
						$activate_url = add_query_arg( array(
									'action' 		=> 'activate',
									'plugin'		=> $plugin_slug,
						), self_admin_url( 'plugins.php' ) );
					}
				}
				$header_style = '';
				if ( ! empty( $addon->image ) ) :
					$header_style .= 'background-image: url( ' . esc_url( $addon->image ) . ');';
				endif;
				if ( ! empty( $addon->header_bg ) ) :
					$header_style .= 'background-color: ' . $addon->header_bg . ';';
				endif;

				$title_style = '';
				if ( ! empty( $addon->title_color ) ) :
					$title_style .= 'color: ' . $addon->title_color . ';';
				endif;
				if ( ! empty( $addon->title_bg ) ) :
					$title_style .= 'background-color: ' . $addon->title_bg . ';';
				endif;

			?>

				<div class="extension-card <?php echo esc_attr( $id ); ?>">
					<a class="extension-card-header" target="_blank" href="<?php echo esc_url( $addon->url ); ?>">
						<h3 style="<?php echo $header_style; ?>"><span class="extension-title" style="<?php echo $title_style; ?>"><?php echo esc_html( $addon->title ); ?></span></h3>
					</a>

					<p><?php echo esc_html( $addon->desc ); ?></p>

					<p>
						<?php if ( $is_installed ) { ?>
							<button class="button-primary installed"><?php echo __( 'Installed', 'a3-lazy-load' ); ?></button>
						<?php } elseif ( $had_plugin ) { ?>
							<a href="<?php echo esc_url( wp_nonce_url( $activate_url, 'activate-plugin_' . $plugin_slug ) ); ?>" class="button-primary"><?php echo __( 'Activate', 'a3-lazy-load' ); ?></a>
						<?php } else { ?>
							<a target="_blank" href="<?php echo esc_url( $addon->url ); ?>" class="button-primary">
								<?php echo __( 'Get this extension', 'a3-lazy-load' ); ?>
							</a>
						<?php } ?>
					</p>

					<?php if ( $addon->is_free ) { ?>
					<span class="free-extension"><?php echo __( 'Free', 'a3-lazy-load' ); ?></span>
					<?php } ?>
				</div>

			<?php endforeach; ?>

		<?php else : ?>

			<div class="no-extension"><?php echo __( 'Comming Soon', 'a3-lazy-load' ); ?></div>

		<?php endif; ?>

		<?php
	}
}
