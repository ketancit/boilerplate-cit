<?php

/**
 * All the miscellaneous functions of the plugin are written in this file
 */

//start writing from here

if (!function_exists('get_field_partial')) {
	/**
	 * Simple function to pretty up our field partial includes.
	 *
	 * @param  mixed $partial
	 * @return mixed
	 */
	function get_field_partial($partial)
	{
	    $partial = str_replace('.', '/', $partial);
	    return include(dirname(__FILE__)."/../admin/templates/fields/{$partial}.php");
	}
}