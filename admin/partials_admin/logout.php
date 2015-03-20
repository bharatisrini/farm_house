<?php
session_start();
$id = $_SESSION["id"];
$ip = $_SESSION["ip"];

include('database/db_connect.php');
include('header.php'); 
$logged_out = date("Y/m/d h:i:sa");
$sql = "SELECT * from farmhouse_admin_login where admin_id = '$id' && status='1'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$sql_update = "UPDATE farmhouse_admin_login SET logged_out_time ='$logged_out', status = '0'  where admin_id = '$id'";
	mysqli_query($conn,$sql_update);
	session_destroy(); 
      ?>
	<script>
	window.location ="../login.php";
	</script>
	<?php    
}
else
{
 
	session_destroy();
}
?>
