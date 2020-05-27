<?php
/**
* Application level Controller
*
* This file is application-wide controller file. You can put all
* application-wide controller-related methods here.
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
* @package       app.Controller
* @since         CakePHP(tm) v 0.2.9
* @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
*/

App::uses('Controller', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
* Application Controller
*
* Add your application-wide methods in the class below, your controllers
* will inherit them.
*
* @package       app.Controller
* @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
*/
class AppController extends Controller {

////////////////////////////////////////////////////////////

	public $components = array(
		'Session',
		'Auth',
		//'DebugKit.Toolbar',
		//'Security',
	);
	public $adminUser;
	public $accountUser;

////////////////////////////////////////////////////////////

	public function beforeFilter() {
		
		if($this->params->url!='users/login'){
			$user = $this->Auth->User();
			if(!empty($user)){
				$this->checkRole($user['Role']['code'],$this->params->url);
				$menu_result = $this->getDealersMenuByRole($user['Role']['code']);
				$this->set('menu_result',$menu_result);				
			}
		}
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login', 'admin' => false);
		$this->Auth->loginRedirect = array('controller' => 'Users', 'action' => 'dashboard', 'admin' => true);
		$this->Auth->logoutRedirect = array('controller' => 'products', 'action' => 'index', 'admin' => false);

		$this->Auth->authenticate = array(
			AuthComponent::ALL => array(
				'userModel' => 'Login',
				'fields' => array(
					'username' => 'username',
					'password' => 'password'
				),
				'recursive' => 0,
				/* 'scope' => array(
					'User.active' => 1
				) */
			), 'Form'
		);

		if(isset($this->request->params['admin']) && ($this->request->params['prefix'] == 'admin')) {
			$this->layout = 'admin';
		} else {
			$this->Auth->allow();
		}
		
		$payment_status = array('0'=>'In progress','1'=>'Paid');
		$this->set('payment_status',$payment_status);
		$this->getAdminEmail();
		$this->getAccountEmail();

	}

////////////////////////////////////////////////////////////

	public function admin_switch($field = null, $id = null) {
		$this->autoRender = false;
		$model = $this->modelClass;
		if ($this->$model && $field && $id) {
			$field = $this->$model->escapeField($field);
			$this->Session->setFlash(__('Status has been saved'),'flash_success');
			return $this->$model->updateAll(array($field => '1 -' . $field), array($this->$model->escapeField() => $id));
		}
		if(!$this->RequestHandler->isAjax()) {
			$this->redirect($this->referer());
		}
	}

////////////////////////////////////////////////////////////

	public function admin_editable() {

		$model = $this->modelClass;

		$id = trim($this->request->data['pk']);
		$field = trim($this->request->data['name']);
		$value = trim($this->request->data['value']);

		$data[$model]['id'] = $id;
		$data[$model][$field] = $value;
		$this->$model->save($data, false);

		$this->autoRender = false;

	}
	public function checkRole($role_code=null,$action=null){
		
		$this->loadModel('Menu');
		$conditions = array(
			'Menu.href' => $action
		);		
		$menu_result = $this->Menu->find('all', array(
			'recursive' => -1,
			'conditions' => $conditions
		));	
		if(!empty($menu_result)) {

			$conditions = array();
			$this->loadModel('RoleMenu');
			$this->RoleMenu->recursive = 0;
			
			$conditions = array(
				'Menu.href' => $action,
				'Role.code' => $role_code
			);		
			$result = $this->RoleMenu->find('all', array(
				'recursive' => 0,
				'conditions' => $conditions
			));	
 			if(empty($result)){
				$this->Session->setFlash(__('You do not have the access to this page. Please, try again.'),'flash_success');
				$this->redirect('/Users/Login');
			}
		}	
	}
	
	public function getDealersMenuByRole($role_code=null){
		
		$this->loadModel('RoleMenu');
		//$visible = '"1"';
		$conditions = array(
			'Role.code' => $role_code,
			'Menu.Portal' => Configure::read('Settings.PORTAL'),
			'Menu.Parent_id' => '0'
		);			
		return $this->RoleMenu->find('all', array(
			'recursive' => 0,
			'conditions' => $conditions,
			'group' => array('Menu.name'),
			'order' => array('Menu.sequence'=>'ASC')
		));	
	}
	public function getAdminEmail(){
		
		$this->loadModel('Login');
		$conditions = array(
			'Role.code' => 'AD'
		);		
		$this->adminUser = $this->Login->find('first', array(
			'recursive' => 0,
			'conditions' => $conditions
		));	
	}
	public function getAccountEmail(){
		
		$this->loadModel('Login');
		$conditions = array(
			'Role.code' => 'AC'
		);		
		$users = $this->Login->find('all', array(
			'recursive' => 0,
			'conditions' => $conditions
		));	
		foreach($users as $user){
			if(!empty($user['User']['email']))
				$this->accountUser['User']['email'][] = $user['User']['email'];	
		}
	}	

}
