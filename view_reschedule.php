<?php 
include('database/db_connect.php');
error_reporting(0);
session_start();
$cid = $_SESSION['customer_id'];
//$cid = 40;
$ip = $_SERVER["REMOTE_ADDR"];
$rstat = $_REQUEST['stat'];
$no_ppl = $_REQUEST['ppl'];
$no_dtx = $_REQUEST['dtx'];
$dtx_detox = $_REQUEST['dtx'];
$dtx_id_detox = $_REQUEST['id'];
$ppl_detox = $_REQUEST['ppl'];
$transId = $_REQUEST['tid'];
$sh_type = $_REQUEST['per_name'];
$order_id=$_REQUEST['orderid'];
$no_ppl  = $ppl_detox; 
$no_dtx = $dtx_detox;
//echo "Pwoplw " ; echo $no_ppl; echo "<br>";
//echo $no_dtx;
$dt = $_REQUEST['date'];
$tm=$_REQUEST['tm'];


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
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script>
$(function(){
$("#selnop").change(function(e){
var dataPass;
var nop=$("#selnop").val();
if(nop==""){
$("#dspselect").hide();
alert("Please Select No of People");
return false;
}
dataPass="ppl=<?=$no_ppl?>&dtx=<?=$no_dtx?>&id=<?=$dtx_id_detox?>&tid=<?=$transId?>&per_name=<?=$sh_type?>&date=<?=$dt?>&tm=<?=$tm?>&orderid=<?=$order_id?>&selno="+nop+"&stat=<?=$rstat?>";
//alert(dataPass);
urls="view_edit_reschedule.php";
$("#dspselect").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :urls,
						data :dataPass,
						cache :false,
						success : function(html) {
						//	alert(html);	
						$("#dspselect").html(html).show();
					//	if(html.tostring()=='deleted File'){
						//}
					}
			});
});



});
</script>	
</head>

<body class="adresses">

<form action="#" id="forms1" method="post">
<span id="datError"></span>

<section class="plan">
	<div class="wrapper" style="width:900px;">
    	<aside class="plan"><?=$no_dtx?> day <?=$rstat?> for <?=$no_ppl?> People Schedule Plan: <?=$sh_type?>  </aside>
    	<aside class="plan">Select People <select name="selnop" id="selnop"><option value="">Select</option><?php for($s=1; $s<=$no_ppl; $s++){?><option value='<?=$s?>'><?=$s?></option><?php }?></select> for  Reschedule</aside>

<div id="dspselect">
</div> 
</div>
</section>

</form>
</body>
</html>