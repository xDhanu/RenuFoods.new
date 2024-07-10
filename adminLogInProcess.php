<?php

session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];

if (empty($username)) {
    echo ("Please Enter Your Username");
} else if (empty($password)) {
    echo ("Please Enter Your Password");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'");
    $num = $rs->num_rows;

    if ($num == 1) {
        $d = $rs->fetch_assoc();

        if ($d["user_type_id"] == 1) {
            echo ("Success");

            $_SESSION["a"] = $d; //addminge session eka
            
        } else {
            echo ("You, Don't have an Admin Account");
        }
    } else {
        echo ("Invalid Username or Password");
    }
}
