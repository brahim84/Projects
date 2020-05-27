<h2>Admin Edit Order</h2>

<br />

<?php echo $this->Form->create('Order');?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('subtotal'); ?>
<?php echo $this->Form->input('discount'); ?>
<?php echo $this->Form->input('total'); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn'));?>
<?php echo $this->Form->end();?>

