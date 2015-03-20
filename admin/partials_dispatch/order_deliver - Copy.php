<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cu_id = $_SESSION['customer_id'];
?>
<?php

	$tr_id = $_GET['tr_id'];
    $cor_id = $_GET['value'];
	$o_id = $_GET['o_id'];
	$sql_dispatch = "update farmhouse_delivery_schedule set delivery_status=1,carrier_id = '$cor_id' where trans_id ='$tr_id' " ;
	$res_dispatch = mysqli_query($conn,$sql_dispatch);
	
	
	$sql_ono = "update farmhouse_order set status=1 where order_id ='$o_id' " ;
	$res_ono = mysqli_query($conn,$sql_ono);
	if($res_dispatch)
	echo "updated";
	

?>

