<?php

include "connection.php";

$grade = $_POST["grade"];

// echo($brand); 

if (empty($grade)) {
    echo ("Please Enter Product Grade");
} else if (strlen($grade) > 20) {
    echo ("Product Grade Shuld be less than 20 Characters");
} else {

    $rs = Database::search("SELECT * FROM `grade` WHERE `grade_name` = '" . $grade . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("Product Grade is allredy exists");
    } else {
        Database::iud("INSERT INTO `grade` (`grade_name`) VALUE ('" . $grade . "')");
        echo ("Success");
    }
}
