<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css" />

</head>

<body>

    <div class=" container col-12">
        <div class="row mt-1 mb-1">


            <div class="col-5 col-lg-3 align-self-start mt-3">

                <?php

                session_start();

                if (isset($_SESSION["u"])) {
                    $user = $_SESSION["u"];
                    ?>

                    <a href="userProfile.php" class="text-decoration-none cursor fw-bold"><b>Hi...,
                        </b><?php echo $user["fname"]; ?> </a>|
                    <span class="text-lg-start fw-bold text-danger cursor" onclick="userLogOut();">Log out</span> |

                    <?php
                } else {
                    ?>
                    <a href="registation.php" class="text-decoration-none cursor fw-bold">Log In or Register</a> |
                    <?php

                }

                ?>
                <span class="text-lg-start fw-bold cursor">Help and Contact</span>

            </div>

        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>