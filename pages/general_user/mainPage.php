<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserHome</title>
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="assets/img/Logo.png">
    <style>
        body {
            font-family: "Dosis";
        }
    </style>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>



</head>

<body>

<div>
    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm p-3 bg-white">
            <div class="container-fluid">

                <a class="navbar-brand logo" href="#">
                    <img src="img/logo.png" alt="" width="100">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mainPage.php"><i class="fa-solid fa-house-user"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="hostel_service.php"><i class="fa-solid fa-hotel"></i> Hostel Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="shuttle_service.php"><i class="fa-solid fa-bus"></i> Shuttle Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="loan.php"><i class="fa-solid fa-bank"></i> Loan Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="post.php"><i class="fa-solid fa-file"></i> Post </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="club_forum.php"><i class="fa-solid fa-people-group"></i> Club/Forum</a>
                        </li>
                       
                        <li class="nav-item">
                            <div class="dropdown">
                                <?php if ($gender == "Female") {?>
                                    <img class="dropdown-toggle pro" src="../../img/Female.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php } ?>
                                <?php if ($gender == "Male") { ?>
                                    <img class="dropdown-toggle pro" src="../../img/man.png" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php } ?>
                                <?php if ($gender != "Male" && $gender != "Female") { ?>
                                    <img class="dropdown-toggle pro" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php } ?>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton1">
                                    <li><a class="dropdown-item" href="profile.php"><i class="fa-solid fa-user"></i> My Profile</a></li>
                                    <li><a class="dropdown-item" onclick="cpass('<?php echo $_SESSION['email']?>', '<?php echo $pass; ?>')"><i class="fa-solid fa-key"></i> Change Password</a></li>
                                    <li><a class="dropdown-item" href="../login/logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
    </nav>
</div>
    
<div class="container-fluid main-body">

    <div class="container-fluid main-body">

        <div class="row mbody">
            <div class="col-lg-6 col-md-12 col-sm-12 col-one">
                <h2 class="t1">UIU  Service Hub</h2>
                <h5 class="t2">Some Important Service Provide By a Single Platform </h5>
                <p class="onep">In this project, we are developing a System based on the services that UIU provides for the students. It will reduce the problem to get these services that our university provides by combining them in a single platform. The services include Hostel Service, Suttle Service Registration, Student Loans, Club Forum Discussion, and Posts.</p>
                <button onclick="location.href='#next';" class="btn btn-warning cus-b3">Get Started</button>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 col-two">
                <img class="img-3 d-none d-lg-block " src="../../img/3.png" alt="img">
            </div>
        </div>
 
    </div>
</div>

<?php include 'footer.php'?>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- <script src="assets/js/app.js"></script> -->
</body>

</html>