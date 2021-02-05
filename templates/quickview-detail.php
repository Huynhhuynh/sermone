<?php 
/**
 * Sermone quickview detail 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<div class="<?= sermone_classes_hook( 'sermone-quickview-detail-container', 'sermone_quickview_detail' ) ?>">
  <div class="sermone-header">
    <div class="sermone-thumb">
      <? sermone_get_post_thumb_html( $post_id, apply_filters( 'sermone_quickview_post_image_size', 'thumbnail' ) ) ?>
    </div>
    <div class="sermone-info">
      <div class="more-info">
        <?= __( 'on', 'sermone' ) ?> <u><?= get_field( 'sermon_date_preached', $post_id ) ?></u> 
        <?= get_the_term_list( $post_id, 'sermone_preacher', __( '— by ', 'sermone' ), ', ', '.' ) ?>
      </div>
      <div class="in-tax">
        <? sermone_post_in_tax_html( $post_id ) ?>
      </div>
      <h4 class="sermone-title">
        <a href="<?= get_the_permalink( $post_id ) ?>"><?= get_the_title( $post_id ) ?></a>
      </h4>
    </div>
  </div>  
  <? sermone_single_media_nav_html( $post_id ) ?>
  <div class="sermone-content">
    <?= wpautop( get_the_content( '', '', $post_id ) ) ?>
  </div>
</div> <!-- .sermone-quickview-detail-container -->