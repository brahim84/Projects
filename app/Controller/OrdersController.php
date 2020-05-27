<?php
App::uses('AppController', 'Controller');
class OrdersController extends AppController {


	public function admin_index() {
		$this->Order->recursive = 0;
 		$this->paginate = array(
		'order' => array('Order.id'=>'desc')
		);			
		$this->set('orders', $this->paginate());
	}
	public function admin_view($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('first', array(
			'recursive' => 1,
			'conditions' => array(
				'Order.id' => $id
			)
		));
		$this->set(compact('order'));
	}
	public function admin_edit($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('The order has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Order->read(null, $id);
		}
	}

	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		if ($this->Order->delete()) {
			$this->Session->setFlash(__('Order deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Order was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
	
	
	public function admin_dealer_orders() {
		$this->Order->recursive = 0;
 		$this->paginate = array(
		'conditions' => array('Order.user_id'=>$this->Auth->User('User.id')),
		'order' => array('Order.id'=>'desc')
		);	
		
		$this->set('orders', $this->paginate());
	}
	public function admin_dealer_view($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('first', array(
			'recursive' => 1,
			'conditions' => array(
				'Order.id' => $id
			)
		));
		$this->set(compact('order'));
	}	
	
	public function admin_payment_history() {
		$this->Order->recursive = 0;
 		$this->paginate = array(
		'order' => array('Order.id'=>'desc')
		);			
		$this->set('orders', $this->paginate());
	}
	public function admin_payment_details($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('first', array(
			'recursive' => 0,
			'conditions' => array(
				'Order.id' => $id
			),
			'contain' => array('User'=>array('Login'),'OrderItem')
		));
		$this->set(compact('order'));
	}
	public function admin_resubmit_request($id=null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}	
		$data = array();
		$data['Order']['id'] = $id;
		$data['Order']['resubmit'] = '1';
		if($this->Order->save($data)){
			$order = $this->Order->find('first', array(
				'recursive' => 1,
				'conditions' => array(
					'Order.id' => $id
				)
			));
			$Email = new CakeEmail();
			$Email->from($this->adminUser['User']['email']);
			$Email->to($order['User']['email']);
			$Email->subject(Configure::read('Settings.RESUBMIT_REQUEST_EMAIL_SUBJECT').' for the Order #'.$order['Order']['id']);
			$Email->template('proof_resubmit_request');
			$Email->emailFormat('html');
			$Email->viewVars(array('order' => $order));
			$Email->send();
			$this->Session->setFlash(__('Status has been saved'),'flash_success');
			$this->redirect($this->referer());
		}else{
				$this->Session->setFlash(__('Status could not change. Please try again.'),'flash_error');
				$this->redirect($this->referer());			
		}
	}
	public function admin_resubmit_proof($id=null) {


		if ($this->request->is('post')) {


			if(!empty($this->request->data['Order']['proof']['name'])){ // For validation
				$proof = $this->request->data['Order']['proof'];
				$this->request->data['Order']['proof'] = $this->request->data['Order']['proof']['name'];
			}
			$this->Order->set($this->request->data);
			if($this->Order->validates()) {
				
				$ext = strtolower(pathinfo($proof['name'], PATHINFO_EXTENSION));
				$image_base64 = base64_encode(file_get_contents($proof['tmp_name']) );
				$image = 'data:image/'.$ext.';base64,'.$image_base64;	
				$order = array();
				$order['Order']['id'] = $id;
				$order['Order']['resubmit'] = 0;
				$order['Order']['proof'] = $image;
				$order['Order']['bank_name'] = $this->request->data['Order']['bank_name'];
				$order['Order']['account_name'] = $this->request->data['Order']['account_name'];
				$order['Order']['account_number'] = $this->request->data['Order']['account_number'];
				$order['Order']['reference_number'] = $this->request->data['Order']['reference_number'];				
				
				$save = $this->Order->saveAll($order, array('validate' => 'first'));
				if($save) {

					$Email = new CakeEmail();
					$Email->from($this->Session->read('Auth.User.User.email'));
					$Email->to($this->accountUser['User']['email']);
					$Email->subject(Configure::read('Settings.RESUBMIT_PROOF_EMAIL_SUBJECT').' for the Order #'.$order['Order']['id']);
					$Email->template('resubmit_proof');
					$Email->emailFormat('html');
					$Email->viewVars(array('order' => $order));
					$Email->attachments(array('PaymentProof.png'=>array('file'=>$proof['tmp_name'],'mimetype'=>'image/png')));
					$Email->send();						
						
					$this->Session->setFlash(__('Payment details has been saved.'),'flash_success');
					$this->redirect(array('action' => 'dealer_orders'));
					
				} else {
					$errors = $this->Order->invalidFields();
					$this->set(compact('errors'));
				}
			}
		}
	}

	public function admin_change_payment_status($id = null,$status = null){
		
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}	
		$data = array();
		$data['Order']['id'] = $id;
		if($status=='approve'){
			$data['Order']['status'] = '1';
			$data['Order']['payment_date'] = date('Y-m-d H:i:s',time());
		}else{
			$data['Order']['status'] = '0';
		}
		
		if($this->Order->save($data)){
 			$order = $this->Order->find('first', array(
				'recursive' => 1,
				'conditions' => array(
					'Order.id' => $id
				)
			));
			if($status=='approve'){
				$data['Order']['status'] = '1';
				
				$Email = new CakeEmail();
				$Email->from($this->adminUser['User']['email']);
				$Email->to($order['User']['email']);
				$Email->subject(Configure::read('Settings.CASH_TAX_INVOICE_EMAIL_SUBJECT').' - Order #'.$order['Order']['id']);
				$Email->template('cash_tax_invoice');
				$Email->emailFormat('html');
				$Email->viewVars(array('order' => $order));
				$Email->send();	
				$this->Session->setFlash(__('Status has been saved'),'flash_success');
			}
			$this->redirect($this->referer());			
		}else{
				$this->Session->setFlash(__('Status could not change. Please try again.'),'flash_error');
				$this->redirect($this->referer());			
		}		
	}
	public function admin_view_invoice($id = null) {
		$this->Order->id = $id;
		if (!$this->Order->exists()) {
			throw new NotFoundException(__('Invalid order'));
		}
		$order = $this->Order->find('first', array(
			'recursive' => 1,
			'conditions' => array(
				'Order.id' => $id
			)
		));
		$this->set(compact('order'));
	}	
	
	public function admin_export_orders() {
		$orders = $this->Order->find('all', array(
			'recursive' => 0,
		));
		$this->set(compact('orders'));
		$this->layout = false;
	}	

	public function post_feeds() {
		
		$this->accountUser['User']['email'] = array_merge(Configure::read('Settings.FIN_FRT_GROUP'),$this->accountUser['User']['email']);

		$this->layout = false;
		App::import('Vendor', 'PHPExcel', array('file' => 'PHPExcel/Classes/PHPExcel.php'));
		$fileName = "DealerPortalFeedFile_".date('dmYHis').'.xlsx';

		//prepare the records to be added on the excel file in an array
		$orders = $this->Order->find('all', array(
			'recursive' => 1,
			'conditions' => array(
				'Order.posted' => 0,
				'Order.status' => 1
			)			
		));	
		
		if(count($orders)>0){

			// Create new PHPExcel object
			$objPHPExcel = new PHPExcel();
			
			// Set document properties
			$objPHPExcel->getProperties()->setCreator("TIME")->setLastModifiedBy("TIME")->setTitle("Dealer Portal FeedFile")->setSubject("Dealer Portal FeedFile")->setDescription("TIME Dealer Portal FeedFile")->setKeywords("Dealer Portal FeedFile")->setCategory("Dealer Portal");

			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);

			// Add column headers
			$objPHPExcel->getActiveSheet()
					->setCellValue('A1', 'Document Number')
					->setCellValue('B1', 'Line Item Number')
					->setCellValue('C1', 'Document Date')
					->setCellValue('D1', 'Posting Date')
					->setCellValue('E1', 'Document Type')
					->setCellValue('F1', 'Company Code')
					->setCellValue('G1', 'Reference Document Number')
					->setCellValue('H1', 'Document Header Text')
					->setCellValue('I1', 'GL Account')
					->setCellValue('J1', 'Currency')
					->setCellValue('K1', 'Amount')
					->setCellValue('L1', 'Tax on sales/purchases code')
					->setCellValue('M1', 'Assignment')
					->setCellValue('N1', 'Text')
					->setCellValue('O1', 'Value Date')
					->setCellValue('P1', 'Cost Center')
					->setCellValue('Q1', 'Order')
					->setCellValue('R1', 'Network')
					->setCellValue('S1', 'Activity Number')
					->setCellValue('T1', 'WBS Element')
					->setCellValue('U1', 'Profit Center')
					->setCellValue('V1', 'PG')
					->setCellValue('W1', 'SBU')
					;

			//Put each record in a new cell
			$order_id = 1;
			$ii = 2;
			$order_ids = array();
			foreach($orders as $key => $order){
				$order_ids[]=$order['Order']['id'];
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$ii, $order_id);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$ii, 1);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$ii, date('d.m.Y',strtotime($order['Order']['created'])));
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$ii, date('d.m.Y',time()));
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$ii, 'SS');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$ii, '1020');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$ii, $order['Order']['reference_number']);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$ii, $fileName);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$ii, '145211');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$ii, 'MYR');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$ii, $order['Order']['total']);
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$ii, Configure::read('Settings.INVOICE_PREFIX').$order['Order']['id']);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$ii, $order['User']['name'].'-misc item');
				$ii++;
				$objPHPExcel->getActiveSheet()->setCellValue('A'.$ii, $order_id);
				$objPHPExcel->getActiveSheet()->setCellValue('B'.$ii, 2);
				$objPHPExcel->getActiveSheet()->setCellValue('C'.$ii, date('d.m.Y',strtotime($order['Order']['created'])));
				$objPHPExcel->getActiveSheet()->setCellValue('D'.$ii, date('d.m.Y',time()));
				$objPHPExcel->getActiveSheet()->setCellValue('E'.$ii, 'SS');
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$ii, '1020');
				$objPHPExcel->getActiveSheet()->setCellValue('G'.$ii, $order['Order']['reference_number']);
				$objPHPExcel->getActiveSheet()->setCellValue('H'.$ii, $fileName);
				$objPHPExcel->getActiveSheet()->setCellValue('I'.$ii, '610005');
				$objPHPExcel->getActiveSheet()->setCellValue('J'.$ii, 'MYR');
				$objPHPExcel->getActiveSheet()->setCellValue('K'.$ii, -($order['Order']['total']));	
				$objPHPExcel->getActiveSheet()->setCellValue('M'.$ii, Configure::read('Settings.INVOICE_PREFIX').$order['Order']['id']);
				$objPHPExcel->getActiveSheet()->setCellValue('N'.$ii, $order['User']['name'].'-misc item');
				$objPHPExcel->getActiveSheet()->setCellValue('P'.$ii, 'F20000');
				$objPHPExcel->getActiveSheet()->setCellValue('V'.$ii, 'COMM');
				$objPHPExcel->getActiveSheet()->setCellValue('W'.$ii, 'NSBU');				
				$order_id++;
				$ii++;
			}

			// Set worksheet title
			$objPHPExcel->getActiveSheet()->setTitle('Feedfile');		
			
			//save the file to the server (Excel5)
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
			$objWriter->save('feedfiles/'.$fileName);
			
			// Set order posted status to 1, after posting.
			$this->Order->updateAll(array('posted'=>1), array('Order.id'=>$order_ids));
			
			//Sending to Finance to load into SAP.
			$feedfile_date = date('d-m-Y',time());
			$Email = new CakeEmail();
			$Email->from($this->adminUser['User']['email']);
			$Email->to($this->accountUser['User']['email']);
			$Email->subject(Configure::read('Settings.FEEDFILE_EMAIL_SUBJECT').' '.$feedfile_date);
			$Email->template('feedfile');
			$Email->emailFormat('html');
			$Email->viewVars(array('feedfile_date' => $feedfile_date));
			$Email->attachments(array($fileName => array('file'=>WWW_ROOT.'feedfiles/'.$fileName,'mimetype'=>'application/vnd.ms-excel')));
			$Email->send();	
			
			echo 'Feed file successfully generated and sent to Finance team.';			
		
		}else{
			echo "No records found.";
		}
	}
}
