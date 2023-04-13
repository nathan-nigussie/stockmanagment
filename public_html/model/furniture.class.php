<?php
include_once "../core/DbHandler.class.php";
include_once "../config/constants.php";
include_once "../controller/post.php";


class Furniture extends Product
{
    protected $width;
    protected $length;
    protected $height;
    public function __construct($sku, $name, $price, $type, $length, $width, $height)
    {
        parent::__construct($sku, $name, $price, $type);

        $this->length = $length;
        $this->width = $width;

        $this->height = $height;

    }
    public function getLength()
    {
        return $this->length;
    }
    public function getHeight()
    {
        return $this->height;
    }

    public function getWidth()
    {
        return $this->width;
    }
    public function saveToDatabase(DbHandler $dbHandler)
    {
        $dbHandler->insertFurniture($this);
    }
}

//     public function deleteRecord()
//     {
//         $con = new mysqli(HOST, USER, PASS, DB);
//         if (isset($_POST["mass-delete-products-btn"])) {
//             $all_id = $_POST["product-delete-id"];
//             $extract_id = implode(",", $all_id);

//             $query = "DELETE FROM furniture WHERE id  IN($extract_id)";

//             $query_run = mysqli_query($con, $query);

//             if ($query_run) {
//                 // $_SESSION["status"] =
//                 //     " <div id=\"delete-success-msg\"   class=\"alert alert-success\" role=\"alert\"><strong>Data Deleted Successfully</strong></div>";
//                 header(
//                     "Location:http://localhost/stockmanagement/public/view/index.php"
//                 );
//             } else {
//                 // $_SESSION["status"] =
//                 //     " <div id=\"warning-notice\" class=\"alert alert-success\" role=\"alert\"><strong>Please select a product to handle delete operation!</strong></div>";
//                 header(
//                     "Location:http://localhost/stockmanagement/public/view/index.php"
//                 );
//             }
//         }
//     }
//     public function getFurniture()
//     {
//         $con = $this->setConnection();
//         $pre_stmt = $this->con->prepare("SELECT id,sku,price,name,height,length,width FROM furniture");
//         $pre_stmt->execute() or die($this->con->error);
//         $result = $pre_stmt->get_result();
//         $rows = [];
//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $rows[] = $row;
//             }
//             return $rows;
//         } else {
//             error_reporting(E_ERROR | E_PARSE);
//         }
//     }

// }