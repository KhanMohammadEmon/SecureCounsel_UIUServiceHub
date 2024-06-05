<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
$email = $_SESSION['email'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $fullName = $_POST['fullName'];
    $studentId = $_POST['studentId'];
    // $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];
    $userType = $_SESSION['type'];
    $userId = $_SESSION['id'];

    // Check if the file was uploaded without errors
    if (isset($_FILES['documents']) && $_FILES['documents']['error'] === 0) {
        $file = $_FILES['documents'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];
        $fileType = $file['type'];

        // Define the target directory where the file will be saved
        $targetDir = __DIR__ . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR;
    $fileName = basename($_FILES['documents']['name']);
    $targetFile = $targetDir . $fileName;
        // Check if the file already exists
    $counter = 1;
    while (file_exists($targetFile)) {
        $fileName = pathinfo($_FILES['documents']['name'], PATHINFO_FILENAME) . "_{$counter}" . '.' . pathinfo($_FILES['documents']['name'], PATHINFO_EXTENSION);
        $targetFile = $targetDir . $fileName;
        $counter++;
    }

       // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['documents']['tmp_name'], $targetFile)) {
        // File upload success, insert data into the database
        $r = "INSERT INTO loan_application (full_name, student_id, email, phone_number, amount, documents, user_type, user_id)
                VALUES ('$fullName', '$studentId', '$email', '$phone', $amount, '$fileName', '$userType', $userId)";

            if (mysqli_query($sql, $r)) {
                // Data inserted successfully
                // You can redirect to a success page or do further processing as needed
                header("Location: success_page.php");
                exit;
            } else {
        // Error uploading file
        $error = "Error moving uploaded file.";
            }
        } else {
            // Error uploading file
            $error = "Error uploading file.";
        }
    } else {
        // File not uploaded or error occurred
        $error = "File not uploaded or error occurred.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Apply for Loan</title>
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
                        <a class="nav-link active" aria-current="page" href="apply_loan.php"><i class="fa-solid fa-file"></i> Apply for Loan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="payment_loan.php"><i class="fa-solid fa-money-bill"></i> Payment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="payment_history.php"><i class="fa-solid fa-history"></i> Payment History</a>
                    </li>
                </ul>
                <div class="top-right-elements">
                    <div class="dropdown me-3">
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
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="container-fluid main-body">
    <div class="row mbody">
        <div class="col-lg-12">
            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" tabindex="0">
                    <!-- APPLY FOR LOAN -->
                    <div class="container mt-3">
                        <h2>Apply for Loan</h2>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="fullName" class="form-label">Full Name</label>
                                <input type="text" class="form-control" id="fullName" name="fullName" required>
                            </div>
                            <div class="mb-3">
                                <label for="studentId" class="form-label">Student ID</label>
                                <input type="text" class="form-control" id="studentId" name="studentId" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div> -->
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="amount" class="form-label">Amount</label>
                                <input type="number" class="form-control" id="amount" name="amount" required>
                            </div>
                            <div class="mb-3">
                                <label for="documents" class="form-label">Documents (PDF only)</label>
                                <input type="file" class="form-control" id="documents" name="documents" accept=".pdf" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Apply</button>
                                <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancel</button>
                        </form>
                        <?php
                            // Display error message if there was an error
                            if (isset($error)) {
                                echo '<div class="alert alert-danger mt-3">' . $error . '</div>';
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>         
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/all.min.js"></script>
 <script src="assets/js/custom.js"></script>
</body>

</html>
