<?php

include '../sqlCommands/connectDb.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$status = $_POST['new'];

$sql1 = "UPDATE `request_shuttle` SET `status`= '$status' WHERE id = '$_POST[id]' ";
$result1 = mysqli_query($sql, $sql1);
?>

<script>
window.location.replace("mainPage.php");
alert("<?php echo "Successfully Done !"?>");
</script>
<?
?>