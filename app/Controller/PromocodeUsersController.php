<?php
App::uses('AppController', 'Controller');
/**
 * PromocodeUsers Controller
 *
 * @property PromocodeUser $PromocodeUser
 */
class PromocodeUsersController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->PromocodeUser->recursive = 0;
		$this->set('promocodeUsers', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->PromocodeUser->exists($id)) {
			throw new NotFoundException(__('Invalid promocode user'));
		}
		$options = array('conditions' => array('PromocodeUser.' . $this->PromocodeUser->primaryKey => $id));
		$this->set('promocodeUser', $this->PromocodeUser->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->PromocodeUser->create();
			if ($this->PromocodeUser->save($this->request->data)) {
				$this->Session->setFlash(__('The promocode user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocode user could not be saved. Please, try again.'));
			}
		}
		$promocodes = $this->PromocodeUser->Promocode->find('list');
		$users = $this->PromocodeUser->User->find('list');
		$orders = $this->PromocodeUser->Order->find('list');
		$this->set(compact('promocodes', 'users', 'orders'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->PromocodeUser->exists($id)) {
			throw new NotFoundException(__('Invalid promocode user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PromocodeUser->save($this->request->data)) {
				$this->Session->setFlash(__('The promocode user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocode user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PromocodeUser.' . $this->PromocodeUser->primaryKey => $id));
			$this->request->data = $this->PromocodeUser->find('first', $options);
		}
		$promocodes = $this->PromocodeUser->Promocode->find('list');
		$users = $this->PromocodeUser->User->find('list');
		$orders = $this->PromocodeUser->Order->find('list');
		$this->set(compact('promocodes', 'users', 'orders'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->PromocodeUser->id = $id;
		if (!$this->PromocodeUser->exists()) {
			throw new NotFoundException(__('Invalid promocode user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PromocodeUser->delete()) {
			$this->Session->setFlash(__('Promocode user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Promocode user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->PromocodeUser->recursive = 0;
		$this->set('promocodeUsers', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PromocodeUser->exists($id)) {
			throw new NotFoundException(__('Invalid promocode user'));
		}
		$options = array('conditions' => array('PromocodeUser.' . $this->PromocodeUser->primaryKey => $id));
		$this->set('promocodeUser', $this->PromocodeUser->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PromocodeUser->create();
			if ($this->PromocodeUser->save($this->request->data)) {
				$this->Session->setFlash(__('The promocode user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocode user could not be saved. Please, try again.'));
			}
		}
		$promocodes = $this->PromocodeUser->Promocode->find('list');
		$users = $this->PromocodeUser->User->find('list');
		$orders = $this->PromocodeUser->Order->find('list');
		$this->set(compact('promocodes', 'users', 'orders'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PromocodeUser->exists($id)) {
			throw new NotFoundException(__('Invalid promocode user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->PromocodeUser->save($this->request->data)) {
				$this->Session->setFlash(__('The promocode user has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocode user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PromocodeUser.' . $this->PromocodeUser->primaryKey => $id));
			$this->request->data = $this->PromocodeUser->find('first', $options);
		}
		$promocodes = $this->PromocodeUser->Promocode->find('list');
		$users = $this->PromocodeUser->User->find('list');
		$orders = $this->PromocodeUser->Order->find('list');
		$this->set(compact('promocodes', 'users', 'orders'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PromocodeUser->id = $id;
		if (!$this->PromocodeUser->exists()) {
			throw new NotFoundException(__('Invalid promocode user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->PromocodeUser->delete()) {
			$this->Session->setFlash(__('Promocode user deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Promocode user was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	public function checkPromoValidity() {
		
		$this->autoRender = false;
		$this->loadModel('Promocode');
 		$options = array('conditions' => array('Promocode.code' => $this->request->data['code'],'Promocode.active'=>1));
		$res = $this->Promocode->find('first', $options);
		if(count($res)>0){
			$this->PromocodeUser->recursive = 0;
			$user = $this->PromocodeUser->find('first',array('conditions' => array('PromocodeUser.user_id' => $this->Session->read('Auth.User.User.id'),'Promocode.code' => $this->request->data['code'])));
			if(count($user)>0){
				echo json_encode(array('result'=>'1','discount'=>'0'));
			}else {
				echo json_encode(array('result'=>'2','discount'=>$res['Promocode']['discount'],'promocode_id'=>$res['Promocode']['id']));
			}
		}else{
			echo json_encode(array('result'=>'3','discount'=>'0'));
		}
	}	
	
	
}
