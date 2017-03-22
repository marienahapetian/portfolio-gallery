<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>

<div class="wrap">
<div>
	<?php require( PORTFOLIO_GALLERY_TEMPLATES_PATH . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'portfolio-gallery-admin-free-banner.php' ); ?>
	<div id="poststuff">
		<div id="post-body-content" class="portfolio-options">
			<p class="pro_info">
				These features are available in the Professional version of the plugin only.
				<a href="http://huge-it.com/portfolio-gallery/" target="_blank" class="button button-primary">Enable</a>
			</p>
            <?php $path_site = esc_attr(PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images'); ?>
            <form action="admin.php?page=Options_portfolio_styles&task=save&portfolio_gallery_nonce_save_gen_options=<?php echo $portfolio_gallery_nonce_save_gen_options; ?>" method="post" id="adminForm"
                  name="adminForm">
                <div id="portfolio-options-list">

                    <ul id="portfolio-view-tabs">
                        <li>
                            <a href="#portfolio-view-options-0"><?php echo __( 'Blocks Toggle Up/Down', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-1"><?php echo __( 'Full-Height Blocks', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-2"><?php echo __( 'Gallery/Content-Popup', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-3"><?php echo __( 'Full-Width Blocks', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-4"><?php echo __( 'FAQ Toggle Up/Down', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-5"><?php echo __( 'Content Slider', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-6"><?php echo __( 'Lightbox-Gallery', 'portfolio-gallery' ); ?></a>
                        </li>
                        <li>
                            <a href="#portfolio-view-options-7"><?php echo __( 'Elastic Grid', 'portfolio-gallery' ); ?></a>
                        </li>
                    </ul>
                    <ul class="options-block" id="portfolio-view-tabs-contents">
                        <div class="portfolio_options_grey_overlay"></div>
                        <li id="portfolio-view-options-0" class="active">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/block-toggle-up-down.png' >
                        </li>
                        <li id="portfolio-view-options-1">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/full-height-view.png' >
                        </li>
                        <li id="portfolio-view-options-2">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/content-pop-up.png' >
                        </li>
                        <li id="portfolio-view-options-3">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/full-width-view.png' >
                        </li>
                        <li id="portfolio-view-options-4">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/faq-toggle-up-down.png' >
                        </li>
                        <li id="portfolio-view-options-5">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/content-slider.png' >
                        </li>
                        <li id="portfolio-view-options-6">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/lightbox-gallery.png' >
                        </li>
                        <li id="portfolio-view-options-7">
                            <img style="width: 100%;" src='<?php echo $path_site; ?>/elastic-grid.png' >
                        </li>
                    </ul>
                    <div id="post-body-footer">
                        <a href="#" class="save-videogallery-options button-primary">Save</a>
                        <div class="clear"></div>
                    </div>
            </form>
		</div>
	</div>
</div>
</div>
<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>