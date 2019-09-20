<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_info_list extends \Elementor\Widget_Base {

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
		return 'infolist';
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
		return __( 'Info List', 'uae' );
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
		return 'fa fa-list';
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
		// wp_enqueue_style( 'infolist-css', plugins_url( '../css/infolist.css' , __FILE__ ));
		

		$this->start_controls_section(
			'general',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
		'theme',
			[
				'label' => __( 'Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/info-list/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'left' 	=> esc_html__('Left Align', 'uae'),
		     		'right' 	=> esc_html__('Right Align', 'uae'),
				],
				'default' 		=> 'left',
			]
		);

		$this->add_control(
			'line_height',
			[
				'label'      => esc_html__('Connecter Vertical Line Height', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'25',
			]
		);

		$this->add_control(
			'line_width',
			[
				'label'      => esc_html__('Connector Width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'1',
			]
		);

		$this->add_control(
			'line_style',
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
			'line_clr',
			[
				'label'      => esc_html__('Line Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'Icon/Image', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'style',
			[
				'label' => __( 'Image/Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'image' 	=> esc_html__('Image', 'uae'),
		     		'icon' 	=> esc_html__('Icon', 'uae'),
				],
				'default' 		=> 'image',
			]
		);

		$repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'elementor' ),
				'type' => \Elementor\Controls_Manager::MEDIA,
				'dynamic' => [
					'active' => true,
				],
				'condition' => [
					'style' => 'image',
				],
			]
		);

		// $repeater->add_group_control(
		// 	\Elementor\Group_Control_Image_Size::get_type(),
		// 	[
		// 		'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
		// 		'default' => 'full',
		// 		'separator' => 'none',
		// 		'condition' => [
		// 			'style' => 'image',
		// 		],
		// 	]
		// );

		$repeater->add_control(
			'flip_icon',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'condition' => [
					'style' => 'icon',
				],
			]
		);

		$repeater->add_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 	'flip_size',
				'label'      => esc_html__('Icon Size (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
		        'range' => [
		            '%' => [
		                'min' => 0,
		                'max' => 100,
		            ],
		        ],
		        'condition' => [
					'style' => 'icon',
				],
		        'selectors' => [
					'{{WRAPPER}} .mega-info-list .vc_info_list i' => 'font-size: {{SIZE}}px;',
				],
			]
		);

		$repeater->add_control(
			'box_size',
			[
				'label'      => esc_html__('Width (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$repeater->add_control(
			'icon_clr',
			[
				'label'      => esc_html__('Icon Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'condition' => [
					'style' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'icon_bg',
			[
				'label'      => esc_html__('Icon Background', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#dc005b',
				'condition' => [
					'style' => 'icon',
				],
			]
		);

		$repeater->add_control(
			'border_width',
			[
				'label'      => esc_html__('Border width', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'0',
				'condition' => [
					'style' => 'icon',
				],
			]
		);

		// $repeater->add_responsive_control(
		// 	'border_width',
		// 	[
		// 		'label' => __( 'Border width', 'uae' ),
		// 		'type' => \Elementor\Controls_Manager::DIMENSIONS,
		// 		'size_units' => [ 'px', '%', 'em' ],
		// 		'condition' => [
		// 			'style' => 'icon',
		// 		],
		// 		'selectors' => [
		// 			'{{WRAPPER}} .uae-info-banner-styles .mega_wrap' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
		// 		],
		// 	]
		// );

		$repeater->add_control(
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
				'condition' => [
					'style' => 'icon',
				],
			]
		);

		$repeater->add_responsive_control(
			'border_radius',
			[
				'label' => __( 'Border Radius', 'uae' ),
				'type' => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .vc_info_list_outer .info_list_icon_radius, .vc_info_list_outer img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
				],
			]
		);

		$repeater->add_control(
			'border_clr',
			[
				'label'      => esc_html__('Border Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#eeeeee',
				'condition' => [
					'style' => 'icon',
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
			'text',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$repeater->add_control(
			'title_clr',
			[
				'label' => __( 'Title Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$repeater->add_control(
			'title_size',
			[
				'label'      => esc_html__('Title Size (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'default'	=>	'17',
			]
		);

		$repeater->add_control(
			'content',
			[
				'label' => esc_html__( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
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
				'title_field' => '{{{ theme }}}',
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
		 
		// $target = $settings['ihe_link']['is_external'] ? ' target="_blank"' : '';
		// $nofollow = $settings['ihe_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<ul class="mega-info-list" style="list-style-type: none; height: 100%;">
			<div class="vc_info_list_outer">
				<?php foreach ($settings['list_items'] as $list_items) { ?>
					<?php if ($settings['theme'] == 'left') { ?>			    	
				    	<li class="vc_info_list" style="padding-bottom: <?php echo $settings['line_height']; ?>px; border-left: <?php echo $settings['line_width']; ?>px <?php echo $settings['line_style']; ?> <?php echo $settings['line_clr']; ?>; display: table;margin-left: <?php echo $list_items['box_size']/2+$list_items['border_width']; ?>px; float: none; margin-bottom: 2px;">
					      	<div class="media">
							  <div class="media-left info-list-img" style="margin-left: -<?php echo $list_items['box_size']/2+$list_items['border_width']; ?>px; padding-right: 20px; float: left;">
							    <?php if ($list_items['style'] == 'image') { ?>
							    	<span style="width: <?php echo $list_items['box_size']; ?>px; display: grid; height: auto;">
						        		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $list_items ); ?>
						        	</span>
						        <?php } ?>
						        <?php if ($list_items['style'] == 'icon') { ?>
						        <div style="border: <?php echo $list_items['border_width']; ?>px <?php echo $list_items['border_style']; ?> <?php echo $list_items['border_clr']; ?>; background: <?php echo $list_items['icon_bg']; ?>;" class="info_list_icon_radius">
							        <span style="display:table; width: <?php echo $list_items['box_size']; ?>px; height: <?php echo $list_items['box_size']; ?>px; text-align: center;" class="info_list_icon_radius">
								    	<span style="display: table-cell !important;vertical-align: middle !important;">
								        
								        	<i class="<?php echo $list_items['flip_icon']; ?>" aria-hidden="true" style="color: <?php echo $list_items['icon_clr']; ?>;"></i>
							       	 	
							       	 	</span>
								  	</span>
								</div>
								<?php } ?>
							  </div>
						  	  <div class="media-body">
						    	<h4 style="color: <?php echo $list_items['title_clr']; ?>; font-size: <?php echo $list_items['title_size'] ?>px;">
						    		<?php echo $list_items['text']; ?>
						    	</h4>
						    	<div class="content">
						    		<?php echo $list_items['content']; ?>
						    	</div>
						  		</div>
							</div>
				    	</li>
					<?php } ?>

					<?php if ($settings['theme'] == 'right') { ?>
					    <li class="vc_info_list" style="padding-bottom: <?php echo $settings['line_height']; ?>px; border-right: <?php echo $settings['line_width']; ?>px <?php echo $settings['line_style']; ?> <?php echo $settings['line_clr']; ?>; display: table;margin-right: <?php echo $list_items['box_size']/2+$list_items['border_width']; ?>px; float: none; margin-bottom: 2px;">
							<div class="media" style="margin-right: -<?php echo $list_items['box_size']/2+$list_items['border_width']; ?>px;">
							   <div class="media-body text-right">
							     <h4 style="color: <?php echo $list_items['title_clr']; ?>; font-size: <?php echo $list_items['title_size'] ?>px;">
						    		<?php echo $list_items['text']; ?>
							     </h4>
							     <div class="content">
							    	<?php echo $list_items['content']; ?>
							     </div>
							   </div>
							   <div class="media-right" style="padding-left: 20px;">
							     <?php if ($list_items['style'] == 'image') { ?>
								    <span style="width: <?php echo $list_items['box_size']; ?>px; display: grid; height: auto;">
							        	<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $list_items ); ?>
							        </span>
						         <?php } ?>
						         <?php if ($list_items['style'] == 'icon') { ?>
							        <div style="background: <?php echo $list_items['icon_bg']; ?>; border: <?php echo $list_items['border_width']; ?>px <?php echo $list_items['border_style']; ?> <?php echo $list_items['border_clr']; ?>;"  class="info_list_icon_radius">
								        <span style="display:table; width: <?php echo $list_items['box_size']; ?>px; height: <?php echo $list_items['box_size']; ?>px; text-align: center;"  class="info_list_icon_radius">
									    	<span style="display: table-cell !important;vertical-align: middle !important;">
									        
									        	<i class="<?php echo $list_items['flip_icon']; ?>" aria-hidden="true" style="color: <?php echo $list_items['icon_clr']; ?>;"></i>
								       	 	
								       	 	</span>
									  	</span>
									</div>
								<?php } ?>
							   </div>
							</div>
						</li>
					<?php } ?>	
				<?php } ?>	
			</div>
		</ul>

		<?php  
		/************HTML CODING END*************/

	}
}