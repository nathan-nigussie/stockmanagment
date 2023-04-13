<?php

// Define validation rules for each product type
$validation_rules = [
    'dvd' => ['size' => 'required'],
    'furniture' => ['height' => 'required', 'width' => 'required', 'length' => 'required'],
    'book' => ['weight' => 'required'],
];

// // Get form data
// $name = $_POST['name'];
// $price = $_POST['price'];
// $type = $_POST['type'];

// Retrieve validation rules for the selected product type
$rules = $validation_rules[$type];
echo $type;
// Validate type-specific attributes
foreach ($rules as $attribute => $rule) {
    if ($rule === 'required' && empty($_POST[$attribute])) {
        // Display error message for missing required attribute
        $error_message = "Please enter the $attribute for the $type.";
        // Handle error as needed (e.g. display error message and prevent saving the product)
    }
}

// Create a new product object based on the selected product type
$product_classname = $product_classes[$type];
$product = new $product_classname($name, $price, $_POST);

// Check if SKU already exists in the database
if ($product->skuExists()) {
    // Display error message for duplicate SKU
    $error_message = "Product with the same SKU already exists.";
    // Handle error as needed (e.g. display error message and prevent saving the product)
}

// Save product data to the database
$product->saveToDatabase();

// Redirect back to the add product page
header('Location: add_product.php');
exit();

// Retrieve validation rules for the selected product type
$rules = $validation_rules[$type];
$missing_attributes = [];

if (is_array($rules)) {
    foreach ($rules as $attribute => $rule) {
        if ($rule === 'required' && empty($_POST[$attribute])) {
            // $missing_attributes[]=$attribute;
            // echo "Missing attributes: " . implode(", ", $missing_attributes);

            // Display error message for missing required attribute
            ;
            // Handle error as needed (e.g. display error message and prevent saving the product)

        }

    }
    echo $attribute;
    $error_message = $attribute;
} else {
    // Handle the error here
}
