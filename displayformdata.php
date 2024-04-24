<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    
</body>
</html>


<?php
include('database.php');

$query = "SELECT * FROM USERS";
$data =  mysqli_query($connection , $query);
$total = mysqli_num_rows($data);

if($total !=0) {
          ?>
      <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Profile</th>
                    <th>Name</th>                   
                    <th>E-Mail</th>
                    <th>Mobile</th>
                    <th>Course</th>
                    <th>Password</th>
                    <th>Action</th>
                    <th></th>
                </tr>
            </thead>
       
   
          <?php
        while($result  = mysqli_fetch_assoc($data)){
             echo  "
                <tbody>
                <td> <img src='".$result['Profile']."' height='100px' width='100px' /></td>
                <td>".$result['Name']."</td>
                <td>".$result['Email']."</td>
                <td>".$result['Mobile']."</td>
                <td>".$result['Course']."</td>
                <td>".$result['Password']."</td>
                <td> <a href='update.php?id=$result[ID]'><input type='submit' value='Edit' /></a> </td>
                <td>  <a href='delete.php?id=$result[ID]' > <input type='submit' value='Delete' />  </a>  </td>
                </tbody>
              ";
        }
}   else {
      echo 'No Record are Found';
}
?>
 </table>
 </div>

 <div class="signup_link">
         <a style="color: black;" href="registerform.php">Register</a>
          </div>
  