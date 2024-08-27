<?php
/**
 * Plugin Name: Numbers & how they are pronounced
 * Description: Ett plugin som säger siffran på tyska.
 * Version: 1.0
 * Author: Karin Ekenberg
 */

  //basic security
  if(!defined('ABSPATH')){
    echo 'You should not be here!';
    exit;
}


function num_pronounced_enqueue_assets() {
    wp_enqueue_style('num-pronounced-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('num-pronounced-script', plugin_dir_url(__FILE__) . 'js/script.js', array('jquery'), null, true);
    wp_localize_script('num-pronounced-script', 'pluginDir', array('url' => plugin_dir_url(__FILE__)));
}
add_action('wp_enqueue_scripts', 'num_pronounced_enqueue_assets');



function num_pronounced_display_images() {
    $output = '<div class="num-pronounced-gallery">';
    $numbers = array('eins', 'zwei', 'drei', 'vier', 'funf', 'sechs', 'sieben', 'acht', 'neun');

    foreach ($numbers as $number) {
        $output .= '<div class="num-pronounced-item">';
        $output .= '<img src="' . plugin_dir_url(__FILE__) . 'images/' . $number . '.png" alt="' . $number . '" data-sound="' . $number . '">';
        $output .= '</div>';
    }

    $output .= '</div>';
    return $output;
}
add_shortcode('num_pronounced', 'num_pronounced_display_images');
