<?php

namespace A3Rev\LazyLoad;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Excludes
{
	public function __construct() {

		add_action( 'wp', array( $this, 'init_global_a3lz_query_vars' ), 9 );
	}

	public function get_hard_objects_list() {

		$objects_list = array(
			'home'     => __( 'Home Page', 'a3-lazy-load' ),
			'front'    => __( 'Front Page', 'a3-lazy-load' ),
			'post'     => __( 'Posts', 'a3-lazy-load' ),
			'page'     => __( 'Pages', 'a3-lazy-load' ),
			'category' => __( 'Post Categories', 'a3-lazy-load' ),
			'tag'      => __( 'Post Tags', 'a3-lazy-load' ),
			'search'   => __( 'Search Page', 'a3-lazy-load' ),
			'author'   => __( 'Author Pages', 'a3-lazy-load' ),
			'archive'  => __( 'Archive Pages', 'a3-lazy-load' ),
		);

		return $objects_list;
	}

	public function get_post_types_list() {

		$objects_list = array();
		$post_types   = get_post_types( array( 'public' => true, '_builtin' => false ) , 'objects' );

		if ( $post_types ) {
			foreach ( $post_types as $post_type => $post_type_data ) {
				$objects_list[$post_type] = '"' . $post_type_data->labels->name . '" Post Type';
			}
		}

		return $objects_list;
	}

	public function init_global_a3lz_query_vars() {
		global $a3lz_query;

		if ( is_home() ) $a3lz_query[ 'is_home' ] = 1;

		if ( is_front_page() ) $a3lz_query[ 'is_front' ] = 1;

		if ( is_search() ) $a3lz_query[ 'is_search' ] = 1;

		if ( is_author() ) $a3lz_query[ 'is_author' ] = 1;

		if ( is_singular( 'post' ) ) $a3lz_query[ 'is_post' ] = 1;

		if ( is_page() ) $a3lz_query[ 'is_page' ] = 1;

		if ( is_category() ) $a3lz_query[ 'is_category' ] = 1;

		if ( is_tag() ) $a3lz_query[ 'is_tag' ] = 1;

		if ( is_archive() && ! is_category() && ! is_tag() && ! is_author() ) $a3lz_query[ 'is_archive' ] = 1;

		// Custom Post Types
		$post_types_list = $this->get_post_types_list();
		if ( ! empty( $post_types_list ) ) {
			foreach ( $post_types_list as $post_type => $post_type_name ) {
				if ( is_singular( $post_type ) ) {
					$a3lz_query[ 'is_' . $post_type ] = 1;
					break;
				}
			}
		}		
		
		// REST API
		if ( ( defined( 'REST_REQUEST' ) && REST_REQUEST ) || ( defined( 'JSON_REQUEST' )   && JSON_REQUEST ) || ( defined( 'WC_API_REQUEST' ) && WC_API_REQUEST )
		) $a3lz_query[ 'is_rest' ] = 1;

		if ( get_query_var( 'sitemap' ) || get_query_var( 'xsl' ) || get_query_var( 'xml_sitemap' ) ) {
			$a3lz_query[ 'is_sitemap' ] = 1;
		} elseif ( is_robots() ) {
			$a3lz_query[ 'is_robots' ] = 1;
		}

		// Reset everything if it's 404
		if ( is_404() ) $a3lz_query = array( 'is_404' => 1 );

		return $a3lz_query;
	}

	public function check_excluded() {

		// Check for URI is excluded
		$is_excluded = $this->is_uri_excluded( add_query_arg( 'a3lz' , false ) );
		if ( $is_excluded ) {
			return true;
		}

		// Check for Object is excluded
		$is_excluded = $this->is_object_excluded();
		if ( $is_excluded ) {
			return true;
		}

		return false;
	}

	public function is_uri_excluded( $uri ) {
		global $a3_lazy_load_global_settings;

		if ( empty( $a3_lazy_load_global_settings[ 'a3l_uris_exclude' ] ) ) {
			return false;
		}

		$uris_exclude = explode( "\n", $a3_lazy_load_global_settings[ 'a3l_uris_exclude' ] );
		if ( empty( $uris_exclude ) ) {
			return false;
		}

		$uris_exclude = array_map( 'trim', $uris_exclude );

		foreach ( $uris_exclude as $expr ) {
			if ( '' !== $expr && @preg_match( "~$expr~", $uri ) ) {
				return true;
			}
		}

		return false;
	}

	public function is_object_excluded() {
		global $a3_lazy_load_global_settings;

		if ( empty( $a3_lazy_load_global_settings[ 'a3l_objects_exclude' ] ) ) {
			return false;
		}

		$objects_exclude = $a3_lazy_load_global_settings[ 'a3l_objects_exclude' ];

		global $a3lz_query;
		if ( empty( $a3lz_query ) ) {
			$a3lz_query = $this->init_global_a3lz_query_vars();
		}

		$objects_list    = $this->get_hard_objects_list();
		$post_types_list = $this->get_post_types_list();
		$objects_list    = array_merge( $objects_list, $post_types_list );

		if ( ! empty( $objects_list ) ) {
			foreach ( $objects_list as $object_key => $object_name ) {
				if ( isset( $objects_exclude[ $object_key ] ) && 1 == $objects_exclude[ $object_key ] && isset( $a3lz_query[ 'is_' . $object_key ] ) ) return true;
			}
		}

		if ( isset( $a3lz_query[ 'is_404' ] ) || isset( $a3lz_query[ 'is_rest' ] ) || isset( $a3lz_query[ 'is_sitemap' ] ) || isset( $a3lz_query[ 'is_robots' ] ) ) {
			return true;
		}

		return false;
	}

	public function has_skip_lazy_attribute( $html ) {
		$has_skip_lazy = false;

		if ( stristr( $html, ' data-skip-lazy ' ) !== false || stristr( $html, ' data-skip-lazy=' ) !== false || stristr( $html, ' data-skip-lazy/>' ) !== false || stristr( $html, ' data-skip-lazy>' ) !== false ) {
			$has_skip_lazy = true;
		}

		return $has_skip_lazy;
	}
}
