<?php
/*
*Plugin Name:github_plugin
*Plugin URI:
*Author: github.pk
*Description:github repostries checking plugin.
*Version: 1.0.0
*License: GPLv2 or later
*Text Domain: github
*License: GPL v2 or later
*License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/


//if this file is called directly, abort.  
if(!defined('WPINC'))
{
die;
}  

if(!defined('WPAC_PLUGIN_VERSION')){
define('WPAC_PLUGIN_VERSION','1.0.0');
}

if(!defined('WPAC_PLUGIN_DIR')){
define('WPAC_PLUGIN_DIR',plugin_dir_url( __FILE__ ));
}


if(!function_exists('wpac_plugin_scripts')){
  

add_action('wp_enqueue_scripts','wpac_plugin_scripts');
}     

require plugin_dir_path(__FILE__).'settings.php';

//creating table
require plugin_dir_path(__FILE__).'db.php';





?>


















