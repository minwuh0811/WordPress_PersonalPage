<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
/**
 * UAE Base Class
 *
 * All functionality pertaining to core functionality of the Ultimate Addons For Elementor plugin.
 *
 * @package WordPress
 * @subpackage UAE
 * @author qsheeraz
 * @since 1.0
 *
 */

class MA_Elementor {
	public $version;
	private $file;

	private $plugin_url;
	private $assets_url;
	private $plugin_path;

	const MINIMUM_PHP_VERSION = '7.0';	

	public $mae;
	
	/**
	 * __construct function.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct ( $file ) {
		$this->version = '';
		$this->file = $file;
		$this->prefix = 'uae_';

		/* Plugin URL/path settings. */
		$this->plugin_url = str_replace( '/classes', '', plugins_url( plugin_basename( dirname( __FILE__ ) ) ) );
		$this->plugin_path = str_replace( 'classes', '', plugin_dir_path( __FILE__ ));
		$this->assets_url = $this->plugin_url . '/assets';

		
	} // End __construct()

	/**
	 * init function.
	 *
	 * @access public
	 * @return void
	 */
	public function init () {
		add_action( 'init', array( $this, 'load_localisation' ) );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'uae_front_enqueue_styles' ] );
		// Register Widget Scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'uae_front_enqueue_scripts' ] );

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}


		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		//add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );		

		add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );
		// Run this on activation.
		register_activation_hook( $this->file, array( $this, 'activation' ) );
	} 

	public function uae_front_enqueue_styles() {
		wp_enqueue_style( 'uae_custom_styles', plugins_url( '../css/uae_custom_styles.min.css', __FILE__ ) );
		
	}

	public function uae_front_enqueue_scripts() {
		wp_enqueue_script( 'info-circle-js', plugins_url( '../js/info-circle.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'accordion-js', plugins_url( '../js/front/accordion.js' , __FILE__ ), array('jquery', 'jquery-ui-accordion'));
		wp_enqueue_script( 'slick-js', plugins_url( '../js/slick.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'custom-tm-js', plugins_url( '../js/front/custom-tm.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'bpopup-js', plugins_url( '../js/bpopup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
		wp_enqueue_script( 'custom-bpopup-js', plugins_url( '../js/front/custom_bpopup.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
	}
	

	/**
	 * Print array
	 *
	 * Print array in readable format.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function pa( $arr ) {

		echo '<pre>';
		print_r($arr);
		echo '</pre>';
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Mega Addons', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'elementor-test-extension' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	
	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'elementor-test-extension' ),
			'<strong>' . esc_html__( 'Mega Addons', 'elementor-test-extension' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor Page Builder Plugin', 'elementor-test-extension' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	function add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'ultimate-addons',
			[
				'title' => __( 'Ultimate Addons', 'plugin-name' ),
				'icon' => 'fa fa-plug',
			]
		);
	}

	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Include Widget files
		//require_once( __DIR__ . '/widgets/ma-test-widget.php' );
		// require_once( $this->plugin_path . '/widgets/advanced-carousel.php' );
		require_once( $this->plugin_path . '/widgets/advanced-carousel.php' );
		require_once( $this->plugin_path . '/widgets/info-banner.php' );
		require_once( $this->plugin_path . '/widgets/ihover.php' );
		require_once( $this->plugin_path . '/widgets/price-table.php' );
		require_once( $this->plugin_path . '/widgets/memeber_profile.php' );
		require_once( $this->plugin_path . '/widgets/interactive-banner.php' );
		require_once( $this->plugin_path . '/widgets/info-box.php' );
		require_once( $this->plugin_path . '/widgets/creative-link.php' );
		require_once( $this->plugin_path . '/widgets/stat-counter.php' );
		require_once( $this->plugin_path . '/widgets/modal_popup.php' );
		require_once( $this->plugin_path . '/widgets/advanced-btn.php' );
		require_once( $this->plugin_path . '/widgets/timeline.php' );
		require_once( $this->plugin_path . '/widgets/countdown.php' );
		require_once( $this->plugin_path . '/widgets/flip-box.php' );
		require_once( $this->plugin_path . '/widgets/info-list.php' );
		require_once( $this->plugin_path . '/widgets/hightlight-box.php' );
		require_once( $this->plugin_path . '/widgets/accordion.php' );
		require_once( $this->plugin_path . '/widgets/info-circle.php' );
		require_once( $this->plugin_path . '/widgets/heading.php' );
		require_once( $this->plugin_path . '/widgets/dual-btn.php' );
		

		// Register widget
		// \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_advanced_carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_advanced_carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_info_banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_ihover_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_price_table() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_memeber_prof() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_interactive_banner() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_info_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_creative_link() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_stat_counter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_modal_popup() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_advanced_btn() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_timeline() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_countdown() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_flip_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_info_list() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_hightlight_box() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_accordion() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_info_circle() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_headings() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor_uae_dual_btn() );

		

	}

	/**
	 * Init Controls
	 *
	 * Include controls files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_controls() {

		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );

	}

	/**
	 * load_localisation function.
	 *
	 * @access public
	 * @return void
	 */
	public function load_localisation () {
		$lang_dir = trailingslashit( str_replace( 'classes', 'lang', plugin_basename( dirname(__FILE__) ) ) );
		load_plugin_textdomain( 'uae', false, $lang_dir );
	} // End load_localisation()

	/**
	 * activation function.
	 *
	 * @access public
	 * @return void
	 */
	public function activation () {
		$this->register_plugin_version();
	} // End activation()

	/**
	 * register_plugin_version function.
	 *
	 * @access public
	 * @return void
	 */
	public function register_plugin_version () {
		if ( $this->version != '' ) {
			update_option( 'ma_elementor' . '-version', $this->version );
		}
	} // End register_plugin_version()
} // End Class
?>