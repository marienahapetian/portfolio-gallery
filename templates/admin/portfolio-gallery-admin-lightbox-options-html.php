<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
?>
<div class="wrap">
	<?php require(PORTFOLIO_GALLERY_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'portfolio-gallery-admin-free-banner.php');?>
	<div style="margin-left: -20px;position: relative" id="poststuff">
		<p class="pro_info">
			These features are available in the Professional version of the plugin only.
			<a href="http://huge-it.com/portfolio-gallery/" target="_blank" class="button button-primary">Enable</a>
		</p>
		<ul id="lightbox_type">
			<li class="<?php if ( get_option('portfolio_gallery_lightbox_type') == 'new_type' ) {
				echo "active";
			} ?>">
				<label for="new_type">New Type</label>
				<input type="checkbox" name="params[portfolio_gallery_lightbox_type]"
				       id="new_type" <?php if ( get_option('portfolio_gallery_lightbox_type') == 'new_type' ) {
					echo 'checked';
				} ?>
				       value="new_type">
			</li>
			<li class="<?php if ( get_option('portfolio_gallery_lightbox_type') == 'old_type' ) {
				echo "active";
			} ?>">
				<label for="old_type">Old Type</label>
				<input type="checkbox" name="params[portfolio_gallery_lightbox_type]"
				       id="old_type" <?php if ( get_option('portfolio_gallery_lightbox_type') == 'old_type' ) {
					echo 'checked';
				} ?>
				       value="old_type">
			</li>
		</ul>
		<div id="lightbox-options-list"
		     class="unique-type-options-wrapper <?php if ( get_option('portfolio_gallery_lightbox_type') == 'old_type' ) {
			     echo "active";
		     } ?>">
			<div class="portfolio_lightbox_options_grey_overlay"></div>
			<img style="width: 100%;" src="<?php echo esc_attr(PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/lightbox_options.jpg');?>">
		</div>
		<div id="new-lightbox-options-list"
		class="unique-type-options-wrapper <?php if ( get_option('portfolio_gallery_lightbox_type') == 'new_type' ) {
			echo "active";
		} ?>">
			<div class="portfolio_lightbox_options_grey_overlay"></div>
			<img style="width: 100%;" src="<?php echo esc_attr(PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/lightbox-options-2.jpg');?>">
		</div>
	</div>
</div>

<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>