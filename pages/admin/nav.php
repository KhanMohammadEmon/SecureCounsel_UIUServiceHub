<?php
include '../sqlCommands/connectDb.php';
include '../general_user/main.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Responsive Admin Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    svg {
        display: block;
        width: 28px;
        height: 28px;
    }
    </style>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>

</head>

<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../general_user/assets/img/Logo.png" alt="" style="width:266px;">
                        </span>
                        <!-- <span class="title">Brand Name</span> -->
                    </a>
                </li>

                <li>
                    <a href="mainPage.php">
                        <span class="icon">
                            <ion-icon name="home-outline"></ion-icon>
                        </span>
                        <span class="title">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="all_user.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">User List</span>
                    </a>
                </li>

                <li>
                    <a href="all_post.php">
                        <span class="icon">
                            <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">All Post</span>
                    </a>
                </li>

                <li>
                    <a href="chat_approve.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Chat Approve</span>
                    </a>
                </li>

                <li>
                    <a href="post.php">
                        <span class="icon">
                            <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">View Post</span>
                    </a>
                </li>

                <li>
                    <a href="loan.php">
                        <span class="icon">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                        <span class="title">Loan Control</span>
                    </a>
                </li>

                <li>
                    <a href="add_shuttle.php">
                        <span class="icon">
                            <ion-icon name="bus"></ion-icon>
                        </span>
                        <span class="title">Add Shuttle </span>
                    </a>
                </li>

                <li>
                    <a href="add_hostel_room.php">
                        <span class="icon">
                            <ion-icon name="bed-outline"></ion-icon>
                        </span>
                        <span class="title">Add Hostel Room</span>
                    </a>

                </li>


                <li>
                    <a href="IP.php">
                        <span class="icon">
                            <!-- Icon for IP -->
                            <ion-icon name="earth-outline"></ion-icon>
                        </span>
                        <span class="title">IP SERVER ADD</span>
                    </a>
                </li>



                <li>
                    <a href="backup.php">
                        <span class="icon">
                            <ion-icon name="cloud-download-outline"></ion-icon>
                        </span>
                        <span class="title">Download Database</span>
                    </a>


                </li>
                <span class="bi--database-down"></span>


                <li>
                    <a href="../login/logout.php">
                        <span class="icon">
                            <ion-icon name="log-out-outline"></ion-icon>
                        </span>
                        <span class="title">Sign Out</span>
                    </a>
                </li>
            </ul>

            <div class="toggle">
                <ion-icon name="caret-back"></ion-icon>
            </div>
        </div>

    </div>

    <!-- =========== Scripts =========  -->
    <script src="../general_user/assets/js/custom.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="../general_user/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../general_user/assets/js/all.min.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>