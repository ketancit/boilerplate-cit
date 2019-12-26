<?php 

namespace CitBoilerplate;

defined( 'ABSPATH' ) || exit;

/**
 * This class is triggered on the activation of the plugin. 
 */
class Cit_BoilerPlate_Activate {

	private static $_instance = null;

	public static function get_instance()
	{
		if (!isset(self::$_instance)) {
			self::$_instance = new self;
		}

		return self::$_instance;
	}

	/**
	 * Constructor of the class
	 */
	private function __construct()
	{
		
	}

	/**
	 * This function is triggerred on activation of this plugin
	 *
	 * @return void
	 */
	public static function activate()
	{
		//start writing your code here
	}
}

Cit_BoilerPlate_Activate::get_instance();
