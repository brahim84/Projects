<div class="promocodeUsers index">
	<h2><?php echo __('Promocode Users'); ?></h2>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('promocode_id'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('order_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($promocodeUsers as $promocodeUser): ?>
	<tr>
		<td><?php echo h($promocodeUser['PromocodeUser']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($promocodeUser['Promocode']['name'], array('controller' => 'promocodes', 'action' => 'view', $promocodeUser['Promocode']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($promocodeUser['User']['name'], array('controller' => 'users', 'action' => 'view', $promocodeUser['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($promocodeUser['Order']['id'], array('controller' => 'orders', 'action' => 'view', $promocodeUser['Order']['id'])); ?>
		</td>
		<td><?php echo h($promocodeUser['PromocodeUser']['created']); ?>&nbsp;</td>
		<td><?php echo h($promocodeUser['PromocodeUser']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promocodeUser['PromocodeUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promocodeUser['PromocodeUser']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promocodeUser['PromocodeUser']['id']), null, __('Are you sure you want to delete # %s?', $promocodeUser['PromocodeUser']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pagination-counter'); ?>
<div class="pagination">
<ul class="pagination">
	<?php
		echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
		echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	?>
</ul>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promocode User'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Promocodes'), array('controller' => 'promocodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode'), array('controller' => 'promocodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
