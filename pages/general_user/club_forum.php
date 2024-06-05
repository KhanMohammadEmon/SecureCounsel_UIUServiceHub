<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
include 'room.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shuttle Service</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/shuttle.css">

    <!-- Bootstrap CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="assets/img/Logo.png">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>


    <!-- Custom Styles -->
    <style>
    /* Your custom styles here */

    /* Center the container */
    .shuttle-container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        min-height: 100vh;
    }

    /* Customize shuttle list styles */
    .shuttle-list {
        width: 80%;
        margin-top: 20px;
    }

    .shuttle-card {
        background-color: #f9f9f9;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);
    }

    .shuttle-card h4 {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .shuttle-card p {
        font-size: 14px;
        color: #555;
        margin-bottom: 5px;
    }

    .shuttle-card p.map-link {
        color: #007bff;
    }
    </style>
</head>

<body>
    <!-- Navigation Bar -->
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
                        <a class="nav-link active" aria-current="page" href="mainPage.php"> <i class="fa-solid fa-house-user"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="join.php"> <i class="fa-solid fa-comment-dots"></i> Joined</a>
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

    <!-- Shuttle Container -->
    <div class="container py-5 shuttle-container" style = "margin : 100px" >
        <div class="shuttle-list">
            <!-- Forum list -->
            <?php while ($srow = mysqli_fetch_assoc($room_query)) : ?>
                    <?php user_exists($srow["id"]);  ?>
                    <?php if (!$approve) : ?>
                        <div class="card w-50 m-auto mb-3 pt-2 mt-2">
                            <div class="card-title fw-bold text-uppercase text-center"><?php echo $srow["forum_name"]; ?></div>
                            <div class="card-body">
                                <?php if (!$joined) : ?>
                                    <p class="m-0 text-center">Want to be part of discussion room? </p>
                                    <form action="chat_request.php" class="d-flex justify-content-center align-items-center" method="post">
                                        <input type="hidden" name="room_id" <?php echo "value='{$srow["id"]}'"; ?>>
                                        <button class="btn btn-uiu" type="submit">Join</button>
                                    </form>
                                <?php endif ?>
                                <?php if ($joined) : ?>
                                    <p class="text-center m-0">Pending approval</p>
                                <?php endif ?>
                            </div>
                        </div>
                    <?php endif ?>
                <?php endwhile ?>
            <!-- Add more shuttle cards here -->
        </div>
    </div>





    <!-- Include necessary scripts and libraries here -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>