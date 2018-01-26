<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
$lightbox_options_nonce = wp_create_nonce( 'portfolio_gallery_nonce_save_lightbox_options' );
$portfolio_defaultoptions = portfolio_gallery_get_default_general_options();
?>
<div class="wrap">
	<?php require(PORTFOLIO_GALLERY_TEMPLATES_PATH.DIRECTORY_SEPARATOR.'admin'.DIRECTORY_SEPARATOR.'portfolio-gallery-admin-free-banner.php');?>
	<div style="margin-left: -20px;position: relative" id="poststuff">
		<p class="pro_info">
			<?php _e('These features are available in the Professional version of the plugin only.', 'portfolio-gallery' ); ?>
			<a href="http://huge-it.com/portfolio-gallery/" target="_blank" class="button button-primary"><?php _e('Enable','portfolio-gallery');?></a>
		</p>
		<form
			action="admin.php?page=Options_portfolio_lightbox_styles&task=save&portfolio_gallery_nonce_save_lightbox_options=<?php echo $lightbox_options_nonce; ?>"
			method="post" id="adminForm" name="adminForm">
			<ul id="lightbox_type">
				<li class="<?php if ( get_option('portfolio_gallery_lightbox_type') == 'new_type' ) {
					echo "active";
				} ?>">
					<label for="new_type"><?php _e('New Type','portfolio-gallery');?></label>
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
				<a onclick="document.getElementById('adminForm').submit()" style="margin-left: 20px;"
				   class="save-portfolio-options button-primary"><?php echo __( 'Save', 'portfolio-gallery' ); ?></a>
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
			<div class="lightbox-options-block">
				<h3><?php _e('General Options','portfolio-gallery');?></h3>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_lightboxView"><?php _e('Lightbox style','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<select id="portfolio_gallery_lightbox_lightboxView" name="params[portfolio_gallery_lightbox_lightboxView]">
						<option <?php selected( 'view1', get_option('portfolio_gallery_lightbox_lightboxView') ); ?>
							value="view1">1
						</option>
						<option <?php selected( 'view2', get_option('portfolio_gallery_lightbox_lightboxView') ); ?>
							value="view2">2
						</option>
						<option <?php selected( 'view3', get_option('portfolio_gallery_lightbox_lightboxView') ); ?>
							value="view3">3
						</option>
						<option <?php selected( 'view4', get_option('portfolio_gallery_lightbox_lightboxView') ); ?>
							value="view4">4
						</option>
                        <option <?php selected( 'view5', get_option('portfolio_gallery_lightbox_lightboxView') ); ?>
                                value="view5">5
                        </option>
                        <option <?php selected( 'view6', get_option('portfolio_gallery_lightbox_lightboxView') ); ?>
                                value="view6">6
                        </option>
					</select>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_speed_new"><?php _e('Lightbox open speed','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set lightbox opening speed','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number" name="params[portfolio_gallery_lightbox_speed_new]" id="portfolio_gallery_lightbox_speed_new"
						   value="<?php echo get_option('portfolio_gallery_lightbox_speed_new'); ?>"
						   class="text">
					<span><?php _e('ms','portfolio-gallery');?></span>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_overlayClose_new"><?php _e('Overlay close','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Check to enable close by Esc key.','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="hidden" value="false" name="params[portfolio_gallery_lightbox_overlayClose_new]"/>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_overlayClose_new" <?php if ( get_option('portfolio_gallery_lightbox_overlayClose_new') == 'true' ) {
						echo 'checked="checked"';
					} ?> name="params[portfolio_gallery_lightbox_overlayClose_new]" value="true"/>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_style"><?php _e('Loop content','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Check to enable repeating images after one cycle.','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="hidden" value="false" name="params[portfolio_gallery_lightbox_loop_new]"/>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_loop_new" <?php if ( get_option('portfolio_gallery_lightbox_loop_new') == 'true' ) {
						echo 'checked="checked"';
					} ?> name="params[portfolio_gallery_lightbox_loop_new]" value="true"/>
				</div>
			</div>
		</form>
			<div class="lightbox-options-block portfolio_lightbox_options_grey_overlay">
				<h3><?php _e('Dimensions','portfolio-gallery');?><img src="<?php echo PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/portfolio-pro-icon.png'; ?>"
								   class="portfolio_gallery_lightbox_pro_logo"></h3>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_width_new"><?php _e('Lightbox Width','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the width of the popup in percentages.','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_width_new']; ?>"
						   class="text">
					<span>%</span>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_height_new"><?php _e('Lightbox Height','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the height of the popup in percentages.','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_height_new']; ?>"
						   class="text">
					<span>%</span>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_videoMaxWidth"><?php _e('Lightbox Video maximum width','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the maximum width of the popup in pixels, the height will be fixed automatically.','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_videoMaxWidth']; ?>"
						   class="text">
					<span><?php _e('px','portfolio-gallery');?></span>
				</div>
			</div>
			<div class="lightbox-options-block portfolio_lightbox_options_grey_overlay">
				<h3><?php _e('Slideshow','portfolio-gallery');?><img src="<?php echo PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/portfolio-pro-icon.png'; ?>"
								  class="portfolio_gallery_lightbox_pro_logo"></h3>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_slideshow_new"><?php _e('Slideshow','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the width of popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="hidden" value="false" name="params[portfolio_gallery_lightbox_slideshow_new]"/>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_slideshow_new" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_slideshow_new'] == 'true' ) {
						echo 'checked="checked"';
					} ?> name="params[portfolio_gallery_lightbox_slideshow_new]" value="true"/>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_slideshow_auto_new"><?php _e('Slideshow auto start','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the width of popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="hidden" value="false" name="params[portfolio_gallery_lightbox_slideshow_auto_new]"/>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_slideshow_auto_new" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_slideshow_auto_new'] == 'true' ) {
						echo 'checked="checked"';
					} ?> name="params[portfolio_gallery_lightbox_slideshow_auto_new]" value="true"/>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_slideshow_speed_new"><?php _e('Slideshow interval','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the height of popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number" name="params[portfolio_gallery_lightbox_slideshow_speed_new]"
						   id="portfolio_gallery_lightbox_slideshow_speed_new"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_slideshow_speed_new']; ?>"
						   class="text">
					<span><?php _e('ms','portfolio-gallery');?></span>
				</div>
			</div>
			<div class="lightbox-options-block portfolio_lightbox_options_grey_overlay" style=" margin-top: -150px;">
				<h3><?php _e('Advanced Options','portfolio-gallery');?><img src="<?php echo PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/portfolio-pro-icon.png'; ?>"
										 class="portfolio_gallery_lightbox_pro_logo"></h3>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_style"><?php _e('EscKey close','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_escKey_new"/>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_keyPress_new"><?php _e('Keyboard navigation','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_keyPress_new"/>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_arrows"><?php _e('Show Arrows','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_arrows" checked/>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_mouseWheel"><?php _e('Mouse Wheel Navigaion','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_mouseWheel" />
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_download"><?php _e('Show Download Button','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_download" />
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_showCounter"><?php _e('Show Counter','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_showCounter" />
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_sequence_info"><?php _e('Sequence Info text','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="text"
						   style="width: 13%"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_sequence_info']; ?>"
						   class="text">
					X <input type="text"
							 style="width: 13%"
							 value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_sequenceInfo']; ?>"
							 class="text">
					XX
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_slideAnimationType"><?php _e('Transition type','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<select id="portfolio_gallery_lightbox_slideAnimationType" >
						<option <?php selected( 'effect_1', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_1"><?php _e('Effect','portfolio-gallery');?> 1
						</option>
						<option <?php selected( 'effect_2', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_2"><?php _e('Effect','portfolio-gallery');?> 2
						</option>
						<option <?php selected( 'effect_3', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_3"><?php _e('Effect','portfolio-gallery');?> 3
						</option>
						<option <?php selected( 'effect_4', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_4"><?php _e('Effect','portfolio-gallery');?> 4
						</option>
						<option <?php selected( 'effect_5', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_5"><?php _e('Effect','portfolio-gallery');?> 5
						</option>
						<option <?php selected( 'effect_6', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_6"><?php _e('Effect','portfolio-gallery');?> 6
						</option>
						<option <?php selected( 'effect_7', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_7"><?php _e('Effect','portfolio-gallery');?> 7
						</option>
						<option <?php selected( 'effect_8', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_8"><?php _e('Effect','portfolio-gallery');?> 8
						</option>
						<option <?php selected( 'effect_9', $portfolio_defaultoptions['portfolio_gallery_lightbox_slideAnimationType'] ); ?>
							value="effect_9"><?php _e('Effect','portfolio-gallery');?> 9
						</option>
					</select>
				</div>
			</div>
			<div class="lightbox-options-block portfolio_lightbox_options_grey_overlay">
				<h3><?php _e('Lightbox Watermark styles','portfolio-gallery');?><img src="<?php echo PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/portfolio-pro-icon.png'; ?>"
												  class="portfolio_gallery_lightbox_pro_logo"></h3>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_watermark"><?php _e('Watermark','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the width of popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"
						   id="portfolio_gallery_lightbox_watermark"  />
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_watermark_text"><?php _e('Watermark Text','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="text"  id="portfolio_gallery_lightbox_watermark_text"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_text']; ?>"
						   class="text">
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_watermark_textColor"><?php _e('Watermark Text Color','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="text" class="color" id="portfolio_gallery_lightbox_watermark_textColor"
						   value="#<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_textColor']; ?>"
						   size="10"/>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_watermark_textFontSize"><?php _e('Watermark Text Font Size','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number"
						   id="portfolio_gallery_lightbox_watermark_textFontSize"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_textFontSize']; ?>"
						   class="text">
					<span><?php _e('px','portfolio-gallery');?></span>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_watermark_containerBackground"><?php _e('Watermark Background Color','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="text" class="color" id="portfolio_gallery_lightbox_watermark_containerBackground"
						   value="#<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_containerBackground']; ?>"
						   size="10"/>
				</div>
				<div>
					<label for="portfolio_gallery_lightbox_watermark_containerOpacity"><?php _e('Watermark Background Opacity','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<div class="slider-container">
						<input id="portfolio_gallery_lightbox_watermark_containerOpacity" data-slider-highlight="true"
							   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true"
							   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_containerOpacity']; ?>"/>
						<span><?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_containerOpacity']; ?>
							%</span>
					</div>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_watermark_containerWidth"><?php _e('Watermark Width','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number"
						   id="portfolio_gallery_lightbox_watermark_containerWidth"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_containerWidth']; ?>"
						   class="text">
					<span><?php _e('px','portfolio-gallery');?></span>
				</div>
				<div class="has-height">
					<label for="portfolio_gallery_lightbox_watermark_containerWidth"><?php _e('Watermark Position','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<div>
						<table class="bws_position_table">
							<tbody>
							<tr>
								<td><input type="radio" value="1" id="watermark_top-left"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '1' ) {
											echo 'checked="checked"';
										} ?> /></td>
								<td><input type="radio" value="2" id="watermark_top-center"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '2' ) {
											echo 'checked="checked"';
										} ?> /></td>
								<td><input type="radio" value="3" id="watermark_top-right"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '3' ) {
											echo 'checked="checked"';
										} ?> /></td>
							</tr>
							<tr>
								<td><input type="radio" value="4" id="watermark_middle-left"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '4' ) {
											echo 'checked="checked"';
										} ?> /></td>
								<td><input type="radio" value="5" id="watermark_middle-center"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '5' ) {
											echo 'checked="checked"';
										} ?> /></td>
								<td><input type="radio" value="6" id="watermark_middle-right"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '6' ) {
											echo 'checked="checked"';
										} ?> /></td>
							</tr>
							<tr>
								<td><input type="radio" value="7" id="watermark_bottom-left"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '7' ) {
											echo 'checked="checked"';
										} ?> /></td>
								<td><input type="radio" value="8" id="watermark_bottom-center"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '8' ) {
											echo 'checked="checked"';
										} ?> /></td>
								<td><input type="radio" value="9" id="watermark_bottom-right"
										<?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_position_new'] == '9' ) {
											echo 'checked="checked"';
										} ?> /></td>
							</tr>
							</tbody>
						</table>
					</div>
				</div>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_watermark_margin"><?php _e('Watermark Margin','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="number"
						   id="portfolio_gallery_lightbox_watermark_margin"
						   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_margin']; ?>"
						   class="text">
					<span><?php _e('px','portfolio-gallery');?></span>
				</div>
				<div class="has-background" style="display: none">
					<label for="portfolio_gallery_lightbox_watermark_opacity"><?php _e('Watermark Text Opacity','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<div class="slider-container">
						<input id="portfolio_gallery_lightbox_watermark_opacity" data-slider-highlight="true"
							   data-slider-values="0,10,20,30,40,50,60,70,80,90,100" type="text" data-slider="true"
							   value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_opacity']; ?>"/>
						<span><?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_opacity']; ?>%</span>
					</div>
				</div>
				<div style="height:auto;">
					<label for="watermark_image_btn"><?php _e('Select Watermark Image','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the image of Lightbox watermark.','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<img src="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_img_src_new']; ?>"
						 id="watermark_image_new" style="width:120px;height:auto;">
					<input type="button" class="button wp-media-buttons-icon"
						   style="margin-left: 63%;width: auto;display: inline-block;" id="watermark_image_btn_new"
						   value="Change Image">
					<input type="hidden" id="img_watermark_hidden_new" value="<?php echo $portfolio_defaultoptions['portfolio_gallery_lightbox_watermark_img_src_new']; ?>">
				</div>
			</div>
			<div class="lightbox-options-block portfolio_lightbox_options_grey_overlay" style="margin-top: -400px;">
				<h3><?php _e('Social Share Buttons','portfolio-gallery');?><img src="<?php echo PORTFOLIO_GALLERY_IMAGES_URL.'/admin_images/portfolio-pro-icon.png'; ?>"
											 class="portfolio_gallery_lightbox_pro_logo"></h3>
				<div class="has-background">
					<label for="portfolio_gallery_lightbox_socialSharing"><?php _e('Social Share Buttons','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Set the width of popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<input type="checkbox"  id="portfolio_gallery_lightbox_socialSharing"  />
				</div>
				<div class="social-buttons-list">
					<label><?php _e('Social Share Buttons List','portfolio-gallery');?>
						<div class="help">?
							<div class="help-block">
								<span class="pnt"></span>
								<p><?php _e('Choose the style of your popup','portfolio-gallery');?></p>
							</div>
						</div>
					</label>
					<div>
						<table>
							<tr>
								<td>
									<label for="portfolio_gallery_lightbox_facebookButton"><?php _e('Facebook','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_facebookButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_facebookButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_twitterButton"><?php _e('Twitter','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_twitterButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_twitterButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_googleplusButton"><?php _e('Google Plus','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_googleplusButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_googleplusButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_pinterestButton"><?php _e('Pinterest','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_pinterestButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_pinterestButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
							</tr>
							<tr>
								<td>
									<label for="portfolio_gallery_lightbox_linkedinButton"><?php _e('Linkedin','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_linkedinButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_linkedinButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_tumblrButton"><?php _e('Tumblr','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_tumblrButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_tumblrButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_redditButton"><?php _e('Reddit','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_redditButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_redditButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_bufferButton"><?php _e('Buffer','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_bufferButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_bufferButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
							</tr>
							<tr>
								<td>
									<label for="portfolio_gallery_lightbox_vkButton"><?php _e('Vkontakte','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_vkButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_vkButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_yummlyButton"><?php _e('Yumly','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_yummlyButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_yummlyButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>
									<label for="portfolio_gallery_lightbox_diggButton"><?php _e('Digg','portfolio-gallery');?>
										<input type="checkbox"
											   id="portfolio_gallery_lightbox_diggButton" <?php if ( $portfolio_defaultoptions['portfolio_gallery_lightbox_diggButton'] == 'true' ) {
											echo 'checked="checked"';
										} ?>  value="true"/></label>
								</td>
								<td>

								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<input type="hidden" name="option" value=""/>
<input type="hidden" name="task" value=""/>
<input type="hidden" name="controller" value="options"/>
<input type="hidden" name="op_type" value="styles"/>
<input type="hidden" name="boxchecked" value="0"/>