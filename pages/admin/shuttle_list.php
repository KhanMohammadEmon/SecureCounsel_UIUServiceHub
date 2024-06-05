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
                        <th>Bus Name</th>
                        <th>Source -> Destination</th>
                        <th>Time</th>
                        <th>Capacity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                                 //$email = $_SESSION['email'];

                                 $r = "SELECT * FROM `shuttle_add`;";
                                 $result = mysqli_query($sql, $r);
                                 if (mysqli_num_rows($result) > 0) {
                                     while ($post_row = mysqli_fetch_assoc($result)) {

                                 ?>
                    <tr>
                        <td><?php echo $post_row['id']; ?></td>
                        <td><?php echo $post_row['busname']; ?></td>
                       
                        <td><?php echo $post_row['source']." -> ".$post_row['destination']?></td>
                        <td><?php echo $post_row['time']?></td>

                        <td><?php echo $post_row['capacity']?></td>
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