<?php if ( ! defined('WP_CONTENT_DIR')) exit('No direct script access allowed');
/*------------------------------------------------------------------------------
The loader.php is called only when we've checked for any potential conflicts
with function names, class names, or constant names. With so many WP plugins
available and so many potential conflicts out there, I've attempted to 
avoid the resulting headaches as much as possible.
------------------------------------------------------------------------------*/
define('CUSTOM_CONTENT_TYPE_MGR_PATH', dirname(__FILE__));
define('CUSTOM_CONTENT_TYPE_MGR_URL', WP_PLUGIN_URL .'/'. basename(dirname(__FILE__) ) );

// Required Files
include_once('includes/CustomPostTypeManager.php');
include_once('includes/FormGenerator.php');
include_once('includes/StandardizedCustomFields.php');
include_once('includes/functions.php');
include_once('tests/CCTMtests.php');

// Run Tests. TO-DO: rewrite and put these into an admin notice
CCTMtests::wp_version_gt(CustomPostTypeManager::wp_req_ver);
CCTMtests::php_version_gt(CustomPostTypeManager::php_req_ver);

// Get admin ready, show any 'hard' errors, if any.
add_action( 'admin_notices', 'CustomPostTypeManager::print_notices');


if ( empty(CCTMtests::$errors) )
{
	add_action( 'admin_init', 'CustomPostTypeManager::admin_init');	
	
	// Register any custom post-types
	add_action( 'init', 'CustomPostTypeManager::register_custom_post_types', 0 );
	
	// create custom plugin settings menu
	add_action('admin_menu', 'CustomPostTypeManager::create_admin_menu');
	add_filter('plugin_action_links', 'CustomPostTypeManager::add_plugin_settings_link', 10, 2 );
	
	
	// Standardize Fields
	add_action( 'do_meta_boxes', 'StandardizedCustomFields::remove_default_custom_fields', 10, 3 );
	add_action( 'admin_menu', 'StandardizedCustomFields::create_meta_box' );
	add_action( 'save_post', 'StandardizedCustomFields::save_custom_fields', 1, 2 );
}
/*
$error = new WP_Error();
print_r( $error );
exit;
*/

/*EOF*/