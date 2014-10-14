<?php
/*
Plugin Name: Don8
Description: Making donations on your WordPress website simpler.
Version: 0.4
Author: Kyle Maurer
Author URI: http://realbigmarketing.com/staff/kyle
*/

/**
 * Tutorials and resources:
 * http://code.tutsplus.com/tutorials/guide-to-creating-your-own-wordpress-editor-buttons--wp-30182
 * https://github.com/joelworsham/backend-media-uploader
 * http://davidwalsh.name/php-ternary-examples
 * https://tommcfarlin.com/add-javascript-in-wordpress/
 */
// Include the back-end media uploader!
require_once( plugin_dir_path( __FILE__ ) . '/functions/uploader.php' );
require_once( plugin_dir_path( __FILE__ ) . '/admin/admin.php' );
require_once( plugin_dir_path( __FILE__ ) . '/admin/widget.php' );
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

// Add the don8 shortcode button
function don8_add_buttons( $plugin_array ) {
	$plugin_array['don8'] = plugins_url( '/js/script.js', __FILE__ );

	return $plugin_array;
}

// Register the shortcode button for TinyMCE
function don8_register_buttons( $buttons ) {
	array_push( $buttons, 'don8' );

	return $buttons;
}

// Give the TinyMCE button a $ instead of an image
function don8_tinymce_button_style() {
	echo '<style>i.mce-i-don8:before { content: "$"; }</style>';
}

// Necessary scripts and styling for backend stuff
function don8_scripts( $hook ) {
	if ( $hook == 'widgets.php' || $hook == 'settings_page_don8' ) {
		wp_enqueue_style( 'don8', plugins_url( '/css/style.css', __FILE__ ) );
		wp_enqueue_script( 'don8', plugins_url( '/js/script.js', __FILE__ ), array( 'jquery' ) );
		wp_enqueue_media();
	}
}

add_action( 'admin_enqueue_scripts', 'don8_scripts' );

function don8_stripe( $args ) {
	$args = array(
		'id' => '',
		'text' => '',
		'key' => '',
		'image' => '',
		'amount' => 5,
		'name' => '',
		'description' => ''
	);
	?>
	<script src="https://checkout.stripe.com/checkout.js"></script>
	<button id="customButton">Purchase</button>
<script>
  var handler = StripeCheckout.configure({
    key: 'pk_test_6pRNASCoBOKtIshFeQd4XMUh',
    image: '/square-image.png',
    token: function(token) {
		// Use the token to create the charge with a server-side script.
		// You can access the token ID with `token.id`
	}
  });

  document.getElementById('customButton').addEventListener('click', function(e) {
	  // Open Checkout with further options
	  handler.open({
      name: 'Demo Site',
      description: '2 widgets ($20.00)',
      amount: <?php echo $args['amount']; ?>
    });
    e.preventDefault();
  });
</script>
<?php }
add_action('the_post', 'don8_stripe');