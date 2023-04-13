<?php
include_once '../autoLoader/classAutoLoader.php';
include_once '../core/DbHandler.class.php';
include_once '../validation/FormValidator.class.php';

session_start();

if (($_SERVER["REQUEST_METHOD"] == "POST")) {

  $_SESSION['sku'] = $_POST['sku'];
    $_SESSION['product_type'] = $_POST['product_type'];
    $_SESSION['name'] = $_POST["name"];
    $_SESSION['price'] = $_POST["price"];
    $_SESSION['size'] = isset($_POST["size"]) && $_POST["size"] ?? null;
    $_SESSION['weight'] = isset($_POST["weight"]) && $_POST["weight"] ?? null;
    $_SESSION['height'] = isset($_POST["height"]) && $_POST["height"] ?? null;
    $_SESSION['length'] = isset($_POST["length"]) && $_POST["length"] ?? null;

    $_SESSION['width'] = isset($_POST["width"]) && $_POST["width"] ?? null;

    $product_classes = [
        'dvd' => 'DVD',
        'furniture' => 'Furniture',
        'book' => 'Book',
    ];

//validating empty input fields

    // (empty($_POST["product_type"])) ? $typeErr = "* Product Type must be selected" : $typeErr = '' && $type = ($_POST["product_type"]);

    // (empty($_POST["sku"])) ? $skuErr = "SKU is required" : $sku = ($_POST["sku"]);
    // (empty($_POST["name"])) ? $nameErr = "name is required" : $name = ($_POST["name"]);
    // (empty($_POST["price"])) ? $priceErr = "price is required" : $price = ($_POST["price"]);

    //validating input characters
    $reg_exp = "/[^a-zA-Z0-9-:]+/"; // permitted expression for name input

    $reg_exp2 = "/[^a-zA-Z0-9-:@ ]+/"; // permitted expression for name input

    $invName = $invSku = ""; // Error message for invalid input type

    if (preg_match($reg_exp2, $_POST["name"])) {

        $invName = "Only letters,numbers,:,@ or - is allowed";

    } elseif (preg_match($reg_exp, $_POST["sku"])) {

        $invSku = "Only letters,numbers,:,or - is allowed";

    }

    $type = isset($_POST['product_type']) ? $_POST['product_type'] : null;
// //Check if the selected product type is valid
    if (isset($product_classes[$type])) {
        // Get the class name for the selected product type
        $product_classname = $product_classes[$type];
//Create a new product object based on the selected product type get complete form data for each product type

        $product = new $product_classname(...array_values($_POST));

        $dbHandler = new DbHandler('localhost', 'root', '', 'abiyu');

// Save product data to the database

        $product->saveToDatabase($dbHandler);
        unset($_SESSION['sku']);
        unset($_SESSION['price']);
        unset($_SESSION['name']);

        // ... save product data to database ...

    }

}