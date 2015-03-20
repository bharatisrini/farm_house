<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"];
$oid = $_GET['order'];
?>
<?php
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
?>
<div>
<?php
 $sql_order="select * from farmhouse_order where customer_id = '$cid' and product_type ='Retail' and order_id = '$oid'";
  $res_order = mysqli_query($conn,$sql_order); 
 $row_order=mysqli_fetch_assoc($res_order);
	  if($row_order){ ?>
  
<h2>Retail</h2><hr>
<table width="80%" border="1" cellpadding="0" cellspacing="0" bordercolor="#00AEEF" bgcolor="">
	<tr bgcolor="#00aeef">
     <th width="30%" height="25" align="center"> Product Name</th>
	 <th width="15%" height="25" align="center"> Price</th>
	 <th width="15%" height="25" align="center"> Qty</th>
	 <th width="15%" height="25" align="center"> Total</th>
	 <th width="15%" height="25" align="center"> Delivery Status</th>
	 <!--<th align="center"> Delivery Date</th>-->
   </tr>
  <?php				 
  $sql_order="select * from farmhouse_order where customer_id = '$cid' and product_type ='Retail' and order_id = '$oid'";
  $res_order = mysqli_query($conn,$sql_order); 
  while($row_order=mysqli_fetch_assoc($res_order)){
  $deli_addrs = trim($row_order['delivery_address'],"Address ");
  ?>
	<tr>
	 <td height="25" align="center"> <?php echo $row_order['product_name']; ?></td>
     <td height="25" align="center"> <?php echo $row_order['product_price']; ?></td>
	 <td height="25" align="center"> <?php echo $row_order['quantity_ordered']; ?></td>
	 <td height="25" align="center"> <?php echo $row_order['product_total']; ?></td>
	 <td height="25" align="center"> <?php $stat = $row_order['status']; if($stat==1){ echo "Delivered"; } else { echo "Pending";} ?></td>
    </tr>
	<?php } ?>
</table>	
<?php } ?>
<br><br><br>
<?php
$sql_get_data = "select * from farmhouse_delivery_schedule where customer_id='$cid' and order_id = '$oid' and program_type='Detox' ";
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$row_get_data = mysqli_fetch_array($res_get_data);
	if($row_get_data) { ?>
 <h2>Detox</h2><hr>
 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#00AEEF" bgcolor="">
   <tr bgcolor="#00aeef">
     <th width="4%" height="25"> SNo</th>
     <th width="12%" height="25">Product Type </th>
     <th width="12%" height="25">Items</th>
     <!--<th width="15%">Order Date</th>-->
     <th width="8%" height="25">No of People </th>
     <th width="9%" height="25">No of Detox </th>
     <th width="11%" height="25">Delivery Date</th>
     <th width="17%" height="25">Delivery Address </th>
     <th width="12%" height="25">Delivery Status </th>
   </tr>
   <?php
	$sql_get_data = "select * from farmhouse_delivery_schedule where customer_id='$cid' and program_type='Detox' and order_id = '$oid' ";
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$sno=1; 
	while($row_get_data = mysqli_fetch_array($res_get_data)) { 
	$deli_addrs = $row_get_data['delivery_address'];
	$prd_typ=substr($row_get_data['product_type'],6);
	$sql_get_datas = "select * from farmhouse_detox_program where detox_name='$prd_typ'";
	
	$res_get_datas = mysqli_query($conn,$sql_get_datas);

$row_get_datas = mysqli_fetch_array($res_get_datas);
$sql_add = "select * from farmhouse_customer_address where customer_id = '$cid' and address_id = '$deli_addrs'";
					$res_add = mysqli_query($conn,$sql_add);
					$row_add = mysqli_fetch_array($res_add);						
						$adds = 	$row_add['address']. ", " . $row_add['address_city']. ", " . $row_add['address_district'];	
		 // $deli_addrs = $row_get_data['address_id']; ?>
	 
   <tr>
     <td height="25" align="center"><?=$sno?></td>
     <td height="25" align="center"><?=$row_get_data['product_type']?></td>
     <td height="25" align="center"><?=$row_get_datas['detox_items'];?></td>
   <!--  <td align="center">&nbsp;</td>-->
     <td height="25" align="center"><?=$row_get_data['no_people'];?></td>
     <td height="25" align="center"><?=$row_get_data['no_detox'];?></td>
     <td height="25" align="center"><?=$row_get_data['delivery_date'];?></td>
     <td height="25" align="center"><?=$adds?></td>
     <td height="25" align="center"><?php $stat = $row_get_data['delivery_status']; if($stat==1){ echo "Delivered"; } else { echo "Pending";} ?></td>
   </tr>
   <?php $sno++;} ?>
  </table>
 <?php } ?>
 <br>
 <br><br>
<?php
$sql_get_data = "select * from farmhouse_delivery_schedule where customer_id='$cid' and program_type='LifeStyle' and order_id = '$oid' ";
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$row_get_data = mysqli_fetch_array($res_get_data);
	if($row_get_data) { ?>
 <h2>LifeStyle</h2><hr>
 <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#00AEEF" bgcolor="">
   <tr bgcolor="#00aeef">
     <th width="4%" height="25"> SNo</th>
     <th width="12%" height="25">Product Type </th>
     <th width="12%" height="25">Items</th>
     <!--<th width="15%">Order Date</th>-->
     <th width="8%" height="25">No of People </th>
     <th width="9%" height="25">No of Detox </th>
     <th width="11%" height="25">Delivery Date</th>
     <th width="17%" height="25">Delivery Address </th>
     <th width="12%" height="25">Delivery Status </th>
   </tr>
   <?php
	$sql_get_data = "select * from farmhouse_delivery_schedule where customer_id='$cid' and program_type='LifeStyle' and order_id = '$oid' ";
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$sno=1; 
	while($row_get_data = mysqli_fetch_array($res_get_data)) { 
	$deli_addrs = $row_get_data['delivery_address'];
	$prd_typ=substr($row_get_data['product_type'],6);
	$sql_get_datas = "select * from farmhouse_detox_program where detox_name='$prd_typ'";
	
	$res_get_datas = mysqli_query($conn,$sql_get_datas);

$row_get_datas = mysqli_fetch_array($res_get_datas);
$sql_add = "select * from farmhouse_customer_address where customer_id = '$cid' and address_id = '$deli_addrs'";
					$res_add = mysqli_query($conn,$sql_add);
					$row_add = mysqli_fetch_array($res_add);						
						$adds = 	$row_add['address']. ", " . $row_add['address_city']. ", " . $row_add['address_district'];	
		 // $deli_addrs = $row_get_data['address_id']; ?>
	 
   <tr>
     <td height="25" align="center"><?=$sno?></td>
     <td height="25" align="center"><?=$row_get_data['product_type']?></td>
     <td height="25" align="center"><?=$row_get_datas['detox_items'];?></td>
   <!--  <td align="center">&nbsp;</td>-->
     <td height="25" align="center"><?=$row_get_data['no_people'];?></td>
     <td height="25" align="center"><?=$row_get_data['no_detox'];?></td>
     <td height="25" align="center"><?=$row_get_data['delivery_date'];?></td>
     <td height="25" align="center"><?=$adds?></td>
     <td height="25" align="center"><?php $stat = $row_get_data['delivery_status']; if($stat==1){ echo "Delivered"; } else { echo "Pending";} ?></td>
   </tr>
   <?php $sno++;} ?>
  </table>
 <?php } ?>

</div>



