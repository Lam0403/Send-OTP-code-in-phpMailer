<?php
// session start
session_start();

include("password-connection.php");

/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if(isset($_POST["recover"]))  
{
    $email = $_POST["Email"];

    $sql = mysqli_query($connect, "SELECT email FROM user_signup WHERE email='$email'");
    
    // if empty 
    if(empty($email)){
        ?>
            <script>
                alert("<?php echo "Sorry, Please key in your email"?>")
            </script>
        <?php
    }else if(mysqli_num_rows($sql) <= 0){   // if no email exists
        ?>
            <script>
                alert("<?php  echo "Sorry, no emails exists "?>");
            </script>
        <?php
    }else{
        // generate token by binaryhexa 
        $token = bin2hex(random_bytes(50));

        //session_start ();
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        mysqli_query($connect, "INSERT INTO user_password_reset(email, token) VALUES ('$email', '$token')");

        require "phpmailer/PHPMailerAutoload.php";
        $mail = new PHPMailer;

        // determines how PHPMailer goes about sending a message after it has built it.
        $mail->IsSMTP();
        // smtp.gmail as your host
        $mail->Host='smtp.gmail.com';
        $mail->Port=587;
        $mail->SMTPAuth=true;
        $mail->SMTPSecure='tls';

        // h-hotel account
        $mail->Username='lamkaizhe16@gmail.com';
        $mail->Password='lam123456789';

        // send by h-hotel email
        $mail->setFrom('lamkaizhe16@gmail.com', 'H-hotel');
        // get email from input
        $mail->addAddress($_POST["Email"]);
        //$mail->addReplyTo('lamkaizhe16@gmail.com');

        // HTML body
        $mail->isHTML(true);
        $mail->Subject="Recover your password";
        $mail->Body="<b>Dear User</b>
        <h3>We received a request to reset your password at H-hotel.</h3>
        <p>Kindly click the below link to reset your password</p>
        https://stlee.mmu.biz/Mail/reset_password.php
        <br><br>
        <p>With regrads,</p>
        <b>H-hotel Team</b>";

        if(!$mail->send()){
            ?>
                <script>
                    alert("<?php echo " Invalid Email "?>");
                </script>
            <?php
        }else{
            ?>
                <script>
                  	alert("<?php echo "Done"?>");
                </script>
            <?php
        }
    }
}

/* update password */
if(isset($_POST["reset"]))
{
    $pass = $_POST["password"];
    $hash = password_hash( $pass , PASSWORD_DEFAULT );

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    $Email = $_SESSION['email'];

    if(empty($pass)){
    ?>
        <script>
            alert("Please key in your new password");
        </script>
        <?php
    }else{

        if($Email){
            $new_pass = $hash;
            mysqli_query($connect, "UPDATE user_signup SET password='$new_pass' WHERE email='$Email'");
            ?>
            <script>
                window.location.replace("../signin&signup.php");
                alert("<?php echo "your password has been succesful reset"?>");
            </script>
            <?php
        }else{
            ?>
            <script>
                window.location.replace("../signin&signup.php");
                alert("<?php echo "Please try again"?>");
            </script>
            <?php
        }
    }
}
?>