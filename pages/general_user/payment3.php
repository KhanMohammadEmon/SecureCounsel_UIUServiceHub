
<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$pid = $_POST['roomTypeId'];

$r = "SELECT * FROM hostel_rooms WHERE id= '$pid'";
$result = mysqli_query($sql, $r);
 while ($row = $result->fetch_assoc()) {
    $amount = $row["price"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <div class="container py-5">

        <center>
            <!-- <img class="mb-4" src="img/logo.png" alt="" style="width: 200px;"> -->
        </center>
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="card ">
                    <div class="card-header">
                        <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                            <!-- Credit card form tabs -->
                            <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                                <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active"> BKash </a> </li>
                                <li class="nav-item"> <a data-toggle="pill" href="#paypal" class="nav-link "> Nagad </a> </li>
                                <!-- <li class="nav-item"> <a data-toggle="pill" href="#net-banking" class="nav-link "> <i class="fas fa-mobile-alt mr-2"></i> Net Banking </a> </li> -->
                            </ul>
                        </div> <!-- End -->
                        <!-- Credit card form content -->
                        <div class="tab-content">
                            <!-- credit card info-->

                            <div id="credit-card" class="tab-pane fade show active pt-3">
                                <img src="../../img/b1.png" alt="" style="width: 200px; padding: 20px;">
                                <form action="update_hostel_payment.php" method="POST">
                                    <div class="form-group">
                                        <form action="">
                                            <label for="username">
                                                <h2 style="margin-bottom: 5%;">Remaining Payment: ৳ <?php echo $amount ?></h2>
                                                <h6>BKash Number</h6>
                                            </label>
                                            <input type="text" name="number" placeholder="Enter Your BKash Number" required class="form-control ">

                                            <h6 class="mt-4">Amount</h6>
                                            <input type="text" name="taka" placeholder="Enter the Amount You Want to Pay" required class="form-control ">
                                            <input name="pid" value="<?php echo $pid; ?>" type="hidden">
                                            <input name="amount" value="<?php echo $amount; ?>" type="hidden">
                                            <input name="r_id" value="<?php echo $pid; ?>" type="hidden">

                                    </div>



                                    <div class="card-footer">
                                        <button type="submit" class="w-100 subscribe btn btn-cus btn-block shadow-sm"> Confirm Payment </button>
                                        <button onclick="location.href = 'hostel_service.php';" type="button" class="w-100 subscribe btn btn-cus2 btn-block shadow-sm"> Cancel Payment & Return Home</button>
                                </form>

                            </div>
                        </div> <!-- End -->
                        <!-- Paypal info -->
                        <div id="paypal" class="tab-pane fade">
                            <img src="../../img/n1.png" class="mt-2" style="width: 200px; padding:20px;" alt="">
                            <form action="update_hostel_payment.php" method="POST">
                                    <div class="form-group">
                                        <form action="">
                                            <label for="username">
                                                <h2 style="margin-bottom: 5%;">Remaining Payment: ৳ <?php echo $amount ?></h2>
                                                <h6>Nagad Number</h6>
                                            </label>
                                            <input type="text" name="number" placeholder="Enter Your Nagad Number" required class="form-control ">

                                            <h6 class="mt-4">Amount</h6>
                                            <input type="text" name="taka" placeholder="Enter the Amount You Want to Pay" required class="form-control ">
                                            <input name="pid" value="<?php echo $pid; ?>" type="hidden">
                                            <input name="amount" value="<?php echo $amount; ?>" type="hidden">

                                    </div>



                                    <div class="card-footer">
                                        <button type="submit" class="w-100 subscribe btn btn-cus btn-block shadow-sm"> Confirm Payment </button>
                                        <button onclick="location.href = 'hostel_service.php';" type="button" class="w-100 subscribe btn btn-cus2 btn-block shadow-sm"> Cancel Payment & Return Home</button>
                                </form>
                        </div> <!-- End -->
                        <!-- bank transfer info -->

                    </div>
                </div>
            </div>
        </div>
        <script>
            $(function() {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>