<?php
include_once "../config/constants.php";

abstract class DbConnector
{
    public $con;
    public function setConnection()
    {
        $this->con = new mysqli(HOST, USER, PASS, DB);
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
        return "database connected";
    }
}