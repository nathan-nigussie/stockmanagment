<?php
include_once "../controller/post.php";
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>

<!-- Add Product HTML page starts here -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- custom css bootstrap link  -->
    <link rel="home icon" type="image/jpg" href="./images/product-icon.png" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <!-- header section starts  -->

    <header class="header">
        <div class="header-1">
            <h1> <i class="fas fa-swatchbook "></i> Add Products</h1>
            <button type="button" name="cancel" class="btn btn-danger"
                onclick="location.href = 'index.php';">Cancel</button>
        </div>
        <div class="header-2"></div>


    </header>
    <!-- header section ends here  -->

    <!-- session div starts here  -->
    <?php
if (isset($_SESSION['status'])) {
    ?>
    <?php echo $_SESSION['status']; ?>


    <?php

    unset($_SESSION['status']);
}
?>
    <!-- form  section starts here -->
    <div class="container">
        <form id="product_form" class="w-50" method="POST"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group row">
                <div class="form-group row">

                    <label for="inputPassword" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-8">
                        <input type="text" id="sku" name="sku" autocomplete="off" placeholder='#sku'
                            class="form-control form-control-lg">

                        <span class="myerror">* <?php echo $skuErr; ?></span>
                        <span class="myerror"><?php echo $invSku; ?></span>
                        <br><br>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" name="name" autocomplete="off" placeholder='#name'
                            class="form-control form-control-lg">
                        <span class="myerror">* <?php echo $nameErr; ?></span>
                        <span class="myerror"> <?php echo $invName; ?></span>
                        <br><br>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price($)</label>
                    <div class="col-sm-8">
                        <input type="number" id="price" name="price" autocomplete="off" placeholder='#price'
                            class="form-control form-control-lg">

                        <span class="myerror">* <?php echo $priceErr; ?></span>

                        <br><br>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Type Switcher</label>

                    <div class="col-sm-6">
                        <select id="productType" name="productType" onChange="myNewFunction(this);">
                            <option id="type_Switcher" value="">Type Switcher
                            </option>
                            <option id="#DVD" value="DVD">DVD</option>
                            <option id="#Furniture" value="Furniture">Furniture</option>
                            <option id="#Book" value="Book">Book</option>
                        </select>
                    </div>

                </div>
                <!-- class for selected product div -->
                <div class="select container">


                    <div class="select display"> </div>

                </div>
                <div class="save button">
                    <!-- <input type="submit" value="save" name="submit" btnid="#save-btn" class="btn btn-primary"
                        name="save"> -->
                    <button type="submit" class="btn btn-primary" value="Submit">Save</button>
                </div>
        </form>
    </div>

    </div>
    <!-- custom js file link  -->
    <script src="../js/main.js"> </script>

</body>

</html>