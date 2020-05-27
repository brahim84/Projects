<h1>Manufacturers</h1>

<br />

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th>Name</th>
	</tr>
	<?php foreach ($manufacturers as $manufacturer): ?>
	<tr>
		<td><?php echo $this->Html->link($manufacturer['Manufacturer']['name'], array('action' => 'view', 'slug' => $manufacturer['Manufacturer']['slug'])); ?></td>
	</tr>
	<?php endforeach; ?>
</table>

<br />
<br />
