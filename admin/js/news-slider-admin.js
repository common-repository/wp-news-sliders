jQuery(document).ready(function ($) {
    console.log("Wellcome to News Slider Plugin")
    $("#news-slider-options").on('click',".news-slider-save",function () {
        console.log("saving...");
        var formValues = $("#news-slider-options").serializeArray();
        var data = {
            'action' : 'save_news_slider_options',
            'data' : formValues
        };
        $.post(ajaxurl,data,function (response) {
            console.log("Settings Saved");
            $('#news-slider-saved').fadeIn(500);
            $('#news-slider-saved').fadeOut(2000);
        });
    });
    $("#news-slider-options").on('click',".news-slider-preview",function () {
        console.log("Showing Preview...");
    });
});