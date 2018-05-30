<?php
/*
Plugin Name: Egberghs Newsletter Subscriber From
Plugin URI: https://github.com/RobinMglsk/WP_EGBMailCampaignSubscriber
Description: Display a form to subscribe to a mailing list on the Egberghs Campaign Platform.
Version: 0.0.2
Author: RobinMglsk
Author URI: https://robinmglsk.com
*/

// Exit if accessed directly
if(!defined('ABSPATH')) exit;

// Load scripts
require_once(plugin_dir_path(__FILE__).'/includes/EGBSubscriber_scripts.php');

// Load class
require_once(plugin_dir_path(__FILE__).'/includes/EGBSubscriber_class.php');

// Register class
function register_egbsubscriber(){
    register_widget('EGBSubscriber_widget');
}

// Hook in function
add_action('widgets_init', 'register_egbsubscriber');

?>