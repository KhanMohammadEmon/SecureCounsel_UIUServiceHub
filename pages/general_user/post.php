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
    <title>Post</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
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

<body oncontextmenu="return false;">

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
    
<div class="container-fluid main-body">

    <div class="container-fluid main-body">

        <div class="row mbody">
            <div class="col-lg-12">
                <!-- <button onclick="location.href='#next';" class="btn btn-warning cus-b3">Get Started</button> -->

            <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" tabindex="0">
                    <!-- HOME -->
                    <?php
                    $r = "SELECT * FROM posts ORDER BY id DESC";
                    $result = mysqli_query($sql, $r);
                    ?>

                    <section class="mt-2" id="jform">
                        <div class="masonry-blog p-2">
                            <?php
                            while ($post_row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="left-side col-md-2">
                                    <div class="card p-1" style="min-width: 400px !important; <?php if (file_exists("../uploads/" . $post_row['img'])) {
                                                                                echo "background-image: url('../uploads/{$post_row['img']}'); background-size: cover; opacity: 0.7;";
                                                                                } else {
                                                                                    echo "background-image: url('../uploads/{$post_row['old_img']}'); background-size: cover; opacity: 0.7;";
                                                                                } ?>">
                                        
                                        <div class="shadow-desc">
                                            <div class="blog-meta">

                                                <h4><a id="view" class="text-uppercase fw-bold" href="view.php?id=<?php echo $post_row["id"]; ?>" title="<?php echo $post_row["title"]; ?>" target="_blank"><?php echo $post_row["title"]; ?></a></h4>
                                                <small><a class="fw-bold" href="#" title="<?php echo $post_row["date"]; ?>"><?php echo $post_row["date"]; ?></a></small>
                                                <h4><a class="fw-bold" href="#" title="<?php echo $post_row["view"]; ?>"><?php echo "Viewed: {$post_row["view"]}"; ?></a></h4>

                                                <span class="bg-aqua"><a class="fw-bold" href="">
                                                        <?php
                                                        $sql1 = "SELECT cat_name FROM categories WHERE id='{$post_row["cat_id"]}'";
                                                        $result1 = mysqli_query($sql, $sql1);
                                                        if (mysqli_num_rows($result1) > 0) {
                                                            $cat_data = mysqli_fetch_assoc($result1);
                                                            echo "Type: {$cat_data['cat_name']}";
                                                        }
                                                        ?>
                                                    </a></span>
                                            </div><!-- end meta -->
                                        </div><!-- end shadow-desc -->
                                    </div><!-- end post-media -->
                                </div><!-- end left-side -->
                            <?php } ?>
                        </div><!-- end masonry -->
                    </section>
                </div>
            </div>
        </div>         
    </div>
</div>


    <script src="assets/js/preventCopy.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>