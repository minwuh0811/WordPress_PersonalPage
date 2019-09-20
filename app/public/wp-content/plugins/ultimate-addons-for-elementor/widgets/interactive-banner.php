<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

use Elementor\Utils;

class Elementor_uae_interactive_banner extends \Elementor\Widget_Base {

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
		return 'banners';
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
		return __( 'Interactive Banner', 'uae' );
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
		return 'fa fa-eye';
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
		// wp_enqueue_style( 'interactive-banner', plugins_url( '../css/int_banner.css' , __FILE__ ));
		
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
				'label' => __( 'Choose Effects', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'<a href="https://elementor.topdigitaltrends.net/member-profile/" target="_blank">See Demo</a> 10+ More Effects on <a href="https://genialsouls.com/product/mega-addons-for-elementor-page-builder/" target="_blank">Pro Version</a>',
				'options' 		=> [
		     		'effect-lily' 	=> esc_html__('LILY', 'uae'),
		     		'effect-sadie' 	=> esc_html__('SADIE', 'uae'),
		     		'effect-honey' 	=> esc_html__('HONEY', 'uae'),
		     		'effect-layla' 	=> esc_html__('LAYLA', 'uae'),
		     		'effect-marley' => esc_html__('MARLEY', 'uae'),
		     		'effect-ruby' 	=> esc_html__('RUBY', 'uae'),
		     		'effect-roxy' 	=> esc_html__('ROXY', 'uae'),
		     		'effect-bubba' 	=> esc_html__('BUBBA', 'uae'),
		     		'effect-romeo' 	=> esc_html__('ROMEO', 'uae'),
		     		'effect-dexter' => esc_html__('DEXTER', 'uae'),
		     		'effect-sarah' 	=> esc_html__('SARAH', 'uae'),
		     		// 'effect-chico' 	=> esc_html__('CHICO', 'uae'),
		     		'effect-milo' 	=> esc_html__('MILO', 'uae'),
		     		'effect-goliath' => esc_html__('GOLIATH', 'uae'),
		     		'effect-apollo' => esc_html__('APOLLO', 'uae'),
		     		'effect-moses' 	=> esc_html__('MOSES', 'uae'),
		     		'effect-jazz' 	=> esc_html__('JAZZ', 'uae'),
		     		'effect-lexi' 	=> esc_html__('LEXI', 'uae'),
				],
				'default' 		=> 'effect-lily',
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

		$this->end_controls_section();

		$this->start_controls_section(
			'desc',
			[
				'label' => __( 'Description', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'bgclr',
			[
				'label' => __( 'Background', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
			]
		);

		$this->add_control(
			'desc_clr',
			[
				'label' => __( 'Text & Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#fff',
			]
		);

		$this->add_control(
			'title',
			[
				'label' => __( 'Text', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'title_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vc-interactive-banner h2',
			]
		);

		$this->add_control(
			'description',
			[
				'label' => __( 'Description', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name' => 'desc_typography',
				'label' => __('Typography', 'uae'),
				'scheme' => \Elementor\Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .vc-interactive-banner p',
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
		 
		$target = $settings['btn_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['btn_link']['nofollow'] ? ' rel="nofollow"' : '';

		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<div class="grid vc-interactive-banner">
			<figure class="<?php echo $settings['style']; ?>" style="background: <?php echo $settings['bgclr']; ?>; width: 100%;">
				<?php echo \Elementor\Group_Control_Image_Size::get_attachment_image_html( $settings ); ?>
				<figcaption>
					<div>
						<h2 style="color: <?php echo $settings['desc_clr']; ?>;">
							<?php echo $settings['title']; ?>
						</h2>
						<p style="color: <?php echo $settings['desc_clr']; ?>;">
							<?php echo $settings['description']; ?>
						</p>
					</div>
					<?php if ($settings['btn_link']['url'] != '') { ?>
						<a href="<?php echo $settings['btn_link']['url']; ?>" <?php echo $target.$nofollow; ?>>
					<?php } ?>
					<?php if ($settings['btn_link']['url'] == NULL) { ?>
						<a>
					<?php } ?>
					</a>
				</figcaption>			
			</figure>
		</div>

		<?php  
		/************HTML CODING END*************/

	}
}