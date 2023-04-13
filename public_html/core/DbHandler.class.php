<?php
include_once "../config/constants.php";
include_once "../model/product.class.php";

class DbHandler
{
    private $conn;
    public function __construct($servername, $username, $password, $dbname)
    {
        $this->conn = new mysqli("localhost", "root", "", "products");
        //$this->conn = new mysqli(HOST, USER, PASS, DB);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
            echo "failed";
        }

    }

    public function insertDVD(DVD $dvd)
    {

        $name = $dvd->getName();
        $price = $dvd->getPrice();
        $type = 'DVD';
        $size = $dvd->getSize();
        $sku = $dvd->getSku();

        //validate if the SKU is unique for DVD;
        $stmt = $this->conn->prepare("SELECT id FROM abiyu WHERE sku = ?");
        $stmt->bind_param('s', $sku);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "SKU already exists, cannot save product";
            return false;
            // saves DVD after checking the SKU is unique
        } else {
            $stmt = $this->conn->prepare('INSERT INTO abiyu (sku,name, price, type, size) VALUES (?,?, ?, ?, ?)');
            $stmt->bind_param('ssssi', $sku, $name, $price, $type, $size);
            $stmt->execute();
            $stmt->close();
        }if ($result) {
            // header(
            //     "Location:http://localhost/submition3/stockmanagment/public_html/view/addProduct.php"

            // );
        } else {
            error_reporting(E_ERROR | E_PARSE);
        }

    }

    public function insertFurniture(Furniture $furniture)
    {
        $sku = $furniture->getSku();
        $name = $furniture->getName();
        $price = $furniture->getPrice();
        $type = 'Furniture';
        $width = $furniture->getWidth();
        $length = $furniture->getLength();
        $height = $furniture->getHeight();

        //validate if the SKU is unique for Furniture;
        $stmt = $this->conn->prepare("SELECT id FROM abiyu WHERE sku = ?");
        $stmt->bind_param('s', $sku);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "SKU already exists, cannot save product";
            return false;
        } else {
            // saves furniture after checking the SKU is unique
            $stmt = $this->conn->prepare('INSERT INTO abiyu (sku,name, price, type,length,width,height) VALUES (?,?, ?, ?, ?,?,?)');
            $stmt->bind_param('ssisiii', $sku, $name, $price, $type, $length, $width, $height);
            $stmt->execute();
            $stmt->close();
        }if ($result) {
            header(
                "Location:http://localhost/submition3/stockmanagment/public_html/view/addProduct.php"

            );
        } else {
            error_reporting(E_ERROR | E_PARSE);
        }

    }

    public function insertBook(Book $book)
    {
        $sku = $book->getSku();
        $name = $book->getName();
        $price = $book->getPrice();
        $type = 'Book';
        $weight = $book->getWeight();

        //validate if the SKU is unique for Book;
        $stmt = $this->conn->prepare("SELECT id FROM abiyu WHERE sku = ?");
        $stmt->bind_param('s', $sku);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            echo "SKU already exists, cannot save product";
            return false;
        } else {
            // saves Book after checking the SKU is unique
            $stmt = $this->conn->prepare('INSERT INTO abiyu (sku,name, price, type, weight) VALUES (?, ?, ?, ?,?)');
            $stmt->bind_param('sssss', $sku, $name, $price, $type, $weight);
            $stmt->execute();
            $stmt->close();
            if ($result) {
                header(
                    "Location:http://localhost/submition3/stockmanagment/public_html/view/addProduct.php"

                );
            } else {
                error_reporting(E_ERROR | E_PARSE);
            }

        }

    }
    public function __destruct()
    {
        $this->conn->close();
    }

}
