<?php
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=products-' . date('YmdHis') . '.csv');

//header("Content-Type: application/xls");
//header('Content-Disposition: attachment; filename=products-' . date('YmdHis') . '.xls');

header('Pragma: no-cache');
?>
"Order ID","Date","Dealer Name","Bank Name","Account Name","Account Number","SubTotal","Discount","Total","Status"
<?php //echo "\n"; ?>
<?php foreach ($orders as $order): ?>
"<?php echo $order['Order']['id']; ?>","<?php echo date('d/m/Y',strtotime($order['Order']['created'])); ?>","<?php echo $order['User']['name']; ?>","<?php echo $order['Order']['bank_name']; ?>","<?php echo $order['Order']['account_name']; ?>","<?php echo $order['Order']['account_number']; ?>","<?php echo $order['Order']['subtotal']; ?>","<?php echo $order['Order']['discount']; ?>","<?php echo $order['Order']['total']; ?>","<?php echo ($order['Order']['status']==1)?'Paid':'In progress'; ?>"
<?php //echo "\n"; ?>
<?php endforeach; ?>

