<?php

include "connection.php";

$size = $_POST["size"];

// echo($brand); 

if (empty($size)) {
    echo ("Please Enter Your size");
} else if (strlen($size) > 20) {
    echo ("Your size Shuld be less than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `size` WHERE `size_name` = '" . $size . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your size is allredy exists");
    } else {
        Database::iud("INSERT INTO `size` (`size_name`) VALUE ('" . $size . "')");
        echo ("Success");
    }
}
