<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;


// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');


/*
ADDED BY HAND
*/


function my_theme_enqueue_styles()
{
    $parent_style = 'parent-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get("Version")
    );
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');


//Custom validation for voornaam, achternaam en nickname
add_action('bp_signup_validate', function () {

    $bp = buddypress();


    if (isset($bp->signup->errors['field_1'])) {
        $bp->signup->errors['field_1'] = sprintf(
            '<div class="bp-messages bp-feedback error">
								<p>%s</p>
							</div>',
            'Voornaam is een verplicht veld.'
        );
    }


    if (isset($bp->signup->errors[' legal_agreement'])) {
        $bp->signup->errors[' legal_agreement'] = sprintf(
            '<div class="bp-messages bp-feedback error">
								<p>%s</p>
							</div>',
            'Voornaam is een verplicht veld.'
        );
    }



    if (empty($field_id)) {
        echo 'not empty';
    }

    if (isset($bp->signup->errors['field_2'])) {
        $bp->signup->errors['field_2'] = sprintf(
            '<div class="bp-messages bp-feedback error">
								<p>%s</p>
							</div>',
            'Achternaam is een verplicht veld.'
        );
    }

    if (isset($bp->signup->errors['field_3'])) {
        $bp->signup->errors['field_3'] = sprintf(
            '<div class="bp-messages bp-feedback error">
								<p>%s</p>
							</div>',
            'Gebruikersnaam is een verplicht veld.'
        );
    }
});


function my_message_text($message)
{
    $message = "Message code here for anything you want in email";
}
add_filter('bp_core_signup_send_validation_email_message', 'my_message_text');



add_action('bp_core_validate_email_address', function (WP_Error $errors, $validation_results) {
    $bp = buddypress();
    $email = $_POST['signup_email'];



    if (!isset($email)) {
        $bp->signup->errrors['singup_email'] = 'Email adress verplicht';
    }
});
add_filter('bp_core_add_validation_error_messages', 'validate_email_bp_register', 10, 1);


function validate_email_bp_register(WP_Error $errors, $validation_results)
{

    $bp = buddypress();

    if (!empty($validation_results['invalid'])) {
        $bp->$errors->printf(sprintf(
            '<div class="bp-messages bp-feedback error">
								<p>%s</p>
							</div>',
            'Gebruikersnaam is een verplicht veld.'
        ));
    }
};



function bp_change_required_label($translated_string, $field_id)
{
    return '*';
}

add_filter('bp_get_the_profile_field_required_label', 'bp_change_required_label', 10, 2);


function validate_email_edu()
{

    global $bp;

    $email = $bp->signup->email;

    if ($email) {

        $tld_index = strrpos($email, '.');
        $tld = substr($email, $tld_index);

        if ($tld == '') {
            $bp->signup->errors['signup_email'] = 'Sorry, you must have a .edu email address to register.';
        }
    }
}

add_action('bp_signup_validate', 'validate_email_edu');


/*
ADDED BY HAND
*/

if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('buddyboss-theme-fonts', 'buddyboss-theme-magnific-popup-css', 'buddyboss-theme-select2-css', 'buddyboss-theme-css', 'buddyboss-theme-buddypress'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION
