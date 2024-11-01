<?php
if(!defined('CA_WNS_PLUGIN_SECURITY')){
    die();
}

class newsSlider {

    public function deleteOptions(){
        delete_option('news_slider_main_category');
        delete_option('news_slider_main_news_number');
        delete_option('news_slider_sub_category');
        delete_option('news_slider_sub_news_number');
        delete_option('news_slider_theme');
        delete_option('news_slider_bootstrap_files');
        delete_option('news_slider_max_width');
        delete_option('news_slider_max_height');
    }

    public function loadBootstrapFiles(){
        $selected_files = get_option('news_slider_bootstrap_files');
        if($selected_files == 1){
            wp_enqueue_script('jquery');
            wp_enqueue_script('bootstrap-js', CA_WNS_PLUGIN_URL.'front/js/bootstrap.min.js');
            wp_enqueue_style('bootstrap',CA_WNS_PLUGIN_URL.'front/css/bootstrap.min.css');
        }
        elseif($selected_files == 2){
            wp_enqueue_script('bootstrap-js', CA_WNS_PLUGIN_URL.'front/js/bootstrap.min.js');
            wp_enqueue_style('bootstrap',CA_WNS_PLUGIN_URL.'front/css/bootstrap.min.css');
        }
        else{
            return;
        }
        return;
    }


    public function loadThemes(){
        wp_enqueue_style('mainstyle',CA_WNS_PLUGIN_URL.'front/css/MainStyle.css');
        wp_enqueue_style('theme',CA_WNS_THEMES_URL.get_option('news_slider_theme'));
    }

    public function getThemeList(){
        return array_diff(scandir(CA_WNS_THEMES_PATH),['.','..']);
    }

}