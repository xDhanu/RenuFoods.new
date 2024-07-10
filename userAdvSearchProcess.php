<?php

include "connection.php";

$pageno = 0;

$page = $_POST["pg"];

$grade = $_POST["gr"];
$cat = $_POST["cat"];
$brand = $_POST["b"];
$size = $_POST["s"];
$minPrice = $_POST["min"];
$maxPrice = $_POST["max"];

$status = 0;

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock`
INNER JOIN `product` ON `stock`.product_id = `product`.id
INNER JOIN `brand` ON `product`.brand_brand_id = `brand`.brand_id
INNER JOIN `grade` ON `product`.grade_grade_id = `grade`.grade_id
INNER JOIN `category` ON `product`.category_cat_id = `category`.cat_id
INNER JOIN `size` ON `product`.size_size_id = `size`.size_id";

// SEARCH BY COLOR
if ($status == 0 && $grade != 0) {
    // 1st time search by color (WHERE CLOSE)
    $q .= " WHERE `grade`.grade_id = '" . $grade . "' AND `stock`.`status` = '1'";
    $status = 1;
} else if ($status != 0 && $color != 0) {
    // 1st time search by color (AND)
    $q .= " AND `grade`.grade_id = '" . $grade . "' AND`stock`.`status` = '1'";
}

// SEARCH BY CATEGORY
if ($status == 0 && $cat != 0) {
    // 1st time search by color (WHERE CLOSE)
    $q .= " WHERE `category`.cat_id = '" . $cat . "' AND `stock`.`status` = '1'";
    $status = 1;
} else if ($status != 0 && $cat != 0) {
    // 1st time search by color (AND)
    $q .= " AND `category`.cat_id = '" . $cat . "' AND `stock`.`status` = '1'";
}

// SEARCH BY BRAND
if ($status == 0 && $brand != 0) {
    // 1st time search by color (WHERE CLOSE)
    $q .= " WHERE `brand`.brand_id = '" . $brand . "' AND `stock`.`status` = '1'";
    $status = 1;
} else if ($status != 0 && $brand != 0) {
    // 1st time search by color (AND)
    $q .= " AND `brand`.brand_id = '" . $brand . "' AND `stock`.`status` = '1'";
}

// SEARCH BY SIZE
if ($status == 0 && $size != 0) {
    // 1st time search by color (WHERE CLOSE)
    $q .= " WHERE `size`.size_id = '" . $size . "' AND `stock`.`status` = '1'";
    $status = 1;
} else if ($status != 0 && $brand != 0) {
    // 1st time search by color (AND)
    $q .= " AND `size`.size_id = '" . $size . "' AND `stock`.`status` = '1'";
}

// SEARCH BY MIN PRICE
if (!empty($minPrice) && empty($maxPrice)) {
    if ($status == 0) {
        // 1st time search by color (WHERE CLOSE)
        $q .= " WHERE `stock`.price <= '" . $minPrice . "' AND `stock`.`status` = '1' ORDER BY `stock`.price ASC";
        $status = 1;
    } else if ($status != 0) {
        // 1st time search by color (AND)
        $q .= " AND `stock`.price >= '" . $minPrice . "' AND `stock`.`status` = '1' ORDER BY `stock`.price ASC";
    }
}

// SEARCH BY MAX PRICE
if (empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        // 1st time search by color (WHERE CLOSE)
        $q .= " WHERE `stock`.price >= '" . $maxPrice . "' AND `stock`.`status` = '1' ORDER BY `stock`.price ASC";
        $status = 1;
    } else if ($status != 0) {
        // 1st time search by color (AND)
        $q .= " AND `stock`.price <= '" . $maxPrice . "' AND `stock`.`status` = '1' ORDER BY `stock`.price ASC";
    }
}

// SEARCH BY PRICE RANGE
if (!empty($minPrice) && !empty($maxPrice)) {
    if ($status == 0) {
        // 1st time search by color (WHERE CLOSE)
        $q .= " WHERE `stock`.price BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' AND `stock`.`status` = '1' ORDER BY `stock`.price ASC";
        $status = 1;
    } else if ($status != 0) {
        // 1st time search by color (AND)
        $q .= " AND `stock`.price BETWEEN '" . $minPrice . "' AND '" . $maxPrice . "' AND `stock`.`status` = '1' ORDER BY `stock`.price ASC";
    }
}

// SEARCH BY PRICE RANGE

$rs = Database::search($q);
$num = $rs->num_rows;

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
$page_results = ($pageno - 1) * $results_per_page;

$q2 = $q . " LIMIT $results_per_page OFFSET $page_results";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;

if ($num2 == 0) {
    # Search No result
?>
    <div class="d-flex align-items-center flex-column mt-5">
        <h5>Search No Results</h5>
        <p>We're Sorry , We cannot find any matches for your search term...</p>
    </div>
    <?php

} else {
    # Load page
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

    ?>
        <!-- card -->
        <div class="col-6 col-lg-3 col-sm-4 mt-5 d-flex justify-content-center">
            <div class="card shadow " style="width: 300px;">
                <a href="userSingleProductView.php?s=<?php echo $d["stock_id"] ?>"><img src="<?php echo $d["path"] ?>" class="card-img-top"></a>
                <div class="card-body">
                    <h5 class="card-title"><?php echo $d["name"] ?></h5>
                    <h4 class="card-text">Price : <?php echo $d["price"] ?>.00</h4>
                    <div class="d-flex col-12 rounded rounded-2 justify-content-center">
                        <a href="userSingleProductView.php?s=<?php echo $d["stock_id"] ?>" class="btn btn-outline-danger col-12"><i class="bi bi-bag-heart h4"></i> Purchase</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- card -->
    <?php
    }

    ?>
    <!-- pagination -->
    <div class="d-flex justify-content-center mt-5">
        <nav aria-label="Page navigation example ">
            <ul class="pagination">
                <!-- <li class="page-item"><a class="page-link" href="#">Previous</a></li> -->
                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno <= 1) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="advSearchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous></a></li>


                <?php
                for ($y = 1; $y <= $num_of_pages; $y++) {

                    if ($y == $pageno) {

                ?>
                        <li class="page-item active">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                    <?php

                    } else {

                    ?>
                        <li class="page-item">
                            <a class="page-link" onclick="advSearchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                        </li>
                <?php
                    }
                }
                ?>

                <li class="page-item"><a class="page-link" <?php

                                                            if ($pageno >= $num_of_pages) {
                                                                echo ("#");
                                                            } else {
                                                            ?> onclick="advSearchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
            </ul>
        </nav>
        <!-- pagination -->

    </div>
<?php
}
