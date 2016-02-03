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
     * @since  1.2.0
     * @return string 
     */
    public function shortcode($atts, $content = null) {
      $a = shortcode_atts( array(
        'tracking_id' => '',
        'base_uri'     => '',
        'endpoint'    => '',
        'form_id'     => ''
      ), $atts );
      ob_start();
      ?>
<script type="text/javascript">
    var __ss_noform = __ss_noform || [];
    __ss_noform.push(['baseURI', '<?php echo $a['base_uri']; ?>']);
    __ss_noform.push(['form', '<?php echo $a['form_id']; ?>', '<?php echo $a['endpoint']; ?>']);
</script>
<script type="text/javascript" src="https://<?php echo $a['tracking_id']; ?>.marketingautomation.services/client/noform.js?ver=1.24" ></script>
      <?php
      return ob_get_clean();
    } // end shortcode

  }
} // end Shortcode