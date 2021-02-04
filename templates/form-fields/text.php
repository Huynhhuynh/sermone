<?php 
/**
 * Sermone text field template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<input 
  type="text" 
  name="<?= $field_data[ 'name' ] ?>" 
  <?= isset( $field_data[ 'classes' ] ) ? 'class="'. $field_data[ 'classes' ] .'"' : '' ?>
  <?= isset( $field_data[ 'placeholder' ] ) ? 'placeholder="'. $field_data[ 'placeholder' ] .'"' : '' ?>
  <?= isset( $field_data[ 'require' ] ) ? 'required' : '' ?>
  <?= isset( $field_data[ 'id' ] ) ? 'id="'. $field_data[ 'id' ] .'"' : '' ?>
  <?= isset( $field_data[ 'value' ] ) ? 'value="'. $field_data[ 'value' ] .'"' : '' ?>
>