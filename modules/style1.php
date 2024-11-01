<?php namespace Elementor;

if( ! defined( 'ABSPATH' ) ) exit;

class WPP_Pricing_Addon extends Widget_Base{
    //
	public function get_name() {
		return 'wpp_pricing_addon';
	}
    //
	public function get_title() {
		return __( 'WPP Price Table', 'wpp-pricing-addon' );
	}
    //
	public function get_icon(){
		return 'dashicons dashicons-grid-view';
	}
    //
	public function get_categories(){
		return [ 'wpp_pricing_element' ];
	}
    //
	protected function _register_controls() {
		//Heading
		$this->start_controls_section(
			'wpp_pricing_panel_heading',
			[
				'label' => esc_html__( 'Price Content', 'wpp-pricing-addon' )
			]
		);

        //
		$this->add_control(
			'wpp_price_addon_heading',
			[
				'label'         => esc_html__( 'Heading', 'wpp-pricing-addon' ),
				'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'separator'     => 'before',
				'default'       => esc_html__( 'Standard', 'wpp-pricing-addon' )
			]
		);

        //
		$this->add_control(
			'wpp_price_addon_price',
			[
				'label'         => esc_html__( 'Price', 'wpp-pricing-addon' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'separator'     => 'before',
				'default'       => esc_html__( '10', 'wpp-pricing-addon' )
			]
		);

		//
		$this->add_control(
			'wpp_price_addon_currency',
			[
				'label'         => esc_html__( 'Currency', 'wpp-pricing-addon' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'separator'     => 'before',
				'default'       => esc_html__( '$', 'wpp-pricing-addon' )
			]
		);

		//Unit Name
		$this->add_control(
			'wpp_price_addon_unit_name',
			[
				'label'         => esc_html__( 'Unit Name', 'wpp-pricing-addon' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'separator'     => 'before',
				'default'       => esc_html__( '/month', 'wpp-pricing-addon' )
			]
		);

		//Repeater List
		$repeater = new \Elementor\Repeater();
        //
		$repeater->add_control(
			'wpp_pricing_addon_icon',
			[
				'label' => __( 'Icon', 'wpp-pricing-addon' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-star',
					'library' => 'solid',
				],
			]
		);
        //
		$repeater->add_control(
			'wpp_pricing_addon_feature', [
				'label' => __( 'Text', 'wpp-pricing-addon' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Feature Text' , 'wpp-pricing-addon' ),
				'label_block' => true,
				'separator'     => 'before',
			]
		);
        //
		$this->add_control(
			'wpp_pricing_addon_feature_list',
			[
				'label' => __( 'Features', 'wpp-pricing-addon' ),
				'type' => Controls_Manager::REPEATER,
				'separator'     => 'before',
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'feature_text' => __( '50GB Disk Space', 'wpp-pricing-addon' ),
                        'feature_icon'  => 'fa fa-cloud'
					],
				],
				'title_field' => '{{{ wpp_pricing_addon_feature }}}',
			]
		);

		//Button Text
		$this->add_control(
			'wpp_price_addon_button_text',
			[
				'label'         => esc_html__( 'Button Text', 'wpp-pricing-addon' ),
				'type'          => Controls_Manager::TEXT,
				'label_block'   => true,
				'separator'     => 'before',
				'default'       => esc_html__( 'Sign Up', 'wpp-pricing-addon' )
			]
		);

		//Button URL
		$this->add_control(
			'wpp_price_addon_button_url',
			[
				'label'         => esc_html__( 'Button Link', 'wpp-pricing-addon' ),
				'type'          => Controls_Manager::URL,
				'label_block'   => true,
				'separator'     => 'before',
				'show_external' => true,
				'default' => [
					'url' => '#',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		$this->end_controls_section();

        /*
         * Start General Style Section
         */
        $this->start_controls_section(
            'wpp_price_addon_general_style',
            [
                'label' => esc_html__( 'General', 'wpp-pricing-addon' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        $this->add_control(
	        'wpp_price_addon_bg_color',
	        [
		        'label' => esc_html__('Background Color', 'wpp-pricing-addon'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' =>[
			        '{{WRAPPER}} .wpp-pricing-table' => 'background-color: {{VALUE}}',
		        ]
	        ]
        );
        //Gradient color
		$this->add_control(
			'wpp_price_addon_gradient_color',
			[
				'label' => esc_html__('Gradient Color', 'wpp-pricing-addon'),
				'type' => Controls_Manager::COLOR,
				'selectors' =>[
					'{{WRAPPER}} .wpp-pricing-table:before' => 'background: linear-gradient({{VALUE}}, transparent)',
				]
			]
		);
        //Border
		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'wpp_price_addon_bg_border',
				'label' => esc_html__( 'Border', 'wpp-pricing-addon' ),
				'selector' => '{{WRAPPER}} .wpp-pricing-table',
			]
		);
        //Border Radius
		$this->add_control(
			'wpp_price_addon_bg_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'wpp-pricing-addon' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%' ],
				'selectors' => [
					'{{WRAPPER}} .wpp-pricing-table' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->end_controls_section();
        /*
         * End General Style Section
         */

		/*
		 * Start Header Style Section
		 */
		$this->start_controls_section(
			'wpp_price_addon_header_style',
			[
				'label' => esc_html__('Header', 'wpp-pricing-addon'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
        //Header color control
		$this->add_control(
			'wpp_price_addon_heading_color',
			[
				'label' => esc_html__('Color', 'wpp-pricing-addon'),
				'type' => Controls_Manager::COLOR,
                'selectors' =>[
                        '{{WRAPPER}} .wpp-pricing-table' => 'color: {{VALUE}}',
                ]
			]
		);
        //Header Typography Control
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpp_price_addon_heading_text',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .wpp-pricing-table .title',
			]
		);
		$this->end_controls_section();
        /*
         * End Header Style Section
         */

		/*
		 * Start Price Style Section
		 */
		$this->start_controls_section(
			'wpp_price_addon_price_style',
			[
				'label' => esc_html__('Price', 'wpp-pricing-addon'),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		//color control
		$this->add_control(
			'wpp_price_addon_price_color',
			[
				'label' => esc_html__('Color', 'wpp-pricing-addon'),
				'type' => Controls_Manager::COLOR,
				'selectors' =>[
					'{{WRAPPER}} .wpp-pricing-table .price-value' => 'color: {{VALUE}}',
				]
			]
		);
		//Border color control
		$this->add_control(
			'wpp_price_addon_price_border_color',
			[
				'label' => esc_html__('Border Color', 'wpp-pricing-addon'),
				'type' => Controls_Manager::COLOR,
				'selectors' =>[
					'{{WRAPPER}} .wpp-pricing-table .price-value, {{WRAPPER}} .wpp-pricing-table .price-value:before' => 'border: 2px solid {{VALUE}}',
				]
			]
		);
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpp_price_addon_price_amount',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .wpp-pricing-table .price-value .amount',
			]
		);
		$this->end_controls_section();
		/*
		 * End Price Style Section
		 */

		/*
		 * Start Features Style Section
		 */
        $this->start_controls_section(
            'wpp_price_addon_feature_style',
            [
                'label' => esc_html__( 'Feature', 'wpp-pricing-addon' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        //Color control
        $this->add_control(
	        'wpp_price_addon_feature_color',
	        [
		        'label' => esc_html__('Color', 'wpp-pricing-addon'),
		        'type' => Controls_Manager::COLOR,
		        'selectors' =>[
			        '{{WRAPPER}} .wpp-pricing-table .pricing-content li' => 'color: {{VALUE}}',
		        ]
	        ]
        );
        //Typography control
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'wpp_price_addon_feature_text',
				'scheme' => Scheme_Typography::TYPOGRAPHY_4,
				'selector' => '{{WRAPPER}} .wpp-pricing-table .pricing-content li',
			]
		);
        $this->end_controls_section();
        /*
         * End Features Style Section
         */

		/*
		 * Start Button Style Section
		 */
        $this->start_controls_section(
            'wpp_price_addon_button_style',
            [
                'label' => esc_html__( 'Button', 'wpp-pricing-addon' ),
                'tab' => Controls_Manager::TAB_STYLE
            ]
        );
        //Color control
        $this->add_control(
            'wpp_price_addon_button_color',
            [
                'label' => esc_html__( 'Color', 'wpp-pricing-addon' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .wpp-pricing-table .pricing-signup a' => 'color: {{VALUE}}',
                ]
            ]
        );
        //BG color control
		$this->add_control(
			'wpp_price_addon_button_bg_color',
			[
				'label' => esc_html__( 'Background Color', 'wpp-pricing-addon' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .wpp-pricing-table .pricing-signup a' => 'background-color: {{VALUE}}',
				]
			]
		);
        //Typography control
		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'wpp_price_addon_button_text',
				'label' => __( 'Typography', 'wpp-pricing-addon' ),
				'selector' => '{{WRAPPER}} .wpp-pricing-table .pricing-signup a',
			]
		);

		$this->end_controls_section();
		/*
		 * End Button Style Section
		 */
	}
	protected function render(){
		$wpp_price_setting = $this->get_settings();
		?>
        <div class="wpp-pricing-table">
            <div class="pricing-header">
                <h3 class="title"><?php esc_html_e( $wpp_price_setting[ 'wpp_price_addon_heading' ] ); ?></h3>
            </div>
            <div class="price-value">
                <span class="amount"><?php esc_html_e( $wpp_price_setting[ 'wpp_price_addon_currency' ] ); ?><?php esc_html_e( $wpp_price_setting[ 'wpp_price_addon_price' ] ); ?></span>
                <span class="duration"><?php esc_html_e( $wpp_price_setting[ 'wpp_price_addon_unit_name' ] ); ?></span>
            </div>
            <ul class="pricing-content">
                <?php
                if( $wpp_price_setting[ 'wpp_pricing_addon_feature_list' ] ){
                    foreach ( $wpp_price_setting[ 'wpp_pricing_addon_feature_list' ] as $wpp_price_item ){
                        ?>
                        <li><i class="<?php esc_html_e( $wpp_price_item[ 'wpp_pricing_addon_icon' ]['value'] ); ?>"></i> <?php esc_html_e( $wpp_price_item[ 'wpp_pricing_addon_feature' ] ); ?></li>
                        <?php
                    }
                }
                ?>
            </ul>
            <div class="pricing-signup">
                <?php
                $btn_text = $wpp_price_setting[ 'wpp_price_addon_button_text' ];
                $btn_link = $wpp_price_setting['wpp_price_addon_button_url']['url'];
                $target = $wpp_price_setting['wpp_price_addon_button_url']['is_external'] ? ' target="_blank"' : '';
                $nofollow = $wpp_price_setting['wpp_price_addon_button_url']['nofollow'] ? ' rel="nofollow"' : '';
                ?>
                <a href="<?php esc_attr_e( $btn_link ); ?>" <?php esc_attr_e( $target ) . esc_attr_e( $nofollow ); ?>> <?php esc_html_e( $btn_text ); ?></a>
            </div>
        </div>
		<?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new WPP_Pricing_Addon() );