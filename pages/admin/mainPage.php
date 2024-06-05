<?php
session_start();
include "nav.php";
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


</head>

<body>

    <div class="container">
        <!-- ========================= Main ==================== -->
        <div class="main">
            <div class="topbar">
                <div class="search">
                    <label>
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>

                <div class="user">
                  <img src="assets/imgs/customer01.jpg" alt="">
                </div>
            </div>

            <!-- ======================= Cards ================== -->

            <?php

                $r = "SELECT COUNT(*) AS total_posts FROM posts";
                $result = $sql->query($r);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalPosts = $row["total_posts"];
                } else {
                    $totalPosts = "No posts found.";
                }

            ?>
            <div class="cardBox">
                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$totalPosts"?></div>
                        <div class="cardName">Total post</div>
                    </div>

                    <div class="iconBx">
                      <ion-icon name="albums-outline"></ion-icon>
                    </div>
                </div>


                <?php

                    $r1 = "SELECT COUNT(*) AS total_loan FROM `loan_application`";
                    $result1 = $sql->query($r1);

                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();
                        $total_loanReq = $row1["total_loan"];
                    } else {
                        $total_loanReq = "No Req found.";
                    }


                ?>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$total_loanReq"?></div>
                        <div class="cardName">Total loan request</div>
                    </div>

                    <div class="iconBx">
                        <iconify-icon icon="game-icons:cash"></iconify-icon>
                    </div>
                </div>

                <?php

                    $r2 = "SELECT COUNT(*) AS post FROM `post_comment`";
                    $result2 = $sql->query($r2);

                    if ($result2->num_rows > 0) {
                        $row2 = $result2->fetch_assoc();
                        $comment = $row2["post"];
                    } else {
                        $comment = "No Req found.";
                    }

                ?>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo "$comment"?></div>
                        <div class="cardName">Comments</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="chatbubbles-outline"></ion-icon>
                    </div>
                </div>

                <?php

                    $r3 = "SELECT sum(amount) AS shuttle_payment FROM `shuttle_payment`";
                    $result3 = $sql->query($r3);

                    if ($result3->num_rows > 0) {
                        $row3 = $result3->fetch_assoc();
                        $shuttle_payment = $row3["shuttle_payment"];
                    } else {
                        $shuttle_payment = "No Req found.";
                    }

                    $r4 = "SELECT sum(amount) AS hostel_payment FROM `hostel_payment`";
                    $result4 = $sql->query($r4);

                    if ($result4->num_rows > 0) {
                        $row4 = $result4->fetch_assoc();
                        $hostel_payment = $row4["hostel_payment"];
                    } else {
                        $hostel_payment = "No Req found.";
                    }

                    $total_payment = $shuttle_payment + $hostel_payment;
                ?>

                <div class="card">
                    <div>
                        <div class="numbers"><?php echo $total_payment." ৳"?></div>
                        <div class="cardName">Total Amount Payment</div>
                    </div>

                    <div class="iconBx">
                        <ion-icon name="cash-outline"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- ================ Loan Request Details List ================= -->
            <div class="details">
                <!-- <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Recent Request For Loan</h2>
                        
                    </div>

                    <?php 
                     // include 'request_loan.php';
                     ?>

                </div> -->
            </div>


            <!-- ================ Shuttle Request Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Requested Shuttle Service</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <?php 
                      include 'request_shuttle.php';
                     ?>
                </div>
            </div>


            <!-- ================ add Shuttle List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Shuttle List</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <?php 
                      include 'shuttle_list.php';
                     ?>
                </div>
            </div>



            <!-- ================ New Hostel  Details List ================= -->
            <div class="details">
                <div class="recentOrders">
                    <div class="cardHeader">
                        <h2>Hostel List</h2>
                        <!-- <a href="#" class="btn">View All</a> -->
                    </div>

                    <?php 
                      include 'newhostel.php';
                     ?>
                </div>
            </div>

            
        </div>
    </div>
    </div>

    <!-- =========== Scripts =========  -->.
    <script src="assets/js/main.js"></script>

   

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
</body>

</html>