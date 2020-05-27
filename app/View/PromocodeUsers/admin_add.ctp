<div class="promocodeUsers form">
<?php echo $this->Form->create('PromocodeUser'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Promocode User'); ?></legend>
	<?php
		echo $this->Form->input('promocode_id');
		echo $this->Form->input('user_id');
		echo $this->Form->input('order_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Promocode Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Promocodes'), array('controller' => 'promocodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode'), array('controller' => 'promocodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
