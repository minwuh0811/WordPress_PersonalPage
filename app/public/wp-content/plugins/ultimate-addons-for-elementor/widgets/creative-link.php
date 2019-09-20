<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_creative_link extends \Elementor\Widget_Base {

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
		return 'creativelink';
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
		return __( 'Creative Link', 'uae' );
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
		return 'fa fa-link';
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
		// wp_enqueue_style( 'uae-creative-link', plugins_url( '../css/creativelink.css' , __FILE__ ));
		wp_enqueue_script( 'creative-js', plugins_url( '../js/creativelink.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'effect',
			[
				'label' => __( 'Effects Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/creative-link/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'cl-effect-1' 	=> esc_html__('Effect 1', 'uae'),
		     		'cl-effect-2' 	=> esc_html__('Effect 2', 'uae'),
		     		'cl-effect-3' 	=> esc_html__('Effect 3', 'uae'),
		     		'cl-effect-4' 	=> esc_html__('Effect 4', 'uae'),
		     		'cl-effect-5' 	=> esc_html__('Effect 5', 'uae'),
		     		'cl-effect-6' 	=> esc_html__('Effect 6', 'uae'),
		     		'cl-effect-7' 	=> esc_html__('Effect 7', 'uae'),
		     		'cl-effect-8' 	=> esc_html__('Effect 8', 'uae'),
		     		// 'cl-effect-9' 	=> esc_html__('Effect 9', 'uae'),
		     		'cl-effect-10' 	=> esc_html__('Effect 10', 'uae'),
		     		'cl-effect-11' 	=> esc_html__('Effect 11', 'uae'),
		     		// 'cl-effect-12' 	=> esc_html__('Effect 12', 'uae'),
		     		'cl-effect-13' 	=> esc_html__('Effect 13', 'uae'),
		     		'cl-effect-14' 	=> esc_html__('Effect 14', 'uae'),
		     		'cl-effect-15' 	=> esc_html__('Effect 15', 'uae'),
		     		'cl-effect-16' 	=> esc_html__('Effect 16', 'uae'),
		     		// 'cl-effect-17' 	=> esc_html__('Effect 17', 'uae'),
		     		'cl-effect-18' 	=> esc_html__('Effect 18', 'uae'),
		     		'cl-effect-19' 	=> esc_html__('Effect 19', 'uae'),
		     		'cl-effect-20' 	=> esc_html__('Effect 20', 'uae'),
		     		'cl-effect-21' 	=> esc_html__('Effect 21', 'uae'),
				],
				'default' 		=> 'cl-effect-1',
			]
		);

		$this->add_control(
			'text',
			[
				'label' => __( 'Button Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Read More >>',
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

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mega-creative-btn a',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'content_styling',
			[
				'label' => __( 'Color', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title_clr',
			[
				'label' => __( 'Text Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_control(
			'title_bg',
			[
				'label' => __( 'Background Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_control(
			'hover_clr',
			[
				'label' => __( 'Hover Text Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_control(
			'hover_bg',
			[
				'label' => __( 'Background on Hover', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
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

		<?php if ($settings['effect'] == 'cl-effect-1' || $settings['effect'] == 'cl-effect-13') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="color: <?php echo $settings['title_clr']; ?>;">
					<?php echo $settings['text']; ?>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-2') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="color: <?php echo $settings['title_clr']; ?>;">
					<span class="creativelink" data-hover="<?php echo $settings['title_clr']; ?>" style="background: <?php echo $settings['title_bg']; ?>;">
						<span class="creativelink-" style="background: <?php echo $settings['hover_bg']; ?>;"><?php echo $settings['text']; ?></span>
						<?php echo $settings['text']; ?>
					</span>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-5') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="color: <?php echo $settings['title_clr']; ?>;">
					<span class="creativelink">
						<span class="creativelink-"><?php echo $settings['text']; ?></span>
						<?php echo $settings['text']; ?>
					</span>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-3' || $settings['effect'] == 'cl-effect-4') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="color: <?php echo $settings['title_clr']; ?>;">
					<?php echo $settings['text']; ?>
					<span class="creativelink" style="background: <?php echo $settings['hover_bg']; ?>;"></span>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-6' || $settings['effect'] == 'cl-effect-7' || $settings['effect'] == 'cl-effect-14' || $settings['effect'] == 'cl-effect-18' || $settings['effect'] == 'cl-effect-21') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> data-hover="Umbrella" style="color: <?php echo $settings['title_clr']; ?>;">
					<span class="creativelink" style="background: <?php echo $settings['title_bg']; ?>;"></span>
						<?php echo $settings['text']; ?>
					<span class="creativelink-" style="background: <?php echo $settings['title_bg']; ?>;"></span>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-8') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="color: <?php echo $settings['title_clr']; ?>;">
					<span class="creativelink" style="border: 3px solid <?php echo $settings['title_bg']; ?>;"></span>
						<?php echo $settings['text']; ?>
					<span class="creativelink-" style="border-color: <?php echo $settings['hover_bg']; ?>;"></span>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-10') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> data-hover="<?php echo $settings['title_clr']; ?>" style="color: <?php echo $settings['title_clr']; ?>;">
					<span class="creativelink" style="background: <?php echo $settings['hover_bg']; ?>;color: <?php echo $settings['hover_clr']; ?>;"><?php echo $settings['text']; ?></span>
					<span class="creativelink-" style="background: <?php echo $settings['title_bg']; ?>;"><?php echo $settings['text']; ?></span>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-11') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> data-hover="<?php echo $settings['title_clr']; ?>" style="color: <?php echo $settings['title_clr']; ?>; border-top: 2px solid transparent;">
					<span class="creativelink" style="border-bottom: 2px solid <?php echo $settings['hover_clr']; ?>;color: <?php echo $settings['hover_clr']; ?>;"><?php echo $settings['text']; ?></span>
					<?php echo $settings['text']; ?>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-15') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> data-hover="<?php echo $settings['title_clr']; ?>" style="color: <?php echo $settings['hover_clr']; ?>;">
					<span class="creativelink" style="color: <?php echo $settings['title_clr']; ?>;"><?php echo $settings['text']; ?></span>
					<?php echo $settings['text']; ?>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-16') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> data-hover="<?php echo $settings['title_clr']; ?>" style="color: <?php echo $settings['title_clr']; ?>;">
					<span class="creativelink" style="color: <?php echo $settings['hover_clr']; ?>;"><?php echo $settings['text']; ?></span>
					<?php echo $settings['text']; ?>
				</a>
			</div>
		<?php } ?>

		<?php if ($settings['effect'] == 'cl-effect-19' || $settings['effect'] == 'cl-effect-20') { ?>
			<div class="<?php echo $settings['effect']; ?> mega-creative-btn" style="text-align: <?php echo $settings['alignment']; ?>;">
				<a href="<?php echo $settings['ihe_link']['url']; ?>" <?php echo $target.$nofollow; ?> style="color: <?php echo $settings['title_clr']; ?>;">
					<span data-hover="<?php echo $settings['title_clr']; ?>" class="creativelink" style="background: <?php echo $settings['title_bg']; ?>;">
					<span class="creativelink-" style="background: <?php echo $settings['hover_bg']; ?>;color: <?php echo $settings['hover_clr']; ?>;"><?php echo $settings['text']; ?></span>
						<?php echo $settings['text']; ?>
					</span>
				</a>
			</div>
		<?php } ?>

		<style>
			.cl-effect-13 a:hover::before, .cl-effect-13 a:focus::before {
				color: <?php echo $settings['title_clr']; ?> !important;
		    	text-shadow: 10px 0 <?php echo $settings['title_clr']; ?>, -10px 0 <?php echo $settings['title_clr']; ?> !important;
			}	
		</style>

		<?php  
		/************HTML CODING END*************/

	}
}