<div class="menus index">
	<h2><?php echo __('Menus'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('sequence'); ?></th>
			<th><?php echo $this->Paginator->sort('href'); ?></th>
			<th><?php echo $this->Paginator->sort('visible'); ?></th>
			<th><?php echo $this->Paginator->sort('parent_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created_at'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_at'); ?></th>
			<th><?php echo $this->Paginator->sort('created_by'); ?></th>
			<th><?php echo $this->Paginator->sort('updated_by'); ?></th>
			<th><?php echo $this->Paginator->sort('Portal'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($menus as $menu): ?>
	<tr>
		<td><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['label']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['description']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['sequence']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['href']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['visible']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['updated_at']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['Portal']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $menu['Menu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?></li>
	</ul>
</div>
