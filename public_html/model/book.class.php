<?php
include_once "../core/database.php";
include_once "../controller/interface.php";
include_once "../config/constants.php";

class book extends DbConnector implements tasks
{

    public function __construct($sku, $name, $price, $weight)
    {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }

    public function insert()
    {
        $pre_stmt = $this->con->prepare(
            "INSERT INTO `book`(`sku`, `name`, `price`, `weight`) VALUES (?,?,?,?)"
        );
        $pre_stmt->bind_param(
            "ssis",
            $this->sku,
            $this->name,
            $this->price,
            $this->weight,
        );
        $result = $pre_stmt->execute() or die($this->con->error);
        if ($result) {
            header(
                "Location:http://localhost/STOCKMANAGEMENT/public/view/index.php"
            );

        } else {
            exit();

        }
    }

    public function deleteRecord()
    {
        $con = new mysqli(HOST, USER, PASS, DB);
        if (isset($_POST["mass-delete-products-btn"])) {
            $all_id = $_POST["product-delete-id"];
            $extract_id = implode(",", $all_id);
            $query = "DELETE FROM book WHERE id  IN($extract_id)";
            $query_run = mysqli_query($con, $query);
            if ($query_run) {
                // $_SESSION["status"] = " <div id=\"delete-success-msg\"   class=\"alert alert-success\" role=\"alert\"><strong>Data Deleted Successfully</strong></div>";
                header(
                    "Location:http://localhost/stockmanagement/public/view/index.php"
                );
            } else {
                //    $_SESSION["status"] =
                //         " <div id=\"warning-notice\" class=\"alert alert-success\" role=\"alert\"><strong>Please select a product to handle delete operation!</strong></div>";
                header(
                    "Location:http://localhost/stockmanagement/public/view/index.php"
                );
            }
        }
    }
    public function getBook()
    {
        $con = $this->setConnection();
        $pre_stmt = $this->con->prepare("SELECT id,sku,price,name,weight FROM book");
        $pre_stmt->execute() or die($this->con->error);
        $result = $pre_stmt->get_result();
        $rows = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rows[] = $row;
            }
            return $rows;
        } else {
            error_reporting(E_ERROR | E_PARSE);
        }
    }

}
