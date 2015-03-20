<?php 
include('database/db_connect.php');
  if($_GET['msg'] == "em" ) {
  $email = $_GET['email'];
  $sql_chk = "SELECT * from farmhouse_customer where email = '$email'";
  $res_chk = mysqli_query($conn,$sql_chk);
  if(mysqli_num_rows($res_chk) > 0)
  echo "Email is already existed";
  else
  echo "";
  
  } // mar

?>
