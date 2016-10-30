<?php
require_once('model/user.php');

require_once('PHPUnit/Framework/TestCase.php');

/** 
* UserTest class
* The purpose of this class is to allow us to implement PhPUnit
*/
class UserTest extends TestCase
{
    private $user;
    /**
    * instantitate User class
    * return nothing
    */
    public static function setUpBeforeClass()
    {
        $user = new User();
    }

    /**
    * for PhPUnit - I'm not 100% clear beyond the obvious described by the name
    * return nothing
    */
    public static function tearDownAfterClass()
    {

    }

    /**
    * for PhPUnit - I'm not 100% clear beyond the obvious described by the name
    * return nothing
    */
    public static function setUp()
    {

    }

    /**
    * for PhPUnit - I'm not 100% clear beyond the obvious described by the name
    * return nothing
    */
    public static function tearDown()
    {

    }

    /**
    * execute a test
    * return object
    */
    public function test_findUser ()
    {
        $result = $user->read(1);
        $this->assertEquals(count($result), 1);
        $result = $user->read(rand(100, 3000));
        $this->assertEquals(count($result), 1);
    }
}