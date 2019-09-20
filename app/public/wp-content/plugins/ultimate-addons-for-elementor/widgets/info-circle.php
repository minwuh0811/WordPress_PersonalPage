<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_info_circle extends \Elementor\Widget_Base {

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
		return 'info-cirlce';
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
		return __( 'Info Circle', 'uae' );
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
		return 'fa fa-recycle';
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
		// wp_enqueue_style( 'info-circle-css', plugins_url( '../css/info-circle.css' , __FILE__ ));
		// wp_enqueue_script( 'info-circle-js', plugins_url( '../js/info-circle.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'Icon Setting', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'icon_vision',
			[
				'label' => __( 'Show/Hide', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'hide_iconss' 	=> esc_html__('Show', 'uae'),
		     		'hide_icon' 	=> esc_html__('Hide', 'uae'),
				],
				'description'	=>	'show or hide font icon for inner section <a href="https://elementor.topdigitaltrends.net/info-circle/" target="_blank">See Demo</a>',
				'default' 		=> 'hide_iconss',
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label' => __( 'Icon size (px)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '25',
			]
		);

		$this->add_control(
			'icon_clr',
			[
				'label' => __( 'Icon Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_control(
			'icon_bg',
			[
				'label' => __( 'Icon Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#ededed',
			]
		);

		$this->add_control(
			'border_width',
			[
				'label'      => esc_html__('Border width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'0',
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
		     		'ridge' 	=> esc_html__('Ridge', 'uae'),
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
				'label'      => esc_html__('Border Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#cac9c7',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'setting_section',
			[
				'label' => __( 'General Setting', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'textclr',
			[
				'label'      => esc_html__('Title/Description Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_control(
			'bgclr',
			[
				'label'      => esc_html__('Body Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#eaeaea',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography',
				'label' => __('Title Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mega-info-circle .info-circle-detail h3',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'text_typography2',
				'label' => __('Description Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .mega-info-circle .info-circle-detail p',
			]
		);

		$this->add_control(
			'border_width2',
			[
				'label'      => esc_html__('Border width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'2',
			]
		);

		$this->add_control(
			'border_style2',
			[
				'label' => __( 'Border Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'solid' 	=> esc_html__('Solid', 'uae'),
		     		'dotted' 	=> esc_html__('Dotted', 'uae'),
		     		'ridge' 	=> esc_html__('Ridge', 'uae'),
		     		'dashed' 	=> esc_html__('Dashed', 'uae'),
		     		'double' 	=> esc_html__('Double', 'uae'),
		     		'groove' 	=> esc_html__('Groove', 'uae'),
		     		'inset' 	=> esc_html__('Inset', 'uae'),
				],
				'default' 		=> 'solid',
			]
		);

		$this->add_control(
			'border_clr2',
			[
				'label'      => esc_html__('Border Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#E1E1E1',
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
			'circle-styling', 
			[
				'label'         => esc_html__('Info Circle', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'info_icon',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'circle-styling2', 
			[
				'label'         => esc_html__('Info Circle 2', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'info_icon2',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'title2',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'desc2',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'circle-styling3', 
			[
				'label'         => esc_html__('Info Circle 3', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'info_icon3',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'title3',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'desc3',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'circle-styling4', 
			[
				'label'         => esc_html__('Info Circle 4', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'info_icon4',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'title4',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'desc4',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'circle-styling5', 
			[
				'label'         => esc_html__('Info Circle 5', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'info_icon5',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
			]
		);

		$this->add_control(
			'title5',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'desc5',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
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

		<div id="mega-info-circle" class="mega-info-circle" style="margin-top: 40px;">
        	<div class="mega-outer-section" style="border: <?php echo $settings['border_width2']; ?>px <?php echo $settings['border_style2']; ?> <?php echo $settings['border_clr2']; ?>;">
	        	<div class="mega-inner-section" style="background: <?php echo $settings['bgclr']; ?>; width: 62%; height: 62%;">
		        	<div style="display: table; width: 100%; height: 100%;">
		        		<div style="display: table-cell !important; vertical-align: middle !important;" class="mega-inner-section-div <?php echo $settings['icon_vision']; ?>">


			        	</div>
		        	</div>
	        	</div>

	        	<div class="info-circle-icon icon-wrapper" style="background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;">
	        		<div>
	        				<i class="<?php echo $settings['info_icon']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>
    					
    					<span class="info-circle-detail">
    						<h3 style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['title']; ?>
    						</h3>
    						<p style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['desc']; ?>
    						</p>
    					</span>
    				</div>
    			</div>

    			<div class="info-circle-icon2 icon-wrapper" style="background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;">
    				<div>
	        				<i class="<?php echo $settings['info_icon2']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>

    					<span class="info-circle-detail">
    						<h3 style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['title2']; ?>
    						</h3>
    						<p style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['desc2']; ?>
    						</p>
    					</span>
    				</div>
    			</div>

    			<div class="info-circle-icon3 icon-wrapper" style="background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;">
    				<div>
	        				<i class="<?php echo $settings['info_icon3']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>

    					<span class="info-circle-detail">
    						<h3 style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['title3']; ?>
    						</h3>
    						<p style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['desc3']; ?>
    						</p>
    					</span>
    				</div>
    			</div>

    			<div class="info-circle-icon4 icon-wrapper" style="background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;">
    				<div>
	        				<i class="<?php echo $settings['info_icon4']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>

    					<span class="info-circle-detail">
    						<h3 style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['title4']; ?>
    						</h3>
    						<p style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['desc4']; ?>
    						</p>
    					</span>
    				</div>
    			</div>

    			<div class="info-circle-icon5 icon-wrapper" style="background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;">
    				<div>
	        				<i class="<?php echo $settings['info_icon5']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>

    					<span class="info-circle-detail">
    						<h3 style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['title5']; ?>
    						</h3>
    						<p style="color: <?php echo $settings['textclr']; ?>;">
    							<?php echo $settings['desc5']; ?>
    						</p>
    					</span>
    				</div>
    			</div>
        	</div>

			<!== Mobile View ==>
        	<ul class="info-circle-mobile" style="border-left: <?php echo $settings['border_width2']; ?>px <?php echo $settings['border_style2']; ?> <?php echo $settings['border_clr2']; ?>;">
        		<li class="info-circle-icon">
	        				<i class="<?php echo $settings['info_icon']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>; background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;"></i>
    				
    				<span class="mobile-info-detail" style="">
						<h3 style="font-size: 18px; color: #000; margin: 5px 0;">
							<?php echo $settings['title']; ?>
						</h3>
						<p style="font-size: 14px; color: #000;">
							<?php echo $settings['desc']; ?>
						</p>
					</span>
        		</li>

        		<li class="info-circle-icon">
	        				<i class="<?php echo $settings['info_icon2']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>; background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;"></i>
    				<span class="mobile-info-detail" style="">
						<h3 style="font-size: 18px; color: #000; margin: 5px 0;">
							<?php echo $settings['title2']; ?>
						</h3>
						<p style="font-size: 14px; color: #000;">
							<?php echo $settings['desc2']; ?>
						</p>
					</span>
        		</li>

        		<li class="info-circle-icon">
	        				<i class="<?php echo $settings['info_icon3']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>; background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;"></i>
    				<span class="mobile-info-detail" style="">
						<h3 style="font-size: 18px; color: #000; margin: 5px 0;">
							<?php echo $settings['title3']; ?>
						</h3>
						<p style="font-size: 14px; color: #000;">
							<?php echo $settings['desc3']; ?>
						</p>
					</span>
        		</li>

        		<li class="info-circle-icon">
	        				<i class="<?php echo $settings['info_icon4']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>; background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;"></i>
    				<span class="mobile-info-detail" style="">
						<h3 style="font-size: 18px; color: #000; margin: 5px 0;">
							<?php echo $settings['title4']; ?>
						</h3>
						<p style="font-size: 14px; color: #000;">
							<?php echo $settings['desc4']; ?>
						</p>
					</span>
        		</li>

        		<li class="info-circle-icon" style="padding-bottom: 0;">
	        				<i class="<?php echo $settings['info_icon5']; ?>" style="font-size: <?php echo $settings['icon_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>; background: <?php echo $settings['icon_bg']; ?>; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_style']; ?> <?php echo $settings['border_clr']; ?>;"></i>
    				<span class="mobile-info-detail" style="">
						<h3 style="font-size: 18px; color: #000; margin: 5px 0;">
							<?php echo $settings['title5']; ?>
						</h3>
						<p style="font-size: 14px; color: #000;">
							<?php echo $settings['desc5']; ?>
						</p>
					</span>
        		</li>
        	</ul>
        </div>

         <script>
   //      jQuery(document).ready(function($) {
			// 	$('.mega-info-circle').find('.icon-wrapper').each(function(index, el) {
			// 		var inner_section = $(this).closest('.mega-info-circle').find('.mega-inner-section > div > div');
			// 		var content = $(this).find('div').clone();
					
			// 		$(this).hover(function() {
			// 			setTimeout(function(){
			// 				$(inner_section).html(content).css({opacity: 0.0, visibility: "visible"}).animate({opacity: 1.0});
			// 			}, 400);
			// 		}, function() {
						
			// 		});

			// 		if (index % 5 == 0) {
			// 			$(this).trigger('mouseenter');
			// 		}
			// 	});

			// });
   //      </script>
		<?php  
		/************HTML CODING END*************/

	}
}