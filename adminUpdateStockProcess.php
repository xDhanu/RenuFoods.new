<?php

include "connection.php";

$productId = $_POST["p"];
$qty = $_POST["q"];
$price = $_POST["up"];

//echo($productId);

if ($productId == 0) {
    echo ("Please select product");
} else if (empty($qty)) {
    echo ("please enter unit qty");
} else if (!is_numeric($qty)) {
    echo ("Only numbers can be entered for Qty");
} else if (strlen($qty) > 10) {
    echo ("Your Qty Should be less than 10 Characters");
} else if (empty($price)) {
    echo ("Please Enter Unit Price");
} else if (!is_numeric($price)) {
    echo ("Only numbers can be entered fro Price");
} else if (strlen($price) > 10) {
    echo ("Your Price Should be less than 10 Characters");
} else {
    // echo ("Success");

    $rs = Database::search("SELECT * FROM `stock` WHERE `product_id` ='" . $productId . "' AND  `price` = '" . $price . "'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {
        // Update Query
        $newQty = $d["qty"] + $qty;
        Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` ='" . $d["stock_id"] . "'");
        echo ("Stock Updated Successfully");
    } else {
        //Insert Query
        Database::iud("INSERT INTO `stock` (`price`,`qty`,`product_id`) VALUES ('" . $price . "','" . $qty . "','" . $productId . "')");
        echo ("New Stock Added Successfully");
    }
}
