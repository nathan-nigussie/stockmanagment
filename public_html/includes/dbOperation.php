<?php

//add product to database

class DbOperation
{
    private $con;

    function __construct()
    {
        include_once "./database/dbConnection.php";
        $db = new Database();
        $this->con = $db->connect();
    }

    public function addProduct(
        $sku,
        $name,
        $price,
        $productType,
        $size,
        $weight,
        $length,
        $width,
        $height
    ) {
        $pre_stmt = $this->con->prepare(
            "INSERT INTO `products`(`sku`, `name`, `price`,`productType`, `size`,`weight`,`height`,`length`,`width`) VALUES (?,?,?,?,?,?,?,?,?)"
        );
        $pre_stmt->bind_param(
            "ssdsiiiii",
            $sku,
            $name,
            $price,
            $productType,
            $size,
            $weight,
            $height,
            $length,
            $width
        );
        ($result = $pre_stmt->execute()) or die($this->con->error);
        if ($result) {
            header(
                "Location: http://localhost/stock-management/stock-management-/public_html/index.php"
            );
            exit();
        } else {
            echo "Error during Product saving";
        }
    }
}

$opr = new DbOperation();

?>