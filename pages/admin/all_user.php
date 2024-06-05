<?php
include '../sqlCommands/connectDb.php';
include '../general_user/showUser.php';
$f_q = "select * from forumRep";
$g_q = "select * from general_user";

$forum_query = mysqli_query($sql, $f_q);
$user_query = mysqli_query($sql, $g_q);
?>
<?php
include 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All USER</title>

    <!-- ======= Styles ====== -->

    <style>
    body {
        font-family: "Dosis";
    }

    .card .p-1 {
        margin-bottom: 100px !important;
    }
    </style>

</head>


<body>
<div class="container main">
    <div class="mt-3">
        <h2 class="border-bottom-uiu">Forum Represetitive List:</h2>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php if (mysqli_num_rows($forum_query) == 0) : ?>
            <tr>
                <td colspan="4">No users yet</td>
            </tr>
            <?php else : ?>

            <?php while ($f_row = mysqli_fetch_assoc($forum_query)) : ?>
            <tr>
                <td class="text-capitalize "><?= "{$f_row["first_name"]} {$f_row["last_name"]}" ?></td>
                <td><?= $f_row["email"] ?></td>
                <td><?= $f_row["phone_number"] ?></td>
                <td>
                    <div>
                        <a href="deleteUser.php?id=<?= $f_row["id"] ?>&type=forumRep" title="Delete"><i
                                class="fa-regular fa-trash-can text-danger fa-xl"></i></a>
                    </div>
                </td>
            </tr>
            <?php endwhile ?>

            <?php endif ?>
        </table>
    </div>


    <div class="mt-5">
        <h2 class="border-bottom-uiu">General User List:</h2>
        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php if (mysqli_num_rows($user_query) == 0) : ?>
            <tr>
                <td colspan="4">No users yet</td>
            </tr>
            <?php else : ?>

            <?php while ($f_row = mysqli_fetch_assoc($user_query)) : ?>
            <tr>
                <td class="text-capitalize "><?= "{$f_row["first_name"]} {$f_row["last_name"]}" ?></td>
                <td><?= $f_row["email"] ?></td>
                <td><?= $f_row["phone_number"] ?></td>
                <td>
                    <div>
                        <a href="deleteUser.php?id=<?= $f_row["id"] ?>&type=general_user" title="Delete"><i
                                class="fa-regular fa-trash-can text-danger fa-xl"></i></a>
                    </div>
                </td>
            </tr>
            <?php endwhile ?>

            <?php endif ?>
        </table>
    </div>
</div> 
</body>
</html>






