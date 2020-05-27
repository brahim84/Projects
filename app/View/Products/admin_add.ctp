<h2>Admin Add Product</h2>

<br />

<?php echo $this->Form->create('Product',array('type'=>'file')); ?>
<?php echo $this->Form->input('name'); ?>
<?php echo $this->Form->input('category_id'); ?>
<?php echo $this->Form->input('description'); ?>
<?php echo $this->Form->input('image', array('type' => 'file')); ?>
<?php echo $this->Form->input('price'); ?>
<?php echo $this->Form->input('weight',array('label'=>' Weight (in gm)')); ?>
<?php echo $this->Form->input('size',array('label'=>' Size (in cm)')); ?>
<?php echo $this->Form->input('max_quantity'); ?>
<?php echo $this->Form->input('active', array('type' => 'checkbox')); ?>
<br />
<?php echo $this->Form->button('Submit', array('class' => 'btn btn')); ?>
<?php echo $this->Form->end(); ?>

<br />
<br />

