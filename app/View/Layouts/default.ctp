<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $title_for_layout; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php echo $this->Html->css(array('bootstrap.min.css', 'css.css', 'bootstrap-responsive.css','style.css')); ?>
<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/themes/smoothness/jquery-ui.css" />
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
<?php echo $this->Html->script(array('bootstrap.js', 'js.js')); ?>
<?php echo $this->App->js(); ?>
<?php echo $this->fetch('meta'); ?>
<?php echo $this->fetch('css'); ?>
<?php echo $this->fetch('script'); ?>
</head>
<body>

	<div class="wrap">

		<div class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="<?php echo Configure::read('Settings.DEALER_PORTAL_URL'); ?>"><img src="https://apps.time.com.my/timeportal/images/header/logo.png" alt="logo" class="logo-default" style="width:100px;"> </a>
				</div>
				<div class="header-title">
					<a href="<?php echo $this->webroot;?>"><?php echo Configure::read('Settings.SHOP_TITLE'); ?></a>			
				</div>
				<div class="nav-collapse">
					<ul class="nav">
						<?php if($this->Session->read('Auth.User.Role.code')=='DS') { ?>
						<li><?php echo $this->Html->link('Search', array('controller' => 'products', 'action' => 'search')); ?></li>
						<li><?php echo $this->Html->link('Dealers Cart', array('controller' => 'shop', 'action' => 'cart')); ?></li>
						<?php } ?>
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
						<?php if (!$this->Session->check('Auth.User')){ ?>
						<li><?php echo $this->Html->link('Login', array('controller' => 'Users', 'action' => 'login')); ?></li>	
						<?php } ?>
					</ul>
					
						<?php echo $this->Form->create('Product', array('type' => 'GET', 'class' => 'navbar-form pull-right', 'url' => array('controller' => 'products', 'action' => 'search'))); ?>
						<?php echo $this->Form->input('search', array('label' => false, 'div' => false, 'autocomplete' => 'off')); ?>
						<?php echo $this->Form->button('<i class="icon-search icon-white"></i> Search', array('div' => false, 'class' => 'btn btn-primary', 'escape' => false)); ?>
						<?php echo $this->Form->end(); ?>
					<?php if ($this->Session->check('Auth.User')){ ?>	
					
					<div class="btn-group pull-right">
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i> <?php echo $this->Session->read('Auth.User.Role.label'); ?>
						<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
						<li><a href="<?php echo $this->webroot;?>admin/Users/edit" ><i class="icon-edit"></i> Edit profile</a></li>
						<li class="divider"></li>						
						<li><?php echo $this->Html->link('<i class=\'icon-off\'></i> Logout', array('controller' => 'users', 'action' => 'logout', 'admin' => false), array('escape' => false)); ?></li>
						</ul>
					</div>							
					<?php } ?>		
				</div>
			</div>
		</div>
	</div>
	<div class="container" style="min-height:430px">

		<?php echo $this->Session->flash(); ?>
		<?php echo $this->fetch('content'); ?>
		<div id="msg"></div>
	</div>
	

	<div class="container">

		<div id="footer">
			<?php //echo $this->Html->link($this->Html->image('cake.power.gif', array('alt' => 'CakePHP', 'border' => 0)), 'http://www.cakephp.org/', array('target' => '_blank', 'escape' => false)); ?>
			<br />
			&copy; <?php echo date('Y'); ?> <?php echo env('HTTP_HOST'); ?>
			<br />
			<br />
			<?php echo $this->element('sql_dump'); ?>
			<br />
			<br />
		</div>

	</div>


</body>
</html>
