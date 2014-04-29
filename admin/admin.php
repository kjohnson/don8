<?php
/*
* Creates the admin settings page and the options for the plugin
*/
add_action("admin_menu","don8_settings_page");

function don8_settings_page()
{
	add_submenu_page( 'options-general.php', 'Don8 Options', 'Don8', 'manage_options', 'don8', 'don8_settings_body' );
}

function don8_settings_body()
{
	$don8_email = $_POST["don8_paypal"];
	$don8_cause = $_POST["don8_cause"];
	if(isset($_POST["Don8Options"])) //Catches the fact that the submit button has been pressed
	{
		if (is_email($don8_email)) { update_option("don8_paypal", $don8_email);
		} else {
			$don8_email = '';
			update_option("don8_paypal", $don8_email);
		}
		update_option("don8_cause", $don8_cause);
	}
	?>

	<div class="wrap don8-settings">
		<form name="option-form" method="post">
			<table class="form-table">
				<tr valign="top">
					<th scope="row">Your PayPal e-mail address</th>
					<td><input type="text" name="don8_paypal" value="<?php print get_option("don8_paypal"); ?>"/></td>
				</tr>
				<tr valign="top">
					<th scope="row">Cause name</th>
					<td><input type="text" name="don8_cause" value="<?php esc_attr_e(get_option("don8_cause")); ?>"/></td>
				</tr>
			</table>
			<input type="submit" name="Don8Options" />
		</form>
	</div>
	<?php
}
?>