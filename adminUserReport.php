<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `user` 
    INNER JOIN `user_type` ON `user`.user_type_id = `user_type`.utype_id WHERE `utype_id` = '2' ORDER BY `user`.`id` ASC");

    $num = $rs->num_rows;

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Renu Products | User Reports.</title>
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
                <div class="text-start h4">User Report</div>
            </div>

            <div class="container mt-3" id="printArea">

                <table class="table table-hover mt-5" id="responsive-table">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>First Name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>User type</th>
                            <th>Status</th>
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
                                <td><?php echo $d["lname"] ?></td>
                                <td><?php echo $d["email"] ?></td>
                                <td><?php echo $d["mobile"] ?></td>
                                <td><?php echo $d["type"] ?></td>
                                <td><?php
                                    if ($d["status"] == 1) {
                                        echo ("Active");
                                    } else {
                                        echo ("Deactive");
                                    }

                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end container mb-5 mt-5">
                <button class="btn btn-outline-warning col-2" onclick="printdiv();">Print</button>
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