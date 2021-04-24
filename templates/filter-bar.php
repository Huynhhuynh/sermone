<?php 
/**
 * Sermone filter bar template 
 * 
 * @since 1.0.0 
 * @version 1.0.0
 */

?>
<div id="sermone-filter-bar" class="sermone-filter-bar-container">
  <form id="sermone-filter-form" class="sermone-form" action="<?php echo get_post_type_archive_link( 'sermone' ) ?>" method="get">
    <?php sermone_form_fields_html( $filter_fields ) ?>
    <div class="form-action">
      <button type="submit" class="sermone-button __button-submit">
        <?php echo __( 'Submit', 'sermone' ) ?>
      </button>
    </div>
  </form> <!-- #sermone-filter-form -->
</div> <!-- #sermone-filter-bar -->