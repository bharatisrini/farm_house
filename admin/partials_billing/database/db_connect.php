<?php
//$connect = mysql_connect("pcinfinity1964.db.11552129.hostedresource.com","pcinfinity1964", "Pc#infinity@13")

/* $host_name = "farmhouse.db.11552129.hostedresource.com";
$username = "farmhouse";
$database = "farmhouse";
$password = "Fhj@123456";
*/

$host_name = "localhost";
$username = "root";
$database = "farmhouse";
$password = "";

$conn=mysqli_connect("$host_name","$username","$password", "$database");

// Check connection
if (!$conn)
 {
  die("Failed to connect to Database : " . mysqli_connect_error());
 }
 
// Change database to "test"
mysqli_select_db($conn,$database);

?>