<?php 
/**
 * Sermone ajax 
 */

function sermone_ajax_quickview_template() { 
  ob_start();
  $post_id = (int) $_POST[ 'post_id' ];

  sermone_quickview_html( $post_id );
  $content = ob_get_clean();
  
  wp_send_json( [
    'success' => true,
    'content' => $content,
    'meta_data' => [
      'post_id' => $post_id,
      'post_url' => get_the_permalink( $post_id ),
      'post_title' => get_the_title( $post_id )
    ]
  ] );
}

add_action( 'wp_ajax_sermone_ajax_quickview_template', 'sermone_ajax_quickview_template' );
add_action( 'wp_ajax_nopriv_sermone_ajax_quickview_template', 'sermone_ajax_quickview_template' );