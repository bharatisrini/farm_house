﻿<?php 
include('database/db_connect.php');
error_reporting(0);
session_start();
$cu_id = $_SESSION['customer_id'];
$ip = $_SERVER["REMOTE_ADDR"];

$no_ppl = $_GET['ppl'];
$no_dtx = $_GET['dtx'];
$dtx_detox = $_GET['dtx'];
echo "Pwoplw " ; echo $no_ppl; echo "<br>";
echo $no_dtx;
$dt = $_GET['date'];
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    
    <script>
    	$(function() {
			$('.single-adress-tooltip').tooltip();
			var currentDateSelect=<?=$dt?>; 
			val=currentDateSelect;
			Myfun(val);
		  });
    </script>
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>
    
    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src="js/jquery.sumoselect.min.js"></script>
    
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
 
 		<script>
			
		function Myfun(val) {
			

if(val==""){
	val=dt;
}
				alert(val);
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

	for($i=1; $i<=$day_no; $i++){
	
	?>
		var c<?=$i?>= new Date()
		c<?=$i?>.setDate(d.getDate()+<?=$i-1?>);
		var n<?=$i?>= c<?=$i?>.toLocaleDateString();
		var d<?=$i?> = c<?=$i?>.getDay();
		//alert(n<?//=$i?>+"<br>"+days[d<?//=$i?>]);
		document.getElementById("<?=$i?>").innerHTML = n<?=$i?>+"<br>"+days[d<?=$i?>];
		
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
					 var district  = document.getElementById("district").value; //alert(district);
					 var city  = document.getElementById("city").value; //alert(city);
					
									  			
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

<form action="#" method="post">
<?php include("includes/header.php"); ?>

<section class="back-button fixed-top group">
	<div class="wrapper group">
    	<a href="add_to_cart.php?back_id2=<?php echo $_GET['tid'];?>">BACK</a>
    </div>
</section>


<section class="plan">
	<div class="wrapper">
    	<aside class="title group">Schedule:</aside>
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
				$no = $cale+1;

		for($j = 1; $j<=$no; $j++) {  

$m=$j-1;
		//echo $j;
		if($j==2){
		$m=7;
		}if($j==3){
		$m=14;
		}if($j==4){
		$m=21;
		}if($j==5){
		$m=21;
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
					for ($k = 2; $k <=8; $k++){
				
				?>
				
                <div class="col-<?=($k)?>" id="<?=($k+$m)-1?>"></div>
         <?php } ?>       
            </div> 
			 
		<?php  if($_GET['per_name']=="A") { 
				?>
	<div class="row group">
            	<div class="col-1"><input type="radio" name="iCheck<?=$j?>" checked  id="iCheck1" value="A"><span>A</span></div>
				<?php 
						$j = $dtx_detox;
				$wd = 7;
				$cale = (int)($j/$wd);
				$no = $wd + $cale+1;
				for($i = 2; $i<=8; $i++) { ?>
				
                <div class="<?php if($i==2 || $i==5 || $i==7) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i;?>" style="color: #000000; font-size:xx-medium;"> </div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<?php } if($_GET['per_name']=="B") {?>	
			<div class="row group">
            	<div class="col-1"><input type="radio" name="iCheck<?=$j?>" value="B" id="iCheck2"><span>B</span></div>
				<?php for($i = 2; $i<=8; $i++) { ?>
                <div class="<?php if($i==2 || $i==4 || $i==6) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i.$i; ?>" style="color:#000000;font-size:xx-medium;"> </div> <?php } ?>
            </div>
			<?php } ?>
			
           
			<?php  if($_GET['per_name']=="C") {?>
            <div class="row group">
            	<div class="col-1"><input type="radio" name="iCheck<?=$j?>" value="C" id="iCheck3"><span>C</span></div>
				<?php for($i = 2; $i<=8; $i++) { ?>
                <div class="<?php if($i==2 || $i==6 || $i==8) { echo "col-".$i." can-chedule"; } else { echo "col-".$i; } ?>" id="<?php echo "col-".$i.$i.$i;?>" style="color:#000000;font-size:xx-medium;"> </div> <?php } ?>
            </div>
        <?php } ?>	     
           
		
		
        <div class="address-list group">
		
		     <?php $sql_addr = "select * from farmhouse_customer_address where customer_id = $cid order by address_id"; $res_addr = mysqli_query($conn,$sql_addr); 
			 while($row_addr = mysqli_fetch_array($res_addr) ) {
			       ?>
        	<figure class="group">
            	<div class="dragit"><!--<a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2">-->
				<img src="images/icon-pointer.png" id="drag1" draggable="true" ondragstart="drag(event)"/><!--</a>--></div>
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
            <figure class="group add-new-address">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2"><img src="images/icon-pointer.png" /></a></div>
                <div class="address-no">Address <?php echo $row_max['maxid']+1 ;?>:</div>
                <div class="address-details">
                	<div class="add-address">
                    	<textarea name="address" placeholder="No.***, *** Building, *** Street" rows="5" id="adrs"></textarea>
                    </div>
                    <div class="add-address-dc">
                    	<p><select class="SlectBox" name="district" id="district">
                            <option value="Huangpu">Huangpu</option>
                            <option value="Huangpu">Huangpu</option>
                        </select></p>
                        <p class="text">District,</p>
                        <p><select class="SlectBox" name="city" id="city">
                            <option value="ShanghaiShanghai">Shanghai</option>
                            <option value="Shanghai">Shanghai</option>
                        </select></p>
                        <p class="text">City</p>
                    </div>
                </div>
                <div class="address-action"><button onClick="funadrssave(<?php echo $row_max['maxid']+1 ;?>)" >Save</button></div>
            </figure>
        
        </div>
        
        
    </div>
</section>

<section class="center-link gray group">
	<div class="wrapper group">
    	<a href="#">Add More Address</a>
    </div>
</section>

<section class="center-link group">
	<div class="wrapper group">
	    <!--<input type="submit" value="Add Into" name="submit"> -->
    	<a href="card1.php" class="add-card">Add Into</a>
    </div>
</section>
</form>
<?php include("includes/footer.php"); ?>


<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>