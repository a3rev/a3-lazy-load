=== a3 Lazy Load ===
Contributors: a3rev, a3rev Software, nguyencongtuan
Tags: a3 lazy load, Lazy Loading, image lazy load, lazyload
Requires at least: 4.9
Tested up to: 5.6
Stable tag: 2.4.2
License: GPLv3
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Use a3 Lazy Load for images, videos, iframes. Instantly improve your sites load time and dramatically improve site users experience.

== DESCRIPTION ==

a3 Lazy Load is a Mobile Oriented, very simple to use plugin that will speed up sites page load speed. The more content heavy your site the better the plugin will perform and the more you will see the improvements in performance. See [this demo](http://ressio.github.io/lazy-load-xt/demo/stresstest1000img.htm) of a page with 1,000 images (yes 1,000 images) to load.

a3 Lazy Load is inspired by and powered by the ressio [Lazy-Load-xt JavaScript](https://github.com/ressio/lazy-load-xt).

a3 Lazy Load is the most fully featured, incredibly easy to set up lazy load plugin for WordPress. Use the plugins admin settings to easily define what elements are lazy loaded and when they become visible in the users browser. As the user scrolls down the page the next lot of elements you have applied lazy Load to are only loaded as they become visible in the view port.

= 100% COMPATABLE WITH WORDPRESS 5.5 =

WordPress 5.5 introduced lazy loading for all images uploaded to a site’s media library. a3 Lazy Load Image options work side-by-side with this, but then enhances it by lazy loading all the images loaded from outside of the media library or on older browsers that do not support the new WP attribute. 

= IMAGE LAZY LOAD =

Images are the number one element that slows page load and increases bandwidth use. From the a3 Lazy Load admin panel turn load images by a3 Lazy Load ON | OFF. For more flexibility when ON you can choose to ON | OFF lazy load for images in

* Post, Pages and Custom Post Types (All Content areas)
* Widgets (Sidebar, header and footer)
* Apply to post thumbnails
* Apply to gravatars

= HORIZONTAL SCROLL =

Supports lazy loading of images in containers that use horizontal scroll. The admin Images options has a section where you enter the classname or ID of the container that uses horizontal scroll.

= MORE THAN JUST IMAGES =

= VIDEO LAZY LOAD =

a3 Lazy Load supports all WordPress video Embeds including Youtube, Vimeo and HTML5 video - for a full list see the [WordPress Codex Embeds](http://codex.wordpress.org/Embeds) list. The WordPress embed method of copying and pasting the video url into posts and pages content area is fully supported. 

<strong>Note</strong> - Works with Videos added by Text and HTML Widgets but not the new WordPress Video widget. That widget does not pull iframe at first load, it uses JavaScript to replace html to iframe and hence a3 lazy Load can't see it to apply.  

From the a3 lazy Load admin panel turn Video Support ON | OFF. When ON you can choose to ON | OFF lazy load for videos in

* Video embeded by URL in Post and Pages (All Content areas)
* Video in Widget types, Text Widget and HTML Widgets.
* Youtube [see demo](http://ressio.github.io/lazy-load-xt/demo/youtube-iframe.htm)
* Video [see demo](http://ressio.github.io/lazy-load-xt/demo/video-html5.htm)
* Fully Compatible with the popular [Youtube Embed Plugin](https://wordpress.org/plugins/youtube-embed/)

= iFRAME LAZY LOAD =

a3 Lazy Load has built in support for content that is added by iframe from any source in content and widgets. Examples

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

= JETPACK SITE ACCELERATOR (Photon) =

This is an option that you turn on as the Jetpack Accelerator (Photon CDN images) has its own lazy load feature that needs to be OFF first to be able use a3 Lazy Load as your lazy Load engine. Some users prefer to use a3 Lazy Load as it applies Lazy Load to videos and iframes as well as images.

= WebP IMAGES =

a3 Lazy Load has built in automatic support for WebP images. There are no settings for this as a3 Lazy Load will automatically detect if an image has a WebP version and lazy load the WebP version. If no WebP image exists, the appropriate jpg or png version will be lazy loaded. Also fully support browser detection of WebP.


= LAZY LOAD EFFECTS =

a3 Lazy Load gives you the option to lazy load images with a FADE IN or SPINNER effect

* FADEIN [see demo](http://ressio.github.io/lazy-load-xt/demo/fadein.htm)
* SPINNER [see demo](http://ressio.github.io/lazy-load-xt/demo/spinner.htm)
* Option to create a custom Lazy Load pre-load background colour


= PERFORMANCE TWEAKS =

a3 Lazy Load gives you the option to load its script from your sites HEAD or from the FOOT.

* Note that your theme must have the wp_footer() function if you select FOOTER load.
* Note the plugin CSS is always loaded from the HEAD.

= EXCLUDE IMAGES & VIDEO =

a3 Lazy Load allows you to easily exclude any image or video by class name from having the Lazy Load effect applied. [See FAQ's](https://wordpress.org/plugins/a3-lazy-load/#faq-header) 

= JAVASCIPT DISABLED FALLBACK =

a3 Lazy Load has built in Noscript fallback if user has JavaScript turned off in their browser. Developers who use underscore.js in their applications can use the Noscript parameter to exclude their plugins content from Lazy Load.

= THEME & PLUGIN COMPATIBILITY =

a3 Lazy Load works with any WordPress theme that follows the WordPress Theme Codex. However, many Theme & Plugin developers will use a custom written function to add objects, example the theme has a home page with layout created by a custom function they have written. a3 Lazy Load cannot know what these functions are and so cannot apply to the objects loaded by that custom function.

If your images or objects not being Lazy Loaded in a certain section of your site, but are Lazy Loaded everywhere else you will know this is the cause. Please if this happens raise a support ticket with the developer, explaining that they just need to add a simple tag to their custom functions so that a3 Lazy Load apply to their custom function and be fully compatible. [Here is a list](https://wordpress.org/plugins/a3-lazy-load/#faq-header) of a3 lazy Load filter tags to include in your ticket to make it easy for the developer.

Don't forget when a developer does add full compatibility with a3 Lazy Load please let us know via a support ticket on this forum and we will add them to the list below.

These are just some of the more popular plugins that are either tested 100% compatible with a3 Lazy Load or tags has been added for 100% compatibility.   

* Plugin - Advanced Custom Fields (Free and Premium)
* Plugin - WooCommerce
* Plugin - JetPack
* Plugin - Elementor (Free and Pro)
* Plugin - WP Offload
* Plugin - WP Super Cache, W3 Total Cache, Autoptimize
* Plugin - Youtube Embed
* Plugin - WordPress AMP
* Plugin - WPTouch. Note - Set to not apply on Mobiles if WPTouch is installed
* Plugin - MobilePress - Set to not apply on Mobiles if MobilePress is installed
* WebP Plugins - Smush, EWWW Image Optimizer, Imagify, WebP Express 
* Plugins - Will not conflict with any plugin that has lazy load built in
* CDN's - JetPack Accelerator, Cloudfront, Cloudflare and all other known CDN architecture.

= MORE FEATURES =

* Full support of jQueryMobile framework
* WordPress Multi site ready.
* Backend support for RTL display.
* Translation ready

= JOIN THE a3 LAZY LOAD COMMUNITY =

When you download a3 lazy Load, you join our community. Regardless of if you are a WordPress newbie or experienced developer if you are interested in contributing to a3 Lazy Load development head over to the [a3 Lazy Load GitHub Repository](https://github.com/a3rev/a3-lazy-load) to find out how you can contribute.
Want to add a new language to a3 Lazy Load? Great! You can contribute via [translate.wordpress.org](https://translate.wordpress.org/projects/wp-plugins/a3-lazy-load)


== Installation ==
 
= Minimum Requirements =

* WordPress 4.9 or greater
* PHP version 7.0.0 or greater
* MySQL version 5.6 or greater OR MariaDB version 10.0 or greater

== Frequently Asked Questions ==

= How do I exclude individual objects from Lazy Load? =

Images, Videos / iframes can be excluded from Lazy Load by existing classnames or if none exist exclusions can be done manually via exclusion <code>skip-lazy</code> classname or <code>data-skip-lazy</code> attribute. Examples
Exclude by classname <code>&#x3C;img class="skip-lazy"&#x3E; , &#x3C;video class="skip-lazy"&#x3E;</code>
Exclude by attribute <code>&#x3C;img data-skip-lazy&#x3E; , &#x3C;video data-skip-lazy&#x3E;</code>

= Why are some images, videos, objects not Lazy Loaded? =

a3 Lazy Load can only be applied to objects that are added using core WordPress functions. If your theme or a plugin developer adds objects such as images or videos via a custom written function, a3 lazy Load cannot know what that custom function is and hence cannot Lazy Load the object.

So if you see object not being lazy loaded please check first if those objects are loaded by the theme or a plugin. If they are, you can be confident that they are loaded by a custom function. 

If this is the case, please help yourself and other a3 lazy Load users by raising a support ticket with the developer and ask them to add an a3 Lazy Load filter tag to their function to allow a3 Lazy Load to find it and apply to the object. 

Below is a list of available a3 Lazy Load filters to use and pass onto the developer.

= Filter tags to apply lazy load =

Apply lazy load for images in content.
<code>a3_lazy_load_images</code> 
Example:
<code>apply_filters( 'a3_lazy_load_images', $your_content, null );</code>

Apply lazy load for videos and iframe from content.
<code>a3_lazy_load_videos</code> 
Example:
<code>apply_filters( 'a3_lazy_load_videos', $your_content, null );</code>

Apply lazy load for all images, videos and iframe from content
<code>a3_lazy_load_html</code>
Example:
<code>apply_filters( 'a3_lazy_load_html', $your_content, null );</code>

= Filter Tags to Exclude by Theme Class name =

Filter tags to add to class name of theme to exclude lazy load on images or videos.
<code>a3_lazy_load_skip_images_classes</code>
<code>a3_lazy_load_skip_videos_classes</code>


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

= 2.4.2 - 2020/12/08 =
* This maintenance release has tweaks and bug fixes for compatibility with WordPress major version 5.6, PHP 7.4.8 and WooCommerce 4.7.1
* Tweak - Test and Tweak for compatibility with PHP 7.4.8
* Tweak - Test for compatibility with WordPress 5.6
* Tweak - Test for compatibility with WooCommerce 4.7.1
* Fix - Attached ajaxComplete to document instead of window
* Fix - Replace old isFunction by typeof check function

= 2.4.1 - 2020/08/17 =
* This maintenance release resolves a conflict with jQuery helper plugin and WordPress 5.5
* Fix - Update plugin framework script, remove jQuery.browser is deprecated to resolve conflict with jQuery Migrate Helper plugin

= 2.4.0 - 2020/08/08 =
* This feature release has full compatibility with WP 5.5 core image lazy loading. Just Update and a3 Lazy Load will work side-by-side with the WP core image lazy load. No settings to update and a3 lazy load will enhance it by lazy loading images the new core feature misses and on older browsers that do not support the new feature.  
* Feature - Full compatibility with WordPress 5.5 core image lazy load feature
* Tweak - Test for compatibility with WordPress 5.5
* Tweak - Test for compatibility with WooCommerce 4.3.1
* Tweak - Update plugins description with notes about WP 5.5 compatibility
* Tweak - Update plugins Image Options help text about WP 5.5 compatibility

= 2.3.3 - 2020/07/17 =
* This maintenance release is compatibility with WordPress 5.4.2 and a bug fix for a conflict with the latest version 4.3 of WooCommerce
* Tweak - Test for compatibility with WordPress 5.4.2
* Tweak - Test for compatibility with WooCommerce 4.3.0
* Fix - Support lazy load for WC Product Images

= 2.3.2 - 2020/03/17 =
* This maintenance release has compatibility for WordPress 5.4, WooCommerce 4.0, full compliance with WordPress PHP coding standards plus a typo fix.
* Tweak - Test for compatibility with WordPress 5.4
* Tweak - Test for compatibility with WooCommerce 4.0
* Tweak - Run Tavis CI unit build tests for PHP compatibility issues with PHP 7.0 to 7.4
* Tweak - Update Jetpack Photon typo

= 2.3.1 - 2020/02/29 =
* This maintenance release contains various PHP code updates to resolve PHP warnings and depreciations in PHP 7.0 to 7.4 
* Fix - Update global ${$this- to $GLOBALS[$this to resolve 7.0+ PHP warnings
* Fix - Update global ${$option} to $GLOBALS[$option] to resolve 7.0+ PHP warnings
* Fix - Update less PHP lib that use square brackets [] instead of curly braces {} for Array , depreciated in PHP 7.4
* Fix - Validate for do not use get_magic_quotes_gpc function for PHP 7.4

= 2.3.0 - 2020/02/25 =
* This feature release adds support for horizontal scroll images plus a bug fix for compatibility with Revolution Slider
* Feature - Add support for lazy loading images in a container that have horizontal scroll
* Feature - Add Horizontal Scroll section to the Lazy Load Images option box on the admin panel
* Feature - Apply Horizontal Scroll lazy load to any container by classname or ID
* Fix - Compatibility with Revolution slider. Their JS has changed in a resent update causing a conflict which meant that the slider images did not show with a3 Lazy Load activated.

= 2.2.2 - 2020/01/18 =
* This maintenance release is to update incorrect help text regarding usage of the new class and attribute exclusion strings
* Tweak - Update incorrect FQA help text on plugins description
* Tweak - Update admin panel option box image and video exclusion class and attribute help text.

= 2.2.1 - 2020/01/16 =
* This maintenance release adds support for the Lazy Load exclusion attribute 'data-skip-lazy'
* Tweak - Add support for lazy load exclusion by attribute 'data-skip-lazy'
* Tweak - Update the plugins readme description about support for exclusion attribute
* Tweak - Update plugins admin Image and Video options boxes with help text about exclusion by attribute

= 2.2.0 - 2020/01/13 =
* This feature release completes the full refactor (frontend and backend) of the plugins PHP to Composer plus introduces new standardized skip-lazy exclusion class with backward compatibility support for a3-notlazy class
* Feature - Plugin Framework fully refactored to Composer for cleaner code and faster PHP code
* Tweak - Update plugin for compatibility with new version of plugin Framework
* Dev - Add standardized skip-lazy exclusion class thanks to Frank Goossens for initiating this.
* Dev - Retain backward compatibility support for old a3-notlazy class for existing users
* Tweak - Add using new skip-lazy class instructions to the plugins admin menus
* Tweak - Update the plugins description FQAs about the skip-lazy class

= 2.1.0 - 2020/01/02 =
* This feature release adds support for WebP images (this support is automatic there are no settings for it), plus compatibility with WordPress 5.3.2
* Feature - Add auto support WebP images 
* Tweak - Update lazyloadxt.srcset for WebP image support
* Tweak - Update lazy style for WebP image support
* Tweak - Test for compatibility with WordPress 5.3.2

= 2.0.0 - 2019/11/19 =
* This feature release has a lot. PHP is upgraded to Composer PHP Dependency Manager, Compatibility with Jetpack Accelerator, a full security review, and compatibility with with WordPress 5.3.0
* Feature - Plugin fully refactored to Composer for cleaner and faster PHP code
* Feature - Add Jetpack Accelerator (Photon CDN images) compatibility. Props [@ KZeni](https://github.com/KZeni)
* Tweak - Define new option box so that you can turn ON|OFF Jetpack Compatibility
* Tweak - Remove the hard coded PHP error_reporting display errors false from compile sass to css
* Tweak - Test for compatibility with WordPress 5.3.0
* Tweak - Support for backward compatibility for 3rd party plugin use some functions from old class A3_Lazy_Load
* Tweak - Allow the "skip" class to have single or double quotes. Props [@joneslloyd](https://github.com/joneslloyd)
* Dev - Support new filter tag 'a3_lazy_load_placeholder_url' for change value of placeholder_url Props [@joneslloyd](https://github.com/joneslloyd)
* Dev - Support new filter tag 'a3_lazy_load_iframe_placeholder_url' for change value of iframe_placeholder_url
* Dev - Replace file_get_contents with HTTP API wp_remote_get
* Dev - Ensure that all inputs are sanitized and all outputs are escaped

= 1.9.3 - 2019/06/29 =
* This is a maintenance upgrade to fix a potentially fatal error conflict with sites running PHP 7.3 plus compatibility with WordPress 5.2.2
* Fix - PHP warning continue targeting switch is equivalent to break for compatibility on PHP 7.3

= 1.9.2 - 2019/01/02 =
* This maintenance update is for compatibility with WordPress 5.0.2 and PHP 7.3. It also includes performance updates to the plugin framework.
* Tweak - Test for compatibility with WordPress 5.0.2 and WordPress 4.9.9
* Tweak - Create new structure for future development of Gutenberg Blocks
* Framework - Performance improvement.  Replace wp_remote_fopen  with file_get_contents for get web fonts
* Framework - Performance improvement. Define new variable `is_load_google_fonts` if admin does not require to load google fonts
* Credit - Props to Derek for alerting us to the framework google fonts performance issue
* Framework - Register style name for dynamic style of plugin for use with Gutenberg block
* Framework - Update Modal script and style to version 4.1.1
* Framework - Update a3rev Plugin Framework to version 2.1.0
* Framework - Test and update for compatibility with PHP 7.3

= 1.9.1 - 2018/08/10 =
* This maintenance update resolves 2 issues from the v 1.9.0 upgrade
* Fix - Set min-width of placeholder to resolve any image tag that does not have width or height not showing the spinner effect. Example Gutenberg image block.
* Fix - Update Lazy Load extra script to resolve duplicated call time for images, iframe, videos on viewport

= 1.9.0 - 2018/08/06 =
* This feature upgrade is focused on adding a number of new options for excluding Lazy Load from sections of a site. Compatibility with WordPress 4.9.8, Gutenberg 3.4.0 and WooCommerce 3.4.4
* Feature - Add exclude from Lazy Load by URI
* Feature - Add exclude from Lazy Load by Page types
* Feature - Add support for using Wildcards in images and videos skipped classes
* Tweak - Upgrade lazyloadxt lib to latest version 1.1.0
* Tweak - Rename jquery.lazyloadxt.js to jquery.lazyloadxt.extra.js
* Tweak - Add new Exclude by URI's and Page Types Options box and help text
* Tweak - Test for compatibility with WordPress 4.9.8
* Tweak - Test for compatibility with WooCommerce 3.4.4
* Tweak - Test for compatibility with Gutenberg 3.4.0
* Fix - Make Skip Classes feature work when have entered it to that list
* Credit - Props to Kurt @AMPERAGE-Marketing for his contribution to this release

= 1.8.9 - 2018/06/04 =
* This Maintenance update has 2 code tweaks for compatibility with themes and plugins that load images via the wp_kses_post sanitizer as WooCommerce does since version 3.4.0 with widgets and on Cart page.
* Tweak - Append lazy attributes to attribute list of allowed post tags list so that lazy load can run on frontend when that content is output via wp_kses_post 
* Tweak - Add noscript tag to allowed post tags list to resolve duplicate image if that image is output via wp_kses_post
* Tweak - Test for compatibility with WooCommerce version 3.4.1

= 1.8.8 - 2018/05/26 =
* This maintenance update is for compatibility with WordPress 4.9.6 and the new GDPR compliance requirements for users in the EU 
* Tweak - Test for compatibility with WordPress 4.9.6
* Tweak - Check for any issues with GDPR compliance. None Found

= 1.8.7 - 2018/03/24 =
* Maintenance Update. 2 code tweaks to enhance the lazy loading of images, video and iframe added by third party shortcodes in the content
* Tweak - Increase lazy load filter priority value so that lazy load is applied to images loaded by the shortcode function do_shortcode 
* Tweak - Increase lazy load filter priority value so that lazy load is applied to video and iframe loaded by the shortcode function do_shortcode

= 1.8.6 - 2018/03/24 =
* Maintenance Update. 1 bug fix from this morning 1.8.5 major maintenance release. A small piece of new code in v 1.8.5 was written on PHP v7 and is not compatible with PHP version 5.6 If you are running v PHP 5.6 please run this update to fix it
* Fix - PHP Fatal Error Call instance a3_lazy_load instead of us $this is not an object caused by incompatibility with PHP version 5.6

= 1.8.5 - 2018/03/23 =
* Maintenance Update. Refactor of Lazy Load on Widgets, Full Compatibility with the Advanced Custom Fields plugin, optimization tweaks and 3 bug fixes.
* Refactor - Apply lazy load to all widgets instead of Text Widget and HTML widget from WordPress
* Refactor - Remove the code that hook to tag 'wp_get_attachment_image_attributes' which was required to add support for lazy load for [gallery] shortcode. Redundant after WP version 4.6.0 and now removed.
* Tweak - Add filter to acf_the_content tag for apply lazy load on the Content from ACF plugin. Kudos to @ondoheer for creating full compatibility with ACF Free and Premium version. 
* Tweak - Disable load new google fonts via API. Google fonts not used and saves 4 calls to database on each page load. Thanks to Robert Harm for reporting the issue
* Tweak - Optimized loading gif compression for even faster load. Thanks @jasom for the suggestion
* Tweak - Remove duplicate parameters from plugin scripts. Thanks to @galbaras for reporting the issue
* Tweak - Add new FAQs tab to plugins page with Add Lazy Load Tags to custom Function description and exclude Lazy Load Class name for easy reference.
* Tweak - Update plugins description
* Framework - Define filter tag for enable OR disable load new google fonts via API
* Framework - Update plugin framework to new version 2.0.3
* Fix - Turn Image in Widget OFF option which had stopped working. Thanks to @japenz and @dimitar-koev for reporting and confirming the bug
* Fix - If videos embed have preload=none do not call video load from a3 Lazy Load. Thanks to Celso Azevedo @celsoazevedo for an excellent bug report which enabled us to replicate the issue.
* Fix - Remove src with placeholder image url for iframe

= 1.8.4 - 2018/02/13 =
* Maintenance Update. Under the bonnet tweaks to keep your plugin running smoothly and is the foundation for new features to be developed this year 
* Framework - Update a3rev Plugin Framework to version 2.0.2
* Framework - Add Framework version for all style and script files
* Tweak - Update for full compatibility with a3rev Dashboard plugin
* Tweak - Test for compatibility with WordPress 4.9.4

= 1.8.3 - 2018/01/19 =
* Tweak - Tested for compatibility with WordPress 4.9.2
* Fix - Remove redirect to plugins admin panel when activate the plugin for the first time with WordPress 4.9.2

= 1.8.2 - 2017/06/02 =
* Tweak - Tested for compatibility with WordPress major version 4.8.0
* Tweak - Add Lazy Load support for new WordPress 4.8.0 Image, Video and Media widgets
* Tweak - Updated Skip Image Classes and Skip Video Classes help text for better clarity 
* Fix - WordPress Admin Tool Bar User Avatar conflict Issue #2

= 1.8.1 - 2017/05/31 =
* Fix - Use correct object A3_Lazy_Load instead of 'this' as it was causing a fatal error

= 1.8.0 - 2017/05/30 =
* Feature - Updated for compatibility with Better AMP plugin
* Feature - Launched a3Lazy Load Github public Repository
* Feature - WordPress Translation activation. Add text domain declaration in file header.
* Tweak - Change global $$variable to global ${$variable} for compatibility with PHP 7.0
* Tweak - Update a3 Revolution to a3rev Software on plugins description
* Tweak - Update plugin framework to latest version
* Tweak - Tested for full compatibility with WordPress version 4.7.5
* Tweak - Tested for full compatibility with PHP 7.0
* Fix - Exclude images by class

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

= 2.4.2 =
This maintenance release has tweaks and bug fixes for compatibility with WordPress major version 5.6, PHP 7.4.8 and WooCommerce 4.7.1

= 2.4.1 =
This maintenance release resolves a conflict with jQuery helper plugin and WordPress 5.5

= 2.4.0 =
This feature release has full compatibility with WP 5.5 core image lazy loading. Just Update and a3 Lazy Load will work side-by-side with the WP core image lazy load. No settings to update and a3 lazy load will enhance it by lazy loading images the new core feature misses and on older browsers that do not support the new feature.

= 2.3.3 =
This maintenance release is compatibility with WordPress 5.4.2 and a bug fix for a conflict with the latest version 4.3 of WooCommerce

= 2.3.2 =
This maintenance release has compatibility for WordPress 5.4, WooCommerce 4.0, full compliance with WordPress PHP coding standards plus a typo fix.

= 2.3.1 =
This maintenance release contains various PHP code updates to resolve PHP warnings and depreciations in PHP 7.0 to 7.4

= 2.3.0 =
This feature release adds support for horizontal scroll images plus a bug fix for compatibility with Revolution Slider

= 2.2.2 =
This maintenance release is to update incorrect help text regarding usage of the new class and attribute exclusion strings

= 2.2.1 =
This maintenance release adds support for the Lazy Load exclusion attribute 'data-skip-lazy'

= 2.2.0 =
This feature release completes the full refactor (frontend and backend) of the plugins PHP to Composer plus introduces new standardized skip-lazy exclusion class with backward compatibility support for a3-notlazy class

= 2.1.0 =
This feature release adds support for WebP images (this support is automatic there are no settings for it), plus compatibility with WordPress 5.3.2

= 2.0.0 =
This feature release has a lot. PHP is upgraded to Composer PHP Dependency Manager, Compatibility with Jetpack Accelerator, a full security review, and compatibility with with WordPress 5.3.0

= 1.9.3 =
* This is a maintenance upgrade to fix a potentially fatal error conflict with sites running PHP 7.3 plus compatibility with WordPress 5.2.2

= 1.9.2 =
This maintenance update is for compatibility with WordPress 5.0.2 and PHP 7.3. It also includes performance updates to the plugin framework.

= 1.9.1 =
This maintenance update resolves 2 issues from the v 1.9.0 upgrade

= 1.9.0 =
This feature upgrade is focused on adding a number of new options for excluding Lazy Load from sections of a site plus Compatibility with WordPress 4.9.8, Gutenberg 3.4.0 and WooCommerce 3.4.4

= 1.8.9 =
Maintenance update. This upgrade has 2 code tweaks for compatibility with themes and plugins that load images via the wp_kses_post sanitizer as WooCommerce does since version 3.4.0 with widgets and on Cart page.

= 1.8.8 =
Maintenance Update. Compatibility WordPress 4.9.6 and the new GDPR compliance requirements for users in the EU

= 1.8.7 =
Maintenance Update. 2 code tweaks to enhance the lazy loading of images, video and iframe added by third party shortcodes in the content

= 1.8.6 =
Maintenance Update. 1 bug fix from this morning 1.8.5 major maintenance release. A small piece of new code in v 1.8.5 was written on PHP v7 and is not compatible with PHP version 5.6 If you are running v PHP 5.6 please run this update to fix it

= 1.8.5 =
Maintenance Update. Refactor of Lazy Load on Widgets, Full Compatibility with the Advanced Custom Fields plugin, optimization tweaks and 3 bug fixes.

= 1.8.4 =
Maintenance Update. This version updates the Plugin Framework to v 2.0.2, adds full compatibility with a3rev dashboard and WordPress v 4.9.4

= 1.8.3 =
Maintenance Update. 1 redirect Bug fix on first activate on site with WordPress v4.9.2

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
