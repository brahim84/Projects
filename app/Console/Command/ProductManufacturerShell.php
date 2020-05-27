<?php
class ProductManufacturerShell extends Shell {

	public $uses = array('Product', 'Manufacturer');

	public function main() {

		$products = $this->Product->find('all');

		print_r($products);

		foreach($products as $product) {
			$d['Product']['id'] = $product['Product']['id'];
			$mid = $this->Manufacturer->field('id', array('name' => $product['Product']['manufacturer']));
			$d['Product']['manufacturer_id'] = $mid;
			print_r($d);
			$this->Product->save($d, false);
		}

	}

}
