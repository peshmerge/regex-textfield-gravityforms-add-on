=== Regex Textfield: Gravityforms Add-on ===

Contributors: peshmerge
Tags: gravityforms, gravity form, regex
Donate link: https://buymeacoffee.com/peshmerge
Requires at least: 5.5
Tested up to: 6.6
Stable tag: 1.2
Requires PHP: 8.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A WordPress plugin and GravityForms addon to enable users to use regex string on text input field to control user input.

== Description ==

This plugin is created to enable WordPress site owners to specify a regex string to be used with Gravity Forms text fields.
Once a regex string is specified, the user can't submit that form until the user enters a text that comply with the regex string.

== Installation ==

1. Upload the plugin folder to your /wp-content/plugins/ folder.
2. Go to the **Plugins** page and activate the plugin.
3. Create a GravityForm form and go the edit page.
4. Within the Advanced Fields section in the editor, select "Regex Textfield".
5. In the General tab of the Field Settings fill in the regex string you want.
6. In the Appearance tab of the Field Settings, you can specify the 
"Custom Validation Message". This message will be shown to the user when a wrong
input is given is submitted.

== Frequently Asked Questions ==

= How do I use this plugin? =

This plugin requires you to have Gravity Forms installed (min version 2.5).

= How to uninstall the plugin? =

Simply deactivate and delete the plugin.

== Screenshots ==
1. General tab of the Regex Textfield field in the form editor.
2. General tab of the Regex Textfield field with a filled in regex string.
3. Appearance tab of the Regex Textfield field with a custom validation message.
4. Form preview with the Regex Textfield field with an incorrect input.
5. Form preview with the Regex Textfield field where the field is set to be required, but no regex string is defined.

== Changelog ==

= 1.2 =
* New:      Tested with WP 6.6.2.
* New:      Added an example to the field tooltip.
* New:      Run the Plugin check to make sure the plugin comply with the WordPress guidelines


= 1.1 =
* New:      Added support for placeholder to the field.
* Fixed:    Corrected typos and did some minor code reformating

= 1.0 =
* Plugin released.
