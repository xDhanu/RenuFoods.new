<?php

include "connection.php";
session_start();
$user = $_SESSION["u"];

$fname = $_POST["f"];
$lname = $_POST["l"];
$email = $_POST["e"];
$mobile = $_POST["m"];
$pw = $_POST["p"];
$no = $_POST["n"];
$line1 = $_POST["l1"];
$line2 = $_POST["l2"];

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
} else if (empty($pw)) {
    echo ("Please enter your Password.");
} else if (strlen($pw) < 5 || strlen($pw) > 45) {
    echo ("The password must contain 5 to 45 characters.");
} else if (empty($no)) {
    echo ("Please enter your Address Number.");
} else if (strlen($no) > 10) {
    echo ("First Name must contain LOWER THAN 10 Characters.");
} else if (empty($line1)) {
    echo ("Please enter your Address Line 1.");
} else if (strlen($line1) > 50) {
    echo ("First Name must contain LOWER THAN 50 Characters.");
} else if (empty($line2)) {
    echo ("Please enter your Address Line 1.");
} else if (strlen($line2) > 50) {
    echo ("First Name must contain LOWER THAN 50 Characters.");
} else {

    Database::iud("UPDATE `user` SET `fname` = '" . $fname . "', `lname` = '" . $lname . "', `email` = '" . $email . "',
    `mobile` = '" . $mobile . "',`password` = '" . $pw . "', `no` = '" . $no . "', `line_1` = '" . $line1 . "', `line_2` = '" . $line2 . "'
    WHERE `id` = '" . $user["id"] . "'");

    $rs = Database::search("SELECT * FROM `user` WHERE `id` = '" . $user["id"] . "'");
    $d = $rs->fetch_assoc();
    $_SESSION["u"] = $d;

    echo ("Success");
}
