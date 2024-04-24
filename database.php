<?php
// Database connection details
$servername = "localhost";
$username = "root";     
$password = "";     
$dbname = "userlogin";

// Create connection
$connection = mysqli_connect($servername , $username , $password , $dbname);

// Check connection
if ($connection) {
        //  echo  'database connect successfully';
} else {
    echo 'database Failed to Connect'.mysqli_connect_error();
}

?>