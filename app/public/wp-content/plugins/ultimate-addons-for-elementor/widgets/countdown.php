<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_countdown extends \Elementor\Widget_Base {

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
		return 'countdown';
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
		return __( 'Countdown', 'uae' );
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
		return 'fa fa-clock-o';
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
		// wp_enqueue_style( 'countdown-css', plugins_url( '../css/jquery.countdown.css' , __FILE__ ));
		wp_enqueue_script( 'countDown-min-js', plugins_url( '../js/countdown.min.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'countdown-js', plugins_url( '../js/jquery.countdown.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'custom-countdown-js', plugins_url( '../js/front/countdown.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'countdown_section',
			[
				'label' => __( 'Countdown', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Choose Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/countdown/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'YOWDHMS' 	=> esc_html__('Year', 'uae'),
		     		'odHMS' 	=> esc_html__('Month', 'uae'),
		     		'wdHMS' 	=> esc_html__('Week', 'uae'),
		     		'DHMS' 		=> esc_html__('Days', 'uae'),
		     		'HMS' 		=> esc_html__('Hours', 'uae'),
				],
				'default' 		=> 'YOWDHMS',
			]
		);

		$this->add_control(
			'year',
			[
				'label'      => esc_html__('Year', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'just number start from 1 [ e.g 1 for current year, 2 for next year.. ]',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'month',
			[
				'label'      => esc_html__('Month', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'just number between 1 to 12 for specific month [ e.g 3 ]',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'date',
			[
				'label'      => esc_html__('Date', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'just number between 1 to 30 for specific date',
				'size_units' => ['px'],
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
			'content_style', 
			[
				'label'         => esc_html__('Setting', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'width',
			[
				'label'      => esc_html__('Countdown Width (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'height',
			[
				'label'      => esc_html__('Countdown height (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'time_size',
			[
				'label'      => esc_html__('Time Font Size (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'period_size',
			[
				'label'      => esc_html__('Period Font Size (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'line_height',
			[
				'label'      => esc_html__('Line Height', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'between timer and period',
				'default' => '2.5',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'margin',
			[
				'label'      => esc_html__('Margin', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'margin between each timer e.g 10px',
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'padding_top',
			[
				'label'      => esc_html__('Padding from top', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'description'	=>	'padding from top help to move time in center if you set border default 15px',
				'size_units' => ['px'],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'just_style', 
			[
				'label'         => esc_html__('Style', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'timeclr',
			[
				'label' => __( 'Timer Text Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_control(
			'periodclr',
			[
				'label' => __( 'Period Text Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_control(
			'bgclr',
			[
				'label' => __( 'Background Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_control(
			'borderclr',
			[
				'label' => __( 'Border Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_control(
			'border_width',
			[
				'label'      => esc_html__('Border width (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'border_radius',
			[
				'label'      => esc_html__('Border Radius (%)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'50',
			]
		);

		$this->add_control(
			'border_style',
			[
				'label' => __( 'Border Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'none' 		=> esc_html__('none', 'uae'),
		     		'solid' 	=> esc_html__('Solid', 'uae'),
		     		'dotted' 	=> esc_html__('Dotted', 'uae'),
		     		'dashed' 	=> esc_html__('Dashed', 'uae'),
		     		'hidden' 	=> esc_html__('Hidden', 'uae'),
		     		'double' 	=> esc_html__('Double', 'uae'),
		     		'groove' 	=> esc_html__('Groove', 'uae'),
		     		'ridge' 	=> esc_html__('Ridge', 'uae'),
		     		'outset' 	=> esc_html__('Outset', 'uae'),
				],
				'default' 		=> 'none',
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

		<!-- Countdown style -->
		<div
			id="defaultCountdown<?php echo $some_id; ?>"
			style="width: 100%;"
			class="countdownapply"
			data-style="<?php echo $settings['style']; ?>"
			data-year="<?php echo $settings['year']; ?>"
			data-month="<?php echo $settings['month']; ?>"
			data-date="<?php echo $settings['date']; ?>"
		>

		</div>
		<style>
			#defaultCountdown<?php echo $some_id; ?>  .countdown-section {
				background-color: <?php echo $settings['bgclr']; ?>;
				width: <?php echo $settings['width']; ?>px;
				height: <?php echo $settings['height']; ?>px;
				padding-top: <?php echo $settings['padding_top']; ?>px;
				margin: 0 <?php echo $settings['margin']; ?>px;
				border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['borderclr']; ?>;
				border-radius: <?php echo $settings['border_radius']; ?>%;
				line-height: <?php echo $settings['line_height']; ?>;
				display: inline-block;
			    float: none !important;
			}
			#defaultCountdown<?php echo $some_id; ?> {
				text-align: center;
			}
			#defaultCountdown<?php echo $some_id; ?>  .countdown-section .countdown-amount {
				font-size: <?php echo $settings['time_size']; ?>px;
				color: <?php echo $settings['timeclr']; ?>;	
			}
			#defaultCountdown<?php echo $some_id; ?>  .countdown-section .countdown-period {
				font-size: <?php echo $settings['period_size']; ?>px;
				color: <?php echo $settings['periodclr']; ?>;
			}
		</style>

		<?php  
		/************HTML CODING END*************/

	}
}