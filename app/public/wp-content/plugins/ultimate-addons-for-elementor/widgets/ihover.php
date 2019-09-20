<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_ihover_Widget extends \Elementor\Widget_Base {

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
		return 'Ihover';
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
		return __( 'Image Hover Effects', 'uae' );
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
		return 'fa fa-clone';
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
		// wp_enqueue_style( 'ihover-effects', plugins_url( '../css/ihover.css' , __FILE__ ));
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Choose Effect', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'<a href="http://gudh.github.io/ihover/dist/" target="_blank">See Demo</a> 15+ More Effects on <a href="https://genialsouls.com/product/mega-addons-for-elementor-page-builder/" target="_blank">Pro Version</a>',
				'options' 		=> [
		     		'circle effect2 left_to_right' 	=> esc_html__('Circle Effect2 Left to Right', 'uae'),
		     		'circle effect2 right_to_left' 	=> esc_html__('circle effect2 right to left', 'uae'),
		     		'circle effect2 top_to_bottom' 	=> esc_html__('circle effect2 top to bottom', 'uae'),
		     		'circle effect2 bottom_to_top' 	=> esc_html__('circle effect2 bottom to top', 'uae'),
		     		'circle effect3 left_to_right' 	=> esc_html__('circle effect3 left to right', 'uae'),
		     		'circle effect3 right_to_left' 	=> esc_html__('circle effect3 right to left', 'uae'),
		     		'circle effect3 bottom_to_top' 	=> esc_html__('circle effect3 bottom to top', 'uae'),
		     		'circle effect3 top_to_bottom' 	=> esc_html__('circle effect3 top to bottom', 'uae'),
		     		'circle effect4 left_to_right' 	=> esc_html__('circle effect4 left to right', 'uae'),
		     		'circle effect4 right_to_left' 	=> esc_html__('circle effect4 right to left', 'uae'),
		     		'circle effect4 top_to_bottom' 	=> esc_html__('circle effect4 top to bottom', 'uae'),
		     		'circle effect4 bottom_to_top' 	=> esc_html__('circle effect4 bottom to top', 'uae'),
		     		'circle effect5' 				=> esc_html__('circle effect5', 'uae'),
		     		'circle effect6 scale_up' 		=> esc_html__('circle effect6 scale up', 'uae'),
		     		'circle effect6 scale_down' 	=> esc_html__('circle effect6 scale down', 'uae'),
		     		'circle effect6 scale_down_up' 	=> esc_html__('circle effect6 scale down up', 'uae'),
		     		'circle effect7 left_to_right' 	=> esc_html__('circle effect7 left to right', 'uae'),
		     		'circle effect7 right_to_left' 	=> esc_html__('circle effect7 right to left', 'uae'),
		     		'circle effect7 top_to_bottom' 	=> esc_html__('circle effect7 top to bottom', 'uae'),
		     		'circle effect7 bottom_to_top' 	=> esc_html__('circle effect7 bottom to top', 'uae'),
		     		'circle effect8 left_to_right' 	=> esc_html__('circle effect8 left to right', 'uae'),
		     		'circle effect8 right_to_left' 	=> esc_html__('circle effect8 right to left', 'uae'),
		     		'circle effect8 top_to_bottom' 	=> esc_html__('circle effect8 top to bottom', 'uae'),
		     		'circle effect8 bottom_to_top' 	=> esc_html__('circle effect8 bottom to top', 'uae'),
		     		'circle effect9 left_to_right' 	=> esc_html__('circle effect9 left to right', 'uae'),
		     		'circle effect9 right_to_left' 	=> esc_html__('circle effect9 right to left', 'uae'),
		     		'circle effect9 top_to_bottom' 	=> esc_html__('circle effect9 top to bottom', 'uae'),
		     		'circle effect9 bottom_to_top' 	=> esc_html__('circle effect9 bottom to top', 'uae'),
		     		'circle effect10 top_to_bottom' => esc_html__('circle effect10 top to bottom', 'uae'),
		     		'circle effect10 bottom_to_top' => esc_html__('circle effect10 bottom to top', 'uae'),
		     		'square effect1 left_and_right' => esc_html__('square effect1 left and right', 'uae'),
		     		'square effect1 top_to_bottom' 	=> esc_html__('square effect1 top to bottom', 'uae'),
		     		'square effect1 bottom_to_top' 	=> esc_html__('square effect1 bottom to top', 'uae'),
		     		'square effect2' 				=> esc_html__('square effect2', 'uae'),
		     		'square effect3 bottom_to_top' 	=> esc_html__('square effect3 bottom to top', 'uae'),
		     		'square effect3 top_to_bottom' 	=> esc_html__('square effect3 top to bottom', 'uae'),
		     		'square effect4' 				=> esc_html__('square effect4', 'uae'),
		     		'square effect6 from_top_and_bottom' 	=> esc_html__('square effect6 from top and bottom', 'uae'),
		     		'square effect6 from_left_and_right' 	=> esc_html__('square effect6 from left and right', 'uae'),
		     		'square effect6 top_to_bottom' 	=> esc_html__('square effect6 top to bottom', 'uae'),
		     		'square effect6 bottom_to_top' 	=> esc_html__('square effect6 bottom to top', 'uae'),
		     		'square effect7'			 	=> esc_html__('square effect7', 'uae'),
		     		'square effect8 scaleup'		=> esc_html__('square effect8 scaleup', 'uae'),
		     		'square effect8 scaledown'		=> esc_html__('square effect8 scaledown', 'uae'),
		     		'square effect9 bottom_to_top'	=> esc_html__('square effect9 bottom to top', 'uae'),
		     		'square effect9 left_to_right'	=> esc_html__('square effect9 left to right', 'uae'),
		     		'square effect9 right_to_left'	=> esc_html__('square effect9 right to left', 'uae'),
		     		'square effect9 top_to_bottom'	=> esc_html__('square effect9 top to bottom', 'uae'),
		     		'square effect10 left_to_right'	=> esc_html__('square effect10 left to right', 'uae'),
		     		'square effect10 right_to_left'	=> esc_html__('square effect10 right to left', 'uae'),
		     		'square effect10 top_to_bottom'	=> esc_html__('square effect10 top to bottom', 'uae'),
		     		'square effect10 bottom_to_top' => esc_html__('square effect10 bottom to top', 'uae'),
		     		'square effect13 left_to_right' => esc_html__('square effect13 left to right', 'uae'),
		     		'square effect13 right_to_left' => esc_html__('square effect13 right to left', 'uae'),
		     		'square effect13 top_to_bottom' => esc_html__('square effect13 top to bottom', 'uae'),
		     		'square effect13 bottom_to_top' => esc_html__('square effect13 bottom to top', 'uae'),
				],
				'default' 		=> 'circle effect2 left_to_right',
			]
		);

		// $this->add_control(
		// 	'image_id',
		// 	[
		// 		'label' => __( 'Select Image', 'uae' ),
		// 		'type' => \Elementor\Controls_Manager::MEDIA,
		// 		'default' => [
  //                   'url' => Utils::get_placeholder_image_src(),
  //               ],
	 //                'label_block' => true,
	 //                'dynamic' => [
	 //                    'active' => true,
	 //                ],
		// 	]
		// );

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
			]
		);

		// $this->add_control(
  //           'thumbnail_size',
  //           [
  //               'label' => __('Thumbnail Size', 'livemesh-el-addons'),
  //               'type' => \Elementor\Controls_Manager::SLIDER,
  //               'size_units' => [ '%', 'px' ],
  //               'range' => [
  //                   '%' => [
  //                       'min' => 10,
  //                       'max' => 100,
  //                   ],
  //                   'px' => [
  //                       'min' => 50,
  //                       'max' => 156,
  //                   ],
  //               ],
  //               'selectors' => [
  //                   '{{WRAPPER}} .lae-testimonials .lae-testimonial-user .lae-image-wrapper img' => 'max-width: {{SIZE}}{{UNIT}};',
  //               ],
  //           ]
  //       );


		$this->add_control(
			'title',
			[
				'label' => __( 'Title & Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __('Title', 'uae'),
				'placeholder' => __( 'Title', 'uae' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'content',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => __('Description', 'uae'),
				'show_label' => false,
				'placeholder' => __( 'Description', 'uae' ),
				'separator' => 'none',
			]
		);

		$this->add_control(
			'ihe_link',
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
			'ihe_content_style', 
			[
				'label'         => esc_html__('Content', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'bgclr',
			[
				'label' => __( 'Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Content Alignment', 'uae' ),
				'type' => \Elementor\Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => __( 'Left', 'uae' ),
						'icon' => 'fa fa-align-left',
					],
					'center' => [
						'title' => __( 'Center', 'uae' ),
						'icon' => 'fa fa-align-center',
					],
					'right' => [
						'title' => __( 'Right', 'uae' ),
						'icon' => 'fa fa-align-right',
					],
				],
				'default' => 'center',
			]
		);

		$this->add_control(
			'title_heading',
			[
				'label' => __('Title', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'titleclr',
			[
				'label' => __( 'Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ih-item .info h3',
			]
		);

		$this->add_control(
			'desc_heading',
			[
				'label' => __('Description', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'descrclr',
			[
				'label' => __( 'Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .ih-item .info p',
			]
		);

		$this->add_control(
			'border_style',
			[
				'label' => __('Border Style', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$this->add_control(
			'borderclr',
			[
				'label'      => esc_html__('Border Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'radius',
			[
				'label'      => esc_html__('Border Width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		// $this->add_control(
		// 	'radius',
		// 	[
		// 		'label'      => esc_html__('Border Width', 'uae'),
		// 		'type'       => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'size_units' => ['px'],
		// 	]
		// );

			
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
		 
		$target = $settings['ihe_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['ihe_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<div class="ih-item <?php echo $settings['effect']; ?>"
			style="border: <?php echo $settings['radius']; ?>px solid <?php echo $settings['borderclr']; ?>;">
			<?php if ($settings['ihe_link']['url'] != '') { ?>
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?>>
			<?php } ?>
			<?php if ($settings['ihe_link']['url'] == NULL) { ?>
				<a>
			<?php } ?>
		      <div class="img">
		      <span style="box-shadow: inset 0 0 0 <?php echo $settings['radius']; ?>px <?php echo $settings['borderclr']; ?>, 0 1px 2px rgba(0, 0, 0, .3); opacity: 0.6;"></span>
		      	<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
		      </div>
		      <div class="info" style="background-color: <?php echo $settings['bgclr']; ?>;">
		      	<div style="display:table;width:100%;height:100%;">
			    	<div style="display: table-cell !important;vertical-align: middle !important;">
				      	<h3 style="color: <?php echo $settings['titleclr']; ?>; text-align: <?php echo $settings['alignment']; ?>;">
				      		<?php echo $settings['title']; ?>
				      	</h3>
				      	<p style="color: <?php echo $settings['descrclr']; ?>; text-align: <?php echo $settings['alignment']; ?>;">
				      		<?php echo $settings['content']; ?>
				      	</p>
				    </div>
				</div>
		      </div>
		    </a>
		</div>	
		<?php  
		/************HTML CODING END*************/

	}
}