<?php
/**
 * Plugin Name: Color Box Plugin
 * Description: Ett plugin som visar en ruta som ändrar färg vid klick.
 * Version: 1.0
 * Author: Karin Ekenberg
 */

function color_box_enqueue_scripts() {
    wp_enqueue_script('color-box-script', plugins_url('/color-box-script.js', __FILE__), array('jquery'), '1.0', true);
    wp_enqueue_style('color-box-style', plugins_url('/color-box-style.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'color_box_enqueue_scripts');

function color_box_shortcode() {
    return '<div id="color-box" class="color-box"></div>';
}

add_shortcode('color_box', 'color_box_shortcode');
