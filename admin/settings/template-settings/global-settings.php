<?php
/* "Copyright 2012 a3 Revolution Web Design" This software is distributed under the terms of GNU GENERAL PUBLIC LICENSE Version 3, 29 June 2007 */

namespace A3Rev\LazyLoad\FrameWork\Settings {

use A3Rev\LazyLoad\FrameWork;

// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;

/*-----------------------------------------------------------------------------------
a3 LazyLoad General Settings

TABLE OF CONTENTS

- var parent_tab
- var subtab_data
- var option_name
- var form_key
- var position
- var form_fields
- var form_messages

- __construct()
- subtab_init()
- set_default_settings()
- get_settings()
- subtab_data()
- add_subtab()
- settings_form()
- init_form_fields()

-----------------------------------------------------------------------------------*/

class Global_Panel extends FrameWork\Admin_UI
{

	/**
	 * @var string
	 */
	private $parent_tab = 'a3-lazy-load';

	/**
	 * @var array
	 */
	private $subtab_data;

	/**
	 * @var string
	 * You must change to correct option name that you are working
	 */
	public $option_name = 'a3_lazy_load_global_settings';

	/**
	 * @var string
	 * You must change to correct form key that you are working
	 */
	public $form_key = 'a3_lazy_load_global_settings';

	/**
	 * @var string
	 * You can change the order show of this sub tab in list sub tabs
	 */
	private $position = 1;

	/**
	 * @var array
	 */
	public $form_fields = array();

	/**
	 * @var array
	 */
	public $form_messages = array();

	/*-----------------------------------------------------------------------------------*/
	/* __construct() */
	/* Settings Constructor */
	/*-----------------------------------------------------------------------------------*/
	public function __construct() {

		add_action( 'init', array( $this, 'init_form_fields' ), 100 );
		//$this->init_form_fields();
		$this->subtab_init();

		$this->form_messages = array(
				'success_message'	=> __( 'Settings successfully saved.', 'a3-lazy-load' ),
				'error_message'		=> __( 'Error: Settings can not save.', 'a3-lazy-load' ),
				'reset_message'		=> __( 'Settings successfully reseted.', 'a3-lazy-load' ),
			);

		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_end', array( $this, 'include_script' ) );

		add_action( $this->plugin_name . '_set_default_settings' , array( $this, 'set_default_settings' ) );

		add_action( $this->plugin_name . '-' . $this->form_key . '_settings_init' , array( $this, 'after_save_settings' ) );

		add_action( $this->plugin_name . '_get_all_settings' , array( $this, 'get_settings' ) );

	}

	/*-----------------------------------------------------------------------------------*/
	/* subtab_init() */
	/* Sub Tab Init */
	/*-----------------------------------------------------------------------------------*/
	public function subtab_init() {

		add_filter( $this->plugin_name . '-' . $this->parent_tab . '_settings_subtabs_array', array( $this, 'add_subtab' ), $this->position );

	}

	/*-----------------------------------------------------------------------------------*/
	/* set_default_settings()
	/* Set default settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function set_default_settings() {
		$GLOBALS[$this->plugin_prefix.'admin_interface']->reset_settings( $this->form_fields, $this->option_name, false );
	}

	/*-----------------------------------------------------------------------------------*/
	/* after_save_settings()
	/* Process when clean on deletion option is un selected */
	/*-----------------------------------------------------------------------------------*/
	public function after_save_settings() {
		if ( ( isset( $_POST['bt_save_settings'] ) || isset( $_POST['bt_reset_settings'] ) ) && get_option( $this->plugin_name . '_clean_on_deletion' ) == 0  )  {
			$uninstallable_plugins = (array) get_option('uninstall_plugins');
			unset($uninstallable_plugins[ $this->plugin_path ]);
			update_option('uninstall_plugins', $uninstallable_plugins);
		}
	}

	/*-----------------------------------------------------------------------------------*/
	/* get_settings()
	/* Get settings with function called from Admin Interface */
	/*-----------------------------------------------------------------------------------*/
	public function get_settings() {
		$GLOBALS[$this->plugin_prefix.'admin_interface']->get_settings( $this->form_fields, $this->option_name );
	}

	/**
	 * subtab_data()
	 * Get SubTab Data
	 * =============================================
	 * array (
	 *		'name'				=> 'my_subtab_name'				: (required) Enter your subtab name that you want to set for this subtab
	 *		'label'				=> 'My SubTab Name'				: (required) Enter the subtab label
	 * 		'callback_function'	=> 'my_callback_function'		: (required) The callback function is called to show content of this subtab
	 * )
	 *
	 */
	public function subtab_data() {

		$subtab_data = array(
			'name'				=> 'global-settings',
			'label'				=> __( 'Global Settings', 'a3-lazy-load' ),
			'callback_function'	=> 'a3_lazy_load_global_settings_form',
		);

		if ( $this->subtab_data ) return $this->subtab_data;
		return $this->subtab_data = $subtab_data;

	}

