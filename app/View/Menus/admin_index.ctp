<div class="menus index">
	<h2><?php echo __('Menus'); ?></h2>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('label'); ?></th>
			<th><?php echo $this->Paginator->sort('description'); ?></th>
			<th><?php echo $this->Paginator->sort('sequence'); ?></th>
			<th><?php echo $this->Paginator->sort('href'); ?></th>
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
		<td><?php echo h($menu['Menu']['parent_id']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['created_at']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['updated_at']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['created_by']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($menu['Menu']['portal']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $menu['Menu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $menu['Menu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $menu['Menu']['id']), null, __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?></li>
	</ul>
</div>
