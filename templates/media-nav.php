<?php 
/**
 * Sermine media nav (video, audio, note, etc.)
 * 
 */
// print_r( $nav_data );
?>
<ul class="sermone--media-nav-container">
  <? foreach( $nav_data as $index => $item ) : ?> 
  <li class="media-item">
    <a 
      class="<?= empty( $item[ 'data' ][ 'content' ] ) ? '__item-disable' : '' ?>"
      href="<?= ( $item[ 'type' ] == 'download' ) ? $item[ 'data' ][ 'content' ] : '#' ?>" 
      title="<?= $item[ 'name' ] ?>" 
      data-nav-type="<?= $item[ 'type' ] ?>" 
      data-nav-key="<?= $item[ 'id' ] ?>" 
      <?= ( $item[ 'type' ] == 'download' ) ? 'download="'. $item[ 'name' ] .'"' : '' ?>>
      <span class="__name"><?= $item[ 'name' ] ?></span>
      <span class="__icon"><?= $item[ 'icon' ] ?></span> 
    </a>
  </li>
  <? endforeach; ?>
</ul> <!-- .sermone--media-nav-container -->

<div class="sermone--media-tab-container">
  <? foreach( $nav_data as $index => $item ) : if( $item[ 'type' ] != 'tab' ) continue; ?> 
    <div class="__tab-item __tab-<?= $item[ 'id' ] ?>" data-tab-key="<?= $item[ 'id' ] ?>">
      <div class="sermone--media-content-type" data-media-source="<?= $item[ 'data' ][ 'source' ] ?>">
        <?= $item[ 'data' ][ 'content' ] ?>
      </div>
    </div>
  <? endforeach; ?>
</div> <!-- .sermone--media-tab-container -->