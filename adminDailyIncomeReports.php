<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT DATE(order_history.order_date) as order_date, SUM(order_item.oi_qty * stock.price) as daily_income
    FROM order_item
    INNER JOIN stock ON order_item.stock_stock_id = stock.stock_id
    INNER JOIN order_history ON order_item.order_history_ohid = order_history.ohid
    GROUP BY DATE(order_history.order_date)
    ORDER BY order_date ASC;");

    $num = $rs->num_rows;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Renu Products | Income Reports.</title>
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
                <div class="text-start h4">Daily Income</div>
            </div>

            <div class="container mt-3" id="printArea">
                <table class="table table-hover mt-5" id="responsive-table">
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Daily Income</th>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["order_date"] ?></td>
                                <td>Rs. <?php echo $d["daily_income"] ?>.00</td>
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