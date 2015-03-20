<?php 
include('database/db_connect.php');
error_reporting(0);
session_start();
$cu_id = $_SESSION['customer_id'];
$ip = $_SERVER["REMOTE_ADDR"];

$no_ppl = $_GET['ppl'];
$no_dtx = $_GET['dtx'];
$dtx_detox = $_GET['dtx'];
$dtx_id_detox = $_GET['id'];
$ppl_detox = $_GET['ppl'];
$transId = $_GET['tid'];
$no_ppl  = $ppl_detox; 
$no_dtx = $dtx_detox;
//echo "Pwoplw " ; echo $no_ppl; echo "<br>";
//echo $no_dtx;
$dt = $_GET['date'];
$select_box=$_GET['per_name'];
				$sbox = $_GET['dtx'];
		$r = $dtx_detox;
		$wds = 7;
		$cals = (int)($r/$wds);
$sno=$cals+1;

?>

<?php 


if(isset($_POST['submit'])) {

/*echo "Customer Id "; echo $cu_id; echo "<br>";
$dtx_name = "Detox-".$_GET['per_name'];//A
  
echo "detox name "; echo $dtx_name; echo "<br>";
  $delvy_dates = $_GET['a1'].",".$_GET['a2'].",".$_GET['a3'];
             
  $a_addwed = $_POST['a_addwed'];
  $a_addfri = $_POST['a_addfri'];
  $a_addsun = $_POST['a_addsun'];
  $fn_adder = $a_addwed."/".$a_addfri."/".$a_addsun; echo " Addressess "; echo $fn_adder."<br>";
  $a_sun = $_POST['a_sun'];
  $a_fri = $_POST['a_fri'];
  $a_wed = $_POST['a_wed'];
  $tot_dates = $a_wed.",".$a_fri.",".$a_sun; echo " Dates "; echo $tot_dates; echo "<br>";
  $order_date = $_GET['date']; echo " order Dates ";  echo $order_date; echo "<br>";
  
  $sql_int = "update farmhouse_temp_schedule_detox set
	ordered_date='$order_date', delivery_dates = '$tot_dates', delivery_address = '$fn_adder' 
	where customer_id= '$cu_id' and detox_name = '$dtx_name'";
  $res_int  = mysqli_query($conn,$sql_int);
  if($res_int)
  header("Location:index.php");
  else
   die("error in update".mysqli_error($conn));*/
}

