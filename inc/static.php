<?php 
/**
 * Static
 */

/**
 * Enqueue scripts
 */
function sermone_enqueue_scripts() {
  wp_enqueue_style( 'sermone-style', SERMONE_URI . '/dist/sermone.css', false, SERMONE_VER );
  wp_enqueue_script( 'sermone-script', SERMONE_URI . '/dist/sermone.frontend.bundle.js', [ 'jquery' ], SERMONE_VER, apply_filters( 'sermone_enqueue_script_footer', false ) );
  wp_localize_script( 'sermone-script', 'PHP_DATA', [
    'ajax_url' => admin_url( 'admin-ajax.php' ),
    'lang' => []
  ] );
}

add_action( 'wp_enqueue_scripts', 'sermone_enqueue_scripts' );

/**
 * Custom style inline
 * 
 */
function sermone_style_inline() {
  ob_start();
  $container_width = sermone_get_field( 'sermone_container_width', 'option' );
  ?>
  .sermone-container { width: <?php echo $container_width ? $container_width : '1120px' ?>; }
  <?php
  $style = ob_get_clean(); 
  wp_add_inline_style( 'sermone-style', $style );
}

add_action( 'wp_enqueue_scripts', 'sermone_style_inline' );