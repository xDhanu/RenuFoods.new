<?php

include "connection.php";


$rs = Database::search("SELECT * FROM `stock`
INNER JOIN `product` ON `stock`.product_id = `product`.id
INNER JOIN `brand` ON `product`.brand_brand_id = `brand`.brand_id
INNER JOIN `grade` ON `product`.grade_grade_id = `grade`.grade_id
INNER JOIN `category` ON `product`.category_cat_id = `category`.cat_id
INNER JOIN `size` ON `product`.size_size_id = `size`.size_id;");

$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc();
?>

    <tr>
        <td scope="row"><?php echo $d["id"] ?></th>
        <td><?php echo $d["name"] ?></td>
        <td><?php echo $d["brand_name"] ?></td>
        <td><?php echo $d["cat_name"] ?></td>
        <td><?php echo $d["grade_name"] ?></td>
        <td><?php echo $d["size_name"] ?></td>
        <td>Rs : <?php echo $d["price"] ?></td>
        <td><img src="<?php echo $d["path"] ?>" height="100" /></td>
        <td><?php
            if ($d["status"] == 1) {
            ?>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="active<?php echo $d["stock_id"] ?>" checked onclick="updateProductStatus('<?php echo $d['stock_id'] ?>');">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                </div>
            <?php

            } else {
            ?>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="deactive<?php echo $d["stock_id"] ?>" onclick="updateProductStatus('<?php echo $d['stock_id'] ?>');">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Dective</label>
                </div>
            <?php
            }
            ?>
            <a href="adminStock.php" class=""><button class="btn btn-outline-success mt-2 col-10">Update</button></a>

        </td>
    </tr>

<?php
}
?>