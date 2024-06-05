<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="assets/img/Logo.png">

    <!-- Custom Styles -->
    <style>
    .container {
    width: 100%;
    height: 600px;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    margin-top: 1in; /* Adjust the distance from the top as needed */
}

      
    </style>
</head>

<body>

<div class="container">
   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.5821981176196!2d90.44713507597328!3d23.797887786950408!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7d8042caf2d%3A0x686fa3e360361ddf!2sUnited%20International%20University!5e0!3m2!1sen!2sbd!4v1691873804512!5m2!1sen!2sbd" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


</div>

   <!-- Navigation Bar -->
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
                        <a class="nav-link active" aria-current="page" href="mainPage.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shuttle_service.php">Shuttle Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shuttle_booking.php">Shuttle Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="request_new_shuttle.php">Request for new Shuttle</a>
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
                                <li><a class="dropdown-item" onclick="cpass('<?php echo $email; ?>', '<?php echo $pass; ?>')"><i class="fa-solid fa-key"></i> Change Password</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    

    <!-- Include necessary scripts and libraries here -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/app.js"></script>
</body>

</html>
