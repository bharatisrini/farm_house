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
//echo("custId=".$cu_id."&detoxId=".$dtx_id."&noPeople=".$no_ppl."&noDetox=".$no_dtx."&DeliveryDate=".$delivery_date."  	".$detoxTransId);
	 $sql_dtx_tmp = "update farmhouse_temp_schedule_lifestyle set delivery_dates='".$delivery_date."' where customer_id='".$cu_id."' and trans_id='".$detoxTransId."'";
  //echo  $sql_dtx_tmp;
 $res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);
 //$last_row = mysqli_insert_id($conn);
  //echo  $res_dtx_tmp;
 if(!$res_dtx_tmp){
    die("".mysqli_error($conn));
	}
	
		$sql_lifestyle="SELECT * FROM farmhouse_temp_schedule_lifestyle where customer_id = '$cu_id' and trans_id='".$detoxTransId."' ";
				      $res_lifestyle = mysqli_query($conn,$sql_lifestyle); 
				      while($row_lifestyle=mysqli_fetch_assoc($res_lifestyle)){
						 $product_id = $row_lifestyle['lifestyle_id'];
						 $product_name= $row_lifestyle['lifestyle_name'];
						 $product_price= $row_lifestyle['lifestyle_price'];
						 $qty= $row_lifestyle['no_people'] * $row_lifestyle['no_days_beauty'];
						 $no_people= $row_lifestyle['no_of_peoples'];
						 $no_days= $row_lifestyle['no_days_beauty'];
						 
						 
						 $lifestyle_total= $row_lifestyle['lifestyle_total'];
						 $product_total= $row_lifestyle['lifestyle_total'];
						 $product_type =$row_lifestyle['lifestyle_name'];
						 $order_id_lifestyle = $order_id;
						 $delivery_dates = $row_lifestyle['delivery_dates'];
						 $delivery_address = $row_lifestyle['delivery_address'];
						 $payment_type = $row_lifestyle['payment_type'];
						 $payment_method = $row_lifestyle['payment_method'];
						 $card_name = $row_lifestyle['card_name'];	
						 $ip = $row_lifestyle['ip'];				
						 			
					 	$sql_order_delivery = "insert into farmhouse_delivery_schedule (order_id, customer_id, product_type, delivery_date,delivery_address,no_people,no_detox,tmp_life_id,ip,program_type) values('$order_id','$cu_id','$product_type','$delivery_dates','$delivery_address','$no_people','$no_days','$detoxTransId','$ip','LifeStyle')";
									//	 echo $sql_order_delivery;
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);
					 	//}		

	//		$sql_detox_delete="delete  FROM farmhouse_temp_schedule_detox where customer_id = '$cu_id'";
		//	$res_detox = mysqli_query($conn,$sql_detox_delete); 

					
  if($sql_order_delivery){
					  
	//	header("Location:order_confirmation.php");
  }else{
   die("error in update detox".mysqli_error($conn));			
	}	
	}
}
	
?>