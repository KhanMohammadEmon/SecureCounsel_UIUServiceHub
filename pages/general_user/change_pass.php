<?php
        include '../sqlCommands/connectDb.php';
        session_start();
        $npass = $_GET['npass'];
        $email = $_GET['email'];
       
        $q =  "UPDATE {$_SESSION['type']} SET `passwords`='$npass' WHERE email='$email';";
        $run = mysqli_query($sql, $q);
        session_start();
        $_SESSION['email']=null;
        session_destroy();
        header('location:../../index.php');
        $con->close();
?>