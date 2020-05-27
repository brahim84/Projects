<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php echo __('Edit Profile'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('address');
		echo $this->Form->input('city');
		echo $this->Form->input('postcode');
		echo $this->Form->input('state');
		echo $this->Form->input('phone_home');
		echo $this->Form->input('phone_mobile');
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>

