<?php 
/**
 * Sermone ajax 
 */

function sermone_ajax_quickview_template() { 
  ob_start();
  sermone_quickview_html( (int) $_POST[ 'post_id' ] );
  $content = ob_get_clean();
  
  wp_send_json( [
    'success' => true,
    'content' => $content,
  ] );
}

add_action( 'wp_ajax_sermone_ajax_quickview_template', 'sermone_ajax_quickview_template' );
add_action( 'wp_ajax_nopriv_sermone_ajax_quickview_template', 'sermone_ajax_quickview_template' );