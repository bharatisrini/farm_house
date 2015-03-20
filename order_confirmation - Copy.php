<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"];
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/reset.css' rel='stylesheet' type='text/css'>
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
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>

    <link href="skins/flat/blue.css" rel="stylesheet">
	<script src="js/icheck.js"></script>

</head>
<body class="payment">

<?php include("includes/header.php"); ?>

<section class="process fixed-top group">
	<div class="wrapper group">
    	<section class="back-button group">
            <div class="wrapper group">
                <a href="card2.php">BACK</a>
            </div>
        </section>
<div class="wrapper group">
<?php
echo "<h2> Your Order Confirmation Details </h2>";

	$sql_order="SELECT order_id, order_name FROM farmhouse_order where customer_id = '$cid' order by trans_id desc limit 1";
				      $res_order = mysqli_query($conn,$sql_order); 
					  $row_order = mysqli_fetch_assoc($res_order);
 echo " <h3> Name : " . $row_order['order_name'] . "<br>"; 
 echo "Order No : " . $row_order['order_id']. "<br><hr>";	
$oid =   $row_order['order_id'];
if($row_order){
				  
$sql_detox ="select * from farmhouse_order where customer_id = '$cid' and order_id = '$oid'";
//echo $sql_detox ;
$res_detox = mysqli_query($conn,$sql_detox); 
$row_detox = mysqli_fetch_assoc($res_detox);
if ($row_detox){
$product_type=$row_detox["product_type"];//echo $product_type;
$sql_order_detox ="select * from farmhouse_order where customer_id = '$cid'  and order_id = '$oid'";

$res_order_detox = mysqli_query($conn,$sql_order_detox); 
$row_order_detox = mysqli_fetch_assoc($res_order_detox);
if ($row_order_detox){
?>
 <br><br><h3>Form House Details</h3><hr>
<table width='100%'	border = "1" cellspacing="0" cellpadding="2">
	<tr bgcolor="#FAFFFF">
     <td align="center" width="20%"> Name</td>
	 <td align="center" width="10%"> Qty</td>
	 <td align="center" width="10%"> Price</td>
	 <td align="center" width="20%"> Total</td>
	<!-- <td align="center" width="20%"> Address</td>-->
	 <td align="center" width="20%"> Delivery Date</td>
   </tr>
<?php						  
$sql_order_detox ="select * from farmhouse_order where customer_id = '$cid' and order_id = '$oid' order by trans_id asc";
$res_order_detox = mysqli_query($conn,$sql_order_detox); 
while($row_order_detox = mysqli_fetch_assoc($res_order_detox)){
?>
	<tr>
     <td align="center"> <?php echo $row_order_detox['product_name'] ?></td>
	 <td align="center"> <?php echo $row_order_detox['quantity_ordered'] ?></td>
	 <td align="center"> <?php echo $row_order_detox['product_price'] ?></td>
	 <td align="center"> <?php echo $row_order_detox['product_total'] ?></td>
<!--	 <td align="center"> <?php 
	/* $aid = $row_order_detox['delivery_address'];
	 
	 $sql_address="SELECT * FROM  farmhouse_customer_address where customer_id = '$cid' and address_id = $aid";
     $res_address = mysqli_query($conn,$sql_order); 
     $row_address=mysqli_fetch_array($res_address);
	 
	 echo $row_address['address'] . ", " . $row_address['address_city'] . ", " . $row_address['address_district']; 
	*/ ?></td>-->
	 <td align="center"> <?php $dtt = $row_order_detox['delivery_dates'];  
	 $str = $dtt;
$dates = explode(' ', $str); echo $dt = $dates[0];
	 ?></td>
    </tr>
	<?php } ?>
</table>
<?php } ?>
<br>
 

 <?php echo " <br><br><h3> Payment Details </h3><hr>"; ?>
<table width='60%'	border = 1 cellspacing="0" cellpadding="2">
	<tr bgcolor = "#FAFFFF">
	<td align="center" width="40%"> Payment Method </th>
	<td align="center" width="30%"> Card / Bank Name </th>
	<td align="center" width="30%"> Payment Type</th>
   </tr>
   <tr>
	<td align="right">
	 <?php 			  
	 $sql_order_paymnt="SELECT * FROM farmhouse_order where customer_id = '$cid' and order_id = '$oid' ";
	 $res_order_paymnt = mysqli_query($conn,$sql_order_paymnt); 
	 $row_order_paymnt = mysqli_fetch_array($res_order_paymnt);
	 echo $row_order_paymnt['payment_method'];  ?>&nbsp; 
	 </td>
	 <td align="center"> <?php echo $row_order_paymnt['card_name']; ?></td>
	 <td align="center"> <?php echo $row_order_paymnt['payment_type']; ?></td>	 
	 </tr>

 </table>
 <?php }}?>


<table>	
	<tr>
	<td align="left">&nbsp;  </td>
	<td align="left">&nbsp;  </td>
	<td align="left">&nbsp;  </td>
	</tr>
	<tr>

     <td align="left"> <strong>Total Paid </td>
	 <td align="left">&nbsp;  </td>
	<td align="right">&nbsp; <strong><?php 
	 $sql_order="SELECT sum(product_total) as total FROM farmhouse_order where customer_id = '$cid' and order_id = '$oid'";
				      $res_order = mysqli_query($conn,$sql_order); 
					  $row_order = mysqli_fetch_assoc($res_order);
					  echo $row_order['total'] ?> &nbsp; </td>
	 
    </tr>
</table>
</div>
</section>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
