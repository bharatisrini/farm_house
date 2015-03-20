<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
$cid = $_SESSION["customer_id"];
$select_type=$_REQUEST["product"];
$stat=$_REQUEST["stat"];
$tmp_id = $_REQUEST['transid'];
//echo $select_type;
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

    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src="js/jquery.sumoselect.min.js"></script>
    
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
	 
	 
	 <script>
	 function fun_del(qty,id) {
					
					//var qt = qty;
					 var qt = qty; var p_id = id; //alert(id); alert(qty);
					if( (document.getElementById(p_id).value - 1  < 0))
					return;
					else 
					document.getElementById(p_id).value--; 
				   								
					}
					
	function fun_add(qty,id) {
					
					//var pric = price; var trid = tr_id; var tot_amt = tot; var gnd_tot = gd_total; //alert(gnd_tot); 
					//alert(trid);
					//var qt = qty;
					var p_id = id; var qt = qty; //alert(qt);
					document.getElementById(p_id).value++;
		
					}
		function fun_save(id,qty,tr_id) {
		  var p_id = id; var qt = qty; var trid = tr_id; //alert(trid);
		  window.location.href="add_to_cart.php?msg=update&pd="+p_id+"&qty1="+qt+"&t_id="+trid;
          //alert(qty);				
		}	
		
	 function fun_del_cart(cid) <!--for deletion-->
				{
					var xmlhttp; 
					  	alert("1");
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
						 alert("2");
						 window.location.href="thanq.php";
						 
						}
					  }
					xmlhttp.open("POST","add_to_cart1.php?msg=del_all_tem");
					xmlhttp.send();
				}		
		
	       function fun_del_row(tr_id) <!--for deletion-->
				{
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
						 window.location.href="card1.php";
						 
						}
					  }
					xmlhttp.open("POST","add_to_cart.php?msg=del&tr_id="+tr_id,true);
					xmlhttp.send();
				}			
	      
		   function fun_adrs_save() { <!--for saving address-->
		     
			 
		    var xmlhttp; 
			    if(document.getElementById("def_address2").checked) {
							   
				     var text = document.getElementById("adrs").value;
					 var text1 = document.getElementById("district").value;
					 var text2 = document.getElementById("city").value;
					 var add =  text.concat(text1,text2);
									  			
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
						 window.location.href="card1.php";
						 
						}
					  }
					xmlhttp.open("POST","add_to_cart.php?msg=save_adrs&add="+add,true);
					xmlhttp.send();
					} // ends if
		   
		      }
						
		
				
	 </script>   
	 <script type="text/javascript">
	$(function() {
$('.reschedule').click(function(e){ 
var dataPass;
var custId="<?=$cid?>";
var sId = $(this).attr('name');
sId=sId.slice(2);
var selectData = $(this).attr('id');
var getData = $(this).attr('title');
var devTransId=$("#trans_detox_id"+sId).val();
var tempTransId=$("#trans_tmp_id"+sId).val();
var newaddress=$("#newaddr"+sId).val();
//alert(newaddress);
if(newaddress=='Address'){
alert("Please Select Change Address");
$("#newaddr"+sId).focus();
return false;
}
// alert(tempTransId);
 if(selectData=='Detox'){
 dataPass="stat=All&custId="+custId+"&TransId="+devTransId+"&detox="+getData+"&tmpId="+tempTransId+"&chgaddr="+newaddress;
 url="tempDeliveryChange.php";
 stats="Detox"; 

//alert(dataPass); 
 
  }else if(selectData=='Beauty'){
  dataPass="stat=All&custId="+custId+"&TransId="+devTransId+"&life="+getData+"&tmpId="+tempTransId+"&chgaddr="+newaddress;
url="tempDeliverylifeChange.php";
stats="Lifestyle"; 

 //alert(dataPass);
 } 
//alert(dataPass);
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							 //alert(html);	
						$("#datError").html(html).show();
					//	if(html.tostring()=='deleted File'){
						var urls = "cart_reschedule.php?product="+getData+"&transid="+devTransId+"&stat="+stats;
//alert(urls);
 $(window.location).attr('href', urls);
						//}
					}
			});
//$(window.location).attr('href', url);

});
//check detox box;
//close

