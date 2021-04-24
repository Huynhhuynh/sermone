<?php 
/**
 * Post in series template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

$icon = sprintf( '<span class="__icon">%s</span>', sermone_svg( 'diagonal_arrow_up_right' ) );
?>
<div class="sermone-post-in-series">
  <h4 class="post-in-series-title"><?php echo sprintf( __( 'In series <i>%s</i>', 'sermone' ), $series->name ) ?></h4>
  <ul class="sermone-post-in-series-list">
    <?php foreach( $_posts as $index => $p ) : $current_item = $current_post_id == $p->ID ? true : false; ?>
    <li class="<?php echo implode( ' ', [ $current_item ? '__current-item' : '' ] ) ?>">
      <a href="<?php echo get_the_permalink( $p->ID ) ?>"><?php echo $p->post_title ?> <?php echo $icon ?></a>
    </li>
    <?php endforeach; ?>
  </ul>
</div>