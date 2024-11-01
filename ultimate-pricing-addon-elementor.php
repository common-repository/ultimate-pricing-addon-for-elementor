<?php
/**
 * Plugin Name: Ultimate Pricing Addon For Elementor
 * Description: The ultimate elements library for Elementor page builder plugin for WordPress.
 * Plugin URI: http://wppixels.com/el-price-addon
 * Author: WPPixels
 * Version: 1.0.0
 * Author URI: http://wppixels.com/
 * Text Domain: wpp-pricing-addon
 * Domain Path: /language
 *
 */

require_once 'inc/helper.php';

/**
 * Register widget
 */
function wpp_price_addon_init(){
	require_once "modules/style1.php";
}
add_action( "elementor/widgets/widgets_registered", "wpp_price_addon_init" );

/**
 * Enqueue style
 */
function wpp_price_scripts(){
	wp_enqueue_style( 'wpp_style', plugins_url( 'assets/css/style-1.css', __FILE__ ) );
}
add_action( "wp_enqueue_scripts", "wpp_price_scripts" );

