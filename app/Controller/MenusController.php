<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 */
class MenusController extends AppController {

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
		$this->Menu->recursive = 0;
		
		$this->paginate = array(
			'conditions' => array(
				'Menu.Portal' => Configure::read('Settings.PORTAL'),
			)
		);		
		
		$this->set('menus', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Menu->create();
			//$visible = $this->request->data['Menu']['visible'];
			//$id = $this->request->data['Menu']['id'];
			if(empty($this->request->data['Menu']['parent_id'])){
				$this->request->data['Menu']['parent_id'] = 0;
			}
			if ($this->Menu->save($this->request->data)) {
				//$this->Menu->query('update `dealers`.`menu` SET  `visible` = "'.$visible.'" where `dealers`.`menu`.`id` = '.$id);
				$this->Session->setFlash(__('The menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		}
		
		$parents = $this->Menu->find('list',array('conditions'=>array('Menu.parent_id'=>0,'Menu.portal'=>Configure::read('Settings.PORTAL'))));
		$this->set(compact('parents'));			
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			//$visible = $this->request->data['Menu']['visible'];
			//$id = $this->request->data['Menu']['id'];
			if ($this->Menu->save($this->request->data)) {
				//$this->Menu->query('update `dealers`.`menu` SET  `visible` = "'.$visible.'" where `dealers`.`menu`.`id` = '.$id);
				$this->Session->setFlash(__('The menu has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
			$this->request->data = $this->Menu->find('first', $options);
		}
		
		$parents = $this->Menu->find('list',array('conditions'=>array('Menu.parent_id'=>0,'Menu.portal'=>Configure::read('Settings.PORTAL'))));
		$this->set(compact('parents'));		
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
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('Menu deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Menu was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
