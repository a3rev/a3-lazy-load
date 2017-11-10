=== a3 Lazy Load ===
Contributors: a3rev, a3rev Software, nguyencongtuan
Tags: a3 lazy load, Lazy Loading , image lazy load, lazyload
Requires at least: 4.5
Tested up to: 4.9.0
Stable tag: 1.8.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Use a3 Lazy Load for images, videos, iframes. Instantly improve your sites load time and dramatically improve site users experience.

== DESCRIPTION ==

a3 Lazy Load is a Mobile Oriented, very simple to use plugin that will speed up sites page load speed. The more content heavy your site the better the plugin will perform and the more you will see the improvements in performance. See [this demo](http://ressio.github.io/lazy-load-xt/demo/stresstest1000img.htm) of a page with 1,000 images (yes 1,000 images) to load.

a3 Lazy Load is inspired by and powered by the ressio [Lazy-Load-xt JavaScript](https://github.com/ressio/lazy-load-xt).

a3 Lazy Load is the most fully featured, incredibly easy to set up lazy load plugin for WordPress. Use the plugins admin settings to easily define what elements are lazy loaded and when they become visible in the users browser. As the user scrolls down the page the next lot of elements you have applied lazy Load to are only loaded as they become visible in the view port.

= IMAGE LAZY LOAD =

Images are the number one element that slows page load and increases bandwidth use. From the a3 Lazy Load admin panel turn load images by a3 Lazy Load ON | OFF. For more flexibility when ON you can choose to ON | OFF lazy load for images in

* Post and Pages (All Content areas)
* Widgets (Sidebar, header and footer)
* Apply to post thumbnails
* Apply to gravatars

= MORE THAN JUST IMAGES =

= VIDEO LAZY LOAD =

a3 Lazy Load supports all WordPress video Embeds including Youtube, Vimeo and HTML5 video - for a full list see the [WordPress Codex Embeds](http://codex.wordpress.org/Embeds) list. The WordPress embed method of copying and pasting the video url into posts and pages content area is fully supported. Note - embed video by WordPress shortcode is not supported.

From the a3 lazy Load admin panel turn Video Support ON | OFF. When ON you can choose to ON | OFF lazy load for videos in

* Post and Pages (All Content areas)
* Widgets (Sidebar, header and footer)
* Youtube [see demo](http://ressio.github.io/lazy-load-xt/demo/youtube-iframe.htm)
* Video [see demo](http://ressio.github.io/lazy-load-xt/demo/video-html5.htm)
* Fully Compatible with the popular [Youtube Embed Plugin](https://wordpress.org/plugins/youtube-embed/)

= iFRAME LAZY LOAD =

a3 Lazy Load has built in support for content that is added by iframe from any source in content and widgets  examples

* WordPress embedded media
* Facebook Like boxes with profiles, Like buttons, Recommend
* Google+ Profile
* Google Maps

= POST EMBED =

* Fully compatible with WordPress embed post on any site feature introduced in version WP version 4.4
* Makes embed post load much faster

= WORDPRESS AMP =

* Built in auto support for WordPress AMP plugin
* Built in support for Better AMP plugin
* There are no setting options for exclude /amp - Lazy Load is just never applied to the /amp endpoint
* When the url is loaded in browser without /amp Lazy Load is applied  

= LAZY LOAD EFFECTS =

a3 Lazy Load gives you the option to lazy load images with a FADE IN or SPINNER effect

* FADEIN [see demo](http://ressio.github.io/lazy-load-xt/demo/fadein.htm)
* SPINNER [see demo](http://ressio.github.io/lazy-load-xt/demo/spinner.htm)
* Option to create a custom Lazy Load pre-load background colour

= WOOCOMMERCE =

a3 lazy Load is built and tested to be fully compatible with the very widely used WooCommerce plugin

= PERFORMANCE TWEAKS =

a3 Lazy Load gives you the option to load its script from your sites HEAD or from the FOOT.

* Note that your theme must have the wp_footer() function if you select FOOTER load.
* Note the plugin CSS is always loaded from the HEAD.

= EXCLUDE IMAGES & VIDEO =

a3 Lazy Load allows you to easily exclude any images and video by class name from having the Lazy Load effect applied.

= JAVASCIPT DISABLED FALLBACK =

a3 Lazy Load has built in Noscript fallback if user has JavaScript turned off in their browser. Developers who use underscore.js in their applications can use the Noscript parameter to exclude their plugins content from Lazy Load.

= PLUGIN COMPATIBILITY =

* Work with any WordPress theme that follows the WordPress Theme Codex
* Fully compatible with WPTouch plugin - Set to not apply on Mobiles if WPTouch is installed
* Fully compatible with MobilePress plugin - Set to not apply on Mobiles if MobilePress is installed
* Will not conflict with any plugin that has lazy load built in
* Plugin Developers a3 lazy load filter allows them to let lazy load apply to their plugin
* Tested 100% compatible with WP Super Cache and W3 Total Cache plugins
* Tested 100% compatible with Amazon Cloudfront
* Fully compatible with CDN architecture.

= MORE FEATURES =

* Full support of jQueryMobile framework
* WordPress Multi site ready.
* Backend support for RTL display.
* Translation ready

= JOIN THE a3 LAZY LOAD COMMUNITY =

When you download a3 lazy Load, you join our community. Regardless of if you are a WordPress newbie or experienced developer if youre interested in contributing to a3 Lazy Load development head over to the [a3 Lazy Load GitHub Repository](https://github.com/a3rev/a3-lazy-load) to find out how you can contribute.
Want to add a new language to a3 Lazy Load? Great! You can contribute via [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/a3-lazy-load)

== Installation ==
 
= Minimum Requirements =

* WordPress 4.5
* PHP version 5.5.0 or greater
* MySQL version 5.5.0 or greater

== SCREENSHOTS ==

1. a3 lazy Load Dashboard
2. a3 lazy Load Image Setting Options
3. a3 lazy Load Video and iframe settings

== USAGE ==

1. Install and activate the plugin
2. Open WordPress Settings menu
3. Click on a3 Lazy Load menu
4. Turn ON Lazy Load and all preferred settings
5. Save Changes and enjoy the improved performance Lazy Load will give your site


== Changelog ==

= 1.8.2 - 2017/06/02 =
* Tweak - Tested for compatibility with WordPress major version 4.8.0
* Tweak - Add Lazy Load support for new WordPress 4.8.0 Image, Video and Media widgets
* Tweak - Updated Skip Image Classes and Skip Video Classes help text for better clarity 
* Fix - WordPress Admin Tool Bar User Avatar conflict Issue #2

= 1.8.1 - 2017/05/31 =
* Fix - Use correct object A3_Lazy_Load instead of this as it was causing a fatal error

= 1.8.0 - 2017/05/30 =
* Feature  Updated for compatibility with Better AMP plugin
* Feature  Launched a3Lazy Load Github public Repository
* Feature  WordPress Translation activation. Add text domain declaration in file header.
* Tweak - Change global $$variable to global ${$variable} for compatibility with PHP 7.0
* Tweak - Update a3 Revolution to a3rev Software on plugins description
* Tweak - Update plugin framework to latest version
* Tweak - Tested for full compatibility with WordPress version 4.7.5
* Tweak - Tested for full compatibility with PHP 7.0
* Fix  Exclude images by class

= 1.7.1 =
* Tweak - Register fontawesome in plugin framework with style name is 'font-awesome-styles'
* Tweak - Update plugin framework to latest version
* Tweak - Tested for full compatibility with WordPress major version 4.5

= 1.7.0 - 2016/03/01 =
* Feature - Full compatibility with AMP plugin. No settings for it just hardcoded that Lazy Load is not applied for any url appended with /amp endpoint. Lazy load is applied to the url without the endpoint
* Feature - Define new 'Background Color' type on plugin framework with ON | OFF switch to disable background or enable it
* Feature - Define new function - hextorgb() - for convert hex color to rgb color on plugin framework
* Feature - Define new function - generate_background_color_css() - for export background style code on plugin framework that is used to make custom style
* Tweak - Saved the time number into database for one time customize style and Save change on the Plugin Settings
* Tweak - Replace version number by time number for dynamic style file are generated by Sass to solve the issue get cache file on CDN server
* Tweak - Define new 'strip_methods' argument for Uploader type, allow strip http/https or no
* Tweak - Upgraded to the latest version of a3 plugin framework
* Tweak - Tested for full compatibility with WordPress version 4.4.2
* Tweak - Tested for full compatibility with WooCommerce version 2.5.2
* Fix - Define new placeholder image data for iframe. Microsoft browsers smartscreen filter was blocking the .gif placeholder loading inside iframes and throwing an unsafe website message

= 1.6.0 - 2016/01/22 =
* Feature - Add support for Lazy loading images, video or iframe inside content that is loaded by AJAX
* Tweak - Full support for loading Product Thumbnails within the WooCommerce cart widget
* Tweak - Tested for full compatibility with WordPress version 4.4.1
* Tweak - Tested for full compatibility with WooCommerce version 2.5

= 1.5.2 - 2015/12/24 =
* Tweak - Change on enqueue styles and scripts for faster load
* Tweak - Register new script 'jquery-lazyloadxt-srcset' for enqueue when lazyload script is called , full support for WP 4.4 Responsive Images
* Fix - Filter for change the 'srcset' attribute name to 'data-srcset' name to prevent browsers loading the image while page is loading
* Fix - Create a new script for when image comes into view port that it changes 'data-srcset' to 'srcset' so image is loaded then by lazy load

= 1.5.1 - 2015/12/11 =
* Tweak - Change the placeholder image name from 'placeholder.gif' to 'lazy_placeholder.gif' to avoid conflict if thumb image has name like placehoder.gif
* Tweak - Change pattern parameter from "/data-src=['\"]/is" to "/ data-src=['\"]/is" to check 'data-src' exists as attribute of video, image, iframe, Solve the issue when 3rd party script adds attribute with format of name '***-data-src' to html tag.
* Fix - Use preg_match( "/src=.*lazy_placeholder.gif['\"]/s", $imgHTML ) On themes that have loop code was causing loading of the placeholder instead of the image

= 1.5.0 - 2015/12/10 =
* Feature - Change media uploader to New UI of WordPress media uploader with WordPress Backbone and Underscore
* Feature - Apply Lazy Load for new Embed Post feature on WordPress 4.4
* Tweak - Update the uploader script to save the Attachment ID and work with New Uploader
* Tweak - Updated a3 Plugin Framework to the latest version
* Tweak - Full compatibility with Responsive Image feature on WordPress 4.4
* Tweak - Change the PlaceHolder image from data image to real image placeholder.gif for fix display on IE
* Tweak - Tested for full compatibility with WordPress major version 4.4
* Fix - Check if 'HTTP_USER_AGENT' is defined before call it from strpos

= 1.4.1 - 2015/08/22 =
* Tweak - include new CSSMin lib from https://github.com/tubalmartin/YUI-CSS-compressor-PHP-port into plugin framework instead of old CSSMin lib from http://code.google.com/p/cssmin/ , to avoid conflict with plugins or themes that have CSSMin lib
* Tweak - make __construct() function for 'Compile_Less_Sass' class instead of using a method with the same name as the class for compatibility on WP 4.3 and is deprecated on PHP4
* Tweak - change class name from 'lessc' to 'a3_lessc' so that it does not conflict with plugins or themes that have another Lessc lib
* Tweak - Plugin Framework DB query optimization. Refactored settings_get_option call for dynamic style elements, example typography, border, border_styles, border_corner, box_shadow
* Tweak - Tested for full compatibility with WordPress major version 4.3.0
* Fix - Update the plugin framework for setup correct default settings on first installed
* Fix - Update the plugin framework for reset to correct default settings when hit on 'Reset Settings' button on each settings tab

= 1.4.0 - 2015/06/17 =
* Feature - Plugin framework Mobile First focus upgrade
* Feature - Massive improvement in admin UI and UX in PC, tablet and mobile browsers
* Feature - Introducing opening and closing Setting Boxes on admin panels.
* Feature - Added Plugin Framework Customization settings. Control how the admin panel settings show when editing.
* Feature - Added House Keeping - Clean up on Deletion function. ON | OFF switch is in the Plugin Framework Settings Box.  
* Feature - Added a 260px wide images to the right sidebar for support forum link, Documentation links.
* Tweak - Tested for full compatibility with WooCommerce Version 2.3.11
* Tweak - Removed Add-Ons Menu
* Tweak - Moved plugin menu from Wordpress Dashboard admin menu to a sub menu on the WordPress Settings menu
* Tweak - Added Settings link to the plugins listing on plugin.php menu for easy access to plugin
* Fix - Check 'request_filesystem_credentials' function, if it does not exists then require the core php lib file from WP where it is defined

= 1.3.0 - 2015/06/05 =
* Feature - Added Image Load Threshold with set threshold pixel dynamic setting. Default is 0px
* Credit - Thanks to [Onisforos and Matt Pain](https://wordpress.org/support/topic/setting-threshold?replies=3) for suggesting and explaining the new Threshold feature

= 1.2.2 - 2015/06/03 =
* Tweak - Security Hardening. Removed all php file_put_contents functions in the plugin framework and replace with the WP_Filesystem API
* Tweak - Security Hardening. Removed all php file_get_contents functions in the plugin framework and replace with the WP_Filesystem API

= 1.2.1 - 2015/05/26 =
* Fix - Update url of dynamic stylesheet in uploads folder to the format <code>//domain.com/</code> so it's always is correct when loaded as <code>http</code> or <code>https</code>
* Credit - Thanks to WordPress member hero12 for bringing the matter [to our attention](https://wordpress.org/support/topic/css-is-not-loaded-properly-on-https?replies=1).

= 1.2.0 - 2015/05/18 =
* Feature - Added new extend script to support event when click or tap on tab to load images without having to scroll to initiate load.
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.2
* Tweak - Changed Permission 777 to 755 for style folder inside the uploads folder
* Tweak - Chmod 644 for dynamic style and .less files from uploads folder

= 1.1.1 - 2015/04/21 =
* Tweak - Tested and Tweaked for full compatibility with WordPress Version 4.2.0
* Tweak - Update style of plugin framework. Removed the [data-icon] selector to prevent conflict with other plugins that have font awesome icons

= 1.1.0 - 2015/01/23 =
* Feature - Added support for all WordPress video Embeds including Youtube, Vimeo and HTML5 video
* Feature - Added support for content that is added by iframe from any source in post and page content and widgets
* Feature - Added ON | OFF option for Noscript parameter for both images and video and iframes - fallback if user does not have JavaScript support turned on in browser.
* Tweak - Reworked the plugins admin panel for new feature options. Separate settings for Images and Video / iframes
* Tweak - Updated all the admin panel text and add new help text.
* Tweak - Updated the plugins WordPress description with new features.
* Tweak - Updated the plugins WordPress screenshot
* Tweak - Updated the plugins WordPress banner image.
* Dev - Updated 'a3_lazy_load_enable' function to edit their image or video attribute to enable a3 lazy load images or videos loaded by 3rd party application.
* Dev - Defined 'a3_lazy_load_image_enable' function to edit image attribute to enable a3 lazy load to apply images loaded by 3rd party applications.
* Dev - Defined 'a3_lazy_load_video_enable' function to edit image attribute so a3 lazy load script can apply to the videos, iframe.
* Dev - Include 'var a3_lazyload_params = {"apply_images":"1","apply_videos":"1"};' JavaScript variable into frontend that get the option that are set from admin panel. Plugin and Theme developers can use that variable inside own script to check when Lazy Load apply for Image and for Video instead of use 'a3_lazy_load_video_enable' and 'a3_lazy_load_video_enable' functions in PHP code
* Dev - Remove 'a3_lazy_load_skip_classes' filter tag, we will replace another filter for separate filters for image and videos
* Dev - Defined 'a3_lazy_load_skip_images_classes' filter tag. Developers can add another class css name for images that they don't want lazy load applied too.
* Dev - Defined 'a3_lazy_load_skip_videos_classes' filter tag. Developers can add another class css name for video that they don't want lazy load applied too.
* Dev - Added default exclude class 'a3-notlazy' so developers can easily apply it to videos that they don't want Lazy Load to apply to.
* Dev - Defined 'a3_lazy_load_videos' filter. Plugin and Theme developers can use this filter and parse the content with videos or iframe and the filter will return content with change on videos or iframe that a3 Lazy Load support

= 1.0.2 - 2015/01/20 =
* Tweak - Include wp_deregister_script( 'jquery-lazyloadxt' ) before wp_enqueue_script( 'jquery-lazyloadxt' ) for compatibility with a3 Portfolio plugin which supports video slides
* Dev - Add new parameter $noscript boolen type for 'a3_lazy_load_html' and 'a3_lazy_load_images' filters to exclude or include noscript from content return of 3rd party plugins.
* Dev - Added default exclude class 'a3-notlazy' so developers can easily apply it to images that they don't want Lazy Load to apply to.

= 1.0.1 - 2014/12/23 =
* Tweak - Applied lazy load for 'wp_get_attachment_image_attributes' filter tag for WordPress default [gallery] shortcode
* Tweak - Added link to a3 Lazy Load wordpress.org support forum on plugins description that show on plugins menu
* Dev - Defined 'a3_lazy_load_enable' function when Enable Lazy Load is set to ON. Plugin and Theme developers can use the function to edit their image attribute so that a3 lazy load script can apply to the images.
* Dev - Defined 'a3_lazy_load_skip_classes' filter tag. Developers can add another class css name for images that they don't want lazy load applied too.
* Fix - Lazy Load does not apply to images added by shortcode, excluding the WordPress default [gallery] shortcode

= 1.0.0 - 2014/12/20 =
* First working release


== Upgrade Notice ==

= 1.8.2 =
Maintenance Update. 1 bug fix and 1 code tweak for compatibility with upcoming Major WordPress version 4.8.0

= 1.8.1 =
Maintenance Update. 1 bug fix causing afatal error from version 1.8.0 release yesterday

= 1.8.0 =
Feature Upgrade. 1 bug fix, 3 new features, 2 code updates for compatibility with WordPress v 4.7.5, PHP 7.0, Better AMP plugin and launch public Github Repo 

= 1.7.1 =
Maintenance Update. 2 Tweaks for full compatibility with WordPress major version 4.5

= 1.7.0 =
Feature Upgrade. Full compatibility with WordPress AMP. No settings for it - just auto. 3 other features, 3 code tweaks and 1 major Microsoft Browser bug fix

= 1.6.0 =
Feature Upgrade. 1 New Feature. Now support Lazy Loading elements within content that is loaded by AJAX plus full compat with WordPress v4.4.1 and WooCommerce v2.5 - be sure to clear caches, CDNs etc

= 1.5.2 =
Maintenance Update. 2 code tweaks and 2 bug fixes to correct lazy load not showing WordPress v 4.4 Responsive Images in legacy and mobile browsers, should flush the cached if site have installed cache plugin

= 1.5.1 =
Maintenance Update. 2 Tweaks and 1 bug fix for themes that use loop code, or where 3rd party scripts add name to property attributes

= 1.5.0 =
Feature Upgrade. 2 new features plus 1 bug fix and tweaks for full compatibility with WordPress major Version 4.4

= 1.4.1 =
Major Maintenance Upgrade. 5 Code Tweaks plus 2 bug fixes for full compatibility with WordPress v 4.3.0

= 1.4.0 =
Major Feature Upgrade. Massive admin panel UI and UX upgrade. Includes 5 new features, 3 Tweaks, 1 bug fix plus full compatibility with WooCommerce Version 2.3.11

= 1.3.0 =
Feature Upgrade. New Image Loading Threshold feature. Set threshold in pixel that images will start to load before they reach the viewport.

= 1.2.2 =
Important Maintenance Upgrade. 2 x major a3rev Plugin Framework Security Hardening Tweaks

= 1.2.1 =
Maintenance Upgrade. 1 bug fix for dynamic stylesheets loaded over secure https protocol.

= 1.2.0 =
Feature Upgrade. Added support for Lazy Load images in Tabbed content without having to scroll, also a file permissions tweak plus full compatibility with WordPress 4.2.2

= 1.1.1 =
Maintenance upgrade. Code tweaks for full compatibility with WordPress 4.2.0 and WooCommerce 2.3.8

= 1.1.0 =
Major version release. Added support for WordPress Embeds - Youtube, Vimeo, HTML5 video and iframe content from all sources.

= 1.0.2 =
Upgrade now for an a3 Portfolio plugin compatibility code tweak and a new Dev parameter and exclude class.

= 1.0.1 =
Upgrade your plugin now for apply lazy load to shortcodes fix plus plus a new developer function and class.
