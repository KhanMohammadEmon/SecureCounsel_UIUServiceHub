<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
}
$email = $_SESSION['email'];
include '../sqlCommands/connectDb.php';
include 'nav.php';
$sql2 = "SELECT * FROM {$_SESSION['type']} WHERE email = '$email';";
$result1 = mysqli_query($sql, $sql2);
$num1 = mysqli_num_rows($result1);



while ($row = $result1->fetch_assoc()) {
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  $email1 = $row["email"];
  $phone = $row["phone_number"];
  $gender = $row["gender"];
  $pass = $row["passwords"];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>profile</title>
        <link rel="stylesheet" href="../general_user/css/profile.css">
        <link rel="stylesheet" href="../general_user/css/styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="icon" href="../general_user/assets/img/Logo.png">
        <style>
        body {
            font-family: "Dosis";
        }

        .section {
            padding: 100px 0;
            padding-top: 131px;
            padding-bottom: 0;
            position: initial;
        }
        #GFG {
            text-decoration: none;
        }
        </style>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    </head>


</head>

<body>

    <div class="main">
        <section class="section about-section gray-bg" id="about">
            <div class="container">
                <div class="flex-wrap">
                    <div class="d-flex flex-md-row flex-column justify-content-center">

                        <div class="about-avatar ">
                            <?php if ($gender == "Female") {?>
                            <img class="custom" src="../../img/Female.png" alt="img" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                            <?php if ($gender == "Male") { ?>
                            <img class="custom" src="../../img/man.png" alt="img" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                        </div>



                        <div class="about-text go-to"style="margin: 30px 0px 0px 0px;">
                            <h3 class="dark-color"><?php echo $first_name." ".$last_name ?></h3>
                            <div class="about-list">

                                <!-- <div class="media">
                                    <label><i class="fa-solid fa-venus-mars"></i> Gender</label>
                                    <p><?php echo $gender ?></p>
                                </div> -->
                                <div class="media">
                                    <label><i class="fa-solid fa-envelope"></i> Email</label>
                                    <p><?php echo $email ?></p>
                                </div>
                                <div class="media">
                                    <label><i class="fa-solid fa-phone"></i> Phone</label>
                                    <p><?php echo $phone ?></p>
                                </div>
                                <div class="media w-100">
                                    <button onclick="window.location.href='../general_user/edit_profile.php'"
                                        class="btn1"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</button>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

                <?php

                    $r2 = "SELECT COUNT(*) AS num FROM `users` where approve = 0 ";
                    $result2 = $sql->query($r2);

                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();
                        $count = $row2["num"];
                    } else {
                        $count = "0";
                    }

                ?>

                <div class="row" style="margin-top: 30px;">
                    <div class="col-12 col-lg-4 col-md-4 col-sm-4 bc">
                        <div class="count-data text-center">
                            <a href="<?php  ?>" class="count h2"><i class="fa-brands fa-facebook"></i></a>
                            <p class="m-0px font-w-600">Facebook</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-md-4 col-sm-4 bc">
                        <div class="count-data text-center">
                            <a href="<?php ?>" class="count h2"><i class="fa-brands fa-instagram"></i></a>
                            <p class="m-0px font-w-600">Instagram</p>
                        </div>
                    </div>

                    <div class="col-12 col-lg-4 col-lg-4 col-md-4 col-sm-4">
                        <div class="count-data text-center" style="color:red">
                            <a id="GFG" class="count h2"><i class="fa-solid fa-triangle-exclamation"> </i> <?php echo $count ?> </a>
                            <p class="m-0px font-w-600">Waiting Count</p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </div>



    <script src="../general_user/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../general_user/assets/js/all.min.js"></script>
    <script src="../general_user/assets/js/custom.js"></script>

</body>

</html>