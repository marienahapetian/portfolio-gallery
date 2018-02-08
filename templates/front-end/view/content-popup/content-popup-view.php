<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<section id="huge_it_portfolio_content_<?php echo esc_attr($portfolioID); ?>"
         class=" portfolio-gallery-content <?php if ($portfolioShowSorting == 'on') {
             echo 'sortingActive ';
         }
         if ($portfolioShowFiltering == 'on') {
             echo 'filteringActive';
         } ?>"
         data-image-behaviour="<?php echo esc_attr($portfolio_gallery_get_options['portfolio_gallery_port_natural_size_contentpopup']); ?>">
    <div id="huge-it-container-loading-overlay_<?php echo esc_attr($portfolioID); ?>"></div>
    <?php if (($sortingFloatPopup == 'left' && $filteringFloatPopup == 'left') || ($sortingFloatPopup == 'right' && $filteringFloatPopup == 'right')) { ?>
    <div id="huge_it_portfolio_options_and_filters_<?php echo esc_attr($portfolioID); ?>">
        <?php } ?>
        <?php if ($portfolioShowSorting == "on") { ?>
            <div id="huge_it_portfolio_options_<?php echo esc_attr($portfolioID); ?>"
                 data-sorting-position="<?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_float"]); ?>">
                <ul class="sort-by-button-group clearfix">
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_default"] != ''): ?>
                        <li><a href="#sortBy=original-order" data-option-value="original-order" class="selected"
                               data><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_default"]); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_id"] != ''): ?>
                        <li><a href="#sortBy=load_date"
                               data-option-value="load_date"><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_id"]); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_name"] != ''): ?>
                        <li><a href="#sortBy=name"
                               data-option-value="name"><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_name"]); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_random"] != ''): ?>
                        <li id="random"><a data-option-value="random"
                                           href='#random'><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_random"]); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
                <ul id="port-sort-direction" class="option-set clearfix">
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_asc"] != ''): ?>
                        <li><a href="#sortAscending=true" data-option-value="true" data-option-key="number"
                               class="selected"><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_asc"]); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_desc"] != ''): ?>
                        <li><a href="#sortAscending=false" data-option-key="number"
                               data-option-value="false"><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_sorting_name_by_desc"]); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php }
        if ($portfolioShowFiltering == "on") { ?>
            <div id="huge_it_portfolio_filters_<?php echo esc_attr($portfolioID); ?>"
                 data-filtering-position="<?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_filtering_float"]); ?>">
                <ul>
                    <li rel="*">
                        <a><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_cat_all"]); ?></a>
                    </li>
                    <?php
                    $portfolioCats = explode(",", $portfolioCats);
                    foreach ($portfolioCats as $portfolioCatsValue) {
                        if (!empty($portfolioCatsValue)) {
                            ?>
                            <li rel=".<?php echo str_replace(" ", "_", $portfolioCatsValue); ?>">
                                <a><?php echo str_replace("_", " ", $portfolioCatsValue); ?></a></li>
                            <?php
                        }
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>
        <?php if (($sortingFloatPopup == 'left' && $filteringFloatPopup == 'left') || ($sortingFloatPopup == 'right' && $filteringFloatPopup == 'right')) { ?>
    </div>
<?php } ?>
    <div id="huge_it_portfolio_container_<?php echo esc_attr($portfolioID); ?>"
         class="huge_it_portfolio_container super-list variable-sizes clearfix view-<?php echo esc_attr($view_slug); ?>" <?php if ($sortingFloatPopup == "top" && $filteringFloatPopup == "top") {
        echo "style='clear: both;'";
    } ?> data-show-loading="<?php echo esc_attr($portfolioShowLoading); ?>"
         data-show-center="<?php echo esc_attr($portfolioposition); ?>">
        <?php
        foreach ($images as $key => $row) {
            $link = $row->sl_url;
            $descnohtml = strip_tags($row->description);
            $result = substr($descnohtml, 0, 50);
            $catForFilter = explode(",", $row->category);
            ?>
            <div id="huge_it_portfolio_pupup_element_<?php echo esc_attr($row->id); ?>_child"
                 class="portelement portelement_<?php echo esc_attr($portfolioID); ?>  <?php foreach ($catForFilter as $catForFilterValue) {
                     echo str_replace(" ", "_", $catForFilterValue) . " ";
                 } ?>" tabindex="0" data-symbol="<?php echo esc_attr($row->name); ?>"
                 data-category="alkaline-earth">
                <p style="display:none;" class="load_date"><?php echo esc_attr($row->huge_it_loadDate); ?></p>
                <p style="display:none;" class="number"><?php echo esc_attr($row->id); ?></p>
                <p style="display:none;" class="random"><?php echo esc_attr($row->id); ?></p>
                <div class="image-block image-block_<?php echo esc_attr($portfolioID); ?>">
                    <?php $imgurl = explode(";", $row->image_url); ?>
                    <?php if ($row->image_url != ';') {
                        switch (portfolio_gallery_youtube_or_vimeo_portfolio($imgurl[0])) {
                            case 'image': ?>
                                <img alt="<?php echo esc_attr($row->name); ?>"
                                     id="wd-cl-img<?php echo esc_attr($key); ?>"
                                     src="<?php if ($portfolio_gallery_get_options['portfolio_gallery_port_natural_size_contentpopup'] == 'resize') {
                                         echo esc_url(portfolio_gallery_get_image_by_sizes_and_src($imgurl[0], array(
                                             $portfolio_gallery_get_options['portfolio_gallery_ht_view2_element_width'],
                                             $portfolio_gallery_get_options['portfolio_gallery_ht_view2_element_height']
                                         ), false));
                                     } else {
                                         echo esc_url($imgurl[0]);
                                     } ?>"/>
                                <?php
                                break;
                            case 'youtube':
                                $videourl = portfolio_gallery_get_video_id_from_url($imgurl[0]); ?>
                                <img alt="<?php echo esc_attr($row->name); ?>"
                                     id="wd-cl-img<?php echo esc_attr($key); ?>"
                                     src="//img.youtube.com/vi/<?php echo esc_attr($videourl[0]); ?>/mqdefault.jpg"/>
                                <?php
                                break;
                            case 'vimeo':
                                $videourl = portfolio_gallery_get_video_id_from_url($imgurl[0]);
                                $hash = unserialize(wp_remote_fopen("https://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                $imgsrc = $hash[0]['thumbnail_large'];
                                ?>
                                <img alt="<?php echo esc_attr($row->name); ?>"
                                     src="<?php echo esc_attr($imgsrc); ?>"/>
                                <?php break;

                        }
                    } else { ?>
                        <img alt="<?php echo esc_attr($row->name); ?>" id="wd-cl-img<?php echo esc_attr($key); ?>"
                             src="images/noimage.jpg"/>
                        <?php
                    } ?>
                </div>

                <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_element_show_linkbutton"] == 'on' && $link != '') { ?>
                    <div class="button-block"><a
                                href="<?php echo esc_url($row->sl_url); ?>" <?php if ($row->link_target == "on") {
                            echo 'target="_blank"';
                        } ?> ><?php echo $portfolio_gallery_get_options["portfolio_gallery_ht_view2_element_linkbutton_text"]; ?></a>
                    </div>
                <?php } ?>

                <div class="image-overlay">
                    <a title="<?php echo esc_attr($row->name); ?>" href="#<?php echo esc_attr($row->id); ?>">
                        <svg aria-hidden="true" data-prefix="fal" data-icon="search" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-search fa-w-16" style="font-size: 48px;"><path fill="currentColor" d="M508.5 481.6l-129-129c-2.3-2.3-5.3-3.5-8.5-3.5h-10.3C395 312 416 262.5 416 208 416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c54.5 0 104-21 141.1-55.2V371c0 3.2 1.3 6.2 3.5 8.5l129 129c4.7 4.7 12.3 4.7 17 0l9.9-9.9c4.7-4.7 4.7-12.3 0-17zM208 384c-97.3 0-176-78.7-176-176S110.7 32 208 32s176 78.7 176 176-78.7 176-176 176z" class=""></path></svg>
                    </a>
                </div>

                <?php if ($row->name != '' || $row->sl_url != ''): ?>
                    <div class="title-block_<?php echo $portfolioID; ?>">
                        <h3 class="name" title="<?php echo esc_attr($row->name); ?>"><?php echo $row->name; ?></h3>
                    </div>
                <?php endif; ?>
            </div>
            <?php
        } ?>
        <div style="clear:both;"></div>
    </div>
    <div style="clear:both"></div>
