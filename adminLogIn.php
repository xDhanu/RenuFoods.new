<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renu Products | Admin Login.</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />

</head>

<body class="main-body">

    <div class="container-fluid justify-content-center vh-100 d-flex">
        <div class="row align-content-center">

            <!-- Header -->
            <div class="col-12">
                <div class="row">
                    <div class="logo col-12"></div>
                    <div>
                        <p class="text-center title01">Renu Product (Pvt) Ltd.</p>
                    </div>
                </div>
            </div>
            <!-- Header -->

            <div class="container col-12 col-lg-6 container text-dark p-4 login" id="adminLogin">

                <div class="row">

                    <div>
                        <p class="title02">Admin Log in</p>
                    </div>

                    <div class="d-none" id="msgDiv">
                        <div class="alert alert-danger" id="msg"></div>
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Username</label>
                        <input type="text" class="form-control" placeholder="admin" id="un" />
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="******" id="pw" />
                            <span class="input-group-text" onclick="showPasswordRegistation();">
                                <i class="bi bi-eye-slash text-primary" id="pwi"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary col-12" onclick="adminLogIn();">Log in</button>
                    </div>

                    <div class=" mt-3 col-6">
                        <a href="registation.php" class="link-danger text-decoration-none">You no longer an Admin?</a>
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
</body>

</html>