<?php echo $this->set('title_for_layout', 'Address'); ?>

<?php echo $this->Html->script(array('shop_address.js'), array('inline' => false)); ?>

<h1>Resubmit Payment</h1>

<?php echo $this->Form->create('Order',array('type'=>'file')); ?>

<hr>

<div class="row">


<?php echo $this->Form->input('bank_name'); ?>

<?php echo $this->Form->input('account_name',array('label'=>'Account Name')); ?>

<?php echo $this->Form->input('account_number',array('label'=>'Account Number')); ?>

<?php echo $this->Form->input('reference_number',array('label'=>'Reference Number')); ?>

<?php echo $this->Form->input('proof', array('type' => 'file','label'=>'Attach proof')); ?>

</div>

<br />

<?php echo $this->Form->button('<i class="icon-arrow-right icon-white"></i> Continue', array('class' => 'btn btn-primary', 'escape' => false));?>
<?php echo $this->Form->end(); ?>

