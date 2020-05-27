<div class="promocodes index">
	<h2><?php echo __('Promocodes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('discount'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($promocodes as $promocode): ?>
	<tr>
		<td><?php echo h($promocode['Promocode']['id']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['name']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['code']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['discount']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['status']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['active']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['created']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promocode['Promocode']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promocode['Promocode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promocode['Promocode']['id']), null, __('Are you sure you want to delete # %s?', $promocode['Promocode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Promocode'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Promocode Users'), array('controller' => 'promocode_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode User'), array('controller' => 'promocode_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
