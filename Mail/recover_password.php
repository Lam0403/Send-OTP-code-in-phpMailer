<?php include('pass_reset.php'); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>H-hotel Recover Password</title>
    <!-- Social media CDN -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <!-- favicon icon -->
    <link rel="shortcut icon" type="images/png" href="../images/favicon.png">
    <!-- css -->
    <link href="../css/recover_pass.css" type="text/css" rel="stylesheet">
  </head>
<body>

    <!-- Recover password -->
    <div class="container">
      <div class="forms-container">
        <div class="recover-password">
          <form action="recover_password.php" class="sign-in-form" method="post">
            <h2 class="title">Recover your Password</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="email" placeholder="Email" name="Email">
            </div>
            <input type="submit" value="Recover" class="btn solid" name="recover">
          </form>
        </div>
        </div>
            
      <!-- left panel -->
      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>Recover Your Password?</h3>
            <p>
                Dear User, Thank you shooping with us. Kindly fill up your email <br>
                We will help you to recover your password ASAP.
            </p>
          </div>
          <img src="../images/recover_password.svg" class="image" alt="" />
        </div>
</body>
</html>
