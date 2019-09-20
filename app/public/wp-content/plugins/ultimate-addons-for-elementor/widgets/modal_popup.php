<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_modal_popup extends \Elementor\Widget_Base {

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
		return 'modalpopup';
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
		return __( 'Modal Popup', 'uae' );
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
		return 'fa fa-columns';
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
		// wp_enqueue_style( 'uae-modal-popup', plugins_url( '../css/modal_popup.css' , __FILE__ ));
		// wp_enqueue_script( 'bpopup-js', plugins_url( '../js/bpopup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		// wp_enqueue_script( 'custom-bpopup-js', plugins_url( '../js/front/custom_bpopup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'modal_anim',
			[
				'label'      => esc_html__('Popup Animation', 'uae'),
				'type'       => \Elementor\Controls_Manager::ANIMATION,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/modal-popup/" target="_blank">See Demo</a>'
			]
		);

		$this->add_control(
			'modal_posi',
			[
				'label'      => esc_html__('Modal position from top', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'default'		=>	'60',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'modal_width',
			[
				'label'      => esc_html__('Popup Width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'default'		=>	'600',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'bodybg',
			[
				'label' => __( 'Body Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'button_section',
			[
				'label' => __( 'Button Setting', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
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
			'btn_padding',
			[
				'label' => __( 'Padding', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .modal-popup-box .model-popup-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'0px' 	=> esc_html__('0px', 'uae'),
		     		'1px' 	=> esc_html__('1px', 'uae'),
		     		'2px' 	=> esc_html__('2px', 'uae'),
		     		'3px' 	=> esc_html__('3px', 'uae'),
		     		'4px' 	=> esc_html__('4px', 'uae'),
		     		'5px' 	=> esc_html__('5px', 'uae'),
		     		'6px' 	=> esc_html__('6px', 'uae'),
		     		'7px' 	=> esc_html__('7px', 'uae'),
		     		'8px' 	=> esc_html__('8px', 'uae'),
		     		'9px' 	=> esc_html__('9px', 'uae'),
				],
				'default' 		=> '0px',
			]
		);

		$this->add_control(
			'border_style',
			[
				'label' => __( 'Border Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'solid' 	=> esc_html__('Solid', 'uae'),
		     		'dotted' 	=> esc_html__('Dotted', 'uae'),
		     		'rige' 		=> esc_html__('Rige', 'uae'),
		     		'dashed' 	=> esc_html__('Dashed', 'uae'),
		     		'double' 	=> esc_html__('Double', 'uae'),
		     		'groove' 	=> esc_html__('Groove', 'uae'),
		     		'inset' 	=> esc_html__('Inset', 'uae'),
				],
				'default' 		=> 'solid',
			]
		);

		$this->add_control(
			'border_clr',
			[
				'label' => __( 'Border Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
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
					'{{WRAPPER}} .modal-popup-box .model-popup-btn' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .modal-popup-box .model-popup-btn',
			]
		);

		$this->add_control(
			'btn_clr',
			[
				'label' => __( 'Button Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
			]
		);

		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Button Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
			]
		);

		$this->add_control(
			'btn_hover',
			[
				'label' => __( 'Hover Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
			]
		);

		$this->add_control(
			'hover_bg',
			[
				'label' => __( 'Hover Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '',
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
			'title_stying', 
			[
				'label'         => esc_html__('Modal Title', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'modal_text',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'title_size',
			[
				'label'      => esc_html__('Title Font Size', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'default'		=>	'19',
				'size_units' => ['px'],
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Title Alignment', 'uae' ),
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
				'default' => '#047899',
			]
		);

		$this->add_control(
			'title_line',
			[
				'label' => __( 'Border Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#4054b2',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'popup_stying', 
			[
				'label'         => esc_html__('Popup Content', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'popup_bg',
			[
				'label' => __( 'Modal Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Popup Content', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'description' => esc_html__( 'You can also use shortcode', 'uae' ),
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
		 
		// $target = $settings['ihe_link']['is_external'] ? ' target="_blank"' : '';
		// $nofollow = $settings['ihe_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<div class="modal-popup-box" data-bodybg="<?php echo $settings['bodybg']; ?>">
			<button class="model-popup-btn popup-<?php echo $some_id; ?>" data-id="popup-<?php echo $some_id; ?>" style="color: <?php echo $settings['btn_clr']; ?>; background: <?php echo $settings['btn_bg']; ?>; border: <?php echo $settings['border_width']; ?> <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;">
				<?php echo $settings['btn_text']; ?>
			</button>

			<div class="mega-model-popup <?php echo $settings['modal_anim']; ?> animated" id="popup-<?php echo $some_id; ?>" style="position:fixed;display: none; margin-top: <?php echo $settings['modal_posi']; ?>px; width: 95%;max-width: <?php echo $settings['modal_width']; ?>px; background: <?php echo $settings['popup_bg']; ?>;">
				<span class="b-close"><span><img src="<?php echo plugin_dir_url( __FILE__ ); ?>../images/cross.png"></span></span>
			    <div class="model-popup-container">
			    	<h2 style="border-bottom: 1px solid <?php echo $settings['title_line']; ?>; text-align: <?php echo $settings['alignment']; ?>; color: <?php echo $settings['title_clr']; ?>; background: <?php echo $settings['title_bg']; ?>; font-size: <?php echo $settings['title_size']; ?>px; margin: 0px; padding: 0px 20px;">
			    		<?php echo $settings['modal_text']; ?>
			    	</h2>
			      <span style="padding: 15px 20px; display: block;">
			      	<?php echo $settings['content']; ?>
			      </span>
			    </div>
			</div>
		</div>
		<style>
			.modal-popup-box .popup-<?php echo $some_id; ?>:hover {
				color: <?php echo $settings['btn_hover']; ?> !important;
				background: <?php echo $settings['hover_bg']; ?> !important;
			}
		</style>

		<?php  
		/************HTML CODING END*************/

	}
}