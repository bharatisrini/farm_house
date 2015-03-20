<?php
require_once("db_connect.php");

if($_REQUEST['msg']== "detox")
{
 $detox_price = $_REQUEST['price'];
 
 $sql_get_id = "select MAX(detox_id) as d_id from farmhouse_detox_program ";
				$result_get_id = mysqli_query($conn,$sql_get_id);
				$row_get_id = mysqli_fetch_array($result_get_id);
				$d_id = $row_get_id['d_id'];
 $sql = "update farmhouse_detox_program set detox_price = '$detox_price' where detox_id = '$d_id' ";
 $res_update = mysqli_query($conn,$sql);
 echo $detox_price; 

}

if($_REQUEST['msg']== "lifestyle")
{
 $lifestyle_price = $_REQUEST['price'];
 
 $sql_get_id = "select MAX(lifestyle_id) as d_id from farmhouse_lifestyle_program ";
				$result_get_id = mysqli_query($conn,$sql_get_id);
				$row_get_id = mysqli_fetch_array($result_get_id);
				$d_id = $row_get_id['d_id'];
 $sql = "update farmhouse_lifestyle_program set lifestyle_price = '$lifestyle_price' where lifestyle_id = '$d_id' ";
 $res_update = mysqli_query($conn,$sql);
 echo $lifestyle_price; 

}

?>

