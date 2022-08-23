<?php

/**
 * Enqueue scripts and styles.
 */
function tati_enqueue_scripts()
{
    wp_enqueue_style('tati-style', get_stylesheet_uri(), array(), _S_VERSION);
    // wp_style_add_data( 'tati-style', 'rtl', 'replace' );

    wp_enqueue_style('tati-main-styles', get_template_directory_uri() . '/assets/css/style.css', array(), _S_VERSION);

    wp_enqueue_script('tati-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array(), _S_VERSION, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'tati_enqueue_scripts');
