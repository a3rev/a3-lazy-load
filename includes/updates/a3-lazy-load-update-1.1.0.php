<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

$a3l_global_settings = get_option('a3_lazy_load_global_settings', array() );
$a3l_global_settings['a3l_apply_lazyloadxt'] = $a3l_global_settings['a3l_apply_to_loadimages'];

$a3l_global_settings['a3l_apply_to_images'] = $a3l_global_settings['a3l_apply_to_loadimages'];
$a3l_global_settings['a3l_apply_image_to_content'] = $a3l_global_settings['a3l_apply_to_content'];
$a3l_global_settings['a3l_apply_image_to_textwidget'] = $a3l_global_settings['a3l_apply_to_textwidget'];
$a3l_global_settings['a3l_apply_image_to_postthumbnails'] = $a3l_global_settings['a3l_apply_to_postthumbnails'];
$a3l_global_settings['a3l_apply_image_to_gravatars'] = $a3l_global_settings['a3l_apply_to_gravatars'];
$a3l_global_settings['a3l_skip_image_with_class'] = $a3l_global_settings['a3l_skip_image_with_class'];

$a3l_global_settings['a3l_apply_to_videos'] = $a3l_global_settings['a3l_apply_to_loadimages'];
$a3l_global_settings['a3l_apply_video_to_content'] = $a3l_global_settings['a3l_apply_to_content'];
$a3l_global_settings['a3l_apply_video_to_textwidget'] = $a3l_global_settings['a3l_apply_to_textwidget'];
$a3l_global_settings['a3l_skip_video_with_class'] = $a3l_global_settings['a3l_skip_image_with_class'];

update_option('a3_lazy_load_global_settings', $a3l_global_settings);