	/*-----------------------------------------------------------------------------------*/
	/* add_subtab() */
	/* Add Subtab to Admin Init
	/*-----------------------------------------------------------------------------------*/
	public function add_subtab( $subtabs_array ) {

		if ( ! is_array( $subtabs_array ) ) $subtabs_array = array();
		$subtabs_array[] = $this->subtab_data();

		return $subtabs_array;
	}

	/*-----------------------------------------------------------------------------------*/
	/* settings_form() */
	/* Call the form from Admin Interface
	/*-----------------------------------------------------------------------------------*/
	public function settings_form() {

		$output = '';
		$output .= $GLOBALS[$this->plugin_prefix.'admin_interface']->admin_forms( $this->form_fields, $this->form_key, $this->option_name, $this->form_messages );

		return $output;
	}

	/*-----------------------------------------------------------------------------------*/
	/* init_form_fields() */
	/* Init all fields of this form */
	/*-----------------------------------------------------------------------------------*/
	public function init_form_fields() {

		global $a3_lazy_load_excludes;

  		// Define settings
     	$this->form_fields = array(
     		array(
            	'name' 		=> __( 'Plugin Framework Global Settings', 'a3-lazy-load' ),
            	'id'		=> 'plugin_framework_global_box',
                'type' 		=> 'heading',
                'first_open'=> true,
                'is_box'	=> true,
           	),
           	array(
           		'name'		=> __( 'Customize Admin Setting Box Display', 'a3-lazy-load' ),
           		'desc'		=> __( 'By default each admin panel will open with all Setting Boxes in the CLOSED position.', 'a3-lazy-load' ),
                'type' 		=> 'heading',
           	),
           	array(
				'type' 		=> 'onoff_toggle_box',
			),
           	array(
            	'name' 		=> __( 'House Keeping', 'a3-lazy-load' ),
                'type' 		=> 'heading',
            ),
			array(
				'name' 		=> __( 'Clean up on Deletion', 'a3-lazy-load' ),
				'desc' 		=> __( 'On deletion (not deactivate) the plugin will completely remove all tables and data it created, leaving no trace it was ever here.', 'a3-lazy-load' ),
				'id' 		=> $this->plugin_name . '_clean_on_deletion',
				'type' 		=> 'onoff_checkbox',
				'default'	=> '0',
				'separate_option'	=> true,
				'free_version'		=> true,
				'checked_value'		=> '1',
				'unchecked_value'	=> '0',
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),

           	array(
            	'name' 		=> __( 'Lazy Load Activation', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'id'		=> 'lazy_load_enable_box',
                'is_box'	=> true,
           	),
           	array(
				'name' 		=> __( 'a3 Lazy Load', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_lazyloadxt',
                'desc'		=> __( 'On and a3 Lazy Load will lazy load elements that are missed by WordPress Core Lazy Load.', 'a3-lazy-load' ),
                'class'		=> 'a3l_apply_to_load',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'WordPress Core Lazy Load', 'a3-lazy-load' ),
                'id' 		=> 'a3l_wpcore_lazyload',
                'desc'		=> __( 'Switch to OFF to completely disable WordPress core Lazy Load.', 'a3-lazy-load' ),
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),

			array(
				'name'		=> __( 'Lazy Load Images', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'class'		=> 'a3l_apply_to_load_container',
                'id'		=> 'a3l_apply_to_images_box',
                'is_box'	=> true,
           	),
           	array(
				'name' 		=> __( 'Enable Lazy Load for Images', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_to_images',
                'class'		=> 'a3l_apply_to_images',
                'desc'		=> __( '100% Compatible with WordPress 5.5 image lazy load and will enhance its coverage on this site.', 'a3-lazy-load' ),
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),

			array(
                'type' 		=> 'heading',
				'class'		=> 'a3l_apply_to_load_images_container'
           	),
			array(
				'name' 		=> __( 'Images in Content', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_image_to_content',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Images in Widgets', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_image_to_textwidget',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Post Thumbnails', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_image_to_postthumbnails',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Gravatars', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_image_to_gravatars',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Noscript Support', 'a3-lazy-load' ),
                'id' 		=> 'a3l_image_include_noscript',
                'desc'		=> __( 'Turn ON to activate Noscript tag as a fallback to show images for users who have JavaScript disabled in their browser.', 'a3-lazy-load' ),
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Exclude Images', 'a3-lazy-load' ),
                'type' 		=> 'heading',
				'class'		=> 'a3l_apply_to_load_images_container',
				'desc'		=> __( 'Images can be excluded from Lazy Load by entering existing image classnames below or if the image has no classname by adding the exclusion <code>skip-lazy</code> classname or <code>data-skip-lazy</code> attribute to the image. Examples, by class <code>&#x3C;img class="skip-lazy"&#x3E;</code> , by attribute <code>&#x3C;img data-skip-lazy&#x3E;</code>', 'a3-lazy-load' )
           	),
			array(
				'name' => __( 'Skip Images Classes', 'a3-lazy-load' ),
				'id' 		=> 'a3l_skip_image_with_class',
				'desc' 		=>  __('Find and enter image class name. If more than 1 then comma seperate.<br>Example: image-class1, image-class2. Supports Wild Cards image*, .*thumbnail', 'a3-lazy-load' ),
				'type' 		=> 'text',
				'default'	=> ""
			),
			array(
				'name' 		=> __( 'Horizontal Scroll', 'a3-lazy-load' ),
                'type' 		=> 'heading',
				'class'		=> 'a3l_apply_to_load_images_container',
				'desc'		=> __( 'a3 Lazy Load has built in support for Horizontal Scrolling image galleries BUT you must enter the container classname or ID below for it to apply to that horizontal scroll container. Use your code inspector to get the correct classname or ID, it will have style is <code>overflow-x:scroll</code>', 'a3-lazy-load' )
           	),
			array(
				'name' => __( 'Container Classnames or IDs', 'a3-lazy-load' ),
				'id' 		=> 'a3l_horizontal_trigger_classnames',
				'desc' 		=>  __('Prepend Classnames with a dot example <code>.images_holder</code>, Prepend IDs with hash tag example <code>#wrapper</code> and Comma separate if more than one.', 'a3-lazy-load' ),
				'type' 		=> 'text',
				'default'	=> ""
			),
			

			array(
				'name'		=> __( 'Lazy Load Videos and iframes', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'class'		=> 'a3l_apply_to_load_container',
                'id'		=> 'a3l_apply_to_videos_box',
                'is_box'	=> true,
           	),
           	array(
				'name' 		=> __( 'Video and iframes', 'a3-lazy-load' ),
				'desc'		=> sprintf( __( 'Turn ON to activate Lazy Load for <a href="%s" target="_blank">WordPress Embeds</a>, <a href="%s" target="_blank">HTML5 Video</a> and content loaded by iframe from all sources. Note: WordPress Shortcode is not supported.', 'a3-lazy-load' ), 'http://codex.wordpress.org/Embeds/', 'http://www.w3schools.com/html/html5_video.asp' ),
                'id' 		=> 'a3l_apply_to_videos',
                'class'		=> 'a3l_apply_to_videos',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),

			array(
                'type' 		=> 'heading',
				'class'		=> 'a3l_apply_to_load_videos_container'
           	),
			array(
				'name' 		=> __( 'In Content', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_video_to_content',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'In Widgets', 'a3-lazy-load' ),
                'id' 		=> 'a3l_apply_video_to_textwidget',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Noscript Support', 'a3-lazy-load' ),
                'id' 		=> 'a3l_video_include_noscript',
                'desc'		=> __( 'Turn ON to activate Noscript tag as a fallback to show WordPress Embeds, HTML 5 Video and iframe loaded content for users who have JavaScript disabled in their browser.', 'a3-lazy-load' ),
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Exclude Videos / iframes', 'a3-lazy-load' ),
                'type' 		=> 'heading',
				'class'		=> 'a3l_apply_to_load_videos_container',
				'desc'		=> __( 'Videos and iFrames can be excluded from Lazy Load either by entering existing classnames below or if it has has no classname by adding the exclusion <code>skip-lazy</code> classname or <code>data-skip-lazy</code> attribute to the video / iframe. Examples, by class <code>&#x3C;video class="skip-lazy"&#x3E;</code>, by attribute <code>&#x3C;video data-skip-lazy&#x3E;</code>', 'a3-lazy-load' )
           	),
			array(
				'name' => __( 'Skip Videos Classes', 'a3-lazy-load' ),
				'id' 		=> 'a3l_skip_video_with_class',
				'desc' 		=>  __('Find and enter video class name. If more than 1 then comma seperate.<br>Example: video-class1, video-class2. Supports WildCards video*, .*video', 'a3-lazy-load' ),
				'type' 		=> 'text',
				'default'	=> ""
			),
     	);

		$this->form_fields = array_merge( $this->form_fields, array(
			array(
				'name'		=> __( "Exclude by URI's and Page Types", 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'class'		=> 'a3l_apply_to_load_container',
                'id'		=> 'a3l_exclude_box',
                'is_box'	=> true,
           	),
           	array(
				'name'		=> __( 'Exclude by URIs', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'desc' 		=>  __("Add strings, 1 per line (not full filenames) that are to be excluded from Lazy Load. Example, if your URL looks like this /domain-name/2018/example-post/ and you just want to exclude that post enter /example-post/. If you want to exclude all posts in /2018/ just year enter /2018/ and Lazy Load won't be applied to /example-post/ and all other posts prefixed by /2018/ in the URL.", 'a3-lazy-load' ),
           	),
			array(
				'name' => __( 'URIs', 'a3-lazy-load' ),
				'id' 		=> 'a3l_uris_exclude',
				'type' 		=> 'textarea',
				'css'		=> 'width: 100%; max-width: 90%;',
				'custom_attributes'	=> array(
					'cols' => 50,
					'rows' => 10,
				),
				'placeholder'	=> __('Enter each URI per row', 'a3-lazy-load' ),
			),
			array(
				'name'		=> __( 'Page Type Exclusions', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'desc' 		=>  __("Do not apply lazy load for the following page types", 'a3-lazy-load' ),
           	),
		) );

		$objects_exclude_options = array();
		$objects_list            = $a3_lazy_load_excludes->get_hard_objects_list();
		$post_types_list         = $a3_lazy_load_excludes->get_post_types_list();
		$objects_list            = array_merge( $objects_list, $post_types_list );

		if ( ! empty( $objects_list ) ) {
			foreach ( $objects_list as $object_key => $object_name ) {
				$objects_exclude_options[] = array(
					'name' 		=> $object_name,
	                'id' 		=> 'a3l_objects_exclude['.$object_key.']',
					'type' 		=> 'onoff_checkbox',
					'default'	=> 0,
					'checked_value'		=> 1,
					'unchecked_value'	=> 0,
					'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
					'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
				);
			}

			$this->form_fields = array_merge( $this->form_fields, $objects_exclude_options );
		}

		$this->form_fields = array_merge( $this->form_fields, array(
			array(
				'name'		=> __( 'Script Load Optimization', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'class'		=> 'a3l_apply_to_load_container',
                'id'		=> 'a3l_script_load_optimization_box',
                'is_box'	=> true,
           	),
			array(
				'name' 		=> __( 'Theme Loader Function', 'a3-lazy-load' ),
				'desc'		=> __( 'Your theme must have the wp_footer() function if you select FOOTER load.', 'a3-lazy-load' ),
				'id' 		=> 'a3l_theme_loader',
				'type' 		=> 'switcher_checkbox',
				'default'	=> 'wp_footer',
				'checked_value'		=> 'wp_head',
				'unchecked_value'	=> 'wp_footer',
				'checked_label'		=> __( 'HEADER', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'FOOTER', 'a3-lazy-load' ),
			),

			array(
				'name'		=> __( 'WordPress Mobile Template Plugins', 'a3-lazy-load' ),
                'type' 		=> 'heading',
                'class'		=> 'a3l_apply_to_load_container',
                'id'		=> 'a3l_wordpress_mobile_template_box',
                'is_box'	=> true,
           	),
			array(
				'name' 		=> __( 'Disable On WPTouch', 'a3-lazy-load' ),
				'desc' 		=>  __("Disables a3 Lazy Load when the WPTouch mobile theme is used", 'a3-lazy-load' ),
                'id' 		=> 'a3l_load_disable_on_wptouch',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Disable On MobilePress', 'a3-lazy-load' ),
				'desc' 		=>  __("Disables a3 Lazy Load when the MobilePress mobile theme is used", 'a3-lazy-load' ),
                'id' 		=> 'a3l_load_disable_on_mobilepress',
				'type' 		=> 'onoff_checkbox',
				'default'	=> true,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),

			array(
				'name' 		=> __( 'Effect & Style', 'a3-lazy-load' ),
				'class'		=> 'a3l_apply_to_load_container',
                'type' 		=> 'heading',
                'id'		=> 'a3l_settings_style_box',
                'is_box'	=> true,
           	),
			array(
				'name' 		=> __( 'Loading Effect', 'a3-lazy-load' ),
				'id' 		=> 'a3l_effect',
				'type' 		=> 'switcher_checkbox',
				'default'	=> 'spinner',
				'checked_value'		=> 'fadein',
				'unchecked_value'	=> 'spinner',
				'checked_label'		=> __( 'FADE IN', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'SPINNER', 'a3-lazy-load' ),
			),
			array(
				'name' 		=> __( 'Loading Background Colour', 'a3-lazy-load' ),
				'id' 		=> 'a3l_effect_background',
				'type' 		=> 'color',
				'default'	=> '#ffffff'
			),

			array(
				'name' 		=> __( 'Image Load Threshold', 'a3-lazy-load' ),
				'class'		=> 'a3l_apply_to_load_container',
                'type' 		=> 'heading',
                'id'		=> 'a3l_image_load_theshold_box',
                'is_box'	=> true,
           	),
			array(
				'name' 		=> __( 'Threshold (px)', 'a3-lazy-load' ),
				'id' 		=> 'a3l_edgeY',
				'desc'		=> __( 'Expands visible page area (viewport) in vertical direction by the amount of pixels set. Elements start to load as soon as they reach the threshold instead of when they reach the actual viewport.', 'a3-lazy-load' ),
				'type' 		=> 'text',
				'default'	=> 0,
				'css'		=> 'width: 80px;'
			),

			array(
				'name' 		=> __( 'Jetpack Site Accelerator (Photon) Compatibility', 'a3-lazy-load' ),
				'class'		=> 'a3l_apply_to_load_container',
                'type' 		=> 'heading',
                'id'		=> 'a3l_jetpack_compatibility_box',
                'is_box'	=> true,
           	),
			array(
				'name' 		=> __( 'Jetpack Compatibility', 'a3-lazy-load' ),
				'desc' 		=>  __("If using Jetpack Site Accelerator turn this option on so your Jetpack CDN images can be lazy loaded.", 'a3-lazy-load' ),
                'id' 		=> 'a3l_jetpack_site_accelerator_compatibility',
				'type' 		=> 'onoff_checkbox',
				'default'	=> false,
				'checked_value'		=> true,
				'unchecked_value'	=> false,
				'checked_label'		=> __( 'ON', 'a3-lazy-load' ),
				'unchecked_label' 	=> __( 'OFF', 'a3-lazy-load' ),
			),
		) );

		$this->form_fields = apply_filters( $this->option_name . '_settings_fields', $this->form_fields );
	}

	public function include_script() {
?>
<script>
(function($) {
	$(document).ready(function() {

		if ( ! $("input.a3l_apply_to_load").is(":checked") ) {
			$(".a3l_apply_to_load_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px'} );
		}

		$(document).on( "a3rev-ui-onoff_checkbox-switch", '.a3l_apply_to_load', function( event, value, status ) {
			$(".a3l_apply_to_load_container").attr('style','display:none;');
			if ( status == 'true' ) {
				$(".a3l_apply_to_load_container").slideDown();
			} else {
				$(".a3l_apply_to_load_container").slideUp();
			}
		});

		if ( $("input.a3l_apply_to_images:checked").val() != '1') {
			$(".a3l_apply_to_load_images_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px'} );
		}

		$(document).on( "a3rev-ui-onoff_checkbox-switch", '.a3l_apply_to_images', function( event, value, status ) {
			$(".a3l_apply_to_load_images_container").attr('style','display:none;');
			if ( status == 'true' ) {
				$(".a3l_apply_to_load_images_container").slideDown();
			} else {
				$(".a3l_apply_to_load_images_container").slideUp();
			}
		});

		if ( $("input.a3l_apply_to_videos:checked").val() != '1' ) {
			$(".a3l_apply_to_load_videos_container").css( {'visibility': 'hidden', 'height' : '0px', 'overflow' : 'hidden', 'margin-bottom' : '0px'} );
		}

		$(document).on( "a3rev-ui-onoff_checkbox-switch", '.a3l_apply_to_videos', function( event, value, status ) {
			$(".a3l_apply_to_load_videos_container").attr('style','display:none;');
			if ( status == 'true' ) {
				$(".a3l_apply_to_load_videos_container").slideDown();
			} else {
				$(".a3l_apply_to_load_videos_container").slideUp();
			}
		});


	});
})(jQuery);
</script>
<?php
	}
}

}

namespace {

/**
 * a3_lazy_load_cards_settings_form()
 * Define the callback function to show subtab content
 */
function a3_lazy_load_global_settings_form() {
	global $a3_lazy_load_global_settings_panel;
	$a3_lazy_load_global_settings_panel->settings_form();
}

}
