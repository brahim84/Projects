<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<?php echo $this->Html->css(array('bootstrap.css', '//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css', 'admin.css', 'bootstrap-responsive.css','style.css')); ?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>

<?php echo $this->Html->script(array('bootstrap.min.js', 'admin.js')); ?>

<?php echo $this->App->js(); ?>

<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>
	<div class="navbar navbar-default noprint" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo Configure::read('Settings.DEALER_PORTAL_URL'); ?>"><img src="https://apps.time.com.my/timeportal/images/header/logo.png" alt="logo" class="logo-default" style="width:100px;"> </a>
			</div>
			<?php if($this->Session->read('Auth.User.Role.code')=='DS') { ?>
			<div class="header-title">
				<a href="<?php echo $this->webroot;?>"><?php echo Configure::read('Settings.SHOP_TITLE'); ?></a>			
			</div>	
			<?php } ?>
			<div class="nav-collapse">
				<ul class="nav">
				<?php if($this->Session->read('Auth.User.Role.code')=='DS') { ?>
				<li><?php echo $this->Html->link('Search', array('controller' => 'products', 'action' => 'search','admin'=>false)); ?></li>
				<li><?php echo $this->Html->link('Dealers Cart', array('controller' => 'shop', 'action' => 'cart','admin'=>false)); ?></li>	<?php } ?>			
				<?php
				if(!empty($menu_result)) {
				foreach($menu_result as $menu) { 
				?>
					<li>
						<a href="<?php echo $this->webroot.$menu['Menu']['href'];?>"><?php echo $menu['Menu']['label'];?></a>
					</li>
				<?php }
				}
				?>
				<!-- <li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Utils<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php //echo $this->Html->link('Menu 1', array('controller' => 'products', 'action' => 'csv', 'admin' => true)); ?></li>
						<li><?php //echo $this->Html->link('Menu 2', array('controller' => 'products', 'action' => 'csv', 'admin' => true)); ?></li>								
					</ul>
				</li>-->
				</ul>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i> <?php echo $this->Session->read('Auth.User.Role.label'); ?>
					<span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
					<?php if($this->Session->read('Auth.User.Role.code')=='AD') { ?>
					<li><?php echo $this->Html->link('Menu management', array('controller' => 'RoleMenus', 'action' => 'add', 'admin' => true)); ?></li>
					<li class="divider"></li>
					<li><?php echo $this->Html->link('Export Transactions', array('controller' => 'Orders', 'action' => 'export_orders', 'admin' => true)); ?></li>
					<li class="divider"></li>					
					<?php } ?>
					<li><a href="<?php echo $this->webroot;?>admin/Users/edit" ><i class="icon-edit"></i> Edit profile</a></li>	
					<li class="divider"></li>						
					<li><?php echo $this->Html->link('<i class=\'icon-off\'></i> Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('escape' => false)); ?></li>
					</ul>
				</div>				
			</div>
		</div>
	</div>
	<div class="container content" style="min-height:430px">

	<?php echo $this->Session->flash(); ?>
	<?php echo $this->fetch('content'); ?>
	<?php echo $this->element('sql_dump'); ?>

	<br />
	<br />
	</div>
	<div class="container">
		<footer class="noprint">
			<p>&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?></p>
		</footer>
	</div>
	

</body>
</html>

