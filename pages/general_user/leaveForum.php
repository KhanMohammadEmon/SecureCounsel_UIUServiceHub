<?php
    session_start();
    include '../sqlCommands/connectDb.php';

    $query = "delete from users where room_id={$_GET["delete_forum"]} and users_id={$_SESSION["id"]}";
    mysqli_query($sql, $query);
    
    $sql -> close();
    header("location:club_forum.php");
?>
