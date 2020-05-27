<?php
App::uses('Promocode', 'Model');

/**
 * Promocode Test Case
 *
 */
class PromocodeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.promocode',
		'app.promocode_user',
		'app.user',
		'app.login',
		'app.role',
		'app.order',
		'app.order_item'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Promocode = ClassRegistry::init('Promocode');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Promocode);

		parent::tearDown();
	}

}
