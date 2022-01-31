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

add_filter('bp_get_the_profile_field_name', function ($field_name) {
    if ($field_name === 'Voornaam') {
        return '<style>{font-family:bold}</style> Voornaam';
    }

    return $field_name;
});

// add_filter('bp_get_the_profile_field_lable', function ($field_name) {
//     if ($field_name === 'Voornaam') {
//         return '<style >Voornaam</style>';
//     }

//     return $field_name;
// });


function bp_change_required_label($translated_string, $field_id) {
    return '*';		
}

add_filter('bp_get_the_profile_field_required_label', 'bp_change_required_label', 10, 2);


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
