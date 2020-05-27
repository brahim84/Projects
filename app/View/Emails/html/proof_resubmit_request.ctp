<html>
	<body>
		<p> Dear <?php echo $order['User']['name']; ?>,</p>
		<p> The payment proof which you submitted for the order #<?php echo $order['Order']['id']; ?> is not valid. Kindly <a href="<?php echo Configure::read('Settings.PAYMENT_RESUBMIT_URL'); ?>">re-submit</a> again.</p>
		<p> Thanks & Regards </p>
		<p> Time dotCom Account Team. </p>
	</body>
</html>



