<?php

/**
 * Add scripts
 */

 function egbcm_add_scripts(){

    // Add Main CSS
    wp_enqueue_style('egbcm-main-style', plugins_url().'/EGBSubscriber/css/style.css');

    // Add Main JS
    wp_enqueue_script('egbcm-main-script', plugins_url().'/EGBSubscriber/js/main.js');

 }

 add_action('wp_enqueue_scripts', 'egbcm_add_scripts');

?>