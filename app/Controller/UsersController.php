<?php
App::uses('AppController', 'Controller');
class UsersController extends AppController {

////////////////////////////////////////////////////////////
	public $components = array('Cart');		
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('login');
	}

////////////////////////////////////////////////////////////

	public function login() {
		$this->redirect(Configure::read('Settings.DEALER_PORTAL_LOGIN_URL'));
/* 		if ($this->request->is('post')) {
  			if($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash('Login is incorrect');
			}
		} */
	}

////////////////////////////////////////////////////////////
	public function dealer_login($username=null){

		$this->loadModel('Login');
		$conditions = array(
			'Login.username' => base64_decode($username),
			//'Login.password' => $password,
		);		
		$user = $this->Login->find('first', array(
			'recursive' => 0,
			'conditions' => $conditions
		));	
		if(!empty($user)){
			$dealer = $user['Login'];
			$dealer['Role']=$user['Role'];
			$dealer['User']=$user['User'];
			$this->Auth->login($dealer);
			$this->Session->setFlash('Successfully Authorized.','flash_success');
			$this->redirect('/');	
		}else{
			$this->Session->setFlash('Authorization Failed. Please login again.','flash_error');
			$this->redirect($this->Auth->logout());	
		}

		
	}
	public function logout() {
		$this->Session->setFlash('Good-Bye');
		$this->Auth->logout();
		$this->Cart->clear();
		$this->redirect(Configure::read('Settings.DEALER_PORTAL_LOGIN_URL'));
	}

////////////////////////////////////////////////////////////

	public function admin_dashboard() {
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		$user = $this->Auth->User();
		$this->User->id = $user['User']['id'];
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'),'flash_success');
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'),'flash_error');
			}
		} else {
			$this->request->data = $this->User->read(null, $id);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}
