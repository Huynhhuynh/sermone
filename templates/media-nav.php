<?php 
/**
 * Sermine media nav (video, audio, note, etc.)
 * 
 */
// echo '<pre>'; print_r( $nav_data ); echo '</pre>';
?>
<ul class="sermone--media-nav-container">
  <?php foreach( $nav_data as $index => $item ) : ?> 
  <li class="media-item <?php echo isset( $item[ 'active' ] ) ? '__active' : '' ?>">
    <a 
      class="<?php echo empty( $item[ 'data' ][ 'content' ] ) ? '__item-disable' : '' ?>"
      href="<?php echo in_array( $item[ 'type' ], [ 'download', 'link' ] ) ? $item[ 'data' ][ 'content' ] : '#' ?>" 
      title="<?php echo $item[ 'name' ] ?>" 
      data-nav-type="<?php echo $item[ 'type' ] ?>" 
      data-nav-key="<?php echo $item[ 'id' ] ?>" 
      <?php echo ( $item[ 'type' ] == 'download' ) ? 'download="'. $item[ 'name' ] .'"' : '' ?>>
      <span class="__name"><?php echo $item[ 'name' ] ?></span>
      <span class="__icon"><?php echo $item[ 'icon' ] ?></span> 
    </a>
  </li>
  <?php endforeach; ?>
</ul> <!-- .sermone--media-nav-container -->

<div class="sermone--media-tab-container">
  <?php foreach( $nav_data as $index => $item ) : if( $item[ 'type' ] != 'tab' ) continue; ?> 
    <div class="__tab-item __tab-<?php echo $item[ 'id' ] ?> <?php echo isset( $item[ 'active' ] ) ? '__active' : '' ?>" data-tab-key="<?php echo $item[ 'id' ] ?>">
      <div 
        class="sermone--media-content-type" 
        data-media-type="<?php echo $item[ 'id' ] ?>"
        data-media-player="<?php echo sermone_media_player() ?>"
        data-media-source="<?php echo $item[ 'data' ][ 'source' ] ?>" 
        data-media-content='<?php echo $item[ 'data' ][ 'content' ] ?>'>
        <!-- Content render by javascript -->
      </div>
    </div>
  <?php endforeach; ?>
</div> <!-- .sermone--media-tab-container -->