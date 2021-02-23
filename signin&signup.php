<?php session_start();  
	if(isset($_SESSION['lock']))
    {
    	$lock_time = time() - $_SESSION['lock'];
      	if($lock_time > 15){
            unset($_SESSION['lock']);
            unset($_SESSION['try_no']);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>H-hotel Sign in &amp; Sign up</title>
    <!-- Social media CDN -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
    <!-- favicon icon -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <!-- css -->
    <link rel="stylesheet" href="css/signin&signup.css">
    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</head>
<body>

    <!-- Navigation -->
    <header>
      <img src="images/hotel logo1.png" width="160px" height="50px">
      <ul>
        <li><a href="www.php">Home</a></li>
        <li><a href="aboutus.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="signin&signup.php">Sign in &amp; Sign up</a></li>
        <li><a href="staff_login.php">Staff</a></li>
      </ul>
    </header>

    <!-- form sign in-->
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="#" class="sign-in-form" method="post">
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username" id="username">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="signin-password">
              <i class="far fa-eye" id="toggle-Password"></i>
                    <!-- password check -->
                    <script>
                            const toggle = document.querySelector('#toggle-Password');
                            const pass = document.querySelector('#signin-password');

                            toggle.addEventListener('click', function (h) {
                            // toggle the type attribute
                            const Type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
                            pass.setAttribute('type', Type);
                            // toggle the eye slash icon
                            this.classList.toggle('fa-eye-slash');
                        });
                    </script>
            </div>
            <?php
            	if($_SESSION['try_no'] > 2){
                  	$_SESSION['lock'] = time();
                	echo '<div style="color:red;">Please wait for 15 seconds</div>';
                  	header("Refresh:15");
                }else{
            ?>
            <input type="submit" value="SIGN IN" class="btn solid" name="signin">
            <?php } ?>
            <a href="Mail/recover_password.php">Forgot Password?</a>
          </form>


          <!-- form sign up-->
          <form action="#" class="sign-up-form" method="POST">
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="username1">
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" placeholder="Email" name="email1">
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password1" id="password">
              <i class="far fa-eye" id="togglePassword"></i>
                    <!-- password check -->
                    <script>
                            const togglePassword = document.querySelector('#togglePassword');
                            const password = document.querySelector('#password');

                            togglePassword.addEventListener('click', function (a) {
                            // toggle the type attribute
                            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                            password.setAttribute('type', type);
                            // toggle the eye slash icon
                            this.classList.toggle('fa-eye-slash');
                        });
                    </script>
            </div>
             <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Confirm Password" name="cf_password" id="cf-password">
              <i class="far fa-eye" id="toggle"></i>
              <span id="message" style="margin-top:5px; margin-left:28px;"></span>
                  <!-- password check -->
                  <script>
                            const togglepassword = document.querySelector('#toggle');
                            const cfpassword = document.querySelector('#cf-password');

                            togglepassword.addEventListener('click', function (h) {
                            // toggle the type attribute
                            const typee = cfpassword.getAttribute('type') === 'password' ? 'text' : 'password';
                            cfpassword.setAttribute('type', typee);
                            // toggle the eye slash icon
                            this.classList.toggle('fa-eye-slash');
                        });
                    </script>
                    <script>
                    $('#password, #cf-password').on('keyup', function () {
                      if ($('#password').val() == "" && $('#cf-password').val() == "") {
                        $('#submit-pass').prop('disabled', true);
                          $('#message').hide();
                      }else if($('#password').val() == $('#cf-password').val()) {
                        $('#message').show().html('Password Matching').css('color', 'green');
                      } else 
                        $('#message').show().html('Password Not Matching').css('color', 'red');
                    });
                    </script>
            </div>

            <!-- password strength -->
            <progress value="0" max="100" id="strength" style="width: 250px; margin-top:25px;"></progress>
                    <script type="text/javascript">
                        var pas = document.getElementById("cf-password");
                        // when keyup run the function
                        pas.addEventListener('keyup', function(){
                            checkPassword(pas.value);
                        })
                        function checkPassword(password){
                        var strengthBar = document.getElementById("strength");
                        var strength = 0;
                        if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
                            strength += 1;
                            document.getElementById('indicator').innerHTML = "Password <span style='color:red'><b>Weak</b></span>";
                        }else{
                            document.getElementById('indicator').innerHTML = "";
                        }
                        if(password.match(/[~<>?]+/)){
                            strength += 1;
                        }
                        if(password.match(/[!@#$%^&*()]+/)){
                            strength += 1;
                        }
                        if(password.length > 5){
                            strength += 1;
                            document.getElementById('indicator').innerHTML = "Password <span style='color:orange'><b>Medium</b></span>";
                        }
                        if(password.length > 8){
                            strength += 1;
                            document.getElementById('indicator').innerHTML = "Password <span style='color:green'><b>Strong</b></span>";
                        }
                        switch(strength){
                            case 0:
                                strengthBar.value = 0;
                                break;
                            case 1:
                                strengthBar.value = 20;
                                break;
                            case 2:
                                strengthBar.value = 40;
                                break;
                            case 3:
                                strengthBar.value = 60;
                                break;
                            case 4:
                                strengthBar.value = 80;
                                break;
                            case 5:
                                strengthBar.value = 100;
                                break;
                        }
                        }
                    </script>
                <span id="indicator"></span>
            <input type="submit" class="btn" value="Sign up" name="register">
          </form>
        </div>
      </div>

      <!-- left panel -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
                Nothing makes you feel better than when you get into a hotel bed, 
                and the sheets feel so good.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/signin2.svg" class="image" alt="" />
        </div>

        <!-- right panel -->
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
                Make yourself at home is our slogan. We offer the best beds in the industry. 
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/signup2.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <!-- footer -->
        <div class="footer">
            <div class="down-bar">
              <img src="images/hotel logo2.jpeg" height="120" width="170" class="hotel-logo2">
    
              <div class="Social-Media" style="cursor:pointer;">
                <i class="fa fa-facebook " aria-hidden="true" onclick="window.open('https://www.facebook.com/H-hotel-102488168444717')"></i>
                <i class="fa fa-google " aria-hidden="true" onclick="mail()"></i>
					<script>
						function mail(){
							location.href = "mailto:h.hotel.kualalumpur@gmail.com";
						}
					</script>
                <i class="fa fa-instagram" aria-hidden="true" onclick="window.open('https://www.instagram.com/h.hotel_/')"></i>
                <i class="fa fa-twitter " aria-hidden="true" onclick="window.open('https://twitter.com/Hhotel4')"></i>
              </div>
              <div class="copyright">
              <h5 style="font-weight:bold;">© Copyright 2021 H-hotel. All Right Reserved</h5>
            </div>
            </div>
		</div>
  
    <script src="https://use.fontawesome.com/49b98aaeb5.js"></script>
    <!-- signin to signup button effect -->
    <script>
        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");

        sign_up_btn.addEventListener("click", () => {
        container.classList.add("sign-up-mode");
        });

        sign_in_btn.addEventListener("click", () => {
        container.classList.remove("sign-up-mode");
        });
    </script>
    
    <!-- Scroll down effect -->
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
          var header = document.querySelector("header");
          header.classList.toggle("sticky", window.scrollY > 0)
        })
    </script>
  </body>
</html>

<!-- user signup --> 
<?php
    include("connection/user.php");
    
	if(isset($_POST["register"]))
	{
        $user_name = $_POST["username1"];
        $email = $_POST["email1"];
        $psw = $_POST['password1'];
        $cfpsw = $_POST["cf_password"];

        $_SESSION["username"] = $user_name;

        if($psw != $cfpsw)
        {
          ?>
          <script>
              alert("Sorry, Password dont not match, Try again.");
          </script>
          <?php
          die();
        }

        // create password to hash
        $hash = password_hash( $psw , PASSWORD_DEFAULT );

        $query = mysqli_query($connect, "SELECT * FROM user WHERE email='$email'");

        $count = mysqli_num_rows($query);
        if(empty($user_name) || empty($email) || empty($psw) || empty($cfpsw)){
            ?>
            <script>
                alert("Please fill up the details to sign up");
            </script>
            <?php
            die();
        }

        // check email whether exists.
        if($count != 0){
        ?>
          <script type="text/javascript">
              alert("<?php echo($email). " alreday exists, Please try another Email. " ?> ");
          </script>
        <?php
        }else{
          	if(strlen($cfpsw) <= 8){
            	?>
				<script>
                  	alert("Your password is too weak");
				</script>
				<?php
            }else{
                  $otp = rand(100000,999999);
                  $_SESSION['otp'] = $otp;
          		  $_SESSION['mail'] = $email;
              	  require "Mail/phpmailer/PHPMailerAutoload.php";
                  $mail = new PHPMailer;

                  // determines how PHPMailer goes about sending a message after it has built it.
                  //$mail->IsSMTP();
                  // smtp.gmail as your host
                  $mail->Host='smtp.gmail.com';
                  $mail->Port=587;
                  $mail->SMTPAuth=true;
                  $mail->SMTPSecure='tls';

                  // h-hotel account
                  $mail->Username='h.hotel2000@gmail.com';
                  $mail->Password='04032001';

                  // send by h-hotel email
                  $mail->setFrom('h.hotel2000@gmail.com', 'H-hotel');
                  // get email from input
                  $mail->addAddress($_POST["email1"]);
                  //$mail->addReplyTo('lamkaizhe16@gmail.com');

                  // HTML body
                  $mail->isHTML(true);
                  $mail->Subject="Your verify code";
                  $mail->Body="<p>Dear $user_name, </p> <h3>Your verification code is $otp <br></h3>
                  <p>Use this code to verfiy your account.</p>
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
                      mysqli_query($connect, "INSERT INTO user (name, username, email,phonenumber, password, status, otp, verify) VALUES (' ', '$user_name', '$email', ' ','$hash', 1, '$otp', 0)");
                    	?>
                          <script>
                              alert("<?php echo "OTP code has been sending to " . $email ?>");
                              window.location.replace("verify_account.php");
                          </script>
                      <?php
                  }
            }
		}
    }
