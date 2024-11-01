<?php
if(!defined('CA_WNS_PLUGIN_SECURITY')){
    die();
}

/* @var $categories  wp-content\plugins\wp-news-slider\admin\news-slider-admin-class.php loadNewsSliderAdminPage() */
/* @var $themes  wp-content\plugins\wp-news-slider\admin\news-slider-admin-class.php loadNewsSliderAdminPage() */
/* @var $options  wp-content\plugins\wp-news-slider\admin\news-slider-admin-class.php loadNewsSliderAdminPage() */
?>
<div class="news-slider-container">
    <h3>Wp News Sliders</h3>
    <form id="news-slider-options">
        <table class="">
            <tr>
                <td>Main Category</td>
                <td>:</td>
                <td>
                    <select name="news_slider_main_category">
                        <option value="not_selected">Please Select</option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->cat_ID;?>" <?php if($options['news_slider_main_category'] == $category->cat_ID) echo 'selected'; ?>><?php echo $category->cat_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Number of Main News</td>
                <td>:</td>
                <td><input type="number" name="news_slider_main_news_number" max="15" min="2" value="<?php echo $options['news_slider_main_news_number']?>"></td>
            </tr>
            <tr>
                <td>Sub Category</td>
                <td>:</td>
                <td>
                    <select name="news_slider_sub_category">
                        <option value="not_selected">Please Select</option>
                        <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->cat_ID;?>" <?php if($options['news_slider_sub_category'] == $category->cat_ID) echo 'selected'; ?>><?php echo $category->cat_name;?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Number of Sub News</td>
                <td>:</td>
                <td><input type="number" name="news_slider_sub_news_number" max="15" min="1" value="<?php echo $options['news_slider_sub_news_number']?>"></td>
            </tr>
            <tr>
                <td>Slider Theme</td>
                <td>:</td>
                <td>
                    <select name="news_slider_theme">
                        <option value="not_selected">Please Select</option>
                        <?php foreach($themes as $theme): ?>
                            <option value="<?php echo $theme;?>" <?php if($options['news_slider_theme'] == $theme) echo 'selected'; ?>><?php echo explode('.',$theme)[0];?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Load Bootstrap Files</td>
                <td>:</td>
                <td>
                    <select name="news_slider_bootstrap_files">
                        <option value="1" <?php if($options['news_slider_bootstrap_files'] == 1) echo 'selected'; ?>>Bootstrap and jQuery</option>
                        <option value="2" <?php if($options['news_slider_bootstrap_files'] == 2) echo 'selected'; ?>>Just Bootstrap</option>
                        <option value="0" <?php if($options['news_slider_bootstrap_files'] == 0) echo 'selected'; ?>>Don't Load Anything</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Max Width</td>
                <td>:</td>
                <td><input type="number" name="news_slider_max_width"  min="100" max="2500" value="<?php echo $options['news_slider_max_width']?>"></td>
            </tr>
            <tr>
                <td>Max Height</td>
                <td>:</td>
                <td><input type="number" name="news_slider_max_height"  min="100" max="2500" value="<?php echo $options['news_slider_max_height']?>"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <!--<button type="button" class="news-slider-preview button-secondary">Preview</button>-->
                    <button type="button" class="news-slider-save button-primary">Save</button>
                    <span id="news-slider-saved" style="display: none">Settings Saved!</span>
                </td>
            </tr>
        </table>
    </form>

    <p><strong> Notice: </strong> Please use the <strong> [newsslider] </strong> shortcode in your post. </p>
</div>