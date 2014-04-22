<?php
/*
* Creates the admin settings page and the options for the plugin
*/
add_action("admin_menu","don8_settings_page");

function don8_settings_page()
{
	add_menu_page("Don8","Don8","manage_options","don8.php", "don8_settings_body");
}

function don8_settings_body()
{
	if(isset($_POST["Don8Options"])) //Catches the fact that the submit button has been pressed
	{
		update_option("don8_paypal", $_POST["don8_paypal"]);
	}
	?>

	<div class="wrap don8-settings">		
		<form name="option-form" method="post">
		<b>Enter your PayPal e-mail address: </b>
		<input type="text" name="don8_paypal" value="<?php print get_option("don8_paypal"); ?>"/>
		<input type="submit" name="Don8Options" />
		</form>
	</div>
	<?php
}
?>