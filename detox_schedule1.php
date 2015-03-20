<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Calcutta');
$current_date=date("Y-m-d");
$current_time=date("h:i:s A");
//echo $current_time;
$cu_id = $_SESSION['customer_id'];
$ip = $_SERVER["REMOTE_ADDR"];
$dtx_id_detox = $_GET['id'];
$ppl_detox = $_GET['ppl'];
$dtx_detox = $_GET['dtx'];
$transId = $_GET['transId'];
$no_ppl  = $ppl_detox; 
$no_dtx = $dtx_detox;
?>
<?php 
 
$sql_getCustAddress = "select * from farmhouse_customer_address where customer_id = '$cu_id' order by address_id Asc ";
//echo $sql_getCustAddress;
 $res_getCustAddress = mysqli_query($conn,$sql_getCustAddress);
 $row_getCustAddress = mysqli_fetch_array($res_getCustAddress);
  $custAddressId = $row_getCustAddress['address_id'];
 if($custAddressId==null){$custAddressId=0;}
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
    <script src="js/jquery.sumoselect.min.js"></script>
    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <link href="skins/flat/aero.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
    <script type="text/javascript" src="js/zebra_datepicker.js"></script>
    <link rel="stylesheet" href="webstyle/bootstrap.css" type="text/css">
		<script type="text/javascript">
	$(function() {
		
	//$(".selectDate").hide();
	  var today = new Date();
	 var dd = today.getDate();
	if(dd<=9){
	dd="0"+dd;
	}
    var mm = today.getMonth()+1; //January is 0!
	if(mm<=9){
	mm="0"+mm;
	}
    var yyyy = today.getFullYear();
	var currentDate=yyyy+"-"+mm+"-"+dd;
	var now = new Date();
    now.setDate(now.getDate()+1);
    var ch_dd = now.getDate();
	if(ch_dd<=9){
	ch_dd="0"+ch_dd;
	}
    var ch_mm = now.getMonth()+1; //January is 0!
	if(ch_mm<=9){
	ch_mm="0"+ch_mm;
	}
    var ch_yy = now.getFullYear();
		var change_Date=ch_yy+"-"+ch_mm+"-"+ch_dd;

	var hours = today.getHours();
	var hours24 = today.getHours();
    var minutes = today.getMinutes();
        if (minutes < 10)
                minutes = "0" + minutes;
            var suffix = "AM";
            if (hours >= 12) {
                suffix = "PM";
                hours = hours - 12;
            }
            if (hours == 0) {
                hours = 12;
            }
  //          var current_time = hours + ":" + minutes + " " + suffix;
	//			var current_times = hours24 + ":" + minutes;
if(hours24<12){
}else if(hours24>=12){
	$("#datepicker").val(change_Date);
	Myfun(change_Date);
}
//select date change
$('#datepicker').bind('focus blur select change click dblclick mousedown mouseup mouseover mousemove mouseout keypress keydown keyup', function(e) {
var selected_Date=$("#datepicker").val();
if($('#datepicker').val()==""){
}else{
if(selected_Date==currentDate){
if(hours24<12){
//$(".selectDate").hide();
}else if(hours24>=12){
	$("#datepicker").val(change_Date);
	Myfun(change_Date);
//$(".selectDate").show();
}
}else if(selected_Date<=currentDate){
//$(".selectDate").hide();
}else if(selected_Date>=currentDate){
//$(".selectDate").show();
}
e.stopPropagation();
}
});
var noofdetox="<?=$no_dtx?>";

if(noofdetox<=3){
$('#selectNext').click(function(e){ 
var dataPass;
var selectedDate=$("#datepicker").val();
var noofpeople="<?=$ppl_detox?>";
var custId="<?=$cu_id?>";
var detoxId=<?=$dtx_id_detox?>;
var detoxTransId="<?=$transId?>";
var AddressId="<?=$custAddressId?>";

dataPass="custId="+custId+"&detoxId="+detoxId+"&noPeople="+noofpeople+"&noDetox="+noofdetox+"&TransId="+detoxTransId+"&AddressId="+AddressId+"&DeliveryDate="+selectedDate;
//alert(dataPass);
if(selectedDate!=""){
//alert(selectedDate);
url="tempDeliveryData.php"
$("#datInsert").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							// alert(html);	
						$("#datInsert").html(html).show();
					}
			});

}
});
//check detox box;
}
//close
 });
	</script>

</head>
<body class="schedule">

<?php include("includes/header.php"); ?>
<form method="post" action="#" name="f1">
<section class="back-button fixed-top group">
	<div class="wrapper group">
    	<a href="add_to_cart.php?back_id=<?php echo $_GET['id'];?>">BACK</a>
    </div>
