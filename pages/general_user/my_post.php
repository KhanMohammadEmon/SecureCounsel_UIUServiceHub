<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
include "showUser.php";
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
        .card .p-1{
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

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="mainPage.php"><i class="fa-solid fa-house-user"></i> Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="post.php"><i class="fa-solid fa-newspaper"></i> All Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="my_post.php"><i class="fa-solid fa-file"></i> My Post</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="create_post.php"><i class="fa-solid fa-square-plus"></i> Create Post</a>
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
<?php }?>

<div class=" container-fluid main-body">
        <div class="row mbody">
            <div class="col-lg-12 col-one">
                <div class="shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-header py-3">
                            <h4 class="m-0 font-weight-bold fw-bold text-dark">Posts</h4>
                        </div>
                        <div>
                        <?php
                             if($_SESSION['type']!='general_user'){
                              ?>
                            <div style=" margin:6px 0px;">
                                <a href="../forumRep/mainPage.php" class="btn btn-info"  style = "color:white;"> <- </a>
                            </div>
                            <?php }?>
                        </div>


                        <div class="card-body">

                            <?php if (isset($_REQUEST['remove_success'])) {
                                if ($_REQUEST['remove_success'] == "true") {
                                    echo "<div class='alert alert-success'>Record deleted successful.</div>";
                                } else {
                                    echo "<div class='alert alert-danger'>Record can't deleted.</div>";
                                }
                            }
                            ?>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Title</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $email = $_SESSION['email'];

                                        $r = "SELECT * FROM posts where f_email = '$email' ";
                                        $result = mysqli_query($sql, $r);
                                        if (mysqli_num_rows($result) > 0) {
                                            $id = 1;
                                            while ($post_row = mysqli_fetch_assoc($result)) {

                                        ?>
                                                <tr>
                                                    <td><?php echo $id; ?></td>
                                                    <td><?php echo $post_row['title']; ?></td>
                                                    <td><?php

                                                        $show_category = mysqli_query($sql, "SELECT * FROM categories WHERE id='{$post_row["cat_id"]}'");
                                                        if (mysqli_num_rows($show_category) > 0) {
                                                            $category_data = mysqli_fetch_assoc($show_category);
                                                            echo $category_data['cat_name'];
                                                        }

                                                        ?></td>
                                                    <td>
                                                        <a href="edit_post.php?id=<?php echo $post_row['id']; ?>" class="btn btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
                                                        <a href="delete_post.php?id=<?php echo $post_row['id']; ?>" class="btn btn-danger" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                        <?php

                                                $id++;
                                            }
                                        }

                                        ?>
                                    </tbody>
                                </table>
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