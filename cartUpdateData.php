<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);

$cid = $_SESSION["customer_id"];
 $hyd_price = $_POST['hyd_price']; 
 $detox_package_price = $_POST['amnt'];
 $ip = $_SERVER['REMOTE_ADDR'];

   $sql_dtx_tmp = "update farmhouse_temp_cart_fh set customer_id='$cid'  where ip='$ip' and customer_id=''";
 $res_trans=mysqli_query($conn,$sql_dtx_tmp);
echo "Update";