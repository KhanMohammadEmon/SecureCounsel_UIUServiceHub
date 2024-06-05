<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
include "showUser.php";
include "C_post.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UserHome</title>
    <link rel="stylesheet" href="css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="icon" href="assets/img/Logo.png">
    <style>
    body {
        font-family: "Dosis";
    }

    .card .p-1 {
        margin-bottom: 100px !important;
    }
    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
</head>

<body>
<?php 
   if($_SESSION['type']=='general_user')
   {
    ?>
    <div>
      
        <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm p-3 bg-white">
            <div class="container-fluid">

                <a class="navbar-brand logo" href="#">
                    <img src="img/logo.png" alt="" width="100">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mainPage.php"><i
                                    class="fa-solid fa-house-user"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="post.php"><i
                                    class="fa-solid fa-newspaper"></i> All Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="my_post.php"><i
                                    class="fa-solid fa-file"></i> My Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="create_post.php"><i
                                    class="fa-solid fa-square-plus"></i> Create Post</a>
                        </li>


                        <li class="nav-item">
                            <div class="dropdown">
                                <?php if ($gender == "Female") {?>
                                <img class="dropdown-toggle pro" src="../../img/Female.png" alt="img"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php } ?>
                                <?php if ($gender == "Male") { ?>
                                <img class="dropdown-toggle pro" src="../../img/man.png" alt="img"
                                    id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php } ?>
                                <?php if ($gender != "Male" && $gender != "Female") { ?>
                                <img class="dropdown-toggle pro"
                                    src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>"
                                    alt="img" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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
        
    </div>
    <?php }?>

    <div class="container-fluid main-body">


        <div class="row mbody">
            <div class="col-lg-12 col-one">
                <!-- <button onclick="location.href='#next';" class="btn btn-warning cus-b3">Get Started</button> -->

                <div class="d-flex justify-content-between align-items-center mt-2">
                    <h2 class="w-100 text-center"> Create Post</h2>
                </div>
                <section class="row mt-3">
                    <div class="col-lg-8 col-12 mx-auto bg-white p-4 shadow">

                        <form action="../general_user/C_post.php" method="post" enctype="multipart/form-data">
                            <?php echo $msg; ?>
                            <div class="form-group mb-1">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" value="<?php echo $_POST['title']; ?>"
                                    name="title" id="title" required>
                            </div>
                            <div class="form-group mb-1">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows="5" id="description"
                                    required><?php echo $_POST['description']; ?></textarea>
                            </div>
                            <div class="form-group mb-2">
                                <label for="img">Image</label>
                                <input type="file" accept="image/*" class="form-control" name="img" id="img" required>
                            </div>

                            <div class="form-group mb-2">
                                <select class="form-control" name="category" required>
                                    <option value="" selected hidden disabled>Select Category</option>
                                    <?php
                                    if ($_SESSION['type'] == "forumRep" || $_SESSION['type'] == "admin") {
                                        $r = "SELECT * FROM categories";
                                        $result = mysqli_query($sql, $r);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                    ?>
                                    <option <?php if ($_POST['category'] == $row['id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $row['id']; ?>">
                                        <?php echo $row['cat_name']; ?></option>
                                    <?php }
                                        }
                                    } else {
                                        $r = "SELECT * FROM categories where id = 2 ";
                                        $result = mysqli_query($sql, $r);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {

                                            ?>
                                    <option <?php if ($_POST['category'] == $row['id']) {
                                                            echo "selected";
                                                        } ?> value="<?php echo $row['id']; ?>">
                                        <?php echo $row['cat_name']; ?></option>
                                    <?php }
                                        }
                                    } ?>
                                </select>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success">Add Post</button>

                            <?php
                             if($_SESSION['type']!='general_user'){
                              ?>
                            <div style=" margin:6px 0px;">
                                <a href="../forumRep/mainPage.php" class="btn btn-danger" >Cancel   </a>
                            </div>
                            <?php }?>

                        </form>
                    </div>
                </section>
            </div>





            <!-- newline end -->
        </div>
    </div>

    </div>



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>