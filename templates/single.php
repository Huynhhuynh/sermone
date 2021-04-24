<?php 
/**
 * Sermone single template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>
<div class="<?php echo sermone_classes_hook( 'sermone-single sermone-entry-summary', 'sermone_single' ) ?>">
  <div class="sermone-container">

    <a class="sermone-back-to-archive-page-link" href="<?php echo get_post_type_archive_link( 'sermone' ) ?>">
      <span class="__icon"><?php echo sermone_svg( 'back_arrow' ) ?></span>
      <?php echo __( 'All Sermons', 'sermone' ) ?>
    </a>

    <div class="sermone-header">
      <div class="sermone-thumb">
        <?php sermone_get_post_thumb_html( get_the_ID(), apply_filters( 'sermone_hook_single_image_preview_size', 'large' ) ) ?>
      </div>
      <div class="sermone-detail">
        <div class="in-scripture">
          <?php echo __( 'Bible Passage', 'sermone' ) ?> 
          <?php echo sermone_get_scripture_by_sirmone_html( get_the_ID() ) ?>
        </div>
        <div class="in-tax">
          <?php sermone_post_in_tax_html( get_the_ID() ) ?>
        </div>
        <h2 class="post-title"><?php echo the_title() ?></h2>
        <div class="detail-meta">
          <div class="sermone-by">
            <?php sermone_get_list_preacher_html( get_the_ID() ) ?>
          </div>
        </div>

        <span class="sermone-seperate"></span>

        <div class="sermone--date-and-share">
          <div class="date-preached" title="<?php echo __( 'Date preached', 'sermone' ) ?>">
            <span class="__text"><?php echo __( 'Date preached', 'sermone' ) ?> <u><?php echo sermone_date_format( '', sermone_get_field( 'sermon_date_preached', get_the_ID() ) ) ?></u></span>
          </div>
          <div class="sermone--share">
            <?php sermone_share_post_html( get_the_ID() ) ?>
          </div>
        </div>
      </div>
    </div> <!-- .sermone-header -->

    <div class="sermone-content-summary">
      <?php
      /**
       * sermone_single_before_content hook
       *
       * @see sermone_single_media_nav - 20
       */
      do_action( 'sermone_single_before_content' ) 
      ?>
      <div class="sermone-content">
        <?php the_content(); ?>
      </div>
      <?php
      /**
       * sermone_single_after_content hook
       *
       * @see sermone_single_post_nav_html - 20
       * @see sermone_post_in_series - 22
       */ 
      do_action( 'sermone_single_after_content' ) 
      ?>
    </div> <!-- .sermone-content-summary -->
  </div>
</div> <!-- .sermone-single -->
<?php 
get_footer();