?>

<!-- user signin --> 
<?php
    include("connection/user.php");

    if(isset($_POST["signin"])){

        // escapes special characters in a string
        $user_name = mysqli_real_escape_string($connect, trim($_POST['username']));
        // trim() removes whitespace 
        $password = trim($_POST['password']);

        $sql = "SELECT * FROM user WHERE username = '".$user_name."' ";
        if($result = mysqli_query($connect, $sql))
            // return number of rows 
            $count = mysqli_num_rows($result);
                if($count > 0){
                    // fetch a result row as an associative array.
                    $fetch = mysqli_fetch_assoc($result);
                    // fetch password 
                    $hashedpassword = $fetch["password"];

                    if($fetch["status"] == 0){
                 		 ?>
                            <script>
                                alert("Sorry, Your account has been disabled by the Admin!");
                            </script>
                        <?php
                    }else if($fetch["verify"] == 0){
                    	 ?>
                            <script>
                                alert("Sorry, your account must verify before sign in!");
                            </script>
                        <?php
                    }else if(password_verify($password, $hashedpassword)){
                    	 // cookie will expire in 1 hour
                        setcookie($user_name, $password, time() + 3600);
                        
                        // way to store information.
                        $_SESSION['username'] = $user_name;
                        $_SESSION['password'] = $password;
                        unset($_SESSION['lock']);
             			unset($_SESSION['try_no']);
                        // md5 password.
                        ?>
                            <script>
                                alert("<?php echo strtoupper($fetch["username"]). " Sign in succesful."?>");
                                //window.location.replace("room_details.php");
                                window.location.replace("ho.php");
                            </script>
                        <?php
                    }else{
                      	$_SESSION['try_no'] += 1;
                        if($_SESSION['try_no'] > 3){
                               echo '<script language="javascript">';
                               echo 'alert("Too many attempt of sign in")';
                               echo '</script>';
                         }else{
                          ?>
                          <script>
                              alert("<?php echo "Invalid Password, number of attempt " . $_SESSION['try_no'] ?>");
                          </script>
           				<?php }
                   }
                }else{
                 		 $_SESSION['try_no'] += 1;
                        if($_SESSION['try_no'] > 3){
                               echo '<script language="javascript">';
                               echo 'alert("Too many attempt of sign in")';
                               echo '</script>';
                         }else{
                          ?>
                          <script>
                              alert("<?php echo "Invalid Password and Username, number of attempt " . $_SESSION['try_no'] ?>");
                          </script>
           				<?php }
                }
        }else{
            exit();
        }
?>

