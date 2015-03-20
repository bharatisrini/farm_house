<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();

$cu_id = $_REQUEST["custId"];
$dtx_id = $_REQUEST["detoxId"];
$no_ppl = $_REQUEST["noPeople"];
$no_dtx = $_REQUEST["noDetox"];
$delivery_date=$_REQUEST["DeliveryDate"];
$detoxTransId=$_REQUEST["TransId"];
$CustAddressId=$_REQUEST["AddressId"];

if($no_dtx<=3){
//echo("custId=".$cu_id."&detoxId=".$dtx_id."&noPeople=".$no_ppl."&noDetox=".$no_dtx."&DeliveryDate=".$delivery_date);
	 $sql_dtx_tmp = "update farmhouse_temp_schedule_detox set delivery_dates='".$delivery_date."' where customer_id='".$cu_id."' and trans_id='".$detoxTransId."'";
  //echo  $sql_dtx_tmp;
 $res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);// or die("".mysqli_error($conn));
 //$last_row = mysqli_insert_id($conn);
  //echo  $res_dtx_tmp;

	$sql_detox="SELECT * FROM farmhouse_temp_schedule_detox where customer_id = '$cu_id' and trans_id='".$detoxTransId."' ";
				      $res_detox = mysqli_query($conn,$sql_detox); 
				      while($row_detox=mysqli_fetch_assoc($res_detox)){
						 $product_id = $row_detox['detox_id'];
						 $product_name= $row_detox['detox_name'];
						 $product_price= $row_detox['detox_price'];
						 $qty= $row_detox['no_people'] * $row_detox['no_days_detox'];
						 $no_people= $row_detox['no_people'];
						 $no_days= $row_detox['no_days_detox'];
						 $hydrator_id= $row_detox['detox_hydrator_id'];
						 $hydrator_price= $row_detox['detox_hydrator_price'];
						 
						 $detox_total= $row_detox['detox_total'];
						 $product_total= $row_detox['detox_total'];
						$product_type = $row_detox['detox_name'];
						 $order_id_detox = $order_id;
						 $delivery_dates = $row_detox['delivery_dates'];
						 $delivery_address = $row_detox['delivery_address'];
						 $delivery_address_id = $row_detox['address_id'];
						 $payment_type = $row_detox['payment_type'];
						 $payment_method = $row_detox['payment_method'];
						 $card_name = $row_detox['card_name'];
						 $ip =$row_detox['ip'];
						 	$sql_order_delivery = "insert into farmhouse_delivery_schedule (order_id, customer_id, product_type, delivery_date, delivery_address,no_people,no_detox,tmp_trans_id,ip,program_type) values 
					('0', '$cu_id','$product_type','$delivery_dates','$CustAddressId','$no_people','$no_days','$detoxTransId','$ip','Detox')";
	//echo $sql_order_delivery;									 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);// or die("".mysqli_error($conn));
	
					
	
	}
}

?>