$('.delete').click(function(e){ 
var dataPass;
var custId="<?=$cid?>";
var sId = $(this).attr('name');
sId=sId.slice(2);
var selectData = $(this).attr('id'); 
var getDatas= $(this).attr('title');
var devTransId=$("#trans_detox_id"+sId).val();
var tempTransId=$("#trans_tmp_id"+sId).val();

 
 if(selectData=='Detox'){
 stats="Detox";
 dataPass="stat=All&custId="+custId+"&TransId="+devTransId+"&detox="+getDatas+"&tmpId="+tempTransId;
 url="tempDeliverySingleDelete.php";
stats="Detox"; 



  }else if(selectData=='Beauty'){
  dataPass="stat=All&custId="+custId+"&TransId="+devTransId+"&life="+getDatas+"&tmpId="+tempTransId;
url="tempDeliverySinglelifeDelete.php";
 //alert(dataPass)
 stats="Lifestyle";
 } 
//alert(dataPass);
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							 //alert(html);	
						$("#datError").html(html).show();
					//	if(html.tostring()=='deleted File'){
						var urls = "cart_reschedule.php?product="+getDatas+"&transid="+devTransId+"&stat="+stats;
//alert(urls);
 $(window.location).attr('href', urls);
						//}
					}
			});
//$(window.location).attr('href', url);

});

 });
	</script>

</head>
<body class="shopping-card">

<?php include("includes/header.php"); ?>
  <form method="post" action="">
<section class="fixed-top gropu"><div class="wrapper"><h2>My Orders</h2></div></section>

<section class="select-all gray border-bottom group">
	<div class="wrapper group">
    	<div class="quantity">Product Info</div>
        <div class="quantity">No of people</div>
		<div class="quantity">Days</div>
		<div class="quantity">Date</div>
		<div class="quantity">Adrress</div>
		<div class="manage">Change Adrress</div>
        <div class="quantity">Manage</div>
    </div>
</section>

<section class="subscription group">
	<div class="wrapper">
    	Subscriptions
        <div class="clear"></div>
        <p>*If you want to change the schedule or address of your subscription, please click <span style="font-style:italic">RESCHEDULE</span> to edit.</p>
    </div>
