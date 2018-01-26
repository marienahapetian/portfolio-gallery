<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
?>
<div class="free_version_banner" <?php if (isset($_COOKIE['portfolioGalleryBannerShow']) && $_COOKIE['portfolioGalleryBannerShow'] == "no") echo 'style="display:none"'; ?> >
    <a class="close_free_banner">+</a>
    <img class="manual_icon"
         src="<?php echo esc_attr(PORTFOLIO_GALLERY_IMAGES_URL . '/admin_images/icon-user-manual.png'); ?>"
         alt="user manual"/>
    <p class="usermanual_text"><?php _e('If you have any difficulties in using the options, Follow the link to ','portfolio-gallery');?><a
                href="http://huge-it.com/wordpress-portfolio-gallery-user-manual/" target="_blank"><?php _e('User Manual','portfolio-gallery');?></a></p>
    <a class="get_full_version" href="http://huge-it.com/portfolio-gallery/" target="_blank"><?php _e('GET THE FULL VERSION','portfolio-gallery');?></a>
    <a href="http://huge-it.com" target="_blank"><img class="huge_it_logo"
                                                      src="<?php echo esc_attr(PORTFOLIO_GALLERY_IMAGES_URL . '/admin_images/Huge-It-logo.png'); ?>"/></a>
    <div style="clear: both;"></div>
    <div class="hg_social_link_buttons">
        <a target="_blank" class="fb" href="https://www.facebook.com/hugeit/"></a>
        <a target="_blank" class="twitter" href="https://twitter.com/HugeITcom"></a>
        <a target="_blank" class="gplus" href="https://plus.google.com/111845940220835549549"></a>
        <a target="_blank" class="yt" href="https://www.youtube.com/channel/UCueCH_ulkgQZhSuc0L5rS5Q"></a>
    </div>
    <div class="hg_view_plugins_block">
        <a target="_blank" href="https://wordpress.org/support/plugin/portfolio-gallery/reviews/"><?php _e('Rate Us','portfolio-gallery');?></a>
        <a target="_blank" href="https://demo.huge-it.com/wordpress-plugins-portfolio-elastic-grid"><?php _e('Full Demo','portfolio-gallery');?></a>
        <a target="_blank" href="http://huge-it.com/wordpress-portfolio-gallery-faq//"><?php _e('FAQ','portfolio-gallery');?></a>
        <a target="_blank" href="https://wordpress.org/support/plugin/portfolio-gallery"><?php _e('Contact Us','portfolio-gallery');?></a>
    </div>
    <div class="description_text"><p><?php _e('This is the Lite version of the plugin. Click "GET THE FULL VERSION" for more
            advanced options and customization possibilities. We appreciate your attention and cooperation.','portfolio-gallery');?></p></div>
    <div style="clear: both;"></div>
</div>