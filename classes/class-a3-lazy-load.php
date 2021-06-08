<?php

namespace A3Rev;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class LazyLoad
{
	const version = A3_LAZY_VERSION;
	protected $iframe_placeholder_url;
	protected $_placeholder_url;
	protected $_skip_images_classes;
	protected $_skip_videos_classes;
	protected static $_instance;

	function __construct() {
		global $a3_lazy_load_global_settings;

		// Disable for Dashboard
		if ( is_admin() ) {
			return;
		}

		// Disable when not allow from global settings
		if ( $a3_lazy_load_global_settings['a3l_apply_lazyloadxt'] == false ) {
			return;
		}

		if ( $a3_lazy_load_global_settings['a3l_apply_to_images'] == false && $a3_lazy_load_global_settings['a3l_apply_to_videos'] == false ) {
			return;
		}

		// Disable when viewing printable page from WP-Print
		if ( intval( get_query_var( 'print' ) ) == 1 || intval( get_query_var( 'printpage' ) ) == 1 ) {
			return;
		}

		// Disable on Opera Mini
		if ( isset( $_SERVER['HTTP_USER_AGENT'] ) && strpos( $_SERVER['HTTP_USER_AGENT'], 'Opera Mini' ) !== false ) {
			return;
		}

		if ( true == $a3_lazy_load_global_settings['a3l_load_disable_on_wptouch'] && self::is_wptouch() ) {
			return;
		}

		if ( true == $a3_lazy_load_global_settings['a3l_load_disable_on_mobilepress'] && self::is_mobilepress() ) {
			return;
		}

		// Check for current page is excluded
		global $a3_lazy_load_excludes;
		$is_excluded = $a3_lazy_load_excludes->check_excluded();
		if ( $is_excluded ) {
			return;
		}

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ), 11 );

		add_filter( 'a3_lazy_load_html', array( $this, 'filter_html' ), 10, 2 );

		$this->iframe_placeholder_url = apply_filters('a3_lazy_load_iframe_placeholder_url', 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7');
		$this->_placeholder_url = apply_filters( 'a3_lazy_load_placeholder_url', A3_LAZY_LOAD_IMAGES_URL . '/lazy_placeholder.gif' );

		// Apply for Images
		$skip_images_classes = apply_filters( 'a3_lazy_load_skip_images_classes', $a3_lazy_load_global_settings['a3l_skip_image_with_class'] );
		if ( '' != trim( $skip_images_classes ) ) {
			$this->_skip_images_classes = array_map( 'trim', explode( ',', $skip_images_classes ) );
		}
		if ( is_array( $this->_skip_images_classes ) ) {
			$this->_skip_images_classes = array_merge( array( 'skip-lazy', 'a3-notlazy' ), $this->_skip_images_classes );
		} else {
			$this->_skip_images_classes = array( 'skip-lazy', 'a3-notlazy' );
		}

		// Fix the confliction with Rev Slider
		$this->_skip_images_classes = array_merge( array( 'rev-slidebg' ), $this->_skip_images_classes );

		if ( $a3_lazy_load_global_settings['a3l_apply_to_images'] == true ) {
			add_filter( 'a3_lazy_load_images', array( $this, 'filter_images' ), 10, 2 );

			//add_filter( 'wp_get_attachment_image_attributes', array( $this, 'get_attachment_image_attributes' ), 200 );

			if ( $a3_lazy_load_global_settings['a3l_apply_image_to_content'] == true ) {
				add_filter( 'the_content', array( $this, 'filter_content_images' ), 100 );

				// Compatibility with ACF plugin - Thank you ondoheer https://github.com/ondoheer
				add_filter( 'acf_the_content', array( $this, 'filter_content_images' ), 100 );

			}
			if ( $a3_lazy_load_global_settings['a3l_apply_image_to_textwidget'] == true ) {
				add_action( 'dynamic_sidebar_before', array( $this, 'sidebar_before_filter_images' ), 0 );
				add_action( 'dynamic_sidebar_after', array( $this, 'sidebar_after_filter_images' ), 1000 );
			}
			if ( $a3_lazy_load_global_settings['a3l_apply_image_to_postthumbnails'] == true ) {
				add_filter( 'post_thumbnail_html', array( $this, 'filter_images' ), 200 );
			}
			if ( $a3_lazy_load_global_settings['a3l_apply_image_to_gravatars'] == true ) {
				add_filter( 'get_avatar', array( $this, 'filter_images' ), 200 );
			}
			add_filter( 'woocommerce_product_get_image', array( $this, 'filter_images' ), 200 );
		}

		// Apply for Videos
		$skip_videos_classes = apply_filters( 'a3_lazy_load_skip_videos_classes', $a3_lazy_load_global_settings['a3l_skip_video_with_class'] );
		if ( strlen( trim( $skip_videos_classes ) ) ) {
			$this->_skip_videos_classes = array_map( 'trim', explode( ',', $skip_videos_classes ) );
		}
		if ( is_array( $this->_skip_videos_classes ) ) {
			$this->_skip_videos_classes = array_merge( array( 'skip-lazy', 'a3-notlazy', 'wp-video-shortcode' ), $this->_skip_videos_classes );
		} else {
			$this->_skip_videos_classes = array( 'skip-lazy', 'a3-notlazy', 'wp-video-shortcode' );
		}

		// Fix the confliction with Rev Slider
		$this->_skip_videos_classes = array_merge( array( 'rev-slidebg' ), $this->_skip_videos_classes );

		if ( $a3_lazy_load_global_settings['a3l_apply_to_videos'] == true ) {
			add_filter( 'a3_lazy_load_videos', array( $this, 'filter_videos' ), 10, 2 );

			if ( $a3_lazy_load_global_settings['a3l_apply_video_to_content'] == true ) {
				add_filter( 'the_content', array( $this, 'filter_videos' ), 100 );

				// Compatibility with ACF plugin - Thank you ondoheer https://github.com/ondoheer
				add_filter( 'acf_the_content', array( $this, 'filter_videos' ), 100 );
			}
			if ( $a3_lazy_load_global_settings['a3l_apply_video_to_textwidget'] == true ) {
				add_action( 'dynamic_sidebar_before', array( $this, 'sidebar_before_filter_videos' ), 0 );
				add_action( 'dynamic_sidebar_after', array( $this, 'sidebar_after_filter_videos' ), 1000 );
			}
		}

		// Add lazy attributes to all allowed post tags list
		add_filter( 'wp_kses_allowed_html', array( $this, 'add_lazy_attributes' ), 10, 2 );
	}

	static function _instance() {
		if ( ! isset( self::$_instance ) ) {
			$className = __CLASS__;
			self::$_instance = new $className;
		}
		return self::$_instance;
	}

	static function enqueue_scripts() {

		$suffix = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';

		global $a3_lazy_load_global_settings;

		$a3l_effect = $a3_lazy_load_global_settings['a3l_effect'];
		$effect = 'fadein';
		if ( $a3l_effect != '' ) {
			$effect = $a3l_effect;
		}
		$effect = apply_filters( 'a3_lazy_load_effect' , $effect );

		do_action('before_a3_lazy_load_xt_style');

		wp_register_style( 'jquery-lazyloadxt-fadein-css', apply_filters( 'a3_lazy_load_effect_css', A3_LAZY_LOAD_CSS_URL.'/jquery.lazyloadxt.fadein.css' ), self::version );
		wp_register_style( 'jquery-lazyloadxt-spinner-css', apply_filters( 'a3_lazy_load_effect_css', A3_LAZY_LOAD_CSS_URL.'/jquery.lazyloadxt.spinner.css' ), self::version );

		wp_enqueue_style( 'jquery-lazyloadxt-'.$effect.'-css' );

		do_action('after_a3_lazy_load_xt_style');

		$in_footer = true;
		$theme_loader_function = $a3_lazy_load_global_settings['a3l_theme_loader'];

		if ( $theme_loader_function == 'wp_head' ) {
			$in_footer = false;
		}

		do_action('before_a3_lazy_load_xt_script');

		wp_deregister_script( 'jquery-lazyloadxt' );
		wp_register_script( 'jquery-lazyloadxt', apply_filters( 'a3_lazy_load_main_script', A3_LAZY_LOAD_JS_URL.'/jquery.lazyloadxt.extra'.$suffix.'.js' ), array( 'jquery' ), self::version, $in_footer );
		wp_register_script( 'jquery-lazyloadxt-srcset', apply_filters( 'a3_lazy_load_main_script', A3_LAZY_LOAD_JS_URL.'/jquery.lazyloadxt.srcset'.$suffix.'.js' ), array( 'jquery', 'jquery-lazyloadxt' ), self::version, $in_footer );
		wp_register_script( 'jquery-lazyloadxt-extend', apply_filters( 'a3_lazy_load_extend_script', A3_LAZY_LOAD_JS_URL.'/jquery.lazyloadxt.extend.js' ), array( 'jquery', 'jquery-lazyloadxt', 'jquery-lazyloadxt-srcset' ), self::version, $in_footer );

		wp_enqueue_script( 'jquery-lazyloadxt-extend' );

		// Disable Jetpack's devicepx (has a conflict with a3 Lazy Load [retains the placeholder as the higher-dpi image asset via srcset])
		if ( isset( $a3_lazy_load_global_settings['a3l_jetpack_site_accelerator_compatibility'] ) && $a3_lazy_load_global_settings['a3l_jetpack_site_accelerator_compatibility'] ) {
			wp_dequeue_script( 'devicepx' );
		}

		$A3_Lazy_Load = self::_instance();

		$A3_Lazy_Load->localize_printed_scripts();

		do_action('after_a3_lazy_load_xt_script');
	}

	static function localize_printed_scripts() {
		global $a3_lazy_load_global_settings;

		if ( wp_script_is( 'jquery-lazyloadxt' ) ) {
			wp_localize_script( 'jquery-lazyloadxt', 'a3_lazyload_params', apply_filters( 'a3_lazyload_params', array(
				'apply_images' 	=> $a3_lazy_load_global_settings['a3l_apply_to_images'],
				'apply_videos'	=> $a3_lazy_load_global_settings['a3l_apply_to_videos']
			) ) );
		}

		if ( wp_script_is( 'jquery-lazyloadxt-extend' ) ) {
			$horizontal_container_classnames = '';
			if ( ! empty( $a3_lazy_load_global_settings['a3l_horizontal_trigger_classnames'] ) ) {
				$horizontal_trigger_classnames = explode(',', $a3_lazy_load_global_settings['a3l_horizontal_trigger_classnames'] );
				$horizontal_trigger_classnames = array_map( 'trim', $horizontal_trigger_classnames );
				$horizontal_trigger_classnames = array_filter( $horizontal_trigger_classnames );
				$horizontal_container_classnames = implode(',', $horizontal_trigger_classnames );
			}

			wp_localize_script( 'jquery-lazyloadxt-extend', 'a3_lazyload_extend_params', apply_filters( 'a3_lazyload_extend_params', array(
				'edgeY'                           => (int) $a3_lazy_load_global_settings['a3l_edgeY'],
				'horizontal_container_classnames' => $horizontal_container_classnames
			) ) );
		}
	}

	static function is_wptouch() {
		if ( function_exists( 'bnc_wptouch_is_mobile' ) && bnc_wptouch_is_mobile() ) {
			return true;
		}

		global $wptouch_pro;

		if ( defined( 'WPTOUCH_VERSION' ) || is_object( $wptouch_pro ) ) {

			if ( $wptouch_pro->showing_mobile_theme ) {
				return true;
			}
		}

		return false;
	}

	static function has_wptouch() {
		if ( function_exists( 'bnc_wptouch_is_mobile' ) || defined( 'WPTOUCH_VERSION' ) ) {
			return true;
		}
		return false;
	}

	static function is_mobilepress() {

		if ( function_exists( 'mopr_get_option' ) && WP_CONTENT_DIR . mopr_get_option( 'mobile_theme_root', 1 ) == get_theme_root() ) {
			return true;
		}

		return false;
	}

	static function has_mobilepress() {
		if ( class_exists( 'Mobilepress_core' ) ) {
			return true;
		}

		return false;
	}

	static public function preg_quote_with_wildcards( $what ){
		// Perform preg_quote, but still allow `.*` to be used in the class list as a wildcard.
		return str_replace( array( '\*', '\.' ), '', preg_quote( $what, '/' ) );
	}

	static function add_lazy_attributes( $allowedposttags, $context ) {

		if ( 'post' === $context && ! empty( $allowedposttags ) ) {

			$lazy_attributes = array(
				'data-lazy-type' => true,
				'data-src'       => true,
				'data-srcset'    => true,
				'data-poster'    => true,
			);

			foreach ( $allowedposttags as $tag => $attributes ) {
				if ( true === $attributes ) {
					$attributes = array();
				}

				if ( is_array( $attributes ) ) {
					// Add lazy attributes to post tag
					$allowedposttags[$tag] = array_merge( $attributes, $lazy_attributes );
				}
			}

			// Add noscript tag to allowed post tags list
			if ( ! isset( $allowedposttags['noscript'] ) ) {
				$allowedposttags['noscript'] = array();
			}

		}

		return $allowedposttags;
	}

	static function filter_html( $content, $include_noscript = null ) {
		if ( is_admin() ) {
			return $content;
		}

		$run_filter = true;
		$run_filter = apply_filters( 'a3_lazy_load_run_filter', $run_filter );

		if ( ! $run_filter ) {
			return $content;
		}

		global $a3_lazy_load_global_settings;

		$A3_Lazy_Load = self::_instance();

		$content = apply_filters( 'a3_lazy_load_html_before', $content );

		if ( $a3_lazy_load_global_settings['a3l_apply_to_images'] == true ) {
			$content = $A3_Lazy_Load->filter_images( $content, $include_noscript );
		}
		if ( $a3_lazy_load_global_settings['a3l_apply_to_videos'] == true ) {
			$content = $A3_Lazy_Load->filter_videos( $content, $include_noscript );
		}

		$content = apply_filters( 'a3_lazy_load_html_after', $content );

		return $content;
	}

	static function filter_images( $content, $include_noscript = null ) {
		if ( is_admin() ) {
			return $content;
		}

		$run_filter = true;
		$run_filter = apply_filters( 'a3_lazy_load_run_filter', $run_filter );

		if ( ! $run_filter ) {
			return $content;
		}

		global $a3_lazy_load_global_settings;

		$A3_Lazy_Load = self::_instance();

		$content = apply_filters( 'a3_lazy_load_images_before', $content );

		$content = $A3_Lazy_Load->_filter_images( $content, $include_noscript );

		$content = apply_filters( 'a3_lazy_load_images_after', $content );

		return $content;
	}

	static function sidebar_before_filter_images() {
		ob_start();
	}

	static function sidebar_after_filter_images() {
		$content = ob_get_clean();

		$A3_Lazy_Load = self::_instance();

		echo $A3_Lazy_Load->filter_images( $content );

		unset( $content );
	}

	static function filter_content_images( $content ) {
		$A3_Lazy_Load = self::_instance();

		return $A3_Lazy_Load->filter_images( $content );
	}

	static function get_attachment_image_attributes( $attr ) {
		$A3_Lazy_Load = self::_instance();

		if ( is_array( $A3_Lazy_Load->_skip_images_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $A3_Lazy_Load, 'preg_quote_with_wildcards' ), $A3_Lazy_Load->_skip_images_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		if ( ! ( is_array( $A3_Lazy_Load->_skip_images_classes ) && preg_match( $skip_images_regex, 'class="'.$attr['class'].'"' ) ) && ! preg_match( "/src=.*lazy_placeholder.gif['\"]/s", 'src="'.$attr['src'].'"' ) ) {

			$attr['data-src'] = $attr['src'];
			$attr['src'] = $A3_Lazy_Load->_placeholder_url;
			$attr['class'] = 'lazy-hidden '. $attr['class'];
			$attr['data-lazy-type'] = 'image';
			if ( isset( $attr['srcset'] ) ) {
				$attr['data-srcset'] = $attr['srcset'];
				$attr['srcset'] = '';
				unset( $attr['srcset'] );
			}
		}

		return $attr;
	}

	protected function _filter_images( $content, $include_noscript = null ) {
		global $a3_lazy_load_excludes;

		if ( null === $include_noscript ) {
			global $a3_lazy_load_global_settings;

			$include_noscript = $a3_lazy_load_global_settings['a3l_image_include_noscript'];
		}

		// Normal image
		$matches = array();
		preg_match_all( '/<img[\s\r\n]+.*?>/is', $content, $matches );

		$search = array();
		$replace = array();

		if ( is_array( $this->_skip_images_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $this, 'preg_quote_with_wildcards' ), $this->_skip_images_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		$i = 0;
		foreach ( $matches[0] as $imgHTML ) {

			// don't to the replacement if a skip class is provided and the image has the class, or if the image is a data-uri
			if ( ! ( is_array( $this->_skip_images_classes ) && preg_match( $skip_images_regex, $imgHTML ) ) && ! preg_match( "/src=['\"]data:image/is", $imgHTML ) && ! preg_match( "/src=.*lazy_placeholder.gif['\"]/s", $imgHTML ) && ! $a3_lazy_load_excludes->has_skip_lazy_attribute( $imgHTML ) ) {
				$i++;
				// replace the src and add the data-src attribute
				$replaceHTML = $imgHTML;

				if ( ! preg_match( "/ data-src=['\"]/is", $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/<img(.*?)src=/is', '<img$1src="' . $this->_placeholder_url . '" data-lazy-type="image" data-src=', $replaceHTML );
				} elseif ( preg_match( "/ src=['\"]/is", $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/ src=(["\'])(.*?)["\']/is', ' src="' . $this->_placeholder_url . '"', $replaceHTML );
				}

				$replaceHTML = preg_replace( '/<img(.*?)srcset=/is', '<img$1srcset="" data-srcset=', $replaceHTML );

				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1lazy lazy-hidden $2$1', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<img/is', '<img class="lazy lazy-hidden"', $replaceHTML );
				}

				if ( $include_noscript ) {
					$replaceHTML .= '<noscript>' . $imgHTML . '</noscript>';
				}

				array_push( $search, $imgHTML );
				array_push( $replace, $replaceHTML );
			}
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );

		// Picture source, support for webp
		$matches = array();
		preg_match_all( '/<source[\s\r\n]+.*?>/is', $content, $matches );

		$search = array();
		$replace = array();

		if ( is_array( $this->_skip_images_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $this, 'preg_quote_with_wildcards' ), $this->_skip_images_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		$i = 0;
		foreach ( $matches[0] as $imgHTML ) {

			// don't to the replacement if a skip class is provided and the image has the class, or if the image is a data-uri
			if ( ! ( is_array( $this->_skip_images_classes ) && preg_match( $skip_images_regex, $imgHTML ) ) && ! preg_match( "/ data-srcset=['\"]/is", $imgHTML ) && ! $a3_lazy_load_excludes->has_skip_lazy_attribute( $imgHTML ) ) {
				$i++;
				// replace the srcset and add the data-srcset attribute
				$replaceHTML = '';
				$replaceHTML = preg_replace( '/<source(.*?)srcset=/is', '<source$1srcset="" data-srcset=', $imgHTML );

				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1lazy lazy-hidden $2$1', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<source/is', '<source class="lazy lazy-hidden"', $replaceHTML );
				}

				array_push( $search, $imgHTML );
				array_push( $replace, $replaceHTML );
			}
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );


		return $content;
	}

	function get_color( $type = 'background' ) {
		$return = '';
		if ( 'off' != $value ) {

		}

		return $return;
	}
 
	static function filter_videos( $content, $include_noscript = null ) {
		if ( is_admin() ) {
			return $content;
		}

		$run_filter = true;
		$run_filter = apply_filters( 'a3_lazy_load_run_filter', $run_filter );

		if ( ! $run_filter ) {
			return $content;
		}

		global $a3_lazy_load_global_settings;

		$A3_Lazy_Load = self::_instance();

		$content = apply_filters( 'a3_lazy_load_videos_before', $content );

		$content = $A3_Lazy_Load->_filter_videos( $content, $include_noscript );

		$content = apply_filters( 'a3_lazy_load_videos_after', $content );

		return $content;
	}

	static function sidebar_before_filter_videos() {
		ob_start();
	}

	static function sidebar_after_filter_videos() {
		$content = ob_get_clean();

		$A3_Lazy_Load = self::_instance();

		echo $A3_Lazy_Load->filter_videos( $content );

		unset( $content );
	}

	protected function _filter_videos( $content, $include_noscript = null ) {
		global $a3_lazy_load_excludes;

		if ( null === $include_noscript ) {
			global $a3_lazy_load_global_settings;

			$include_noscript = $a3_lazy_load_global_settings['a3l_video_include_noscript'];
		}

		//iFrame
		$matches = array();
		preg_match_all( '#<iframe(.*?)></iframe>#is', $content, $matches );

		$search = array();
		$replace = array();

		if ( is_array( $this->_skip_videos_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $this, 'preg_quote_with_wildcards' ), $this->_skip_videos_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		$i = 0;
		foreach ( $matches[0] as $imgHTML ) {
			if ( strpos( $imgHTML, 'gform_ajax_frame' ) ) {
				continue;
			}

			// don't to the replacement if a skip class is provided and the image has the class, or if the image is a data-uri
			if ( ! ( is_array( $this->_skip_videos_classes ) && preg_match( $skip_images_regex, $imgHTML ) ) && ! preg_match( "/ data-src=['\"]/is", $imgHTML ) && ! $a3_lazy_load_excludes->has_skip_lazy_attribute( $imgHTML ) ) {
				$i++;
				// replace the src and add the data-src attribute
				$replaceHTML = '';
				$replaceHTML = preg_replace( '/iframe(.*?)src=/is', 'iframe$1 data-lazy-type="iframe" data-src=', $imgHTML );

				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1lazy lazy-hidden $2$1', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<iframe/is', '<iframe class="lazy lazy-hidden"', $replaceHTML );
				}

				if ( $include_noscript ) {
					$replaceHTML .= '<noscript>' . $imgHTML . '</noscript>';
				}

				array_push( $search, $imgHTML );
				array_push( $replace, $replaceHTML );
			}
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );

		//Video
		$matches = array();
		preg_match_all( '/<video(.+?)video>/', $content, $matches );

		$search = array();
		$replace = array();

		if ( is_array( $this->_skip_videos_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $this, 'preg_quote_with_wildcards' ), $this->_skip_videos_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		$i = 0;
		foreach ( $matches[0] as $imgHTML ) {

			// don't to the replacement if a skip class is provided and the image has the class, or if the image is a data-uri
			if ( ! ( is_array( $this->_skip_videos_classes ) && preg_match( $skip_images_regex, $imgHTML ) ) && ! preg_match( "/ data-src=['\"]/is", $imgHTML ) && ! $a3_lazy_load_excludes->has_skip_lazy_attribute( $imgHTML ) ) {
				$i++;
				// replace the src and add the data-src attribute


				$replaceHTML = '';
				$replaceHTML = preg_replace( '/video(.*?)src=/is', 'video$1 data-lazy-type="video" data-src=', $imgHTML );

				if ( ! preg_match( "/ data-poster=['\"]/is", $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/video(.*?)poster=/is', 'video$1poster="' . $this->_placeholder_url . '" data-lazy-type="video" data-poster=', $replaceHTML );
				} elseif ( preg_match( "/ poster=['\"]/is", $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/ poster=(["\'])(.*?)["\']/is', ' poster="' . $this->_placeholder_url . '"', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<video/is', '<video poster="' . $this->_placeholder_url . '"', $replaceHTML );
				}

				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1lazy lazy-hidden $2$1', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<video/is', '<video class="lazy lazy-hidden"', $replaceHTML );
				}

				if ( $include_noscript ) {
					$replaceHTML .= '<noscript>' . $imgHTML . '</noscript>';
				}

				array_push( $search, $imgHTML );
				array_push( $replace, $replaceHTML );
			}
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );

		//return $content;

		//Embed
		$matches = array();
		preg_match_all( '/<embed\s+.*?>/', $content, $matches );

		$search = array();
		$replace = array();

		if ( is_array( $this->_skip_videos_classes ) ) {
			$skip_images_preg_quoted = array_map( array( $this, 'preg_quote_with_wildcards' ), $this->_skip_videos_classes );
			$skip_images_regex = sprintf( '/class=["\'].*(%s).*["\']/s', implode( '|', $skip_images_preg_quoted ) );
		}

		$i = 0;
		foreach ( $matches[0] as $imgHTML ) {

			// don't to the replacement if a skip class is provided and the image has the class, or if the image is a data-uri
			if ( ! ( is_array( $this->_skip_videos_classes ) && preg_match( $skip_images_regex, $imgHTML ) ) && ! preg_match( "/ data-src=['\"]/is", $imgHTML ) && ! $a3_lazy_load_excludes->has_skip_lazy_attribute( $imgHTML ) ) {
				$i++;
				// replace the src and add the data-src attribute
				$replaceHTML = '';
				//$replaceHTML = str_replace("src", 'data-src', $imgHTML);
				$replaceHTML = preg_replace( '/embed(.*?)src=/is', 'embed$1 data-lazy-type="video" data-src=', $imgHTML );
				// add the lazy class to the img element
				if ( preg_match( '/class=["\']/i', $replaceHTML ) ) {
					$replaceHTML = preg_replace( '/class=(["\'])(.*?)["\']/is', 'class=$1lazy lazy-hidden $2$1', $replaceHTML );
				} else {
					$replaceHTML = preg_replace( '/<embed/is', '<embed class="lazy lazy-hidden"', $replaceHTML );
				}

				if ( $include_noscript ) {
					$replaceHTML .= '<noscript>' . $imgHTML . '</noscript>';
				}

				array_push( $search, $imgHTML );
				array_push( $replace, $replaceHTML );
			}
		}

		$search = array_unique( $search );
		$replace = array_unique( $replace );

		$content = str_replace( $search, $replace, $content );


		return $content;
	}
}
