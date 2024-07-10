<?php

session_start();
include "connection.php";
$user = $_SESSION["u"];
$orderHistoryId = $_GET["orderId"];

$rs = Database::search("SELECT * FROM `order_history` WHERE `ohid` = '" . $orderHistoryId . "'");
$num = $rs->num_rows;

if ($num > 0) {
    $d = $rs->fetch_assoc();

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body">

        <div class="container text-start mt-2">
            <a href="index.php">
                <button class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-house-heart-fill h3"></i>
                </button>
            </a>
        </div>

        <div class="container col-8 mt-2 mb-4" id="printArea">
            <div class="border border-2 border-black rounded-2 bg-white shadow p-5">
                <div class="row">
                    <div class="col-6">
                        <h1 class="title04 text-danger">I N V O I C E</h1>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <img class="imginv" src="resources/resoimg/RenuProductsLogo-01.svg" height="80px" />
                    </div>
                </div>

                <div class="col-6 mb-5">
                    <h4>Renu Foods (pvt) ltd</h4>
                    <h6><i class="bi bi-geo-alt-fill"></i> Anguruwella Road,</h6>
                    <h6>Warakapola</h6>
                    <h6>H6, REG| 1244</h6>
                    <br />
                    <h6><i class="bi bi-telephone-fill"></i>+94 35 322 7081</h6>
                    <h6><i class="bi bi-telephone-fill"></i>+94 77 7225 225</h6>
                </div>

                <div class="row">
                    <div class="col-7 mb-5">
                        <h5>BILL TO</h5>
                        <h6><?php echo $user["fname"] ?>     <?php echo $user["lname"] ?></h6>
                        <h6><?php echo $user["mobile"] ?></h6>
                        <h6><?php echo $user["email"] ?></h6>
                    </div>
                    <div class="col-5 mb-5">
                        <h5>SHIP TO</h5>
                        <h6><?php echo $user["no"] ?>,</h6>
                        <h6> <?php echo $user["line_1"] ?>,</h6>
                        <h6><?php echo $user["line_2"] ?></h6>
                    </div>
                    <div class="col-2">
                        <h5>INVOICE</h5>
                        <h6>DATE</h6>
                    </div>
                    <div class="col-4">
                        <h5 class="text-primary">#<?php echo $d["order_id"] ?></h5>
                        <h6><?php echo $d["order_date"] ?></h6>
                    </div>
                </div>

                <div class="">
                    <table class="table" id="responsive-table">
                        <div class="mt-5 mb-5">
                            <thead>
                                <tr class="table-info">
                                    <th class="col-3">Product Name</th>
                                    <th class="col-2">Brand Name</th>
                                    <th class="col-2">Category</th>
                                    <th class="col-2">Grade</th>
                                    <th class="col-1">Size</th>
                                    <th class="col-1">Quantity</th>
                                    <th class="col-2">Price</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $rs2 = Database::search("SELECT * FROM `order_item` 
                                    INNER JOIN `stock` ON `order_item`.`stock_stock_id` = `stock`.`stock_id`
                                    INNER JOIN `product` ON `stock`.`product_id` = `product`.`id`
                                    INNER JOIN `brand` ON `product`.`brand_brand_id` = `brand`.`brand_id`
                                    INNER JOIN 	`grade` ON `product`.`grade_grade_id`	= `grade`.`grade_id`
                                    INNER JOIN `category` ON `product`.`category_cat_id` = `category`.`cat_id`
                                    INNER JOIN `size` ON `product`.`size_size_id` = `size`.`size_id`
                                    INNER JOIN `delivery` ON `stock`.`delivery_delivery_id` = `delivery`.`delivery_id`
                                    WHERE `order_item`.`order_history_ohid` ='" . $orderHistoryId . "'");

                                $num2 = $rs2->num_rows;

                                for ($i = 0; $i < $num2; $i++) {
                                    $d2 = $rs2->fetch_assoc();

                                    ?>
                                    <tr>
                                        <td class="col-3"><?php echo $d2["name"] ?></td>
                                        <td class="col-2"><?php echo $d2["brand_name"] ?></td>
                                        <td class="col-2"><?php echo $d2["cat_name"] ?></td>
                                        <td class="col-2"><?php echo $d2["grade_name"] ?></td>
                                        <td class="col-1"><?php echo $d2["size_name"] ?></td>
                                        <td class="col-1"><?php echo $d2["oi_qty"] ?></td>
                                        <td class="col-2">Rs. <?php echo ($d2["price"] * $d2["oi_qty"]) ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </div>
                    </table>
                </div>
                <div class="text-end mt-4">
                    <h6>Number Of Items : <?php echo $num2 ?></h6>
                    <?php
                        $rs3 = Database::search("SELECT * FROM `delivery` WHERE `delivery_id` = '1';");
                        $d3 =  $rs3->fetch_assoc();
                        ?>
                    <h5>Delivery fee : Rs : <?php echo $d3["delivery_fee"]?>.00 </h5>

                    <h3>Net Total : Rs. <?php echo $d["amount"] ?>.00</h3>
                </div>
                <div class="text-end mt-4">
                    <h2 class="title0">mr.Dhanu Gunathilaka</h2>
                    <h6 class="" style="font-size: 10px;">Ownner Of Renu foods</h6>
                </div>

                <h1 class="text-center h1 text-danger title01" style="font-size: 30px;">Thank You</h1>
                <hr />
            </div>
        </div>

        <div class="d-flex justify-content-end container mb-5 mt-5">
                <button class="btn btn-outline-primary col-2" onclick="printdiv();">Print</button>
            </div>

        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- footer -->


        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>
    <?php


} else {
    header("location: index.php");
}
