<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
$cid = $_SESSION["customer_id"];
//echo $_SESSION["loginurl"];
$_SESSION["chklg"]="card1.php";
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
					 var qt = qty; var p_id = id; //alert(id); alert(document.getElementById(p_id).value);
					if( (document.getElementById(p_id).value -1<= 0)){
					document.getElementById(p_id).value=1; 
					return; }
					else {
					document.getElementById(p_id).value--; 
				   		}						
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
					  	//alert("1");
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
	
$('.delete').click(function(e){ 
var dataPass;
var custId="<?=$cid?>";
if(custId==""){
custId="0";
}
var selectData = $(this).attr('id');
//alert(selectData);
var nameData = $(this).attr('name');
//alert(nameData);
var detoxTransId=$("#transId").val();
//alert(detoxTransId);
 if(selectData=='Detox'){
 dataPass="stat=All&custId="+custId+"&TransId="+detoxTransId+"&detox="+nameData;
 //alert(dataPass);
 url="tempDeliveryDelete.php";
}else if(selectData=='Beauty'){
  dataPass="stat=All&custId="+custId+"&TransId="+detoxTransId+"&life="+nameData;
url="tempDeliverylifeDelete.php";
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
						//	alert(html);	
						$("#datError").html(html).show();
					//	if(html.tostring()=='deleted File'){
						var urls = "card1.php"; 
//alert(urls);
  $(window.location).attr('href', urls);
						//}
					}
			});
//$(window.location).attr('href', url);

});
//check detox box;
$('#checkLogin').click(function(e){ 
var dataPass;
var custId="<?=$cid?>";
if(custId==""){
cid="0";
}
if($("#tot").val()=="0"){
alert("No Order Details of Check Out");
return false;
}

if(custId=="" || custId=="0"){
alert("You should be login"); 
var urls = "front.php";
 $(window.location).attr('href', urls);
}else{
//alert(dataPass);
//alert(selectedDate);
url="cartUpdateData.php";
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
						//alert(html);	
						$("#datError").html(html).show();
					}
			});
var urls = "card2.php";
$(window.location).attr('href', urls);
}

});

//close
 });
	</script>
  

</head>
<body class="shopping-card">

<?php include("includes/header.php"); ?>
  <form method="post" action="">
<section class="fixed-top gropu"><div class="wrapper"><h2>MY CART</h2></div></section>

<section class="select-all gray border-bottom group">
	<div class="wrapper group">
    	<div class="select"><input type="checkbox" name="select-all" checked /> Select All</div>
        <div class="product-info">Product Info</div>
        <div class="quantity">Quantity</div>
        <div class="price">Price</div>
        <div class="manage">Manage</div>
    </div>
</section>

<section class="subscription group">
	<div class="wrapper">
   	   <input type="checkbox" name="Subscriptions" class="chslc" checked /> 
      Subscriptions
      <div class="clear"></div>
        <p>*If you want to change the schedule or address of your subscription, please click <span style="font-style:italic">RESCHEDULE</span> to edit.</p>
    </div>
</section>
 <?php 
					$sql_dt = "select distinct detox_name from farmhouse_temp_schedule_detox where customer_id = '$cid'";
					$res_dt = mysqli_query($conn,$sql_dt);
					while($row_dt = mysqli_fetch_array($res_dt)){
					$dtname=$row_dt['detox_name'];
?>
  <section class="subscription-box white group">
  <?php 
					$sql_ct = "select * from farmhouse_temp_schedule_detox where customer_id = '$cid'  and detox_name = '$dtname'";
					$res_ct = mysqli_query($conn,$sql_ct);
					while($row_ct = mysqli_fetch_array($res_ct)){
					
					?>
			
	<div class="wrapper group">
    	<div class="check"><input type="checkbox" name="Subscriptions-detox" class="chslc" checked /><input type="hidden" name="transId" id="transId" value="<?=$row_ct['trans_id']?>"/><input type="hidden" name="detox" id="$dtname"/></div>
        <div class="image" style="background-image: url(images/icon-basket-detox-blue-blank.png); height:72px; width:86px; color:#FFFFFF; font-weight:800; vertical-align: middle;  color:#FFFFFF; font-size:15px; font-weight:800; text-align:center; background-repeat: no-repeat; ">
		&nbsp;&nbsp;<?=$row_ct['detox_name']?>
		</div>  
  
        <div class="type">
			<span class="padding"></span>
        <!--     <span class="last group">B</span> -->
        </div>
          <div class="quantity">
            <div class="value"><?php  $tot = $row_ct['no_people'] * $row_ct['no_days_detox']; echo $row_ct['no_people']. " - " .$row_ct['no_days_detox']. " day Detox ";  ?></div>
        <!--    <span class="last group">3</span>  -->
        </div>
        <div class="price"><span class="last group">¥<?php  echo $row_ct['detox_total']; ?> RMB</span>
        	
        <!--    <span class="last group">¥RMB</span> -->
        </div>
        <div class="manage">
	
        	<span class="last group"><a href="<?php if(isset($cid)) { ?>cart_reschedule.php?product=<?=$row_ct['detox_name']?>&transid=<?=$row_ct['trans_id']?>&stat=Detox<?php } else echo "#"; ?>" id="<?=$row_ct['detox_name']?>" class="reschedule" >Reschedule</a><a href="#" id="Detox" name="<?=$row_ct['detox_name']?>" class="delete">Delete</a></span>
        	<!--<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>-->
        </div>
		
    </div>
	<?php }?>
</section>
<?php }?>
 
