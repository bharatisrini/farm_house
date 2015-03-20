<?php 
require('database/db_connect.php'); 
error_reporting(0);
session_start();

//echo "Add";
$cu_id = $_SESSION['customer_id'];
$pstat = $_REQUEST["pstat"];
$no_ppl = $_REQUEST["snopp"];
$order_id = $_REQUEST["orderid"];
$tmpid=$_REQUEST["tmpid"];
$count=count($_REQUEST["sdrvid"]);
//echo $count;
$k=1;
$sdvrid="";

for($i=0;$i<$count;$i++){
$sdvrid=$_REQUEST["sdrvid"][$i];
$saddress=$_REQUEST["saddr"][$i];
//echo $sdvrid." ".$saddress;
$sql_dtx_tmp = "update farmhouse_delivery_schedule set delivery_address='".$saddress."'  where customer_id='".$cu_id."' and order_id='$order_id' and trans_id='".$sdvrid."'";
$res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);
  //echo  $sql_dtx_tmp;
}


	
if($pstat=='Detox'){
$sql_lifestyle="SELECT * FROM farmhouse_delivery_schedule where customer_id = '$cu_id' and order_id='$order_id' and no_people='$no_ppl' and program_type='$pstat' and tmp_trans_id='$tmpid'";
}else{
$sql_lifestyle="SELECT * FROM farmhouse_delivery_schedule where customer_id = '$cu_id' and order_id='$order_id' and no_people='$no_ppl' and program_type='$pstat' and tmp_life_id='$tmpid'";
}


$delv_addr="";
				      $res_lifestyle = mysqli_query($conn,$sql_lifestyle); 
				      while($row_lifestyle=mysqli_fetch_assoc($res_lifestyle)){
						 $delivery_address = $row_lifestyle['delivery_address'];
						 $delv_addr=$delv_addr.",".$delivery_address;
						 }
						 $delv_addr=substr($delv_addr,1);
//$sql_order_delivery = "update farmhouse_order set delivery_address='".$delv_addr."'  where customer_id='".$cu_id."' and order_id='$order_id'";
//$res_order_delivery = mysqli_query($conn,$sql_order_delivery);
						
echo "Update Address";							  
						  
						  
?>