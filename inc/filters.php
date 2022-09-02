<?php

/**
 * Change logo classes
 */

function tati_change_logo_class($html)
{
    $html = str_replace('custom-logo', 'site-branding__logo', $html);
    $html = str_replace('custom-logo-link', 'site-branding__logo-link', $html);

    return $html;
}
add_filter('get_custom_logo', 'tati_change_logo_class');
/**
 * Main menu filters
 */


/**
 * Function for `nav_menu_submenu_css_class` filter-hook.
 * 
 * @param string[] $classes Array of the CSS classes that are applied to the menu `<ul>` element.
 * @param stdClass $args    An object of `wp_nav_menu()` arguments.
 * @param int      $depth   Depth of menu item. Used for padding.
 *
 * @return string[]
 */
function tati_submenu_css_class_filter($classes, $args, $depth)
{

    if ('menu-1' == $args->theme_location) {

        $level = $depth + 1;
        $classes[] = 'main-menu__sub-menu sub-menu_level-' . $level;
    }

    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'tati_submenu_css_class_filter', 10, 3);

/**
 * Function for `nav_menu_css_class` filter-hook.
 * 
 * @param string[] $classes   Array of the CSS classes that are applied to the menu item's `<li>` element.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args      An object of wp_nav_menu() arguments.
 * @param int      $depth     Depth of menu item. Used for padding.
 *
 * @return string[]
 */
function tati_menu_css_class_filter($classes, $menu_item, $args, $depth)
{

    if ('menu-1' == $args->theme_location) {
        if (0 == $depth) {

            $classes[] = 'main-menu__item';
        } else {
            $classes[] = 'sub-menu__item sub-menu__item_level-' . $depth;
        }
    }

    return $classes;
}
add_filter('nav_menu_css_class', 'tati_menu_css_class_filter', 10, 4);

/**
 * Function for `nav_menu_link_attributes` filter-hook.
 * 
 * @param array    $atts      The HTML attributes applied to the menu item's `<a>` element, empty strings are ignored.
 * @param WP_Post  $menu_item The current menu item object.
 * @param stdClass $args      An object of wp_nav_menu() arguments.
 * @param int      $depth     Depth of menu item. Used for padding.
 *
 * @return array
 */
function tati_menu_link_attributes_filter($atts, $menu_item, $args, $depth)

{

    if ('menu-1' == $args->theme_location) {
        if (0 == $depth) {
            $atts['class'] = 'main-menu__link menu-link';
        } else {
            $atts['class'] = 'menu-link sub-menu__link sub-menu__link_level-' . $depth;
        }
    }

    return $atts;
}
add_filter('nav_menu_link_attributes', 'tati_menu_link_attributes_filter', 10, 4);


/**
 * Function for `walker_nav_menu_start_el` filter-hook.
 * 
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $menu_item   Menu item data object.
 * @param int      $depth       Depth of menu item. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 *
 * @return string
 */
function tati_filter_walker_nav_menu_start_el($item_output, $item, $depth, $args)
{
    if ('menu-1' == $args->theme_location) {
        if ($item->current == 1) {
            $item_output = '<span class="current-menu-item-text">' . $item->title . '</span>';
        }

        if (1 == in_array('menu-item-has-children', $item->classes)) {
            0 == $depth ? $class = 'main-menu__item-after' : $class = 'sub-menu__item-after';

            $item_output .= '<span class="' . $class . '">
							<svg class="menu-item-after-svg" width="13" height="8" viewBox="0 0 13 8" xmlns="http://www.w3.org/2000/svg">
							<path d="M6.5 7L0 0H13L6.5 7Z"/>
							</svg>
							</span>';
        }
    }


    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'tati_filter_walker_nav_menu_start_el', 10, 4);

/**
 * замена текста на кнопке товара в цикле
 */
add_filter('woocommerce_product_add_to_cart_text', 'custom_woocommerce_product_add_to_cart_text');
function custom_woocommerce_product_add_to_cart_text()
{
    global $product;
    $product_type = $product->get_type();
    switch ($product_type) {
        case 'external':
            return 'Перейти';
            break;
        case 'grouped':
            return 'Посмотреть';
            break;
        case 'simple':
            return 'В корзину';
            break;
        case 'variable':
            return 'Выбрать';
            break;
        default:
            return 'Подробнее';
    }
}

add_filter('woocommerce_upsell_display_args', 'tati_woocommerce_upsell_display_args_filter');

/**
 * Function for `woocommerce_upsell_display_args` filter-hook.
 * 
 * @param  $array 
 *
 * @return 
 */
function tati_woocommerce_upsell_display_args_filter($array)
{
    $array['posts_per_page'] = $array['columns'];
    return $array;
}
add_filter('woocommerce_output_related_products_args', 'tati_woocommerce_output_related_products_args_filter');

/**
 * Function for `woocommerce_output_related_products_args` filter-hook.
 * 
 * @param  $args 
 *
 * @return 
 */
function tati_woocommerce_output_related_products_args_filter($args)
{

    $args['posts_per_page'] = 4;
    $args['columns'] = 4;
    return $args;
}
