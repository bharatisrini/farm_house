<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();
$cu_id = $_REQUEST["custId"];
$stat = $_REQUEST["stat"];
$detox= $_REQUEST["life"];
$detoxTransId=$_REQUEST["TransId"];
$tempTransId=$_REQUEST["tmpId"];

//echo $detox;
if($stat=="All"){
	 $sql_dtx_tmp = "delete from farmhouse_delivery_schedule where customer_id='".$cu_id."' and product_type='".$detox."' and tmp_trans_id='$tempTransId' and trans_id='$detoxTransId'";
// echo  $sql_dtx_tmp;
$res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);

$tmp_oldaddr="";
$tmp_dates="";
$sql_orders = "select * from farmhouse_delivery_schedule where customer_id='$cu_id' and tmp_trans_id='$tempTransId' group by delivery_date"; 
//echo $sql_orders;
      $res_orders = mysqli_query($conn,$sql_orders); 
      while($row_orders= mysqli_fetch_array($res_orders)) {
	   $tmp_oldaddr=$tmp_oldaddr.",".$row_orders["delivery_address"];
	   $tmp_dates=$tmp_dates.",".$row_orders["delivery_date"];
	  }
	  if($tmp_oldaddr!=""){
	  $tmp_oldaddr=substr($tmp_oldaddr,1);
	  $tmp_dates=substr($tmp_dates,1);
	  $sql_order_delivery = "update farmhouse_temp_schedule_lifestyle  set delivery_address='$tmp_oldaddr', delivery_date='$tmp_dates' where customer_id='".$cu_id."' and detox_name='".$detox."' and trans_id='$tempTransId'";
echo $sql_order_delivery;
$res_order_delivery = mysqli_query($conn,$sql_order_delivery);

	  }

if($tmp_oldaddr==""){
$sql_order_deliverys = "delete from farmhouse_temp_schedule_lifestyle where customer_id='".$cu_id."' and detox_name='".$detox."' and trans_id='$tempTransId'";
echo $sql_order_deliverys;
$res_order_deliverys = mysqli_query($conn,$sql_order_deliverys);

}

					//echo $sql_order_delivery;					 
 					 //header("Location:card1.php");
					 }
					 echo "Delete File";
					 ?>
					  
			 