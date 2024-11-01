<?php
if(!defined('CA_WNS_PLUGIN_SECURITY')){
    die();
}

final class newsSliderAdmin extends newsSlider {
    public function __construct(){
        add_action('admin_menu',[$this,'menuItem']);
        add_action('admin_enqueue_scripts',[$this,'registerJs']);
        add_action('admin_enqueue_scripts',[$this,'registerCss']);
        add_action('wp_ajax_save_news_slider_options',[$this,'saveOptions']);
    }
    
    public function menuItem(){
        add_menu_page('Wp News Slider','Wp News Sliders','manage_options','wp-news-sliders',[$this,'loadNewsSliderAdminPage'],'dashicons-welcome-write-blog');
    }
    
    public function loadNewsSliderAdminPage(){
        $categories = get_categories([
            'orderby' => 'name',
            'order'   => 'ASC'
            ]);
        $themes = $this->getThemeList();
        $options = [
            'news_slider_main_category' => get_option('news_slider_main_category'),
            'news_slider_main_news_number' => get_option('news_slider_main_news_number'),
            'news_slider_sub_category' => get_option('news_slider_sub_category'),
            'news_slider_sub_news_number' => get_option('news_slider_sub_news_number'),
            'news_slider_theme' => get_option('news_slider_theme'),
            'news_slider_bootstrap_files' => get_option('news_slider_bootstrap_files'),
            'news_slider_max_width' => get_option('news_slider_max_width'),
            'news_slider_max_height' => get_option('news_slider_max_height'),
        ];
        
        include_once(CA_WNS_ADMIN_PATH.'news-slider-admin-view.php');
    }

    public function registerJs(){
        wp_enqueue_script('admin_js',CA_WNS_PLUGIN_URL.'admin/js/news-slider-admin.js');
    }

    public function registerCss(){
        wp_register_style('admin_css',CA_WNS_PLUGIN_URL.'admin/css/news-slider-admin.css');
        wp_enqueue_style('admin_css');
    }

    public function saveOptions(){
        $options = array_column($_POST['data'],'value','name');
        update_option('news_slider_main_category',sanitize_text_field((string)$options['news_slider_main_category']));
        update_option('news_slider_main_news_number',sanitize_text_field((int)$options['news_slider_main_news_number']));
        update_option('news_slider_sub_category',sanitize_text_field((string)$options['news_slider_sub_category']));
        update_option('news_slider_sub_news_number',sanitize_text_field((int)$options['news_slider_sub_news_number']));
        update_option('news_slider_theme',sanitize_text_field((string)$options['news_slider_theme']));
        update_option('news_slider_bootstrap_files',sanitize_text_field((int)$options['news_slider_bootstrap_files']));
        update_option('news_slider_max_width',sanitize_text_field((int)$options['news_slider_max_width']));
        update_option('news_slider_max_height',sanitize_text_field((int)$options['news_slider_max_height']));
        print_r($options);
    }
}