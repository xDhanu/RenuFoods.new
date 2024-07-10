<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `order_item`
    INNER JOIN `order_history` ON `order_item`.order_history_ohid = `order_history`.ohid
    INNER JOIN `user` ON `order_history`.user_id = `user`.id
    INNER JOIN `stock` ON `order_item`.stock_stock_id = `stock`.stock_id
    INNER JOIN `product` ON `stock`.product_id = `product`.id
    ORDER BY `order_item`.oid ASC;");

    $num = $rs->num_rows;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Renu Products | Selling Reports.</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="">

        <div class="">
            <div class=" ms-5 mt-5">
                <a href="adminPanel.php">
                    <button class="btn btn-lg btn-secondary shadow">
                        <i class="bi bi-backspace"></i>
                    </button>
                </a>
            </div>

            <div class="w-100 p-3 mt-2 mb-5 text-center title02" style="background-color: #eee;">
                <div class="text-start h4">Selling Report</div>
            </div>

            <div class="container mt-3" id="printArea">
                <table class="table table-hover mt-5" id="responsive-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>First Name</th>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Date & Time</th>
                            <th>Quantity</th>
                            <th>Net Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["fname"] ?></td>
                                <td><?php echo $d["order_id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["order_date"] ?></td>
                                <td><?php echo $d["oi_qty"] ?></td>
                                <td><?php echo $d["amount"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end container mb-5 mt-5">
                <button class="btn btn-outline-primary col-2" onclick="printdiv();">Print</button>
            </div>

        </div>
        <!-- footer -->
        <?php include "footer.php" ?>
        <!-- footer -->

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