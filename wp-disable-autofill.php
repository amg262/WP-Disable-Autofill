<?php
/*
* Plugin Name: WP Disable Autofill
* Plugin URI: http://andrewmgunn.com/wp-disable-autofill/
* Description: Disable the browser's ability to autofill forms and input fields. Ideal for forms with sensitive information and provides extra level of form submission security.
* Version: 1.3.2
* Author: Andrew M. Gunn
* Author URI: http://andrewmgunn.com
* Text Domain: wp-disable-autofill
* License: GPL2
*/

defined( 'ABSPATH' ) or die( 'Plugin file cannot be accessed directly.' );
require_once('inc/options.php');

add_action( 'admin_init', 'register_disable_autofill' );

function register_disable_autofill() {
	add_action( 'wp_enqueue_scripts', 'register_wpda_scripts' );
	add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wp_disable_autofill_action_links' );
}

function register_wpda_scripts() {
	wp_register_script( 'wpda_script', plugins_url('inc/plugin-scripts.js', __FILE__), array('jquery'));
	wp_register_style( 'wdpa_style', plugins_url('inc/plugin-styles.css', __FILE__));
	wp_enqueue_script( 'wpda_script' );
	wp_enqueue_style( 'wdpa_style' );
}

function wp_disable_autofill_action_links( $links ) {
   $links[] = '<a href="'. esc_url( get_admin_url(null, 'options-general.php?page=wp-disable-autofill-settings') ) .'">Settings</a>';
   return $links;
}
