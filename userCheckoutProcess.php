<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

if (isset($_POST["payment"])) {

    $payment = json_decode($_POST["payment"], true);

    $date = new DateTime();
    $date->setTimezone(new DateTimeZone("Asia/Colombo"));
    $time = $date->format("Y-m-d H-i-s");

    Database::iud("INSERT INTO `order_history` (`order_id`,`order_date`,`amount`,`user_id`)
    VALUES ('" . $payment["order_id"] . "','" . $time . "','" . $payment["amount"] . "','" . $user["id"] . "')");

    $orderHistoryId = Database::$connection->insert_id; //order history eke id eka hadagannawa

    $rs = Database::search("SELECT * FROM `cart` WHERE `user_id` = '" . $user["id"] . "'");
    $num = $rs->num_rows;

    for ($i = 0; $i < $num; $i++) {
        $d = $rs->fetch_assoc();
        //order item insert
        Database::iud("INSERT INTO `order_item` (`oi_qty`,`order_history_ohid`,`stock_stock_id`)
        VALUES ('" . $d["cart_qty"] . "','" . $orderHistoryId . "','" . $d["stock_stock_id"] . "')");

        $rs2 = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '" . $d["stock_stock_id"] . "'");
        $d2 = $rs2->fetch_assoc();

        $newQty = $d2["qty"] - $d["cart_qty"];
        Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $d["stock_stock_id"] . "'");
    }

    Database::iud("DELETE FROM `cart` WHERE `user_id` = '" . $user["id"] . "'");
    // echo("Success");

    $orderResp = array();
    $orderResp["response"] = "Success";
    $orderResp["order_id"] = $orderHistoryId;

    echo json_encode($orderResp);
}
