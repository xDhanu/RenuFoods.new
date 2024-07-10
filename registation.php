<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renu Products | Login.</title>
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
                        <p class="text-center title01">Renu Foods (Pvt) Ltd.</p>
                    </div>
                </div>
            </div>
            <!-- Header -->

            <!-- Log in -->
            <div class="container col-12 col-lg-4 col-sm-8 col-xs-6 bg-light shadow rounded rounded-3 text-dark p-4" id="login">

                <div class="row">

                    <div>
                        <p class="title02">Log in</p>
                    </div>

                    <div class="d-none" id="msgDiv2">
                        <div class="alert alert-danger" id="msg2"></div>
                    </div>

                    <?php

                    $username = "";
                    $password = "";

                    if (isset($_COOKIE["username"])) {
                        $username = $_COOKIE["username"];
                    }

                    if (isset($_COOKIE["password"])) {
                        $password = $_COOKIE["password"];
                    }

                    ?>

                    <div class="mt-3">
                        <label for="form-lable">Username Or Email</label>
                        <input type="text" class="form-control" id="un" value="<?php echo $username ?>" />
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Password</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="pw" value="<?php echo $password?>" />
                            <span class="input-group-text" onclick="showPasswordRegistation();">
                                <i class="bi bi-eye-slash text-primary" id="pwi"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mt-3 col-6">
                        <input type="checkbox" class="form-check-input" id="rm" />
                        <label for="form-lable">Remember Me</label>
                    </div>

                    <div class=" mt-3 col-6 text-end">
                        <a href="#" class="link-primary" onclick="forgotPassword();">Forgot Password?</a>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-primary col-12" onclick="logIn();">Log in</button>
                    </div>

                    <div class="mt-2">
                        <button class="btn btn-success col-12" onclick="changeView();">New to Renu Product Store? Registar</button>
                    </div>

                    <div class=" mt-3 col-6">
                        <a href="adminLogIn.php" class="link-success text-decoration-none">You are a Admin?</a>
                    </div>
                </div>

            </div>
            <!-- Log in -->


            <!-- Registar -->
            <div class="container col-12 col-lg-5 col-sm-8 col-xs-6 bg-light shadow rounded rounded-3 text-dark p-4 d-none" id="registar">

                <div class="row">

                    <div>
                        <p class="title02">You don't have an account?</p>
                    </div>

                    <div class="d-none" id="msgDiv1">
                        <div class="alert alert-danger" id="msg1"></div>
                    </div>

                    <div class="mt-3 col-6">
                        <label for="form-lable">First Name</label>
                        <input type="text" placeholder="ex : Dhanu" class="form-control" id="fname" />
                    </div>

                    <div class="mt-3 col-6">
                        <label for="form-lable">Last Name</label>
                        <input type="text" placeholder="ex : Gunathilaka" class="form-control" id="lname" />
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Email</label>
                        <input type="email" placeholder="ex : info@gmail.com" class="form-control" id="email" />
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Mobile</label>
                        <input type="text" placeholder="ex : 07x xxxx 123" class="form-control" id="mobile" />
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Username</label>
                        <input type="text" placeholder="ex : @dhanu" class="form-control" id="username" />
                    </div>

                    <div class="mt-3">
                        <label for="form-lable">Password</label>
                        <div class="input-group">
                            <input type="password" placeholder="********" class="form-control" id="password" />
                            <span class="input-group-text" onclick="showPasswordregistar();">
                                <i class="bi bi-eye-slash text-primary" id="passwordIcon"></i>
                            </span>
                        </div>
                    </div>

                    <div class="mt-3 col-6">
                        <button class="btn btn-primary col-12" onclick="registar();">Registar</button>
                    </div>

                    <div class="mt-3 col-6">
                        <button class="btn btn-success col-12" onclick="changeView();">Allredy have an Account? Log in</button>
                    </div>


                </div>
            </div>
            <!-- Registar -->

            <!-- modal -->
            <div class="modal" tabindex="-1" id="fpmodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Forgot Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-3">

                                <div class="col-6">
                                    <label class="form-label">New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="np" />
                                        <button class="btn btn-outline-secondary" onclick="showModelPw1();">
                                            <i id="npi" class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label class="form-label">Re-Type New Password</label>
                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="rnp" />
                                        <button class="btn btn-outline-secondary" onclick="showModelPw2();">
                                            <i id="rnpi" class="bi bi-eye"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Verification Code</label>
                                    <input placeholder="Type the verifycation code in your email here" type="text" class="form-control" id="vcode" />
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" onclick="resetUserPassword();">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

            
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>

</html>