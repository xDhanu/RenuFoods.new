<?php
include "connection.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Renu Product (Pvt) Ltd</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
    <link rel="icon" href="resources/resoimg/RenuProductsLogo-01.svg" />
</head>

<body class="main-body" onload="loadProduct(0);">

    <!-- nav bar -->
    <?php include "userNavBar.php"; ?>
    <?php include "header.php"; ?>
    <!-- nav bar -->
    <div class="container">

        <!-- Basic search -->
        <div class="d-flex justify-content-end">
            <div class="col-5 col-lg-3 col-sm-6 me-3">
                <input type="text" class="form-control" placeholder="Search" id="search" onkeyup="searchProduct(0)">
            </div>
            <div class="col-lg-1 col-sm-1">
                <button class="btn btn-outline-success" onclick="viewFilter();"><i class="bi bi-filter"></i>
                    Filters</button>
            </div>
            <div class="col-lg-1 col-sm-1">
                <i onclick="contactAdmin();" class="bi bi-chat-dots h2 text-danger cursor"></i>
            </div>
        </div>
        <!-- basic search -->

        <!-- Advance Search -->
        <div class="d-none" id="filter">
            <div class="d-flex justify-content-end">
                <div
                    class="text-primary-emphasis bg-primary-subtle border border-primary-subtle rounded-3 mt-4 p-5 col-10">
                    <div class="">

                        <div class="row">
                            <div class="col-6">
                                <label class="form-label">Grade</label>
                                <select class="form-select" id="grade">
                                    <option value="0">Select Grade</option>

                                    <?php
                                    $rs1 = Database::search("SELECT * FROM grade");
                                    $num1 = $rs1->num_rows;

                                    for ($i = 0; $i < $num1; $i++) {
                                        $d1 = $rs1->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $d1["grade_id"] ?>"><?php echo $d1["grade_name"] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>


                                </select>
                            </div>


                            <div class="col-6">
                                <label class="form-label">Category</label>
                                <select class="form-select" id="cat">
                                    <option value="0">Select Category</option>

                                    <?php
                                    $rs2 = Database::search("SELECT * FROM category");
                                    $num2 = $rs2->num_rows;

                                    for ($i = 0; $i < $num2; $i++) {
                                        $d2 = $rs2->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $d2["cat_id"] ?>"><?php echo $d2["cat_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="row">

                            <div class="col-6">
                                <label class="form-label">Brand</label>
                                <select class="form-select" id="brand">
                                    <option value="0">Select Brand</option>
                                    <?php
                                    $rs3 = Database::search("SELECT * FROM brand");
                                    $num3 = $rs3->num_rows;

                                    for ($i = 0; $i < $num3; $i++) {
                                        $d3 = $rs3->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $d3["brand_id"] ?>"><?php echo $d3["brand_name"] ?>
                                        </option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>


                            <div class="col-6">
                                <label class="form-label">Size</label>
                                <select class="form-select" id="size">
                                    <option value="0">Select Size</option>
                                    <?php
                                    $rs4 = Database::search("SELECT * FROM `size`");
                                    $num4 = $rs4->num_rows;

                                    for ($i = 0; $i < $num4; $i++) {
                                        $d4 = $rs4->fetch_assoc();
                                        ?>
                                        <option value="<?php echo $d4["size_id"] ?>"><?php echo $d4["size_name"] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="row col-12 mt-4">
                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Minimum price" id="min" />
                            </div>

                            <div class="col-5">
                                <input type="text" class="form-control" placeholder="Maximum price" id="max" />
                            </div>


                            <button class="btn btn-outline-success col-2" onclick="advSearchProduct(0);">
                                <i class="bi bi-search"></i>Search
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Advance Search -->

        <!-- Carousel -->

        <div class="col-12 d-none d-lg-block mb-3 mt-5">
            <div class="d-flex justify-content-center">
                <div id="carouselExampleIndicators" class="col-10 carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>

                    <div class="carousel-inner shadow">
                        <div class="carousel-item active">
                            <div class="carousel-caption d-none d-md-block poster-caption">
                                <h3 class="poster-title text-black titlecrsl">Renu Foods (pvt) ltd</h3>
                                <p class="poster-txt title02">The World's Best Spices Store.</p>
                            </div>
                            <img src="resources/resoimg/Carousel 1.png" class="d-block img-thumbnail poster-img-1" />
                        </div>
                        <div class="carousel-item">
                            <img src="resources/resoimg/Carousel 2.png" class="d-block img-thumbnail poster-img-1" />
                        </div>
                        <div class="carousel-item">
                            <img src="resources/resoimg/Carousel 3.png" class="d-block img-thumbnail poster-img-1" />
                            <div class="carousel-caption d-none d-md-block poster-caption-1 crsldiv">
                                <h5 class="poster-title titlecrsl">Be Free.....</h5>
                                <p class="poster-txt h3">Experience the Lowest Delivery Costs With Us.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

            </div>
        </div>

        <!-- Carousel -->

        <!-- load product -->
        <div class="row" id="pid">

            <!-- content was taken to userLoadProductProcess.php -->

        </div>
        <!-- load product -->

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