<?php

if (!class_exists('GFForms') || !defined('ABSPATH')) {
    die();
}

class GF_Regex_Textfield extends GF_Field_Text
{

    public $type = 'regex_textfield';

    /**
     * Returns the field's form editor icon.
     *
     * This could be an icon url or a dashicons class.
     *
     * @return string
     * @since 3.9.1
     *
     */
    public function get_form_editor_field_icon(): string
    {
        return gf_regex_textfield()->get_base_url() . '/img/gf_regex_textfield_icon.svg';
    }

    public function get_form_editor_field_title(): string
    {
        return esc_attr__(
            'Regex Textfield',
            'regex-textfield-gravityforms-add-on'
        );
    }

    /**
     * Returns the field's form editor description.
     *
     * @return string
     * @since 3.9.1
     *
     */
    public function get_form_editor_field_description(): string
    {
        return esc_attr__(
            'Allows users to add a text field which supports Regular expressions to restrict user input ',
            'regex-textfield-gravityforms-add-on'
        );
    }

    /**
     * Assign the Signature button to the Advanced Fields group.
     *
     * @return array
     */
    public function get_form_editor_button(): array
    {
        return array(
            'group' => 'advanced_fields',
            'text' => $this->get_form_editor_field_title()
        );
    }


    /**
     * Return the settings which should be available on the field in the
     * form editor.
     *
     * @return array
     */
    function get_form_editor_field_settings(): array
    {
        return array(
            'admin_label_setting',
            'conditional_logic_field_setting',
            'css_class_setting',
            'description_setting',
            'error_message_setting',
            'regex_textfield_setting',
            'label_placement_setting',
            'label_setting',
            'prepopulate_field_setting',
            'size_setting',
            'visibility_setting',
            'placeholder_setting',
            'rules_setting', // required-checkbox

        );
    }

    public function validate($value, $form): void
    {
        if (!empty($this->errorMessage)) {
            $this->validation_message = $this->errorMessage;
        } else {
            $this->validation_message = esc_attr__(
                'Your input must comply with the defined regular expression',
                'regex-textfield-gravityforms-add-on'
            );
        }


        /**
         * If required, then we need to check if the user has configured a regex string
         * If there's no regex string given in the backend, then validation fails
         */
        if ($this->isRequired && empty($this->regex_field)) {
            $this->failed_validation = true;
            $this->validation_message = esc_attr__(
                'Contact the website admins and notify them about unconfigured regex field',
                'regex-textfield-gravityforms-add-on'
            );
            return;
        }

        // If there's a regex string defined, then check if the input comply with the regex
        if (!empty($value) && !preg_match('/^' . $this->regex_field . '$/', $value, $output_array)) {
            $this->failed_validation = true;
        }
    }


    public function get_field_input($form, $value = '', $entry = null)
    {
        $this->isRequired = true;
        return parent::get_field_input($form, $value = '', $entry = null);
    }

    /**
     * Returns the scripts to be included for this field type in the form editor.
     *
     * @return string
     */
    public function get_form_editor_inline_script_on_page_render(): string
    {
        // set the default field label
        return <<<EOT
        function SetDefaultValues_regext_textfield(field) {
        field.label = "{$this->get_form_editor_field_title()}";
        }
        // initialize the fields custom settings
        jQuery(document).bind('gform_load_field_settings', function (event, field, form) {
        var regex_field = field.regex_field == undefined ? '' :field.regex_field;
        jQuery('#field_regex_textfield').val(regex_field);
        jQuery('#field_regex_textfield').on('input', function(){SetFieldProperty('regex_field', this.value);});
        jQuery('#field_regex_textfield').val(
        field.regex_field == undefined || field.regex_field === false ? '' : field.regex_field);
        });
        EOT;
    }

}

GF_Fields::register(new GF_Regex_Textfield());