<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_hightlight_box extends \Elementor\Widget_Base {

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
		return 'hightlight';
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
		return __( 'HighLight Box', 'uae' );
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
		return 'fa fa-header';
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
		// wp_enqueue_style( 'highlight-box-css', plugins_url( '../css/highlight-box.css' , __FILE__ ));
		
		$this->start_controls_section(
			'content_section',
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
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/highlight-box/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'btn-5a' 	=> esc_html__('Slide Top', 'uae'),
		     		'btn-5b' 	=> esc_html__('Slide Left', 'uae'),
		     		'btn-5c' 	=> esc_html__('Slide Right', 'uae'),
		     		'btn-5d' 	=> esc_html__('Slide Bottom', 'uae'),
		     		'fade' 		=> esc_html__('Fade without Icon', 'uae'),
		     		'fade2' 	=> esc_html__('Fade with Icon', 'uae'),
				],
				'default' 		=> 'btn-5a',
			]
		);

		$this->add_control(
			'height',
			[
				'label'      => esc_html__('Box Height (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'default'	=>	'100',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .highlight_box .text *',
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
				],
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
			'styleasd', 
			[
				'label'        => esc_html__('Icon', 'uae' ),
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
			'icon_size',
			[
				'label'      => esc_html__('Icon Size (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'textclr',
			[
				'label'      => esc_html__('Text/Icon Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'separator' => 'before',
			]
		);

		$this->add_control(
			'bgclr',
			[
				'label'      => esc_html__('Background Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#e74c3c',
			]
		);

		$this->add_control(
			'hoverbg',
			[
				'label'      => esc_html__('Hover Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#c0392b',
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

		<div id="highlight_box<?php echo $some_id; ?>" class="highlight_box" style="display: table; width: 100%;height: 100%;">
				<?php if ($settings['style'] != 'fade2') { ?>
					<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="mega_highlight_box btn-5 <?php echo $settings['style']; ?>" style="height: <?php echo $settings['height']; ?>px; color: <?php echo $settings['textclr']; ?>; background: <?php echo $settings['bgclr']; ?>;">
						<i class="<?php echo $settings['btn_icon']; ?> span-before" aria-hidden="true" style="font-size: <?php echo $settings['icon_size']; ?>px; line-height: <?php echo $settings['height']; ?>px; color: <?php echo $settings['textclr']; ?>;"></i>
						<div>
							<span class="text">
								<?php echo $settings['content']; ?>
							</span>
						</div>
						<span class="span-after"></span>
					</a>
				<?php } ?>

				<?php if ($settings['style'] == 'fade2') { ?>
					<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="mega_highlight_box btn-5 <?php echo $settings['style']; ?>" style="height: <?php echo $settings['height']; ?>px; color: <?php echo $settings['textclr']; ?>; background: <?php echo $settings['bgclr']; ?>; text-align: center;">
						<div>
							<span class="text">
								<?php echo $settings['content']; ?>
							</span>
						</div>
						<i class="<?php echo $settings['btn_icon']; ?>" aria-hidden="true" style="line-height: 2; font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['textclr']; ?>;"></i>
					</a>
				<?php } ?>
			</div>

			<style>
				#highlight_box<?php echo $some_id; ?> a:hover{
					background: <?php echo $settings['hoverbg']; ?> !important;
				}
				#highlight_box<?php echo $id; ?> .fade i{
					display: none;
				}
			</style>

		<?php  
		/************HTML CODING END*************/

	}
}