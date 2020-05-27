<div class="promocodes form">
<?php echo $this->Form->create('Promocode'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Promocode'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('code');
		echo $this->Form->input('discount',array('min'=>0,'onkeypress'=>'return validateFloatKeyPress(this,event);','label'=>'Discount (RM)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<?php echo $this->Html->link(__('List Promocodes'), array('action' => 'index'), array('class' => 'btn')); ?>
</div>
