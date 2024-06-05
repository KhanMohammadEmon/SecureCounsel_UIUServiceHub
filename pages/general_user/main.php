<?php
//session_start();
$email1 = $_SESSION['email'];
include '../sqlCommands/connectDb.php';
$sql2 = "SELECT * FROM {$_SESSION['type']} WHERE `email` = '$email1';";
$result1 = mysqli_query($sql, $sql2);
$num1 = mysqli_num_rows($result1);


while ($row = $result1->fetch_assoc()) {
    $gender = $row["gender"];
    $pass = $row["passwords"];
}
?>