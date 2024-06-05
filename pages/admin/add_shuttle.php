<?php
include '../sqlCommands/connectDb.php';
session_start(); 
include '../general_user/main.php';
include "../general_user/showUser.php";
 $msg = "";


if(isset($_POST['submit'])){
    $shuttle_name = $_POST['route_no'];
    $email = $_SESSION['email'];
    $capacity = $_POST['capacity'];
    $source= $_POST['source'];
    $destination = $_POST['destination'];
    $time = $_POST['time'];
    
    $r = "INSERT INTO shuttle_add(`busname`, `source`, `destination`, `time`, `capacity`, `email`) VALUES ('$shuttle_name', '$source', '$destination', '$time', '$capacity', '$email')";
    $result = mysqli_query($sql, $r);

    if ($result) {
        $msg = "<div class='alert alert-success'>Post added successful.</div>";
        $_POST['route_no'] = "";
        $_POST['source'] = "";
        $_POST['destination'] = "";
        $_POST['time'] = "";
        $_POST['capacity'] = "";
        
        $shuttle_name = "";
        $source= "";
        $destination = "";
        $time = "";
        $capacity = "";
        $email = "";

        //header("Location: add_shuttle.php");
    } else {
        $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later.</div>";
    }

    $sql -> close();
}
?>

<?php include 'nav.php'?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Document</title>

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
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <h3>Add Shuttle</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <?php echo $msg; ?>
                        <div class="form-group">
                            <label for="destination">Bus Name</label>
                            <input type="text" name="route_no" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="source">Source</label>
                            <input type="text" name="source" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="destination">Destination</label>
                            <input type="text" name="destination" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="destination">Capacity</label>
                            <input type="text" name="capacity" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="text" name="time" class="form-control" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-cus btn-block">ADD</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <!-- =========== Scripts =========  -->
    <script src="assets/js/main.js"></script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>