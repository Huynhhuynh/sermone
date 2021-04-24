<?php 
/**
 * Sermone select field template 
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

?>
<select 
  name="<?php echo $field_data[ 'name' ] ?>" 
  <?php echo isset( $field_data[ 'id' ] ) ? 'id="'. $field_data[ 'id' ] .'"' : '' ?> 
  <?php echo isset( $field_data[ 'classes' ] ) ? 'class="'. $field_data[ 'classes' ] .'"' : '' ?> 
  <?php echo isset( $field_data[ 'multiple' ] ) ? 'multiple' : '' ?> 
  <?php echo isset( $field_data[ 'require' ] ) ? 'required' : '' ?> 
>
  <?php foreach( $field_data[ 'options' ] as $value => $label ) : 
    $selected = (isset( $field_data[ 'value' ] ) && $field_data[ 'value' ] === (string) $value) ? 'selected' : '';
  ?>
  <option value="<?php echo $value ?>" <?php echo $selected ?>><?php echo $label ?></option>
  <?php endforeach; ?>
</select>