<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
$msg = "";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Request</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="assets/img/Logo.png">

    <!-- Bootstrap CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    
    <style>
        body {
            font-family: "Dosis";
        }

        .container {
            width: 100%;
            height: 600px;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            margin-top: 2in;
        }

        .card {
            width: 400px;

            border-color: rgb(238, 165, 70) !important;
            
            border: 2px solid #B3AEAC;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: rgb(238, 165, 70) !important;
        }
        

        .form-group {
            margin-bottom: 15px;
        }

        .btn-cus {
            background-color: rgb(238, 165, 70) !important;
            border-color: rgb(238, 165, 70) !important;
            color: white;
        }

        .btn-cus:hover {
            background-color: #0056b3;
        }

        .btn-cus2 {
            background-color: rgb(238, 165, 70) !important;
            border-color: rgb(238, 165, 70) !important;
            color: white;
        }

        .btn-cus2:hover {
            background-color: #CCCCCC;
        }
    </style>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm p-3 bg-white">
            <!-- Navbar content here -->
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
                        <a class="nav-link active" aria-current="page" href="shuttle_service.php"><i class="fa-solid fa-bus-simple"></i> Shuttle Service</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="shuttle_booking.php"> <i class="fa-solid fa-bus"></i> Shuttle Booking</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="request_new_shuttle.php"> <i class="fa-solid fa-bus-simple"></i> Request for new Shuttle</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="print_ticket.php"> <i class="fa-solid fa-ticket"></i> Ticket</a>
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
                                <li><a class="dropdown-item" href="logout.php"><i class="fa-solid fa-right-from-bracket"></i> Logout</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        </nav>
    </div>

    <div class="container">
        <div class="card">
            <div class="card-header" style="text-align: center;">
                <h3>New Request</h3>
            </div>
            <div class="card-body">
                <form action="shuttle_request.php" method="POST">
                    <div class="form-group">
                        <?php echo $msg?>
                        <label for="source">Source</label>
                        <input type="text" name="source" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <input type="text" name="destination" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="destination">ID</label>
                        <input type="text" name="id" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="txt" name="time" class="form-control" required>
                    </div>
                    <button type="submit" name = "submit" class="btn btn-cus btn-block"> Request Send </button>
                    <button onclick="location.href='shuttle_service.php';" type="button" class="btn btn-cus2 btn-block">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>
