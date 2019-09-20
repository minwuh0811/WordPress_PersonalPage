<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_headings extends \Elementor\Widget_Base {

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
		return 'headingss';
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
		return __( 'Headings', 'uae' );
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
		return 'fa fa-align-center';
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
		// wp_enqueue_style( 'heading-css', plugins_url( '../css/heading.css' , __FILE__ ));
		
		$this->start_controls_section(
			'general_section',
			[
				'label' => __( 'Icon Setting', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Select Style', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/headings/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'theme1' 		=> esc_html__('Simple Top Line', 'uae'),
		     		'theme2' 	=> esc_html__('Simple Center Line', 'uae'),
		     		'theme3' 	=> esc_html__('Simple Bottom Line', 'uae'),
		     		'theme4' 		=> esc_html__('Top Icon/Image', 'uae'),
		     		'theme5' 	=> esc_html__('Center Icon/Image', 'uae'),
		     		'theme6' 	=> esc_html__('Bottom Icon/Image', 'uae'),
				],
				'default' 		=> 'theme1',
			]
		);

		$this->add_control(
			'linewidth',
			[
				'label' => __( 'Line Width (px)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '230',
				'condition' => [
					'style' => ['theme1', 'theme2', 'theme3']
				]
			]
		);

		$this->add_control(
			'borderwidth',
			[
				'label' => __( 'Border Width (px)', 'uae' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => '2',
				'condition' => [
					'style' => ['theme1', 'theme2', 'theme3']
				]
			]
		);

		$this->add_control(
			'borderclr',
			[
				'label' => __( 'Border Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'style' => ['theme1', 'theme2', 'theme3']
				]
			]
		);

		$this->add_control(
			'style2',
			[
				'label' => __( 'Seclect Icon/Image', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' 		=> [
		     		'select' 		=> esc_html__('Select', 'uae'),
		     		'icon' 		=> esc_html__('Icon', 'uae'),
		     		'image' 	=> esc_html__('Image', 'uae'),
				],
				'condition' => [
					'style' => ['theme4', 'theme5', 'theme6']
				],
				'default' 		=> 'select',
			]
		);

		$this->add_control(
			'icon',
			[
				'label' => __( 'Icon', 'uae' ),
				'type' => \Elementor\Controls_Manager::ICON,
				'condition' => [
					'style2' => 'icon',
				],
			]
		);

		$this->add_responsive_control(
			'alignment',
			[
				'label' => __( 'Icon Alignment', 'uae' ),
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
				'condition' => [
					'style2' => 'icon',
				],
				'default' => 'center',
			]
		);

		$this->add_control(
			'iconclr',
			[
				'label' => __( 'Icon Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#000',
				'condition' => [
					'style2' => 'icon',
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
				'condition' => [
					'style2' => 'image',
				],
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Image_Size::get_type(),
			[
				'name' => 'image', // Usage: `{name}_size` and `{name}_custom_dimension`, in this case `image_size` and `image_custom_dimension`.
				'default' => 'full',
				'separator' => 'none',
				'condition' => [
					'style2' => 'image',
				],
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'desc_section',
			[
				'label' => __( 'Heading/Description', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Title', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_responsive_control(
			'title_alignment',
			[
				'label' => __( 'Content Alignment', 'uae' ),
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
			'titleclr',
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
				'selector' => '{{WRAPPER}} .mega-line-heading h3',
			]
		);

		$this->add_control(
			'content',
			[
				'label' => esc_html__( 'Info Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
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

		<div id="mega-line-container" class="mega-line-heading">
			<?php if ($settings['style'] == 'theme1') { ?>
				<div class="mega-line-top" style="text-align: <?php echo $settings['title_alignment']; ?>;">
			        <span style="width: <?php echo $settings['linewidth']; ?>px; border-bottom: <?php echo $settings['borderwidth']; ?>px solid <?php echo $settings['borderclr']; ?>;"></span>
			        <h3 style="color: <?php echo $settings['titleclr']; ?>;">
			        	<?php echo $settings['title']; ?>
			        </h3>
			        <div>
			        	<?php echo $settings['content']; ?>
			        </div>
		      </div>
			<?php } ?>

			<?php if ($settings['style'] == 'theme2') { ?>
			    <div class="mega-line-center" style="text-align: <?php echo $settings['title_alignment']; ?>;">  
		        	<h3 style="color: <?php echo $settings['titleclr']; ?>;">
			        	<?php echo $settings['title']; ?>
			        </h3>
			        <div>
		        		<span style="width: <?php echo $settings['linewidth']; ?>px; border-bottom: <?php echo $settings['borderwidth']; ?>px solid <?php echo $settings['borderclr']; ?>;"></span>
		        	</div>
		        	<div>
			        	<?php echo $settings['content']; ?>
			        </div>
		      	</div>
		    <?php } ?>

		    <?php if ($settings['style'] == 'theme3') { ?>
			    <div class="mega-line-bottom" style="text-align: <?php echo $settings['title_alignment']; ?>;">  
			        <h3 style="color: <?php echo $settings['titleclr']; ?>;">
			        	<?php echo $settings['title']; ?>
			        </h3>
			        <div>
			        	<?php echo $settings['content']; ?>
			        </div>
			        <span style="width: <?php echo $settings['linewidth']; ?>px; border-bottom: <?php echo $settings['borderwidth']; ?>px solid <?php echo $settings['borderclr']; ?>;"></span>
			    </div>
		    <?php } ?>

		    <?php if ($settings['style'] == 'theme4') { ?>
		        
			    <div id="mega-line-icon" style="text-align: <?php echo $settings['title_alignment']; ?>;">  
			        <div class="line-icon" style="text-align: <?php echo $settings['alignment']; ?>;">
		        		<?php if ($settings['style2'] == 'icon') { ?>
		        			<i class="<?php echo $settings['icon']; ?>" aria-hidden="true" style="color: <?php echo $settings['iconclr']; ?>"></i>
		        		<?php } ?>
		        		<?php if ($settings['style2'] == 'image') { ?>
		        		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
		        	<?php } ?>
		        	</div>
			        <h3 style="color: <?php echo $settings['titleclr']; ?>;  margin-bottom: -15px;">
			        	<?php echo $settings['title']; ?>
			        </h3>
			        <div>
			        	<?php echo $settings['content']; ?>
			        </div>
			    </div>
		    <?php } ?>

		    <?php if ($settings['style'] == 'theme5') { ?>
			    <div id="mega-line-icon" style="text-align: <?php echo $settings['title_alignment']; ?>;">  
			        <h3 style="color: <?php echo $settings['titleclr']; ?>;">
			        	<?php echo $settings['title']; ?>
			        </h3>
			        <div>
				        <div class="line-icon" style="text-align: <?php echo $settings['alignment']; ?>;">
				        	<?php if ($settings['style2'] == 'icon') { ?>
				        		<i class="<?php echo $settings['icon']; ?>" aria-hidden="true" style="color: <?php echo $settings['iconclr']; ?>"></i>
				        	<?php } ?>
				        	<?php if ($settings['style2'] == 'image') { ?>
				        		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
				        	<?php } ?>
				        </div>
			        </div>
			        <div>
			        	<?php echo $settings['content']; ?>
			        </div>
			    </div>
		    <?php } ?>

		    <?php if ($settings['style'] == 'theme6') { ?>
				<div id="mega-line-icon" style="text-align: <?php echo $settings['title_alignment']; ?>;">  
			        <h3 style="color: <?php echo $settings['titleclr']; ?>;">
			        	<?php echo $settings['title']; ?>
			        </h3>
			        <div>
			        	<?php echo $settings['content']; ?>
			        </div>
			        <div class="line-icon" style="text-align: <?php echo $settings['alignment']; ?>;">
			        	<?php if ($settings['style2'] == 'icon') { ?>
			        		<i class="<?php echo $settings['icon']; ?>" aria-hidden="true" style="color: <?php echo $settings['iconclr']; ?>"></i>
			        	<?php } ?>
			        	<?php if ($settings['style2'] == 'image') { ?>
			        		<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
			        	<?php } ?>
			        </div>
			    </div>
		    <?php } ?>
      	</div>

		<?php  
		/************HTML CODING END*************/

	}
}