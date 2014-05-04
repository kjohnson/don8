<?php
/*
Plugin Name: Don8
Description: Making donations on your WordPress website simpler.
Version: 0.1.4
Author: Kyle Maurer
Author URI: http://realbigmarketing.com/staff/kyle
*/

/*
Tutorials and recources:

*/

//Generally I begin with a main plugin file (which would be this) and use it to assemble all the others together.
//It is good practice to segment your code into different files. This is a good technique for including them:
require_once (plugin_dir_path(__FILE__).'/admin/admin.php');
require_once (plugin_dir_path(__FILE__).'/functions/form.php');
require_once (plugin_dir_path(__FILE__).'/shortcodes.php');
?>