<!--
// Life Style program starts here //-->
<?php 
					$sql_dt = "select distinct lifestyle_name from farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
					$res_dt = mysqli_query($conn,$sql_dt);
					while($row_dt = mysqli_fetch_array($res_dt)){
					$lsname=$row_dt['lifestyle_name'];
?>
<section class="subscription-box border-bottom group">
 <?php 
					$sql_ct_ls = "select * from farmhouse_temp_schedule_lifestyle where customer_id = '$cid' and lifestyle_name= '$lsname'";
					$res_ct_ls = mysqli_query($conn,$sql_ct_ls);
					while($row_ct_ls = mysqli_fetch_array($res_ct_ls)){
					
					?>
	<div class="wrapper group">
    	<div class="check"><input type="checkbox" name="Subscriptions-detox" class="chslc" checked /></div>
        <div class="image" style="background-image: url(images/icon-basket-detox-blue-blank.png); height:72px; width:86px; color:#FFFFFF; font-weight:800; vertical-align: middle;  color:#FFFFFF; font-size:15px; font-weight:800; text-align:center; background-repeat: no-repeat; ">
		&nbsp;&nbsp;<?=$row_ct_ls['lifestyle_name']?>
		</div>
        <div class="type">
            <div class="padding"></div>
        </div>
        <div class="quantity">
            <div class="value"><?php  $tot_ls = $row_ct_ls['no_people'] * $row_ct_ls['no_days_beauty']; echo $row_ct_ls['no_people']. " - " .$row_ct_ls['no_days_beauty']. " day LS ";  ?></div>
        
		  
		</div>
        <div class="price">
            <span class="last group">¥<?php  echo $row_ct_ls['lifestyle_total']; ?> RMB</span>
        </div>
        <div class="manage">
        	<span class="last group"><a href="<?php if(isset($cid)) { ?>cart_reschedule.php?product=<?=$row_ct_ls['lifestyle_name']?>&transid=<?=$row_ct_ls['trans_id']?>&stat=Lifestyle<?php } else echo "#"; ?>" class="reschedule">Reschedule</a><a href="#" id="Beauty" name="<?=$lsname?>" class="delete">Delete</a></span>
        </div>
    </div>
	<?php }?>
</section>
<?php }?>

<section class="retail-box group">
<?php 
//echo $cid;
$sql_ct = "select * from farmhouse_temp_cart_fh  where customer_id = '$cid'";
				$res_ct = mysqli_query($conn,$sql_ct); 
				while($row_ct = mysqli_fetch_array($res_ct))
				{ ?>
	    <div class="wrapper">
    	<div class="check"><input type="checkbox" name="retail-product" id="retail-product" checked /></div>
		
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
		
		<div class="quantity">
            <div class="value">
				<input class="remove" type='button'  name='subtract' onclick='return fun_del(<?php echo $row_ct['no_items'];?>,<?php echo $row_ct['product_id'];?>);' value=' - '/>
				<input class="num" type='text' name='no1'  id='<?php echo $row_ct['product_id'];?>' value='<?php echo $row_ct['no_items'];?>' size = "1" />
				<input class="add" type='button' name='add' onclick='return fun_add(<?php echo $row_ct['no_items'];?>,<?php echo $row_ct['product_id'];?>);' value=' + '/>
     		</div>
        </div>
		
        <div class="price">
            <span class="last group" id="tot">¥<?php echo $row_ct['product_price']; ?> RMB</span>
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
		<!--
    	<div class="gift-card f-right"><input type="checkbox" name="gift-card" /> Use gift card <input type="text" name="gift-text" placeholder="Fill the Serial Number" /><input type="submit" name="submit" value="Enter" /></div>
		-->
        
        <div class="clear"></div>
        <div class="details">
        	<div class="select-all"><input type="checkbox" name="select-all" checked /> Select All</div>
            <div class="delete"><a href="add_to_cart1.php">Delete</a></div>
			<?php 
				$sql2="SELECT sum(total_item_amount) as total FROM farmhouse_temp_cart_fh where customer_id = '$cid'";//mar
				$res2 = mysqli_query($conn,$sql2); 
				$row2 = mysqli_fetch_array($res2); 
				
				$sql_ct = "select sum(detox_total) as dttotal from farmhouse_temp_schedule_detox where customer_id = '$cid'";
				$res_ct = mysqli_query($conn,$sql_ct);
				$row_ct = mysqli_fetch_array($res_ct);
				
				$sql_ls = "select sum(lifestyle_total) as lstotal from farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
				$res_ls = mysqli_query($conn,$sql_ls);
				$row_ls = mysqli_fetch_array($res_ls);
				
				$tot_cart = $row2['total'] + $row_ct['dttotal'] + $row_ls['lstotal'];
				
			?><input name="tot" id="tot" type="hidden" value="<?=$tot_cart?>">
            <div class="total"><span>In Total: <?php echo "¥ ".$tot_cart." RMB"; ?></span></div>
        </div>
        <div class="checkout"><a href="#" id="checkLogin">Check Out</a></div>
    </div>
</section>

</form>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>