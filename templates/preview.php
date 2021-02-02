<?php 
/**
 * Sermone post item template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<article <? post_class( 'sermone-item-preview', get_the_ID() ) ?>>
  <div class="sermone-post-inner">
    <div class="sermone-thumb">
      <a href="<? the_permalink() ?>">
        <? sermone_get_post_thumb_html( get_the_ID(), 'thumbnail' ) ?>
      </a>
    </div>
    <div class="sermone-entry">
      <div class="sermone-info">
        <div class="more-info">
          <?= __( 'on', 'sermone' ) ?> <u><?= get_field( 'sermon_date_preached', get_the_ID() ) ?></u> 
          <?= get_the_term_list( get_the_ID(), 'sermone_preacher', __( '— by ', 'sermone' ), ', ', '.' ) ?>
        </div>
        <div class="in-tax">
          <? sermone_post_in_tax_html( get_the_ID() ) ?>
        </div>
        <h4 class="sermone-title">
          <a href="<? the_permalink() ?>"><? the_title() ?></a>
        </h4>
        <div class="sermone-excerpt"><? the_excerpt() ?></div>
      </div>
      <div class="sermone-media">
        Media...
      </div>
    </div>
  </div>
</article>