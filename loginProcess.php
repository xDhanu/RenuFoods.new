<?php

session_start();
include "connection.php";

$username = $_POST["u"];
$password = $_POST["p"];
$rememberme = $_POST["r"];

if (empty($username)) {
    echo ("Please enter your Username.");
} else if (strlen($username) > 50) {
    echo ("Username must contain LOWER THAN 50 characters.");
} else if (empty($password)) {
    echo ("Please enter your Password.");
} else if (strlen($password) > 45 || strlen($password) < 5) {
    echo ("Password must contain BETWEEN 5 to 45 characters.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `username` = '".$username."' OR `email` = '".$username."' 
    AND `password` = '".$password."'");
    $num = $rs->num_rows;
    $d = $rs->fetch_assoc();

    if ($num == 1) {

        if ($d["status"] == 1) {
            // Active User
            echo ("Success");

            $_SESSION["u"] = $d;

            if ($rememberme == "true") {
                // Set Cookis
                setcookie("username", $username, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
            } else {
                // Destroy Cookie
                setcookie("username", "", -1);
                setcookie("password", "", -1);
            }
            
        } else {
            // Inactive User
            echo ("Inactive User Account! Please Try again an Other Account.");
        }
    } else {
        echo ("Invalid Username OR Password");
    }
}
