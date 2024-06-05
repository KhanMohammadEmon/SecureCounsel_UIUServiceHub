<?php
include "pages/login/login.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textual CAPTCHA Example with Bootstrap</title>
    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pyscript.net/releases/2024.1.1/core.css" />
    <script type="module" src="https://pyscript.net/releases/2024.1.1/core.js"></script>

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        #captcha {
            font-family: Arial, sans-serif;
            font-size: 1.5em;
            margin-bottom: 20px;
        }

        #refresh {
            cursor: pointer;
            color: blue;
            text-decoration: underline;
            margin-bottom: 20px;
            display: block;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <h2 class="mt-4 mb-4">Solve The  CAPTCHA After This System</h2>

            <div id="captcha" class="bg-light p-3 mb-4"></div>

            <div class="input-group mb-3">
                <input type="text" class="form-control" id="captchaInput" placeholder="Enter CAPTCHA">
                <div class="input-group-append">
                    <button class="btn btn-primary" id="submitBtn">Submit</button>
                </div>
            </div>

            <div id="refresh" class="mb-4">Refresh</div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        refreshCaptcha();

        document.getElementById("refresh").addEventListener("click", function () {
            refreshCaptcha();
        });

        document.getElementById("submitBtn").addEventListener("click", function () {
            validateCaptcha();
        });
    });

    function refreshCaptcha() {
        var captchaContainer = document.getElementById("captcha");
        captchaContainer.textContent = generateCaptchaText();
        document.getElementById("captchaInput").value = "";
    }

    function generateCaptchaText() {
        var characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        var captchaText = "";

        for (var i = 0; i < 6; i++) { 
            var randomIndex = Math.floor(Math.random() * characters.length);
            captchaText += characters.charAt(randomIndex);
        }

        return captchaText;
    }

    function validateCaptcha() {
        var userEnteredCaptcha = document.getElementById("captchaInput").value;
        var generatedCaptcha = document.getElementById("captcha").textContent;

        if (userEnteredCaptcha === generatedCaptcha) {
            
            window.location.href = 'index2.php';
        } else {
            
            alert('Incorrect CAPTCHA. Please try again.');
            refreshCaptcha();
        }
    }
</script>



</body>
</html>
