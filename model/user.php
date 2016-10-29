<?php
require_once('utils/dbhandler.php');
/** 
* user class
* The purpose of this class is to manage CRUD operations for user table
*/
class User {
	/**
	* @var int
	*/
	private $id;
	/**
	* @var string
	*/
	private $firstName;
	/**
	* @var string
	*/
	private $lastName;
	/**
	* @var string
	*/
	private $email;
	/**
	* @var BCRYPT
	*/
	private $password;

	/**
	* obtain records for all users or a specific user
	* @param $id user_id if any
	* return array
	*/
	public function read($id=NULL) {
		$sql = "SELECT * FROM user";
		$parameters = array();

		if (is_int($id)) {
			$sql .= " WHERE user_id = :user_id";
			$parameters[':user_id'] = $id;
		}
		$db = new DBHandler();
		$stmt = $db->getInstance()->prepare($sql);
		$stmt->execute($parameters);
		return  $stmt->fetchAll();
	}

	public function create($firstName, $lastName, $email, $password) {
		$db = new DBHandler();

		return $db->lastInsertId();
	}

	public function update($id, $firstName, $lastName, $email, $password = null) {

		$sql = "UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email";
		$parameters = array(
			':first_name' => $firstName,
			':last_name' => $lastName,
			':email' => $email,
		);

		if (!is_null($password)) {
			$sql .= ", password = :password";
			$parameters[':password'] = $password;
		}

		$sql .= ' WHERE user_id = :user_id';
		$parameters[':user_id'] = $id;

		try {
			$db = new DBHandler();
			$stmt = $db->getInstance()->prepare($sql);
			$stmt->execute($parameters);	
		} catch (PDOException $e) {
			echo $e->getMessage();
			exit;
		}
		
	}	

}