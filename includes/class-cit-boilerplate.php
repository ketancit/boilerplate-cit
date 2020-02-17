<?php 

namespace CitBoilerplate;

use StoutLogic\AcfBuilder\FieldsBuilder;

defined( 'ABSPATH' ) || exit;

/**
 * Class responsible for handling the initiation of public side and admin side classes. 
 * Also, it holds the responsibility of including all other miscelleneous files. 
 */
class Cit_BoilerPlate {

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
		$this->loadRequiredClasses();	
	}

	/**
	 * Function to load all the required classes and files of the plugin
	 *
	 * @return void
	 */
	public function loadRequiredClasses()
	{
		//all constants file
		include dirname(__FILE__).'/constants.php';

		//including acf plugin
		include dirname(__FILE__).'/lib/acf/acf.php';

		//all miscellaneous functions file
		include dirname(__FILE__).'/functions.php';

		// Define path and URL to the ACF plugin.
		define('MY_ACF_PATH', dirname(__FILE__) . '/lib/acf/');
		define('MY_ACF_URL', plugins_url('/lib/acf/', __FILE__));

		$path = dirname(__FILE__).'/../admin/templates/fields/';
		$files = array_diff(scandir($path), array('.', '..'));

		$autoloadFile = dirname(__FILE__).'/lib/stoutlogic/acf-builder/autoload.php';

		if (file_exists($autoloadFile)) {
			include $autoloadFile;

			if (!empty($files)) {
				foreach ($files as $file) {
					if (substr_compare($file, '.php', -strlen('.php')) === 0) {
						$field = require_once($path.$file);	
						if ($field instanceof FieldsBuilder) {
						    acf_add_local_field_group($field->build());
						}
					}
				}
			}
		}

		//activation and deactivation classes
		include dirname(__FILE__).'/class-cit-boilerplate-activate.php';
		include dirname(__FILE__).'/class-cit-boilerplate-deactivate.php';		

		//admin side class
		include dirname(__FILE__).'/../admin/class-cit-boilerplate-admin.php';

		//public side class
		include dirname(__FILE__).'/../public/class-cit-boilerplate-public.php';
	}
}

Cit_BoilerPlate::get_instance();
