<?php
	error_reporting(0);
	include('database/db_connect.php');
	session_start();
$prd_name=$_REQUEST["prd_name"];
	$sql_prd = "select * from farmhouse_juice_details where name='$prd_name' and countrylang_id='1'";
				$res_prd = mysqli_query($conn,$sql_prd);
				$row_prd = mysqli_fetch_array($res_prd);
				$price = $row_prd['price'];
				$qty = $row_prd['quantity'];
				$weight = $row_prd['weight'];
				$ingredients = $row_prd['ingredients'];
				$benifits = $row_prd['benifits'];
				$nutritional_content = $row_prd['nutritional_content'];
				$data=$price."#".$qty."#".$weight."#".$ingredients."#".$benifits."#".$nutritional_content;
				echo $data;
?>
