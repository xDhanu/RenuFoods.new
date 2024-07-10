<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Renu Products | Stock Management.</title>
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css" />
            <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
        </head>
    </head>

    <body class="main-body vh-100">

        <?php include "adminNavBar.php" ?>

        <div class="w-100 p-3 mt-2 mb-3 text-center title02" style="background-color: #eee;">
            <div class="text-start h4">Stock Management</div>
        </div>

        <div class="container">

            <div class="col-12 shadow bg-white rounded-3 mt-2 mb-5 p-5">

                <div class="row">

                    <div class="col-10 col-lg-6 col-sm-12 col-xs-12 mb-sm-5">

                        <h2 class="text-center title02 mb-5">Product Registration</h2>

                        <div class="d-none" id="msgDiv">
                            <div class="alert alert-danger" id="msg"></div>
                        </div>

                        <div class="mb-3 col-12">
                            <label class="form-label" for="">Product Name</label>
                            <input id="pname" class="form-control" type="text">
                        </div>

                        <div class="row">

                            <div class="mb-3 col-6 ">
                                <label class="form-label" for="">Brand Name</label>
                                <select id="brand" class="form-select">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `brand`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {

                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["brand_id"]); ?>"><?php echo ($data["brand_name"]); ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label" for="">Category</label>
                                <select id="cat" class="form-select">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `category`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {

                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["cat_id"]); ?>"><?php echo ($data["cat_name"]); ?></option>
                                    <?php
                                    }

                                    ?>

                                </select>
                            </div>

                        </div>

                        <div class="row">
                            <div class="mb-3 col-6">
                                <label class="form-label" for="">Grade</label>
                                <select id="grade" class="form-select">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `grade`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {

                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["grade_id"]); ?>"><?php echo ($data["grade_name"]); ?></option>
                                    <?php
                                    }

                                    ?>

                                </select>
                            </div>

                            <div class="mb-3 col-6">
                                <label class="form-label" for="">Size</label>
                                <select id="size" class="form-select">
                                    <option value="0">Select</option>

                                    <?php

                                    $rs = Database::search("SELECT * FROM `size`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {

                                        $data = $rs->fetch_assoc();

                                    ?>
                                        <option value="<?php echo ($data["size_id"]); ?>"><?php echo ($data["size_name"]); ?></option>
                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Description</label>
                            <textarea id="desc" class="form-control" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="">Product image</label>
                            <input id="file" class="form-control" type="file">
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary mb-5" onclick="regProduct();">Register Product</button>
                        </div>

                    </div>

                    <div class="row col-10 col-lg-6 col-sm-12 col-xs-12 ">
                        <div class="">

                            <h2 class="text-center title02 mb-5">Stock Update</h2>

                            <div class="d-none" id="msgDiv1">
                                <div class="alert alert-danger" id="msg1"></div>
                            </div>

                            <div class="mb-3 ">
                                <label class="form-label" for="">Product Name</label>

                                <select id="selectProduct" class="form-select">
                                    <option value="0">Select</option>
                                    <?php

                                    $rs = Database::search("SELECT * FROM `product`");
                                    $num = $rs->num_rows;

                                    for ($x = 0; $x < $num; $x++) {

                                        $data = $rs->fetch_assoc();
                                    ?>
                                        <option value="<?php echo ($data["id"]); ?>"><?php echo ($data["name"]); ?></option>
                                    <?php
                                    }

                                    ?>
                                </select>
                            </div>

                            <div class="mb-3 ">
                                <label class="form-label" for="">Quantity</label>
                                <input id="qty" class="form-control" type="text">
                            </div>

                            <div class="mb-3 ">
                                <label class="form-label" for="">Unit Price</label>
                                <input id="uprice" class="form-control" type="text">
                            </div>

                            <div class="d-grid mb-sm-3">
                                <button class="btn btn-success mb-5" onclick=" updateStock();">Update Stock</button>
                            </div>
                        </div>

                        <div class="">

                            <h2 class="text-center title02 mb-3">Delivery fee Update</h2>

                            <?php
                            $rs = Database::search("SELECT * FROM `delivery`");
                            $d = $rs->fetch_assoc();
                            ?>

                            <div class="mb-3 col-12">
                                <label for="form-label">Delivery fee</label>
                                <input type="text" class="form-control" value="<?php echo $d["delivery_fee"] ?>" id="delivery">
                            </div>

                            <div class="d-grid mb-lg-5">
                                <button class="btn btn-success" onclick="updateDeliveryFee();">Update Delivery fee</button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
        </div>
        <!-- Nav Bar -->
        <?php include "footer.php" ?>
        <!-- Nav Bar -->

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
    </body>

    </html>

<?php

} else {

?>
    <script>
        alert("Your not a Valid Admin");
        window.location = "adminLogin.php";
    </script>
<?php
}


?>