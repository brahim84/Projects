<?php
App::uses('AppController', 'Controller');
class ShopController extends AppController {

//////////////////////////////////////////////////

	public $components = array(
		'Cart'
	);

//////////////////////////////////////////////////

	public $uses = 'Product';

//////////////////////////////////////////////////

	public function beforeFilter() {
		if (!$this->Session->check('Auth.User')){
			$this->redirect(Configure::read('Settings.LOGIN_REDIRECT'));
		}			
		parent::beforeFilter();
		$this->disableCache();
		//$this->Security->validatePost = false;
	}

//////////////////////////////////////////////////

	public function clear() {
		$this->Cart->clear();
		$this->Session->setFlash('All item(s) removed from your shopping cart', 'flash_error');
		$this->redirect('/');
	}

//////////////////////////////////////////////////

	public function add() {
		if ($this->request->is('post')) {
			$id = $this->request->data['Product']['id'];
			$product = $this->Cart->add($id, 1);
		}
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was added to your shopping cart.', 'flash_success');
		}
		$this->redirect($this->referer());
	}

//////////////////////////////////////////////////

	public function itemupdate() {
		if ($this->request->is('ajax')) {
			$discount = (isset($this->request->data['discount']))?$this->request->data['discount']:0;
			$promocode_id = (isset($this->request->data['promocode_id']))?$this->request->data['promocode_id']:0;
			$this->Cart->add($this->request->data['id'], $this->request->data['quantity'],$discount,$promocode_id);
		}
		$cart = $this->Session->read('Shop');
		echo json_encode($cart);
		$this->autoRender = false;
	}

//////////////////////////////////////////////////

	public function update() {
		$this->Cart->update($this->request->data['Product']['id'], 1);
	}

//////////////////////////////////////////////////

	public function remove($id = null) {
		$product = $this->Cart->remove($id);
		if(!empty($product)) {
			$this->Session->setFlash($product['Product']['name'] . ' was removed from your shopping cart', 'flash_error');
		}
		$this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cartupdate() {
		if ($this->request->is('post')) {
			foreach($this->request->data['Product'] as $key => $value) {
				$p = explode('-', $key);
				$this->Cart->add($p[1], $value,null,$this->request->data['Product']['promocode_id']);
			}
			$this->Session->setFlash('Shopping Cart is updated.', 'flash_success');
		}
		$this->redirect(array('action' => 'cart'));
	}

//////////////////////////////////////////////////

	public function cart() {
		$shop = $this->Session->read('Shop');
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

	public function payment_proof() {

		$shop = $this->Session->read('Shop');
		
		if(empty($shop)) {
			$this->redirect('/');
		}
		if ($this->request->is('post')) {

			$this->loadModel('Order');


			if(!empty($this->request->data['Order']['proof']['name'])){ // For validation
				$proof = $this->request->data['Order']['proof'];
				$this->request->data['Order']['proof'] = $this->request->data['Order']['proof']['name'];
			}
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				
				$ext = strtolower(pathinfo($proof['name'], PATHINFO_EXTENSION));
				$image_base64 = base64_encode(file_get_contents($proof['tmp_name']) );
				$image = 'data:image/'.$ext.';base64,'.$image_base64;	
				$order = $shop;
				$order['Order']['status'] = 0;
				$order['Order']['resubmit'] = 0;
				$order['Order']['user_id'] = $this->Session->read('Auth.User.User.id');
				$order['Order']['proof'] = $image;
				$order['Order']['bank_name'] = $this->request->data['Order']['bank_name'];
				$order['Order']['account_name'] = $this->request->data['Order']['account_name'];
				$order['Order']['account_number'] = $this->request->data['Order']['account_number'];
				$order['Order']['reference_number'] = $this->request->data['Order']['reference_number'];
				$save = $this->Order->saveAll($order, array('validate' => 'first'));
				
				if($save) {

					$this->set(compact('shop'));
					$order['Order']['id'] = $this->Order->getLastInsertID();
					$order['Order']['created'] = date('d/m/Y',time());
					
					if(isset($shop['Order']['promocode_id']) && !empty($shop['Order']['promocode_id'])) {
						$this->loadModel('PromocodeUser');
						$this->PromocodeUser->create();
						$this->request->data['PromocodeUser']['promocode_id'] = $shop['Order']['promocode_id'];
						$this->request->data['PromocodeUser']['user_id'] = $this->Session->read('Auth.User.User.id');
						$this->request->data['PromocodeUser']['order_id'] = $order['Order']['id'];
						
						if (!$this->PromocodeUser->save($this->request->data)) {
							$this->Session->setFlash(__('This promocode could not be used. Please, try again.'));
						}	
					}
					
					App::uses('CakeEmail', 'Network/Email');
					$Email = new CakeEmail();
					$Email->from($this->adminUser['User']['email']);
					$Email->to($this->accountUser['User']['email']);
					$Email->subject(Configure::read('Settings.SUBMIT_PROOF_EMAIL_SUBJECT').' - Order #'.$order['Order']['id']);
					$Email->template('submit_proof');
					$Email->emailFormat('html');
					$Email->viewVars(array('order' => $order));
					$Email->attachments(array('PaymentProof.png'=>array('file'=>$proof['tmp_name'],'mimetype'=>'image/png')));
					$Email->send();		


					$Email = new CakeEmail();
					$Email->from($this->adminUser['User']['email']);
					$Email->to($this->Session->read('Auth.User.User.email'));
					$Email->subject(Configure::read('Settings.ORDER_CONFIRMATION_SUBJECT').' - Order #'.$order['Order']['id']);
					$Email->template('order_confirmation');
					$Email->emailFormat('html');
					$Email->viewVars(array('order' => $order));
					$Email->send();		
					
						
					$this->redirect(array('action' => 'success'));
					
				} else {
					$errors = $this->Order->invalidFields();
					$this->set(compact('errors'));
				}
			}
		}
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

	public function success() {
		$shop = $this->Session->read('Shop');
		$this->Cart->clear();
		if(empty($shop)) {
			$this->redirect('/');
		}
		$this->set(compact('shop'));
	}

//////////////////////////////////////////////////

}
