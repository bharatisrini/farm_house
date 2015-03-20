<?php
$host_name = "localhost";
$username = "root";
$password = "";

$database = "farmhouse";

$conn=mysqli_connect("$host_name","$username","$password", "farmhouse");

// Check connection
if (!$conn)
 {
  die("Failed to connect to Database : " . mysqli_connect_error());
 }
 
// Change database to "test"
mysqli_select_db($conn,"farmhouse");
/* 
 if (!$conn->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $conn->error);
} else {
    printf("Current character set: %s\n", $conn->character_set_name());
} */

?>