<?php
include '../sqlCommands/connectDb.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $roomId = $_POST["roomId"];
    $active = $_POST["active"];

    $query = "UPDATE `room1` SET `active` = '{$active}' WHERE `id` = '{$roomId}'";
    $result = mysqli_query($sql, $query);

    if (!$result) {
        echo "Error updating room status: " . mysqli_error($sql);
    }
}
?>
