
<?php
    include '../sqlCommands/connectDb.php';
    if(!isset($_SESSION)) 
        { 
            session_start(); 
        }

    $email = $_SESSION['email'];
    
    $sql2 = "SELECT email,`status`,full_name,student_id,phone_number,id SUM(amount) AS total_amount
        FROM loan_application
        GROUP BY email
        HAVING COUNT(email) > 0 AND `status` = 'approved'And email = '$email'";
    $result1 = mysqli_query($sql, $sql2);
    $num1 = mysqli_num_rows($result1);


while ($row = $result1->fetch_assoc()) {
      $name = $row['full_name'];
      $s_id = $row['student_id'];
      $phone_number = $row['phone_number'];
      $loan_id = $row['id'];
      $amount1 = $row['total_amount'];
  }



    $amount = $_POST['taka'];
   
    $p_number = $_POST['number'];

    
    if($amount > $amount1-1)
    {
        $sql4 = "INSERT INTO `loan_payment`(`full_name`, `student_id`, `email`, `phone_number`, `payment_number`, `amount`, `loan_id`) VALUES ('$name','$s_id','$email','$phone_number','$p_number','$amount','$loan_id')";
        $result3 = mysqli_query($sql, $sql4);
        $amount1 = $amount1 - $amount;

        $sql5 = "UPDATE `loan_application` SET `amount`='$amount1' WHERE id = '$loan_id'";
        $result5 = mysqli_query($sql, $sql5);
        
        ?>
        <script>
        window.location.replace("loan.php");
        alert("<?php echo "Successfully Done !"?>");
       </script>

        <?php
    }
    else
    {
       ?>
        <script>
        window.location.replace("loan.php");
        alert("<?php echo "Please enter a valid amount. Please try again later"?>");
       </script>

        <?php
        // header('Location:shuttle_booking.php');

    }
    
?>