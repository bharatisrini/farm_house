<?php 
include('database/db_connect.php'); 
error_reporting(0);
//session_start();
//$cid = $_SESSION["customer_id"];
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='.../webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='.../webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='.../webstyle/fonts.css' rel='stylesheet' type='text/css'>
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
    
    
	<script type="text/javascript" src=".../js/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href=".../slick/slick.css"/>
	<script type="text/javascript" src=".../slick/slick.min.js"></script>

    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src=".../js/jquery.sumoselect.min.js"></script>
    
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src=".../js/icheck.js"></script>
	
	
	
	 
	 
	 
</head>

<body class="shopping-card">

<?php include("includes/header.php"); ?>
  
  <?php
$order_id=$_GET["q"];
?>

<section class="wrapper group" >
	<div class="wrapper group" >
    	<h2>DISPATCH ORDERS</h2>
	</section>
  <section class="subscription-box gray group">
 
	<div class="wrapper group">
    	  <div class="manage"><span class="group">Order Id</span></div>
		  <div class="manage"><span class="group">Customer Name</span></div>
		  
        <div class="manage"><span class="group">Product Type</span></div>
        
        <div class="manage">
        	<span class="group">Delivery Address</span>
        <!--    <span class="last group">¥RMB</span> -->
        </div>
        <div class="manage">
        	<span class="group"width="100">Delivery Date</span>
        <!--    <span class="last group">¥RMB</span> -->
        </div>
		<div class="manage">
        	<span class="group" width="100">Cariers</span>
        	<!--<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>-->
        </div>
    </div>
</section>
 <section class="subscription-box gray group">
		 <?php 
		 
					$sql_ct = "select * from farmhouse_delivery_schedule where order_id = '$order_id' and delivery_status='0'";  
					$res_ct = mysqli_query($conn,$sql_ct);
					while($row_ct = mysqli_fetch_array($res_ct)) {
					
					?>
	 

	<div class="wrapper group">
    	<div class="manage"><span class="group">&nbsp; &nbsp;<?php echo $row_ct['order_id'];?></span> </div>
		<div class="manage"><span class="group">&nbsp; &nbsp;<?php  $cust_id = $row_ct['customer_id'];
		$sql = "select * from farmhouse_customer where customer_id = $cust_id";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo $row['firstname']; echo " "; echo $row['lastname'];
		?>&nbsp; &nbsp;</span></div>
        <div class="manage"><span class="group">&nbsp; &nbsp;<?php echo $row_ct['product_type'];?></span></div>
		<div class="manage"><span class="group">&nbsp; &nbsp;<?php  $address_id = $row_ct['address_id'];
		$aid = $row_ct['address_id'];
	
		
		$sql_add = "select * from  farmhouse_customer_address where customer_id = '$cust_id' and address_id = '$aid'";
		$result = mysqli_query($conn,$sql_add);
		$row = mysqli_fetch_array($result);
		echo "Address : "; echo $row['address']; echo "<br>"; echo "City : "; echo $row['address_city']; echo "<br>"; echo "District : ";  echo $row['address_district']; 
		?></span></div>
		<div class="manage"><span class="group" id="dat">&nbsp; &nbsp;<?php echo $row_ct['delivery_date'];?> &nbsp; &nbsp;</span></div>
        <div class="manage"><span class="group">
		<select name="carrier" id="carrier">
		<option>Select Carrier</option>
		<?php
		 $sql = "select * from farmhouse_carrier_details";
						$result = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($result)) {
							 
							?>
							
		<option value="<?php echo $row['carrier_id']; ?>">&nbsp; &nbsp;<?php echo $row['carrier_name']; ?></option>
		
		<?php } ?>
		</select>&nbsp; &nbsp; 
		</span></div>




     <div class="manage"><span class="group"></span></div>
        <div class="manage">
		 
        <!-- <span class="group"><a href = "#" onClick="function_delivered(<?php //echo $row_ct['trans_id']; ?>)"  class="reschedule">Delivered</a></span> -->
        	<!--<button onclick="myFunction()">Delivered</button>--><input type="button" onClick="myFunction(<?php echo $row_ct['trans_id'];?>,document.getElementById('carrier').value,<?php echo $order_id;?>)" value="Delivered"/>
			
			
        </div>
    </div>
	
	<?php } ?>
	
</section>
					
          


<?php include("includes/footer.php"); ?>

<script type="text/javascript" src=".../js/classie.js"></script>
<script type="text/javascript" src=".../js/modernizr.js"></script>
<script type="text/javascript" src=".../js/custom.js"></script>

</body>
</html>