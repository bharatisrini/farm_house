<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();
$cu_id = $_REQUEST["custId"];
$stat = $_REQUEST["stat"];
$detox= $_REQUEST["life"];
echo $detox;
$Life_TransId=$_REQUEST["TransId"];
//echo $detox;
if($stat=="All"){
	 $sql_dtx_tmp = "delete from farmhouse_temp_schedule_lifestyle  where customer_id='".$cu_id."' and lifestyle_name='".$detox."' and trans_id = '$Life_TransId'";
  echo  $sql_dtx_tmp;
 $res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);

				 	$sql_order_delivery = "delete from farmhouse_delivery_schedule  where customer_id='$cu_id' and product_type='$detox' and tmp_life_id = '$Life_TransId' ";
					echo $sql_order_delivery;					 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);
					 //header("Location:card1.php");
					 }
					 echo "deleted File";
					 ?>
					  
			 