</section>
<?php if($stat=='Detox'){?>
  <section class="subscription-box gray group">
  <?php 
					$sql_ct = "select * from farmhouse_delivery_schedule where customer_id = '$cid' and product_type='$select_type' and tmp_trans_id='$tmp_id'";
					$res_ct = mysqli_query($conn,$sql_ct);
					while($row_ct = mysqli_fetch_array($res_ct)){
						$address = $row_ct['delivery_address']; 
						$tid = $row_ct['trans_id']; 
						$tmpid = $row_ct['tmp_trans_id']; 
					$sql_add = "select * from farmhouse_customer_address where customer_id = '$cid' and address_id = '$address'";
					$res_add = mysqli_query($conn,$sql_add);
					$row_add = mysqli_fetch_array($res_add);						
						$add = 	$row_add['address']. ", " . $row_add['address_city']. ", " . $row_add['address_district'];				
					
					?>
			
	<div class="wrapper group">
    	<div class="quantity"><img src="images/icon-basket-detox-blue.png"  height="60px" alt="Detox" /><?php echo substr($row_ct['product_type'],6); ?></div>
         <div class="quantity">
        	<input name="trans_detox_id"  id="trans_detox_id<?=$tid?>" value="<?=$tid?>" type="hidden"><?php  echo $row_ct['no_people'];    ?>
        <!--    <span class="last group">3</span>  -->
        </div>
         <div class="quantity"><input name="trans_tmp_id"  id="trans_tmp_id<?=$tid?>" value="<?=$tmpid?>" type="hidden">
        <?php  echo '1';    ?>        <!--    <span class="last group">3</span>  -->
        </div>
		<div class="quantity">
        	<?php  echo $row_ct['delivery_date'];  ?>
        <!--    <span class="last group">3</span>  -->
        </div>
		<div class="quantity">
        	<?php  echo $add;  ?>
        <!--    <span class="last group">3</span>  -->
        </div>
		
		<div class="quantity">
        	<?php  $tot = $row_ct['no_people'] * $row_ct['no_days_detox']; ?>
        </div>
		
        <div class="quantity">
        	<select id="newaddr<?=$tid?>" name="newaddr" style="width:150px;"><option>Address </option>
<?php $sql_orders = "select * from farmhouse_customer_address where customer_id = '$cid'"; 
      $res_orders = mysqli_query($conn,$sql_orders); 
      while($row_orders= mysqli_fetch_array($res_orders)) {?><option value="<?=$row_orders['address_id']?>"><?php echo $row_orders['address'].", " . $row_orders['address_city'].", " . $row_orders['address_distirct']; ?></option> <?php } ?>
	  </select>&nbsp;&nbsp;
        </div>
        <div class="manage">
        	<a href="#"  class="reschedule" id="Detox" title="<?=$row_ct['product_type']?>" name="rs<?=$tid?>">Save</a><a href="#" class="delete" id="Detox" title="<?=$row_ct['product_type']?>" name="ds<?=$tid?>">Delete</a>
        	<!--<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>-->
        </div>
		
    </div>
	<?php } ?>
</section>
<?php }else if($stat=='Lifestyle'){?>
  <section class="subscription-box gray group">
  <?php 
					$sql_ct = "select * from farmhouse_delivery_schedule where customer_id = '$cid' and product_type='$select_type' and tmp_life_id='$tmp_id'";
					$res_ct = mysqli_query($conn,$sql_ct);
					while($row_ct = mysqli_fetch_array($res_ct)){
						$address = $row_ct['delivery_address']; 
						$tid = $row_ct['trans_id']; 
						$tmpid = $row_ct['tmp_trans_id']; 
					$sql_add = "select * from farmhouse_customer_address where customer_id = '$cid' and address_id = '$address'";
					$res_add = mysqli_query($conn,$sql_add);
					$row_add = mysqli_fetch_array($res_add);						
						$add = 	$row_add['address']. ", " . $row_add['address_city']. ", " . $row_add['address_district'];				
					
					?>
			
	<div class="wrapper group">
    	<div class="quantity"><img src="images/icon-basket-lifestyle-blue.png" height="60px" alt="Detox" /></div>
         <div class="quantity">
        	<input name="trans_detox_id"  id="trans_detox_id<?=$tid?>" value="<?=$tid?>" type="hidden"><?php  echo $row_ct['no_people'];    ?>
        <!--    <span class="last group">3</span>  -->
        </div>
         <div class="quantity"><input name="trans_tmp_id"  id="trans_tmp_id<?=$tid?>" value="<?=$tmpid?>" type="hidden">
        <?php  echo '1';    ?>        <!--    <span class="last group">3</span>  -->
        </div>
		<div class="quantity">
        	<?php  echo $row_ct['delivery_date'];  ?>
        <!--    <span class="last group">3</span>  -->
        </div>
		<div class="quantity">
        	<?php  echo $add;  ?>
        <!--    <span class="last group">3</span>  -->
        </div>
		
		<div class="quantity">
        	<?php  $tot = $row_ct['no_people'] * $row_ct['no_days_detox']; ?>
        </div>
		
        <div class="quantity">
        	<select id="newaddr<?=$tid?>" name="newaddr" style="width:150px;"><option>Address </option>
<?php $sql_orders = "select * from farmhouse_customer_address where customer_id = '$cid'"; 
      $res_orders = mysqli_query($conn,$sql_orders); 
      while($row_orders= mysqli_fetch_array($res_orders)) {?><option value="<?=$row_orders['address_id']?>"><?php echo $row_orders['address'].", " . $row_orders['address_city'].", " . $row_orders['address_distirct']; ?></option> <?php } ?>
	  </select>&nbsp;&nbsp;
        </div>
        <div class="manage">
        	<a href="#"  class="reschedule" id="Beauty" title="<?=$row_ct['product_type']?>" name="rs<?=$tid?>">Save</a><a href="#" class="delete" id="Beauty" title="<?=$row_ct['product_type']?>" name="ds<?=$tid?>">Delete</a>
        	<!--<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>-->
        </div>
		
    </div>
	<?php } ?>
</section>
<?php }?>

