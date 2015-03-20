<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"]; ?>



<script>
function get_oid(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","reschedule_detox.php?oid="+str,true);
        xmlhttp.send();
    }
}
</script>

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
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

</head>
<body class="home">

<?php include("includes/header.php"); ?><center>
<br><br><br><br><br><br><br><br><br><br>
<?php

echo "<h1> Your Order Details </h1>";

	$sql_order="select order_id, order_name FROM farmhouse_order where customer_id = '$cid' order by trans_id desc limit 1";
				      $res_order = mysqli_query($conn,$sql_order); 
					  $row_order = mysqli_fetch_assoc($res_order);
echo "<br><br>"; 
 $oid =   $row_order['order_id'];
 
?>
<h3>Choose order_id &nbsp; <select id="order" onchange="get_oid(this.value)"><option>Select Order</option>
<?php $sql_orders = "select distinct order_id from farmhouse_order where customer_id = '$cid' and product_type != 'Retail'"; 
      $res_orders = mysqli_query($conn,$sql_orders); 
      while($row_orders= mysqli_fetch_array($res_orders)) {?><option><?php echo $row_orders['order_id']; ?></option> <?php } ?>
	  </select></h3>
<div id="order_table">
<div id="txtHint"><b> </b></div>


</div>
<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>