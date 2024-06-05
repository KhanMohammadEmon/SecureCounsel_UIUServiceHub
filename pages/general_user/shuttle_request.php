<?php 
include '../sqlCommands/connectDb.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

$email = $_SESSION['email'];
$sql2 = "SELECT * FROM {$_SESSION['type']} WHERE email = '$email';";
$result1 = mysqli_query($sql, $sql2);
$num1 = mysqli_num_rows($result1);


while ($row = $result1->fetch_assoc()) {
    $first_name = $row["first_name"];
    $last_name = $row["last_name"];
    $phone = $row["phone_number"];
   
  }

$msg = "";



if(isset($_POST['submit'])){
    $student_id = $_POST['id'];
    $source= $_POST['source'];
    $destination = $_POST['destination'];
    $time = $_POST['time'];

    
$r = "INSERT INTO request_shuttle( `first_name`, `last_name`, `student_id`, `email`, `phone_number`, `source`, `destination`, `time`) VALUES ('$first_name', '$last_name', '$student_id', '$email', '$phone', '$source', '$destination', '$time')";
    $result = mysqli_query($sql, $r);

    if ($result) {
        $msg = "<div class='alert alert-success'>Post added successful.</div>";
        $_POST['id'] = "";
        $_POST['source'] = "";
        $_POST['destination'] = "";
        $_POST['time'] = "";
        

        header("Location: request_new_shuttle.php");
    } else {
        $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later.</div>";
    
    }

    $sql -> close();
}

?>