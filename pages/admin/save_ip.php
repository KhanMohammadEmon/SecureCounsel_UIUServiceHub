<?php
include '../sqlCommands/connectDb.php';
if ($sql->connect_error) {
    die("Connection failed: " . $sql->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ip = $_POST["ip"];
    $r1 = "INSERT INTO `ip` (`ip`) VALUES ('$ip')";

    if ($sql->query($r1) === TRUE) {
        header("Location: IP.php");
        exit();
    } else {
        echo "Error: " . $r1 . "<br>" . $conn->error;
    }
}

$conn->close();
?>
