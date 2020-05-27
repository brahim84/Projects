<?php
App::uses('AppModel', 'Model');
class Login extends AppModel {

//////////////////////////////////////////////////
	public $useTable = 'login';
//////////////////////////////////////////////////

	public $belongsTo = array(
		'Role' => array(
			'className' => 'Role',
			'foreignKey' => 'role_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array(),
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'counterCache' => true,
			'counterScope' => array(),
		),		
	);
}
