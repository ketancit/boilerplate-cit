<?php

/**
 * This constant holds the version of the plugin
 */
if (!defined('CIT_PLUGIN_VERSION')) {
	define('CIT_PLUGIN_VERSION', '1.0.0');
}

/**
 * This constant holds the text-domain of the plugin
 */
if (!defined('CIT_PLUGIN_TXT')) {
	define('CIT_PLUGIN_TXT', 'cit-boilerplate');
}

/**
 * This constant holds the URL of assets in the admin side
 */
if (!defined('CIT_PLUGIN_ADMIN_URL')) {
	define('CIT_PLUGIN_ADMIN_URL', plugins_url('../admin/assets/', __FILE__));
}

/**
 * This constant holds the URL of assets in the public side
 */
if (!defined('CIT_PLUGIN_PUBLIC_URL')) {
	define('CIT_PLUGIN_PUBLIC_URL', plugins_url('../public/assets/', __FILE__));
}