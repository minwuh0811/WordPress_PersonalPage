<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_dual_btn extends \Elementor\Widget_Base {

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
		return 'dual-btn';
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
		return __( 'Dual Button', 'uae' );
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
		return 'fa fa-toggle-on';
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
		// wp_enqueue_style( 'dual-btn-css', plugins_url( '../css/dual-btn.css' , __FILE__ ));

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button 1', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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

		$this->add_control(
			'btnclr',
			[
				'label'      => esc_html__('Button Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
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
			'hvrclr',
			[
				'label'      => esc_html__('Hover Text Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'bghover',
			[
				'label'      => esc_html__('Background Color on Hover', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#1e73be',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section2',
			[
				'label' => __( 'Button 2', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'btn_icon2',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'btn_text2',
			[
				'label' => __( 'Button Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
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
				]
			]
		);

		$this->add_control(
			'btnclr2',
			[
				'label'      => esc_html__('Button Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_control(
			'btnbg2',
			[
				'label'      => esc_html__('Button Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'hvrclr2',
			[
				'label'      => esc_html__('Hover Text Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'bghover2',
			[
				'label'      => esc_html__('Background Color on Hover', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#1e73be',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Choose Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
		     	'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/dual-button/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'default' 	=> esc_html__('Default', 'uae'),
		     		'animated' 	=> esc_html__('Bounce Left & Right', 'uae'),
				],
				'default' 		=> 'default',
			]
		);

		$this->add_responsive_control(
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

		$this->add_responsive_control(
			'btn_padding',
			[
				'label' => __( 'Button Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .mega-dual-btn a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => esc_html__('Border Radius', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => __( 'Border', 'plugin-domain' ),
				'selector' => '{{WRAPPER}} .mega-dual-btn a',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'btn_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mega-dual-btn a',
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
			'divider_section',
			[
				'label' => __( 'Divider', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'divider',
			[
				'label' => __( 'Select Divider Options', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'none' 	=> esc_html__('None', 'uae'),
		     		'text' 	=> esc_html__('Text', 'uae'),
		     		'icon' 	=> esc_html__('Icon', 'uae'),
				],
				'default' 		=> 'none',
			]
		);

		$this->add_control(
			'divider_txt',
			[
				'label' => __( 'Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'divider' => 'text',
				],
			]
		);

		$this->add_control(
			'div_icon',
			[
				'label' => __( 'Divider Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'condition' => [
					'divider' => 'icon',
				],
			]
		);

		$this->add_control(
			'divider_clr',
			[
				'label'      => esc_html__('Text/Icon Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
			]
		);

		$this->add_control(
			'divider_bg',
			[
				'label'      => esc_html__('Text/Icon Background', 'uae'),
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

		<?php if ($settings['style'] == 'default') { ?>
    		<div class="mega-dual-btn mega-dual-<?php echo $some_id; ?>" style="text-align: <?php echo $settings['alignment']; ?>;">
	          <a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="border-radius: <?php echo $settings['border_radius']; ?>px; color: <?php echo $settings['btnclr']; ?>; background-color: <?php echo $settings['btnbg']; ?>;" class="mega_hvr_anim mega_dual_def">
	            <i class="<?php echo $settings['btn_icon']; ?>">&nbsp; </i><?php echo $settings['btn_text']; ?>
	          </a>
	          <a href="<?php echo $settings['btn_link2']['url']; ?>" <?php echo $target.$nofollow; ?> style="border-radius: <?php echo $settings['border_radius']; ?>px; color: <?php echo $settings['btnclr2']; ?>; background-color: <?php echo $settings['btnbg2']; ?>;" class="mega_hvr_anim2 mega_dual_def2">
	          	<?php echo $settings['btn_text2']; ?>&nbsp; <i class="<?php echo $settings['btn_icon2']; ?>"></i>
	          	<span class="mega-dual-divider" style="color: <?php echo $settings['divider_clr']; ?>; background: <?php echo $settings['divider_bg']; ?>; display: <?php echo $settings['divider']; ?>;">
	          		<p><?php echo $settings['divider_txt']; ?></p>
	          		<i class="<?php echo $settings['div_icon']; ?>"></i>
	          	</span>
	          </a>
	    	</div>
    	<?php } ?>

		<?php if ($settings['style'] == 'animated') { ?>
			<div class="mega-dual-btn mega-dual-<?php echo $some_id; ?>" style="text-align: <?php echo $settings['alignment']; ?>;">
	          <a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="border-radius: <?php echo $settings['border_radius']; ?>px; color: <?php echo $settings['btnclr']; ?>; background-color: <?php echo $settings['btnbg']; ?>;" class="mega_hvr_anim hover-bounce-to-left">
	            <span style="background: <?php echo $settings['bghover']; ?>;"></span> 
	            <i class="<?php echo $settings['btn_icon']; ?>">&nbsp; </i><?php echo $settings['btn_text']; ?>
	          </a>
	          <a href="<?php echo $settings['btn_link2']['url']; ?>" <?php echo $target.$nofollow; ?> style="border-radius: <?php echo $settings['border_radius']; ?>px; color: <?php echo $settings['btnclr2']; ?>; background-color: <?php echo $settings['btnbg2']; ?>;" class="mega_hvr_anim2 hover-bounce-to-right">
	          	<span class="mega-dual-hvr-bg" style="background: <?php echo $settings['bghover2']; ?>;"></span>
	          	<?php echo $settings['btn_text2']; ?>&nbsp; <i class="<?php echo $settings['btn_icon2']; ?>"></i>
	          	<span class="mega-dual-divider" style="color: <?php echo $settings['divider_clr']; ?>; background: <?php echo $settings['divider_bg']; ?>; display: <?php echo $settings['divider']; ?>;">
	          		<p><?php echo $settings['divider_txt']; ?></p>
	          		<i class="<?php echo $settings['div_icon']; ?>"></i>
	          	</span>
	          </a>
	    	</div>
    	<?php } ?>

    	<style>
			.mega-dual-<?php echo $some_id; ?> .mega_hvr_anim:hover{
				color: <?php echo $settings['hvrclr']; ?> !important;
			}
			.mega-dual-<?php echo $some_id; ?> .mega_hvr_anim2:hover{
				color: <?php echo $settings['hvrclr2']; ?> !important;
			}

			.mega-dual-<?php echo $some_id; ?> .mega_dual_def:hover{
				color: <?php echo $settings['hvrclr']; ?> !important;
				background-color: <?php echo $settings['bghover']; ?> !important;
			}
			.mega-dual-<?php echo $some_id; ?> .mega_dual_def2:hover{
				color: <?php echo $settings['hvrclr2']; ?> !important;
				background-color: <?php echo $settings['bghover2']; ?> !important;
			}
    	</style>
		<?php  
		/************HTML CODING END*************/

	}
}