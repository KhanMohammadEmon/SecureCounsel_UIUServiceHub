<?php
session_start();
include "../sqlCommands/connectDb.php";
include 'showUser.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["room_id"] = $_POST["joined_room"];
    $_SESSION["forum_name"] = $_POST["forum"];

    $c_q = "select * from chats c join general_user g on c.users_id = g.id where c.room_id = {$_SESSION["room_id"]} order by c.sl_no desc";

    $chat_query = mysqli_query($sql, $c_q);
} else {
    $c_q = "select * from chats c join general_user g on c.users_id = g.id where c.room_id = {$_SESSION["room_id"]} order by c.sl_no desc";

    $chat_query = mysqli_query($sql, $c_q);
}

?>

<?php
$page = $_SERVER['PHP_SELF'];
$sec = "10";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
    <title>Chat</title>
    <!-- <link rel="icon" href="assets/img/favicon.png"> -->
    <link rel="stylesheet" href="assets\css\chat.css">
</head>

<body>
    <nav class="d-flex justify-content-between align-items-center">
        <!-- <img src="../../assets/img/ForOrangeBg.png" alt="logo" class="img-fluid pt-1 pb-1"> -->
        <div class="d-flex justify-content-center align-items-end">
            <a href="../../index.php" class="btn btn-uiu text-uppercase mb-1">Home</a>
            <div class="d-flex flex-column justify-content-center align-items-center p-1">
                <!-- <p class="m-0 text-uppercase mb-1 p-1 fw-bold   " style="border: 1px solid white; border-radius:10px ;"><?php echo show($_SESSION["id"]); ?></p> -->
                <a href="../login/logout.php" class="btn btn-uiu text-uppercase">logout</a>
            </div>
        </div>
    </nav>
     <?php
       $check = "select active from `room1` where id = {$_SESSION["room_id"]}";
        $check_query = mysqli_query($sql, $check);
        $check_row = mysqli_fetch_assoc($check_query);
        if($check_row["active"] == 0){
            echo "<script>alert('This room is not active anymore. You will be redirected to the home page.')</script>";
            header("refresh:0.5; url=../../index.php");
        }

        else
        {
            ?>
           
    <main id="chat">
        <div class="card w-75 justify-content-end m-auto mt-3">
            <h2 class="text-center fw-bold text-uppercase"><?php echo $_SESSION["forum_name"]; ?></h2>

            <div id="msg">
                <div class="scroll d-flex">
                    <?php while ($c_row = mysqli_fetch_assoc($chat_query)) : ?>
                        <section class="d-flex mt-1" <?php echo "title='{$c_row["dates"]} {$c_row["mtime"]}'" ?>>
                            <p class="text-center m-0"><?php echo "{$c_row["first_name"]} {$c_row["last_name"]}"; ?></p>
                            <?php if ($c_row["users_id"] == $_SESSION["id"]) : ?>
                                <p class="d-flex justify-content-center align-items-center m-0">
                                    <a <?php echo "href='deleteMsg.php?sl_no={$c_row["sl_no"]}'"; ?>>
                                        <i class="fa-regular fa-trash-can fa-xl p-1"></i>
                                    </a>
                                </p>
                            <?php endif ?>
                            <p class="m-0"><?php echo "{$c_row["texts"]}"; ?></p>
                        </section>
                    <?php endwhile ?>
                </div>
            </div>

            <form action="send.php" method="post">
                <div class="input-group flex-nowrap">
                    <input type="hidden" name="room_id" <?php echo "value='{$_SESSION["room_id"]}'" ?>>
                    <input type="text" class="form-control" aria-describedby="addon-wrapping" name="msg" required autocomplete="off">
                    <button type="submit" class="btn btn-uiu">Send</button>
                </div>
            </form>
        </div>
    </main>

    <?php

}
?>

    <script src="../../assets/css/bootstrap.min.css"></script>
</body>

</html>