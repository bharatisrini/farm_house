<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
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
xmlhttp.open("GET","order_details_values.php?q="+str,true);
xmlhttp.send();
}
</script> 



<script>
function myFunction(tid,val,oid) {
    
	alert(tid+val);
	
	var xmlhttp; //alert(qty); alert(id); alert("hii");   
					
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
						 if(xmlhttp.responseText == "")
						 window.location.href="order_details.php";
						 
						 //else
						 //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
						 //alert(xmlhttp.responseText);
						}
					  }
					xmlhttp.open("GET","order_deliver.php?tr_id="+tid+"&value="+val+"&o_id="+oid,true);
					xmlhttp.send();
}
</script>
			 

</head>
<body class="shopping-card">

<?php include("includes/header.php"); ?>
  <form method="post" action="">
  
  <select name="order_id" onChange="showUser(this.value)">
<option value="">Select an Order:</option>
<?php
$sql_go = "select distinct order_id from  farmhouse_delivery_schedule where delivery_status = '0' order by 'order_id'";  
					$res_go = mysqli_query($conn,$sql_go);
					while($row_go = mysqli_fetch_array($res_go)) {
					
					?>
<option value="<?php echo $row_go['order_id']; ?>"><?php echo $row_go['order_id']; ?></option>
<?php } ?>
</select>
<div id="txtHint"><b></b></div>


<p id="demo"></p>
</form>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src=".../js/classie.js"></script>
<script type="text/javascript" src=".../js/modernizr.js"></script>
<script type="text/javascript" src=".../js/custom.js"></script>

</body>
</html>