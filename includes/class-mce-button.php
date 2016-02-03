<?php
namespace SFTC\Includes;

/**
 * MCE Button
 *
 * @package    SFTC
 * @subpackage SFTC/Includes
 * @author     Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright  Copyright (c) 2016, Fulcrum Creatives
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      1.2.0
 */

// If this file is called directly, abort.
if( !defined( 'WPINC' ) ) { die; }

if( !class_exists( 'MCEButton' ) ) {
  class MCEButton {

    /**
     * Initialize the class
     *
     * @since 1.2.0
     */
    public function __construct() {
      add_action('admin_head', array( $this, 'addButton' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'styles' ) );
    } // end __construct

    /**
     * Add Button
     *
     * @since  1.2.0
     * @return void
     */
    public function addButton() {
      if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
        return;
      }
      if ( 'true' == get_user_option( 'rich_editing' ) ) {
        add_filter( 'mce_external_plugins', array( $this, 'addPlugin' ) );
        add_filter( 'mce_buttons', array( $this, 'registerButton' ) );
      }
    } // end addButton

    /**
     * Add MCE Plugin
     *
     * @since  1.2.0
     * @return array $plugin_array
     */
    public function addPlugin($plugin_array) {
      $plugin_array['sharpspring_button'] = SFTC_PL_PLUGIN_URL .'includes/assets/mce-button.js';
      return $plugin_array;
    } // end addPlugin

    /**
     * Register Button
     *
     * @since  1.2.0
     * @return array $buttons
     */
    public function registerButton($buttons) {
      array_push( $buttons, 'sharpspring_button' );
      return $buttons;
    } // end registerButton

    /**
     * Icon
     *
     * @since  1.2.0
     * @return void
     */
    public function styles() {
      wp_register_style( SFTC_PL_PREFIX . '_sptc', SFTC_PL_PLUGIN_URL . 'includes/assets/styles.css', array(), SFTC_PL_VERSION, 'all' );
      wp_enqueue_style(  SFTC_PL_PREFIX . '_sptc' );
    } // end styles

  }
} // end MCEButton