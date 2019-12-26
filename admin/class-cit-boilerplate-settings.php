<?php

namespace CitBoilerplate\Admin;

defined( 'ABSPATH' ) || exit;

/**
 * This class handles all the settings required in the plugin.
 * Note that, it holds the menu pages and submenu pages created on WP dashboard.
 * This class will not be used for metabox settings on any add/edit post page. 
 *
 */
class Cit_Boilerplate_Settings
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

Cit_Boilerplate_Settings::get_instance();