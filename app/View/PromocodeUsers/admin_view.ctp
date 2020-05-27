<div class="promocodeUsers view">
<h2><?php  echo __('Promocode User'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($promocodeUser['PromocodeUser']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Promocode'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promocodeUser['Promocode']['name'], array('controller' => 'promocodes', 'action' => 'view', $promocodeUser['Promocode']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promocodeUser['User']['name'], array('controller' => 'users', 'action' => 'view', $promocodeUser['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($promocodeUser['Order']['id'], array('controller' => 'orders', 'action' => 'view', $promocodeUser['Order']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($promocodeUser['PromocodeUser']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($promocodeUser['PromocodeUser']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Promocode User'), array('action' => 'edit', $promocodeUser['PromocodeUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Promocode User'), array('action' => 'delete', $promocodeUser['PromocodeUser']['id']), null, __('Are you sure you want to delete # %s?', $promocodeUser['PromocodeUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Promocode Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Promocodes'), array('controller' => 'promocodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode'), array('controller' => 'promocodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
