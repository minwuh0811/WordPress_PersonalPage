<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_advanced_carousel extends \Elementor\Widget_Base {

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
		return 'advanced-carousel';
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
		return __( 'Advanced Carousel', 'uae' );
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
		return 'fa fa-sliders';
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
		// wp_enqueue_style( 'slick-carousal-css', plugins_url( '../css/slick-carousal.css' , __FILE__ ));
		// wp_enqueue_script( 'slick-js', plugins_url( '../js/slick.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		// wp_enqueue_script( 'custom-tm-js', plugins_url( '../js/front/custom-tm.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'Settings', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'theme',
			[
				'label' => __( 'Select Theme', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'default-tdt' 			=> esc_html__('Top Image Bottom Content', 'uae'),
		     		'content-over-slider' 	=> esc_html__('Image Over Content', 'uae'),
				],
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/advanced-carousel/" target="_blank">See Demo</a>',
				'default' 		=> 'default-tdt',
			]
		);

		$this->add_responsive_control(
			'mbl_height2',
			[
				'label' => __( 'Custom Height (For Mobile) px', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'theme' => 'content-over-slider',
				],
			]
		);

		$this->add_control(
			'padding',
			[
				'label' => __( 'Padding Top (px)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'padding will apply from top for the content',
				'default'	=>	'30',
				'condition' => [
					'theme' => 'content-over-slider',
				],
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Slide Effect', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'false' 			=> esc_html__('Slide [Right To Left]', 'uae'),
		     		'true' 				=> esc_html__('Fade', 'uae'),
				],
				'default' 		=> 'false',
			]
		);

		$this->add_control(
			'arrow',
			[
				'label' => __( 'Arrows', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'false' 		=> esc_html__('Hide', 'uae'),
		     		'true' 			=> esc_html__('Show', 'uae'),
				],
				'default' 		=> 'false',
			]
		);

		$this->add_control(
			'arrowclr',
			[
				'label' => __( 'Arrow Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'arrow' => 'true',
				],
			]
		);

		$this->add_control(
			'arrowsize',
			[
				'label' => __( 'Arrow Font Size', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'25',
				'condition' => [
					'arrow' => 'true',
				],
			]
		);

		$this->add_control(
			'dot',
			[
				'label' => __( 'Dots', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'true' 			=> esc_html__('Show', 'uae'),
		     		'false' 		=> esc_html__('Hide', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		// $this->add_control(
		// 	'style',
		// 	[
		// 		'label' => __( 'Dot/Border', 'uae' ),
		// 		'type' => \Elementor\Controls_Manager::SELECT,
		// 		'options' 		=> [
		//      		'dot' 		=> esc_html__('Dot', 'uae'),
		//      		'border' 			=> esc_html__('Border', 'uae'),
		// 		],
		// 		'default' 		=> 'dot',
		// 		'condition' => [
		// 			'dot' => 'true',
		// 		],
		// 	]
		// );

		$this->add_control(
			'dotclr',
			[
				'label' => __( 'Dot Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'dot' => 'true',
				],
			]
		);

		// $this->add_control(
		// 	'borderclr',
		// 	[
		// 		'label' => __( 'Border Color', 'uae' ),
		// 		'type' => \Elementor\Controls_Manager::COLOR,
		// 		'input_type' => 'color',
		// 		'default' => '#000',
		// 		'condition' => [
		// 			'style' => 'border',
		// 		],
		// 	]
		// );

		$this->add_control(
			'autoplay',
			[
				'label' => __( 'Autoplay', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'true' 			=> esc_html__('True', 'uae'),
		     		'' 				=> esc_html__('False (In Pro)', 'uae'),
				],
				'default' 		=> 'true',
			]
		);

		$this->add_control(
			'speed',
			[
				'label' => __( 'Slider Speed', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'write in ms eg, 2500 [1s = 1000]',
				'default'	=>	'2500',
			]
		);

		$this->add_control(
			'slide_visible',
			[
				'label' => __( 'Slide To Show', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'set visible number of slides.',
				'default'	=>	'1',
			]
		);

		$this->add_control(
			'slide_scroll',
			[
				'label' => __( 'Slide To Scroll', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'allow user to multiple slide on click or drag.',
				'default'	=>	'1',
			]
		);

		$this->add_control(
			'class',
			[
				'label' => __( 'Extra Class', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'description'	=>	'Add extra class name that will be applied to the icon process, and you can use this class for your customizations.',
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
			'carousel_style', 
			[
				'label'        => esc_html__('Advanced Carousel', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 	'border_radius',
				'label'      => esc_html__('Border Image Radius', 'uae'),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
					'{{WRAPPER}} .tm-slider .ultimate-slide-img img' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$repeater->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
			]
		);

		$repeater->add_control(
			'btn_link',
			[
				'label' => __('Link To (In Pro)', 'uae'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'uae'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( 'Slider Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$repeater->add_control(
			'desc_heading',
			[
				'label' => __('Button Section', 'uae'),
				'type' => \Elementor\Controls_Manager::HEADING,
				'separator' => 'before',
			]
		);

		$repeater->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'btnbg',
			[
				'label'      => esc_html__('Button Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#D30C5C',
			]
		);

		$repeater->add_control(
			'btn_link2',
			[
				'label' => __('Link To', 'uae'),
				'type' => \Elementor\Controls_Manager::URL,
				'placeholder' => __('https://your-link.com', 'uae'),
				'show_external' => true,
				'default' => [
					'url' => '',
					'is_external' => false,
					'nofollow' => false,
				],
			]
		);

		$repeater->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .tm-slider .ultimate_carousel_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$repeater->add_control(
			'alignment',
			[
				'label' => __( 'Button Alignment', 'uae' ),
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

		$repeater->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .tm-slider .ultimate_carousel_btn',
			]
		);

		$this->add_control(
			'list_items',
			[
				'label' => __( 'Repeater List', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'theme' => __( 'left', 'plugin-domain' ),
						'list_content' => __( 'Item content. Click the edit button to change this text.', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ image }}}',
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
		 
		// $target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		// $nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<section class="tm-slider slider <?php echo $settings['class']; ?> <?php echo $settings['theme']; ?>" id="tdt-slider-<?php echo $some_id ?>" data-slick='{"arrows": <?php echo $settings['arrow']; ?>, "autoplaySpeed": <?php echo $settings['speed']; ?>, "dots": <?php echo $settings['dot']; ?>, "autoplay": true, "slidesToShow": <?php echo $settings['slide_visible']; ?>, "slidesToScroll": <?php echo $settings['slide_scroll']; ?>, "fade": <?php echo $settings['effect']; ?>}'>
			<?php foreach ($settings['list_items'] as $list_items) { ?>
			    <div class="carousel-caption" style="background: none;">
				  <div>
					<?php if ($list_items['image'] != '') { ?>
						<span class="ultimate-slide-img" style="max-width: 100%; border-radius: ; margin-bottom: 15px;">
					  		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $list_items ); ?>
						</span>
					<?php } ?>
				  	<span class="content-section">
					  	<?php echo $list_items['content']; ?><br>

					  	<?php if ($list_items['btn_text'] != '') { ?>
						  	<span class="carousel_btn_span" style="text-align: <?php echo $list_items['alignment']; ?>;">
						  		<a href="<?php echo $list_items['btn_link2']['url']; ?>" target="_blank" class="ultimate_carousel_btn" style="background-color: <?php echo $list_items['btnbg']; ?>; color: #fff; text-decoration: none;">
							  		<?php echo $list_items['btn_text']; ?>
							  	</a>
							</span>
					  	<?php } ?>
				  	</span>
				  </div>
				</div>
			<?php } ?>
		</section>

		<style>
			#tdt-slider-<?php echo $some_id ?> .slick-dots li button:before{
				color: <?php echo $settings['dotclr']; ?>;
				/*border: 2px solid <?php echo $settings['borderclr']; ?>;*/
			}
			#tdt-slider-<?php echo $some_id ?> .slick-next:before {
				color: <?php echo $settings['arrowclr']; ?> !important;
				font-size: <?php echo $settings['arrowsize']; ?>px !important;
			}
			#tdt-slider-<?php echo $some_id ?> .slick-prev:before {
				color: <?php echo $settings['arrowclr']; ?> !important;
				font-size: <?php echo $settings['arrowsize']; ?>px !important;
			}
			#tdt-slider-<?php echo $some_id ?> .slick-dots li.slick-active button:before {
				opacity: 1 !important;
			}
			#tdt-slider-<?php echo $some_id ?>.content-over-slider .slick-slide .content-section {
				top: <?php echo $settings['padding']; ?>px;
			}
			@media only screen and (max-width: 480px) {
				#tdt-slider-<?php echo $some_id ?>.content-over-slider .slick-slide .content-section {
					top: 35px !important;
				}
				#tdt-slider-<?php echo $some_id ?>.content-over-slider .ultimate-slide-img img{
					height: <?php echo $settings['mbl_height2']; ?>px !important;
				}
			}
		</style>

		<?php  
		/************HTML CODING END*************/

	}
}