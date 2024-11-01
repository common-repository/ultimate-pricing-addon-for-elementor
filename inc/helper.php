<?php
namespace Elementor;

/**
 *  Initialize widgets
 */
function wpp_pricing_widget_int_helper(){
	Plugin::instance()->elements_manager->add_category(
		'wpp_pricing_element',
		[
			'title' => esc_html__( 'WPP Addon', 'wpp-pricing-addon' ),
			'icon' => 'font'
		],
		1
	);
}
add_action( "elementor/init", "Elementor\wpp_pricing_widget_int_helper" );
