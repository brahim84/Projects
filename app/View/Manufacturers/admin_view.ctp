<h2>Manufacturer</h2>

<table class="table-striped table-bordered table-condensed table-hover">
<tr>
<td><?php echo __('Id'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['id']); ?></td>
</tr>
<tr>
<td><?php echo __('Name'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['name']); ?></td>
</tr>
<tr>
<td><?php echo __('Slug'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['slug']); ?></td>
</tr>
<tr>
<td><?php echo __('Product Count'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['product_count']); ?></td>
</tr>
<tr>
<td><?php echo __('Active'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['active']); ?></td>
</tr>
<tr>
<td><?php echo __('Created'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['created']); ?></td>
</tr>
<tr>
<td><?php echo __('Modified'); ?></td>
<td><?php echo h($manufacturer['Manufacturer']['modified']); ?></td>
</tr>
</table>

<br />
<br />

<h3>Actions</h3>

<?php echo $this->Html->link('Edit Manufacturer', array('action' => 'edit', $manufacturer['Manufacturer']['id']), array('class' => 'btn')); ?> </li>

<br />
<br />

<?php echo $this->Form->postLink('Delete Manufacturer', array('action' => 'delete', $manufacturer['Manufacturer']['id']), array('class' => 'btn btn-danger'), __('Are you sure you want to delete # %s?', $manufacturer['Manufacturer']['id'])); ?>

<br />
<br />
