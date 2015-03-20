<?php
include('database/db_connect.php');
error_reporting(0);
//session_start();
//$cid = $_SESSION["customer_id"];
?>
<!--<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='../webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='../webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='../webstyle/fonts.css' rel='stylesheet' type='text/css'>
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


	<!--<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	<script type="text/javascript" src="../slick/slick.min.js"></script>

    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src="../js/jquery.sumoselect.min.js"></script>

	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="../js/icheck.js"></script>-->
<style>
#tr1:nth-child(even) {background: #FFF}
#tr1:nth-child(odd) {background: #CCC}
</style>
</head>

<body class="shopping-card">

<?php include("header1_nologout.php"); ?>

  <?php
$order_id=$_GET["q"];
?>
<?php
if(isset($_POST['submit'])){
?>




<h2 align="center" >The Orders Placed Between The Selected Dates</h2>
<h4 align="center" ><a href="index.php?link=view_orders">Go back</a></h4>
 <table align="center" width="80%" border="0" cellpadding="5" cellspacing="2">
 
 <tr bgcolor='#00aeef'>
	
    	 <th > Order Id</th>
		 <th>  Customer Name</th>

       <th >  Product Type</th>

        <th > 
        	Delivery Address
        <!--    <span class="last group">¥RMB</span> -->
        </th>
        <th > 
        	Delivery Date
        <!--    <span class="last group">¥RMB</span> -->
       </th>


	</tr>
  
    <br>
 

		 <?php
	                $date = date_create($_REQUEST['date1']);
	                $date1 = date_format($date,"Y-m-d");
		 			$d1 = $date1;
					
					$date11 = date_create($_REQUEST['date2']);
	                $date2 = date_format($date11,"Y-m-d");
					$d2 = $date2;
		 			//$starttime = "00:00:00:00";
		 			//$endtime = "23:59:59:59";
		 			//$d1=$d1." ".$starttime;

		 			//$d2=$d2." ".$endtime;

		 			$delivery_date = date("Y-m-d");
					//$sql_ct = "select * from farmhouse_delivery_schedule where delivery_date BETWEEN '$d1' AND '2015-03-10 11:59:00:00'";
					$sql_ct = "select * from farmhouse_delivery_schedule where delivery_date BETWEEN '$d1' AND '$d2'";
					$res_ct = mysqli_query($conn,$sql_ct);
					while($row_ct = mysqli_fetch_array($res_ct)) {
					//echo"hello";
					?>
	
    	<tr id="tr1">
        <td align="center"><?php echo $row_ct['order_id'];?> </td>
		<td align="center" nowrap><?php  $cust_id = $row_ct['customer_id'];
		$sql = "select * from farmhouse_customer where customer_id = $cust_id";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo $row['firstname']; echo " "; echo $row['lastname'];
		?></td>
       <td align="center"> <?php echo $row_ct['product_type'];?></td>
		<td align="justify"><?php  $address_id = $row_ct['address_id'];
		$aid = $row_ct['delivery_address'];



		$sql_add = "select * from  farmhouse_customer_address where customer_id = '$cust_id' and address_id = '$aid'";
		$result = mysqli_query($conn,$sql_add);
		$row = mysqli_fetch_array($result);
		 echo $row['address']; echo "; "; echo $row['address_city']; echo "; "; echo $row['address_district'];
		?></td>
		<td align="center"><?php echo $row_ct['delivery_date'];?> </td>

     
	<?php } //ends while?>



</tr>
</table>
 
  <?php
}

?> 

 
 
</body>
</html>