<?php

include "connection.php";

$pageno = 0;
$search = $_POST["se"];
$page = $_POST["pg"];

// echo($product);
// echo($page);

if (0 != $page) {
    $pageno = $page;
} else {
    $pageno = 1;
}

$q = "SELECT * FROM `stock` 
INNER JOIN `product` ON  `stock`.`product_id` = `product`.`id` 
WHERE `stock`.`status` = '1'
AND `product`.`name` LIKE '%$search%'";

$rs = Database::search($q);
$num = $rs->num_rows;
// echo($num);

$results_per_page = 8;
$num_of_pages = ceil($num / $results_per_page);
// echo($num_of_pages);

$page_result = ($pageno - 1) * $results_per_page;
// echo($pageno);

$q2 = $q . " LIMIT $results_per_page OFFSET $page_result";
$rs2 = Database::search($q2);
$num2 = $rs2->num_rows;
// echo($num2);

if ($num2 == 0) {
    // Search no results
?>
    <div class="d-flex flex-column align-items-center mt-5">
        <h5>Search no results</h5>
        <p>We're sorry, we cant find any matches for your search term.</p>
    </div>
    <?php

} else {
    // Load Results
    for ($i = 0; $i < $num2; $i++) {
        $d = $rs2->fetch_assoc();

    ?>
        <!-- Card -->
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
        <!-- Card -->
    <?php

    }

    ?>
        <!-- pagination -->
        <div class="d-flex justify-content-center mt-5">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" <?php
                                                                if ($pageno <= 1) {
                                                                    echo ("#");
                                                                } else {
                                                                ?> onclick="searchProduct(<?php echo ($pageno - 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Previous</a></li>

                    <?php

                    for ($y = 1; $y <= $num_of_pages; $y++) {

                        if ($y == $pageno) {

                    ?>
                            <li class="page-item active">
                                <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                            </li>
                        <?php

                        } else {

                        ?>
                            <li class="page-item">
                                <a class="page-link" onclick="searchProduct(<?php echo $y ?>);"><?php echo $y ?></a>
                            </li>
                    <?php

                        }
                    }
                    ?>

                    <li class="page-item"><a class="page-link" <?php
                                                                if ($pageno >= $num_of_pages) {
                                                                    echo ("#");
                                                                } else {
                                                                ?> onclick="searchProduct(<?php echo ($pageno + 1) ?>);" <?php
                                                                                                                    }
                                                                                                                        ?>>Next</a></li>
                </ul>
            </nav>
        </div>
        <!-- pagination -->
<?php
}
