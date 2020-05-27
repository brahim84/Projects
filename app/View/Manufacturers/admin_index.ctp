<h2>Manufacturers</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id'); ?></th>
		<th><?php echo $this->Paginator->sort('name'); ?></th>
		<th><?php echo $this->Paginator->sort('slug'); ?></th>
		<th><?php echo $this->Paginator->sort('product_count'); ?></th>
		<th><?php echo $this->Paginator->sort('active'); ?></th>
		<th><?php echo $this->Paginator->sort('created'); ?></th>
		<th><?php echo $this->Paginator->sort('modified'); ?></th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($manufacturers as $manufacturer): ?>
	<tr>
		<td><?php echo h($manufacturer['Manufacturer']['id']); ?></td>
		<td><?php echo h($manufacturer['Manufacturer']['name']); ?></td>
		<td><?php echo h($manufacturer['Manufacturer']['slug']); ?></td>
		<td><?php echo h($manufacturer['Manufacturer']['product_count']); ?></td>
		<td><?php echo $this->Html->link($this->Html->image('icon_' . $manufacturer['Manufacturer']['active'] . '.png'), array('controller' => 'manufacturers', 'action' => 'switch', 'active', $manufacturer['Manufacturer']['id']), array('class' => 'status', 'escape' => false)); ?></td>
		<td><?php echo h($manufacturer['Manufacturer']['created']); ?></td>
		<td><?php echo h($manufacturer['Manufacturer']['modified']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'view', $manufacturer['Manufacturer']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link('Edit', array('action' => 'edit', $manufacturer['Manufacturer']['id']), array('class' => 'btn btn-mini')); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>

<br />

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('New Manufacturer', array('action' => 'add'), array('class' => 'btn')); ?>

<br />
<br />