<?php
define('DBHOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');
define('DBNAME', 'cr11_Toymurad_Almamedov_php_car_rental');
// Create connection
$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

// Check connection
if ( !$conn ) {
    die("Connection failed : " . mysqli_error());
   }
?>

