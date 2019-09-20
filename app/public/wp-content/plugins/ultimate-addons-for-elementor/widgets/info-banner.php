<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_uae_info_banner extends \Elementor\Widget_Base {

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
		return 'banner';
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
		return __( 'Info Banner', 'uae' );
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
		return 'fa fa-image';
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
		// wp_enqueue_style( 'info-banner', plugins_url( '../css/infobanner.css' , __FILE__ ));

		$this->start_controls_section(
			'gen_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Choose Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
		     	'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/info-banner/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'top_to_bottom' 	=> esc_html__('Top Image Bottom Content', 'uae'),
		     		'left' 				=> esc_html__('Left Image Right Content', 'uae'),
		     		'right' 			=> esc_html__('Right Image Bottom Content', 'uae'),
				],
				'default' 		=> 'top_to_bottom',
			]
		);

		$this->add_control(
			'box_width',
			[
				'label' => __( 'Picture Box Width In %', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'size_units' => ['%'],
                'default' => esc_html__( '50', 'uae' ),
                'condition' => [
					'style' => ['left', 'right']
				]
			]
		);

		$this->add_control(
			'content_width',
			[
				'label' => __( 'Content Box Width In %', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
                'size_units' => ['%'],
                'default' => esc_html__( '50', 'uae' ),
                'condition' => [
					'style' => ['left', 'right']
				]
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Background::get_type(),
			[
				'name' => 'background',
				'label' => __( 'Background', 'plugin-domain' ),
				'types' => [ 'classic', 'gradient', 'video' ],
				'selector' => '{{WRAPPER}} .uae-info-banner-styles',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'image_section',
			[
				'label' => __( 'Image', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_responsive_control(
			'image_padding',
			[
				'label' => __( 'Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-info-banner-styles .mega_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				// 'default' => [
				// 	'url' => Utils::get_placeholder_image_src(),
				// ],
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

		$this->end_controls_section();

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'content_padding',
			[
				'label' => __( 'Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .uae-info-banner-styles .mega_content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Banner Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( 'Add banner description here. Edit and place your own text.', 'uae' ),
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
			'offer', 
			[
				'label'         => esc_html__('Special Offer', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'offer_vis',
			[
				'label' => esc_html__( 'Show/Hide', 'uae' ),
				'type' => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'team-avatar-rounded',
				'default' => '',
			]
		);

		$this->add_control(
			'offer_title',
			[
				'label' => __( 'Offer Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'offer_vis' => 'team-avatar-rounded',
				],
			]
		);

		$this->add_control(
			'offerclr',
			[
				'label' => __( 'Offer Text Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'condition' => [
					'offer_vis' => 'team-avatar-rounded',
				],
			]
		);

		$this->add_control(
			'offerbg',
			[
				'label' => __( 'Offer Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#0473AA',
				'condition' => [
					'offer_vis' => 'team-avatar-rounded',
				],
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'button', 
			[
				'label'         => esc_html__('Button', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'btn_icon',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Button Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
					'{{WRAPPER}} .uae-info-banner-styles .mega_hvr_btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
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

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .uae-info-banner-styles .mega_hvr_btn',
			]
		);

		$this->add_control(
			'borderclr',
			[
				'label'      => esc_html__('Border Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'border_width',
			[
				'label'      => esc_html__('Border Width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 	'border_radius',
				'label'      => esc_html__('Border Radius', 'uae'),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
					'{{WRAPPER}} .uae-info-banner-styles .mega_hvr_btn' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'btnclr',
			[
				'label'      => esc_html__('Button Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'btnbg',
			[
				'label'      => esc_html__('Button Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'hoverclr',
			[
				'label'      => esc_html__('Hover Button Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'hoverbg',
			[
				'label'      => esc_html__('Hover Button Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
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

		<!-- Style1 & 2 info banner -->
		<?php if ($settings['style'] == 'left' || $settings['style'] == 'right') { ?>
			<div id="mega_info_bar" class="mega-info-bar-<?php echo $some_id; ?> uae-info-banner-styles">		   
				<div class="ribbon">
					<span style="color: <?php echo $settings['offerclr']; ?>; background-color: <?php echo $settings['offerbg']; ?>">
						<?php echo $settings['offer_title']; ?>
					</span>
				</div>
				<div class="mega_wrap" style="width: <?php echo $settings['box_width']-2; ?>%; float: <?php echo $settings['style']; ?>;">
					<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
				</div>

				<div class="mega_content" style="width: <?php echo $settings['content_width']-1; ?>%;">
					<?php echo $settings['content']; ?>

					<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?>  class="mega_hvr_btn <?php echo $anim_style; ?>" style="color: <?php echo $settings['btnclr']; ?>; background: <?php echo $settings['btnbg']; ?>; border: <?php echo $settings['borderclr']; ?> solid <?php echo $settings['border_width']; ?>px;">
						<i style="font-weight: 600;" class="<?php echo $settings['btn_icon']; ?>"></i> <?php echo $settings['btn_text']; ?>
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>


		<!-- Style3 info banner -->
		<?php if ($settings['style'] == 'top_to_bottom') { ?>
			<div id="mega_info_bar_2" class="mega-info-bar-<?php echo $some_id; ?> uae-info-banner-styles">			   
				<div class="ribbon">
					<span style="color: <?php echo $settings['offerclr']; ?>; background-color: <?php echo $settings['offerbg']; ?>">
						<?php echo $settings['offer_title']; ?>
					</span>
				</div>
				<div class="mega_wrap" style="padding: ">
					<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
				</div>

				<div class="mega_content" style="padding: ;">
					<?php echo $settings['content']; ?><br>
					<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?>  class="mega_hvr_btn <?php echo $anim_style; ?>" style="color: <?php echo $settings['btnclr']; ?>; background: <?php echo $settings['btnbg']; ?>; border: <?php echo $settings['borderclr']; ?> solid <?php echo $settings['border_width']; ?>px;">
						<i style="font-weight: 600;" class="<?php echo $settings['btn_icon']; ?>"></i> <?php echo $settings['btn_text']; ?>
					</a>
					<br>
				</div>
				<div class="clearfix"></div>
			</div>
		<?php } ?>

		<style>
			.mega-info-bar-<?php echo $some_id; ?> .mega_hvr_btn:hover {
				color: 		<?php echo $settings['hoverclr']; ?> !important;
				background: <?php echo $settings['hoverbg']; ?> !important;
			}
		</style>

		<!---================= HTML CODING END ====================-->
		<?php
	}

}