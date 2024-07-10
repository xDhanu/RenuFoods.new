<?php

session_start();

if (isset($_SESSION["a"])) {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Management | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body">

        <!-- nav bar -->
        <?php include "adminNavBar.php"; ?>
        <!-- nav bar -->

        <div class="col-12  mt-2 vh-100">

            <div class="w-100 p-3 mb-5 text-center title02" style="background-color: #eee;">
                <div class="text-start h4">New Product Register</div>
            </div>

            <div class="row">

                <!-- Barand Register -->
                <div class=" bg-light p-5 shadow col-10 col-lg-4 col-sm-8 col-xs-12 offset-1 ms-auto me-auto mt-4 mb-4">
                    <label class="form-lable">Brand Name</label>

                    <input class="form-control mb-3" type="text" id="brand" />

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-4">
                        <button class="col-12 btn btn-primary" onclick="brandReg();">Add Barand</button>
                    </div>
                </div>
                <!-- Barand Register -->

                <!-- Category Register -->
                <div class="bg-light p-5 shadow col-10 col-lg-4 col-sm-8 col-xs-12 offset-1  ms-auto me-auto mt-4 mb-5 mb-4">
                    <label class="form-lable">Category Name</label>

                    <input class="form-control mb-3" type="text" id="category" />

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <div class="mt-4">
                        <button class="col-12 btn btn-primary" onclick="catReg();">Add Category</button>
                    </div>
                </div>
                <!-- Category Register -->

            </div>

            <div class="row mt-5">

                <!-- Color Register -->
                <div class=" bg-light p-5 shadow col-10 col-lg-4 col-sm-8 col-xs-12 offset-1  ms-auto me-auto mt-4 mb-4">
                    <label class="form-lable">Grade</label>

                    <input class="form-control mb-3" type="text" id="grade" />

                    <div class="d-none" id="msgDiv3">
                        <div class="alert alert-danger" id="msg3"></div>
                    </div>

                    <div class="mt-4">
                        <button class="btn col-12 btn btn-primary" onclick="gradeReg();">Add Grade</button>
                    </div>
                </div>
                <!-- Color Register -->

                <!-- Size Register -->
                <div class="bg-light p-5 shadow col-10 col-lg-4 col-sm-8 col-xs-12 offset-1  ms-auto me-auto mt-4 mb-4">
                    <label class="form-lable">Packet Size</label>

                    <input class="form-control mb-3" type="text" id="size" />

                    <div class="d-none" id="msgDiv4">
                        <div class="alert alert-danger" id="msg4"></div>
                    </div>

                    <div class="mt-4">
                        <button class=" col-12 btn btn btn-primary" onclick="sizeReg();">Add Packet Size</button>
                    </div>
                </div>
                <!-- Size Register -->
            </div>

            <!-- <div class="row">

                <div class="col-md-6 text-center">
                    <div class="row">
                        <span class="fw-bold text-black-50 mt-5">Display ads</span>
                    </div>
                </div>

                <div class="col-md-6 text-center">
                    <div class="row">
                        <span class="fw-bold text-black-50 mt-5">Display ads</span>
                    </div>
                </div>

            </div> -->

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