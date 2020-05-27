<?php echo $this->Html->css(array('bootstrap-editable.css'), 'stylesheet', array('inline' => false)); ?>
<?php echo $this->Html->script(array('bootstrap-editable.js'), array('inline' => false)); ?>

<script>
$(document).ready(function() {

	$('.category').editable({
		type: 'select',
		name: 'category_id',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Category',
		source: <?php echo json_encode($categorieseditable); ?>,
		placement: 'right',
	});

	$('.name').editable({
		type: 'text',
		name: 'name',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Name',
		placement: 'right',
	});

	$('.description').editable({
		type: 'textarea',
		name: 'description',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Description',
		placement: 'right',
	});

	$('.price').editable({
		type: 'text',
		name: 'price',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Price',
		placement: 'left',
	});

	$('.weight').editable({
		type: 'text',
		name: 'weight',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Weight',
		placement: 'left',
	});
	$('.size').editable({
		type: 'text',
		name: 'size',
		url: '<?php echo $this->webroot; ?>admin/products/editable',
		title: 'Size',
		placement: 'left',
	});
});
</script>
<h2>Peripherals</h2>

<div class="row">

	<?php echo $this->Form->create('Product', array()); ?>
	<?php echo $this->Form->hidden('search', array('value' => 1)); ?>

	<div class="span2">
		<?php echo $this->Form->input('active', array('label' => false, 'class' => 'span2', 'empty' => 'All Status', 'options' => array(1 => 'Active', 0 => 'Not Active'), 'selected' => $all['active'])); ?>
	</div>
	<div class="span2">
		<?php echo $this->Form->input('filter', array(
			'label' => false,
			'class' => 'span2',
			'options' => array(
				'name' => 'Name',
				'description' => 'Description',
				'price' => 'Price',
				'created' => 'Created',
			),
			'selected' => $all['filter']
		)); ?>

	</div>

	<div class="span2">
		<?php echo $this->Form->input('name', array('label' => false, 'id' => false, 'class' => 'span2', 'value' => $all['name'])); ?>

	</div>

	<div class="span4">
		<?php echo $this->Form->button('Search', array('class' => 'btn')); ?>
		&nbsp; &nbsp;
		<?php echo $this->Html->link('Reset Search', array('controller' => 'products', 'action' => 'reset', 'admin' => true), array('class' => 'btn')); ?>

	</div>

	<?php echo $this->Form->end(); ?>

</div>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('image'); ?></th>
		<th><?php echo $this->Paginator->sort('category_id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('price','Price (RM)'); ?></th>
		<th><?php echo $this->Paginator->sort('weight','Weight (in gm)'); ?></th>
		<th><?php echo $this->Paginator->sort('size','Size (in cm)'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><img src="<?php echo $product['Product']['image']; ?>" height="150" style="height:150px !important" /></td>
		<td><span class="category" data-value="<?php echo $product['Category']['id']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Category']['name']; ?></span></td>
		<td><span class="name" data-value="<?php echo $product['Product']['name']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['name']; ?></span></td>
		<td><span class="description" data-value="<?php echo $product['Product']['description']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['description']; ?></span></td>
		<td><span class="price" data-value="<?php echo $product['Product']['price']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['price']; ?></span></td>
		<td><span class="weight" data-value="<?php echo $product['Product']['weight']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo $product['Product']['weight']; ?></span></td>
		<td><span class="size" data-value="<?php echo $product['Product']['size']; ?>" data-pk="<?php echo $product['Product']['id']; ?>"><?php echo h($product['Product']['size']); ?></span></td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $product['Product']['active'] . '.png'), array('controller' => 'products', 'action' => 'switch', 'active', $product['Product']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td><?php echo h($product['Product']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $product['Product']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $product['Product']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>			
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<?php echo $this->element('pagination-counter'); ?>
<div class="pagination">
<ul class="pagination">
	<?php
		echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
		echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	?>
</ul>
</div>

<h3>Actions</h3>
<?php echo $this->Html->link('New Product', array('action' => 'add'), array('class' => 'btn btn-mini')); ?>

