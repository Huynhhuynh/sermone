<?php
/**
 * ACF loaded
 */

{
  /**
   * ACF setup
   */
  if ( ! class_exists( 'acf' ) ) {
    
    /**
     * Override acf path
     */
    function sermone_acf_settings_path( $path ) {
      $path = SERMONE_DIR . 'inc/acf/';
      return $path;
    }
    add_filter( 'acf/settings/path', 'sermone_acf_settings_path' );
    
    /**
     * Override acf dir
     */
    function sermone_acf_settings_dir( $path ) {
      $dir = SERMONE_URI . 'inc/acf/';
      return $dir;
    }
    add_filter( 'acf/settings/dir', 'sermone_acf_settings_dir' );

    /**
     * Disable admin menu 
     */
    add_filter( 'acf/settings/show_admin', '__return_false' );

    /**
     * Include acf.php
     */
    include_once( SERMONE_DIR . 'inc/acf/acf.php' );

    /**
     * Create JSON save point
     */
    function sermone_acf_json_save_point( $path ) {
      $path = SERMONE_DIR . 'inc/acf-json';
      return $path;
    }
    add_filter( 'acf/settings/save_json', 'sermone_acf_json_save_point' );

    /**
     * Create JSON load point
     */
    add_filter( 'acf/settings/load_json', 'sermone_acf_json_load_point' );

    /**
     * Stop ACF upgrade notifications
     */
    function sermone_stop_acf_update_notifications( $value ) {
      unset( $value->response[ SERMONE_DIR . 'inc/acf/acf.php' ] );
      return $value;
    }
    add_filter( 'site_transient_update_plugins', 'sermone_stop_acf_update_notifications', 11 );

  } else {
    /**
     * Create JSON load point
     */
    add_filter( 'acf/settings/load_json', 'sermone_acf_json_load_point' );
  }

  /**
   * Function to create JSON load point
   */
  function sermone_acf_json_load_point( $paths = [] ) {
    // remove original path (optional)
    // unset( $paths[ 0 ] );
    
    // append path
    $paths[] = SERMONE_DIR . 'inc/acf-json-load';

    return $paths;
  }
}