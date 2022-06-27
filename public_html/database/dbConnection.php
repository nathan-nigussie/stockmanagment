<?php

class Database
{
    private $con;
    public function connect()
    {
        include_once "constants.php";
        $this->con = new mysqli(HOST, USER, PASS, DB);
        if ($this->con) {
            return $this->con;
        }
        return "data Base connection failed!";
    }
}
$db = new Database();
$db->connect();

?>