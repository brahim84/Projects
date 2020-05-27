<div class="roleMenus index">
	<h2><?php echo __('Role Menus'); ?></h2>
	<table class="table-striped table-bordered table-condensed table-hover">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('role_id'); ?></th>
			<th><?php echo $this->Paginator->sort('menu_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($roleMenus as $roleMenu): ?>
	<tr>
		<td><?php echo h($roleMenu['RoleMenu']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($roleMenu['Role']['name'], array('controller' => 'roles', 'action' => 'view', $roleMenu['Role']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($roleMenu['Menu']['name'], array('controller' => 'menus', 'action' => 'view', $roleMenu['Menu']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $roleMenu['RoleMenu']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $roleMenu['RoleMenu']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $roleMenu['RoleMenu']['id']), null, __('Are you sure you want to delete # %s?', $roleMenu['RoleMenu']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
<?php echo $this->element('pagination-counter'); ?>
<div class="pagination">
<ul class="pagination">
	<?php
		echo $this->Paginator->prev(__('prev'), array('tag' => 'li'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '','currentTag' => 'a', 'currentClass' => 'active','tag' => 'li','first' => 1));
		echo $this->Paginator->next(__('next'), array('tag' => 'li','currentClass' => 'disabled'), null, array('tag' => 'li','class' => 'disabled','disabledTag' => 'a'));
	?>
</ul>
</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Role Menu'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Roles'), array('controller' => 'roles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Role'), array('controller' => 'roles', 'action' => 'add')); ?> </li>
	</ul>
</div>
