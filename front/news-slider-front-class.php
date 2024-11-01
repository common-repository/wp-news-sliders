<?php
if(!defined('CA_WNS_PLUGIN_SECURITY')){
    die();
}

final class newsSliderFront extends newsSlider{
    
    public function __construct(){
        add_shortcode('newsslider',[$this,'newsSliderShortcode']);
        add_action('wp_enqueue_scripts',[$this,'loadBootstrapFiles']);
        add_action('wp_enqueue_scripts',[$this,'loadThemes']);
    }

    public function newsSliderShortcode($atts){
        $args = [
            'category' => get_option('news_slider_main_category'),
            'order' => 'DESC',
            'posts_per_page' => get_option('news_slider_main_news_number')
        ];
        $posts = get_posts($args);
        
        $args = [
            'category' => get_option('news_slider_sub_category'),
            'order' => 'DESC',
            'posts_per_page' => get_option('news_slider_sub_news_number')
        ];
        $sub_posts = get_posts($args);
        
        $max_width = get_option('news_slider_max_width');
        $max_height = get_option('news_slider_max_height');
        
        include_once(CA_WNS_FRONT_PATH.'news-slider-front-view.php');
    }
    
}