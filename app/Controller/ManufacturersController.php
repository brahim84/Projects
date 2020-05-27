<?php
App::uses('AppController', 'Controller');
class ManufacturersController extends AppController {

////////////////////////////////////////////////////////////

	public function index() {
		$manufacturers = $this->Manufacturer->find('all', array(
			'recursive' => -1,
			'conditions' => array(
				'Manufacturer.active' => 1
			),
			'order' => array(
				'Manufacturer.name' => 'ASC'
			)
		));
		$this->set(compact('manufacturers'));
	}

////////////////////////////////////////////////////////////

	public function view($slug = null) {
		$manufacturer =  $this->Manufacturer->find('first', array(
			'contain' => array('Product'),
			'conditions' => array(
				'Manufacturer.active' => 1,
				'Manufacturer.slug' => $slug
			)
		));
		if(empty($manufacturer)) {
			$this->redirect(array('action' => 'index'));
		}
		$this->set(compact('manufacturer'));
	}

////////////////////////////////////////////////////////////

	public function admin_index() {
		$this->Manufacturer->recursive = -1;
		$this->set('manufacturers', $this->paginate());
	}

////////////////////////////////////////////////////////////

	public function admin_view($id = null) {
		if (!$this->Manufacturer->exists($id)) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		$options = array('conditions' => array('Manufacturer.' . $this->Manufacturer->primaryKey => $id));
		$this->set('manufacturer', $this->Manufacturer->find('first', $options));
	}

////////////////////////////////////////////////////////////

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Manufacturer->create();
			if ($this->Manufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
			}
		}
	}

////////////////////////////////////////////////////////////

	public function admin_edit($id = null) {
		if (!$this->Manufacturer->exists($id)) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Manufacturer->save($this->request->data)) {
				$this->Session->setFlash(__('The manufacturer has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The manufacturer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Manufacturer.' . $this->Manufacturer->primaryKey => $id));
			$this->request->data = $this->Manufacturer->find('first', $options);
		}
	}

////////////////////////////////////////////////////////////

	public function admin_delete($id = null) {
		$this->Manufacturer->id = $id;
		if (!$this->Manufacturer->exists()) {
			throw new NotFoundException(__('Invalid manufacturer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Manufacturer->delete()) {
			$this->Session->setFlash(__('Manufacturer deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Manufacturer was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

////////////////////////////////////////////////////////////

}