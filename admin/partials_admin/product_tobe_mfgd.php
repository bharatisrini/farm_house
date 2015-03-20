<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"]; ?>


<?php 

function getadd($ad_nam) {
  
	$host_name = "localhost";
	$username = "root";
	$database = "farmhouse";
	$password = "";
	
	$conn = mysqli_connect("$host_name","$username","$password", "farmhouse");
	mysqli_select_db($conn,"farmhouse"); 
  
  $ad_id = $ad_nam;
  $sql_add = "select * from farmhouse_customer_address where address_id = '$ad_id' ";
  $res_add = mysqli_query($conn,$sql_add);
  $row_add = mysqli_fetch_assoc($res_add);
  return $row_add['address']."-".$row_add['address_district']."-".$row_add['address_city'];
}

function getname($ad_nam) {
  
	$host_name = "localhost";
	$username = "root";
	$database = "farmhouse";
	$password = "";
	
	$conn = mysqli_connect("$host_name","$username","$password", "farmhouse");
	mysqli_select_db($conn,"farmhouse"); 
  
  $ad_name = $ad_nam;
  $sql_add = "select firstname from farmhouse_customer where customer_id = '$ad_name' ";
  $res_add = mysqli_query($conn,$sql_add);
  $row_add = mysqli_fetch_assoc($res_add);
  return $row_add['firstname'];
}

?>


<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <!--<link href='webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/fonts.css' rel='stylesheet' type='text/css'>-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie8-fixs.css" />
    <![endif]-->
    <!--[if gt IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie-fixs.css" />
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <script type="text/javascript" src="slick/slick.min.js"></script>
	<script>
	$(document).ready(function() {
     $("#order").change(function(){
	 var order_id = $("#order").val();	
	 $("#order_table").load("get_order_table.php?order="+order_id);
	});
	});
	</script>
	
	
	
	</head>

<body>
<a href="index.php" target = "order_details" class="pay-now"><img src="images/icon-back.png"></a>Go Home

<?php // include("includes/header.php"); ?>

<div style="padding:100px;">
<?php

echo "<h1> Your Product Manufactured Details </h1>";

	$sql_pid="select distinct product_id from farmhouse_order where delivery_dates = '2015-03-12'";
				      $res_pid = mysqli_query($conn,$sql_pid); 
					  while($row_pid = mysqli_fetch_array($res_pid)){
						  $pid = $row_pid['product_id'];
						  echo "<h2> Product Id : " . $row_order['product_id'] . "<br>";
					  }
  
 
 
?>
<?php // include("includes/footer.php"); ?>
 
 <script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
</div>
 </body>
 </html>