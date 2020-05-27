<html>
	<style type="text/css">
		body,div,table,thead,tbody,tfoot,tr,th,td,p { font-family:"Calibri"; font-size:12px; }
	</style>
	<body>
	<p> Dear Finance Team,</p>
	<p> Kindly check the payment proof attached for the orderID #<?php echo $order['Order']['id'];?>.</p>
	<p> <a href="<?php echo Configure::read('Settings.PAYMENT_VERIFY_URL'); ?>" target="_blank">Verify Payment</a> </p>
	</body>
</html>



