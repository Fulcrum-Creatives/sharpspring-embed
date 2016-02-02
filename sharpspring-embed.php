<?php
namespace SFTC;

/**
 * SpringSource Form Tacking Code Embed
 * 
 * @package     SFTC
 * @copyright   Copyright (c) 2014, Fulcrum Creatives
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0.0
 * @author      Fulcrum Creatives <dev@fulcrumcreatives.com>
 *
 * @wordpress-plugin
 * Plugin Name:       SpringSource Form Tracking Code Embed
 * Plugin URI:        https://github.com/Fulcrum-Creatives/sharpspring-embed
 * Description:       A shortcode for embedding the SpringSource form tracking code
 * Version:           1.0.1
 * Author:            Fulcrum Creatives
 * Author URI:        http://fulcrumcreatives.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sftc
 * Domain Path:       /languages
 * GitHub Plugin URI: https://github.com/Fulcrum-Creatives/sharpspring-embed
 * GitHub Branch:     master 
 */

// If this file is called directly, abort.
if ( !defined( 'WPINC' ) ) {
  die;
}
if( !class_exists( 'SFTC' ) ) {
  class SFTC {
    
    /**
     * Instance of the class
     *
     * @since 0.0.1
     * @var Instance of SFTC class
     */
    private static $instance;

    /**
     * Instance of the plugin
     *
     * @since 0.0.1
     * @static
     * @staticvar array 
     * @return Instance
     */
    public static function instance() {
      if ( !isset( self::$instance ) && ! ( self::$instance instanceof SFTC ) ) {
        self::$instance = new SFTC;
        self::$instance->define_constants();
        add_action( 'plugins_loaded', array( self::$instance, 'load_textdomain' ) );
        self::$instance->includes();
        //self::$instance->init = new FCWP_Init();
      }
    return self::$instance;
    }

    /**
     * Define the plugin constants
     *
     * @since  0.0.1
     * @access private
     * @return void
     */
    private function define_constants() {
      // Plugin Version
      if ( !defined( 'SFTC_PL_VERSION' ) ) {
        define( 'SFTC_PL_VERSION', '1.0.1' );
      }
      // Prefix
      if ( !defined( 'SFTC_PL_PREFIX' ) ) {
        define( 'SFTC_PL_PREFIX', 'custom' );
      }
      // Plugin Options
      if ( !defined( 'SFTC_PL_OPTIONS' ) ) {
        define( 'SFTC_PL_OPTIONS', 'custom-options' );
      }
      // Plugin Directory
      if ( !defined( 'SFTC_PL_PLUGIN_DIR' ) ) {
        define( 'SFTC_PL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
      }
      // Plugin URL
      if ( !defined( 'SFTC_PL_PLUGIN_URL' ) ) {
        define( 'SFTC_PL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
      }
      // Plugin Root File
      if ( !defined( 'SFTC_PL_PLUGIN_FILE' ) ) {
        define( 'SFTC_PL_PLUGIN_FILE', __FILE__ );
      }
    }

    /**
     * Load the required files
     *
     * @since  0.0.1
     * @access private
     * @return void
     */
    private function includes() {
      require_once SFTC_PL_PLUGIN_DIR . 'includes/class-shortcode.php';
      $shortcode = new Includes\Shortcode();
    }

    /**
     * Load the plugin text domain for translation.
     *
     * @since  0.0.1
     * @access public
     */
    public function load_textdomain() {
      $sftc_lang_dir = dirname( plugin_basename( SFTC_PL_PLUGIN_FILE ) ) . '/languages/';
      $sftc_lang_dir = apply_filters( 'sftc_lang_dir', $sftc_lang_dir );
      $locale = apply_filters( 'plugin_locale',  get_locale(), 'sftc' );
      $mofile = sprintf( '%1-%2.mo', 'sftc', $locale );
      $mofile_local  = $sftc_lang_dir . $mofile;
      if ( file_exists( $mofile_local ) ) {
        load_textdomain( 'sftc', $mofile_local );
      } else {
        load_plugin_textdomain( 'sftc', false, $sftc_lang_dir );
      }
    }

    /**
     * Throw error on object clone
     *
     * @since  0.0.1
     * @access public
     * @return void
     */
    public function __clone() {
      _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'sftc' ), '1.6' );
    }

    /**
     * Disable unserializing of the class
     *
     * @since  0.0.1
     * @access public
     * @return void
     */
    public function __wakeup() {
      _doing_it_wrong( __FUNCTION__, __( 'Cheatin&#8217; huh?', 'sftc' ), '1.6' );
    }

  }
} // end SFTC
/**
 * Return the instance 
 *
 * @since 0.0.1
 * @return object The Safety Links instance
 */
function SFTC_Run() {
  return SFTC::instance();
} // end SFTC_Run
SFTC_Run();