<?php
	error_reporting(0);
	include('database/db_connect.php');
	session_start();
$prd_name=$_REQUEST["prd_name"];
	$sql_prd = "select * from farmhouse_lifestyle_program where lifestyle_name='$prd_name' and countrylang_id='1'";
				$res_prd = mysqli_query($conn,$sql_prd);
				$row_prd = mysqli_fetch_array($res_prd);
				$price = $row_prd['lifestyle_price'];
				$detox_items = $row_prd['lifestyle_items'];
				$title = $row_prd['title_1'];
				$discription = $row_prd['discription_1'];
				$data=$price."#".$detox_items."#".$title."#".$discription;
				echo $data;
?>
