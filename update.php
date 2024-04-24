<?php
include('database.php');

$id = $_GET['id'];
$query = "SELECT * FROM USERS WHERE ID = '$id'";
$data = mysqli_query($connection, $query);
$result = mysqli_fetch_assoc($data);

$course =explode("," , $result['Course']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css" />
</head>
</head>

<body>
  <div class="container">
    <div class="center">
      <h1>Update Form</h1>
      <div class="msg" id="message"></div>
      <form method="POST" enctype="multipart/form-data" action="#" id="signupForm">

      <div>
            <label>Profile Image</label> <br>
            <input type="file" value="<?php echo $result['Profile'] ?>" name="image" id="image"/>
        </div>

        <div class="txt_field">
          <input value="<?php echo $result['Name'] ?>" type="text" name="name" id="name" autocomplete="" required />
        
          <label>Name</label>
          <div class="error" id="nameError"></div>
        </div>

        <div class="txt_field">
          <input value="<?php echo $result['Email'] ?>" type="email" name="email" id="email" autocomplete="" required />

          <label>Email</label>
          <div class="error" id="emailError"></div>
        </div>

        <div class="txt_field">
          <input value="<?php echo $result['Mobile'] ?>" type="text" maxlength="10" name="mobile" id="mobile" autocomplete="" required />

          <label>Mobile Number</label>
          <div class="error" id="mobileError"></div>
        </div>

        <div>
          <span>Which Course Do you Have an Certify?</span> <br>
          <input type="checkbox" id="courseJS" name="courses[]" value="JavaScript"
            <?php
            if(in_array('JavaScript' , $course))  {
                echo  "checked";
            };
            ?>
          >
          <label for="courseJS">JavaScript</label><br>
          <input type="checkbox" id="coursePHP" name="courses[]" value="PHP"
          <?php
            if(in_array('PHP' , $course))  {
                echo  "checked";
            };
            ?>
          >
          <label for="coursePHP">PHP</label><br>
          <input type="checkbox" id="courseGolang" name="courses[]" value="Golang"
          <?php
            if(in_array('Golang' , $course))  {
                echo  "checked";
            };
            ?>

          >
          <label for="courseGolang">Golang</label><br><br>
          <div class="error" id="courseError"></div>
        </div>


        <div class="txt_field">
          <input value="<?php echo $result['Password'] ?>" type="password" name="password" id="password" autocomplete="" required />

          <label>Password</label>
          <div class="error" id="passwordError"></div>
        </div>

        <div class="txt_field">
          <input type="password" name="confirmPassword" id="confirmPassword" autocomplete="" required />

          <label>Confirm Password</label>
          <div class="error" id="confirmPasswordError"></div>
        </div>

        <div>
          <input type="submit" value="Save" class="btn"id="signForm" name="edit">
        </div>
        <div class="signup_link">
          <a href="displayformdata.php">Table</a>
        </div>
      </form>
    </div>
  </div>
  <script src="main.js"></script>
</body>
</body>

</html>
<?php

if(isset($_POST['edit'])) {

  // all html value get 
  //Image
  $filename = $_FILES["image"]["name"];
  $tempname = $_FILES["image"]["tmp_name"];
  $folder = "images/".$filename;
  move_uploaded_file($tempname , $folder);

  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $arr  = $_POST['courses'];
  //convert array into string
  $course = implode(",", $arr);

  $password = $_POST['password'];

  //validation
  if($folder!='' && $name != '' && $email != '' && $mobile != '' && $course != '' && $password != ''){ 

  //run sql query
  $query = "UPDATE USERS SET Profile='$folder', Name='$name' , Email ='$email' , Mobile = '$mobile' , Course = '$course', Password= '$password' WHERE ID = '$id' ";

  $data = mysqli_query($connection, $query);
  if($data) {
      echo "<script> alert('Update Successfully');</script>";
      ?>
        <meta http-equiv="refresh" content="1; url= http://localhost/crudform/displayformdata.php"/>
      <?php
  } else {
      echo 'Update Failed '. mysqli_error($connection);
  }
}   else {
       echo "<script> alert('Plaese enter all Details');</script>";
}
}
?>