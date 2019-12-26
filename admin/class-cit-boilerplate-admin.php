<?php

namespace CitBoilerplate\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * Class responsible for initiation and handling the functionality of admin side. 
 * Admin side refers to the WP dashboard. It does not mean that this is only for the administrator. 
 */
class Cit_Boilerplate_Admin
{

	private static $_instance = null;

	public static function get_instance() {
		if ( ! isset( self::$_instance ) ) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	/**
	 * Constructor of the class
	 */
	private function __construct()
	{
		$this->loadAdminSideClasses();

		//add all admin side CSS files
		add_action('admin_enqueue_scripts', array($this, 'loadAdminSideStyles'), 10, 1 );

		//add all admin side JS files
		add_action('admin_enqueue_scripts', array($this, 'loadAdminSideScripts'), 10, 1 );
	}

	/**
	 * Loads the classes required on the admin side
	 * 
	 * @return void
	 */
	public function loadAdminSideClasses()
	{
		include dirname(__FILE__).'/class-cit-boilerplate-settings.php';
		
		//add all admin-side class files above this line
	}

	/**
	 * Enqueue all the CSS required on the admin side
	 * 
	 * @return void
	 */
	public function loadAdminSideStyles()
	{
		wp_enqueue_style('cit-boilerplate-admin-style', CIT_PLUGIN_ADMIN_URL.'css/cit-boilerplate-admin.css', '', CIT_PLUGIN_VERSION);
	}

	/**
	 * Enqueue all the JS required on the admin side
	 * 
	 * @return void
	 */
	public function loadAdminSideScripts()
	{
		$localizationArray = array(
			'ajax_url'		=> admin_url('admin-ajax.php'),
		);

		wp_enqueue_script('cit-boilerplate-admin-script', CIT_PLUGIN_ADMIN_URL.'js/cit-boilerplate-admin.js', array('jquery'), CIT_PLUGIN_VERSION);

		wp_localize_script('cit-boilerplate-admin-script', '$citBoilerplate', $localizationArray);
	}
}

Cit_Boilerplate_Admin::get_instance();