<?php
require_once('model/user.php');

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {
	private $user;
	public static function setUpBeforeClass () {
		$user = new User();
	}

	public static function tearDownAfterClass (){}

	public static function setUp () {}

	public static function tearDown () {}

	public function test_findUser () {
		$result = $user->read(1);
		$this->assertEquals(count($result), 1);

		$result = $user->read(rand(100, 3000));
		$this->assertEquals(count($result), 1);
	}
}