$sql_getCustAddress = "select * from farmhouse_customer_address where customer_id = '$cu_id' order by address_id Asc ";
//echo $sql_getCustAddress;
 $res_getCustAddress = mysqli_query($conn,$sql_getCustAddress);
 $row_getCustAddress = mysqli_fetch_array($res_getCustAddress);
  $custAddressId = $row_getCustAddress['address_id'];


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
    <link rel="stylesheet" href="js/jquery-ui.css">
    <script src="js/jquery-ui.js"></script>
    
    <script>
    	$(function() {
			$('.single-adress-tooltip').tooltip();
			var currentDateSelect="<?=$dt?>"; 
			val=currentDateSelect;
			Myfun(val);
var day_nos=<?=$dtx_detox?>;
	var select_box="<?=$select_box?>"; 
			
var startHide;
var closeHide;
var startMildHide;
var closeMildHide;

if(select_box=='A'){
if(day_nos==1 || day_nos==2 || day_nos==3){
startMildHide=1;
startHide=day_nos+1;
closeHide=7;
}else if(day_nos==4 || day_nos==5){
startMildHide=1
closeMildHide=7;
startHide=day_nos+1;
closeHide=14;
}else if(day_nos==6 || day_nos==7 || day_nos==8 || day_nos==9){
startMildHide=1
startHide=day_nos;
closeMildHide=7;
closeHide=14;
}else if(day_nos==10 || day_nos==11 || day_nos==12 || day_nos==13 || day_nos==14){
startMildHide=1
closeMildHide=14;
startHide=day_nos-1;
closeHide=14;
}else if(day_nos==15 || day_nos==16 || day_nos==17 || day_nos==18){
startMildHide=1
closeMildHide=14;
startHide=day_nos-2;
closeHide=14;
}else if(day_nos==19 || day_nos==20){
startMildHide=1
closeMildHide=21;
startHide=day_nos-2;
closeHide=21;
}else if(day_nos==21 || day_nos==22 || day_nos==23){
startMildHide=1
closeMildHide=21;
startHide=day_nos-3;
closeHide=21;
}else if(day_nos==24 || day_nos==25 || day_nos==26 || day_nos==27){
startMildHide=1
closeMildHide=21;
startHide=day_nos-4;
closeHide=21;
}else if(day_nos== 28 || day_nos== 29 || day_nos==30 || day_nos==31 || day_nos==32 || day_nos==33 || day_nos==34 || day_nos==35  || day_nos==36  ){
startMildHide=1
closeMildHide=28;
startHide=day_nos-5;
closeHide=28;
}else if(day_nos==37 || day_nos== 38 || day_nos== 39 || day_nos==40 || day_nos==41 || day_nos==42 || day_nos==43 || day_nos==44 || day_nos==45){
startMildHide=1
closeMildHide=35;
startHide=day_nos-7;
closeHide=35;
}else if(day_nos==46 || day_nos== 47 || day_nos== 48 || day_nos==49 || day_nos==50){
startMildHide=1
closeMildHide=42;
startHide=day_nos-9;
closeHide=42;
}else if(day_nos==51 || day_nos== 52 || day_nos== 53 || day_nos==54){
startMildHide=1
closeMildHide=42;
startHide=day_nos-10;
closeHide=42;
}else if(day_nos==55 || day_nos== 56 || day_nos== 57 || day_nos==58 || day_nos==59){
startMildHide=1
closeMildHide=49;
startHide=day_nos-11;
closeHide=49;
}else if(day_nos==60 || day_nos== 61 || day_nos== 62 || day_nos==63 ){
startMildHide=1
closeMildHide=49;
startHide=day_nos-12;
closeHide=49;
} 
}else if(select_box=='B'){
if(day_nos==1 || day_nos==2 || day_nos==3){
startMildHide=1
closeMildHide=7;
startHide=day_nos+1;
closeHide=7;
}else if(day_nos==4 || day_nos==5){
startMildHide=1
closeMildHide=7;
startHide=day_nos;
closeHide=14;
}else if(day_nos==6 || day_nos==7 || day_nos==8 || day_nos==9){
startMildHide=1
closeMildHide=14;
startHide=day_nos-1;
closeHide=14;
}else if(day_nos==10 || day_nos==11 || day_nos==12 || day_nos==13 || day_nos==14){
startMildHide=1
closeMildHide=14;
startHide=day_nos-1;
closeHide=14;
}else if(day_nos==15 || day_nos==16 || day_nos==17 || day_nos==18){
startMildHide=1
closeMildHide=14;
startHide=day_nos-3;
closeHide=14;
}else if(day_nos==19 || day_nos==20){
startMildHide=1
closeMildHide=21;
startHide=day_nos-3;
closeHide=21;
}else if(day_nos==21 || day_nos==22 || day_nos==23){
startMildHide=1
closeMildHide=21;
startHide=day_nos-4;
closeHide=21;
}else if(day_nos==24 || day_nos==25 || day_nos==26 || day_nos==27){
startMildHide=1
closeMildHide=21;
startHide=day_nos-5;
closeHide=21;
}else if(day_nos== 28 || day_nos== 29){
startMildHide=1
closeMildHide=28
startHide=day_nos-5;
closeHide=28;
}else if( day_nos==30 || day_nos==31 || day_nos==32 || day_nos==33 || day_nos==34 || day_nos==35  || day_nos==36  ){
startMildHide=1
closeMildHide=28;
startHide=day_nos-7;
closeHide=28;
}else if(day_nos==37 || day_nos== 38){
startMildHide=1
closeMildHide=35;
startHide=day_nos-7;
closeHide=35;
}else if(day_nos== 39 || day_nos==40 || day_nos==41){
startMildHide=1
closeMildHide=35;
startHide=day_nos-8;
closeHide=35;
}else if(day_nos==42 || day_nos==43 || day_nos==44 || day_nos==45){
startMildHide=1
closeMildHide=35;
startHide=day_nos-9;
closeHide=35;
}else if(day_nos==46 || day_nos== 47){
startMildHide=1
closeMildHide=42;
startHide=day_nos-9;
closeHide=42;
}else if(day_nos== 48 || day_nos==49 || day_nos==50){
startMildHide=1
closeMildHide=42;
startHide=day_nos-10;
closeHide=42;
}else if(day_nos==51 || day_nos== 52 || day_nos== 53 || day_nos==54){
startMildHide=1
closeMildHide=42;
startHide=day_nos-11;
closeHide=42;
}else if(day_nos==55 || day_nos== 56){
startMildHide=1
closeMildHide=49;
startHide=day_nos-11;
closeHide=49;
}else if(day_nos== 57 || day_nos==58 || day_nos==59){
startMildHide=1
closeMildHide=49;
startHide=day_nos-12;
closeHide=49;
}else if(day_nos==60 || day_nos== 61 || day_nos== 62 || day_nos==63 ){
startMildHide=1
closeMildHide=49;
startHide=day_nos-13;
closeHide=49;
}
}else if(select_box=='C'){
if(day_nos==1 || day_nos==2 || day_nos==3){
startMildHide=1
closeMildHide=7;
startHide=day_nos+1;
closeHide=7;
}else if(day_nos==4 || day_nos==5){
startMildHide=1
closeMildHide=7;
startHide=day_nos+2;
closeHide=14;
}else if(day_nos==6 || day_nos==7 || day_nos==8 || day_nos==9){
startMildHide=1
closeMildHide=14;
startHide=day_nos+1;
closeHide=14;
}else if(day_nos==10 || day_nos==11 || day_nos==12){
startMildHide=1
closeMildHide=14;
startHide=day_nos-1;
closeHide=14;
}else if(day_nos==13 || day_nos==14){
startMildHide=1
closeMildHide=14;
startHide=day_nos;
closeHide=14;
}else if(day_nos==15 || day_nos==16 || day_nos==17 || day_nos==18){
startMildHide=1
closeMildHide=14;
startHide=day_nos-1;
closeHide=14;
}else if(day_nos==19 || day_nos==20 || day_nos==21){
startMildHide=1
closeMildHide=21;
startHide=day_nos-2;
closeHide=21;
}else if(day_nos==22 || day_nos==23){
startMildHide=1
closeMildHide=21;
startHide=day_nos-2;
closeHide=21;
}else if(day_nos==24 || day_nos==25 || day_nos==26 || day_nos==27){
startMildHide=1
closeMildHide=21;
startHide=day_nos-3;
closeHide=21;
}else if(day_nos== 28 || day_nos== 29 || day_nos==30){
startMildHide=1
closeMildHide=28;
startHide=day_nos-5;
closeHide=28;
}else if(day_nos==31 || day_nos==32){
startMildHide=1
closeMildHide=28;
startHide=day_nos-4;
closeHide=28;
}else if(day_nos==33){
startMildHide=1
closeMildHide=28;
startHide=day_nos-6;
closeHide=28;
}else if(day_nos==34 || day_nos==35  || day_nos==36  ){
startMildHide=1
closeMildHide=28;
startHide=day_nos-5;
closeHide=28;
}else if(day_nos==37 || day_nos== 38 || day_nos== 39 ){
startMildHide=1
closeMildHide=35;
startHide=day_nos-7;
closeHide=35;
}else if(day_nos==40 || day_nos==41){
startMildHide=1
closeMildHide=35;
startHide=day_nos-6;
closeHide=35;
}else if(day_nos==42 || day_nos==43 || day_nos==44 || day_nos==45){
startMildHide=1
closeMildHide=35;
startHide=day_nos-7;
closeHide=35;
}else if(day_nos==46 || day_nos== 47 || day_nos== 48 || day_nos==49 || day_nos==50){
startMildHide=1
closeMildHide=42;
startHide=day_nos-9;
closeHide=42;
}else if(day_nos==51 || day_nos== 52 || day_nos== 53 || day_nos==54){
startMildHide=1
closeMildHide=42;
startHide=day_nos-10;
closeHide=42;
}else if(day_nos==55 || day_nos== 56 || day_nos== 57 || day_nos==58 || day_nos==59){
startMildHide=1
closeMildHide=49;
startHide=day_nos-11;
closeHide=49;
}else if(day_nos==60){
startMildHide=1
closeMildHide=49;
startHide=day_nos-12;
closeHide=49;
}else if(day_nos== 61 || day_nos== 62 || day_nos==63 ){
startMildHide=1
closeMildHide=49;
startHide=day_nos-11;
closeHide=49;

} 
}

	for(i=startHide;i<=closeHide; i++){
	
			$("#c"+i).removeClass("col-"+i+" can-chedule").addClass( "col-"+i);
			$("#df"+i).hide();
						$("#sdate"+i).remove();
						$("#saddr"+i).remove();
			}
			
			for(j=startMildHide;j<=closeMildHide; j++){
			if(select_box=='A'){
			if(j==2 || j==3 || j==5 || j==7 || j==9 || j==10  || j==12  || j==14 || j==16 || j==17 || j==19 || j==21 || j==23 || j==24 || j==26 || j==28 || j==30 || j==31 || j==33|| j==35 || j==37 || j==38 || j==40 || j==42){
						$("#sdate"+j).remove();
						$("#saddr"+j).remove();
			
			}
			}else if(select_box=='B'){ 
						if(j==2 || j==4 || j==6 || j==7 || j==9 || j==11  || j==13  || j==14 || j==16 || j==18 || j==20 || j==21 || j==23 || j==25 || j==27 || j==28 || j==30 || j==32 || j==34 || j==35 || j==37 || j==39 || j==41){
						$("#sdate"+j).remove();
						$("#saddr"+j).remove();
			
			}
			}else if(select_box=='C'){ 
						if(j==2 || j==3 || j==4 || j==6 || j==9 || j==10 || j==11  || j==13  || j==16 || j==17 || j==18 || j==20 || j==23 || j==24 || j==25 || j==27 || j==30 || j==31 || j==32 || j==34 || j==37 || j==38 || j==39 || j==41){
						$("#sdate"+j).remove();
						$("#saddr"+j).remove();
			
			}

			}
			}

$('#submitData').click(function(e){ 
//alert("click");
var dataPass;
dataPass=$("#forms1").serialize();
//tempDeliveryMoreData
//alert(dataPass);
url="tempDeliveryMoreData.php"
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							// alert(html);	
						$("#datError").html(html).show();
					}
			});

});			
			
			
		  });
    </script>
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>
    
    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src="js/jquery.sumoselect.min.js"></script>
    
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>    
	<script>
			
		function Myfun(val) {
							//alert(val);
//var v = val; rma;
		var days = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
		var d = new Date(val);
		
	/*	var c2 = new Date();
		c2.setDate(d.getDate());
		var n2 = c2.toLocaleDateString();
		var d2 = c2.getDay();
		document.getElementById("2").innerHTML = n2+"<br>"+days[d2];*/
		if(val!=""){

<?php 
$day_no=$dtx_detox;
	$dayno=$dtx_detox;

if($day_no<=9){
$day_no=7;
}if($day_no==10 || $day_no==11 || $day_no==12 || $day_no==13 || $day_no==14 || $day_no==15 || $day_no==16 || $day_no==17 || $day_no==18){
$day_no=14;
}if($day_no==19 || $day_no==20 || $day_no==21 || $day_no==22 || $day_no==23 || $day_no==24 || $day_no==25 || $day_no==26 || $day_no==27){
$day_no=21;
}if($day_no==28 || $day_no==29 || $day_no==30 || $day_no==31 || $day_no==32 || $day_no==33 || $day_no==34 || $day_no==35 || $day_no==36){
$day_no=28;
}if($day_no==37 || $day_no==38 || $day_no==39 || $day_no==40 || $day_no==41 || $day_no==42 || $day_no==43 || $day_no==44 || $day_no==45){
$day_no=35;
}if($day_no==46 || $day_no==47 || $day_no==48 || $day_no==49 || $day_no==50 || $day_no==51 || $day_no==52 || $day_no==53 || $day_no==54){
$day_no=42;
}if($day_no==55 || $day_no==56 || $day_no==57 || $day_no==58 || $day_no==59 || $day_no==60 || $day_no==61 || $day_no==62 || $day_no==63){
$day_no=49;
}if($day_no==64 || $day_no==65 || $day_no==66 || $day_no==67 || $day_no==68 || $day_no==69 || $day_no==70 || $day_no==71 || $day_no==72){
$day_no=56;
}if($day_no==73 || $day_no==74 || $day_no==75 || $day_no==76 || $day_no==77 || $day_no==78 || $day_no==79 || $day_no==80 || $day_no==81){
$day_no=63;
}if($day_no==82 || $day_no==83 || $day_no==84 || $day_no==85 || $day_no==86 || $day_no==87 || $day_no==88 || $day_no==89 || $day_no==90){
$day_no=70;
}if($day_no==91 || $day_no==92 || $day_no==93 || $day_no==94 || $day_no==95 || $day_no==96 || $day_no==97 || $day_no==98 || $day_no==99){
$day_no=77;
}if($day_no==100 || $day_no==101 || $day_no==102 || $day_no==103 || $day_no==104 || $day_no==105 || $day_no==106 || $day_no==107 || $day_no==108){
$day_no=84;

}



	for($p=1; $p<=$day_no; $p++){
	
	?>
	var cf=<?=$p?>;
	//alert(cf);
		var c<?=$p?>= new Date()
		c<?=$p?>.setDate(d.getDate()+<?=$p-1?>);
		var n<?=$p?>= c<?=$p?>.toLocaleDateString();
		var ch_dd<?=$p?> = c<?=$p?>.getDate();
	if(ch_dd<?=$p?><=9){
	ch_dd<?=$p?>="0"+ch_dd<?=$p?>;
	}
    var ch_mm<?=$p?> = c<?=$p?>.getMonth()+1; //January is 0!
	if(ch_mm<?=$p?><=9){
	ch_mm<?=$p?>="0"+ch_mm<?=$p?>;
	}
    var ch_yy<?=$p?> = c<?=$p?>.getFullYear();
		var change_Date<?=$p?>=ch_yy<?=$p?>+"-"+ch_mm<?=$p?>+"-"+ch_dd<?=$p?>;

		var d<?=$p?> = c<?=$p?>.getDay();
		
	//alert(n<?=$p?>+"<br>"+days[d<?=$p?>]);
		//document.getElementById("<?//=$p?>").innerHTML = n<?//=$p?>+"<br>"+days[d<?//=$p?>];
		document.getElementById("<?=$p?>").innerHTML = change_Date<?=$p?>+"<br>"+days[d<?=$p?>];
		document.getElementById("sdate<?=$p?>").value =change_Date<?=$p?>;
	
<?php
}				
?>	
	

		}
		 }
			
		</script>
 <script language="javascript">
 
                  function funadrssave(id) { <!--for saving last address-->
		  		     var xmlhttp; 
			         var add_no = id; //alert(add_no);
					 var adrs   = document.getElementById("adrs").value; //alert(adrs);
					 var district  = document.getElementById("district").value;
					 if(district==""){
					 alert("Please select District");
					 document.getElementById("district").focus;
					 return false;
					 } //alert(district);
					 var city  = document.getElementById("city").value; //alert(city);
					if(city==""){
					 alert("Please select City");
					 document.getElementById("city").focus;
					 return false;
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
						 if(xmlhttp.responseText == "") {
						 window.location.href="detox_schedule2.php"; 
						 }
						}
					  }
					xmlhttp.open("GET","add_to_cart.php?msg=save_addd&add_no="+add_no+"&adrs="+adrs+"&district="+district+"&city="+city, true);
					xmlhttp.send();
					} // ends fun -mar
		   
 </script>
 
 <script language="javascript">
 function store_address(dt,adrs,tid) {
 
                     
			         var address1 = adrs; //alert(address1);
					 var date1 = dt;
					 var dtx_name1 = tid; //alert(address1+date1+dtx_name1); 
					
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
						 if(xmlhttp.responseText == "") 
						 {
						 window.location.href="detox_schedule2.php";
						 } 
						}
					  }
					xmlhttp.open("GET","add_to_cart.php?msg=store_adres&address="+address1+"&date1="+date1+"&tid="+dtx_name1,true);
					xmlhttp.send();  
			} // ends fun -mar        			
  
 </script>
    
    
    
