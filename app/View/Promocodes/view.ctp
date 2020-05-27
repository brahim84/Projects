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
			<?php echo h($promocode['Promocode']['discount']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Active'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['active']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($promocode['Promocode']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promocode'), array('action' => 'edit', $promocode['Promocode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promocode'), array('action' => 'delete', $promocode['Promocode']['id']), null, __('Are you sure you want to delete # %s?', $promocode['Promocode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promocodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Promocode Users'), array('controller' => 'promocode_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode User'), array('controller' => 'promocode_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
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

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Promocode User'), array('controller' => 'promocode_users', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
