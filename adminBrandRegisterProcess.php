<?php

include "connection.php";

$brand = $_POST["b"];

// echo($brand); 

if (empty($brand)) {
    echo ("Please Enter Your Brand Name");
} else if (strlen($brand) > 20) {
    echo ("Your Brand Name Shuld be less than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `brand` WHERE `brand_name` = '" . $brand . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your brand name is allredy exists");
    } else {
        Database::iud("INSERT INTO `brand` (`brand_name`) VALUE ('" . $brand . "')");
        echo ("Success");
    }
}