</head>


<body class="adresses" onLoad="myFunction()">

<form action="#" id="forms1" method="post">
<?php include("includes/header.php"); ?>

<input name="noofpeople" id="noofpeople" type="hidden" value="<?=$ppl_detox?>" ><input name="custId" id="custId" type="hidden" value="<?=$cu_id?>"><input name="detoxId" id="detoxId" type="hidden" value="<?=$dtx_id_detox?>"><input name="noDetox" id="noDetox" type="hidden" value="<?=$no_dtx?>"><input name="TransId" id="TransId" type="hidden"  value="<?=$transId?>">
<span id="datError"></span>
<section class="back-button fixed-top group">
	<div class="wrapper group">

    	<a href="add_to_cart.php?back_id2=<?=$transId?>&id=<?=$dtx_id_detox?>&ppl=<?=$no_ppl?>&dtx=<?=$no_dtx?>">BACK</a>
    </div>
</section>


<section class="plan">
	<div class="wrapper">
    	<aside class="pick-plan group">Schedule: Delivery Start From <?=$_REQUEST["date"]?>, <?=date("D", strtotime($_REQUEST["date"]))?> </aside>
        <div class="clear"></div>
        
        <div class="pick-plan group">
        	<p>Always send to the same address every time? <span class="radio-same-address"><input type="radio" name="always" checked > Yes&nbsp;&nbsp;&nbsp;<input type="radio" name="always" > No</span></p>
            <p>Drag and drop the icon to your schedule:</p>
        	<div class="row-top group">
			
				<?php 
				$dtx_detox = $_GET['dtx'];
		$j = $dtx_detox;
		$wd = 7;
		$cale = (int)($j/$wd);
