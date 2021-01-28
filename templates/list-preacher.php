<?php 
/**
 * Sermone list preacher
 */

// print_r( $preachers );
?>
<ul class="sermone--preacher-list">
  <? foreach( $preachers as $index => $item ) : ?>
  <li class="preacher-item">
    <span class="__avatar">
      <img src="<?= $item->preacher_avatar ?>" alt="<?= $item->name ?>" title="<?= $item->name ?>">
    </span>
  </li>
  <? endforeach; ?>
</ul>