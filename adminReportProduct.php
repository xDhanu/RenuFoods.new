<?php

session_start();
include "connection.php";

if (isset($_SESSION["a"])) {

    $rs = Database::search("SELECT * FROM `product` 
    INNER JOIN `brand` ON `product`.brand_brand_id = `brand`.brand_id
    INNER JOIN `grade` ON `product`.grade_grade_id = `grade`.grade_id 
    INNER JOIN `category` ON `product`.category_cat_id =`category`.cat_id 
    INNER JOIN `size` ON `product`.size_size_id = `size`.size_id 
    ORDER BY `product`.id ASC;");

    $num = $rs->num_rows;
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Renu Products | Product Reports.</title>
        <link rel="stylesheet" href="bootstrap.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css" />
        <link rel="icon" href="resources/RenuProductsLogo-01.svg" />
    </head>

    <body class="main-body">
        <div class="">
            <div class=" ms-5 mt-5">
                <a href="adminPanel.php">
                    <button class="btn btn-lg btn-secondary shadow">
                        <i class="bi bi-backspace"></i>
                    </button>
                </a>
            </div>

            <div class="w-100 p-3 mt-2 mb-5 text-center title02" style="background-color: #eee;">
                <div class="text-start h4">Product Report</div>
            </div>

            <div class="container mt-3" id="printArea">
                <table class="table table-hover mt-5" id="responsive-table">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Brand name</th>
                            <th>Category</th>
                            <th>color</th>
                            <th>Size</th>
                            <th>Description</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < $num; $i++) {
                            $d = $rs->fetch_assoc();
                        ?>
                            <tr>
                                <td><?php echo $d["id"] ?></td>
                                <td><?php echo $d["name"] ?></td>
                                <td><?php echo $d["brand_name"] ?></td>
                                <td><?php echo $d["cat_name"] ?></td>
                                <td><?php echo $d["grade_name"] ?></td>
                                <td><?php echo $d["size_name"] ?></td>
                                <td><?php echo $d["description"] ?></td>
                                <td><img src="<?php echo $d["path"] ?>" height="100" /></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end container mb-5 mt-5">
                <button class="btn btn-outline-primary col-2" onclick="printdiv();" >Print</button>
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