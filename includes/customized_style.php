<style type="text/css">
<?php
global $a3_lazy_load_global_settings;

$a3l_effect_background = '#ffffff';

if( isset($a3_lazy_load_global_settings['a3l_effect_background'])){
	$a3l_effect_background = $a3_lazy_load_global_settings['a3l_effect_background'];
}

echo '
.lazy-hidden,.entry img.lazy-hidden, img.thumbnail.lazy-hidden {
    background-color:'.$a3l_effect_background.';
}';
?>
</style>