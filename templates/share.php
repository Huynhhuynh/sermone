<?php 
/**
 * Share post template 
 */

?>
<ul class="sermone-share-container">
  <? foreach( $share_data as $share_name => $item ) : ?>
  <li class="share-item __share-<?= $share_name ?>">
    <a href="<?= $item[ 'link' ] ?>" target="_blank" title="<?= sprintf( '%s %s', __( 'Share post on', 'sermone' ), $item[ 'name' ] ) ?>">
      <span class="__icon"><?= $item[ 'icon' ] ?></span>
    </a>
  </li> <!-- .__share-<?= $share_name ?> -->
  <? endforeach; ?>
</ul> <!-- .sermone-share-container -->