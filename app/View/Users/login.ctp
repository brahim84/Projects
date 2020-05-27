<h1>Login</h1>
<br />
<?php echo $this->Form->create('Login', array('url' => array('controller' => 'Users', 'action' => 'login'))); ?>
<?php echo $this->Form->input('username', array('autofocus' => 'autofocus')); ?>
<br />
<?php echo $this->Form->input('password'); ?>
<br />
<?php echo $this->Form->button('Login', array('class' => 'btn')); ?>
<?php echo $this->Form->end(); ?>
<br />
