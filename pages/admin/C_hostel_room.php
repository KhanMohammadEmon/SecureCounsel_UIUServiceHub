<?php 
include '../sqlCommands/connectDb.php';
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
$msg = "";

error_reporting(0);

if (isset($_POST['submit'])) {
    $type = $_POST['roomType'];


    $img_name = rand() . $_FILES['img']['name'];
    $img_tmp_name = $_FILES['img']['tmp_name'];
    $img_size = $_FILES['img']['size'];

    $price = $_POST['price'];
    $available_room = $_POST['availableRooms'];



    if ($img_size > 5242880) {
        $msg = "<div class='alert alert-danger'>Image is too big. Maximum image uploading size is 5 MB.</div>";
    } else {
        $r = "INSERT INTO hostel_rooms(`type`, `img`, `price`, `available_room`) VALUES ('$type', '$img_name', '$price', '$available_room')";
        $result = mysqli_query($sql, $r);

        if ($result) {
            move_uploaded_file($img_tmp_name, "uploads/" . $img_name);
            $msg = "<div class='alert alert-success'>Post added successful.</div>";
            $_POST['type'] = "";
            $_POST['price'] = "";
            $_POST['available_room'] = "";

            header("Location:../admin/add_hostel_room.php");
        } else {
            $msg = "<div class='alert alert-danger'>Something wrong went. Please try again later.</div>";
        }
    }
}
