<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"];
$oid = $_GET['order'];
?>


<h2>Retail</h2><hr><br>
<table bgcolor="" border="1" cellpadding="5" cellspacing="2" width="100%">
	<tr bgcolor="#00aeef">
     <th align="center"> Product Name</th>
	 <th align="center"> Product Qty</th>
	 <th align="center"> Price</th>
	 <th align="center"> Total</th>
	 <th align="center"> Address</th>
	 <!--<th align="center"> Delivery Date</th>-->
   </tr>
                      <?php				 
                      $sql_order="SELECT * FROM farmhouse_order where customer_id = '$cid' and product_type ='Retail' and order_id = '$oid'";
				      $res_order = mysqli_query($conn,$sql_order); 
					  While($row_order=mysqli_fetch_assoc($res_order)){
                      ?>
	<tr>
     <td align="center"> <?php echo $row_order['product_name'] ?></td>
	 <td align="center"> <?php echo $row_order['quantity_ordered'] ?></td>
	 <td align="center"> <?php echo $row_order['product_price'] ?></td>
	 <td align="center"> <?php echo $row_order['product_total'] ?></td>
	 <td align="center"> <?php echo $row_order['delivery_address'] ?></td>
	 <?php /*?><td align="center"> <?php echo $row_order['delivery_dates'] ?></td><?php */?>
    </tr>
	<?php } ?>
</table>	
<br><br><br>
 <?php echo " <h2>  Detox-A </h2><hr><br>"; ?>
 
 <table bgcolor="" border="1" width="100%">
	<tr bgcolor="#00aeef">
     
	 
	 <th width="18%"> No_of_people</th>
	 <th width="63%"> Address</th>
	 <th width="19%"> Delivery Date</th>
	 
   </tr>
   <?php $sql_get_data = "select * from farmhouse_delivery_schedule where customer_id='$cid' and order_id = '$oid'";
          $res_get_data = mysqli_query($conn,$sql_get_data);$sno=1; while($row_get_data = mysqli_fetch_array($res_get_data)) { $deli_addrs = trim($row_get_data['delivery_address'],"Address ") ?>
    <tr valign="middle" bordercolor="#333333" height="100%"><td height="90" align="center"><?php echo getname($row_get_data['customer_id']); ?></td>
	<td align="center"><p id="<?php echo $sno;?>"><?php echo getadd($deli_addrs); ?> </p>
	<select id="chng" onChange="saveadd(this.value,'<?php echo $row_get_data['delivery_date'];?>','<?php echo $sno;?>')"><option>Change Address</option>
	<?php $sql_getadrs = "select * from farmhouse_customer_address where customer_id='$cid'"; $res_getadrs=mysqli_query($conn,$sql_getadrs); while($row_getadrs= mysqli_fetch_array($res_getadrs)) {?>
	<option value="<?php echo $row_getadrs['address_id'];?>"><?php echo "Address ".$row_getadrs['address_id'];?></option> <?php $sno++; } ?>
	</select>
	<?php /*?><input type="button" value="Save" id="sav" onClick="saveadd('<?php echo $row_get_data['delivery_date'];?>',document.getElementById('old_add').innerHTML)"/><?php */?></td>
	<td align="center"><?php echo $row_get_data['delivery_date'];?></td></tr> <?php } ?>

<script language="javascript">
   
function saveadd(add_id,dat,id_in) {
   
   
                     //var address1 = adrs; //alert(address1);
					 //var date1 = dt;
					// var dtx_name1 = tid; //alert(address1+date1+dtx_name1); 
					//alert(add_id+"-"+""+dat);
					 var xmlhttp;				  			
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						 
						 document.getElementById(id_in).innerHTML = xmlhttp.responseText; 
						 					  
						}
					  }
					xmlhttp.open("GET","add_to_cart.php?msg=chngadd&send_add="+add_id+"&send_dat="+dat,true);
					xmlhttp.send();  
   
   
  // alert(add+"-"+""+dat);var pars = $("p");
   /*$(id_in).load("add_to_cart.php?msg=chngadd&send_add="+add_id+"send_dat="+dat);*/
}
   </script>
   
   </table>
<br><br><br>
<?php echo " <h2> Total Amount </h2><hr><br>"; ?>
<table bgcolor="" border="1" cellpadding="5" cellspacing="2">
	<tr>
     <td align="left"> Retail =</td>
	<td align="right">
	 <?php			  $sql_order="SELECT sum(product_total) as retail_total FROM farmhouse_order where customer_id = '$cid' and product_type ='Retail'  and order_id = '$oid'";
				      $res_order = mysqli_query($conn,$sql_order); 
					  While($row_order=mysqli_fetch_assoc($res_order)){
?>
	
      <?php echo $row_order['retail_total']; } ?>&nbsp; </td>
	 
    </tr>
	 
     <td align="left"> Detox - A = </td>
	 <td align="right"> <?php 
	 $sql_order="SELECT sum(product_total) as detox_total FROM farmhouse_order where customer_id = '$cid' and product_type ='Detox-A'  and order_id = '$oid'";
				      $res_order = mysqli_query($conn,$sql_order); 
					  While($row_order=mysqli_fetch_assoc($res_order)){
						  echo $row_order['detox_total'] ?>&nbsp;  </td>
	 
    </tr>
	<?php } ?>
	
	<tr>
     <td align="left">Total Paid </td>
	<td align="right"><?php 
	 $sql_order="SELECT sum(product_total) as total FROM farmhouse_order where customer_id = '$cid' and order_id = '$oid'";
				      $res_order = mysqli_query($conn,$sql_order); 
					  While($row_order=mysqli_fetch_assoc($res_order)){
						  echo $row_order['total'] ?> &nbsp; </td>
	 
    </tr>
	<?php } ?>
</table>
<br><br><br>
<?php echo " <h2> Payment </h2><hr>"; ?>
<table bgcolor="" border="1" cellpadding="5" cellspacing="2">
	<tr>
     <td align="left"> Payment Details </td>
	<td align="right">
	 <?php						  $sql_order="SELECT * FROM farmhouse_order where customer_id = '$cid' and order_id = '$oid'";
				      $res_order = mysqli_query($conn,$sql_order); 
					  While($row_order=mysqli_fetch_assoc($res_order)){
?>
	
      <?php echo $row_order['payment_type']; echo " "; echo $row_order['payment_method']; } ?>&nbsp; </td>
	 
    </tr>

	
</table>

