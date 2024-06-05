<?php
session_start();
include "nav.php";
include '../sqlCommands/connectDb.php';
include '../general_user/main.php';
    $str = "select r.id as room_id , r.forum_name forum_name , r.id forumRep_id , u.users_id users_id , u.approve approve, concat(g.first_name, ' ', g.last_name) 'name', g.email email from room1 r join users u on r.id = u.room_id join general_user g on u.users_id=g.id where r.id = {$_SESSION["id"]} and u.approve = 0";

    $s_query = mysqli_query($sql, $str);

?>

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

        <div class="main">


            <h2 class="text-center mt-2 border-bottom-uiu" style = "margin-top: 4.5rem!important;">Join Request</h2>
            <section id="item-container" class="w-50 m-auto mt-4">
                <?php if (mysqli_num_rows($s_query) == 0) : ?>
                <section class="d-flex  justify-content-between align-items-center w-100 mb-2 border-bottom-uiu pb-2" style = "    margin-left: 9.5rem!important;"id="item">
                    <p class="m-0">No Join Requests yet</p>
                </section>
                <?php else : ?>
                <?php $counter = 1;
                            while ($row = mysqli_fetch_assoc($s_query)) : ?>
                <section class="d-flex justify-content-between align-items-center w-100 mb-2 border-bottom-uiu pb-2"
                    id="item">
                    <p class="m-0"><span><?= $counter . "--" ?></span> <?= $row["name"] ?> </p>
                    <p class="m-0"><?= $row["forum_name"] ?></p>
                    <div>
                        <a href="discussion/approve.php?room_id=<?= $row["room_id"] ?>&user_id=<?= $row["users_id"] ?>"><i
                                class="fa-solid fa-circle-check fa-xl"></i></a>

                        <a href="discussion/refuse.php?room_id=<?= $row["room_id"] ?>&user_id=<?= $row["users_id"] ?>"><i
                                class="fa-solid fa-square-minus fa-xl"></i></a>
                    </div>
                </section>
                <?php $counter++; ?>
                <?php endwhile ?>
                <?php endif ?>
            </section>



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