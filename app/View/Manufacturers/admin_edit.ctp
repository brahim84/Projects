<h2>Admin Edit Manufacturer</h2>

<?php echo $this->Form->create('Manufacturer'); ?>
<?php echo $this->Form->input('id'); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('slug'); ?>
<?php echo $this->Form->input('product_count'); ?>
<?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
<?php echo $this->Form->button('Submit', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>
