<?php 
/**
 * Sermone select field template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<select 
  name="<?= $field_data[ 'name' ] ?>" 
  <?= isset( $field_data[ 'id' ] ) ? 'id="'. $field_data[ 'id' ] .'"' : '' ?> 
  <?= isset( $field_data[ 'classes' ] ) ? 'class="'. $field_data[ 'classes' ] .'"' : '' ?> 
  <?= isset( $field_data[ 'multiple' ] ) ? 'multiple' : '' ?> 
  <?= isset( $field_data[ 'require' ] ) ? 'required' : '' ?> 
>
  <? foreach( $field_data[ 'options' ] as $value => $label ) : 
    $selected = (isset( $field_data[ 'value' ] ) && $field_data[ 'value' ] === (string) $value) ? 'selected' : '';
  ?>
  <option value="<?= $value ?>" <?= $selected ?>><?= $label ?></option>
  <? endforeach; ?>
</select>