<section class="retail-box group">
<?php 
//echo $cid;
$sql_ct = "select * from farmhouse_temp_cart_fh  where customer_id = '$cid' and product_type='$select_type'";
				$res_ct = mysqli_query($conn,$sql_ct); 
				while($row_ct = mysqli_fetch_array($res_ct))
				{ ?>
	    <div class="wrapper">
    	<div class="check"><input type="checkbox" name="retail-product" checked /></div>
		
				<?php // echo $row_ct['product_image_url'];?>
				<div class="image"><img src="<?php echo $row_ct['product_image_url'];?>" /></div>
				
        <div class="type">
        	<div class="padding">
                <!--<div class="circle">
                    <div class="central"><!--<img src="images/icon-num4-wide.png" /></div>
                </div>-->
                <span><?php echo $row_ct['product_name'];?> </span>
               </div>
        </div>
			 
        <div class="price">
            <span class="last group" id="tot">¥<?php echo $row_ct['product_price']; ?> RMB</span>
        </div>
        <div class="quantity">
            <div class="number">
			    
				    <input type='button' name='add' onclick='return fun_add(<?php echo $row_ct['no_items'];?>,<?php echo $row_ct['product_id'];?>);' value=' + '/>
                    
				    <input type='text' name='no1' class="no1" id='<?php echo $row_ct['product_id'];?>' value='<?php echo $row_ct['no_items'];?>' size = "1"/>
                   
				    <input type='button' name='subtract' onclick='return fun_del(<?php echo $row_ct['no_items'];?>,<?php echo $row_ct['product_id'];?>);' value=' - '/>
			    
				<?php /*?><a href="#" class="remove" onClick="fun_del(<?php echo $row_ct['no_items']; ?>,<?php echo $row_ct['product_id'];?>);">-</a>
				<div class="num" id="<?php echo $row_ct['product_id'];?>"><?php echo $row_ct['no_items']; ?></div>
				<?php /*?><a href="#" class="add" onClick="fun_add(<?php echo $row_ct['no_items']; ?>,<?php echo $row_ct['product_id'];?>);">+</a><?php */?>
				
			</div>
        </div>
        
		<div class="price">
            <span class="last group" id="tot">¥<?php 
			$total = $row_ct['no_items'] * $row_ct['product_price']; 
			echo  $total;
			
			// $row_ct['product_price']; ?> RMB</span>
        </div>
        <div class="manage">
		
		<span class="last group"><a href="" onClick="fun_del_row(<?php echo $row_ct['trans_id'];?>)">Delete</a></span>
        <span class="last group"><a href="#" id="keyword" onclick='fun_save(<?php echo $row_ct['product_id'];?>,document.getElementById(<?php echo $row_ct['product_id'];?>).value,<?php echo $row_ct['trans_id'];?>);'>Save</a></span>
        </div>
    </div>
	<?php	} ?>
</section>



<section class="gift-card-check-out border-top group">
	<div class="wrapper">
    <!--	<div class="gift-card f-right"><input type="checkbox" name="gift-card" /> Use gift card <input type="text" name="gift-text" placeholder="Fill the Serial Number" /><input type="submit" name="submit" value="Enter" /></div>-->
        
        <div class="clear"></div>
        <div class="details">
        	<div class="select-all"><input type="checkbox" name="select-all" checked id="sel"/> Select All</div>
            <div class="delete"><a href="add_to_cart1.php">Delete</a></div>
			<?php 
					$sql2="SELECT sum(total_item_amount) as total FROM farmhouse_temp_cart_fh where customer_id = '$cid' and product_name='$select_type'";//mar
				      $res2 = mysqli_query($conn,$sql2); 
				      $row2 = mysqli_fetch_array($res2); 
					  
				    $sql_ct = "select * from farmhouse_temp_schedule_detox where customer_id = '$cid'";
					$res_ct = mysqli_query($conn,$sql_ct);
					$row_ct = mysqli_fetch_array($res_ct);
					
					$sql_ls = "select * from farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
					$res_ls = mysqli_query($conn,$sql_ls);
					$row_ls = mysqli_fetch_array($res_ls);
					
						$tot_cart = $row2['total'] + $row_ct['detox_total'] + $row_ls['lifestyle_total'];
					  
					  
					  ?>
            <div class="total"><span>In Total: <?php echo "¥ ".$tot_cart." RMB"; ?></span></div>
	    </div>
        <div class="checkout"><button onClick="sendtocard2()"><a href="card2.php">Check Out</a></button></div>
        
    	
    </div>
</section>
</form>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>