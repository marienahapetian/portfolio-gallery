<?php
class Portfolio_Gallery_Featured_Plugins{
	/**
	 * Prints Featured Plugins page 
	 */
	public function show_page( ){
		include_once( PORTFOLIO_GALLERY_TEMPLATES_PATH.'admin'.DIRECTORY_SEPARATOR.'portfolio-gallery-admin-featured-plugins.php' );
	}
}