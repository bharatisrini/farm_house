<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();

echo "Add";
$cu_id = $_REQUEST["custId"];
if($cu_id==""){
$cu_id=0;
}
$dtx_id = $_REQUEST["detoxId"];
$no_ppl = $_REQUEST["noPeople"];
$no_dtx = $_REQUEST["noDetox"];
$detoxTransId=$_REQUEST["TransId"];
$shift=$_REQUEST["shift"];
//echo $cu_id;
$count=count($_REQUEST["sdate"]);
//echo $count;
$k=1;
$sdates="";

for($i=0;$i<$count;$i++){
$sdate=$_REQUEST["sdate"][$i];
$saddress=$_REQUEST["saddr"][$i];
$sdates=$sdates.",".$sdate;
$saddr=$saddr.",".$saddress;
}
$sdates=substr($sdates,1);
$saddr=substr($saddr,1);
	 $sql_dtx_tmp = "update farmhouse_temp_schedule_detox set delivery_dates='".$sdates."', address_id='".$saddr."'  where customer_id='".$cu_id."' and trans_id='".$detoxTransId."'";
  //echo  $sql_dtx_tmp;
$res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp) or die("".mysqli_error($conn));
 //$last_row = mysqli_insert_id($conn);
  //echo  $res_dtx_tmp;
 //if(!$res_dtx_tmp){
  //  die("".mysqli_error($conn));
//	}

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
						 $ip= $row_detox['ip'];
						 $detox_total= $row_detox['detox_total'];
						 $product_total= $row_detox['detox_total'];
						 $product_type = $row_detox['detox_name'];
						 $order_id_detox = $order_id;
						 $delivery_dates = $row_detox['delivery_dates'];
						 $delivery_address = $row_detox['address_id'];
						 $payment_type = $row_detox['payment_type'];
						 $payment_method = $row_detox['payment_method'];
						 $card_name = $row_detox['card_name'];
							 $delivery_addr = explode(",",$delivery_address);
							  $no_addr = count($delivery_addr);
							  $delivery_sdate = explode(",", $delivery_dates);
					for($j=1; $j<=$no_people; $j++){
					  for($i = 0; $i<$no_addr; $i++) {
					//	  echo $j;
					//$delivery_addrs=$delivery_addr[$i];
					//$delivery_sdate=$delivery_sdate[$i]
$sql_order_delivery = "insert into farmhouse_delivery_schedule (order_id, customer_id, product_type, delivery_date, delivery_address,no_people,no_detox,tmp_trans_id, program_name, program_type,ip) values('$order_id', '$cu_id','$product_type','$delivery_sdate[$i]','$delivery_addr[$i]','$j','1','$detoxTransId','$shift','Detox','$ip')";
				//echo $sql_order_delivery;						 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery) or die("".mysqli_error($conn));	
					 
	
		 
						
					}		
				
						  }
						  	$sql_order_update = "update farmhouse_temp_schedule_detox set program_name='$shift' where trans_id='$detoxTransId'";
				echo $sql_order_update;						 
					 $res_order_update = mysqli_query($conn,$sql_order_update) or die("".mysqli_error($conn));	  

					/*$sql_order_insert_detox = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name, 
					product_price, quantity_ordered, ordered_num_of_people, ordered_day_beauty, product_total, delivery_dates, 
					delivery_address, customer_id, payment_type, payment_method, card_name,tmp_trans_id) values 
					('$order_id', '$customer_name','$product_id','$product_type','$product_name',
					 '$product_price','$qty', '$no_people','$no_days','$product_total','$delivery_dates',
					 '$delivery_address','$cu_id', '$payment_type', '$payment_method','$card_name','$')";
					 //echo $sql_order_insert_detox;
					 $res_order_insert_detox = mysqli_query($conn,$sql_order_insert_detox);		*/ 
					 }	

?>