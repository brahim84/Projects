<h2>Order Details</h2>
<dl>
	<dt><?php echo __('Bank Name'); ?></dt>
	<dd>
		<?php echo h($order['Order']['bank_name']); ?>
	</dd>
	<dt><?php echo __('Account Name'); ?></dt>
	<dd>
		<?php echo h($order['Order']['account_name']); ?>
	</dd>
	<dt><?php echo __('Account Number'); ?></dt>
	<dd>
		<?php echo h($order['Order']['account_number']); ?>
	</dd>
	<dt><?php echo __('Reference Number'); ?></dt>
	<dd>
		<?php echo h($order['Order']['reference_number']); ?>
	</dd>	
	<dt><?php echo __('Payment Proof'); ?></dt>
	<dd>
		<img height="50" src="<?php echo $order['Order']['proof']; ?>">
	</dd>
	<dt><?php echo __('Subtotal'); ?></dt>
	<dd>
		<?php echo h($order['Order']['subtotal']); ?> RM
	</dd>
	<dt><?php echo __('Discount'); ?></dt>
	<dd>
		<?php echo h($order['Order']['discount']); ?> RM
	</dd>		
	<dt><?php echo __('Total'); ?></dt>
	<dd>
		<?php echo h($order['Order']['total']); ?> RM
	</dd>
	<dt><?php echo __('Status'); ?></dt>
	<dd>
		<?php echo $payment_status[$order['Order']['status']]; ?>
	</dd>
	<dt>Order Date</dt>
	<dd>
		<?php echo date('d/m/Y H:i:s',strtotime($order['Order']['created'])); ?>
	</dd>
</dl>

<?php if (!empty($order['OrderItem'])):?>
<h2>Product Details</h2>

<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
		<th><?php echo __('Order Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Quantity'); ?></th>
		<th><?php echo __('Price (RM)'); ?></th>
	</tr>
	<?php foreach ($order['OrderItem'] as $orderItem): ?>
		<tr>
			<td><?php echo $orderItem['order_id'];?></td>
			<td><?php echo $orderItem['name'];?></td>
			<td><?php echo $orderItem['quantity'];?></td>
			<td><?php echo $orderItem['price'];?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php endif; ?>


