<?php
include "pages/login/login.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>UIU Service Hub</title>
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="icon" href="assets/img/favicon.png">
</head>

<body>
    <main class="container row justify-content-between m-auto mt-5 p-4">
        <div class="col-5 text-center">

            <h1 class="m-0 text-uppercase fw-bold text-center">welcome to</h1> <br>
            <img src="assets/img/Logo.png" alt="knowledge" class="img-fluid">

        </div>
        <div class="col-7 d-flex flex-column align-items-center">

   

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
                class="w-100 needs-validation d-flex flex-column align-items-center" novalidate method="POST">
                <section class="row w-75 mb-4">
                    <h1 class="text-uppercase fw-bold m-0 col-8">login</h1>
                    <div id="admin-radio" class="d-flex col-4 align-items-center justify-content-between">
                        <input type="checkbox" class="form-check-input m-0" id="admin" value="admin">
                        <label for="admin" class="form-check-label text-capitalize fw-bold">Login as admin</label>
                    </div>
                </section>

                <div class="form-floating w-75">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com"
                        value="" required>
                    <label for="email">Email address</label>
                    <div class="invalid-feedback">
                        Please provide a valid email address
                    </div>
                </div>

                <div class="form-floating w-75">
                    <input type="password" name="password" class="form-control" id="password" placeholder="*******"
                    minlength="3" maxlength="8" value="" required>
                    <label for="password">Password</label>
                </div>

                <section class="d-flex flex-column align-items-center" id="type-section" style="margin-left: -280px;">
                    <p class="m-1 fw-bold">Log in as Forum Representitive ?</p>
                    <div class="w-75">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="forum" required
                                value="forumRep">
                            <label class="form-check-label" for="forum">
                                Yes
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="general" required
                                value="general_user">
                            <label class="form-check-label" for="general">
                                No
                            </label>
                            <div class="invalid-feedback" style="color: red !important;">
                                Choose first
                            </div>
                        </div>


                    </div>
                </section>
                <section id = "type-captcha">
                <div style="margin-left: 352px;margin-top: -94px; ">
                    <img src="pages/login/capacha.jpg" style="width: 180px;height: 70px;margin-top: -20px;border-radius: 5px;" > <br>
                    <input type="text" name="number" placeholder="Captcha"
                        style="margin: 1px;padding: 8px;border: solid thin #aaa;border-radius: 5px;width: 180px;">
                
                </div>
                </section>



                <button class="btn" type="submit">Login</button>

                <?php
                if ($login_err == 1) {
                    echo "<div class='text-capitalize fw-bold' style= 'color: red !important'>email or password incorrect</div>";
                }

                if ($captcha == 2) {
                    echo "<div class='text-capitalize fw-bold' style= 'color: red !important'>captcha is wrong</div>";
                }
                if($ip == 1){
                    echo "<div class='text-capitalize fw-bold' style= 'color: red !important'>Access denied. Your IP is not authorized.<p class='link text--center'>Click here to <a href='index.php'>Login</a> again.</p></div>";
                }
                ?>
            </form>

            <div class="w-100 d-flex align-items-center">
                <div class="dropdown-divider w-75"></div>
                <h5 class="text-uppercase m-0 fw-bold">or</h5>
                <div class="dropdown-divider w-75"></div>
            </div>

            <h5 class="mt-4 fw-bold">Are you new? <a href="pages/login/signup.php" class="ml-1">Create new account</a>
            </h5>
            <h5 class="mt-4 fw-bold">Forgate Your PassWord? <a href="smtp\recover_psw.php" class="ml-1">Click Here</a>
            </h5>
        </div>

    </main>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/all.min.js"></script>
    <script src="assets/js/login_validation.js"></script>
    <script src="assets/js/app.js"></script>

</body>

</html>