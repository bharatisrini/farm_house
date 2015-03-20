<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
//$cid = $_SESSION["customer_id"];
?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='../../webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='../../webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='../../webstyle/fonts.css' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!--<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie8-fixs.css" />
    <![endif]-->
    <!--[if gt IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie-fixs.css" />
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    
    
	<script type="text/javascript" src="../../js/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../../slick/slick.css"/>
	<script type="text/javascript" src="../../slick/slick.min.js"></script>

    <link href="../../webstyle/sumoselect.css" rel="stylesheet" />
    <script src="../../js/jquery.sumoselect.min.js"></script>
    
	<link href="../../skins/flat/grey.css" rel="stylesheet">
	<script src="../../js/icheck.js"></script>
	 
	 
	<script type="text/javascript">
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
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
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","order_details.php?q="+str,true);
xmlhttp.send();
}
</script> 


<script>
function fun(tid,crid,oid) {
         var dataPass; //alert("Y");
	     var Id =tid; //alert(Id);
	     var carr = document.getElementById("carrier"+Id).value;
		 if(carr=='0'){
			 alert("plz select coriour name");
			 document.getElementById("carrier"+Id).focus();
			 return false;
			 }
		 var orid = oid; //alert(orid);
	     var urls="order_deliver.php";
	     
	     //alert(carr);
		 //alert("Done");
         window.location.href="order_deliver.php?tr_id="+Id+"&cr_id="+carr+"&o_id="+orid;
        
        }
</script>			 

</head>
<body>
<br>
<?php //include("includes/header.php"); ?>
   
   <?php if(!isset($_GET['q']) || isset($_GET['oid']) )
    { ?>
  <form method="post" action="">
   <select name="order_id" onChange="showUser(this.value)">
<option  value="" >Select an Order:</option>
<?php
$sql_go = "select distinct order_id from  farmhouse_delivery_schedule where delivery_status = '0' order by order_id";  
					$res_go = mysqli_query($conn,$sql_go);
					while($row_go = mysqli_fetch_array($res_go)) {
					
					?>
<option <?php if(isset($_GET['oid'])) { ?>value="<?=$_GET['oid']?>" selected <?php } else { ?> value="<?php echo $row_go['order_id']; ?>" <?php } ?> ><?php echo $row_go['order_id']; ?></option>
<?php } ?>
</select>
</form>

<?php } //display dd?>
<div id="txtHint">

<?php if(isset($_GET['oid']) || isset($_GET["q"]) ) { ?>
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
    if(isset($_GET['oid'])){
		$order_id = $_GET["oid"]; } 
		else {
        $order_id = $_GET["q"]; }
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
    <td><select name="carrier" id="carrier<?php echo $row_ct['trans_id'];?>">
		<option value="0">Select Carrier</option>
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
        
        <input type="button" onClick="fun(<?php echo $row_ct['trans_id'];?>,document.getElementById('carrier<?php echo $row_ct['trans_id'];?>').value,<?php echo $order_id;?>)" value="Delivered">
        
       <?php /*?> <a href="#" id="<?=$row_ct['trans_id']?>" class="deliver" onClick="fun('<?php echo $row_ct['trans_id'];?>',document.getElementById('carrier').value,<?php echo $order_id;?>)">Delivered</a><?php */?>
        
        </td>
  </tr>
  <?php } ?>
</table>
</div>
<?php } ?>




</div>




<?php //include("includes/footer.php"); ?>

<script type="text/javascript" src="../../js/classie.js"></script>
<script type="text/javascript" src="../../js/modernizr.js"></script>
<script type="text/javascript" src="../../js/custom.js"></script>

</body>
</html>