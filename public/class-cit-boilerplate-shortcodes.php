<?php

namespace CitBoilerplate\Frontend;

defined( 'ABSPATH' ) || exit;

/**
 * Class responsible for initiation and handling of all the shortcodes. 
 */
class Cit_Boilerplate_Shortcodes
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
	}
}

Cit_Boilerplate_Shortcodes::get_instance();