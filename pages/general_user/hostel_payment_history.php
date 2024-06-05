<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Payment History</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="assets/img/Logo.png">
    <style>
        body {
            font-family: "Dosis";
        }
        .card .p-1{
            margin-bottom: 100px !important;
        }
    </style>

      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>

</head>

<body>

<body>

<nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm p-3 bg-white">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">
                <img src="img/logo.png" alt="" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="mainPage.php"> <i
                                class="fa-solid fa-home-user"> </i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="hostel_service.php"> <i
                                class="fa-solid fa-hotel"></i> Hostel Services </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="apply_for_hostel_booking.php"> <i
                                class="fa-solid fa-file-arrow-up"> </i> Apply Booking </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../vr/render/index.htm"> <i
                                class="fa-solid fa-street-view"></i> View</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../vr1/index.htm"> <i class="fa-solid fa-street-view"></i> View1</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="hostel_payment_history.php"><i class="fa-solid fa-history"></i> Payment History</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown">
                            <?php if ($gender == "Female") {?>
                            <img class="dropdown-toggle pro" src="../../img/Female.png" alt="img"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                            <?php if ($gender == "Male") { ?>
                            <img class="dropdown-toggle pro" src="../../img/man.png" alt="img" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                            <?php if ($gender != "Male" && $gender != "Female") { ?>
                            <img class="dropdown-toggle pro"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="img"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> My
                                        Profile</a></li>
                                <li><a class="dropdown-item"
                                        onclick="cpass('<?php echo $_SESSION['email']?>', '<?php echo $pass; ?>')"><i
                                            class="fa-solid fa-key"></i> Change Password</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i
                                            class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>





<div class="container py-5 shuttle-container" style = "margin : 100px">
   
<div class="card-body">

<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone Number</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Room ID</th>
                
            </tr>
        </thead>
        <tbody>
            <?php


                         $r = "SELECT * FROM `hostel_payment` where email = '$email'";
                         $result = mysqli_query($sql, $r);
                         if (mysqli_num_rows($result) > 0) {
                             while ($post_row = mysqli_fetch_assoc($result)) {

                         ?>
            <tr>
                <td><?php echo $post_row['id']; ?></td>
                <td><?php echo $post_row['full_name'] ?></td>
                <td><?php echo $post_row['phone_number']?></td>
                <td><?php echo $post_row['date']?></td>
                <td><?php echo $post_row['amount']?></td>
                <td><?php echo $post_row['room_id']?></td>
            </tr>
            <?php

                             }
                         }

                         ?>
        </tbody>
    </table>
</div>
</div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/all.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>

</html>
