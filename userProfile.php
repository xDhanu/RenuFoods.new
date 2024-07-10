<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_SESSION["u"])) {

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Profile | Renu Product (Pvt) Ltd</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body">
        <!-- navBar -->
        <?php include "userNavBar.php"; ?>
        <!-- navBar -->

        <div class="w-100 p-3 mt-2 mb-5 text-center title02" style="background-color: #eee;">User Profile</div>

        <div class="container">

            <div class="row">

                <div class="col-12 col-lg-3 col-sm-12 d-flex justify-content-center flex-column">

                    <div class="d-flex justify-content-center">
                        <img class="rounded-3 shadow" src="<?php

                                                            if (!empty($d["img_path"])) {
                                                                echo $d["img_path"];
                                                            } else {
                                                                echo ("resources/resoimg/profile.png");
                                                            }

                                                            ?>" height="250" id="i" />
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Profile image</label>
                        <input type="file" class="form-control" id="profileimg">
                    </div>
                    <div class="mt-3 mb-5">
                        <button class="btn btn-outline-info col-12" onclick="uploadProfileimg();">Upload</button>
                    </div>

                </div>

                <div class="col-12 col-lg-6 col-sm-12 col-xs-12 bg-white p-3 rounded-3 shadow mb-5">

                    <div class="d-none" id="msgDiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">First Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["fname"] ?>" id="fname">
                        </div>
                        <div class="col-6">
                            <label for="form-label">Last Name</label>
                            <input type="text" class="form-control" value="<?php echo $d["lname"] ?>" id="lname">
                        </div>
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $d["email"] ?>" id="email">
                    </div>

                    <div class="mt-3">
                        <label for="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $d["mobile"] ?>" id="mobile">
                    </div>

                    <div class="row mt-3">
                        <div class="col-6">
                            <label for="form-label">Username</label>
                            <input type="text" class="form-control" value="<?php echo $d["username"] ?>" disabled>
                        </div>
                        <div class="col-6">
                            <label for="form-lable">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" value="<?php echo $d["password"] ?>" id="pw" />
                                <span class="input-group-text" onclick="showPasswordProfule();">
                                    <i class="bi bi-eye-slash text-primary" id="passwordIcon"></i>
                                </span>
                            </div>
                        </div>


                    </div>

                    <h5 class="mt-3">Shipping Address</h5>

                    <div class="row mt-3">
                        <div class="col-3">
                            <label for="form-label">No :</label>
                            <input type="text" class="form-control" value="<?php echo $d["no"] ?>" id="no">
                        </div>
                        <div class="col-9">
                            <label for="form-label">Line : 1</label>
                            <input type="text" class="form-control" value="<?php echo $d["line_1"] ?>" id="line1">
                        </div>
                    </div>
                    <div class="mt-3">
                        <label for="form-label">Line : 2</label>
                        <input type="text" class="form-control" value="<?php echo $d["line_2"] ?>" id="line2">
                    </div>
                    <div class="mt-3 mb-3">
                        <button class="col-12 btn btn-outline-info" onclick="updateProfileData();">Update</button>
                    </div>

                </div>

                <div class="col-3 d-none d-lg-block">

                    <div class="text-center">
                        <div class="mt-4">
                            <span class="fw-bold text-black-50 mt-5">Display ads</span>
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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </body>

    </html>
<?php

} else {
    header("location: registation.php");
}

?>