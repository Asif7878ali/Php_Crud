<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container">
      <div class="center">
        <h1>Login</h1>
        <div class="msg" id="message"></div>
        <form method="POST" action="#" id="loginForm">
          
          <div class="txt_field">
            <input type="email" name="email" id="email" autocomplete="" required/>

            <label>Email</label>
            <div class="error" id="emailError"></div>
          </div>


          <div class="txt_field">
            <input type="password" name="password" id="password" autocomplete="" required/>

            <label>Password</label>
            <div class="error" id="passwordError"></div>
          </div>

          <div>
              <input type="submit" value="Register"
              class="btn" name="register">
          </div>
          <div class="signup_link">
          Do not Have an Account ? <a href="registerform.php">Register Here</a>
          </div>
          <div class="signup_link">
          See all Data ? <a href="displayformdata.php">Click Here</a>
          </div>
        </form>
      </div>
    </div>
</body>
</html>