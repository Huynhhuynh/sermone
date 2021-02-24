<?php 
/**
 * Sermone list preacher
 */

?>
<ul class="sermone--preacher-list">
  <? foreach( $preachers as $index => $item ) : ?>
  <li class="preacher-item">
    <span class="__avatar">
      <img 
        src="<?= $item->preacher_avatar ?>" 
        alt="<?= $item->name ?>" 
        title="<?= $item->name ?>"
        data-tippy-content="<?= $item->name ?>" 
        data-tippy-placement="bottom" >
    </span>
  </li>
  <? endforeach; ?>
</ul>