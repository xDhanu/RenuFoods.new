<?php

include "connection.php";

if (isset($_GET["id"])) {

    $id = $_GET["id"];

    $user_rs = Database::search("SELECT * FROM `user` WHERE `id`='" . $id . "'");
    $user_num = $user_rs->num_rows;

    if ($user_num == 1) {
        $user_data = $user_rs->fetch_assoc();

        if ($user_data["status"] == 1) {
            Database::iud("UPDATE `user` SET `status` = '0' WHERE `id`='" . $id . "'");
            echo ("deactivated");
        } else if ($user_data["status"] == 0) {
            Database::iud("UPDATE `user` SET `status` = '1' WHERE `id`='" . $id . "'");
            echo ("activated");
        }

    }else{
        echo ("Cannot find the user");
    }
}else{
    echo ("somthing went wrong");
}

