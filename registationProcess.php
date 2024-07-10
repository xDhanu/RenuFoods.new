<?php

include "connection.php";

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$username = $_POST["u"];
$password = $_POST["p"];


if (empty($fname)) {
    echo ("Please enter your First Name.");
} else if (strlen($fname) > 20) {
    echo ("First Name must contain LOWER THAN 20 Characters.");
} else if (empty($lname)) {
    echo ("Please enter your Last Name.");
} else if (strlen($lname) > 20) {
    echo ("Last Name must contain LOWER THAN 20 Characters.");
} else if (empty($email)) {
    echo ("Please enter your Email Address.");
} else if (strlen($email) > 100) {
    echo ("Email Address must contain LOWER THAN 100 Characters.");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email Address.");
} else if (empty($mobile)) {
    echo ("Please enter your Mobile Number.");
} else if (strlen($mobile) != 10) {
    echo ("Mobile Number must contain 10 Characters.");
} else if (!preg_match("/07[0,1,2,4,5,6,7,8]{1}[0-9]{7}/", $mobile)) {
    echo ("Invalid Mobile Number.");
} else if (empty($username)) {
    echo ("Please enter your Username Number.");
} else if (strlen($username) > 50) {
    echo ("Username must contain LOWER THAN 50 Characters.");
} else if (empty($password)) {
    echo ("Please enter your Password.");
} else if (strlen($password) < 5 || strlen($password) > 45) {
    echo ("The password must contain 5 to 45 characters.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`='" . $email . "' OR `mobile`='" . $mobile . "' OR `username`='" . $username . "'");
    $num = $rs->num_rows;

    if ($num > 0) {
        echo ("User with the same Email Address, Mobile Number or Username already exists.");
    } else {

        Database::iud("INSERT INTO `user`(`fname`,`lname`,`email`,`mobile`,`username`,`password`,`user_type_id`) VALUES 
        ('" . $fname . "','" . $lname . "','" . $email . "','" . $mobile . "','" . $username . "','" . $password . "','2')");

        echo ("Success");
    }
}
