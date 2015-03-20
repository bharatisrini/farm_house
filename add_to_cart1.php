<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION['customer_id'];
?>
<?php

   $sql_del_juice = "delete from farmhouse_temp_cart_fh where customer_id= '$cid' ";
   $res_del_juice = mysqli_query($conn,$sql_del_juice);

  $sql_del_detox = "delete from farmhouse_temp_schedule_detox where customer_id= '$cid' ";
   $res_del_detox = mysqli_query($conn,$sql_del_detox);

 $sql_del_delivery_schedule = "delete from farmhouse_delivery_schedule where customer_id= '$cid' ";
   $res_del_delivery_schedule = mysqli_query($conn,$sql_del_delivery_schedule);  
    
	
	
	
   $sql_del_ls = "delete from farmhouse_temp_schedule_lifestyle where customer_id= '$cid' ";
   $res_del_ls = mysqli_query($conn,$sql_del_ls);
   if($sql_del_juice || $sql_del_detox || $sql_del_ls)
	   
   

   header("Location:card1.php");
	
   
   
?>

