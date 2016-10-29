<?php
class DBHandler {
    private $db;

    function __construct($user="my_app", $password="secret") {
        $this->connect_database($user, $password);
    }

    public function getInstance() {
        return $this->db;
    }

    private function connect_database($user, $password) {

        // Database connection
        try {
            $connection_string = 'mysql:host=localhost;dbname=formstack_exercise;charset=utf8';
            $connection_array = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            $this->db = new PDO($connection_string, $user, $password, $connection_array);
            // echo 'Database connection established';
        }
        catch(PDOException $e) {
            echo $e->getMessage();
            $this->db = null;
        }
    }   
}

?>