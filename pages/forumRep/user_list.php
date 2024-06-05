<?php
include '../sqlCommands/connectDb.php';
session_start(); 
include '../general_user/main.php';
include "../general_user/showUser.php";
     

?>

<?php include 'nav.php'?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Document</title>

    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        /* font-family: 'poppins', sans-serif; */
    }


    .conteiner {
        width: 100%;
        min-height: 100vh;
        /* background: #0b0423; */
        display: flex;
        justify-content: center;
        align-items: center;
    }

    #left,
    #right {
        width: 300px;
        min-height: 400px;
        margin: 20px;
        border: 5px dashed #1F94F2;

    }

    .list {

        min-height: 60px;
        margin: 30px;
        background: #E35E24;
        display: flex;
        align-items: center;
        cursor: grab;

    }

    .list img {
        width: 15px;
        height: 20px;
        margin-right: 15px;
        margin-left: 20px;
    }
    </style>
</head>

<body>

    <div class="container main">
        <div class="conteiner">
            <div style="text-align: center;">
                <h1>Pending</h1>
                <div id="left">
                    <?php 
                        $r1  = "SELECT * FROM `users` WHERE approve = 1 and room_id = {$_SESSION['id']};";
                        $result = mysqli_query($sql, $r1);
                        if (mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                    {
                        $r2  = "SELECT * FROM `general_user` WHERE id = {$row['users_id']};";
                        $result1 = mysqli_query($sql, $r2);
                        if (mysqli_num_rows($result1) > 0)
                            {
                                while($row1 = mysqli_fetch_assoc($result))
                    {
                            $name = $row1['first_name']." ".$row1['last_name'];
                    }
                }
                                
                        ?>
                                <div class="list" draggable="true" data-room-id="<?php echo $row['id']; ?>">
                                <img src="assets/imgs/i.png"><?php echo $na?></div>
                                <?php
                    } 
                            }

                    
                    
                    ?>
                </div>
            </div>
            <div style="text-align: center;">
                <h1>Approved</h1>
                <div id="right">
                    <?php 
                        $r1  = "SELECT * FROM `user` WHERE approve = 1;";
                        $result = mysqli_query($sql, $r1);
                        if (mysqli_num_rows($result) > 0)
                            {
                                while($row = mysqli_fetch_assoc($result))
                    {
                        ?>
                            <div class="list" draggable="true" data-room-id="<?php echo $row['id'];?>"><img src="assets/imgs/i.png"><?php echo $row['forum_name']?></div>
                            <?php
                    } 
                            }

                    ?>
                </div>
            </div>
        </div>
    </div>



    <!-- =========== Scripts =========  -->
    <!-- <script src="assets/js/chat.js"></script> -->
    <script src="assets/js/main.js"></script>

    <script>
    let lists = document.getElementsByClassName("list");
    let rightBox = document.getElementById("right");
    let leftBox = document.getElementById("left");

    for (list of lists) {
        list.addEventListener("dragstart", function(e) {
            let selected = e.target;

            rightBox.addEventListener("dragover", function(e) {
                e.preventDefault();

            });

            rightBox.addEventListener("drop", function(e) {
                rightBox.appendChild(selected);

                let roomId = selected.getAttribute("data-room-id");
                updateRoomStatus(roomId, 1); // Set active to 1

                selected = null;
            });

            leftBox.addEventListener("dragover", function(e) {
                e.preventDefault();

            });

            leftBox.addEventListener("drop", function(e) {

                leftBox.appendChild(selected);

                let roomId = selected.getAttribute("data-room-id");
                updateRoomStatus(roomId, 0); // Set active to 0

                selected = null;
            });
        });
    }

    function updateRoomStatus(roomId, activeValue) {
        // Use an XMLHttpRequest or fetch to send an update request to the server
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "updateRoomStatus.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log("Room status updated successfully.");
                } else {
                    console.error("Room status update failed.");
                }
            }
        };
        xhr.send("roomId=" + roomId + "&active=" + activeValue);
    }
    </script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>