</section>

<section class="main-title group">
	<div class="wrapper group">
    	<h2>SCHEDULE MY DETOX</h2>
    </div>
</section>

<section class="ordered gray group">
	<div class="wrapper group">
	    	<?php if(isset($_POST['no_dtx']) && isset($_POST['no_ppl']) )
					{
					  $no_dtx = $_POST['no_dtx']; //echo $no_dtx;
                      $no_ppl = $_POST['no_ppl'];
					  $dx_id = $_POST['dtx_id']; ?>
						  
    	<aside class="title group">Ordered:</aside>
        <aside class="list group">
	            
        	<figure class="group">
            	<div class="days">
                	<select class="SlectBox" name="days">
                        <option value="<?php echo $dtx_detox;?> day"><?php echo $dtx_detox;?> day</option>
                        <!--<option value="3 day">3 day</option>
                        <option value="5 day">5 day</option>-->
                    </select>
                </div>
				
                <div class="box"><img src="images/icon-basket-detox-gray.png" alt="Detox" /></div>
				
                <div class="type">
				<?php $sql_dtx = "select detox_name from farmhouse_temp_schedule_detox where detox_id = '$dtx_id_detox' "; 
				$res_dtx = mysqli_query($conn,$sql_dtx); 
				$row_dtx = mysqli_fetch_array($res_dtx);?>
                	<select class="SlectBox" name="type"><?php  $getname = trim($row_dtx['detox_name'],"Detox-");?>
                        <option value="<?php echo $getname; ?>"><?php echo $getname; ?></option>
                        <!--<option value="B">B</option>
                        <option value="C">C</option>-->
                    </select>
                </div>
                <div class="for">for</div>
                <div class="persons">
                	<select class="SlectBox" name="persons">
                        <option value="<?php echo $ppl_detox;?>"><?php echo $ppl_detox;?></option>
                        <!--<option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>-->
                    </select>
            	</div>
                <div class="image"><img src="images/icon-profile-image.png" alt="Profile" /></div>
            </figure>
            
           
            
        </aside>
		<?php   } // ends if-mar ?>
    </div>
</section>

