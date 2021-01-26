<?php 
/**
 * Static
 */

/**
 * Enqueue scripts
 */
function sermone_enqueue_scripts() {
  wp_enqueue_script( 'sermone-script', SERMONE_URI . '/dist/sermone.frontend.bundle.js', [ 'jquery' ], SERMONE_VER, true );
  wp_localize_script( 'sermone-script', 'PHP_DATA', [
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'lang' => []
  ] );
}

add_action( 'wp_enqueue_scripts', 'sermone_enqueue_scripts' );