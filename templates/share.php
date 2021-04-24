<?php 
/**
 * Share post template 
 */

?>
<ul class="sermone--share-container">
  <?php
  /**
   * sermone_social_item_start hook
   */ 
  do_action( 'sermone_social_item_start' ) 
  ?>
  <?php foreach( $share_data as $share_name => $item ) : ?>
  <li class="share-item __share-<?php echo $share_name ?>">
    <a 
      href="<?php echo $item[ 'link' ] ?>" 
      target="_blank" 
      data-tippy-content="<?php echo sprintf( '%s %s', __( 'Share on', 'sermone' ), $item[ 'name' ] ) ?>"
      data-tippy-placement="bottom"
      title="<?php echo sprintf( '%s %s', __( 'Share post on', 'sermone' ), $item[ 'name' ] ) ?>">
      <span class="__icon"><?php echo $item[ 'icon' ] ?></span>
    </a>
  </li> <!-- .__share-<?php echo $share_name ?> -->
  <?php endforeach; ?>
  <?php
  /**
   * sermone_social_item_end hook 
   * 
   * @see sermone_social_item_favorite - 20
   */ 
  do_action( 'sermone_social_item_end' ) 
  ?>
</ul> <!-- .sermone-share-container -->