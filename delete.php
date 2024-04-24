<?php
include('database.php');
$id = $_GET['id'];

$query = "DELETE FROM USERS WHERE ID = '$id' ";
$data = mysqli_query($connection, $query);

if($data) {
      echo  "<script> alert('Delete Successfully');</script>";
      ?>
      <meta http-equiv="refresh" content="1; url= http://localhost/crudform/displayformdata.php"/>
    <?php
}  else  {
     echo  "<script> alert('Failed');</script>";
}
?>