$selectBox=$_GET["per_name"];	
		//echo($selectBox);
$stat_hide=8;
if($j<7){
$no = $cale+1;
}else if($j==7 || $j==8 || $j==9){
$no = $cale;
}elseif($j==10 || $j==11 || $j==12 || $j==13){
$no = $cale+1;
}elseif($j==14 || $j==15 || $j==16 || $j==17 || $j==18 || $j==21 || $j==22 || $j==23 || $j==24 || $j==25 || $j==26 || $j==27 || $j==28 || $j==29 || $j==30  || $j==31 || $j==32 || $j==33 || $j==34 || $j==37  || $j==38 || $j==39 || $j==40 || $j==41 || $j==46 || $j==47 || $j==48 || $j==55 ){
$no = $cale;
}elseif($j==35 || $j==36   || $j==42 || $j==43 || $j==44 || $j==45 || $j==49 || $j==50 || $j==51 || $j==52 || $j==53 || $j==54  || $j==56 || $j==57 || $j==58 || $j==59 || $j==60 || $j==61 || $j==62  || $j==64 || $j==65 || $j==66 || $j==67 || $j==68 || $j==69 || $j==73 || $j==74 || $j==75 || $j==76   || $j==82 || $j==83 ){
$no =$cale-1;
}elseif($j==63 || $j==70 || $j==71 || $j==72 || $j==77 || $j==78 || $j==79 || $j==80 || $j==81 || $j==84 || $j==85 || $j==86 || $j==87 || $j==88 || $j==89 || $j==90 || $j==91 || $j==92 || $j==93 || $j==94 || $j==95 || $j==96 || $j==97  || $j==100 || $j==101 || $j==102 || $j==103 || $j==104){
$no = $cale-2;
}elseif($j==98 ||  $j==99 ||  $j==105 || $j==106 || $j==107 || $j==108){
$no = $cale-3;
}else{
$no = $cale+1;
}
 //echo $no;
		for($n = 1; $n<=$no; $n++) {  
$m=$n-1;
		//echo $n;
		if($n==2){
		$m=7;
		}if($n==3){
		$m=14;
		}if($n==4){
		$m=21;
		}if($n==5){
		$m=28;
		}if($n==6){
		$m=35;
		}if($n==7){
		$m=42;
	    }if($n==8){
		$m=49;
		}if($n==9){
		$m=56;
	}if($n==10){
		$m=63;
	}if($n==11){
		$m=70;
	}if($n==12){
		$m=77;
	}if($n==13){
		$m=84;
	
		}
		?>
			
    <!--     	<div class="row-top group">
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
	
			<div class="row-top group">
            	<div class="col-1">&nbsp;</div>
				<?php 
				//echo $stat_hide;
				for ($k = 2; $k <=$stat_hide; $k++){
				
				//if(($k+$m)==8){
				?>
				
                <div class="col-<?=($k)?>" id="<?=($k+$m)-1?>"></div>
         <?php }//} ?>       
            </div> 
			 
		<?php   
				?>
	<div class="row group" ondrop="drop(event)" ondragover="allowDrop(event)">
            	<div class="col-1"><input type="radio" name="iCheck<?=$n?>" id="iCheck1" value="A"><span>A</span></div>
				<?php 
				$imgDefault="";
				for($i = 2; $i<=$stat_hide; $i++) { 
				if($select_box==''){ if($i==2) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>"; } else { $classimg="col-".$i; $imgDefault="";} }elseif($select_box=='A'){  if($i==2 || $i==5 || $i==7) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>";   } else { $classimg="col-".$i; $imgDefault="";} }elseif($select_box=='B'){
				if($i==2 || $i==4 || $i==6) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>"; } else { $classimg="col-".$i; $imgDefault=""; }
				}elseif($select_box=='C'){ if($i==2 || $i==6 || $i==8) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>"; } else { $classimg="col-".$i; $imgDefault="";}
				}
				?>
				
                <div class="<?=$classimg?>" id="c<?=($i+$m)-1?>" style="color: #000000; font-size:xx-medium;" name=""><?=$imgDefault?><input name="sdate[]" id="sdate<?=($i+$m)-1?>" type="hidden" size="8"> <input name="saddr[]" id="saddr<?=($i+$m)-1?>" value='<?=$custAddressId?>' type="hidden" size="8"></div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<?php //} //if($_GET['per_name']=="B") {?>	
	       
		
		
        <div class="address-list group">
		
		     <?php $sql_addr = "select * from farmhouse_customer_address where customer_id = $cid order by address_id"; $res_addr = mysqli_query($conn,$sql_addr); 
			 while($row_addr = mysqli_fetch_array($res_addr) ) {
			       ?>
        	<figure class="group">
            	<div class="dragit"   draggable="true" ondragstart="drag(event)"><!--<a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2">-->
				<?php $address_icon = "address_icons/". $row_addr['address_id'].".png" ?>
				<img src="<?php echo $address_icon; ?>" id="drag1" draggable="true" ondragstart="drag(event)"/><!--</a>--></div>
				
                <div class="address-no">Address <?php echo $row_addr['address_id'];?>:</div>
                <div class="address-details"><?php echo $row_addr['address'];?>, *** <?php echo $row_addr['address_district'];?>, *** <?php echo $row_addr['address_city'];?></div>
                <div class="address-action"><a href="#">Edit</a></div>
            </figure> <?php } ?>
            
            <!--<figure class="group">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2"><img src="images/icon-pointer.png" /></a></div>
                <div class="address-no">Address 2:</div>
                <div class="address-details">No.***, *** Bilding, *** Street, *** District, *** City</div>
                <div class="address-action"><a href="#">Edit</a></div>
            </figure>
            
            <figure class="group">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2"><img src="images/icon-pointer.png" /></a></div>
                <div class="address-no">Address 3:</div>
                <div class="address-details">No.***, *** Bilding, *** Street, *** District, *** City</div>
                <div class="address-action"><a href="#">Edit</a></div>
            </figure>-->
            <?php $sql_max = "select max(address_id) as maxid from farmhouse_customer_address where customer_id = $cid"; $res_max = mysqli_query($conn,$sql_max); $row_max = mysqli_fetch_array($res_max);?>
            <figure class="group">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2">&nbsp;&nbsp;&nbsp;</a></div>
                <div class="address-no">Address <?php echo $row_max['maxid']+1 ;?>:</div>
				 <div class="address-details">
                	  <textarea name="address" placeholder="No.***, *** Building, *** Street" rows="5" cols="16" id="adrs"></textarea>
                    District:<select class="SletBox" name="district" id="district" style="width: 100px !important; min-width: 100px; max-width: 100px; color:#7f878e;">
					  <option value="">District</option>
					<?php $sql_dst="SELECT * FROM farmhouse_user_district";
				      $res_dst = mysqli_query($conn,$sql_dst); 
				      while($row_dst=mysqli_fetch_assoc($res_dst)){?>
                            <option value="<?=$row_dst["district"]?>"><?=$row_dst["district"]?></option>
                          <?php }?>
                        </select>, City:<select class="SletBox" name="city" id="city" style="width: 100px !important; min-width: 100px; max-width: 100px; color:#7f878e;">
						<option value="">City</option>
                    <?PHP $sql_city="SELECT * FROM farmhouse_user_city";
				      $res_city = mysqli_query($conn,$sql_city); 
				      while($row_city=mysqli_fetch_assoc($res_city)){?>
                            <option value="<?=$row_city["city_name"]?>"><?=$row_city["city_name"]?></option>
                          <?php }?>
                        </select>
						</div>
					<div class="address-action">
                 <button onClick="funadrssave(<?php echo $row_max['maxid']+1 ;?>)" >&nbsp;&nbsp;Save&nbsp;&nbsp;</button></div>
       </div>
<section class="center-link group">
	<div class="wrapper group">
	    <!--<input type="submit" value="Add Into" name="submit"> -->
    	<a href="card1.php" class="add-card" id="submitData">Add Into</a>
    </div>
</section>

</section>

</form>
<?php include("includes/footer.php"); ?>


<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>