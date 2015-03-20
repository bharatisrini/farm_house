<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();
$cu_id = $_REQUEST["custId"];
$stat = $_REQUEST["stat"];
$detox= $_REQUEST["detox"];
$detoxTransId=$_REQUEST["TransId"];
//echo $detox;
if($stat=="All"){
	 $sql_dtx_tmp = "delete from farmhouse_temp_schedule_detox  where customer_id='".$cu_id."' and detox_name='".$detox."'";
  //echo  $sql_dtx_tmp;
 $res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);

				 	$sql_order_delivery = "delete from farmhouse_delivery_schedule  where customer_id='$cu_id' and product_type='$detox'";
					//echo $sql_order_delivery;					 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);
					 //header("Location:card1.php");
					 }
					 echo "deleted File";
					 ?>
					  
			 