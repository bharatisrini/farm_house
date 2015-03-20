<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();
$cu_id = $_REQUEST["custId"];
$stat = $_REQUEST["stat"];
$detox= $_REQUEST["detox"];
$detoxTransId=$_REQUEST["TransId"];
$tempTransId=$_REQUEST["tmpId"];
$chgaddr=$_REQUEST["chgaddr"];
//echo $detox;
if($stat=="All"){
	 $sql_dtx_tmp = "update farmhouse_delivery_schedule set delivery_address='$chgaddr' where customer_id='".$cu_id."' and product_type='".$detox."' and tmp_trans_id='$tempTransId' and trans_id='$detoxTransId'";
 //echo  $sql_dtx_tmp;
$res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);

$tmp_oldaddr="";
$sql_orders = "select * from farmhouse_delivery_schedule where customer_id='$cu_id' and tmp_trans_id='$tempTransId' group by delivery_date"; 
//echo $sql_orders;
      $res_orders = mysqli_query($conn,$sql_orders); 
      while($row_orders= mysqli_fetch_array($res_orders)) {
	   $tmp_oldaddr=$tmp_oldaddr.",".$row_orders["delivery_address"];
	  }
	  if($tmp_oldaddr!=""){
	  $tmp_oldaddr=substr($tmp_oldaddr,1);
	  }
$sql_order_delivery = "update farmhouse_temp_schedule_detox  set delivery_address='$tmp_oldaddr', address_id='$tmp_oldaddr' where customer_id='".$cu_id."' and detox_name='".$detox."' and trans_id='$tempTransId'";
//echo $sql_order_delivery;

					//echo $sql_order_delivery;					 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);
					 //header("Location:card1.php");
					 }
					 echo "Updated File";
					 ?>
					  
			 