<?php
session_start();
include '../sqlCommands/connectDb.php';
include 'main.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Shuttle Service</title>
    <link rel="stylesheet" href="css/styles.css">
    <!-- <link rel="stylesheet" href="css/card.css"> -->
    

    <!-- Bootstrap CSS links -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
    <link rel="icon" href="assets/img/Logo.png">


    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>


    <!-- Custom Styles -->
    <style>

        .video-container {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
            height: 51vh;
            overflow: hidden;
        }

        video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        }


        /* card the container */
        .centered {
        transform: translateX(-25%);
        display: flex;
        align-items: center;
        justify-content: flex-start;
        gap: 3rem;
        height: 100%;
        }

        .card {
        position: relative;
        height: 28rem;
        width: 20rem;
        aspect-ratio: 5/7;
        color: #ffffff;
        perspective: 50rem;
        }
        .card .shadow {
        position: absolute;
        inset: 0;
        background: var(--url);
        background-size: cover;
        background-position: center;
        opacity: 0.8;
        filter: blur(2rem) saturate(0.9);
        box-shadow: 0 -1.5rem 2rem -0.5rem rgba(0, 0, 0, 0.7);
        transform: rotateX(var(--rotateX)) rotateY(var(--rotateY)) translate3d(0, 2rem, -2rem);
        }
        .card .image {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.5), transparent 40%), var(--url);
        background-size: cover;
        background-position: center;
        -webkit-mask-image: var(--url);
                mask-image: var(--url);
        -webkit-mask-size: cover;
                mask-size: cover;
        -webkit-mask-position: center;
                mask-position: center;
        }
        .card .image.background {
        transform: rotateX(var(--rotateX)) rotateY(var(--rotateY)) translate3d(0, 0, 0rem);
        }
        .card .image.cutout {
        transform: rotateX(var(--rotateX)) rotateY(var(--rotateY)) translate3d(0, 0, 4rem) scale(0.92);
        z-index: 3;
        }
        .card .content {
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        inset: 0;
        padding: 3.5rem;
        transform: rotateX(var(--rotateX)) rotateY(var(--rotateY)) translate3d(0, 0, 6rem);
        z-index: 4;
        }
        .card::after, .card::before {
        content: "";
        position: absolute;
        inset: 1.5rem;
        border: #e2c044 0.5rem solid;
        transform: rotateX(var(--rotateX)) rotateY(var(--rotateY)) translate3d(0, 0, 2rem);
        }
        .card::before {
        z-index: 4;
        }
        .card.border-left-behind::before {
        border-left: transparent;
        }
        .card.border-right-behind::before {
        border-right: transparent;
        }
        .card.border-bottom-behind::before {
        border-bottom: transparent;
        }

        h2 {
        font-size: 1.25rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
        text-shadow: 0 0 2rem rgba(0, 0, 0, 0.5);
        }

        p {
        font-weight: 300;
        text-shadow: 0 0 2rem rgba(0, 0, 0, 0.5);
        }


        .txt {
        transform: translateX(-35%);
        position: inherit; ;
        text-align: center;
        margin: 20px;
        padding: 20px;
        font-size: 36px;
        color: #333;
}


    </style>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg bg-light fixed-top shadow-sm p-3 bg-white">
        <div class="container-fluid">
            <a class="navbar-brand logo" href="#">
                <img src="img/logo.png" alt="" width="100">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="mainPage.php"><i class="fa-solid fa-home-user"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="apply_for_hostel_booking.php"> <i class="fa-solid fa-file-arrow-up"></i> Apply Booking </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../vr/render/index.htm"> <i class="fa-solid fa-street-view"></i> View</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../../../vr1/index.htm"> <i class="fa-solid fa-street-view"></i> View1</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="hostel_payment_history.php"><i class="fa-solid fa-history"></i> Payment History</a>
                    </li>

                    <li class="nav-item">
                        <div class="dropdown">
                            <?php if ($gender == "Female") {?>
                            <img class="dropdown-toggle pro" src="../../img/Female.png" alt="img"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                            <?php if ($gender == "Male") { ?>
                            <img class="dropdown-toggle pro" src="../../img/man.png" alt="img" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <?php } ?>
                            <?php if ($gender != "Male" && $gender != "Female") { ?>
                            <img class="dropdown-toggle pro"
                                src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($image); ?>" alt="img"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
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

    <!-- Shuttle Container -->
<div class="container py-5 shuttle-container" style = "margin : 500px" >
    <div class="video-container">
        <video controls autoplay loop volume="50%" >
        <source src="../../../vr/img/HP.mp4"  type="video/mp4">
        </video>
    </div>

    <div class="txt">
        <h1>Our Services</h1>
    </div>

    <div class="centered">
  <div class="card border-left-behind">
    <div class="shadow" style="--url: url('https://i.ibb.co/3B5t2hp/wifi-isometric-icon-wireless-internet-technology-isolated-vector-illustration-107791-4535.jpg')"></div>
    <div class="image background" style="--url: url('https://i.ibb.co/R2S2K4m/digital-technology-background-with-abstract-wave-border-53876-117508.jpg')"></div>
    <div class="image cutout" style="--url: url('https://i.ibb.co/3B5t2hp/wifi-isometric-icon-wireless-internet-technology-isolated-vector-illustration-107791-4535.jpg')"></div>
    <div class="content">
      <h2>WIFI Service</h2>
      <p>Unlimited high Speed Internet.</p>
    </div>
  </div>
  <div class="card border-right-behind border-bottom-behind">
    <div class="shadow" style="--url: url('https://i.ibb.co/RvF8YFz/detailed-nasi-lemak-dish-52683-62627.jpg')"></div>
    <div class="image background" style="--url: url('https://i.ibb.co/ZdGBm4K/m-background.png')"></div>
    <div class="image cutout" style="--url: url('https://i.ibb.co/RvF8YFz/detailed-nasi-lemak-dish-52683-62627.jpg')"></div>
    <div class="content">
      <h2>Meal Service</h2>
      <p>meal charge will be applied separately.</p>
    </div>
  </div>
  <div class="card border-left-behind">
    <div class="shadow" style="--url: url('https://i.ibb.co/K6Skb5s/isometric-public-security-recognition-cctv-technology-set-isolated-icons-with-flying-drone-cameras-p.jpg')"></div>
    <div class="image background" style="--url: url('https://i.ibb.co/R2S2K4m/digital-technology-background-with-abstract-wave-border-53876-117508.jpg')"></div>
    <div class="image cutout" style="--url: url('https://i.ibb.co/K6Skb5s/isometric-public-security-recognition-cctv-technology-set-isolated-icons-with-flying-drone-cameras-p.jpg')"></div>
    <div class="content">
      <h2>24/7 Hour Security</h2>
      <p>Security service managed by UIU</p>
    </div>
  </div>


  </div>
    

   



    <!-- Include necessary scripts and libraries here -->
    <script src="assets/js/cad.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/custom.js"></script>
    
</body>

</html>