<h2>Categories</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('category_id','Parent'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('description'); ?></th>
		<th><?php echo $this->Paginator->sort('product_count'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($categories as $category): ?>
	<tr>
		<td><?php echo h($category['Category']['id']); ?></td>
		<td>
			<?php echo $this->Html->link($category['ParentCategory']['name'], array('controller' => 'categories', 'action' => 'view', $category['ParentCategory']['id'])); ?>
		</td>
		<td><?php echo h($category['Category']['name']); ?></td>
		<td><?php echo h($category['Category']['slug']); ?></td>
		<td><?php echo h($category['Category']['description']); ?></td>
		<td><?php echo h($category['Category']['product_count']); ?></td>
		<td><?php echo h($category['Category']['created']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $category['Category']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $category['Category']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

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
<?php echo $this->Html->link('New Category', array('action' => 'add'), array('class' => 'btn')); ?>
