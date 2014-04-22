<?php
/*
Plugin Name: Don8
Description: Making donations on your WordPress website simpler.
Version: 1.0
Author: Kyle Maurer
Author URI: http://realbigmarketing.com/staff/kyle
*/

/*
Tutorials and recources:

*/

//Generally I begin with a main plugin file (which would be this) and use it to assemble all the others together.
//It is good practice to segment your code into different files. This is a good technique for including them:
require_once (plugin_dir_path(__FILE__).'/admin/admin.php');
require_once (plugin_dir_path(__FILE__).'/shortcodes.php');


	//Use this command if you want your CSS on the backend
    //add_action('admin_enqueue_scripts', 'my_styles');

    //Use this command if you want your CSS on the frontend
    //add_action('wp_enqueue_scripts', 'my_styles');
	function my_styles() {
		
		//This is for setting a condition for when you want to include your style (if you don't want it everywhere)
		global $post_type; //variable for getting current post type if needed
        if ($post_type == 'my-post-type' || is_singular('my-post-type')) :

        	//Now we actually register the stylesheet
        wp_enqueue_style("starter-plugin", plugins_url("/css/style.css", __FILE__), FALSE); 
		endif;
}


//Now we'll include some javascript
	//first define the action (how), the hook (when) and finally the function (what)
    //add_action('wp_enqueue_scripts', 'my_cool_script');

	function my_cool_script() {
        wp_enqueue_script("coolscript", plugins_url("/js/script.js", __FILE__), FALSE);
}

//~JWP
//Here we are adding a filter function.
function addFootText($content) //$content is the content of the post being rendered
{
	$content .= "</br>";
	$content .= "This is some text";
	return $content; //return the content we wnat to be displayed. This content could be completely new content or just modified
	
	//For example, if you comment the return above and un-comment the return below the contents of the post 
	//will be compltely replaced. With three lines you can take a subset or all content offline in wordpress
	//return "We are experiencing technical difficulties and cannot display any content";
}

add_filter('the_content','addFootText');//connect the filter function we created to the_content filter hook.
//~JWP
?>