<?php 
/**
 * Plugin Name:       Sermone - a WordPress Plugin for Church
 * Plugin URI:        #
 * Description:       ...
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      7.2
 * Author:            Beplus
 * Author URI:        #
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sermone
 * Domain Path:       /languages
 */

{
  /**
   * Defines
   * 
   */
  define( 'SERMONE_VER', '1.0.0' );
  define( 'SERMONE_DIR', plugin_dir_path( __FILE__ ) );
  define( 'SERMONE_URI', plugin_dir_url( __FILE__ ) );
}

{
  /**
   * Includes
   * 
   */
  require( SERMONE_DIR . '/inc/static.php' );
  require( SERMONE_DIR . '/inc/helpers.php' );
  require( SERMONE_DIR . '/inc/hooks.php' );
  require( SERMONE_DIR . '/inc/ajax.php' );
  require( SERMONE_DIR . '/inc/options.php' );
  require( SERMONE_DIR . '/inc/register-post-type.php' );
  require( SERMONE_DIR . '/inc/register-tax.php' );
}