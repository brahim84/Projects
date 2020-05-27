<h2>Orders</h2>
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
		<th class="actions">Approve</th>
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
		<td>
		<?php 
		if($order['Order']['status']==0) {
			echo $this->Form->postLink('Approve', array('controller' => 'orders', 'action' => 'admin_change_payment_status', $order['Order']['id'],'approve'), array('class' => 'btn btn-mini btn-success'), __('Are you sure you want to approve the payment # %s?', $order['Order']['id']));
		
			//echo $this->Form->postLink('Disapprove', array('controller' => 'orders', 'action' => 'admin_change_payment_status', $order['Order']['id'],'disapprove'), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to disapprove the payment # %s?', $order['Order']['id']));
		}?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link('View', array('action' => 'payment_details', $order['Order']['id']), array('class' => 'btn btn-mini')); ?>
			<?php 
			if($order['Order']['resubmit']==0 && $order['Order']['status']==0) {
				echo $this->Form->postLink('Resubmit Request', array('controller' => 'orders', 'action' => 'admin_resubmit_request', $order['Order']['id']), array('class' => 'btn btn-mini btn-danger status'), __('Are you sure you want to request to resubmit the payment # %s?', $order['Order']['id']));
			}
			?>	
			<?php //echo $this->Html->link('Edit', array('action' => 'edit', $order['Order']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink('Delete', array('action' => 'delete', $order['Order']['id']), array('class' => 'btn btn-mini btn-danger'), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>			
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

