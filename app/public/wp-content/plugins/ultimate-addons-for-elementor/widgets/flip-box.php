<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_flip_box extends \Elementor\Widget_Base {

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
		return 'flipbox';
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
		return __( 'Flip Box', 'uae' );
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
		return 'fa fa-random';
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
		// wp_enqueue_style( 'flip-box-css', plugins_url( '../css/flipbox.css' , __FILE__ ));
		// wp_enqueue_script( 'bpopup-js', plugins_url( '../js/bpopup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		
		$this->start_controls_section(
			'general_section',
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
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/flip-box/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'horizental' 	=> esc_html__('Horizental', 'uae'),
		     		'vertical' 				=> esc_html__('Vertical', 'uae'),
		     		'3d' 			=> esc_html__('Flip 3D', 'uae'),
				],
				'default' 		=> 'horizental',
			]
		);

		$this->add_control(
			'flip_height',
			[
				'label' => __( 'Flip Box Height (px)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'front_bg',
			[
				'label' => __( 'Front Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#f7f7f7',
			]
		);

		$this->add_control(
			'border_style',
			[
				'label' => __( 'Border Styling', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'default' 		=> esc_html__('Default', 'uae'),
		     		'custom_border' => esc_html__('Custom Styling', 'uae'),
				],
				'default' 		=> 'default',
			]
		);

		$this->add_control(
			'border_clr',
			[
				'label' => __( 'Border Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#0473AA',
				'condition' => [
					'border_style' => 'custom_border',
				],
			]
		);

		$this->add_control(
			'border_width',
			[
				'label' => __( 'Border Width (px)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'condition' => [
					'border_style' => 'custom_border',
				],
			]
		);

		$this->add_control(
			'border_styling',
			[
				'label' => __( 'Border Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'condition' => [
					'border_style' => 'custom_border',
				],
				'options' 		=> [
		     		'solid' 	=> esc_html__('Solid', 'uae'),
		     		'dotted' 	=> esc_html__('Dotted', 'uae'),
		     		'dashed' 	=> esc_html__('Dashed', 'uae'),
		     		'hidden' 	=> esc_html__('Hidden', 'uae'),
		     		'double' 	=> esc_html__('Double', 'uae'),
		     		'groove' 	=> esc_html__('Groove', 'uae'),
		     		'ridge' 	=> esc_html__('Ridge', 'uae'),
		     		'outset' 	=> esc_html__('Outset', 'uae'),
				],
				'default' 		=> 'solid',
			]
		);

		$this->add_control(
			'link_st',
			[
				'label' => __( 'Link To', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'none' 		=> esc_html__('None', 'uae'),
		     		'custom_link' => esc_html__('Custom Link', 'uae'),
				],
				'default' 		=> 'none',
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
				'condition' => [
					'link_st' => 'custom_link',
				],
			]
		);

		$this->add_control(
			'btn_text',
			[
				'label' => __( 'Link Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default'	=>	'Learn More',
				'condition' => [
					'link_st' => 'custom_link',
				],
			]
		);

		$this->add_control(
			'btn_clr',
			[
				'label' => __( 'Link Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
				'condition' => [
					'link_st' => 'custom_link',
				],
			]
		);

		$this->add_control(
			'btn_bg',
			[
				'label' => __( 'Link Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#dc005b',
				'condition' => [
					'link_st' => 'custom_link',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'front_section',
			[
				'label' => __( 'Front Display', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'info_opt',
			[
				'label' => __( 'Choose Image or Font icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'show_image' 		=> esc_html__('Image', 'uae'),
		     		'show_icon' 		=> esc_html__('Icon', 'uae'),
				],
				'default' 		=> 'show_image',
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
				'condition' => [
					'info_opt' => 'show_image',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'large',
				'separator' => 'none',
				'condition' => [
					'info_opt' => 'show_image',
				],
			]
		);

		$this->add_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' 		=> 	'img_radius',
				'label'      => esc_html__('Image Radius', 'uae'),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => ['px', '%'],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'condition' => [
					'info_opt' => 'show_image',
				],
                'selectors' => [
					'{{WRAPPER}} .vc-ihe-panel img' => 'border-radius: {{SIZE}}px;',
				],
			]
		);

		$this->add_control(
			'flip_icon',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'flip_size',
			[
				'label'      => esc_html__('Icon Size (px)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
				'condition' => [
					'info_opt' => 'show_icon',
				],
			]
		);

		$this->add_control(
			'icon_clr',
			[
				'label'      => esc_html__('Icon Color', 'uae'),
				'type'       => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#dc005b',
				'condition' => [
					'info_opt' => 'show_icon',
				],
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
			'title_clr',
			[
				'label' => __( 'Title Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vc-ihe-panel h4',
			]
		);

		$this->add_control(
			'desc',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_control(
			'desc_clr',
			[
				'label' => __( 'Description Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vc-ihe-panel p',
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
			'flip_style', 
			[
				'label'        => esc_html__('Flip Display', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'desc_bg',
			[
				'label' => __( 'Background Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#f7f7f7',
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => esc_html__( '<h3>Caption Text Here</h3> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.', 'uae' ),
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'asdsadsad', 
			[
				'label'         => esc_html__('Typography', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'front_title_size',
			[
				'label'      => esc_html__('Front Title Font Size (For Mobile)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'front_desc_size',
			[
				'label'      => esc_html__('Front Description Font Size (For Mobile)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
			]
		);

		$this->add_control(
			'front_height_size',
			[
				'label'      => esc_html__('Flip height (For Mobile)', 'uae'),
				'type'       => \Elementor\Controls_Manager::NUMBER,
				'size_units' => ['px'],
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

		<?php if ($settings['style'] == 'vertical') { ?>
	      	<div class="hover vc-ihe-panel <?php echo $class; ?>" id="vc-flip-box-<?php echo $some_id; ?>" style="height: <?php echo $settings['flip_height']; ?>px;">
			  <div class="front" style="background: <?php echo $settings['front_bg']; ?>;">
			  	<div style="display:table;width:100%;height:100%;">
				    <div class="pad" style="display: table-cell !important;vertical-align: middle !important; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_styling']; ?> <?php echo $settings['border_clr']; ?>;">
				      <?php if ($settings['info_opt'] == 'show_image') { ?>
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>			
					  <?php } ?>
					  <?php if ($settings['info_opt'] == 'show_icon') { ?>
						<i class="<?php echo $settings['flip_icon']; ?>" aria-hidden="true" style="font-size: <?php echo $settings['flip_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>
					  <?php } ?>
				      <h4 class="flip-box-title" style="color: <?php echo $settings['title_clr']; ?>;">
				      		<?php echo $settings['title']; ?>
				      </h4>
				      <p class="flip-box-desc" style="color: <?php echo $settings['desc_clr']; ?>; font-size: <?php echo $descrsize; ?>px;">
				        <?php echo $settings['desc']; ?>
				      </p>
				    </div>
			    </div>
			  </div>
			  <div class="back" style="background: <?php echo $settings['desc_bg']; ?>">
				<div style="display:table;width:100%;height:100%;">
			    	<div class="pad" style="display: table-cell !important;vertical-align: middle !important; padding: 10px;">
				      <?php echo $settings['content']; ?>
				      <p style="text-align: center;">
				      	<?php if (!empty($settings['btn_text'])) { ?>
					      	<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="mega_hvr_btn" style="color: <?php echo $settings['btn_clr']; ?>; background: <?php echo $settings['btn_bg']; ?>;">
					      		<?php echo $settings['btn_text']; ?>
					      	</a>			      		
				      	<?php } ?>
				      </p>
				    </div>
			    </div>
			  </div>
			</div> 	
	    <?php } ?>

	    <?php if ($settings['style'] == 'horizental') { ?>
	      	<div class="hover vc-ihe-panel <?php echo $class; ?>" id="vc-flip-box-<?php echo $some_id; ?>" style="height: <?php echo $settings['flip_height']; ?>px;">
			  <div class="front1" style="background: <?php echo $settings['front_bg']; ?>;">
			  	<div style="display:table;width:100%;height:100%;">
				    <div class="pad" style="display: table-cell !important;vertical-align: middle !important; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_styling']; ?> <?php echo $settings['border_clr']; ?>;">
				      <?php if ($settings['info_opt'] == 'show_image') { ?>
						<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>			
					  <?php } ?>
					  <?php if ($settings['info_opt'] == 'show_icon') { ?>
						<i class="<?php echo $settings['flip_icon']; ?>" aria-hidden="true" style="font-size: <?php echo $settings['flip_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>
					  <?php } ?>
				      <h4 class="flip-box-title" style="color: <?php echo $settings['title_clr']; ?>;">
				      		<?php echo $settings['title']; ?>
				      </h4>
				      <p class="flip-box-desc" style="color: <?php echo $settings['desc_clr']; ?>; font-size: <?php echo $descrsize; ?>px;">
				        <?php echo $settings['desc']; ?>
				      </p>
				    </div>
			    </div>

			  </div>
			  <div class="back1" style="background: <?php echo $settings['desc_bg']; ?>">
				<div style="display:table;width:100%;height:100%;">
			    	<div class="pad" style="display: table-cell !important;vertical-align: middle !important; padding: 10px;">
				      <?php echo $settings['content']; ?>
				      <p style="text-align: center;">
				      	<?php if (!empty($settings['btn_text'])) { ?>
					      	<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="mega_hvr_btn" style="color: <?php echo $settings['btn_clr']; ?>; background: <?php echo $settings['btn_bg']; ?>;">
					      		<?php echo $settings['btn_text']; ?>
					      	</a>			      		
				      	<?php } ?>
				      </p>
				    </div>
			    </div>
			  </div>
			</div>
		<?php } ?>

		<?php if ($settings['style'] == '3d') { ?>
			<div class="vc-ihe-panel" id="vc-flip-box-<?php echo $some_id; ?>">
				<div class="flip-box-3d" style="height: <?php echo $settings['flip_height']; ?>px;">
					<div class="cube <?php echo $class; ?>">
					    <div class="active-state" style="background: <?php echo $settings['desc_bg']; ?>; height: <?php echo $settings['flip_height']; ?>px;transform-origin: center center -<?php echo $settings['flip_height']/2; ?>px;">
					        <div style="display:table;width:100%;height:100%;">
						    	<div style="display: table-cell !important;vertical-align: middle !important; padding: 0 10px;">
							      <?php echo $settings['content']; ?>
							      <p style="text-align: center; padding-top: 4px;">
							      	<?php if (!empty($settings['btn_text'])) { ?>
								      	<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?> class="mega_hvr_btn" style="color: <?php echo $settings['btn_clr']; ?>; background: <?php echo $settings['btn_bg']; ?>;">
								      		<?php echo $settings['btn_text']; ?>
								      	</a>			      		
							      	<?php } ?>
							      </p>
							    </div>
						    </div>
					    </div>
					    <div class="default-state <?php echo $css_class; ?>" style="height: <?php echo $settings['flip_height']; ?>px; transform-origin: center center -<?php echo $settings['flip_height']/2; ?>px; background: <?php echo $settings['front_bg']; ?>;">
					        <div style="display:table;width:100%;height:100%;">
					        	<div style="display: table-cell !important;vertical-align: middle !important; border: <?php echo $settings['border_width']; ?>px <?php echo $settings['border_styling']; ?> <?php echo $settings['border_clr']; ?>; padding: 0 10px;">
							        <?php if ($settings['info_opt'] == 'show_image') { ?>
										<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
									<?php } ?>
									<?php if ($settings['info_opt'] == 'show_icon') { ?>
										<i class="<?php echo $settings['flip_icon']; ?>" aria-hidden="true" style="font-size: <?php echo $settings['flip_size']; ?>px; color: <?php echo $settings['icon_clr']; ?>;"></i>
									<?php } ?>
								    <h4 class="flip-box-title" style="color: <?php echo $settings['title_clr']; ?>;">
								      	<?php echo $settings['title']; ?>
								    </h4>
								    <p class="flip-box-desc" style="color: <?php echo $settings['desc_clr']; ?>; font-size: <?php echo $descrsize; ?>px;">
								        <?php echo $settings['desc']; ?>
								    </p>
					    		</div>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		<?php } ?>

		<style>
			@media only screen and (max-width: 480px) {
				#vc-flip-box-<?php echo $some_id; ?> .flip-box-title {
					font-size: <?php echo $settings['front_title_size']; ?>px !important;
				}
				#vc-flip-box-<?php echo $some_id; ?> .flip-box-desc {
					font-size: <?php echo $settings['front_desc_size']; ?>px !important;
				}
				#vc-flip-box-<?php echo $some_id; ?>.vc-ihe-panel, #vc-flip-box-<?php echo $some_id; ?> .flip-box-3d{
					height: <?php echo $settings['front_height_size']; ?>px !important;
				}
				#vc-flip-box-<?php echo $some_id; ?> .flip-box-3d .active-state, #vc-flip-box-<?php echo $some_id; ?> .flip-box-3d .default-state{
					height: <?php echo $settings['front_height_size']; ?>px !important;
				}
			}
		</style>

		<?php  
		/************HTML CODING END*************/

	}
}