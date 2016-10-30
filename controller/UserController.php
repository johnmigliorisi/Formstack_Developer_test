<?php

require_once ('model/User.php');

/** 
* UserController class
* The purpose of this class is to provide CRUD operation functionality
*/
class UserController
{
    /**
    * obtain records for all users or a specific user
    * @param $id user_id if any
    * return array
    */
    public function find($id=null)
    {
    $userObj = new User();
    $results = $userObj->read($id);
    if (!$results) {
        return array();
    }
    $users = array();
    foreach ($results as $result) {
        $user = array(
        'id' => $result['user_id'],
        'firstName' => $result['first_name'],
        'lastName' => $result['last_name'],
        'email' => $result['email'],
        );
        $users[] = $user;
    }
    return $users;
}

    /**
    * edit record for a specific user
    * @param $id user_id
    * @param $firstName first_name
    * @param $lastName last_name
    * @param $email email
    * @param $password password
    * return array
    */
    public function edit($id, $firstName, $lastName, $email, $password = null)
    {
        $userObj = new User();
        $userObj->update($id, $firstName, $lastName, $email, $password);
        return $id;
    }
}