<?php
/*
 * Plugin Name:         Regex Textfield: Gravityforms Add-on
 * Plugin URI:          https://github.com/peshmerge/regex-textfield-gravityforms-add-on
 * Description:         A simple Gravity Form add-on to enable WordPress users to use Regex strings on textfield input.
 * Version:             1.1
 * Requires at least:   5.3
 * Requires PHP:        7.4
 * Author:              Peshmerge Morad
 * Author URI:          https://peshmerge.io
 * Text Domain:         gravity-forms-regex-textfield
 * License URI:         https://www.gnu.org/licenses/gpl-3.0.html
 */

if (!defined('ABSPATH')) {
    die();
}


const GF_Regex_Textfield_VERSION = '1.1';
add_action('gform_loaded', ['GF_Regex_Textfield_Bootstrap', 'load'], 5);

/**
 * Class GF_Regex_Textfield
 *
 * Handles the loading of the Regex Textfield Add-On and registers it with the Add-On Framework.
 */
class GF_Regex_Textfield_Bootstrap
{
    public static function load()
    {
        if (!method_exists('GFForms', 'include_addon_framework')) {
            return;
        }
        require_once 'class-gf-regex-textfield.php';
        GFAddOn::register('GFRegexTextfield');
    }
}

function gf_regex_textfield()
{
    return GFRegexTextfield::get_instance();
}