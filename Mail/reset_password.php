<?php include('pass_reset.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>H-hotel Reset Password</title>
    <!-- Social media CDN -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- favicon icon -->
    <link rel="shortcut icon" type="image/png" href="../images/favicon.png">
    <!-- css -->
    <link href="../css/reset_pass.css" type="text/css" rel="stylesheet">
  </head>

<body>

    <!-- Recover password -->
    <div class="container">
      <div class="forms-container">
        <div class="reset-password">
          <form action="reset_password.php" class="sign-in-form" method="POST">
            <h2 class="title">Reset your Password</h2>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="password" id="password">
              <i class="far fa-eye" id="toggle-Password"></i>
                    <!-- password check -->
                    <script>
                            const toggle = document.querySelector('#toggle-Password');
                            const pass = document.querySelector('#password');

                            toggle.addEventListener('click', function (h) {
                            // toggle the type attribute
                            const Type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
                            pass.setAttribute('type', Type);
                            // toggle the eye slash icon
                            this.classList.toggle('fa-eye-slash');
                        });
                    </script>
            </div>
            <progress value="0" max="100" id="strength" style="width: 250px;"></progress>

                    <!-- password strength -->
                    <script type="text/javascript">
                        var pas = document.getElementById("password");
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
            <input type="submit" value="Reset" class="btn solid" name="reset">
          </form>
        </div>
        </div>
            
      <!-- left panel -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Reset Your Password?</h3>
            <p>
                Dear User, Kindly fill up your new password with strong strength <br>
                We will help you to reset your password ASAP.
            </p>
          </div>
          <img src="../images/reset_password.svg" class="image" alt="" />
        </div>

</body>
</html>