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
    <title>Document</title>

    <!-- ======= Styles ====== -->

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
                        <th>Phone Number</th>
                        <th>Source -> Destination</th>
                        <th>Time</th>
                        
                        <th>Status</th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php

                                 //$email = $_SESSION['email'];

                                 $r = "SELECT * FROM `request_shuttle` where status = 'pending'or status = 'approved'";
                                 $result = mysqli_query($sql, $r);
                                 if (mysqli_num_rows($result) > 0) {
                                     while ($post_row = mysqli_fetch_assoc($result)) {

                                 ?>
                    <tr>
                        <td><?php echo $post_row['id']; ?></td>
                        <td><?php echo $post_row['first_name']." ".$post_row['last_name']; ?></td>
                        <td><?php echo $post_row['student_id']?></td>
                        <td><?php echo $post_row['phone_number']?></td>
                        <td><?php echo $post_row['source']." -> ".$post_row['destination']?></td>
                        <td><?php echo $post_row['time']?></td>


                        <td>
                            <?php  if($_SESSION['type']=='admin'){?>
                            <form action="update_status.php" method="post">
                                <select class="form-control" name="new" required>
                                    <option value="" selected hidden disabled><?php echo $post_row['status']; ?>
                                    </option>
                                    <option value="pending">Pending</option>
                                    <option value="approved">Approved</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                                  
                                <button type="submit"class = "btn btn-success" name="submit" style = "margin : 5px">Update Status</button>
                                <input type="hidden" name="id" value="<?php echo $post_row['id']; ?>">
                                
                            </form>
                            <?php } 
                            else
                            {
                                echo $post_row['status'];
                            }
                            ?>
                            

                        </td>
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