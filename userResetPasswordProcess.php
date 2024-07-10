<?php

include "connection.php";

$email = $_POST["un"];
$newPw = $_POST["n"];
$confirmPw = $_POST["r"];
$vcode = $_POST["v"];

// echo ($email);

if ($newPw != $confirmPw) {
    echo ("Retyped password dose not match with the New Password.");
} else {

    $rs = Database::search("SELECT * FROM `user` WHERE `email`= '" . $email . "' AND `v_code`='" . $vcode . "'");
    $num = $rs->num_rows;

    if ($num == 1) {

        Database::iud("UPDATE `user` SET `password`='".$confirmPw."' , `v_code` = NULL WHERE `email` = '".$email."'");
        echo ("Success");
    } else {
        echo ("Invalid Email or Verification Code");
    }
}
