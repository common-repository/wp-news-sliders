<?php
if(!defined('CA_WNS_PLUGIN_SECURITY')){
    die();
}

/* @var $posts  \wp-content\plugins\wp-news-slider\front\news-slider-front-class.php newsSliderShortcode() */
/* @var $max_width  \wp-content\plugins\wp-news-slider\front\news-slider-front-class.php newsSliderShortcode() */
/* @var $max_height  \wp-content\plugins\wp-news-slider\front\news-slider-front-class.php newsSliderShortcode() */
/* @var $sub_posts  \wp-content\plugins\wp-news-slider\front\news-slider-front-class.php newsSliderShortcode() */
?>
<div class="row">
    <div class="col-sm-8">
        <div id="myCarousel" class="carousel slide newsslider" style="max-width:<?php echo $max_width;?>px; max-height: <?php echo $max_height?>px;" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php
                $x=0;
                foreach($posts as $post):
                    if($x > 11)
                        continue;
                    ?>
                    <div class="item <?php if($x==0) echo 'active';?>">
                        <a href="<?php echo $post->guid;?>"><?php echo get_the_post_thumbnail($post->ID,'large');?></a>
                        <div class="carousel-caption">
                            <h3><?php echo $post->post_title;?></h3>
                        </div>
                    </div>
                    <?php $x++;
                endforeach;
                ?>

            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <ul class="newsslider-pager" style="max-width:<?php echo $max_width;?>px;">
            <?php
            $x=0;
            foreach($posts as $post):
                if($x > 11)
                    continue;
                ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $x;?>" <?php if($x==0) echo 'class="active"';?>><?php echo $x+1;?></li>
                <?php $x++; ?>
            <?php endforeach;?>
        </ul>
    </div>
    <div class="col-sm-4">
        <div class="sub-news-container" style="max-height: <?php echo $max_height+30?>px;">
        <?php foreach($sub_posts as $sub_post): ?>
                <div class="sub-new-container row">
                    <div class="news-img col-sm-6"><a href="<?php echo $sub_post->guid;?>"><?php echo get_the_post_thumbnail($sub_post->ID,['250','150']);?></a></div>
                    <div class="news-title  col-sm-6"><h4><?php echo $sub_post->post_title;?></h4></div>
                </div>
        <?php endforeach; ?>
        </div>
    </div>
</div>

