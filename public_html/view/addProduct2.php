<?php
include_once "../controller/post.php";

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


    <!-- form  section starts here -->
    <div class="container">
        <form id="productForm" class="w-50" method="POST"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group row">
                <div class="form-group row">

                    <label for="inputPassword" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-8">
                        <input type="text" id="sku" name="sku" autocomplete="off" placeholder='#sku'
                            autocapitalize="off" class="form-control form-control-lg"
                            value="<?php echo isset($_SESSION['sku']) ? $_SESSION['sku'] : '' ?>">
                        <span id="sku-error" class="myerror"></span>

                        <br>


                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-8">
                        <input type="text" id="name" name="name"
                            value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : '' ?>" autocomplete="off"
                            placeholder='#name' utocapitalize="off" class="form-control form-control-lg">
                        <span id="sku-error" class="myerror"></span>

                        <br>
                    </div>

                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price($)</label>
                    <div class="col-sm-8">
                        <input type="number" id="price"
                            value="<?php echo isset($_SESSION['price']) ? $_SESSION['price'] : '' ?>" name="price"
                            autocomplete="off" placeholder='#price' class="form-control form-control-lg"
                            autocapitalize="off">

                        <span class="myerror">

                        </span>

                        <br>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="type" class="col-sm-3 col-form-label">Type Switcher</label>

                    <div class="col-sm-6">
                        <select name="product_type" id="product_type" class="form-control-sm ">
                            <option value="">-- Select Product Type --</option>
                            <option value="dvd">DVD</option>
                            <option value="furniture">
                                Furniture </option>
                            <option value="book">Book
                            </option>
                        </select>

                    </div>
                </div>
                <div class="select container2">

                    <div class="form-control-sm">
                        <span id="type-error" class="myerror"></span>
                    </div>

                </div>




                <!-- class for selected product div -->

                <div class="select container">
                    <div id="detailsSection">

                    </div>

                    <div>
                        <span id="mySpan"></span>
                    </div>

                </div>






            </div>


            <div class="save button">
                <!-- <input type="submit" value="save" name="submit" btnid="#save-btn" class="btn btn-primary"
                        name="save"> -->
                <button type="submit" class="btn btn-primary" id="save-button" value="Submit">Save</button>
            </div>
        </form>
    </div>

    </div>
    <script src="../js/main2.js"> </script>

</body>

</html>