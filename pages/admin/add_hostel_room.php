<?php
include '../sqlCommands/connectDb.php';
session_start(); 
include '../general_user/main.php';
include "../general_user/showUser.php";
$msg = "";
?>


<?php include 'nav.php'?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../general_user/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="../general_user/assets/img/Logo.png">

    <title>Document</title>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>

    <style>
    body {
        font-family: "Dosis";
    }

    .card {
        top: 90px;
        left: 285px;
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
    <div class="container">
        <div class="main">
        <div class="col-lg-12 col-one">
                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h2 class="w-100 text-center">Add Hostel Room</h2>
                </div>
                <section class="row mt-3">
                    <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">

                        <form action="C_hostel_room.php" method="post" enctype="multipart/form-data">
                            <?php echo $msg; ?>
                            <div class="form-group mb-1">
                                <label for="roomType">Type</label>
                               <select name="roomType" class = "from-control">
                                    <option value="Single">Single</option>
                                    <option value="Double">Double</option>
                                </select>
                            </div>


                            <div class="form-group mb-2">
                                <label for="img">Image</label>
                                <input type="file" accept="image/*" class="form-control" name="img" id="img" required>
                            </div>
                            <div class = "from-group mb-2">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" name="price" id="price" required>
                            </div>
                            

                            <div class = "from-group mb-2">
                                <label for="availableRooms">Available Rooms</label>
                                <input type="text" class="form-control" name="availableRooms" id="availableRooms" required>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Add Post</button>

                        </form>
                    </div>
                </section>
            </div>


        </div>
    </div>



    <!-- =========== Scripts =========  -->
    <script src="../general_user/assets/js/main.js"></script>
    <script src="../general_user/assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>