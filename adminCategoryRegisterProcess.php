<?php

include "connection.php";

$category = $_POST["c"];

// echo($brand); 

if (empty($category)) {
    echo ("Please Enter Your Category Name");
} else if (strlen($category) > 20) {
    echo ("Your Brand Name Shuld be less than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `category` WHERE `cat_name` = '" . $category . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Your Category name is allredy exists");
    } else {
        Database::iud("INSERT INTO `category` (`cat_name`) VALUE ('" . $category . "')");
        echo ("Success");
    }
}
