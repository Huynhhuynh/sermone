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
  name="<?php echo $field_data[ 'name' ] ?>" 
  <?php echo isset( $field_data[ 'classes' ] ) ? 'class="'. $field_data[ 'classes' ] .'"' : '' ?>
  <?php echo isset( $field_data[ 'placeholder' ] ) ? 'placeholder="'. $field_data[ 'placeholder' ] .'"' : '' ?>
  <?php echo isset( $field_data[ 'require' ] ) ? 'required' : '' ?>
  <?php echo isset( $field_data[ 'id' ] ) ? 'id="'. $field_data[ 'id' ] .'"' : '' ?>
  <?php echo isset( $field_data[ 'value' ] ) ? 'value="'. $field_data[ 'value' ] .'"' : '' ?>
>