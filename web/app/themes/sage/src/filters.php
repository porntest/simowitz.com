<?php

namespace App {

/**
 * Add <body> classes
 */
add_filter('body_class', function (array $classes) {
    // Add page slug if it doesn't exist
    if (is_single() || is_page() && !is_front_page()) {
        if (!in_array(basename(get_permalink()), $classes)) {
            $classes[] = basename(get_permalink());
        }
    }

    // Add class if sidebar is active
    if (display_sidebar()) {
        $classes[] = 'sidebar-primary';
    }

    return $classes;
});

/**
 * Add "… Continued" to the excerpt
 */
add_filter('excerpt_more', function () {
    return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
});

/**
 * Template Hierarchy should search for .blade.php files
 */
array_map(function ($type) {
    add_filter("{$type}_template_hierarchy", function ($templates) {
        return call_user_func_array('array_merge', array_map(function ($template) {
            $normalizedTemplate = str_replace('.', '/', sage('blade')->normalizeViewPath($template));
            return ["{$normalizedTemplate}.blade.php", "{$normalizedTemplate}.php"];
        }, $templates));
    });
}, [
    'index', '404', 'archive', 'author', 'category', 'tag', 'taxonomy', 'date', 'home',
    'front_page', 'page', 'paged', 'search', 'single', 'singular', 'attachment'
]);

/**
 * Render page using Blade
 */
add_filter('template_include', function ($template) {
    echo template($template, apply_filters('sage/template_data', []));

    // Return a blank file to make WordPress happy
    return get_template_directory() . '/index.php';
}, 1000);

/**
 * Tell WordPress how to find the compiled path of comments.blade.php
 */
add_filter('comments_template', 'App\\template_path');


/**
 * Allow SVG uploads through the WordPress uploader
 */
add_filter( 'upload_mimes', function ($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
});

/**
 * Allow gravityform labels to be hidden 
 */
add_filter( 'gform_enable_field_label_visibility_settings', '__return_true' );

/**
 * Loda gravityforms javascript in footer 
 */
add_filter('gform_init_scripts_footer', '__return_true');
add_filter( 'gform_cdata_open', 'wrap_gform_cdata_open', 1 );
}
namespace {
function wrap_gform_cdata_open( $content = '' ) {
if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
return $content;
}
$content = 'document.addEventListener( "DOMContentLoaded", function() { ';
return $content;
}
add_filter( 'gform_cdata_close', 'wrap_gform_cdata_close', 99 );
function wrap_gform_cdata_close( $content = '' ) {
if ( ( defined('DOING_AJAX') && DOING_AJAX ) || isset( $_POST['gform_ajax'] ) ) {
return $content;
}
$content = ' }, false );';
return $content;
}
}
