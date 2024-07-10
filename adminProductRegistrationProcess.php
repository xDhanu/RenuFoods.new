<?php

include "connection.php";

$pname = $_POST["pname"];
$brand = $_POST["brand"];
$cat = $_POST["cat"];
$grade = $_POST["grade"];
$size = $_POST["size"];
$desc = $_POST["desc"];

if (empty($pname)) {
    echo ("Please enter your product brand.");
} else if (strlen($pname) > 50) {
    echo ("Your Product Name Shuld be less than 20 Characters");
} else if ($brand == 0) {
    echo ("Please select a brand");
} else if ($cat == 0) {
    echo ("Please select a Category");
} else if ($grade == 0) {
    echo ("Please select a Grade");
} else if ($size == 0) {
    echo ("Please select a Size");
} else if (empty($desc)) {
    echo ("Please add your product Description.");
} else if (strlen($desc) > 1000) {
    echo ("Your Description Shuld be less than 100 Characters");
} else {

    if (isset($_FILES["image"])) {
        $image = $_FILES["image"];

        $path = "resources/productimg/" . uniqid() . ".png";
        move_uploaded_file($image["tmp_name"], $path);

        $rs = Database::search("SELECT * FROM `product` WHERE `name` = '$pname'");
        $num = $rs->num_rows;

        if ($num > 0) {
            echo ("Product has been alredy exists!");
        } else {
            Database::iud("INSERT INTO `product`(`name`, `description`, `path`, `grade_grade_id`, 
            `category_cat_id`, `brand_brand_id`, `size_size_id`) VALUES ('$pname', '$desc', '$path', 
            '$grade', '$cat', '$brand', '$size')");

            echo ("Success");
        }
    } else {
        echo ("please select a product image");
    }
}
