<?php

session_start();
include "connection.php";

$user = $_SESSION["u"];

$rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
$d = $rs->fetch_assoc();

if (isset($user)) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cart | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body" onload="loadCart();">

        <!-- Navbar -->
        <?php include "userNavBar.php"; ?>
        <!-- Navbar -->

        <div class="w-100 p-3 mt-2 mb-5 text-center title02" style="background-color: #eee;">
            <div class="text-start h4">
                <?php echo $d["fname"] ?> s, Cart
            </div>
        </div>

        <div class="container col-12 mt-5 mb-5">

            <div class="d-none" id="msgDiv">
                <div class="alert alert-danger" id="msg"></div>
            </div>

            <div class="d-none col-2 d-lg-block">
                <div class="text-center">
                    <div class="mt-4">
                        <span class="fw-bold text-black-50 mt-5">Display ads</span>
                    </div>
                </div>
            </div>

            <div class="row" id="cartBody">
                <!-- Cart Loading Area -->
            </div>
        </div>

        <!-- Footer -->
        <?php include "footer.php" ?>
        <!-- footer -->

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>

<?php

} else {
    header("location: registation.php");
}

?>