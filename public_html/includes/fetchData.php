<?php

//fetching products from our database
class fetchOperation
{
    private $con;
    function __construct()
    {
        include_once "./database/dbConnection.php";
        $db = new Database();
        $this->con = $db->connect();
    }

    public function getAllRecord()
    {
        $pre_stmt = $this->con->prepare(
            "SELECT id,sku,price,name,size,weight,productType,height,width,length FROM products ORDER BY productType"
        );
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            echo " <div id=\"no-Product-To-Display\"class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
            <strong>OOPS...NO Product To Display!</strong>
             <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                </button>
        </div>";
            error_reporting(E_ERROR | E_PARSE);
        }
    }
}
$fetch = new fetchOperation();

?>