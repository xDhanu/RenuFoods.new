<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$stock_id = $_GET["s"];

// echo($stockId);

if (isset($_SESSION["u"])) {

    if (isset($stock_id)) {

        $q = "SELECT * FROM `stock`
        INNER JOIN `product` ON `stock`.product_id = `product`.id
        INNER JOIN `brand` ON `product`.brand_brand_id = `brand`.brand_id
        INNER JOIN `grade` ON `product`.grade_grade_id = `grade`.grade_id
        INNER JOIN `category` ON `product`.category_cat_id = `category`.cat_id
        INNER JOIN `size` ON `product`.size_size_id = `size`.size_id
        WHERE `stock`.stock_id = '" . $stock_id . "'";
    
        $rs = Database::search($q);
        $d = $rs->fetch_assoc();
    
        $q1 = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    ?>
        <!DOCTYPE html>
        <html lang="en">
    
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Single Product | Renu Product (Pvt) Ltd</title>
            <link rel="stylesheet" href="bootstrap.css" />
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" href="style.css" />
            <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
        </head>
    
        <body class="main-body">
            <!-- navbar -->
            <?php include "userNavBar.php"; ?>
            <!-- navbar -->
    
            <div class="main-body">
                <div class="col-8 row shadow p-3 bg-body-tertiary rounded-2 m-auto mt-5 mb-5">
    
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12" width="col-sm-12">
                        <img src="<?php echo $d["path"] ?>" class="rounded-3 shadow" width="200px" />
                    </div>
    
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <h4 class="mt-auto"><?php echo $d["name"] ?></h4>
                        <h6 class="mt-3">Brand : <?php echo $d["brand_name"] ?></h6>
                        <h6 class="mt-3">Category : <?php echo $d["cat_name"] ?></h6>
                        <h6 class="mt-3">Grade : <?php echo $d["grade_name"] ?></h6>
                        <h6 class="mt-3">Size : <?php echo $d["size_name"] ?></h6>
                        <p class="mt-3">Description : <?php echo $d["description"] ?></p>
    
                        <div class="row mt-5">
                            <div class="col-4">
                                <input type="number" placeholder="Quantity" class="form-control" id="qty" />
                            </div>
                            <div class="col-6 mt-2">
                                <h6 class="text-warning">Avalable Quantity : <?php echo $d["qty"] ?></h6>
                            </div>
                        </div>
                        <h4 class="mt-3">Rs: <?php echo $d["price"] ?></h4>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-outline-primary col-6" onclick="addtoCart('<?php echo $d['stock_id'] ?>');"><i class="bi bi-bag me-2 "></i>Add to cart</button>
                            <button class="btn btn-outline-success col-6 ms-2" onclick="buyNow('<?php echo $d['stock_id'] ?>');">Buy Now</button>
                        </div>
                    </div>
    
                    <div class="col-12 col-lg-4 col-md-6 col-sm-12">
                        <h6 class="">Delivery</h6>
                        <?php
                        $rs1 = Database::search("SELECT * FROM user WHERE `id` = '" . $user["id"] . "'");
                        $num1 = $rs1->num_rows;
    
                        for ($i = 0; $i < $num1; $i++) {
                            $d1 = $rs1->fetch_assoc();
                        ?>
                            <label><i class="bi bi-geo-alt h4"></i> <?php echo $d1["no"] ?>.</label>
                            <label><?php echo $d1["line_1"] ?>,</label>
                            <label><?php echo $d1["line_2"] ?></label>
                            <a class="btn text-primary "href="userProfile.php"> Change</a>
                        <?php
                        }
                        ?>
    
                        <div class="mt-5">
                            <?php
                            $rs3 = Database::search("SELECT * FROM `delivery` WHERE `delivery_id` = '1';");
                            $d3 =  $rs3->fetch_assoc();
                            ?>
                            <h5><i class="bi bi-truck h4"></i> Standard Delivery</h5>
                            <label for="" class="">3 - 4 Working day(s)</label>
                            <label class="h5 ms-5">Rs : <?php echo $d3["delivery_fee"]?>.00</label>
                        </div>
    
                        <div class="mt-5">
                            <h5><i class="bi bi-wallet2 h5"></i> Cash on Delivery Avalable</h5>
                        </div>
    
                        <div class="mt-5">
                            <h5 class="mb-"><i class="bi bi-wallet2 h5"></i> We are Accept</h5>
                            <img src="resources/resoimg/card_img.png" alt="" class="">
                        </div>
                    </div>
                </div>
            </div>
        </body>
    
    
        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- Footer -->
    
        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        </body>
    
        </html>
    <?php
    } else {
        header("location: index.php");
    }

}else{
    header("location: index.php");
}


?>