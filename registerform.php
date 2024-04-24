<?php
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="container">
      <div class="center">
       
        <div class="msg" id="message"></div>
        <form method="POST" enctype="multipart/form-data" action="#" id="signupForm">

        <div>
            <label>Profile Image</label> <br>
            <input type="file" name="image" id="image"/>
        </div>
          <div class="txt_field">
            <input type="text" name="name" id="name" autocomplete="" required />

            <label>Name</label>
            <div class="error" id="nameError"></div>
          </div>

          <div class="txt_field">
            <input type="email" name="email" id="email" autocomplete="" required/>

            <label>Email</label>
            <div class="error" id="emailError"></div>
          </div>

          <div class="txt_field">
            <input type="text" maxlength="10" name="mobile" id="mobile" autocomplete="" required/>

            <label>Mobile Number</label>
            <div class="error" id="mobileError"></div>
          </div>
           
          <div>
              <span>Which Course Do you Have an Certify?</span> <br>
              <input type="checkbox" id="courseJS" name="course[]" value="JavaScrpit">
              <label for="courseJS">JavaScrpit</label><br>
              <input type="checkbox" id="coursePHP" name="course[]" value="PHP">
              <label for="coursePHP">PHP</label><br>
              <input type="checkbox" id="courseGolang" name="course[]" value="Golang">
              <label for="courseGolang">Golang</label><br><br>
              <div class="error" id="courseError"></div>
          </div>

          <div class="txt_field">
            <input type="password" name="password" id="password" autocomplete="" required/>

            <label>Password</label>
            <div class="error" id="passwordError"></div>
          </div>

          <div class="txt_field">
            <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="" required/>

            <label>Confirm Password</label>
            <div class="error" id="confirmPasswordError"></div>
          </div>

          <div>
              <input type="submit" value="Register" id="signForm"
              class="btn" name="register">
          </div>
          <div class="signup_link">
            Have an Account ? <a href="login.php">Login Here</a>
          </div>
        </form>
      </div>
    </div>
    <script src="main.js"></script>
</body>
</html>

<?php

if(isset($_POST['register'])) {

  // all html value get 
  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "images/".$filename;
  move_uploaded_file($tempname , $folder);


  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $arr  = $_POST['course'];
  //convert array into string
  $course = implode(",", $arr);
  $password = $_POST['password'];

  //validation
  if($folder!='' && $name != '' && $email != '' && $mobile != '' && $course != '' && $password != ''){ 

  //run sql query
  $query = "INSERT INTO USERS (Profile, Name, Email, Mobile, Course, Password) VALUES ('$folder', '$name', '$email', '$mobile', '$course', '$password')";

  $data = mysqli_query($connection, $query);
  if($data) {
      echo 'Register Successfully';
  } else {
      echo 'Registration Failed: '. mysqli_error($connection);
  }
}   else {
       echo "<script> alert('Plaese enter all Details');</script>";
}
}
?>