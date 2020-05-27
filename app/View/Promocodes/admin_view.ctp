<div class="promocodes view">
<h2><?php  echo __('Promocode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Code'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Discount'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['discount']); ?> RM
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo ($promocode['Promocode']['active'])?'Active':'Inactive'; ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo date('d/m/Y H:i:s',strtotime($promocode['Promocode']['created'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<p><?php echo $this->Html->link(__('Edit Promocode'), array('action' => 'edit', $promocode['Promocode']['id']),array('class' => 'btn')); ?></p>
	<p><?php echo $this->Html->link(__('List Promocodes'), array('action' => 'index'),array('class' => 'btn')); ?></p> 
	<p><?php echo $this->Html->link(__('New Promocode'), array('action' => 'add'),array('class' => 'btn')); ?></p>
</div>
<!-- <div class="related">
	<h3><?php echo __('Related Promocode Users'); ?></h3>
	<?php if (!empty($promocode['PromocodeUser'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Promocode Id'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($promocode['PromocodeUser'] as $promocodeUser): ?>
		<tr>
			<td><?php echo $promocodeUser['id']; ?></td>
			<td><?php echo $promocodeUser['promocode_id']; ?></td>
			<td><?php echo $promocodeUser['user_id']; ?></td>
			<td><?php echo $promocodeUser['order_id']; ?></td>
			<td><?php echo $promocodeUser['created']; ?></td>
			<td><?php echo $promocodeUser['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'promocode_users', 'action' => 'view', $promocodeUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'promocode_users', 'action' => 'edit', $promocodeUser['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'promocode_users', 'action' => 'delete', $promocodeUser['id']), null, __('Are you sure you want to delete # %s?', $promocodeUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>


</div> -->
