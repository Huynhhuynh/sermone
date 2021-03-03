<?php 
/**
 * Plugin Name:       Sermon'e - Sermons online
 * Plugin URI:        http://159.89.194.38:8383/
 * Description:       Sermon'e is designed to help churches easily publish sermons online. is a new beautiful, modern sermon plugin that integrates seamlessly with any WordPress theme.
 * Version:           1.0.0
 * Requires at least: 5.3
 * Requires PHP:      7.2
 * Author:            Beplus
 * Author URI:        https://bearsthemes.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       sermone
 * Domain Path:       /language
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
   * Vendor
   */
  require( SERMONE_DIR . '/vendor/autoload.php' );

  /**
   * ACF loaded 
   * 
   */
  require( SERMONE_DIR . 'acf-loaded.php' );
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
  require( SERMONE_DIR . '/inc/shortcode.php' );
}

{
  /**
   * Boot
   */
  function sermone_crb_boot() {
    \Carbon_Fields\Carbon_Fields::boot();
  }

  add_action( 'plugins_loaded', 'sermone_crb_boot' );
}