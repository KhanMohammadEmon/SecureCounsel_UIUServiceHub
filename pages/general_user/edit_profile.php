<?php
session_start();
$email = $_SESSION['email'];
include '../sqlCommands/connectDb.php';
$sql2 = "SELECT * FROM {$_SESSION['type']} WHERE email = '$email';";
$result1 = mysqli_query($sql, $sql2);
$num1 = mysqli_num_rows($result1);



while ($row = $result1->fetch_assoc()) {
  $first_name = $row["first_name"];
  $last_name = $row["last_name"];
  $email1 = $row["email"];
  $phone = $row["phone_number"];
  $gender = $row["gender"];
  $pass = $row["passwords"];
}
?> 
<!DOCTYPE html>
<html lang="en">

<head>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>profile</title>
    <link rel="stylesheet" href="css/edit_profile.css">
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


</head>

<body>
<div>
  <?php if($_SESSION['type']=='general_user') {?>
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
                            <a class="nav-link active" aria-current="page" href="my_loans.php"><i class="fa-solid fa-house"></i> Hostel Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="my_req_loans.php"><i class="fa-solid fa-bus"></i> Shuttle Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="my_loan_offers.php"><i class="fa-solid fa-bank"></i> Loan Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="post.php"><i class="fa-solid fa-file"></i> Post </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="my_given_loans.php"><i class="fa-solid fa-people-group"></i> Club/Forum</a>
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
    <?php }?>
</div>

<div class="container-fluid main-body">
    <div class="row">


      <div class="card col-lg-12 col-one">


        <h3 class="login"><i class="fa-solid fa-pen-to-square"></i> Edit Profile</h3>

        <form action="update_profile.php" method="POST" enctype="multipart/form-data">
          <div class="form-group w-100">
            <label class="mb-2 mt-2">First Name</label>
            <input type="text" class="form-control form-control email fn" name="first_name" value="<?php echo "$first_name" ?>" aria-describedby="emailHelp" placeholder="" required>
          </div>

          <div class="form-group w-100">
            <label class="mb-2 mt-2">Last Name</label>
            <input type="text" class="form-control form-control" name="last_name" value="<?php echo "$last_name" ?>" placeholder="" required>
          </div>

          <?php
          if($_SESSION['type']=='general_user'){
          ?>
          <div class="form-group w-100">
            <label class="mb-2 mt-2">Gender</label>
            <select class="form-control form-control" id="exampleFormControlSelect1" name="gender" required>

              <?php if ($gender == "Male") { ?>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              <?php } ?>

              <?php if ($gender == "Female") { ?>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
                <option value="Other">Other</option>
              <?php } ?>

              <?php if ($gender == "Other") { ?>
                <option value="Other">Other</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              <?php } ?>

            </select>
          </div>
          <?php } ?>

          <div class="form-group w-100">
            <label class="mb-2 mt-2">Phone Number</label>
            <input type="text" class="form-control form-control" name="phone" placeholder="Phone Number" value="<?php echo "$phone" ?>" required>
          </div>

          <div class="btn1 w-100">
            <button type="submit" class="btn custom-btn">Save</button>
          </div>
          <?php
          if($_SESSION['type']!='general_user'){
          ?>
          <div class="btn1 w-100" style = "margin:0px, 10px, 0px, 0px;">
            <a href="../forumRep/mainPage.php" class="btn custom-btn">Cancel</a>
          </div>
          <?php }?>

        </form>

      </div>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script> 
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>