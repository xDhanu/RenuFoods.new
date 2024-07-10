<?php

include "connection.php";


$rs = Database::search("SELECT * FROM `user` WHERE `user_type_id` = '2'");

$num = $rs->num_rows;

for ($i = 0; $i < $num; $i++) {
    $d = $rs->fetch_assoc(); //fetch_assoc eka for loop eke athule danna one naththam ekama data repeat wenawa hama welema next row eka read wenne.
?>

    <tr>
        <td scope="row"><?php echo $d["id"] ?></th>
        <td><?php echo $d["fname"] ?></td>
        <td><?php echo $d["lname"] ?></td>
        <td><?php echo $d["email"] ?></td>
        <td><?php echo $d["mobile"] ?></td>
        <td><?php
            if ($d["status"] == 1) {
                ?>
                 <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="active<?php echo $d["id"] ?>" checked onclick="updateUserStatus('<?php echo $d['id'] ?>');">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Active</label>
                </div>
                <?php
                
            } else {
                ?>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="deactive<?php echo $d["id"] ?>" onclick="updateUserStatus('<?php echo $d['id'] ?>');">
                    <label class="form-check-label" for="flexSwitchCheckChecked">Dective</label>
                </div>
            <?php
            }
            ?>

        </td>
    </tr>

<?php
}
?>