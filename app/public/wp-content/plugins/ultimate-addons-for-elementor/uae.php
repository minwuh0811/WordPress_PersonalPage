<?php
/**
 * Plugin Name: Mega Addons For Elementor
 * Description: Mega Addons gives you multi plugins all in one. It's very powerful for any theme.
 * Plugin URI: http://elementor.topdigitaltrends.net/
 * Author: Qamar Sheeraz, Nasir Ahmad
 * Author URI: https://profiles.wordpress.org/qsheeraz
 * Version: 1.6
 * Stable tag: 1.6
 */

 if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

 require_once( 'classes/ma-elementor.php' );
  
 global $mae;
 $uae = new MA_Elementor( __FILE__ );
 $uae->version = '1.6';
 $uae->init();
?>