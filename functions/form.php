<?php
// HTML form
// Code from here https://www.paypal.com/uk/cgi-bin/webscr?cmd=_pdn_donate_techview_outside
function don8_form($atts, $content = null) {
// Get values from Don8 options
$don8_email = get_option('don8_paypal_email');
$don8_cause = esc_attr(get_option('don8_cause'));
$don8_value = esc_attr(get_option('don8_value'));
// Set Don8 options and defaults for parameters
  extract(shortcode_atts(array(
     'cause' => $don8_cause,
     'email' => $don8_email,
     'value' => $don8_value,
    ), $atts));

$don8_form = '<form name="_xclick" action="https://www.paypal.com/uk/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_xclick">
<input type="hidden" name="business" value="'.$email.'">
<input type="hidden" name="item_name" value="'.$cause.'">
<input type="hidden" name="currency_code" value="GBP">
<input type="hidden" name="amount" value="'.$value.'">
<input type="image" src="http://www.paypal.com/en_GB/i/btn/x-click-butcc-donate.gif" border="0" name="submit" alt="Donate to '.$cause.'">
</form>';
return $don8_form;
}
?>