<?php
  include '../sqlCommands/connectDb.php';
   session_start();
    $email = $_SESSION['email'];

    include 'En_decryption.php';
    $key = $email;
    $E_email = simpleEncrypt($email, $key);


    $r = "SELECT * FROM `shuttle_payment` WHERE `email` = '$E_email'";
    $result = mysqli_query($sql, $r);
    $row = mysqli_fetch_assoc($result);
    if($row>0) 
    {
        $name = $row['first_name'].' '.$row['last_name'];
        $s_id = $row['student_id'];
        $D_s_id = simpleDecrypt($s_id, $key);
        $phone = $row['phone_number'];
        $D_phone = simpleDecrypt($phone, $key);
        $route_name = $row['route_name'];
        $r_id = $row['route_id'];
    }
   
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Ticket</title>

    <style>
    * {
        border: 0;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --hue: 223;
        --bg: hsl(var(--hue), 10%, 90%);
        --fg: hsl(var(--hue), 10%, 10%);
        --primary: hsl(var(--hue), 90%, 55%);
        font-size: calc(20px + (30 - 20) * (100vw - 320px) / (1280 - 320));
    }

    body {
        background-color: var(--bg);
        color: var(--fg);
        font: 1em/1.5 sans-serif;
        height: 100vh;
        display: grid;
        place-items: center;
        perspective: 600px;
        transition: background-color 0.3s;
    }

    .card,
    .card__chip {
        overflow: hidden;
        position: relative;
    }

    .card,
    .card__chip-texture,
    .card__texture {
        animation-duration: 3s;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
    }

    .card {
        animation-name: rotate;
        background-color: #fa5e03;
        background-image:
            radial-gradient(circle at 100% 0%, hsla(0, 0%, 100%, 0.08) 29.5%, hsla(0, 0%, 100%, 0) 30%),
            radial-gradient(circle at 100% 0%, hsla(0, 0%, 100%, 0.08) 39.5%, hsla(0, 0%, 100%, 0) 40%),
            radial-gradient(circle at 100% 0%, hsla(0, 0%, 100%, 0.08) 49.5%, hsla(0, 0%, 100%, 0) 50%);
        border-radius: 0.5em;
        box-shadow:
            0 0 0 hsl(0, 0%, 80%),
            0 0 0 hsl(0, 0%, 100%),
            -0.2rem 0 0.75rem 0 hsla(0, 0%, 0%, 0.3);
        color: hsl(0, 0%, 100%);
        width: 10.3em;
        height: 6.8em;
        transform: translate3d(0, 0, 0);
    }

    .card__info,
    .card__chip-texture,
    .card__texture {
        position: absolute;
    }

    .card__chip-texture,
    .card__texture {
        animation-name: texture;
        top: 0;
        left: 0;
        width: 200%;
        height: 100%;
    }

    .card__info {
        font: 0.75em/1 "DM Sans", sans-serif;
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        padding: 0.75rem;
        inset: 0;
    }

    .card__logo,
    .card__number {
        width: 100%;
    }

    .card__logo {
        font-weight: bold;
        font-style: italic;
    }

    .card__chip {
        background-image: linear-gradient(hsl(0, 0%, 70%), hsl(0, 0%, 80%));
        border-radius: 0.2rem;
        box-shadow: 0 0 0 0.05rem hsla(0, 0%, 0%, 0.5) inset;
        width: 1.25rem;
        height: 1.25rem;
        transform: translate3d(0, 0, 0);
    }

    .card__chip-lines {
        width: 100%;
        height: auto;
    }

    .card__chip-texture {
        background-image: linear-gradient(-80deg, hsla(0, 0%, 100%, 0), hsla(0, 0%, 100%, 0.6) 48% 52%, hsla(0, 0%, 100%, 0));
    }

    .card__type {
        align-self: flex-end;
        margin-left: auto;
    }

    .card__digit-group,
    .card__exp-date,
    .card__name {
        background: linear-gradient(hsl(0, 0%, 100%), hsl(0, 0%, 85%) 15% 55%, hsl(0, 0%, 70%) 70%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-family: "Courier Prime", monospace;
        filter: drop-shadow(0 0.05rem hsla(0, 0%, 0%, 0.3));
    }

    .card__number {
        font-size: 0.8rem;
        display: flex;
        justify-content: space-between;
    }

    .card__valid-thru,
    .card__name {
        text-transform: uppercase;
    }

    .card__valid-thru,
    .card__exp-date {
        margin-bottom: 0.25rem;
        width: 50%;
    }

    .card__valid-thru {
        font-size: 0.3rem;
        padding-right: 0.25rem;
        text-align: right;
    }

    .card__exp-date,
    .card__name {
        font-size: 0.6rem;
    }

    .card__exp-date {
        padding-left: 0.25rem;
    }

    .card__name {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        width: 6.25rem;
    }

    .card__vendor,
    .card__vendor:before,
    .card__vendor:after {
        position: absolute;
    }

    .card__vendor {
        right: 0.375rem;
        bottom: 0.375rem;
        width: 2.55rem;
        height: 1.5rem;
    }

    .card__vendor:before,
    .card__vendor:after {
        border-radius: 50%;
        content: "";
        display: block;
        top: 0;
        width: 1.5rem;
        height: 1.5rem;
    }

    .card__vendor:before {
        background-color: #e71d1a;
        left: 0;
    }

    .card__vendor:after {
        background-color: #fa5e03;
        box-shadow: -1.05rem 0 0 #f59d1a inset;
        right: 0;
    }

    .card__vendor-sr {
        clip: rect(1px, 1px, 1px, 1px);
        overflow: hidden;
        position: absolute;
        width: 1px;
        height: 1px;
    }

    .card__texture {
        animation-name: texture;
        background-image: linear-gradient(-80deg, hsla(0, 0%, 100%, 0.3) 25%, hsla(0, 0%, 100%, 0) 45%);
    }

    /* Dark theme */
    @media (prefers-color-scheme: dark) {
        :root {
            --bg: hsl(var(--hue), 10%, 30%);
            --fg: hsl(var(--hue), 10%, 90%);
        }
    }

    @keyframes texture {

        from,
        to {
            transform: translate3d(0, 0, 0);
        }

        50% {
            transform: translate3d(-50%, 0, 0);
        }
    }

    @media print {

        .hidden-print,
        .hidden-print * {
            display: none !important;
        }
    }

    .card__name {
        font-size: 0.58rem !important;
    }
    </style>
</head>

<body>

    <?php
     if($row<=0)
     {
        ?>
    <script>
    window.location.replace("shuttle_service.php");
    alert("<?php echo "Please Reg. First"?>");
    </script>
    <?php
     }
     else
     {
        ?>
    <div class="card">
        <div class="card__info">
            <div class="card__logo">Shuttle Card</div>
            <div class="card__number">
                <span class="card__digit-group"><?php echo $name?></span>
            </div><br>
            <div class="card__name"><?php echo $D_s_id?></div><br>
            <div class="card__name"><?php echo $D_phone?></div><br>
            <div class="card__name"><?php echo $route_name ?></div>
            <div class="card__name" aria-label="Dee Stroyer"><?php echo $r_id?></div>
            <div class="img1"> <img src="assets/img/bus.png" alt=""></div>
            <div class="img "> <img src="assets/img/uiu.png" alt=""></div>

        </div>
        <div class="card__texture"></div>
    </div>
    <button id="btnPrint" type="button" class="hidden-print btn btn-primary">Print</button>
    <?php
     }
    ?>
</body>
<script>
const $btnPrint = document.querySelector("#btnPrint");
$btnPrint.addEventListener("click", () => {
    window.print();
});
</script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.8.1/css/all.css"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>