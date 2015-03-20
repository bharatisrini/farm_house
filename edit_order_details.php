<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"]; ?>


<!DOCTYPE html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='webstyle/style.css' rel='stylesheet' type='text/css'>
     <link href='webstyle/fonts.css' rel='stylesheet' type='text/css'>
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
    <script src="js/jquery-ui.js"></script>

   <script>
	$(function() {
     $("#order").change(function(){
	 var order_id = $("#order").val();	
 // alert(order_id);
	 $("#order_table").load("edit_order_table.php?order="+order_id);
	});
	});
	</script>
  <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>
    
     <script src="js/jquery.sumoselect.min.js"></script>
    
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
	</head>

<body>
<?php  include("includes/header.php"); ?>
	 <section class="content fixed-top">
	
	<div class="wrapper">
    	<aside class="pick-plan group">Your Order Details </aside>
<?php

	$sql_order="select order_id, order_name FROM farmhouse_order where customer_id = '$cid' order by trans_id desc limit 1";
				      $res_order = mysqli_query($conn,$sql_order); 
					  $row_order = mysqli_fetch_assoc($res_order);
 $oid =   $row_order['order_id'];
 
?>
    <div class="pick-plan group">
        	<p>Name :<?=$row_order['order_name']?></p>
            <p>Choose order_id:

  
 
<select id="order"><option>Select Order</option>
<?php $sql_orders = "select distinct order_id from farmhouse_order where customer_id = '$cid'"; 
      $res_orders = mysqli_query($conn,$sql_orders); 
      while($row_orders= mysqli_fetch_array($res_orders)) {?><option value='<?=$row_orders['order_id']?>'><?php echo $row_orders['order_id']; ?></option> <?php } ?>
	  </select></p>
<hr/>	  
<div id="order_table" align="center"> </div>
</div>
</div>
</section>


</form>
<?php include("includes/footer.php"); ?>


<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>