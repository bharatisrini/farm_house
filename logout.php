<?php
include('database/db_connect.php');
include('hm.php');
error_reporting(0); 
session_start();
$cid=$_SESSION["customer_id"];
//echo $cid;
$logged_out = date("Y/m/d h:i:sa");
$sql = "SELECT * from farmhouse_customer_login where customer_id = '$cid' && status='1'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0)
{
	$sql_update = "UPDATE farmhouse_customer_login SET logged_out_time ='$logged_out', status = '0'  where customer_id = '$cid'";
	mysqli_query($conn,$sql_update);
	session_destroy(); 
	?>
	<script>
	window.location.href = "index.php";
	</script>
    <?php
}
else
{
	session_destroy();
}
?>
