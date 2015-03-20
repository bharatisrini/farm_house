<?php 
include('database/db_connect.php'); 
error_reporting(0);
//session_start();
//$cid = $_SESSION["customer_id"];
$order_id=$_GET["q"];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>

<script type="text/javascript" src="../../js/jquery-1.10.2.min.js"></script>
<script>
function fun(tid,crid,oid) {
         var dataPass; //alert("Y");
	     var Id =tid; alert(Id);
	     var carr = crid;
		 var orid = oid; alert(orid);
	     var urls="order_deliver.php";
	     
	     alert(carr);
		 //alert("Done");
         window.location.href="order_deliver.php?tr_id="+Id+"&cr_id="+carr+"&o_id="+orid;
        
        }
</script>			
</head>

<body>
<div style=" padding-top:30px;">
<table width="100%" cellpadding="5" cellspacing="2">
  <tr bgcolor="#00aeef">
    <th>OrderID</th>
    <th>CustomerName</th>
    <th>Product Type</th>
    <th>Delivery Address</th>
    <th>Delivery Date</th>
    <th>Carriers</th>
  </tr>
   <?php 

	$sql_ct = "select * from farmhouse_delivery_schedule where order_id = '$order_id' and delivery_status='0'";  
	$res_ct = mysqli_query($conn,$sql_ct);
	while($row_ct = mysqli_fetch_array($res_ct)) {
	
	?>
  <tr bgcolor="#CCCCCC">
    <td ><?php echo $row_ct['order_id'];?></td>
    <td><?php  $cust_id = $row_ct['customer_id'];
		$sql = "select * from farmhouse_customer where customer_id = $cust_id";
		$result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_array($result);
		echo $row['firstname']; echo " "; echo $row['lastname'];
		?></td>
    <td><?php echo $row_ct['product_type'];?></td>
    <td><?php  $address_id = $row_ct['address_id'];
		$aid = $row_ct['address_id'];
		$sql_add = "select * from  farmhouse_customer_address where customer_id = '$cust_id' and address_id = '$aid'";
		$result = mysqli_query($conn,$sql_add);
		$row = mysqli_fetch_array($result);
		echo "Address : "; echo $row['address']; echo "<br>"; echo "City : "; echo $row['address_city']; echo "<br>"; echo "District : ";  echo $row['address_district']; 
		?></td>
    <td><?php echo $row_ct['delivery_date'];?></td>
    <td><select name="carrier" id="carrier">
		<option>Select Carrier</option>
		<?php
		 $sql = "select * from farmhouse_carrier_details";
						$result = mysqli_query($conn,$sql);
						while($row = mysqli_fetch_array($result)) {
							 
							?>
							
		<option value="<?php echo $row['carrier_id']; ?>"><?php echo $row['carrier_name']; ?></option>
		
		<?php } ?>
		</select>
        
        <?php /*?><input type="button" onClick="fun(<?php echo $row_ct['trans_id'];?>,document.getElementById('carrier').value,<?php echo $order_id;?>)" value="Delivered"/><?php */?>
        
        <!--<input type="button" onClick="fun(10,1,8)"  value="Delivered">-->
        
        <input type="button" onClick="fun(<?php echo $row_ct['trans_id'];?>,document.getElementById('carrier').value,<?php echo $order_id;?>)" value="Delivered">
        
        <?php /*?><a href="#" id="<?=$row_ct['trans_id']?>" class="deliver" onClick="fun('<?php echo $row_ct['trans_id'];?>',<?php echo $order_id;?>)">Delivered</a><?php echo $order_id;?><?php */?>
        
        </td>
  </tr>
  <?php } ?>
</table>
</div>
</body>
</html>