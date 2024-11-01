<?php
/*
Plugin Name: WP News Sliders
Plugin URI: http://codeaffairs.com
Description: WordPress newscast slider plugin. Show your main news and sub news in slider. Red, Green, Blue or Grey theme option.
Version: 1.0
Author: Ugur CELIK
Author URI: info@codeaffairs.com
License: A "Slug" license name e.g. GPL2
*/

// Prevents direct file access
if(!defined('WPINC')){
    die();
}

/* Defines */
define('CA_WNS_PLUGIN_SECURITY',1);
define('CA_WNS_PLUGIN_VERSION',1.0);
define('CA_WNS_PLUGIN_URL',plugin_dir_url( __FILE__ ));
define('CA_WNS_PLUGIN_PATH',plugin_dir_path(__FILE__));
define('CA_WNS_COMMON_PATH',CA_WNS_PLUGIN_PATH.'common/');
define('CA_WNS_ADMIN_PATH',CA_WNS_PLUGIN_PATH.'admin/');
define('CA_WNS_FRONT_PATH',CA_WNS_PLUGIN_PATH.'front/');
define('CA_WNS_THEMES_PATH',CA_WNS_PLUGIN_PATH.'front/themes/');
define('CA_WNS_THEMES_URL',CA_WNS_PLUGIN_URL.'front/themes/');

/* Load the files */
require_once(CA_WNS_COMMON_PATH.'news-slider-load-files.php');

/*Register Activation and Deactivation Hook*/
function registerOptions(){
    update_option('news_slider_main_category', 'not_selected');
    update_option('news_slider_main_news_number', '10');
    update_option('news_slider_sub_category', 'not_selected');
    update_option('news_slider_sub_news_number', '5');
    update_option('news_slider_theme', 'Grey.css');
    update_option('news_slider_bootstrap_files', '1');
    update_option('news_slider_max_width', '750');
    update_option('news_slider_max_height', '300');
}
register_activation_hook(__FILE__ , 'registerOptions');
register_deactivation_hook(__FILE__ , ['newsSlider' , 'deleteOptions']);

/* Load Admin Class*/
new newsSliderAdmin();

/* Load Front Class*/
new newsSliderFront();



