<?php 
/**
 * User favorite template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<div class="sermone-favorite-container <?= $atts[ 'classes' ] ?>">
  <? if( ! empty( $atts[ 'heading_text' ] ) ) : ?>
  <h4 class="sermone-heading"><?= $atts[ 'heading_text' ] ?> <sup>(<?= $query->post_count ?>)</sup></h4>
  <? endif; ?>
  <? if ( $query->have_posts() ) :
    $sermone_posts_classes = sermone_archive_posts_classes();
    echo '<div id="sermone-post-list" class="'. $sermone_posts_classes .'">';
    while ( $query->have_posts() ) : $query->the_post(); 
      /**
        * sermone_archive_post_item_loop hook.
        *
        * @see sermone_archive_post_item_loop - 20
        */
      do_action( 'sermone_shortcode_post_item_loop', get_the_ID() );
    endwhile;
    echo '</div>';
  endif; ?>
</div> <!-- .sermone-favorite-container -->

<? wp_reset_query();