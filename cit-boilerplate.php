<?php
/** 
* Plugin Name:       CIT Boilerplate 
* Plugin URI:        https://conscienceit.com
* Description:       CIT Boilerplate plugin description
* Version:           1.0.0 
* Author:            Conscience Technologies 
* Author URI:        https://conscienceit.com 
* Text Domain:       cit-boilerplate 
* Domain Path:       /languages 
*/ 


function cit_boilerplate_textdomain()
{ 
    load_plugin_textdomain('cit-boilerplate', FALSE, basename(dirname( __FILE__ )) . '/languages/'); 
} 
add_action('plugins_loaded', 'cit_boilerplate_textdomain');

include dirname(__FILE__).'/includes/class-cit-boilerplate.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cit-boilerplate-activate.php
 */
function enable_cit_boilerplate_activation() {
	\CitBoilerplate\Cit_BoilerPlate_Activate::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cit-boilerplate-deactivate.php
 */
function disable_cit_boilerplate_activation() {
	\CitBoilerplate\Cit_BoilerPlate_Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'enable_cit_boilerplate_activation');
register_deactivation_hook( __FILE__, 'disable_cit_boilerplate_activation');