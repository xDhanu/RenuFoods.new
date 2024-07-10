<?php

include "connection.php";
session_start();

$user = $_SESSION["u"];
$netTotal = 0;

$rs = Database::search("SELECT * FROM `cart` 
INNER JOIN `stock` ON `cart`.stock_stock_id = `stock`.stock_id 
INNER JOIN `product` ON `stock`.product_id = `product`.`id` 
INNER JOIN `grade` ON `product`.grade_grade_id = `grade`.grade_id 
INNER JOIN `size` ON `product`.size_size_id = `size`.`size_id` 
WHERE `cart`.`user_id` = '" . $user["id"] . "'");

$num = $rs->num_rows;

if ($num > 0) {
    //Load Cart

?>
    <?php
    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();

        $total = $d["price"] * $d["cart_qty"];
        $netTotal += $total; //$netTotal = $netTotal + $total

    ?>

        <!-- Cart Item -->
        <div class="d-flex justify-content-end">
            <div class="col-10 row border border-3 bg-white shadow rounded-3 border-primary p-3 mb-2 d-flex justify-content-between justify-content-sm-center">

                <div class="col-12 col-lg-2 col-md-5 col-sm-12 me-5">
                    <img src="<?php echo $d["path"] ?>" width="200px" />
                </div>

                <div class="col-12 col-lg-3 col-md-5 col-sm-12">
                    <h4><?php echo $d["name"] ?></h4>
                    <p class="text-muted mb-0 mt-2">Grade : <?php echo $d["grade_name"] ?></p>
                    <p class="text-muted">Size: <?php echo $d["size_name"] ?></p>
                    <h5 class="text-primary">Rs: <?php echo $d["price"] ?>.00</h5>
                </div>

                <div class="d-flex align-items-center col-12 col-lg-2 col-md-4 col-sm-12 gap-1">
                    <button class="btn btn-outline-success btn-sm" onclick="decrementCartQty('<?php echo $d['cart_id'] ?>');">-</button>
                    <input type="number" id="qty<?php echo $d['cart_id'] ?>" class="form-control form-control-sm text-center" style="max-width: 100px;" value="<?php echo $d["cart_qty"] ?>" disabled />
                    <button class="btn btn-outline-danger btn-sm" onclick="incrementCartQty('<?php echo $d['cart_id'] ?>');">+</button>
                </div>

                <div class="d-flex align-items-center col-12 col-lg-2 ms-5 col-md-4 col-sm-12">
                    <h4>Total :<span class="text-danger h4"> Rs.<?php echo $total ?>.00</span></h4>
                </div>

                <div class="d-flex align-items-center col-12 col-lg-1 col-md-4 col-sm-12">
                    <button class="btn btn-sm" onclick="removeCart('<?php echo $d['cart_id'] ?>')"><i class="bi bi-trash text-danger h4"></i></button>
                </div>
            </div>
        </div>
        <!-- Cart Item -->
    <?php

    }
    ?>

    <!-- checkout -->
    <div class="d-flex justify-content-end">
        <div class="col-12 col-lg-3 col-md-4 col-sm-12">
            <hr>
            <h5>Number of Items: <span class="text-danger h5"><?php echo ($num) ?></span></h5>
            <?php
            $rs2 = Database::search("SELECT * FROM `delivery` WHERE `delivery_id` = '1';");
            $d2 =  $rs2->fetch_assoc();
            ?>
            <h5>Delivary Fee: <span class="text-muted text-secondary h5">Rs. <?php echo $d2["delivery_fee"] ?>.00</span> </h5>
            <h4>Net Total: <span class="text-success h4">Rs. <?php echo ($netTotal + $d2["delivery_fee"]) ?>.00</span> </h4>
            <button class="btn btn-success col-12 mt-1 mb-4" onclick="checkout();">Check Out</button>
        </div>
    </div>
    <!-- checkout -->
<?php

} else {

?>
    <div class="col-12 text-center  mt-5">
        <h2>Your Cart is Empty!</h2>
        <a href="index.php" class="btn btn-primary mt-3">Start Shopping</a>
    </div>
<?php
}
