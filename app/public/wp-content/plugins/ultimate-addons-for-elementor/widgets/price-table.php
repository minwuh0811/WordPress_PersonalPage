<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_uae_price_table extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'pricing';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Pricing table', 'uae' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-pencil';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ultimate-addons' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {
		// wp_enqueue_style( 'price-table', plugins_url( '../css/price_table.css' , __FILE__ ));

		$this->start_controls_section(
			'gen_section',
			[
				'label' => __( 'Price Header', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Select Layout', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'<a href="https://elementor.topdigitaltrends.net/pricing-table/" target="_blank">See Demo</a> 3 More Effects on <a href="https://genialsouls.com/product/mega-addons-for-elementor-page-builder/" target="_blank">Pro Version</a>',
				'options' 		=> [
		     		'design1' 					=> esc_html__('Design 1', 'uae'),
		     		'mega-price-table-2' 		=> esc_html__('Design 2', 'uae'),
		     		'mega-price-table-3' 		=> esc_html__('Design 3', 'uae'),
		     		'mega-price-table-4' 		=> esc_html__('Design 4', 'uae'),
		     		'mega-price-table-5' 		=> esc_html__('Design 5', 'uae'),
				],
				'default' 		=> 'design1',
			]
		);

		$this->add_control(
			'price_title',
			[
				'label' => __( 'Price Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'price_sign',
			[
				'label' => __( 'Currency sign', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'price_value',
			[
				'label' => __( 'Price Amount', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'price_plan',
			[
				'label' => __( 'Price Plan', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'per month',
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Header Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae_pricing_table .header' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'offer', 
			[
				'label'         => esc_html__('Ribbon', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'offer_vis',
			[
				'label' => esc_html__( 'Show/Hide', 'essential-addons-elementor' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'team-avatar-rounded',
				'default' => '',
			]
		);

		$this->add_control(
			'rib_title',
			[
				'label' => __( 'Ribbon Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'offer_vis' => 'team-avatar-rounded',
				],
			]
		);

		$this->add_control(
			'rib_clr',
			[
				'label' => __( 'Ribbon Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#006086',
				'condition' => [
					'offer_vis' => 'team-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'feature', 
			[
				'label'         => esc_html__('Feature', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'list_items',
            [
                'label' => __('Feature', 'uae'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'list_name',
                        'label' => __('List Item', 'uae'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('Unlimited Calls', 'uae'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'list_icon',
                        'label' => __( 'Icon', 'uae' ),
						'type' => \Elementor\Controls_Manager::ICON,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'disable_item',
                        'label' => esc_html__( 'Item Active', 'uae' ),
						'type' => \Elementor\Controls_Manager::SWITCHER,
						'return_value' => 'yes',
						'default' => 'yes',
                    ],

                    [
                        'name' => 'icon_color',
                        'label' => esc_html__( 'Icon Color', 'uae' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'default' => '#00C853',
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                ],
                'title_field' => '{{{ list_name }}}',
            ]
        );

		$this->end_controls_section();

		$this->start_controls_section(
			'footer', 
			[
				'label'         => esc_html__('Footer', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_title',
			[
				'label' => __( 'Button Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'CHOOSE PLAN',
			]
		);

		$this->add_control(
			'btn_link',
			[
				'label' => __('Link To', 'uae'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'uae'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				]
			]
		);


		$this->end_controls_section();

		$this->start_controls_section(
			'uae_section_pro',
			[
				'label' => __( '<span style="color: #f54;">Go Premium for More Features</span>', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
            'asdasdsadasasdsaf',
            [
                'label' => __( 'Unlock more possibilities', 'uae' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
					'1' => [
						'title' => __( '', 'uae' ),
						'icon' => 'fa fa-unlock-alt',
					],
				],
				'default' => '1',
                'description' => 'Get the <a style="color: #f54; text-decoration: underline;" href="https://genialsouls.com/mega-addons-for-elementor-pro/" target="_blank">Pro version</a> for more stunning elements and customization options.'
            ]
        );

		$this->end_controls_section();
		
		$this->start_controls_section(
			'feature_list', 
			[
				'label'         => esc_html__('Feature List', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'feature_clr',
			[
				'label' => __( 'Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'feature_list_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .uae_pricing_table li',
				'separator' => 'before',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'style_section', 
			[
				'label'         => esc_html__('Typography', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'title_clr',
			[
				'label' => __( 'Title Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .uae_pricing_table .price_title',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'price_clr',
			[
				'label' => __( 'Amount Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'price_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .uae_pricing_table .amount',
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'plan_typo',
				'label' => __('Price Plan Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .uae_pricing_table .month',
				'separator' => 'before',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typo',
				'label' => __('Button Text Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .uae_pricing_table .plan-select .price-btn',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'header_bg',
			[
				'label' => __( 'Header Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_control(
			'body_bg',
			[
				'label' => __( 'Body Bakcground', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->end_controls_section();
		

	}

	

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();
		$some_id = rand(5, 500);

		// $html = wp_oembed_get( $settings['ihe_link'] );
		 
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<?php switch ($settings['style']) {
			case 'design1':
				include 'price-table/price1.php';
				break;
			case 'mega-price-table-2':
				include 'price-table/price2.php';
				break;
			case 'mega-price-table-3':
				include 'price-table/price3.php';
				break;
			case 'mega-price-table-4':
				include 'price-table/price4.php';
				break;
			case 'mega-price-table-5':
				include 'price-table/price5.php';
				break;
			case 'design6':
				include 'price-table/price6.php';
				break;
			case 'design7':
				include 'price-table/price7.php';
				break;
			case 'design8':
				include 'price-table/price8.php';
				break;
			
			default:
				include 'price-table/price1.php';
				break;
		} ?>

		<!---================= HTML CODING END ====================-->
		<?php
	}

}