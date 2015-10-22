<?php
/*
* Plugin Name: WP Disable Autofill
* Plugin URI: http://andrewmgunn.com/wp-disable-autofill/
* Description: Disable the browser's ability to autofill forms and input fields. Ideal for forms with sensitive information and provides extra level of form submission security.
* Version: 1.4
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: wp-disable-autofill
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
//require_once('inc/options.php');

add_action( 'init', 'register_wpda_scripts' );

function register_wpda_scripts() {
	wp_register_script( 'wpda_script', plugins_url('inc/plugin-scripts.js', __FILE__), array('jquery'));
	wp_register_style( 'wdpa_style', plugins_url('inc/plugin-styles.css', __FILE__));
	wp_enqueue_script( 'wpda_script' );
	wp_enqueue_style( 'wdpa_style' );
}
