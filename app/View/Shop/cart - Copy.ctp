<?php echo $this->set('title_for_layout', 'Shopping Cart'); ?>

<?php echo $this->Html->script(array('cart.js'), array('inline' => false)); ?>

<h1>Dealers Cart</h1>

<?php if(empty($shop['OrderItem'])) : ?>

Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'cartupdate'))); ?>
<div class="container cart_page">
<hr>

	<div class="row">
		<div class="span1">#</div>
		<div class="span6">ITEM</div>
		<div class="span1">PRICE</div>
		<div class="span1">QUANTITY</div>
		<div class="span1">SUBTOTAL</div>
		<div class="span1">REMOVE</div>
	</div>

	<?php $tabindex = 1; ?>
	<?php foreach ($shop['OrderItem'] as $item): ?>
		<div class="row" id="row-<?php echo $item['Product']['id']; ?>">
			<div class="span1"><?php echo $this->Html->image('/images/small/' . $item['Product']['image'], array('class' => 'px60')); ?></div>
			<div class="span6"><strong><?php echo $this->Html->link($item['Product']['name'], array('controller' => 'products', 'action' => 'view', 'slug' => $item['Product']['slug'])); ?></strong></div>
			<div class="span1" id="price-<?php echo $item['Product']['id']; ?>"><?php echo $item['Product']['price']; ?></div>
			<div class="span1">
			<?php 
			echo $this->Form->input('quantity-' . $item['Product']['id'], array('div' => false, 'class' => 'numeric span1', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['Product']['id'], 'value' => $item['quantity'])); 
			
			echo $this->Form->hidden('max_quantity_'.$item['Product']['id'], array('value' => $item['Product']['max_quantity'])); 
			?></div>
			<div class="span1" id="subtotal-<?php echo $item['Product']['id']; ?>"><?php echo $item['subtotal']; ?></div>
			<div class="span1"><span class="remove" id="<?php echo $item['Product']['id']; ?>"></span></div>
		</div>
	<?php endforeach; ?>

	<hr>

	<div class="row">
		<div class="span6 offset6 tr">
			<?php echo $this->Html->link('<i class="icon-remove icon"></i> Clear Cart', array('controller' => 'shop', 'action' => 'clear'), array('class' => 'btn', 'escape' => false)); ?>
			&nbsp; &nbsp;
			<?php echo $this->Html->link(' <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping', array('controller' => 'pages', 'action' => 'index'), array('class' => 'btn', 'escape' => false)); ?>
			
		</div>
	</div>

	<hr>

	<div class="row">
		<div class="span6 offset6 tr">
			<?php echo $this->Form->input('promocode', array('div' => false, 'class' => 'numeric span1', 'label' => 'Apply Promocode')); ?>
		</div>
	</div>
	<div class="row">
		<div class="span3 offset9 tr">
			Subtotal: <span class="normal" id="subtotal">$<?php echo $shop['Order']['subtotal']; ?></span>
			<br />
			<br />
			Order Total: <span class="red" id="total">$<?php echo $shop['Order']['total']; ?></span>
			<br />
			<br />

			<?php echo $this->Html->link('<i class="icon-arrow-right icon-white"></i> Checkout', array('controller' => 'shop', 'action' => 'payment_proof'), array('class' => 'btn btn-primary', 'escape' => false)); ?>

			<br />
			<br />

			<?php ///echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
			<!-- <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" /> -->
			<?php //echo $this->Form->end(); ?>

			<?php //echo $this->Html->image('https://checkout.google.com/buttons/checkout.gif?w=180&h=46&style=white&variant=text&loc=en_US', array('url' => array('controller' => 'shop', 'action' => 'googlecheckout'))); ?>

		</div>
	</div>
</div>
<?php echo $this->Form->end(); ?>
<br />
<br />

<?php endif; ?>
