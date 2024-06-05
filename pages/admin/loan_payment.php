<?php
//session_start();
include '../sqlCommands/connectDb.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  

    <style>
    body {
        font-family: "Dosis";
    }

    .card .p-1 {
        margin-bottom: 100px !important;
    }
    </style>

</head>

<body>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Student Id</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Amount</th>
                        <th>Loan ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                                 //$email = $_SESSION['email'];

                                 $r = "SELECT * FROM `loan_payment`";
                                 $result = mysqli_query($sql, $r);
                                 if (mysqli_num_rows($result) > 0) {
                                     while ($post_row = mysqli_fetch_assoc($result)) {

                                 ?>
                    <tr>
                        <td><?php echo $post_row['id']; ?></td>
                        <td><?php echo $post_row['full_name']; ?></td>
                        <td><?php echo $post_row['student_id']?></td>
                        <td><?php echo $post_row['email']?></td>
                        <td><?php echo $post_row['phone_number']?></td>
                        <td><?php echo $post_row['amount']?></td>
                        <td><?php echo $post_row['loan_id']?></td>
                    </tr>
                    <?php

                                     }
                                 }

                                 ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>