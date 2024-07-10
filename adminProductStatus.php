<?php

session_start();

if (isset($_SESSION["a"])) {

?>
    <!-- Load page -->

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Management | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css"/>
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body" onload="loadProductstts();">

        <!-- nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav bar -->

        <!-- Containt -->

        <div class="w-100 p-3 mt-2 mb-5 text-center title02" style="background-color: #eee;">
            <div class="text-start h4">Product Management</div>
        </div>

        <div class="container">

            <div class="col-12 mt-5">
                <div class="d-none" id="msgDiv" onclick="reload();">
                    <div class="alert alert-warning" id="msg"></div>
                </div>
            </div>

            <div class="mt-3" id="responsive-table">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Brand name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Grade</th>
                            <th scope="col">Size</th>
                            <th scope="col">Price</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody id="ptb">
                        <!-- Table Row -->

                        <!-- Table Row -->
                    </tbody>
                </table>
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