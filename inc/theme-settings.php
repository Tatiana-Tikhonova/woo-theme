<?php

/**
 * базовый функционал темы
 */
if (!function_exists('tati_setup')) :
    function tati_setup()
    {
        /*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on tati, use a find and replace
		* to change 'tati' to the name of your theme in all the template files.
		*/
        load_theme_textdomain('tati', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
        add_theme_support('title-tag');

        /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'tati'),
            )
        );

        /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'tati_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 9999,
                'width'       => 300,
                'flex-width'  => true,
                'flex-height' => true,
                'header-text' => array('site-title', 'site-description'),
                'unlink-homepage-logo' => true,
            )
        );
    }
endif;
add_action('after_setup_theme', 'tati_setup');

/**
 * @global int $content_width
 */
function tati_content_width()
{
    $GLOBALS['content_width'] = apply_filters('tati_content_width', 640);
}
add_action('after_setup_theme', 'tati_content_width', 0);
