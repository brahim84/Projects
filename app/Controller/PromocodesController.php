<?php
App::uses('AppController', 'Controller');
/**
 * Promocodes Controller
 *
 * @property Promocode $Promocode
 */
class PromocodesController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Promocode->recursive = 0;
 		$this->paginate = array(
		'order' => array('Promocode.id'=>'desc')
		);			
		$this->set('promocodes', $this->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Promocode->exists($id)) {
			throw new NotFoundException(__('Invalid promocode'));
		}
		$options = array('conditions' => array('Promocode.' . $this->Promocode->primaryKey => $id));
		$this->set('promocode', $this->Promocode->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Promocode->create();
			if ($this->Promocode->save($this->request->data)) {
				$this->Session->setFlash(__('The promocode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocode could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Promocode->exists($id)) {
			throw new NotFoundException(__('Invalid promocode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Promocode->save($this->request->data)) {
				$this->Session->setFlash(__('The promocode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The promocode could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Promocode.' . $this->Promocode->primaryKey => $id));
			$this->request->data = $this->Promocode->find('first', $options);
		}
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
		$this->Promocode->id = $id;
		if (!$this->Promocode->exists()) {
			throw new NotFoundException(__('Invalid promocode'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Promocode->delete()) {
			$this->Session->setFlash(__('Promocode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Promocode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
}
