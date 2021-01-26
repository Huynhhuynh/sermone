<?php 
/**
 * Helpers
 */

 /**
  * Get icon svg 
  * 
  * @param String $name 
  * @return svg
  */
function sirmone_svg( $name ) {
  $icons = require( SIRMONE_DIR . '/inc/svg.php' );
  return $icons[ $name ] ? $icons[ $name ] : '';
}