<section class="plan">
	<div class="wrapper">
    	<aside class="title group">Schedule:</aside>
        <aside class="date group">
        	<p>When do you want to start your delivery schedule? <a href="#" class="info">About our delivery schedule?</a></p>
          <p>Next available delivery date is: 
            <!--<input id="datepicker" type="text" placeholder="Select Date" name="dat">--><input id="datepicker" type="text" placeholder="Select Date" onFocus="Myfun(this.value)" name="dat">&nbsp;&nbsp;<span id="datError"></span>
           </p>
        </aside>
        <div class="clear"></div>
		<script>
 			function Myfun(val) {
		
		//var v = val; rma;
		var days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
		var d = new Date(val);
		
var c2 = new Date();
		c2.setDate(d.getDate());
		var n2 = c2.toLocaleDateString();
		var d2 = c2.getDay();
			var ch_dd2 = c2.getDate();
	if(ch_dd2<=9){
	ch_dd2="0"+ch_dd2;
	}
    var ch_mm2 = c2.getMonth()+1; //January is 0!
	if(ch_mm2<=9){
	ch_mm2="0"+ch_mm2;
	}
    var ch_yy2 = c2.getFullYear();
		var change_Date2=ch_yy2+"-"+ch_mm2+"-"+ch_dd2;
		var c3 = new Date();
		c3.setDate(d.getDate()+1);
		var n3 = c3.toLocaleDateString();
		var d3 = c3.getDay();
		var ch_dd3 = c3.getDate();
	if(ch_dd3<=9){
	ch_dd3="0"+ch_dd3;
	}
    var ch_mm3 = c3.getMonth()+1; //January is 0!
	if(ch_mm3<=9){
	ch_mm3="0"+ch_mm3;
	}
    var ch_yy3 = c3.getFullYear();
		var change_Date3=ch_yy3+"-"+ch_mm3+"-"+ch_dd3;		
		var c4 = new Date();
		c4.setDate(d.getDate()+2);
		var n4 = c4.toLocaleDateString();
		var d4 = c4.getDay();
		var ch_dd4 = c4.getDate();
	if(ch_dd4<=9){
	ch_dd4="0"+ch_dd4;
	}
    var ch_mm4 = c4.getMonth()+1; //January is 0!
	if(ch_mm4<=9){
	ch_mm4="0"+ch_mm4;
	}
    var ch_yy4 = c4.getFullYear();
		var change_Date4=ch_yy4+"-"+ch_mm4+"-"+ch_dd4;
		var c5 = new Date();
		c5.setDate(d.getDate()+3);
		var n5 = c5.toLocaleDateString();
		var d5 = c5.getDay();
		var ch_dd5 = c5.getDate();
	if(ch_dd5<=9){
	ch_dd5="0"+ch_dd5;
	}
    var ch_mm5 = c5.getMonth()+1; //January is 0!
	if(ch_mm5<=9){
	ch_mm5="0"+ch_mm5;
	}
    var ch_yy5 = c5.getFullYear();
		var change_Date5=ch_yy5+"-"+ch_mm5+"-"+ch_dd5;
		var c6 = new Date();
		c6.setDate(d.getDate()+4);
		var n6 = c6.toLocaleDateString();
		var d6 = c6.getDay();
		var ch_dd6 = c6.getDate();
	if(ch_dd6<=9){
	ch_dd6="0"+ch_dd6;
	}
    var ch_mm6 = c6.getMonth()+1; //January is 0!
	if(ch_mm6<=9){
	ch_mm6="0"+ch_mm6;
	}
    var ch_yy6 = c6.getFullYear();
		var change_Date6=ch_yy6+"-"+ch_mm6+"-"+ch_dd6;
		var c7 = new Date();
		c7.setDate(d.getDate()+5);
		var n7 = c7.toLocaleDateString();
		var d7 = c7.getDay();
		var ch_dd7 = c7.getDate();
	if(ch_dd7<=9){
	ch_dd7="0"+ch_dd7;
	}
    var ch_mm7 = c7.getMonth()+1; //January is 0!
	if(ch_mm7<=9){
	ch_mm7="0"+ch_mm7;
	}
    var ch_yy7 = c7.getFullYear();
		var change_Date7=ch_yy7+"-"+ch_mm7+"-"+ch_dd7;
		var c8 = new Date();
		c8.setDate(d.getDate()+6);
		var n8 = c8.toLocaleDateString();
		var d8 = c8.getDay();
		var ch_dd8 = c8.getDate();
	if(ch_dd8<=9){
	ch_dd8="0"+ch_dd8;
	}
    var ch_mm8 = c8.getMonth()+1; //January is 0!
	if(ch_mm8<=9){
	ch_mm8="0"+ch_mm8;
	}
    var ch_yy8 = c8.getFullYear();
		var change_Date8=ch_yy8+"-"+ch_mm8+"-"+ch_dd8;
		
		var nodetox=<?=$no_dtx?>;
		if(val==""){}else{
		if(nodetox<=3){
		}else{
    <!--    document.getElementById("2").innerHTML =  change_Date2+"<br>"+days[d2];
		//document.getElementById("3").innerHTML =  change_Date3+"<br>"+days[d3];
		//document.getElementById("4").innerHTML =  change_Date4+"<br>"+days[d4];
		//document.getElementById("5").innerHTML =  change_Date5+"<br>"+days[d5];
		//document.getElementById("6").innerHTML =  change_Date6+"<br>"+days[d6];
		//document.getElementById("7").innerHTML =  change_Date7+"<br>"+days[d7];
		//document.getElementById("8").innerHTML =  change_Date8+"<br>"+days[d8]; -->
		
		document.getElementById("2").innerHTML = days[d2];
		document.getElementById("3").innerHTML = days[d3];
		document.getElementById("4").innerHTML = days[d4];
		document.getElementById("5").innerHTML = days[d5];
		document.getElementById("6").innerHTML = days[d6];
		document.getElementById("7").innerHTML = days[d7];
		document.getElementById("8").innerHTML = days[d8];
        }
		}
		
		 }
			
		</script>
		
		<script>
		function changeImage(id,p) {
			//alert("hii");
			 //if(document.getElementById(p).checked == true) {
			 var i; var j=1;
			 //for(i=1; i<=p; i++) {
			 //if( j == p ) {
			 var x = document.getElementById(id).getAttribute("class");// alert(id);
			 var y = id+" can-chedule"; //alert(y);
			//var x = document.getElementById("col-2").setAttribute("class"); ;
				if(x == id) {
					
					document.getElementById(id).setAttribute("class",y);
				} else {
					document.getElementById(id).setAttribute("class",id);
				}
			//}//ends if
			//} // ends for
			//} //ends if rma
			//else 
			   //alert("Please select the checkbox ");
		}
        </script>
	<?php


	//if ($ppl_detox = 1 && $dtx_detox <= 3) {
	  if ($dtx_detox <= 3) {	
	}
	else
	{
?>
        <div class="selectDate">
        <div class="pick-plan group">
		
        	<p>Choose a plan: <?php echo "People "; echo $ppl_detox; echo " Detox "; echo $dtx_detox; ?></p>
		<?php 
	//	$j = $dtx_detox;
	//	$wd = 7;
	//	$cale = (int)($j/$wd);
	//	$no = $cale+1;

	//	for($j = 1; $j<=8; $j++) {   ?>
		
        	<div class="row-top group">
            	<div class="col-1">&nbsp;</div>
                <div class="col-2" id="2"></div>
                <div class="col-3" id="3"></div>
                <div class="col-4" id="4"></div>
                <div class="col-5" id="5"></div>
                <div class="col-6" id="6"></div>
                <div class="col-7" id="7"></div>
				<div class="col-8" id="8"></div>
                
            </div> 
		<!--loop start for no of people-->
            
			    
			 <div class="row group">
            	<div class="col-1"><input type="radio" name="iChecks" id="iCheck1" value="A"><span>A</span></div>
				<?php 
				for($i = 2; $i<=8; $i++) { ?>
				
                <div class="<?php if($i==2 || $i==5 || $i==7) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i;?>" style="color: #000000; font-size:xx-medium;"> </div>
				<?php } ?>
			</div>  	
			<div class="row group">
            	<div class="col-1"><input type="radio" name="iChecks" value="B" id="iCheck2"><span>B</span></div>
				<?php for($i = 2; $i<=8; $i++) { ?>
                <div class="<?php if($i==2 || $i==4 || $i==6) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i.$i; ?>" style="color:#000000;font-size:xx-medium;"> </div> <?php } ?>
            </div>
            
            <div class="row group">
            	<div class="col-1"><input type="radio" name="iChecks" value="C" id="iCheck3"><span>C</span></div>
				<?php for($i = 2; $i<=8; $i++) { ?>
                <div class="<?php if($i==2 || $i==6 || $i==8) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i.$i.$i;?>" style="color:#000000;font-size:xx-medium;"> </div> <?php } ?>
            </div>
		<?php //  }  ?>  
		  </div>
					
        </div>
<?php		
}
	?>
    </div>
