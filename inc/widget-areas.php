<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function tati_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'tati'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'tati'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__('Footer', 'tati'),
            'id'            => 'sidebar-footer',
            'description'   => esc_html__('Add widgets here.', 'tati'),
            'before_widget' => '<section id="%1$s" class="site-footer__item widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<div class="widget-title">',
            'after_title'   => '</div>',
        )
    );
}
add_action('widgets_init', 'tati_widgets_init');
