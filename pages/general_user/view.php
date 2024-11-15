<?php 

session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
include 'showUser.php';


if (isset($_POST['submit1'])) {

    $post_id = $_POST["post_id"];

    $content = $_POST["comments"];

    $date = date("Y/m/d");
    $time = date("h:i:sa");

    $email = $_SESSION["email"];
     
    $fullName = "";
    
        if($_SESSION['type'] == "admin")
        {
            $q14 =  "SELECT * FROM `admin` where email = '$email';";
            $run14 = mysqli_query($sql, $q14);
            if (mysqli_num_rows($run14) > 0) {
                while ($row14 = $run14->fetch_assoc()) {
                    $fullName = $fullName .
                        $row14["first_name"] . " " .
                        $row14["last_name"];
                }
            }
        }
           
        else if($_SESSION['type'] == "forumRep")
        {
            $q14 =  "SELECT * FROM `forumrep` where email = '$email';";
            $run14 = mysqli_query($sql, $q14);
            if (mysqli_num_rows($run14) > 0) {
                while ($row14 = $run14->fetch_assoc()) {
                    $fullName = $fullName .
                        $row14["first_name"] . " " .
                        $row14["last_name"];
                }
            }
        }
               
        else if($_SESSION['type'] == "general_user")
        {
            $q14 =  "SELECT * FROM `general_user` where email = '$email';";
            $run14 = mysqli_query($sql, $q14);
            if (mysqli_num_rows($run14) > 0) {
                while ($row14 = $run14->fetch_assoc()) {
                    $fullName = $fullName .
                        $row14["first_name"] . " " .
                        $row14["last_name"];
                }
            }
        }
        
       

    $comment_query= "INSERT INTO post_comment (id,cDates, cTime, content, cLike, post_id,name) VALUES ('','$date' , '$time' , '$content', 0, '$post_id','$fullName')";
       
    $new_result =  mysqli_query($sql, $comment_query);
      //header("location: single.php");

}


if (isset($_GET["id"])) {
    $post_id = $_GET["id"];
    $r = "SELECT * FROM posts WHERE id='$post_id'";
    $result = mysqli_query($sql, $r);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        $post_view = $row['view'] + 1;
        $update_view_sql = "UPDATE posts SET view='$post_view' WHERE id='$post_id'";
        $update_view = mysqli_query($sql, $update_view_sql);
    }
} else {
    die("<script>window.location.replace('index.php');</script>");
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <met<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>View Post</title>
        <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
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

<body oncontextmenu="return false;">

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
    <?php
   }
   ?>

    <div class="main-body">
        <div class="page-title wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

                        <?php
                       $page = "";

                      if($_SESSION['type'] == "admin")
                      {
                        $page = "post.php";
                      }
                      else if($_SESSION['type'] == "forumRep")
                      {
                        $page = "post.php";
                      }
                      else if($_SESSION['type'] == "general_user")
                      {
                      }   $page = "post.php";
                      
                    ?>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section wb">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <div class="page-wrapper">
                            <div class="blog-title-area">
                                <span class="color-green">
                                    <?php
                                $sql1 = "SELECT cat_name FROM categories WHERE id='{$row["cat_id"]}'";
                                $result1 = mysqli_query($sql, $sql1);
                                if (mysqli_num_rows($result1) > 0) {
                                    $cat_data = mysqli_fetch_assoc($result1);
                                    echo $cat_data['cat_name'];
                                }
                                ?>
                                    </a></span>

                                <h3><?php echo $row["title"]; ?></h3>

                                <div class="blog-meta big-meta">
                                    <small><a href="#" title=""><?php echo $row["date"]; ?></a></small>
                                    <small><a href="#" title=""><i class="fa fa-eye"></i>
                                            <?php echo $row["view"]; ?></a></small>
                                </div><!-- end meta -->
                            </div><!-- end title -->

                            <div class="single-post-media">
                                <img src="<?php if (file_exists("../uploads/". $row['img'])) { echo "../uploads/" . $row['img']; } else { echo "../uploads/" . $row['old_img']; } ?>"
                                    alt="" class="img-fluid">
                            </div><!-- end media -->

                            <div class="blog-content">
                                <div class="pp">
                                    <p>
                                    <h4><?php echo $row["description"]; ?></h4>
                                    </p>

                                </div><!-- end pp -->
                            </div><!-- end content -->


                            <!-- comments show  -->

                            <div>
                                <h2>
                                    Show Comments:
                                </h2>
                            </div>
                            <div>

                                <?php
                              //$count = 1;
                              $q13=  "SELECT * FROM `post_comment` where post_id = '{$row["id"]}';";
                              $run13 = mysqli_query($sql, $q13); 

                               while($row13 = mysqli_fetch_array($run13)) {
                               
                                 echo $row13['name']." : ".$row13['content'] . "<br />";
                                 //$count++;
                                
                               
                               }
                               
                        ?>
                            </div>


                            <!-- comment part Start -->


                            <form action="" method="POST">
                                <input type="hidden" name="post_id" <?php echo "value='{$row["id"]}'"; ?>>
                                <textarea name="comments" id="comments"
                                    style="width:96%;height:90px;padding:2%;font:1.4em/1.6em cursive;background-color:white;color:black;">

                                </textarea>
                                <button type="submit" name="submit1">Submit</button>
                            </form>


                            <hr class="invis1">

                            <?php

                            $sql1 = "SELECT * FROM posts WHERE cat_id='{$row["cat_id"]}'";
                            $result1 = mysqli_query($sql, $sql1);
                            if (mysqli_num_rows($result1) > 0) {

                            ?>
                            <div class="custombox clearfix">
                                <h4 class="small-title">You may also like</h4>
                                <div class="row">
                                    <?php

                                    while ($row1 = mysqli_fetch_assoc($result1)) {

                                        ?>
                                    <div class="col-lg-6">
                                        <div class="blog-box">
                                            <div class="post-media">
                                                <a href="single.php?id=<?php echo $row1['id']; ?>" title="">
                                                    <img src="<?php if (file_exists("../uploads/" . $row1['img'])) { echo "../uploads/" . $row1['img']; } else { echo "../uploads/" . $row1['old_img']; } ?>"
                                                        alt="" class="img-fluid">
                                                    <div class="hovereffect">
                                                        <span class=""></span>
                                                    </div><!-- end hover -->
                                                </a>
                                            </div><!-- end media -->
                                            <div class="blog-meta">
                                                <h4><a href="view.php?id=<?php echo $row1['id']; ?>"
                                                        title="<?php echo $row1['title']; ?>"><?php echo $row1['title']; ?></a>
                                                </h4>
                                                <small><a href="#" title=""><?php echo $row1['date']; ?></a></small>
                                            </div><!-- end meta -->
                                        </div><!-- end blog-box -->
                                    </div><!-- end col -->
                                    <?php } ?>
                                </div><!-- end row -->
                            </div><!-- end custom-box -->
                            <?php } ?>

                        </div>


                        <script src="assets/js/bootstrap.bundle.min.js"></script>
                        <script src="assets/js/all.min.js"></script>
                        <script src="assets/js/login_validation.js"></script>
                        <script src="assets/js/custom.js"></script>

                        <?php mysqli_close($sql);?>


    <script src="assets/js/preventCopy.js"></script>

    <script>
        document.cookie = 'SameSite=Strict';
    </script>

</body>

</html>