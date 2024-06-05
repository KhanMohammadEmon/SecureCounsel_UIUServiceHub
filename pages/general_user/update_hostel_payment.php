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
    $name = $first_name . " " . $last_name;
    $phone = $row["phone_number"];
   
  }

   // $s_id = $_POST['s_id'];
    $rout_id = $_POST['r_id'];


    $sql3 = "SELECT * FROM `hostel_rooms` WHERE id = '$rout_id';";
    $result2 = mysqli_query($sql, $sql3);
    $num2 = mysqli_num_rows($result2);
    while ($row = $result2->fetch_assoc()) {
        $bus_name = $row["type"];
        $capacity = $row["available_room"];
    }



    $amount = $_POST['taka'];
   
    $p_number = $_POST['number'];

    $date = date("Y-m-d");

    
    if($amount > 1499)
    {
        $sql4 = "INSERT INTO `hostel_payment`( `full_name`, `date`,`email`, `phone_number`, `payment_number`, `amount`, `room_id`) VALUES ('$name','$date','$email','$phone','$p_number','$amount','$rout_id')";
        $result3 = mysqli_query($sql, $sql4);
        $capacity = $capacity - 1;

        $sql5 = "UPDATE `hostel_rooms` SET `available_room`='$capacity' WHERE id = '$rout_id'";
        $result5 = mysqli_query($sql, $sql5);
        
        ?>
        <script>
        window.location.replace("hostel_service.php");
        alert("<?php echo "Successfully Done !"?>");
       </script>

        <?php
    }
    else
    {
       ?>
        <script>
        window.location.replace("hostel_service.php");
        alert("<?php echo "Please enter a valid amount. Please try again later"?>");
       </script>

        <?php

    }
    
?>