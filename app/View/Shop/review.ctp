<?php echo $this->set('title_for_layout', 'Order Review'); ?>

<?php echo $this->Html->script(array('shop_review.js'), array('inline' => false)); ?>

<style type="text/css">
	#ccbox {
		background: transparent url("/img/cards.png");
		margin: 0 0 10px 0;
		padding: 0 0 0 150px;
		width: 0;
		height: 23px;
		overflow: hidden;
	}
</style>

<h1>Order Review and Submit Payment</h1>
<hr>


<div class="row">
<div class="span1">#</div>
<div class="span6">ITEM</div>
<div class="span1">WEIGHT</div>
<div class="span1">WEIGHT</div>
<div class="span1">PRICE</div>
<div class="span1" style="text-align: right;">QUANTITY</div>
<div class="span1" style="text-align: right;">SUBTOTAL</div>
</div>

<br />
<br />

<?php foreach ($shop['OrderItem'] as $item): ?>
<div class="row">
<div class="span1"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('height' => 60, 'class' => 'px60')); ?></div>
<div class="span6"><?php echo $item['Product']['name']; ?></div>
<div class="span1"><?php echo $item['Product']['weight']; ?></div>
<div class="span1"><?php echo $item['totalweight']; ?></div>
<div class="span1">$<?php echo $item['Product']['price']; ?></div>
<div class="span1" style="text-align: right;"><?php echo $item['quantity']; ?></div>
<div class="span1" style="text-align: right;">$<?php echo $item['subtotal']; ?></div>
</div>
<?php endforeach; ?>

<hr>

<div class="row">
	<div class="span10">Products: <?php echo $shop['Order']['order_item_count']; ?></div>
	<div class="span1" style="text-align: right;">Items: <?php echo $shop['Order']['quantity']; ?></div>
	<div class="span1" style="text-align: right;">Total<br /><strong>$<?php echo $shop['Order']['total']; ?></strong></div>
</div>

<hr>

<br />
<br />

<?php echo $this->Form->create('Order'); ?>

<?php if($shop['Order']['order_type'] == 'creditcard'): ?>

<div id="ccbox">
	Credit Card Type.
</div>

<?php echo $this->Form->input('creditcard_number', array('class' => 'span2 ccinput', 'maxLength' => 16, 'autocomplete' => 'off')); ?>

<div class="row">
	<div class="span2">
		<?php echo $this->Form->input('creditcard_month', array(
			'label' => 'Expiration Month',
			'class' => 'span2',
			'options' => array(
				'01' => '01 - January',
				'02' => '02 - February',
				'03' => '03 - March',
				'04' => '04 - April',
				'05' => '05 - May',
				'06' => '06 - June',
				'07' => '07 - July',
				'08' => '08 - August',
				'09' => '09 - September',
				'10' => '10 - October',
				'11' => '11 - November',
				'12' => '12 - December'
			)
		)); ?>
	</div>
	<div class="span2">
		<?php echo $this->Form->input('creditcard_year', array(
			'label' => 'Expiration Year',
			'class' => 'span2',
			'options' => array(
				'13' => '2013',
				'14' => '2014',
				'15' => '2015',
				'16' => '2016',
				'17' => '2017',
				'18' => '2018',
				'19' => '2019',
				'20' => '2020',
				'21' => '2021',
				'22' => '2022',
			)
		));?>
	</div>
</div>

<?php echo $this->Form->input('creditcard_code', array('label' => 'Card Security Code', 'class' => 'span1', 'maxLength' => 4)); ?>

<br />

<?php endif; ?>

<?php echo $this->Form->button('<i class="icon-thumbs-up icon-white"></i> Submit Order', array('class' => 'btn btn-primary', 'ecape' => false)); ?>

<?php echo $this->Form->end(); ?>

<br />
<br />

