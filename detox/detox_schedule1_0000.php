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
$no_ppl  = $ppl_detox; 
$no_dtx = $dtx_detox;
?>
<?php 
 if($_POST['next']=='NEXT') {
	 echo " Getting Here ";
 $dx_id = $_POST['dtx_id']; //echo $dx_id;
 $no_dtx = $_POST['no_dtx']; //echo $no_dtx;
 $no_ppl = $_POST['no_ppl']; //echo $no_ppl;
 $check = $_POST['iCheck1'];
 $detox_package_price = $_REQUEST['detox_A_tot'];
 $detox_total = $no_dtx * $no_ppl;
 $detox_total_price = $detox_package_price * $detox_total;
 $ordr_date = $_POST['dat'];
 
 echo "dx_id "; echo $_POST['dtx_id']; 
 echo "detox_package_price ". $detox_package_price.  "<br>";
 echo "No detox ". $no_dtx; echo "<br>";
 echo "No people ". $no_ppl;  echo "<br>";
 echo "Detox Total ". $detox_total;  echo "<br><hr>";
 
	echo "order date " . $ordr_date."<br>"; //1st person
	$p1_date1 = $ordr_date;
	echo "p1_date1 " . $p1_date1;
	
	$ordr_date = strtotime($ordr_date);
	$p1_date2 = strtotime("+2 day", $ordr_date);
	$p1_date2 = date('Y-m-d', $p1_date2);
	 
	echo "p1_date2 " .  $p1_date2."<br>";
	$p1_date3 = strtotime($p1_date2);
	$p1_date3 = strtotime("+2 day", $p1_date3);
	$p1_date3 = date('Y-m-d', $p1_date3);
	echo "p1_date3 " . $p1_date3."<br>";
	
	 //2nd person
    $p2_date1 = strtotime($p1_date1);
	$p2_date1 = strtotime("+1 day", $p2_date1);
	$p2_date1 = date('Y-m-d', $p2_date1);
	echo "p2_date1 " . $p2_date1."<br>";
	
	$p2_date2 = strtotime($p2_date1);
	$p2_date2 = strtotime("+2 day", $p2_date2);
	$p2_date2 = date('Y-m-d', $p2_date2);
	
	echo "p2_date2 " .  $p2_date2."<br>";
		
	$p2_date3 = strtotime($p2_date2);
	$p2_date3 = strtotime("+2 day", $p2_date3);
	$p2_date3 = date('Y-m-d', $p2_date3);
	echo "p2_date3 " . $p2_date3."<br>";
	
	//3rd person
    $p3_date1 = strtotime($p2_date1);
	$p3_date1 = strtotime("+1 day", $p3_date1);
	$p3_date1 = date('Y-m-d', $p3_date1);
	echo "p3_date1 " . $p3_date1."<br>";
	
	$p3_date2 = strtotime($p3_date1);
	$p3_date2 = strtotime("+2 day", $p3_date2);
	$p3_date2 = date('Y-m-d', $p3_date2);
	
	echo "p3_date2 " .  $p3_date2."<br>";
	
	$p3_date3 = strtotime($p3_date2);
	$p3_date3 = strtotime("+2 day", $p3_date3);
	$p3_date3 = date('Y-m-d', $p3_date3);
	echo "p3_date3 " . $p3_date3."<br>";
	echo "<br>";
	echo "<hr>";
	//exit;
 
  //echo $check; //exit;
 $sql_getval = "select * from farmhouse_detox_program where detox_id = '$dx_id' ";
 $res_getval = mysqli_query($conn,$sql_getval);
 $row_getval = mysqli_fetch_array($res_getval); $dtx_name = $row_getval['detox_name']; $dtx_price=$row_getval['detox_price']; $date=date("Y-m-d h:i:sa");
 
//for($i=1; $i<=$no_dtx; $i++) {
for ($n =1; $n<=$detox_total; $n++){
 echo "Haai ". $n;
}
	  exit;
	  
 $sql_dtx_tmp = "insert into farmhouse_temp_schedule_detox (detox_id,detox_name,detox_price,no_people,no_days_detox,ip,customer_id,ordered_date) 
 values ('$dx_id','$dtx_name','$dtx_price','$no_ppl','$no_dtx','$ip','$cu_id','$date')";
 $res_dtx_tmp = mysqli_query($conn,$sql_dtx_tmp);
 if(!$res_dtx_tmp)
    die("".mysqli_error($res_dtx_tmp));
}// ends if-ram
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
            <!--<input id="datepicker" type="text" placeholder="Select Date" name="dat">--><input id="datepicker" type="text" placeholder="Select Date" onFocus="Myfun(this.value)" name="dat">
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
		
		var c3 = new Date();
		c3.setDate(d.getDate()+1);
		var n3 = c3.toLocaleDateString();
		var d3 = c3.getDay();
				
		var c4 = new Date();
		c4.setDate(d.getDate()+2);
		var n4 = c4.toLocaleDateString();
		var d4 = c4.getDay();
		
		var c5 = new Date();
		c5.setDate(d.getDate()+3);
		var n5 = c5.toLocaleDateString();
		var d5 = c5.getDay();
		
		var c6 = new Date();
		c6.setDate(d.getDate()+4);
		var n6 = c6.toLocaleDateString();
		var d6 = c6.getDay();
		
		var c7 = new Date();
		c7.setDate(d.getDate()+5);
		var n7 = c7.toLocaleDateString();
		var d7 = c7.getDay();
		
		var c8 = new Date();
		c8.setDate(d.getDate()+6);
		var n8 = c8.toLocaleDateString();
		var d8 = c8.getDay();
		
		
		
        document.getElementById("2").innerHTML = n2+"<br>"+days[d2];
		document.getElementById("3").innerHTML = n3+"<br>"+days[d3];
		document.getElementById("4").innerHTML = n4+"<br>"+days[d4];
		document.getElementById("5").innerHTML = n5+"<br>"+days[d5];
		document.getElementById("6").innerHTML = n6+"<br>"+days[d6];
		document.getElementById("7").innerHTML = n7+"<br>"+days[d7];
		document.getElementById("8").innerHTML = n8+"<br>"+days[d8];

		
		
		 }
			
		</script>
		
		<script>
		function changeImage(id,p) {
			//alert("hii");
			 //if(document.getElementById(p).checked == true) {
			 var i; var j=1;
			 //for(i=1; i<=p; i++) {
			 //if( j == p ) {
			 var x = document.getElementById(id).getAttribute("class"); alert(id);
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
		
        	<p>Choose a plan: <?php echo "People "; echo $ppl_detox; echo " Detoxx "; echo $dtx_detox; ?></p>
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
            	<div class="col-1"><input type="radio" name="iCheck1" checked  id="iCheck1" value="A"><span>A</span></div>
				<?php 
				for($i = 2; $i<=8; $i++) { ?>
				
                <div class="<?php if($i==2 || $i==5 || $i==7) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i;?>" style="color: #000000; font-size:xx-medium;"> </div>
				<?php } ?>
			</div>  	
			<div class="row group">
            	<div class="col-1"><input type="radio" name="iCheck1" value="B" id="iCheck2"><span>B</span></div>
				<?php for($i = 2; $i<=8; $i++) { ?>
                <div class="<?php if($i==2 || $i==4 || $i==6) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i.$i; ?>" style="color:#000000;font-size:xx-medium;"> </div> <?php } ?>
            </div>
            
            <div class="row group">
            	<div class="col-1"><input type="radio" name="iCheck1" value="C" id="iCheck3"><span>C</span></div>
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
	<div class="wrapper group"><?php $sql_tid = "select trans_id from farmhouse_temp_schedule_detox where customer_id = '$cid' "; 
	$res_tid = mysqli_query($conn,$sql_tid); $row_tid = mysqli_fetch_array($res_tid);?>
    	<a href="#" onClick="rado(<?php echo $row_tid['trans_id'];?>)">NEXT</a>
    </div>
	
	<script> function rado(tid) { 
	var j; var elem = document.f1.iCheck1; var a1,a2,a3,b1,b2,b3,c;
	var z = document.getElementById("datepicker").value;
	for (j=0; j<=elem.length; j++) { 
	if(elem[j].checked == true)  
	var x = elem[j].value;
	if(x=="A" && z!="") {
	a1 = document.getElementById("col-2").innerHTML;
	a2 = document.getElementById("col-5").innerHTML;
	a3 = document.getElementById("col-7").innerHTML;var t_id = tid ;
	window.location.href = "detox_schedule2.php?per_name="+x+"&date="+z+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&tid="+t_id+"&ppl=<?php echo $no_ppl;?>&dtx=<?php echo $no_dtx;?>";
	

	} //ends if2
	if(x=="B" && z!="") {
	a1 = document.getElementById("col-22").innerHTML;
	a2 = document.getElementById("col-44").innerHTML;
	a3 = document.getElementById("col-66").innerHTML; var t_id = tid ;
	window.location.href = "detox_schedule2.php?per_name="+x+"&date="+z+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&tid="+t_id+"&ppl=<?php echo $no_ppl;?>&dtx=<?php echo $no_dtx;?>";
	} //ends if2
	if(x=="C" && z!="") {
	a1 = document.getElementById("col-222").innerHTML;
	a2 = document.getElementById("col-666").innerHTML;
	a3 = document.getElementById("col-888").innerHTML;var t_id = tid ;
	window.location.href = "detox_schedule2.php?per_name="+x+"&date="+z+"&a1="+a1+"&a2="+a2+"&a3="+a3+"&tid="+t_id+"&ppl=<?php echo $no_ppl;?>&dtx=<?php echo $no_dtx;?>";
	} //ends if2
	
	} //ends for
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