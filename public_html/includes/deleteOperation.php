<?php

//delete product records
session_start();
require_once "../database/dbConnection.php";
require_once "fetchData.php";

$con = mysqli_connect("localhost", "root", "", "stocks");

if (isset($_POST["mass-delete-products-btn"])) {
    $all_id = $_POST["product-delete-id"];
    $extract_id = implode(",", $all_id);
    echo $extract_id;
    $query = "DELETE FROM products WHERE id  IN($extract_id)";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION["status"] =
            " <div id=\"delete-success-msg\"   class=\"alert alert-success\" role=\"alert\"><strong>Data Deleted Successfully</strong></div>";
        header(
            "Location:http://localhost/stock-management/stock-management-/public_html/index.php"
        );
    } else {
        $_SESSION["status"] =
            " <div id=\"warning-notice\" class=\"alert alert-success\" role=\"alert\"><strong>Please select a product to handle delete operation!</strong></div>";
        header(
            "Location:http://localhost/stock-management/stock-management-/public_html/index.php"
        );
    }
}

?>
