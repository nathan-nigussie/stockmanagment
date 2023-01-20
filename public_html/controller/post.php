<?php
include_once '../autoLoader/classAutoLoader.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sku = $_POST["sku"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $size = isset($_POST["size"]) && $_POST["size"] ?? null;
    $weight = isset($_POST["weight"]) && $_POST["weight"] ?? null;
    $width = isset($_POST["width"]) && $_POST["width"] ?? null;
    $length = isset($_POST["length"]) && $_POST["length"] ?? null;
    $height = isset($_POST["height"]) && $_POST["height"] ?? null;

    //validating empty input values
    $skuErr = $nameErr = $priceErr = $sizeErr = $weightErr = "";
    $sku = $name = $price = $size = $weight = "";

    (empty($_POST["sku"])) ? $skuErr = "SKU is required" : $sku = ($_POST["sku"]);
    (empty($_POST["name"])) ? $nameErr = "name is required" : $name = ($_POST["name"]);
    (empty($_POST["price"])) ? $priceErr = "price is required" : $price = ($_POST["price"]);
    (empty($_POST["size"])) ? $sizeErr = "size is required" : $size = ($_POST["size"]);
    (empty($_POST["weight"])) ? $weightErr = "weight is required" : $weight = ($_POST["weight"]);
    (empty($_POST["length"])) ? $lengthErr = "length is required" : $length = ($_POST["length"]);
    (empty($_POST["width"])) ? $widthErr = "width is required" : $width = ($_POST["width"]);
    (empty($_POST["height"])) ? $heightErr = "height is required" : $height = ($_POST["height"]);

    //validating input characters
    $reg_exp = "/[^a-zA-Z0-9-:]+/"; // permitted expression for name input

    $reg_exp2 = "/[^a-zA-Z0-9-:@ ]+/"; // permitted expression for name input

    $invName = $invSku = ""; // Error message for invalid input type

    if (preg_match($reg_exp2, $name)) {

        $invName = "Only letters,numbers,:,@ or - is allowed";

    } else if (preg_match($reg_exp, $sku)) {

        $invSku = "Only letters,numbers,:,or - is allowed";

    } else {
        if ($sku && $name && $price && $size) {
            $dvd = new dvd($sku, $name, $price, $size);
            $dvd->setConnection();
            $dvd->insert();

        } elseif ($sku && $name && $price && $height && $length && $width) {
            $furniture = new furniture($sku, $name, $price, $height, $length, $width);
            $furniture->setConnection();
            $furniture->insert();

        } elseif ($sku && $name && $price && $weight) {

            $book = new book($sku, $name, $price, $weight);
            $book->setConnection();
            $book->insert();

        }

    }

}