<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Portfolio_Gallery_Admin {

	/**
	 * Array of pages in admin
	 * @var array
	 */
	public $pages = array();

	/**
	 * Instance of Portfolio_Gallery_General_Options class
	 *
	 * @var Portfolio_Gallery_General_Options
	 */
	public $general_options = null;

	/**
	 * Instance of Portfolio_Gallery_Portfolios class
	 *
	 * @var Portfolio_Gallery_Portfolios
	 */
	public $portfolios = null;

	/**
	 * Instance of Portfolio_Gallery_Lightbox_Options class
	 *
	 * @var Portfolio_Gallery_Lightbox_Options
	 */
	public $lightbox_options = null;

	/**
	 * Instance of Portfolio_Gallery_Featured_Plugins class
	 *
	 * @var Portfolio_Gallery_Featured_Plugins
	 */
	public $featured_plugins = null;

	/**
	 * Instance of Portfolio_Gallery_Licensing class
	 *
	 * @var Portfolio_Gallery_Licensing $licensing
	 */
	public $licensing;

	/**
	 * Portfolio_Gallery_Admin constructor.
	 */
	public function __construct(){
		$this->init();
		add_action('admin_menu',array($this,'admin_menu'));
		add_action( 'wp_loaded', array($this,'wp_loaded') );
	}

	/**
	 * Initialize Portfolio Gallery's admin
	 */
	protected function init(){
		$this->general_options = new Portfolio_Gallery_General_Options();
		$this->portfolios = new Portfolio_Gallery_Portfolios();
		$this->lightbox_options = new Portfolio_Gallery_Lightbox_Options();
		$this->featured_plugins = new Portfolio_Gallery_Featured_Plugins();
		$this->licensing = new Portfolio_Gallery_Licensing();
	}

	/**
	 * Prints Portfolio Menu
	 */
	public function admin_menu(){
		$this->pages[] = add_menu_page( __( 'Huge-IT Portfolio Gallery', 'portfolio-gallery' ),  __( 'Huge-IT Portfolio', 'portfolio-gallery' ), 'delete_pages', 'portfolios_huge_it_portfolio', array( Portfolio_Gallery()->admin->portfolios,'load_portfolio_page' ), PORTFOLIO_GALLERY_IMAGES_URL."/admin_images/huge_it_portfolioLogoHover -for_menu.png" );
		$this->pages[] = add_submenu_page( 'portfolios_huge_it_portfolio', __('Portfolios','portfolio-gallery'), __('Portfolios','portfolio-gallery'), 'delete_pages', 'portfolios_huge_it_portfolio', array( Portfolio_Gallery()->admin->portfolios,'load_portfolio_page' ));

		$this->pages[] = add_submenu_page( 'portfolios_huge_it_portfolio', __( 'General Options', 'portfolio-gallery' ), __( 'General Options', 'portfolio-gallery' ), 'delete_pages', 'Options_portfolio_styles', array( Portfolio_Gallery()->admin->general_options ,'load_page' ) );
		$this->pages[] = add_submenu_page( 'portfolios_huge_it_portfolio', __( 'Lightbox Options', 'portfolio-gallery' ), __( 'Lightbox Options', 'portfolio-gallery' ), 'delete_pages', 'Options_portfolio_lightbox_styles', array( Portfolio_Gallery()->admin->lightbox_options,'load_page' ) );

		$this->pages[] =add_submenu_page( 'portfolios_huge_it_portfolio', __( 'Featured Plugins', 'portfolio-gallery' ), __( 'Featured Plugins', 'portfolio-gallery' ), 'delete_pages', 'huge_it__portfolio_featured_plugins', array( Portfolio_Gallery()->admin->featured_plugins,'show_page' ) );
		$this->pages[] =add_submenu_page( 'portfolios_huge_it_portfolio', __( 'Licensing', 'portfolio-gallery' ), __( 'Licensing', 'portfolio-gallery' ), 'delete_pages', 'huge_it__portfolio_licensing', array( Portfolio_Gallery()->admin->licensing,'show_page' ) );
	}


	public function wp_loaded() {
		global $wpdb;
		if (isset($_GET['task'])) {
			$task = $_GET['task'];
			if ($task == 'add_portfolio') {

				if (!isset($_REQUEST['hugeit_portfolio_add_portfolio_nonce']) || !wp_verify_nonce($_REQUEST['hugeit_portfolio_add_portfolio_nonce'], 'add_new_portfolio')) {
					wp_die('Security check failure.');
				}

				$table_name = $wpdb->prefix . "huge_itportfolio_portfolios";
				$wpdb->insert(
					$table_name,
					array(
						'name' => 'New portfolio',
						'sl_height' => '375',
						'sl_width' => '600',
						'pause_on_hover' => 'on',
						'portfolio_list_effects_s' => 'cubeH',
						'description' => '4000',
						'param' => '1000',
						'sl_position' => 'off',
						'ordering' => '1',
						'published' => '300',
						'categories' => 'My First Category,My Second Category,My Third Category,',
						'ht_show_sorting' => 'off',
						'ht_show_filtering' => 'off',
					)
				);

				$apply_portfolio_safe_link = wp_nonce_url(
					'admin.php?page=portfolios_huge_it_portfolio&id=' . $wpdb->insert_id . '&task=apply',
					'apply_portfolio_' . $wpdb->insert_id,
					'hugeit_portfolio_apply_portfolio_nonce'
				);

				$apply_portfolio_safe_link = htmlspecialchars_decode($apply_portfolio_safe_link);

				header( 'Location: ' . $apply_portfolio_safe_link );
			}
		}
	}
}
