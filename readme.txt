=== Don8 ===
Contributors: BrashRebel
Donate link: http://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=admin%40realbigmarketing%2ecom
Tags: donations, donate, fundraising, paypal, widget
Requires at least: 3.8.0
Tested up to: 4.0
Stable tag: 0.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

Don8 is an incredibly easy to use, very straightforward WordPress plugin, used for placing a PayPal donate button on your site. The plugin comes with settings for defining defaults for:

* Cause,
* Amount,
* PayPal email address,
* Currency
* Button image

To use, simply place the `[don8]` shortcode in your content and the settings defaults will be used. Shortcode parameters can be used to override the default settings. Here is an example:

`[don8 cause="Adoption Fund"
currency="USD"
email="kyle@test.com"
amount="10000000000"
button="http://example.com/images/button.png"]`

This example would render a PayPal button which, when clicked on, would take the user to a PayPal screen where they can enter in their payment information to make a donation to kyle@test.com for $10,000,000,000 towards the Adoption Fund.

== Installation ==

1. Download the latest version
2. Upload uncompressed package to `wp-content/plugins`
3. Activate on the Plugins page in your dashboard
4. Configure default settings in Settings - >Don8

== Screenshots ==

1. Settings page
2. Using the shortcode in a post
3. Viewing the button on the front end with output HTML shown
4. Don8 widget

== Frequently Asked Questions ==

= What is this plugin for? =

I made this plugin because I spent a good deal of time looking for a donation plugin which was truly simple. I found many, many which were truly great but not SIMPLE. Don8 is intended to be incredibly easy to use and quick to configure.

= What can we look for in upcoming releases? =

I would like to incorporate some of the following:

* Option to show text fields so end users could define things like the amount on their own
* Alternative payment gateways
* Added options for displaying the button in other places throughout a site
* Ability to create an HTML/CSS button

= How can I suggest improvements? =

First of all, if you do, I will be completely excited. Nothing makes me want to work on a plugin and make it better more than someone taking the time to tell me they're using it and have ideas for improvement.

So if you do, the support forum here is fine but posting [issues here](http://github.com/brashrebel/don8) would be absolutely ideal.

== Changelog ==

= 0.4 =

* Added Don8 widget with settings for overriding global defaults
* Implemented image uploader option in main settings and in widget
* Added `button` parameter for `[don8]` shortcode
* Added some more data sanitization for greater security

= 0.3 =

* Added Don8 button to TinyMCE editor which inserts the `[don8]` shortcode

= 0.2 =

* Implemented data sanitization in numerous places for added security
* Refactored codebase to be primarily OOP
* Added currency setting and shortcode parameter
* Implemented `is_email()` validation for email setting

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