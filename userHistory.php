<?php

session_start();
$user = $_SESSION["u"];
include "connection.php";

if (isset($user)) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>History | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body">

        <!-- nav bar -->
        <?php include "userNavBar.php" ?>
        <!-- nav bar -->

        <div class="w-100 p-3 mt-2 mb-5 text-center title02" style="background-color: #eee;">
            <div class="text-start h4">
                <?php echo $user["fname"] ?> s, Purchase History
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">

                <div class="d-none col-2 d-lg-block">
                    <div class="text-center">
                        <div class="mt-4">
                            <span class="fw-bold text-black-50 mt-5">Display ads</span>
                        </div>
                    </div>
                </div>

                <?php
                $rs = Database::search("SELECT * FROM `order_history` WHERE `user_id` = '" . $user["id"] . "'");
                $num = $rs->num_rows;

                if ($num > 0) {
                    //Not Empty

                    for ($i = 0; $i < $num; $i++) {
                        $d =  $rs->fetch_assoc();
                ?>
                        <!-- Orider History card -->
                        <div class="d-flex justify-content-lg-end justify-content-sm-center justify-content-xs-center">
                            <div class="col-10 row border border-3 bg-white shadow rounded-3 border-primary p-2 mb-4 d-flex justify-content-between justify-content-sm-center">
                                <div>
                                    <h5 class="">Order ID <span class="text-primary">#<?php echo $d["order_id"] ?></span></h5>
                                    <p><?php echo $d["order_date"] ?></p>
                                </div>
                                <div class="p-3">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th class="col-3 col-lg-6 col-sm-6" scope="col">Product Name</th>
                                                <th class="col-3 col-lg-3 col-sm-3" scope="col">Quantity</th>
                                                <th class="col-3 col-lg-3 col-sm-3" scope="col">Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $rs2 = Database::search("SELECT * FROM `order_item` 
                                        INNER JOIN `stock` ON `order_item`.stock_stock_id = `stock`.stock_id
                                        INNER JOIN `product` ON `stock`.product_id = `product`.id
                                        WHERE `order_item`.order_history_ohid = '" . $d["ohid"] . "'");

                                            $num2 = $rs2->num_rows;

                                            for ($j = 0; $j < $num2; $j++) {
                                                $d2 = $rs2->fetch_assoc();

                                            ?>
                                                <tr>
                                                    <th><?php echo $d2["name"] ?></th>
                                                    <td><?php echo $d2["oi_qty"] ?></td>
                                                    <td>Rs. <?php echo ($d2["price"] * $d2["oi_qty"]) ?>.00</td>
                                                </tr>
                                            <?php
                                            }

                                            ?>
                                        </tbody>
                                    </table>
                                    <div class="">
                                        <?php
                                         $rs3 = Database::search("SELECT * FROM `delivery` WHERE `delivery_id` = '1';");
                                         $d3 =  $rs3->fetch_assoc();
                                        ?>
                                        <h6>Delivery Price :<span class="text-muted"> Rs. <?php echo $d3["delivery_fee"] ?>.00</span></h6>
                                        <hr class="col-3"/>
                                        <h5>Net Total :<span class=" h5 fw-bold"> Rs. <?php echo $d["amount"] ?>.00</span></h5>
                                        <hr class="col-3"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Orider History card -->
                    <?php

                    }
                    ?>

                <?php
                } else {
                    //empty
                ?>
                    <div class="col-12 text-center  mt-5">
                        <h2>Your Have not Place any order!</h2>
                        <a href="index.php" class="btn btn-primary mt-3">Start Shopping</a>
                    </div>
                <?php
                }

                ?>
            </div>
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

header("location: registation.php");
}


?>