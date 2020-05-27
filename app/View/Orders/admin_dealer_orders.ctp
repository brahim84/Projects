<h2>My Orders</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo $this->Paginator->sort('id','OrderID');?></th>
		<th><?php echo $this->Paginator->sort('created','Date');?></th>		
		<th><?php echo $this->Paginator->sort('bank_name');?></th>
		<th><?php echo $this->Paginator->sort('account_name');?></th>
		<th><?php echo $this->Paginator->sort('account_number');?></th>
		<th><?php echo $this->Paginator->sort('subtotal','Subtotal (RM)');?></th>
		<th><?php echo $this->Paginator->sort('discount','Discount (RM)');?></th>
		<th><?php echo $this->Paginator->sort('total','Total (RM)');?></th>
		<th><?php echo $this->Paginator->sort('status');?></th>
		<th class="actions">Invoice</th>
		<th class="actions">Actions</th>
	</tr>
	<?php foreach ($orders as $order):
		$label = 'default';
		if($order['Order']['status'] == 1){
			$label = 'success';
		}
	?>
	<tr>
		<td><?php echo h($order['Order']['id']); ?></td>
		<td><?php echo date('d/m/Y',strtotime($order['Order']['created'])); ?></td>				
		<td><?php echo h($order['Order']['bank_name']); ?></td>
		<td><?php echo h($order['Order']['account_name']); ?></td>
		<td><?php echo h($order['Order']['account_number']); ?></td>
		<td><?php echo h($order['Order']['subtotal']); ?></td>
		<td><?php echo h($order['Order']['discount']); ?></td>
		<td><?php echo h($order['Order']['total']); ?></td>
		<td><span class="label label-<?php echo $label; ?>"><?php echo $payment_status[$order['Order']['status']]; ?></span></td>
		<td>			
		<?php 
			if($order['Order']['status']==1){
				echo $this->Html->link('View Invoice', array('action' => 'view_invoice', $order['Order']['id']), array('class' => 'btn btn-mini btn-info'));
			}
		?>	
		</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'dealer_view', $order['Order']['id']), array('class' => 'btn btn-mini')); ?>
			<?php 
			if($order['Order']['resubmit']==1 && $order['Order']['status']==0){
				echo $this->Html->link('Resubmit Proof', array('action' => 'resubmit_proof', $order['Order']['id']), array('class' => 'btn btn-mini btn-primary'));
			}
			?>			
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

