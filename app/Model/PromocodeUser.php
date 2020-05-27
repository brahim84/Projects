<?php
App::uses('AppModel', 'Model');
/**
 * PromocodeUser Model
 *
 * @property Promocode $Promocode
 * @property User $User
 * @property Order $Order
 */
class PromocodeUser extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Promocode' => array(
			'className' => 'Promocode',
			'foreignKey' => 'promocode_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
