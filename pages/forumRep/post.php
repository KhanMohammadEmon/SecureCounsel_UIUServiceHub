<?php
session_start();
include '../sqlCommands/connectDb.php';
include '../general_user/main.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Post</title>
    <!-- <link rel="stylesheet" href="assets/css/style.css"> -->
    <link rel="stylesheet" href="../general_user/css/styles.css">
    
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

<div>
    <?php
    include 'nav.php';
   ?>
    
</div>
    
<div class=" container main container-fluid main-body">

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

                                                <h4><a id="view" class="text-uppercase fw-bold" href="../general_user/view.php?id=<?php echo $post_row["id"]; ?>" title="<?php echo $post_row["title"]; ?>" target="_blank"><?php echo $post_row["title"]; ?></a></h4>
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



    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>