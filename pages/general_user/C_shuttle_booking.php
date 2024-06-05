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

    $s_id = $_POST['s_id'];
    $rout_id = $_POST['rout_id'];


    $sql3 = "SELECT * FROM `shuttle_add` WHERE id = '$rout_id';";
    $result2 = mysqli_query($sql, $sql3);
    $num2 = mysqli_num_rows($result2);
    while ($row = $result2->fetch_assoc()) {
        $bus_name = $row["busname"];
        $capacity = $row["capacity"];
    }



    $amount = $_POST['taka'];
   
    $p_number = $_POST['number'];

    include 'En_decryption.php';
    $key = $email;
    $E_s_id = simpleEncrypt($s_id, $key);
    $E_email = simpleEncrypt($email, $key);
    $E_phone = simpleEncrypt($phone, $key);
    $E_p_number = simpleEncrypt($p_number, $key);
    






    
    if($amount > 1499)
    {
        $sql4 = "INSERT INTO `shuttle_payment`(`first_name`, `last_name`, `student_id`, `email`, `phone_number`, `payment_number`, `amount`, `route_name`, `route_id`) VALUES ('$first_name','$last_name','$E_s_id','$E_email','$E_phone','$E_p_number','$amount','$bus_name','$rout_id')";
        $result3 = mysqli_query($sql, $sql4);
        $capacity = $capacity - 1;

        $sql5 = "UPDATE `shuttle_add` SET `capacity`='$capacity' WHERE id = '$rout_id'";
        $result5 = mysqli_query($sql, $sql5);
        
        ?>
        <script>
        window.location.replace("shuttle_service.php");
        alert("<?php echo "Successfully Done !"?>");
       </script>

        <?php
    }
    else
    {
       ?>
        <script>
        window.location.replace("shuttle_booking.php");
        alert("<?php echo "Please enter a valid amount. Please try again later"?>");
       </script>

        <?php
        // header('Location:shuttle_booking.php');

    }
    
?>