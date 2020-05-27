<h2>Product</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<td>Id</td>
		<td><?php echo h($product['Product']['id']); ?></td>
	</tr>
	<tr>
		<td>Name</td>
		<td><?php echo h($product['Product']['name']); ?></td>
	</tr>
	<tr>
		<td>Description</td>
		<td><?php echo h($product['Product']['description']); ?></td>
	</tr>
	<tr>
		<td>Image</td>
		<td><img src="<?php echo $product['Product']['image']; ?>" /></td>
	</tr>
	<tr>
		<td>Price</td>
		<td><?php echo h($product['Product']['price']); ?> RM</td>
	</tr>
	<tr>
		<td>Weight</td>
		<td><?php echo (!empty($product['Product']['weight']))?$product['Product']['weight'].' gm':'--'; ?></td>
	</tr>
	<tr>
		<td>Size</td>
		<td><?php echo (!empty($product['Product']['size']))?$product['Product']['size'].' cm':'--'; ?></td>
	</tr>	
	<tr>
		<td>Active</td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $product['Product']['active'] . '.png'), array('controller' => 'products', 'action' => 'switch', 'active', $product['Product']['id']), array('class' => 'status', 'escape' => false)); ?></td>
	</tr>
	<tr>
		<td>Created</td>
		<td><?php echo h($product['Product']['created']); ?></td>
	</tr>
	<tr>
		<td>Modified</td>
		<td><?php echo h($product['Product']['modified']); ?></td>
	</tr>
</table>


<h3>Actions</h3>

<?php echo $this->Html->link('Edit Product', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn')); ?>

<br />
<br />

<?php echo $this->Form->postLink('Delete Product', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>

<br />
<br />

