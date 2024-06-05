<?php
    include "pages/sqlCommands/connectDb.php";
    include "captcha.php";


    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;


    // session_start();
    //checking if already logged in
    if($captcha==1){
    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
        if($_SESSION['type'] == "admin")
            header("location: pages/admin/mainPage.php");
        else if($_SESSION['type'] == "forumRep")
               
            header("location: pages/forumRep/mainPage.php");
        else if($_SESSION['type'] == "general_user")
            header("location: pages/general_user/mainPage.php");
    }
    else{
        session_destroy();
    }

}
    else{
        session_destroy();
    }


    
    function custom_hash($password) {
        $hash_value = 0;
        for ($i = 0; $i < strlen($password); $i++) {
            $hash_value = ($hash_value << 5) ^ ord($password[$i]);
        }
        $hashed_password = dechex($hash_value);
        $hashed_password = str_pad($hashed_password, 13, '0', STR_PAD_RIGHT);
        return $hashed_password;
    }
    
    $login_err = 0;
    $ip = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // $useremail = $_POST["email"];
        // $password = $_POST["password"];
        $loginType = $_POST["type"];
        // $hashed_password = custom_hash($password);

        
        $useremail = mysqli_real_escape_string($sql, $_POST['email']);

        $hashed_password = mysqli_real_escape_string($sql,custom_hash($_POST['password']));


     
        

        $query = "select id, email, passwords,failed_attempts from {$loginType} where email='{$useremail}';";
        
        $row = mysqli_fetch_assoc(mysqli_query($sql, $query));
        
        if(!empty($row) && $row["email"] == $useremail && $row["passwords"] == $hashed_password){

        // Reset failed attempts
        $query1 = "UPDATE {$loginType} SET failed_attempts = 0 WHERE email='{$useremail}';";
        mysqli_query($sql, $query1); 

            //starting a session
            session_start();
            $_SESSION["loggedin"] = true;
            $_SESSION['email'] = $row["email"];
            $_SESSION['type'] = $loginType;
            $_SESSION["currentPass"] = 0;
            $_SESSION["id"] = $row["id"];
        }
        else {
        
        $query1 = "UPDATE {$loginType} SET failed_attempts = failed_attempts + 1 WHERE email='{$useremail}';";
        mysqli_query($sql, $query1);
        $login_err = 1;
        if ($row["failed_attempts"] >= 2) {
            // Send email alert
            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'gkibria201369@bscse.uiu.ac.bd'; // Your Gmail address
                $mail->Password   = 'rhwofjlvdxkxbpye'; // Your Gmail app password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                $mail->setFrom('gkibria201369@bscse.uiu.ac.bd', 'Kibria');
                $mail->addAddress($useremail);
                $mail->isHTML(true);
                $mail->Subject = 'Too Many Login Attempts';
                $mail->Body    = 'Dear User,<br><br>Someone Try to login your account. Please change your password.';
                $mail->send();

                $query = "UPDATE {$loginType} SET failed_attempts = 0 WHERE email='{$useremail}';";
                mysqli_query($sql, $query); // Resetting failed_attempts count
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
            }
        }

        }

        if(session_status()==2 && $captcha == 1){

        $visitor_ip = $_SERVER['REMOTE_ADDR'];


        // $allowed_ips = array('::1', '127.0.0.1', '192.168.0.1');


        $r_ip = "SELECT ip FROM IP";
        $result_ip = $sql->query($r_ip);

        $allowed_ips = array();
        

        if ($result_ip->num_rows > 0) {

        while($row = $result_ip->fetch_assoc()) {
        $allowed_ips[] = $row["ip"];
        }
        } 

        if (in_array($visitor_ip, $allowed_ips) || $loginType == "admin") {
            header("location: pages/".$_SESSION['type']."/mainPage.php");
        }
        else
        {
          $ip = 1;
        }
           
        }
        else
        {
            $_SESSION["loggedin"] = false;
        }

    }
?>