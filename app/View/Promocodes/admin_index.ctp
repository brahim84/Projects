<div class="promocodes index">
	<h2><?php echo __('Promocodes'); ?></h2>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('name'); ?></th>
			<th><?php echo $this->Paginator->sort('code'); ?></th>
			<th><?php echo $this->Paginator->sort('discount','Discount (RM)'); ?></th>
			<th><?php echo $this->Paginator->sort('active'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($promocodes as $promocode):
	?>
	<tr>
		<td><?php echo h($promocode['Promocode']['id']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['name']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['code']); ?>&nbsp;</td>
		<td><?php echo h($promocode['Promocode']['discount']); ?>&nbsp;</td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $promocode['Promocode']['active'] . '.png'), array('controller' => 'promocodes', 'action' => 'switch', 'active', $promocode['Promocode']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td><?php echo date('d/m/Y',strtotime($promocode['Promocode']['created'])); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $promocode['Promocode']['id']),array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $promocode['Promocode']['id']),array('class' => 'btn btn-mini')); ?>
			<?php //echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $promocode['Promocode']['id']),array('class' => 'btn btn-mini'), null, __('Are you sure you want to delete # %s?', $promocode['Promocode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
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
	<?php echo $this->Html->link('New Promocode', array('action' => 'add'), array('class' => 'btn')); ?>
</div>