</section>

<section class="next-button group">
	<div class="wrapper group"><?php /*$sql_tid = "select trans_id from farmhouse_temp_schedule_detox where customer_id = '$cid' and detox_id = '$dtx_id_detox'"; 
	$res_tid = mysqli_query($conn,$sql_tid); $row_tid = mysqli_fetch_array($res_tid);
	/*if($ppl_detox<=3){
}*/
	?>
    	<a href="#" onClick="rado(<?=$transId?>)" id="selectNext">NEXT</a>
    </div>
	
	<script> function rado(tid) { 
	var j; var elem = document.f1.iChecks; var a1,a2,a3,b1,b2,b3,c;
	var t_id = tid ;
	var z = document.getElementById("datepicker").value;
	if(z==""){
	var err="<font color='red'> ! Please Select Date </font>";
	document.getElementById("datError").innerHTML =err;
	document.getElementById("datepicker").focus();
	return false;
	}
	//document.getElementById("datError").innerHTML="";
	if(elem==null){
	//alert("S");
	window.location.href = "card1.php";
	}else{
	

len=elem.length-1;
chkvalue='';
for(i=0; i<=len; i++)
{
if(elem[i].checked)
chkvalue=elem[i].value;	

}
if(chkvalue=='')
{
alert('Please Select Option A or B or C');
return false;
}else{
	var x = chkvalue;
	if(x=="A" && z!="") {
	window.location.href = "detox_schedule2.php?id=<?=$dtx_id_detox?>&per_name="+x+"&date="+z+"&tid="+t_id+"&ppl=<?=$no_ppl?>&dtx=<?=$no_dtx?>";
	} //ends if2
	if(x=="B" && z!="") {
	window.location.href = "detox_schedule2.php?id=<?=$dtx_id_detox?>&per_name="+x+"&date="+z+"&tid="+t_id+"&ppl=<?=$no_ppl?>&dtx=<?=$no_dtx?>";
	} //ends if2
	if(x=="C" && z!="") {
	window.location.href = "detox_schedule2.php?id=<?=$dtx_id_detox?>&per_name="+x+"&date="+z+"&tid="+t_id+"&ppl=<?=$no_ppl?>&dtx=<?=$no_dtx?>";
	} //ends if2

//alert ('value of checked button is '+chkvalue);
}

//return true;

	/*for (j=0; j<=elem.length; j++) { 
	if(elem[j].checked == false){  

	}else if(elem[j].checked == true){  
	}
	}*/ //ends for
	}
	} //ends function
	
	</script>
</section>
</form>
<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>