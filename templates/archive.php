<?php 
/**
 * Sermone archive 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>
<div class="<?= sermone_classes_hook( 'sermone-archive-container', 'sermone_archive' ) ?>">
  <div class="sermone-container">
    <? 
    if ( have_posts() ) : 
      $sermone_posts_classes = sermone_archive_posts_classes();
      echo '<div class="'. $sermone_posts_classes .'">';
      while ( have_posts() ) : the_post(); 
        do_action( 'sermone_archive_post_item_loop', get_the_ID() );
      endwhile;
      echo '</div>';
    else :

    endif; 
    ?>
  </div>
</div> <!-- .sermone-archive-container -->
<?php 
get_footer();