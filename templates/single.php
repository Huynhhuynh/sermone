<?php 
/**
 * Sermone single template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

get_header();
?>
<div class="<?= sermone_classes_hook( 'sermone-single sermone-entry-summary', 'sermone_single' ) ?>">
  <div class="sermone-container">
    <div class="sermone-header">
      <div class="sermone-thumb">
        <? sermone_get_post_thumb_html( get_the_ID() ) ?>
      </div>
      <div class="sermone-detail">
        <div class="in-scripture">
          <?= __( 'Bible Passage', 'sermone' ) ?> 
          <?= sermone_get_scripture_by_sirmone_html( get_the_ID() ) ?>
        </div>
        <div class="in-tax">
          <? sermone_post_in_tax_html( get_the_ID() ) ?>
        </div>
        <h2 class="post-title"><?= the_title() ?></h2>
        <div class="detail-meta">
          <div class="sermone-by">
            <? sermone_get_list_preacher_html( get_the_ID() ) ?>
          </div>
        </div>

        <span class="sermone-seperate"></span>

        <div class="sermone--date-and-share">
          <div class="date-preached" title="<?= __( 'Date preached', 'sermone' ) ?>">
            <!-- <span class="__icon"><?= sermone_svg( 'calendar' ) ?></span> -->
            <span class="__text"><?= __( 'Date preached', 'sermone' ) ?> <u><?= get_field( 'sermon_date_preached', get_the_ID() ) ?></u></span>
          </div>
          <div class="sermone--share">
            <? sermone_share_post_html( get_the_ID() ) ?>
          </div>
        </div>
      </div>
    </div> <!-- .sermone-header -->

    <div class="sermone-content-summary">
      <? 
      /**
       * sermone_single_before_content hook
       *
       */
      do_action( 'sermone_single_before_content' ) 
      ?>
      <div class="sermone-content">
        <? the_content(); ?>
      </div>
      <?
      /**
       * sermone_single_after_content hook
       *
       */ 
      do_action( 'sermone_single_after_content' ) 
      ?>
    </div> <!-- .sermone-content-summary -->
  </div>
</div> <!-- .sermone-single -->
<?php 
get_footer();