<?php
// HTML form
// Code from here https://www.paypal.com/uk/cgi-bin/webscr?cmd=_pdn_donate_techview_outside
function don8_form() { ?>
<form name="_xclick" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="<?php echo get_option("don8_paypal"); ?>">
<input type="hidden" name="item_name" value="Team In Training">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="amount" value="25.00">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
</form>
<?php }
?>