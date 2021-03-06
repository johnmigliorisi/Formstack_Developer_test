<?php
require_once('utils/dbhandler.php');

/** 
* user class
* The purpose of this class is to manage CRUD operations for user table
*/
class User 
{
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
    public function read($id = null)
    {
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

    /**
    * delete a user record
    * @param $id user_id
    * return nothing
    */
    public function remove($id)
    {
        $sql = "DELETE FROM user WHERE user_id = :user_id";
        $parameters = array(
            ':user_id' => $id,
        );
        try {   
            $db = new DBHandler();
            $stmt = $db->getInstance()->prepare($sql);
            $stmt->execute($parameters);
            //return $db->lastInsertId();   
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
    * create new user record
    * @param $firstName first_name
    * @param $lastName last_name
    * @param $email email
    * @param $password password
    * return nothing
    */
    public function create($firstName, $lastName, $email, $password)
    {
        $id = null;
        $sql = "INSERT INTO user (
            user_id,
            first_name,
            last_name,
            email,
            password
        )
        VALUES (
            :user_id,
            :first_name,
            :last_name,
            :email,
            :password
        )";
        $parameters = array(
        ':user_id' => $id,
        ':first_name' => $firstName,
        ':last_name' => $lastName,
        ':email' => $email,
        ':password' => $password,
        );
        try {   
            $db = new DBHandler();
            $stmt = $db->getInstance()->prepare($sql);
            $stmt->execute($parameters);
            //return $db->lastInsertId();   
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        
    }

    /**
    * update specific user record
    * @param $id user_id
    * @param $firstName first_name
    * @param $lastName last_name
    * @param $email email
    * @param $password password
    * return nothing
    */
    public function update($id, $firstName, $lastName, $email, $password = null)
    {
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