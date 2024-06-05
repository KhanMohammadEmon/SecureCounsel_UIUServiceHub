
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
    <title>Responsive Club/Forum Dashboard </title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

</head>
<body>
    <!-- =============== Navigation ================ -->
    <div class="container">
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon">
                            <img src="../general_user/assets/img/Logo.png" alt="" style = "width:266px;" >
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
                    <a href="add_user.php">
                        <span class="icon">
                            <ion-icon name="people-outline"></ion-icon>
                        </span>
                        <span class="title">User Add</span>
                    </a>
                </li>

                <li>
                    <a href="post.php">
                        <span class="icon">
                        <ion-icon name="newspaper-outline"></ion-icon>
                        </span>
                        <span class="title">All Post</span>
                    </a>
                </li>

                <li>
                    <a href="chat.php">
                        <span class="icon">
                            <ion-icon name="chatbubble-outline"></ion-icon>
                        </span>
                        <span class="title">Chat Room</span>
                    </a>
                </li>

                <li>
                    <a href="../general_user/create_post.php">
                        <span class="icon">
                           <ion-icon name="create-outline"></ion-icon>
                        </span>
                        <span class="title">Create Post</span>
                    </a>
                </li>

                

                <li>
                    <a href="../general_user/my_post.php">
                        <span class="icon">
                        <ion-icon name="albums-outline"></ion-icon>
                        </span>
                        <span class="title">My Post</span>
                    </a>
                </li>

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
    <script src="assets/js/main.js"></script>
    <script src="../general_user/assets/js/bootstrap.bundle.min.js"></script>
    <script src="../general_user/assets/js/all.min.js"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    
</body>

</html>