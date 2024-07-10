<?php

session_start();

include "connection.php";

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Panel | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body" onload="loadChart();">

        <!-- Nav Bar -->
        <?php include "adminNavBar.php" ?>
        <!-- Nav Bar -->

        <div class="container col-12">
            <div class=" col-12 d-flex justify-content-center">
                <div class="row">
                    <div class="col-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="card text-bg-primary shadow mt-5 m-5">
                            <div class="card-body">
                                <h5 class="card-title">Registerd Users</h5>
                                <?php
                                $user_rs = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '2'");

                                $user_num = $user_rs->num_rows;
                                ?>
                                <h3 class="card-text"><?php echo $user_num; ?> Users</h3> <!-- users la vitharak echo kra -->
                                <a href="adminUserReport.php" class="col-12 btn btn-light">User Reports</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="card text-bg-danger shadow mt-5 m-5">
                            <div class="card-body">
                                <h5 class="card-title">Active Users</h5>
                                <?php
                                $act_user_rs = Database::search("SELECT * FROM `user` 
                                INNER JOIN `user_type` ON `user`.user_type_id = `user_type`.utype_id 
                                WHERE `user_type_id` = '2' AND `status` = '1'");

                                $act_user_num = $act_user_rs->num_rows;
                                ?>
                                <h3 class="card-text"><?php echo $act_user_num; ?> Users</h3>
                                <a href="adminUserManagement.php" class="col-12 btn btn-light">Manage Users</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="card text-bg-success shadow mt-5 m-5">
                            <div class="card-body">
                                <h5 class="card-title">All Products</h5>
                                <?php
                                $product_rs = Database::search("SELECT * FROM `product`");

                                $product_num = $product_rs->num_rows;
                                ?>
                                <h3 class="card-text"><?php echo $product_num; ?> Products</h3>
                                <a href="adminReportProduct.php" class="col-12 btn btn-light">Product Reports</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="card text-bg-secondary shadow mt-5 m-5">
                            <div class="card-body">
                                <h5 class="card-title">Active Products</h5>
                                <?php
                                $act_product_rs = Database::search("SELECT * FROM `stock`
                                INNER JOIN `product` ON `product`.id = `stock`.product_id 
                                WHERE `status` = '1'");

                                $act_product_num = $act_product_rs->num_rows;
                                ?>
                                <h3 class="card-text"><?php echo $act_product_num; ?> Products</h3>
                                <a href="adminProductStatus.php" class="col-12 btn btn-light">Product Management</a>
                            </div>
                        </div>
                    </div>

                    <div class="row col-12 col-lg-3 col-sm-6 col-xs-12">
                        <div class="">
                            <div class="card text-bg-warning shadow mt-5 m-5">
                                <div class="card-body">
                                    <h5 class="card-title">Sold Products</h5>
                                    <?php
                                    $sld_product_rs = Database::search("SELECT * FROM `order_item`");

                                    $sld_product_num = $sld_product_rs->num_rows;
                                    ?>
                                    <h3 class="card-text"><?php echo $sld_product_num; ?> Products</h3>
                                    <a href="adminSellingReport.php" class="col-12 btn btn-light">Selling Report</a>
                                </div>
                            </div>
                        </div>

                        <div class="">
                            <div class="card text-bg-info shadow mt-5 m-5">
                                <div class="card-body">
                                    <h5 class="card-title">All Stock</h5>
                                    <?php
                                    $ast_stock_rs = Database::search("SELECT * FROM `stock`");

                                    $ast_stock_num = $ast_stock_rs->num_rows;
                                    ?>
                                    <h3 class="card-text"><?php echo $ast_stock_num; ?> Products</h3>
                                    <a href="adminStockReport.php" class="col-12 btn btn-light">Stock Report</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div style="width: 600px;" class="mt-5">
                        <h2 class="text-center title02"> Daily Income</h2>
                        <canvas id="history"></canvas>
                    </div>

                    <div style="width: 380px;" class="ms-4" onclick="SoldPrdct();">
                        <h2 class="text-center title02">Most sold products</h2>
                        <canvas id="mstsold"></canvas>
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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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