<?php
session_start();
include '../sqlCommands/connectDb.php';
include "showUser.php";

if (!isset($_SESSION["email"])) {
    header("Location: ../../index.php");
}

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];
} else {
    echo "<script>window.location.replace('post.php');</script>";
}

$msg = "";

error_reporting(0);

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $cat_id = 2;

    if ($_SESSION["type"] != "general_user") {
        $cat_id = $_POST['category'];
    }

    $img_name = rand() . $_FILES['img']['name'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];
    $old_img = $_POST['old_img'];

    if ($img_size > 5242880) {
        $msg = "<div class='alert alert-danger'>Image is too big. Maximum image uploading size is 5 MB.</div>";
    } else {
        $r = "UPDATE posts SET title='$title', description='$description', img='$img_name', old_img='$old_img', cat_id='$cat_id' WHERE id='$post_id'";
        $result = mysqli_query($sql, $r);
        if ($result) {
            move_uploaded_file($img_tmp_name, "../uploads/" . $img_name);
            if ($_SESSION["type"] == "general_user") {
                $msg = "<div class='alert alert-success'>Post updated successful. <a href='post.php' class = 'btn'> Home</a></div>";
            } else if($_SESSION['type'] == 'admin') {
                $msg = "<div class='alert alert-success'>Post updated successful. <a href='../admin/all_post.php' class = 'btn'> Home</a></div>";
                
            }
            else 
            {
                $msg = "<div class='alert alert-success'>Post updated successful. <a href='../forumRep/post.php' class = 'btn'> Home</a></div>"; 
            }
        } else {
            if($_SESSION["type"] == "admin")
            {
                $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later. <a href='../admin/all_post.php' class = 'btn'> Home</a></div>";
            }
            else if($_SESSION["type"] == "forumRep")
            {
                $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later. <a href='../forumRep/post.php' class = 'btn'> Home</a></div>";
            }
            else{
                $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later. <a href='post.php' class = 'btn'> Home</a></div>";
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <title>Edit Post</title>

</head>

<body>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row mt-3">
            <div class="col-lg-8 mx-auto bg-white p-4 shadow ">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Edit Post</h1>

                <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $msg;

                    $sql1 = "SELECT * FROM posts WHERE id='$post_id'";
                    $result1 = mysqli_query($sql, $sql1);
                    if (mysqli_num_rows($result1) > 0) {
                        while ($row1 = mysqli_fetch_assoc($result1)) {

                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" value="<?php echo $row1['title']; ?>" name="title"
                            id="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" name="description" rows="5" id="description"
                            required><?php echo $row1['description']; ?></textarea>
                    </div>



                    <div class="form-group" style="margin:10px 0px 10px 0px">
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




                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" accept="image/*" class="form-control" name="img" id="img">
                        <input type="hidden" name="old_img" value="<?php echo $row1['img']; ?>">
                    </div>
                    <?php }
                    } ?>
                    <button type="submit" name="submit" class="btn btn-success" style="margin:10px 0px 10px 0px">Update
                        Post</button>

                        <?php if($_SESSION['type']=='general_user'){?>
                    <a href='my_post.php' class='btn btn-danger'> Cancel</a>
                    <?php }
                    else 
                    {
                        ?>
                           <a href='../<?php echo $_SESSION['type'] ?>/mainPage.php' class='btn btn-danger'> Cancel</a>
                        <?php
                    }
                    ?>
                     

                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/login_validation.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>