<?php
include '../sqlCommands/connectDb.php';
session_start();
$email = $_SESSION['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST"){

        
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $phone = $_POST['phone'];
            $gender = $_POST['gender'];
            

            $r = "UPDATE {$_SESSION['type']} SET `first_name`='$first_name',`last_name`='$last_name',`phone_number`='$phone',`gender`='$gender' WHERE `email` = '$email';";
            $result = mysqli_query($sql, $r);
            if($_SESSION['type']=='general_user')
            header("Location:profile.php");
            else
            header("Location:../forumRep/mainPage.php");
            exit();
        
        }
?>