</section>
<ul id="huge_it_portfolio_popup_list_<?php echo esc_attr($portfolioID); ?>" class="huge_it_portfolio_popup_list">
    <?php
    $changePopup = 1;
    foreach ($images as $key => $row) {
        $imgurl = explode(";", $row->image_url);
        array_pop($imgurl);
        $link = $row->sl_url;
        $descnohtml = strip_tags($row->description);
        $result = substr($descnohtml, 0, 50);
        $catForFilter = explode(",", $row->category);
        ?>
        <li class="pupup-element <?php foreach ($catForFilter as $catForFilterValue) {
            echo str_replace(" ", "_", $catForFilterValue) . " ";
        } ?>" id="huge_it_portfolio_pupup_element_<?php echo esc_attr($row->id); ?>">
            <div class="heading-navigation heading-navigation_<?php echo esc_attr($portfolioID); ?>">
                <div style="display: inline-block; float: left; margin-left: calc(2% + 5px);">
                    <div class="left-change">
                        <a href="#<?php echo $changePopup - 1; ?>" data-popupid="#<?php echo $row->id; ?>">
                            <svg aria-hidden="true" data-prefix="far" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-left fa-w-8" style="font-size: 48px;"><path fill="currentColor" d="M231.293 473.899l19.799-19.799c4.686-4.686 4.686-12.284 0-16.971L70.393 256 251.092 74.87c4.686-4.686 4.686-12.284 0-16.971L231.293 38.1c-4.686-4.686-12.284-4.686-16.971 0L4.908 247.515c-4.686 4.686-4.686 12.284 0 16.971L214.322 473.9c4.687 4.686 12.285 4.686 16.971-.001z" class=""></path></svg>
                        </a>
                    </div>
                    <div class="right-change">
                        <a href="#<?php echo $changePopup + 1; ?>" data-popupid="#<?php echo $row->id; ?>">
                            <svg aria-hidden="true" data-prefix="far" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512" class="svg-inline--fa fa-chevron-right fa-w-8" style="font-size: 48px;"><path fill="currentColor" d="M24.707 38.101L4.908 57.899c-4.686 4.686-4.686 12.284 0 16.971L185.607 256 4.908 437.13c-4.686 4.686-4.686 12.284 0 16.971L24.707 473.9c4.686 4.686 12.284 4.686 16.971 0l209.414-209.414c4.686-4.686 4.686-12.284 0-16.971L41.678 38.101c-4.687-4.687-12.285-4.687-16.971 0z" class=""></path></svg>
                        </a>
                        </a>
                    </div>
                </div>
                <?php $changePopup = $changePopup + 1; ?>
                <a href="#close" class="close">
                    <svg aria-hidden="true" data-prefix="far" data-icon="times" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" class="svg-inline--fa fa-times fa-w-12" style="font-size: 48px;"><path fill="currentColor" d="M231.6 256l130.1-130.1c4.7-4.7 4.7-12.3 0-17l-22.6-22.6c-4.7-4.7-12.3-4.7-17 0L192 216.4 61.9 86.3c-4.7-4.7-12.3-4.7-17 0l-22.6 22.6c-4.7 4.7-4.7 12.3 0 17L152.4 256 22.3 386.1c-4.7 4.7-4.7 12.3 0 17l22.6 22.6c4.7 4.7 12.3 4.7 17 0L192 295.6l130.1 130.1c4.7 4.7 12.3 4.7 17 0l22.6-22.6c4.7-4.7 4.7-12.3 0-17L231.6 256z" class=""></path></svg>
                </a>
                <div style="clear:both;"></div>
            </div>
            <div class="popup-wrapper popup-wrapper_<?php echo esc_attr($portfolioID); ?>">
                <div class="image-block_<?php echo esc_attr($portfolioID); ?> image-block">
                    <?php

                    if ($row->image_url != ';') {
                        switch (portfolio_gallery_youtube_or_vimeo_portfolio($imgurl[0])) {
                            case 'image':
                                ?>
                                <img alt="<?php echo esc_attr($row->name); ?>"
                                     id="wd-cl-img<?php echo esc_attr($key); ?>"
                                     src="<?php echo esc_attr($imgurl[0]); ?>"/>
                                <?php
                                break;
                            case 'youtube':
                                $videourl = portfolio_gallery_get_video_id_from_url($imgurl[0]);
                                ?>
                                <iframe
                                        src="//www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>?modestbranding=1&showinfo=0"
                                        frameborder="0" allowfullscreen></iframe>
                                <?php
                                break;
                            case 'vimeo':
                                $videourl = portfolio_gallery_get_video_id_from_url($imgurl[0]);
                                ?>
                                <iframe
                                        src="//player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>?title=0&amp;byline=0&amp;portrait=0"
                                        frameborder="0" webkitallowfullscreen mozallowfullscreen
                                        allowfullscreen></iframe>
                                <?php break;
                        }
                    } else { ?>
                        <img alt="<?php echo esc_atr($row->name); ?>" id="wd-cl-img<?php echo esc_attr($key); ?>"
                             src="images/noimage.jpg"/>
                        <?php
                    } ?>
                </div>
                <div class="right-block">
                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_show_popup_title"] == 'on') { ?>
                        <h3
                                class="title"><?php echo $row->name; ?></h3><?php } ?>

                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_thumbs_position"] == 'before' and $portfolio_gallery_get_options["portfolio_gallery_ht_view2_show_thumbs"] == 'on' && count($imgurl) != 1) { ?>
                        <div>
                            <ul class="thumbs-list thumbs-list_<?php echo esc_attr($portfolioID); ?>">
                                <?php
                                foreach ($imgurl as $key => $img) {
                                    ?>
                                    <li>
                                        <?php
                                        switch (portfolio_gallery_youtube_or_vimeo_portfolio($img)) {
                                            case 'image':
                                                ?>

                                                <a href="<?php echo esc_url($img); ?>"
                                                   class="img-thumb"
                                                   title="<?php echo esc_attr($row->name); ?>"><img
                                                            src="<?php echo esc_url(portfolio_gallery_get_image_by_sizes_and_src($img, array(
                                                                $portfolio_gallery_get_options['portfolio_gallery_ht_view2_thumbs_width'],
                                                                $portfolio_gallery_get_options['portfolio_gallery_ht_view2_thumbs_height']
                                                            ), true)); ?>"></a>

                                                <?php
                                                break;
                                            case 'youtube':
                                                $videourl = portfolio_gallery_get_video_id_from_url($img); ?>
                                                <a href="https://www.youtube.com/embed/<?php echo esc_attr($videourl[0]); ?>"
                                                   class="video-thumb"
                                                   title="<?php echo esc_attr($row->name); ?>"
                                                   style="position:relative">
                                                    <img
                                                            src="//img.youtube.com/vi/<?php echo esc_attr($videourl[0]); ?>/mqdefault.jpg">
                                                    <div class="play-icon youtube-icon"
                                                         title="<?php echo esc_attr($videourl[0]); ?>"></div>
                                                </a>
                                                <?php break;
                                            case 'vimeo':
                                                $videourl = portfolio_gallery_get_video_id_from_url($img);
                                                $hash = unserialize(wp_remote_fopen("https://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                                $imgsrc = $hash[0]['thumbnail_large'];
                                                ?>
                                                <a class=" video-thumb"
                                                   href="http://player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>"
                                                   title="<?php echo esc_attr($row->name); ?>"
                                                   style="position:relative">
                                                    <img src="<?php echo esc_attr($imgsrc); ?>"
                                                         alt="<?php echo esc_attr($row->name); ?>"/>
                                                    <div class="play-icon vimeo-icon"
                                                         title="<?php echo esc_attr($videourl[0]); ?>"></div>
                                                </a>
                                                <?php
                                                break;

                                        }
                                        ?>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_show_description"] == 'on') { ?>
                        <div class="description"><?php echo $row->description; ?></div><?php } ?>

                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_thumbs_position"] == 'after' and $portfolio_gallery_get_options["portfolio_gallery_ht_view2_show_thumbs"] == 'on' && count($imgurl) != 1) { ?>
                        <div>
                            <ul class="thumbs-list_<?php echo esc_attr($portfolioID); ?>">
                                <?php
                                foreach ($imgurl as $key => $img) {
                                    ?>
                                    <li>
                                        <?php
                                        switch (portfolio_gallery_youtube_or_vimeo_portfolio($img)) {
                                            case 'image':
                                                ?>

                                                <a href="<?php echo esc_attr($row->sl_url); ?>"
                                                   class="img-thumb"
                                                   title="<?php echo esc_attr($row->name); ?>"><img
                                                            src="<?php echo esc_attr($img); ?>"></a>

                                                <?php
                                                break;
                                            case 'youtube':
                                                $videourl = portfolio_gallery_get_video_id_from_url($img); ?>
                                                <a href="https://www.youtube.com/embed/<?php echo $videourl[0]; ?>"
                                                   class=" video-thumb"
                                                   title="<?php echo esc_attr($row->name); ?>"
                                                   style="position:relative">
                                                    <img
                                                            src="//img.youtube.com/vi/<?php echo esc_attr($videourl[0]); ?>/mqdefault.jpg">
                                                    <div class="play-icon youtube-icon"
                                                         title="<?php echo esc_attr($videourl[0]); ?>"></div>
                                                </a>
                                                <?php break;
                                            case 'vimeo':
                                                $videourl = portfolio_gallery_get_video_id_from_url($img);
                                                $hash = unserialize(wp_remote_fopen("https://vimeo.com/api/v2/video/" . $videourl[0] . ".php"));
                                                $imgsrc = $hash[0]['thumbnail_large'];
                                                ?>
                                                <a class="video-thumb"
                                                   href="http://player.vimeo.com/video/<?php echo esc_attr($videourl[0]); ?>"
                                                   title="<?php echo esc_attr($row->name); ?>"
                                                   style="position:relative">
                                                    <img src="<?php echo esc_attr($imgsrc); ?>"
                                                         alt="<?php echo esc_attr($row->name); ?>"/>
                                                    <div class="play-icon vimeo-icon"
                                                         title="<?php echo esc_attr($videourl[0]); ?>"></div>
                                                </a>
                                                <?php
                                                break;

                                        }
                                        ?>
                                    </li>
                                    <?php
                                } ?>
                            </ul>
                        </div>
                    <?php } ?>

                    <?php if ($portfolio_gallery_get_options["portfolio_gallery_ht_view2_show_popup_linkbutton"] == 'on' && $link != '') { ?>
                        <div class="button-block">
                            <a href="<?php echo esc_url($link); ?>" <?php if ($row->link_target == "on") {
                                echo 'target="_blank"';
                            } ?>><?php echo esc_attr($portfolio_gallery_get_options["portfolio_gallery_ht_view2_popup_linkbutton_text"]); ?></a>
                        </div>
                    <?php } ?>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        </li>
        <?php
    } ?>
</ul>
