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

    $orderHistoryId = Database::$connection->insert_id;

    Database::iud("INSERT INTO `order_item` (`oi_qty`,`order_history_ohid`,`stock_stock_id`)
    VALUES ('" . $payment["qty"] . "','" . $orderHistoryId . "','" . $payment["stock_id"] . "')");

    $rs = Database::search("SELECT * FROM `stock` WHERE `stock_id` = '" . $payment["stock_id"] . "'");
    $d = $rs->fetch_assoc();

    $newQty = $d["qty"] - $payment["qty"];
    Database::iud("UPDATE `stock` SET `qty` = '" . $newQty . "' WHERE `stock_id` = '" . $payment["stock_id"] . "'");

    // echo("Success");
    
    $orderResp = array();
    $orderResp["response"] = "Success";
    $orderResp["order_id"] = $orderHistoryId;

    echo json_encode($orderResp);
}
