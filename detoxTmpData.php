<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);

$cid = $_SESSION["customer_id"];

 $detox_name =$_POST['detox_name'];
 $dx_id = $_POST['dtx_id']; 
 $no_dtx = $_POST['no_dtx'];
 $no_ppl = $_POST['no_ppl']; 
// $check = $_POST['iCheck1'];
 $hyd_id = $_POST['hyd_id']; 
 $hyd_price = $_POST['hyd_price']; 
 $detox_package_price = $_POST['amnt'];
 $ip = $_SERVER['REMOTE_ADDR'];
 $detox_total = $no_dtx * $no_ppl;
 $detox_total_price = $detox_package_price * $detox_total;
 if($hyd_price)
 $order_price = $detox_total_price + $hyd_price;
 else
 $order_price = $detox_total_price;

for ($p =1; $p<=$no_ppl; $p++){
     if ($p == 1){
		 $detox_person_no = 1;
		 
	 } 
	 else if ($p == 2){
		 $detox_person_no = 2;
		
	 }
	 else if ($p == 3){
		$detox_person_no = 3;
		
	}
	 else if ($p == 4){
		$detox_person_no = 4;
		 
	}
}

$address = 1;
$sql_getCustAddress = "select * from farmhouse_customer_address where customer_id = '$cid' order by address_id Asc ";
//echo $sql_getCustAddress;
 $res_getCustAddress = mysqli_query($conn,$sql_getCustAddress);
 $row_getCustAddress = mysqli_fetch_array($res_getCustAddress);
  $custAddressId = $row_getCustAddress['address_id'];
  //echo $custAddressId;
  
	 $sql_dtx_tmp = "insert into farmhouse_temp_schedule_detox 
(customer_id,detox_id,detox_name,detox_price,no_people,no_days_detox,detox_total, detox_person_no,detox_hydrator_id,detox_hydrator_price,ordered_date,ip,delivery_address,address_id) 
 values ('$cid','$dx_id','$detox_name','$detox_package_price','$no_ppl','$no_dtx','$order_price','$detox_person_no','$hyd_id','$hyd_price',NOW(),'$ip','$address','$custAddressId')";
 $res_trans=mysqli_query($conn,$sql_dtx_tmp);
 $last_trans_id = mysqli_insert_id($conn);
 //echo $last_trans_id;
   if($res_trans)
   
			{
				  ?>
				 <script>
			window.location = "detox_schedule1.php?id=<?php echo $dx_id; ?>&ppl=<?php echo $no_ppl;?>&dtx=<?php echo $no_dtx;?>&transId=<?=$last_trans_id?>";
				 </script>
				 <?php
			}
			else
			{
				echo "Error:<br>"; exit;
			}
