<?php

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('tati_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function tati_woocommerce_wrapper_before()
    {

?>
        <!-- <main id="primary" class="site-main"> -->
    <?php
    }
}
add_action('woocommerce_before_main_content', 'tati_woocommerce_wrapper_before');

if (!function_exists('tati_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function tati_woocommerce_wrapper_after()
    {

    ?>
        <!-- </main>  -->
        <!-- #main -->
<?php
    }
}
add_action('woocommerce_after_main_content', 'tati_woocommerce_wrapper_after');


// если это не конкретный шаблон страницы то вывести хлебные крошки
if (!is_page_template('page-home.php')) {
    add_action('tati_open_content_wrapper', 'woocommerce_breadcrumb', 20);
}
