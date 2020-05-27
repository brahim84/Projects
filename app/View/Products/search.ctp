<?php echo $this->Html->script('addtocart.js', array('inline' => false)); ?>

<?php if($ajax != 1): ?>
<h1>Search</h1>

<br />
<br />

<?php echo $this->Form->create('Product', array('type' => 'GET')); ?>

<div class="row">
<div class="span3">
<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'class' => 'span3', 'autocomplete' => 'off', 'value' => $search)); ?>
</div>
<div class="span2">
<?php echo $this->Form->button('Search', array('div' => false, 'class' => 'btn btn-primary')); ?>
</div>
</div>

<?php echo $this->Form->end(); ?>

<br />

<?php endif; ?>

<?php // echo $this->Html->script('search.js', array('inline' => false)); ?>

<?php if(!empty($search)) : ?>
<?php if(!empty($products)) : ?>
<?php
foreach ($products as $product):
?>
<div class="row">
	<div class="col-sm-3">
		<div class="well prod_img">
			<a href="#" data-target="#myModal_<?php echo $product['Product']['id']; ?>" data-toggle="modal" > 
			<img class="image" height="150" src="<?php echo $product['Product']['image']; ?>" alt="<?php echo $product['Product']['name']; ?>" />
			</a>
		</div>
		
		<div class="well prod_details">
			<div class="prod_desc">
				<a href="#myModal_<?php echo $product['Product']['id'];?>" data-toggle="modal"><?php echo ucfirst($product['Product']['name']);?></a>
				<?php if(!empty($product['Product']['weight'])) { echo '<p>'.$product['Product']['weight'].' gm </p>'; }?>
				<?php if(!empty($product['Product']['size'])) { echo '<p>'.$product['Product']['size'].' cm</p>'; }?>
				<p><?php echo $this->Text->truncate(ucfirst($product['Product']['description']),120,array('ellipsis' => '...','exact' => false));?>
				</p>
				<?php echo $this->Form->end();?>
			</div>	
			<div class="prod_add_cart">
				<p>RM <?php echo $product['Product']['price']; ?></p>
				<p><?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
				<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
				<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary addtocart', 'id' => $product['Product']['id'], 'escape' => false));?>
				</p>				
			</div>
		</div>		
	</div>
</div>

<!-- Modal HTML -->
<div id="myModal_<?php echo $product['Product']['id'];?>" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title"><?php echo ucfirst($product['Product']['name']);?></h4>
			</div>
			<div class="modal-body">
				<p>
					<img src="<?php echo $product['Product']['image']; ?>" class="image" alt="<?php echo $product['Product']['name']; ?>" />					
				</p>
				<p>
					<div class="well well_popup">
						<div class="prod_desc">
							<p><?php echo ucfirst($product['Product']['name']); ?></p>
							<?php if(!empty($product['Product']['weight'])) { echo '<p>'.$product['Product']['weight'].' gm </p>'; }?>
							<?php if(!empty($product['Product']['size'])) { echo '<p>'.$product['Product']['size'].' cm</p>'; }?>
							<p><?php echo $product['Product']['description'];?></p>
						</div>	
						<div class="prod_add_cart">
							<p>RM <?php echo $product['Product']['price']; ?></p>
							<p><?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'add'))); ?>
							<?php echo $this->Form->input('id', array('type' => 'hidden', 'value' => $product['Product']['id'])); ?>
							<?php echo $this->Form->button('<i class="icon-shopping-cart icon-white"></i> Add to Cart', array('class' => 'btn btn-primary addtocart', 'id' => $product['Product']['id'], 'escape' => false));?>
							</p>				
						</div>
					</div>
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<?php
endforeach;
?>
<?php else: ?>

<h3>No Results</h3>

<?php endif; ?>
<?php endif; ?>

