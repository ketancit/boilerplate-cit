<?php

namespace CitBoilerplate\Frontend;

defined( 'ABSPATH' ) || exit;

/**
 * Class responsible for initiation and handling the functionality of public side. 
 * public side refers to the WP non-dashboard side.
 */
class Cit_Boilerplate_Public
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
		$this->loadPublicSideClasses();

		//add all public side CSS files
		add_action('wp_enqueue_scripts', array($this, 'loadPublicSideStyles'), 10, 1 );

		//add all public side JS files
		add_action('wp_enqueue_scripts', array($this, 'loadPublicSideScripts'), 10, 1 );
	}

	/**
	 * Loads the classes required on the public side
	 * 
	 * @return void
	 */
	public function loadPublicSideClasses()
	{
		include dirname(__FILE__).'/class-cit-boilerplate-shortcodes.php';
		
		//add all public-side class files above this line
	}

	/**
	 * Enqueue all the CSS required on the public side
	 * 
	 * @return void
	 */
	public function loadPublicSideStyles()
	{
		wp_enqueue_style('cit-boilerplate-public-style', CIT_PLUGIN_PUBLIC_URL.'css/cit-boilerplate-public.css', '', CIT_PLUGIN_VERSION);
	}

	/**
	 * Enqueue all the JS required on the public side
	 * 
	 * @return void
	 */
	public function loadPublicSideScripts()
	{
		$localizationArray = array(
			'ajax_url'		=> public_url('public-ajax.php'),
		);

		wp_enqueue_script('cit-boilerplate-public-script', CIT_PLUGIN_PUBLIC_URL.'js/cit-boilerplate-public.js', array('jquery'), CIT_PLUGIN_VERSION);

		wp_localize_script('cit-boilerplate-public-script', '$citBoilerplate', $localizationArray);
	}
}

Cit_Boilerplate_Public::get_instance();