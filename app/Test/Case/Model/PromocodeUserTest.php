<?php
App::uses('PromocodeUser', 'Model');

/**
 * PromocodeUser Test Case
 *
 */
class PromocodeUserTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.promocode_user',
		'app.promocode',
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
		$this->PromocodeUser = ClassRegistry::init('PromocodeUser');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PromocodeUser);

		parent::tearDown();
	}

}
