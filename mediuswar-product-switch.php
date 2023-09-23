<?php
/**
 * Plugin Name: Mediuswar Product Switch
 * Plugin URI: https://github.com/mediuswar-product-switch
 * Description: This plugin for the practice purpose
 * Version: 1.0.0
 * Author: Mediuswar
 * Author URI: https://yithemes.com/
 * Text Domain: mediuswar-product-switch
 */


defined( 'ABSPATH' ) || exit; // Exit if accessed directly.

if ( ! function_exists( 'mps_plugin_registration_hook' ) ) {
	require_once 'plugin-fw/plugin-register-hook.php';
}
register_activation_hook( __FILE__, 'mps_plugin_registration_hook' );



function enqueue_color_switcher_assets() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue your JavaScript file
    wp_enqueue_script('color-switcher', plugin_dir_url(__FILE__) . 'js/color-switcher.js', array('jquery'), time(), true);

    // Enqueue your CSS file
    wp_enqueue_style('color-switcher-style', plugin_dir_url(__FILE__) . 'css/color-switcher.css', array(), time() );
}

add_action('wp_enqueue_scripts', 'enqueue_color_switcher_assets');



function display_color_switcher() {
    // HTML for color switcher
    echo '<div class="color-switcher">
            <label for="color-select">Select Color:</label>
            <select id="color-select">
                <option value="red">Red</option>
                <option value="blue">Blue</option>
                <option value="green">Green</option>
            </select>
          </div>';
}

add_action('woocommerce_before_single_product', 'display_color_switcher');


function update_product_variation() {
    // Get the selected color from the AJAX request
    $selected_color = sanitize_text_field($_POST['selectedColor']);

    // Perform logic to fetch the product variation based on the selected color

    // Return the updated product information as JSON
    wp_send_json_success($updated_product_data);
}

add_action('wp_ajax_update_product_variation', 'update_product_variation');
add_action('wp_ajax_nopriv_update_product_variation', 'update_product_variation');






