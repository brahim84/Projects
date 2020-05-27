<div class="promocodes form">
<?php echo $this->Form->create('Promocode'); ?>
	<fieldset>
		<legend><?php echo __('Edit Promocode'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('discount');
		echo $this->Form->input('status');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Promocode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Promocode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Promocodes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Promocode Users'), array('controller' => 'promocode_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Promocode User'), array('controller' => 'promocode_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
