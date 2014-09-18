<?php
/*
* Creates the admin settings page and the options for the plugin
* tut here: http://www.wphub.com/tutorials/creating-simple-options-page/
*/
class don8Settings {

	private $pre = 'don8';

	public function __construct() {
	add_action('admin_menu','settings_page');
	add_action( 'admin_init', 'register_settings' );
	}
	public function settings_page() {
		add_submenu_page( 'options-general.php',
			'Don8 Options',
			'Don8',
			'manage_options',
			'don8',
			array( $this, 'body' )
		);
	}
	public function register_settings() {
		add_option( 'don8_paypal_email', '');
		add_option( 'don8_cause', '');
		add_option( 'don8_value', '');
		register_setting( 'don8_settings', 'don8_paypal_email' );
		register_setting( 'don8_settings', 'don8_cause' );
		register_setting( 'don8_settings', 'don8_value' );
	}

	public function body() { ?>
	<div class="wrap">
		<?php screen_icon(); ?>
		<h2>Don8 Options</h2>
		<form method="post" action="options.php">
			<?php settings_fields( 'don8_settings' ); ?>
			<h3>Configuration</h3>
				<p>Here you can set the default values for your donation button.</p>
				<table class="form-table">
					<tr valign="top">
						<th scope="row"><label for="don8_paypal_email">Paypal e-mail</label></th>
						<td><input type="text" id="don8_paypal_email" name="don8_paypal_email" value="<?php echo get_option('don8_paypal_email'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="don8_cause">Cause</label></th>
						<td><input type="text" id="don8_cause" name="don8_cause" value="<?php echo get_option('don8_cause'); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="don8_value">Amount</label></th>
						<td><input type="text" id="don8_value" name="don8_value" value="<?php echo get_option('don8_value'); ?>" /></td>
					</tr>
				</table>
			<?php submit_button(); ?>
		</form>
	</div>
	<?php
	}
}
$don8 = new don8Settings();