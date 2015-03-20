<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();

//echo "Add";
$cu_id = $_REQUEST["custId"];
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
	 $sql_dtx_tmp = "update farmhouse_temp_schedule_lifestyle set delivery_dates='".$sdates."', delivery_address='".$saddr."'  where customer_id='".$cu_id."' and trans_id='".$detoxTransId."'";
  //echo  $sql_dtx_tmp;
$res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);
 //$last_row = mysqli_insert_id($conn);
  //echo  $res_dtx_tmp;
 if(!$res_dtx_tmp){
    die("".mysqli_error($conn));
	}

$sql_lifestyle="SELECT * FROM farmhouse_temp_schedule_lifestyle where customer_id = '$cu_id' and trans_id='".$detoxTransId."' ";
//echo $sql_lifestyle;
				      $res_lifestyle = mysqli_query($conn,$sql_lifestyle); 
				      while($row_lifestyle=mysqli_fetch_assoc($res_lifestyle)){
						 $product_id = $row_lifestyle['lifestyle_id'];
						 $product_name= $row_lifestyle['lifestyle_name'];
						 $product_price= $row_lifestyle['lifestyle_price'];
						 $qty= $row_lifestyle['no_people'] * $row_lifestyle['no_days_beauty'];
						 $no_people= $row_lifestyle['no_people'];
						 $no_days= $row_lifestyle['no_days_beauty'];
						 
						 $ip= $row_lifestyle['ip']; 
						 $lifestyle_total= $row_lifestyle['lifestyle_total'];
						 $product_total= $row_lifestyle['lifestyle_total'];
						 $product_type =$row_lifestyle['lifestyle_name'];
						 $order_id_lifestyle = $order_id;
						 $delivery_dates = $row_lifestyle['delivery_dates'];
						 $delivery_address = $row_lifestyle['delivery_address'];
						 $payment_type = $row_lifestyle['payment_type'];
						 $payment_method = $row_lifestyle['payment_method'];
						 $card_name = $row_lifestyle['card_name'];					
						 	 $delivery_addr = explode(",", $delivery_address);
							  $no_addr = count($delivery_addr);
							  $delivery_sdate = explode(",",$delivery_dates);
					for($j=1; $j<=$no_people; $j++){
					  for($i = 0; $i<$no_addr; $i++) {
					//	  echo $j;
					//$delivery_addrs=$delivery_addr[$i];
					//$delivery_sdate=$delivery_sdate[$i]
$sql_order_delivery = "insert into farmhouse_delivery_schedule (order_id, customer_id, product_type, delivery_date, delivery_address,no_people,no_detox,tmp_life_id, program_name, program_type,ip) values('$order_id', '$cu_id','$product_type','$delivery_sdate[$i]','$delivery_addr[$i]','$j','1','$detoxTransId','$shift','LifeStyle', '$ip')";
							//		echo $sql_order_delivery; 	 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);		
						
					}		  
						  }
						  
						  $sql_order_update = "update farmhouse_temp_schedule_lifestyle set program_name='$shift' where trans_id='$detoxTransId'";
				//echo $sql_order_update;						 
					 $res_order_update = mysqli_query($conn,$sql_order_update);	  
	 }	
	 echo "Update Data";

?>