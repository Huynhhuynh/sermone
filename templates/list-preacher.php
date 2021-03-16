<?php 
/**
 * Sermone list preacher
 */

?>
<ul class="sermone--preacher-list">
  <?php foreach( $preachers as $index => $item ) : ?>
  <li class="preacher-item">
    <span class="__avatar">
      <img 
        src="<?php echo $item->preacher_avatar ?>" 
        alt="<?php echo $item->name ?>" 
        title="<?php echo $item->name ?>"
        data-tippy-content="<?php echo $item->name ?>" 
        data-tippy-placement="bottom" >
    </span>
  </li>
  <?php endforeach; ?>
</ul>