<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);

$cid = $_SESSION["customer_id"];

 $lifestyle_name =$_POST['detox_name'];
 
 $lifestyle_id = $_POST['dtx_id']; 
 $no_lifestyle = $_POST['no_dtx'];
 $no_ppl = $_POST['no_ppl']; 
// $check = $_POST['iCheck1'];
 $hyd_id = $_POST['hyd_id']; 
 $hyd_price = $_POST['hyd_price']; 
 $ip = $_SERVER['REMOTE_ADDR'];
$lifestyle_package_price = $_POST['amnt'];
 echo"Y".$lifestyle_package_price ;
 $lifestyle_total = $no_lifestyle * $no_ppl;
 echo  $lifestyle_total;
 $lifestyle_total_price = $lifestyle_package_price * $lifestyle_total;
 


for ($p =1; $p<=$no_ppl; $p++){
     if ($p == 1){
		 $lifestyle_person_no = 1;
		 
	 } 
	 else if ($p == 2){
		 $lifestyle_person_no = 2;
		
	 }
	 else if ($p == 3){
		$lifestyle_person_no = 3;
		
	}
	 else if ($p == 4){
		$lifestyle_person_no = 4;
		 
	}
} // ends for

$address = 1;
$sql_getCustAddress = "select * from farmhouse_customer_address where customer_id = '$cid' order by address_id Asc ";
//echo $sql_getCustAddress;
 $res_getCustAddress = mysqli_query($conn,$sql_getCustAddress);
 $row_getCustAddress = mysqli_fetch_array($res_getCustAddress);
  $custAddressId = $row_getCustAddress['address_id'];
  //echo $custAddressId;
  
	 $sql_lifestyle_tmp = "insert into farmhouse_temp_schedule_lifestyle 
(customer_id,lifestyle_id,lifestyle_name,lifestyle_price,no_people,no_days_beauty,lifestyle_total,lifestyle_person_no,delivery_address) 
 values ('$cid','$lifestyle_id','$lifestyle_name','$lifestyle_package_price','$no_ppl','$no_lifestyle','$lifestyle_total_price','$lifestyle_person_no','$custAddressId')";
echo $sql_lifestyle_tmp;
$res_trans=mysqli_query($conn,$sql_lifestyle_tmp);
  $last_trans_id = mysqli_insert_id($conn);
 //echo $last_trans_id;
   if($res_trans)
   
			{
				  ?>
				 <script>
			window.location = "ls_schedule1.php?id=<?=$lifestyle_id ?>&ppl=<?php echo $no_ppl;?>&ls=<?php echo $no_lifestyle;?>&tid=<?=$last_trans_id?>";	 </script>
				 <?php
			}
			else
			{
				echo "Error:<br>"; exit;
			}
