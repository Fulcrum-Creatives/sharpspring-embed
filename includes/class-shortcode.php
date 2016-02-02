<?php
namespace SFTC\Includes;

/**
 * Shortcode
 *
 * @package    SFTC
 * @subpackage SFTC/Includes
 * @author     Fulcrum Creatives <dev@fulcrumcreatives.com>
 * @copyright  Copyright (c) 2016, Fulcrum Creatives
 * @license    http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since      1.0.0
 */

// If this file is called directly, abort.
if( !defined( 'WPINC' ) ) { die; }

if( !class_exists( 'Shortcode' ) ) {
  class Shortcode {

    /**
     * Initialize the class
     *
     * @since 1.0.0
     */
    public function __construct() {
      add_shortcode( 'springsource_form', array( $this, 'shortcode' ) );
    } // end __construct

    /**
     * Shortcode
     *
     * @since  1.0.0
     * @return string 
     */
    public function shortcode($atts, $content = null) {
      $content = str_replace('<br />', '', $content);
      return html_entity_decode( $content, ENT_NOQUOTES, 'UTF-8' );
    } // end shortcode

  }
} // end Shortcode