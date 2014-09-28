<?php
/**
 * Created by PhpStorm.
 * User: kylemaurer
 * Date: 9/27/14
 * Time: 10:58 AM
 */

add_action( 'init', 'wptuts_buttons' );
function wptuts_buttons() {
    add_filter( "mce_external_plugins", "wptuts_add_buttons" );
    add_filter( 'mce_buttons', 'wptuts_register_buttons' );
}
function wptuts_add_buttons( $plugin_array ) {
    $plugin_array['wptuts'] = plugin_url() . '/js/scripts.js';
    return $plugin_array;
}
function wptuts_register_buttons( $buttons ) {
    array_push( $buttons, 'dropcap', 'showrecent' ); // dropcap', 'recentposts
    return $buttons;
}
echo plugin_uri() . '/js/scripts.js';