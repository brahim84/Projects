<?php
App::uses('AppController', 'Controller');
/**
 * RoleMenus Controller
 *
 * @property RoleMenu $RoleMenu
 * @property SecurityComponent $Security
 */
class RoleMenusController extends AppController {


	public function beforeFilter() {
		$user = $this->Auth->User();
		if($user['Role']['code']!='AD'){
			$this->Session->setFlash(__('You do not have the access to this page. Please, try again.'),'flash_success');
			$this->redirect('/Users/Login');
		}		
		parent::beforeFilter();
	}


/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->RoleMenu->recursive = 0;
		$this->paginate = array(
			'conditions' => array(
				'Menu.Portal' => Configure::read('Settings.PORTAL'),
			)
		);			
		$this->set('roleMenus', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->RoleMenu->exists($id)) {
			throw new NotFoundException(__('Invalid role menu'));
		}
		$options = array('conditions' => array('RoleMenu.' . $this->RoleMenu->primaryKey => $id));
		$this->set('roleMenu', $this->RoleMenu->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->RoleMenu->create();
			if ($this->RoleMenu->save($this->request->data)) {
				$this->Session->setFlash(__('The role menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role menu could not be saved. Please, try again.'));
			}
		}
		$menus = $this->RoleMenu->Menu->find('list',array('conditions'=>array('Menu.Portal'=>Configure::read('Settings.PORTAL'))));
		$roles = $this->RoleMenu->Role->find('list');
		$this->set(compact('menus', 'roles'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->RoleMenu->exists($id)) {
			throw new NotFoundException(__('Invalid role menu'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RoleMenu->save($this->request->data)) {
				$this->Session->setFlash(__('The role menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The role menu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RoleMenu.' . $this->RoleMenu->primaryKey => $id));
			$this->request->data = $this->RoleMenu->find('first', $options);
		}
		$menus = $this->RoleMenu->Menu->find('list',array('conditions'=>array('Menu.Portal'=>Configure::read('Settings.PORTAL'))));
		$roles = $this->RoleMenu->Role->find('list');
		$this->set(compact('menus', 'roles'));
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
		$this->RoleMenu->id = $id;
		if (!$this->RoleMenu->exists()) {
			throw new NotFoundException(__('Invalid role menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RoleMenu->delete()) {
			$this->Session->setFlash(__('Role menu deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Role menu was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
