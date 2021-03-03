<?php 
/**
 * Sermone archive 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>
<div class="<?php echo sermone_classes_hook( 'sermone-archive-container', 'sermone_archive' ) ?>">
  <div class="sermone-container">
    <? 
    $query = sermone_get_posts_archive();

    /**
     * sermone_archive_top hook.
     * 
     * @see sermone_archive_heading - 16
     * @see sermone_filter_bar - 20
     */
    do_action( 'sermone_archive_top', $query );
    
    if ( $query->have_posts() ) : 

      do_action( 'sermone_archive_post_list_before', $query );

      $sermone_posts_classes = sermone_archive_posts_classes();
      echo '<div id="sermone-archive-post-list" class="'. $sermone_posts_classes .'">';
      while ( $query->have_posts() ) : $query->the_post(); 
        /**
         * sermone_archive_post_item_loop hook.
         *
         * @see sermone_archive_post_item_loop - 20
         */
        do_action( 'sermone_archive_post_item_loop', get_the_ID() );
      endwhile;
      echo '</div>';

      /**
       * sermone_archive_post_list_after hook.
       * 
       * @see sermone_archive_pagination - 20
       */
      do_action( 'sermone_archive_post_list_after', $query );

    else :

    endif; 
    ?>
  </div>
</div> <!-- .sermone-archive-container -->
<?php 
get_footer();