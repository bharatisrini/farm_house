<?php 
include('database/db_connect.php');
error_reporting(0);
session_start();
$cu_id = $_SESSION['customer_id'];
$ip = $_SERVER["REMOTE_ADDR"];

$o_id = intval($_GET['oid']);

//$oid = $_REQUEST['order'];
echo $o_id;
$sql = "select * from farmhouse_order where order_id = '$o_id' and product_type = 'Detox-A'";
  $res_add = mysqli_query($conn,$sql);
$row_add = mysqli_fetch_assoc($res_add);
$day_detox = $row_add['ordered_day_beauty'];

$fdate = substr($row_add['date_added'],0,10);
echo "First date " . $fdate; 
echo "<br>";
//$timestamp = strtotime('2009-10-22');

$day = date('D', $fdate);
 echo $day;
 echo "<br>";
	  
 

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
    
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>
    
    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src="js/jquery.sumoselect.min.js"></script>
		
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
 
</head>


<body class="adresses" onLoad="myFunction()">

<form action="#" id="forms1" method="post">

<input name="noofpeople" id="noofpeople" type="hidden" value="<?=$ppl_detox?>" ><input name="custId" id="custId" type="hidden" value="<?=$cu_id?>"><input name="detoxId" id="detoxId" type="hidden" value="<?=$dtx_id_detox?>"><input name="noDetox" id="noDetox" type="hidden" value="<?=$no_dtx?>"><input name="TransId" id="TransId" type="hidden"  value="<?=$transId?>">
<span id="datError"></span>
<section class="back-button fixed-top group">
	<div class="wrapper group">

    	<a href="add_to_cart.php?back_id2=<?=$transId?>&id=<?=$dtx_id_detox?>&ppl=<?=$no_ppl?>&dtx=<?=$no_dtx?>">BACK</a>
    </div>
</section>


<section class="plan">
	<div class="wrapper">
    	<aside class="title group">Re-Schedule:</aside>
        <div class="clear"></div>
        
        <div class="pick-plan group">
        	
            <p>Drag and drop the icon to your schedule:</p>
        	<div class="row-top group">
			
			
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
	
			<div class="row-top group">
            	<div class="col-1">&nbsp;</div>
				<?php 
$sql = "select * from farmhouse_delivery_schedule where order_id = '$o_id' order by trans_id";
  $res_add = mysqli_query($conn,$sql);
   while($row_add = mysqli_fetch_array($res_add)){
   $loc = $row_add['location'];

				//echo $stat_hide;
				for ($k = 1; $k <=$loc; $k++){
				
				//if(($k+$m)==8){
				?>
				
                <div class="col-<?=($k)?>" id="<?=($k)-1?>"></div>
         <?php } } ?>       
            </div> 
			 
		<?php   
				?>
	<div class="row group" ondrop="drop(event)" ondragover="allowDrop(event)">
            	<div class="col-1"><input type="radio" name="iCheck<?=$n?>" id="iCheck1" value="A"><span>A</span></div>
				<?php 
$sql = "select * from farmhouse_delivery_schedule where order_id = '$o_id'";
  $res_add = mysqli_query($conn,$sql);
   while($row_add = mysqli_fetch_array($res_add)){
   $loc = $row_add['location'];
   echo " Location "; echo $loc;
 //  echo "the Location is "; echo $loc; echo "<br>";
  
				$imgDefault="";
				for($i = 2; $i<=$loc; $i++) { 
				if($select_box==''){ if($i==2) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>"; } else { $classimg="col-".$i; $imgDefault="";} }elseif($select_box=='A'){  if($i==2 || $i==5 || $i==7) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>";   } else { $classimg="col-".$i; $imgDefault="";} }elseif($select_box=='B'){
				if($i==2 || $i==4 || $i==6) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>"; } else { $classimg="col-".$i; $imgDefault=""; }
				}elseif($select_box=='C'){ if($i==2 || $i==6 || $i==8) { $classimg="col-".$i." can-chedule"; $imgDefault="<img src='address_icons/1.png' id='df".(($i+$m)-1)."'>"; } else { $classimg="col-".$i; $imgDefault="";}
				}
}	
	?>
				
                <div class="<?=$classimg?>" id="c<?=($i+$m)-1?>" style="color: #000000; font-size:xx-medium;" name=""><?=$imgDefault?><input name="sdate[]" id="sdate<?=($i+$m)-1?>" type="hidden" size="8"> <input name="saddr[]" id="saddr<?=($i+$m)-1?>" value='<?=$custAddressId?>' type="hidden" size="8"></div>
				<?php } ?>
			</div>
			
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