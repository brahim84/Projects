<?php
class ManufacturerShell extends Shell {

	public $uses = array('Product', 'Manufacturer');

	public function main() {

		$manufacturers = $this->Product->find('all', array(
			'recursive' => -1,
			'fields' => array(
				'Product.id',
				'Product.manufacturer'
			),
			'conditions' => array(
				'Product.manufacturer >' => ''
			),
			'group' => array(
				'Product.manufacturer'
			),
			'order' => array(
				'Product.manufacturer' => 'ASC'
			),
		));

		foreach($manufacturers as $manufacturer) {

			$count = $this->Manufacturer->find('count', array(
				'recursive' => -1,
				'conditions' => array(
					'Manufacturer.name' => $manufacturer['Product']['manufacturer']
				)
			));

			if($count == 0) {
				$this->Manufacturer->create();
				$data['Manufacturer']['name'] = $manufacturer['Product']['manufacturer'];

				$data['Manufacturer']['slug'] = Inflector::slug(strtolower($manufacturer['Product']['manufacturer']), '-');

				$data['Manufacturer']['product_count'] = $this->Product->find('count', array(
					'conditions' => array(
						'Product.active' => 1,
						'Product.manufacturer' => $manufacturer['Product']['manufacturer'],
					)
				));

				$data['Manufacturer']['active'] = 1;

				$this->Manufacturer->save($data, false);
			}

		}

	}

}
