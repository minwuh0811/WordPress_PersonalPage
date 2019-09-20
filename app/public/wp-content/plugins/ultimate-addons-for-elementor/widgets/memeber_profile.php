<?php
/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor_uae_memeber_prof extends \Elementor\Widget_Base {

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
		return 'memeber profile';
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
		return __( 'Memeber Profile', 'uae' );
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
		return 'fa fa-user';
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
		// wp_enqueue_style( 'member-profile', plugins_url( '../css/memberprofile.css' , __FILE__ ));

		$this->start_controls_section(
			'gen_section',
			[
				'label' => __( 'General', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Select Layout', 'uae' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'description'	=>	'Click here to <a href="https://elementor.topdigitaltrends.net/member-profile/" target="_blank">See Demo</a>',
				'options' 		=> [
		     		'grow' 			=> esc_html__('Grow', 'uae'),
		     		'float' 		=> esc_html__('Flow', 'uae'),
		     		'outset' 		=> esc_html__('Outset', 'uae'),
		     		'smart' 		=> esc_html__('Smart', 'uae'),
				],
				'default' 			=> 'grow',
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
			'profile_clr',
			[
				'label' => __( 'Profile Color', 'uae' ),
				'type' => \Elementor\Controls_Manager::COLOR,
				'input_type' => 'color',
				'default' => '#27bebe',
			]
		);

		$this->add_control(
			'profile_link',
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
			'prof_about',
			[
				'label' => __( 'About', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'member_name',
			[
				'label' => __( 'Memeber Name', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'John Doe',
			]
		);

		$this->add_control(
			'member_pro',
			[
				'label' => __( 'Professional', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'Developer',
			]
		);

		$this->add_control(
			'member_about',
			[
				'label' => __( 'About', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXTAREA,
				'default' => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore fugiat.',
			]
		);

		$this->end_controls_section();
		
		$this->start_controls_section(
			'prof_info',
			[
				'label' => __( 'Info', 'uae' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'email',
			[
				'label' => __( 'Email', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'abc@gmail.com',
			]
		);

		$this->add_control(
			'site_url',
			[
				'label' => __( 'Site URL', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => 'site.com',
			]
		);

		$this->add_control(
			'contact',
			[
				'label' => __( 'Contact Number', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => '+921234567',
			]
		);

		$this->add_control(
			'address',
			[
				'label' => __( 'Address', 'uae' ),
				'type' => \Elementor\Controls_Manager::TEXT,
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
			'skill_style', 
			[
				'label'         => esc_html__('Content', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'skill_items',
            [
                'label' => __('Skill', 'uae'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'skill',
                        'label' => __('Write Skills', 'uae'),
                        'type' => \Elementor\Controls_Manager::TEXT,
                        'default' => __('WordPress', 'uae'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' 		=> 'skill_strength',
                        'label' 	=> __( 'Skill Strength By %', 'uae' ),
						'type'		=> \Elementor\Controls_Manager::NUMBER,
						'default' 	=> __('85', 'uae'),
                        'dynamic' 	=> [
                           'active' => true,
                        ],
                    ],

                ],
                'title_field' => '{{{ skill }}}',
            ]
        );

		$this->end_controls_section();
		
		$this->start_controls_section(
			'social_section', 
			[
				'label'         => esc_html__('Social Section', 'uae' ),
				'tab'           => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
            'social_items',
            [
                'label' => __('Social Section', 'uae'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => [
                    [
                        'name' => 'social_icon',
                        'label' => __('Icon', 'uae'),
                        'type' => \Elementor\Controls_Manager::ICON,
                        'default' => __('WordPress', 'uae'),
                        'dynamic' => [
                            'active' => true,
                        ],
                    ],

                    [
                        'name' 		=> 'btn_link',
                        'label' 	=> __( 'Link To', 'uae' ),
						'type'		=> \Elementor\Controls_Manager::URL,
						'placeholder' => __('https://your-link.com', 'uae'),
						'show_external' => true,
						'default' => [
							'url' => '',
							'is_external' => false,
							'nofollow' => false,
						]
                    ],

                    [
                        'name' 		=> 'social_bg',
                        'label' 	=> __( 'Background', 'uae' ),
						'type'		=> \Elementor\Controls_Manager::COLOR,
                        'dynamic' 	=> [
                           'active' => true,
                        ],
                    ],

                ],
                'title_field' => '{{{ social_icon }}}',
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
		 
		$target = $settings['profile_link']['is_external'] ? ' target="_blank"' : '';
		$nofollow = $settings['profile_link']['nofollow'] ? ' rel="nofollow"' : '';

		// $target2 = $social_items['btn_link']['is_external'] ? ' target="_blank"' : '';
		// $nofollow2 = $social_items['btn_link']['nofollow'] ? ' rel="nofollow"' : '';


		//echo ( $html ) ? $html : $settings['url'];

		/************HTML CODING START*************/
		?>

		<?php switch ($settings['style']) {
			case 'grow':
				include 'member-profile/member.php';
				break;
			case 'float':
				include 'member-profile/member2.php';
				break;
			case 'outset':
				include 'member-profile/member3.php';
				break;
			case 'smart':
				include 'member-profile/member4.php';
				break;
			
			default:
				include 'member-profile/member.php';
				break;
		} ?>

		<!---================= HTML CODING END ====================-->
		<?php
	}

}