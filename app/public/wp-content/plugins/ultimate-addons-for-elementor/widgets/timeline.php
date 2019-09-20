<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_timeline extends \Elementor\Widget_Base {

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
		return 'timeline';
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
		return __( 'Timeline', 'uae' );
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
		return 'fa fa-camera';
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
		// wp_enqueue_style( 'timeline-css', plugins_url( '../css/timeline.css' , __FILE__ ));
		wp_enqueue_script( 'timeline-js', plugins_url( '../js/timeline.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'animtimeline-js', plugins_url( '../js/animtimeline.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'timeline_title',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description'	=>	'Main title of timeline: <a href="https://elementor.topdigitaltrends.net/timeline/" target="_blank">See Demo</a>',
			]
		);

		$this->add_control(
			'title_clr',
			[
				'label' => __( 'Title Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'title_bg',
			[
				'label' => __( 'Title Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#dd3333',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mega-timeline-title span',
			]
		);
		
		$this->end_controls_section();

		$this->start_controls_section(
			'centerline_section',
			[
				'label' => __( 'Timeline Center Line', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'line_width',
			[
				'label'      => esc_html__('Line Width (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'default' => '5',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'line_bg',
			[
				'label' => __( 'Line Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
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

		/* ======== Content Section
		============================================================ */

		$this->start_controls_section(
			'content_section', 
			[
				'label'         => esc_html__('Content', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'list_items',
            [
                'label' => __('Features', 'uae'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'date',
                        'label' => __('Date', 'uae'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('January 28, 2016', 'uae'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'date_clr',
                        'label' => __( 'Date Color', 'uae' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'input_type' => 'color',
						'default' => '#f12945',
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'date_size',
                        'label' => __( 'Date Font Size (px)', 'uae' ),
                        'type'       => \Elementor\Controls_Manager::NUMBER,
						'default' => '16',
						'size_units' => ['px'],
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
						'name'  => 'center_sec',
						'label' => __('Timeline Center', 'uae'),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					],

					[
                        'name' => 'style',
                        'label' => __( 'Select Style', 'uae' ),
						'type' => \Elementor\Controls_Manager::SELECT,
						'options' 		=> [
				     		'fonticon' 	=> esc_html__('Center With Font Icon', 'uae'),
				     		'dot' 				=> esc_html__('Only Dot', 'uae'),
						],
						'default' 		=> 'fonticon',
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'icon',
                        'label' => __('Font Icon', 'uae'),
                        'type' => \Elementor\Controls_Manager::ICON,
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'icon_bg',
                        'label' => __( 'Icon Background', 'uae' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'input_type' => 'color',
						'default' => '#f12945',
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'icon_size',
                        'label' => __( 'Icon Font Size (px)', 'uae' ),
                        'type'       => \Elementor\Controls_Manager::NUMBER,
						'default' => '25',
						'size_units' => ['px'],
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

					[
						'name'  => 'content_styling',
						'label' => __('Timeline Content', 'uae'),
						'type' => \Elementor\Controls_Manager::HEADING,
						'separator' => 'before',
					],

					[
                        'name' => 'arrow_clr',
                        'label' => __( 'Arrow Color', 'uae' ),
						'type' => \Elementor\Controls_Manager::COLOR,
						'input_type' => 'color',
						'default' => '#f12945',
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' => 'content',
                        'label' => __( 'Content Details', 'uae' ),
						'type' => \Elementor\Controls_Manager::WYSIWYG,
						'default' => 'Add heading, details, pictures or video url',
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                ],
                'title_field' => '{{{ date }}}',
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

		// $html = wp_oembed_get( $settings['ihe_link'] );
		 
		// $target = $settings['ihe_link']['is_external'] ? ' target="_blank"' : '';
		// $nofollow = $settings['ihe_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<div class="mega-timeline-title"><span style="font-size: <?php echo $size; ?>px; color: <?php echo $settings['title_clr']; ?>; background: <?php echo $settings['title_bg']; ?>;">
			<?php echo $settings['timeline_title']; ?>
		</span></div>
		<div id="cd-timeline" class="cd-container">
			<span class="timeline-line" style="width: <?php echo $settings['line_width']; ?>px; background: <?php echo $settings['line_bg']; ?>;"></span>
			<span></span>
			<?php foreach ($settings['list_items'] as $list_items) { ?>
				<div class="cd-timeline-block">
					<?php if ($list_items['style'] == 'fonticon') { ?>
						<div class="cd-timeline-img cd-picture" style="background: <?php echo $list_items['icon_bg']; ?>; border-radius: 50%; text-align:center;">
							<i class="<?php echo $list_items['icon']; ?>" aria-hidden="true" style="font-size: <?php echo $list_items['icon_size']; ?>px; color: #fff;vertical-align: middle;"></i>
						</div>	
					<?php } ?>

					<?php if ($list_items['style'] == 'dot') { ?>
						<div class="cd-timeline-img cd-timeline-dot cd-picture" style="background: <?php echo $list_items['icon_bg']; ?>; border-radius: 50%;">
						</div>	
					<?php } ?>

					<div class="cd-timeline-content <?php echo $css_class; ?>">
						<span class="timeline-arrow" style="border-right-color: <?php echo $list_items['arrow_clr']; ?>"></span>
						<span class="timeline-arrow" style="border-left-color: <?php echo $list_items['arrow_clr']; ?>"></span>
						<span class="timeline-arrow" style="border-right: 7px solid <?php echo $list_items['arrow_clr']; ?>;"></span>

						<?php echo $list_items['content']; ?>
						<span class="cd-date" style="color: <?php echo $list_items['date_clr']; ?>; font-size: <?php echo $list_items['date_size']; ?>px;">
							<?php echo $list_items['date']; ?>
						</span>
					</div>
				</div>
			<?php } ?>
		</div>

		<?php  
		/************HTML CODING END*************/

	}
}