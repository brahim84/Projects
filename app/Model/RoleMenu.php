<?php
App::uses('AppModel', 'Model');
class RoleMenu extends AppModel {

//////////////////////////////////////////////////
	public $useTable = 'role_menu';
//////////////////////////////////////////////////

	public $belongsTo = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'menu_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		),
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true
		)		
	);
}
