<?php
    session_start();
    include '../sqlCommands/connectDb.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $room_id = $_POST["room_id"];
        $msg = $_POST["msg"];
        $date = date("Y-m-d");
        $time = date("h:i:sa");

        // $query = "insert into chats(room_id , users_id , texts, dates, mtime) values ({$room_id}, {$_SESSION["id"]}, '{$msg}', '{$date}', '{$time}');SET FOREIGN_KEY_CHECKS = 0;";

        $sqlDisableFK = "SET FOREIGN_KEY_CHECKS = 0;";
    $resultDisableFK = mysqli_query($sql, $sqlDisableFK);

     if ($resultDisableFK) {
    // Construct and execute the INSERT query
    $query = "INSERT INTO chats (room_id, users_id, texts, dates, mtime) 
              VALUES ({$room_id}, {$_SESSION["id"]}, '{$msg}', '{$date}', '{$time}')";
    $resultInsert = mysqli_query($sql, $query);

    // Re-enable foreign key checks
    $sqlEnableFK = "SET FOREIGN_KEY_CHECKS = 1;";
    $resultEnableFK = mysqli_query($sql, $sqlEnableFK);

     }
        
        
        //mysqli_query($sql, $query);

        header("Location: chat.php");
    }

?>