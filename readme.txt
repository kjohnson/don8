=== Don8 ===
Contributors: BrashRebel
Tags: donations, donate, fundraising, paypal
Requires at least: 3.7.0
Tested up to: 4.0
Stable tag: 0.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Don8 is an incredibly easy to use, very straightforward WordPress plugin, used for placing a PayPal donate button on your site. The plugin comes with settings for defining defaults for:
* Cause
* Amount
* PayPal email address
* Currency

To use, simply place the `[don8]` shortcode in your content and the settings defaults will be used. Shortcode parameters can be used to override the default settings. Here is an example:

`[don8 cause="Adoption Fund" currency="USD" email="kyle@test.com" amount="10000000000"]`

This example would render a PayPal button which, when clicked on, would take the user to a PayPal screen where they can enter in their payment information to make a donation to kyle@test.com for $10,000,000,000 towards the Adoption Fund.

== Installation ==

1. Download the latest version
1. Upload uncompressed package to `wp-content/plugins`
1. Activate on the Plugins page in your dashboard


== Frequently Asked Questions ==


= What is this plugin for? =

I made this plugin because I spent a good deal of time looking for a donation plugin which was truly simple. I found many, many which were truly great but not SIMPLE. Don8 is intended to be incredibly easy to use and quick to configure.

= What can we look for in upcoming releases? =

I would like to incorporate some of the following:

* Option to show text fields so end users could define things like the amount on their own
* A sidebar widget which renders a button and has options for overriding the defaults

== Changelog ==

= 0.2 =

* Implemented data sanitization in numerous places for added security
* Refactored codebase to be primarily OOP
* Added currency setting and shortcode parameter
* Implemented `is_email()` validation for email setting
*

= 0.1.4 =

* Added value option for setting default donation amount
* Added value parameter to `[don8]` shortcode
* Included value option in the button code

= 0.1.3 =

* Properly render `[don8]` shortcode
* Added cause parameter to `[don8]` shortcode
* Added email parameter to `[don8]` shortcode

= 0.1.2 =

* Initial release.
* Created settings page
* Option for saving PayPal e-mail address
* Option for saving cause