<?php
session_start();
include '../sqlCommands/connectDb.php';
$f_q = "select * from ip";
$f_query = mysqli_query($sql, $f_q);
?>
<?php include 'nav.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <link rel="stylesheet" href="../general_user/assets/css/style.css">
    
    <link rel="stylesheet" href="assets/css/style1.css">


    <style>
    body {
        font-family: "Dosis";
    }

    .card .p-1 {
        margin-bottom: 100px !important;
    }
    </style>


</head>
<title>All Post</title>

<link rel="icon" href="./general_user/img/Logo.png">
</head>
<title>All Post</title>

</head>

<body>



    <!-- Begin Page Content -->
    <div class="container" style ="padding:0px !important">
    

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800">IP ADDRESS:</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h5>Add IP Address</h5>
                <form action="save_ip.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="ip" class="form-control" placeholder="Enter IP Address" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mt-3">
                <!-- <h2 class="border-bottom-uiu">:</h2> -->
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>IP ADDRESS</th>
                        <th>Action</th>
                    </tr>
                    <?php if (mysqli_num_rows($f_query) == 0) : ?>
                    <tr>
                        <td colspan="4">No IP yet</td>
                    </tr>
                    <?php else : ?>

                    <?php while ($f_row = mysqli_fetch_assoc($f_query)) : ?>
                    <tr>
                        <td><?= $f_row["ID"] ?></td>
                        <td><?= $f_row["ip"] ?></td>
                        <td>
                            <div>
                                <a href="delete_ip.php?id=<?= $f_row["ID"] ?>" title="Delete"><i
                                        class="fas fa-trash"></i></a>

                            </div>
                        </td>
                    </tr>
                    <?php endwhile ?>

                    <?php endif ?>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->



 

    <script src="../general_user/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../general_user/assets/js/all.min.js"></script>
    <script src="../general_user/assets/js/login_validation.js"></script>
    <script src="../general_user/assets/js/app.js"></script>
</body>

</html>