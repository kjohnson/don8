<?php
/*
Plugin Name: Don8
Description: Making donations on your WordPress website simpler.
Donate link: http://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=admin%40realbigmarketing%2ecom
Version: 0.3
Author: Kyle Maurer
Author URI: http://realbigmarketing.com/staff/kyle
*/

/**
 * Tutorials and resources:
 * http://code.tutsplus.com/tutorials/guide-to-creating-your-own-wordpress-editor-buttons--wp-30182
*/

require_once( plugin_dir_path( __FILE__ ) . '/admin/admin.php' );
require_once( plugin_dir_path( __FILE__ ) . '/functions/form.php' );

/**
 * Tiny MCE button
 */
add_action( 'init', 'don8_buttons' );
add_action( 'admin_print_styles', 'don8_tinymce_button_style' );
function don8_buttons() {
	add_filter( "mce_external_plugins", "don8_add_buttons" );
	add_filter( 'mce_buttons', 'don8_register_buttons' );
}

function don8_add_buttons( $plugin_array ) {
	$plugin_array['don8'] = plugins_url( '/js/script.js', __FILE__ );

	return $plugin_array;
}

function don8_register_buttons( $buttons ) {
	array_push( $buttons, 'don8' );
	return $buttons;
}

function don8_tinymce_button_style() {
	echo '<style>i.mce-i-don8:before { content: "$"; }</style>';
}