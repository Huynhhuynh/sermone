<?php 
/**
 * Sermone post item template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<article <?php post_class( 'sermone-item-preview', get_the_ID() ) ?>>
  <div class="sermone-post-inner">
    <div class="sermone-thumb">
      <a href="<?php the_permalink() ?>">
        <?php sermone_get_post_thumb_html( get_the_ID(), apply_filters( 'sermone_archive_post_image_size', 'thumbnail' ) ) ?>
      </a>
    </div>
    <div class="sermone-entry">
      <div class="sermone-info">
        <div class="more-info">
          <?php echo __( 'on', 'sermone' ) ?> <u><?php echo sermone_date_format( '', sermone_get_field( 'sermon_date_preached', get_the_ID() ) ) ?></u> 
          <?php echo get_the_term_list( get_the_ID(), 'sermone_preacher', __( '— by ', 'sermone' ), ', ', '.' ) ?>
        </div>
        <div class="in-tax">
          <?php sermone_post_in_tax_html( get_the_ID() ) ?>
        </div>
        <h4 class="sermone-title">
          <a href="<?php the_permalink() ?>"><?php the_title() ?></a>
        </h4>
        <div class="sermone-excerpt"><?php the_excerpt() ?></div>
      </div>
      <div class="sermone-actions">
        <?php do_action( 'sermone_hook_loop_item_action_top' ) ?>
        <a href="<?php the_permalink() ?>" class="sermone-quickview" data-sermone-quickview="<?php the_ID() ?>">
          <?php echo __( 'Quick View', 'sermone' ) ?>
          <span class="__icon"><?php echo sermone_svg( 'diagonal_arrow_up_right' ) ?></span>
        </a>
        <a href="<?php the_permalink() ?>" class="sermone-readmore">
          <?php echo __( 'Read More', 'sermone' ) ?>
          <span class="__icon"><?php echo sermone_svg( 'diagonal_arrow_up_right' ) ?></span>
        </a>
        <?php 
        /**
         * sermone_hook_loop_item_action_bottom hook.
         * 
         * @see sermone_archive_loop_item_action_button_favorite - 20
         */
        do_action( 'sermone_hook_loop_item_action_bottom' ) 
        ?>
      </div>
    </div>
  </div>
</article>