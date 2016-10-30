<?php

/** 
* DBHandler class
* The purpose of this class is to provide PDO object for database connectivity
*/
class DBHandler
{
    private $db;

    /**
    * Constructor
    * @param $user database user name
    * @param $password database password
    * return nothing
    */
    function __construct($user="my_app", $password="secret")
    {
        $this->connect_database($user, $password);
    }

    /**
    * get database instance
    * return object
    */
    public function getInstance()
    {
        return $this->db;
    }

    /**
    * establish database connection
    * @param $user database user name
    * @param $password database password
    * return object
    */
    private function connect_database($user, $password)
    {
        try {
            $connection_string = 'mysql:host=localhost;dbname=formstack_exercise;charset=utf8';
            $connection_array = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );
            $this->db = new PDO($connection_string, $user, $password, $connection_array);
        } catch(PDOException $e) {
            echo $e->getMessage();
            $this->db = null;
        }
    }   
}

?>