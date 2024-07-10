<?php

include "connection.php";

$delivery = $_POST["df"];

// echo ($delivery);

if (empty($delivery)) {
    echo ("Please enter new Delivery fee");
} else if (strlen($delivery) > 4) {
    echo ("Your Delivery fee should be less than 4 Characters");
} else if (!is_numeric($delivery)) {
    echo ("You can enter your Delivery fee in numbers only!");
} else {
    // echo ("Success");

    Database::iud("UPDATE `delivery`SET `delivery_fee` = '".$delivery."' WHERE `delivery_id` = '1'");

    echo ("Delivery fee Successfully Updated!");

}
