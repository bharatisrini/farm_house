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

</head>
<body class="shopping-card">

<?php include("includes/header.php"); ?>
  <form method="post" action="">
  
  <select name="order_id" onchange="showUser(this.value)">
<option value="">Select an Order:</option>
<?php
$sql_go = "select distinct order_id from farmhouse_order order by 'order_id'";  
					$res_go = mysqli_query($conn,$sql_go);
					while($row_go = mysqli_fetch_array($res_go)) {
					
					?>
<option value="<?php $row_go['order_id']; ?>"><?php echo $row_go['order_id']; ?></option>
<?php } ?>
</select>
<section class="fixed-top gropu"><div class="wrapper"><h2> Order No </h2></div></section>





  <section class="subscription-box gray group">
 
	<div class="wrapper group">
    	
        <div class="image"><span class="group">Product Type</span></div>
        
         <div class="quantity">
        	<span class="group">No of items</span>
        <!--    <span class="last group">3</span>  -->
        </div>
        <div class="price">
        	<span class="group">Delivarable Address</span>
        <!--    <span class="last group">¥RMB</span> -->
        </div>
        <div class="price">
        	<span class="group">Delivarable Date</span>
        <!--    <span class="last group">¥RMB</span> -->
        </div>
		<div class="manage">
        	<span class="group"></span>
        	<!--<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>-->
        </div>
    </div>
</section>
		 <?php 
		 $order_id = '3574893';
					$sql_ct = "select * from farmhouse_order where order_id = '$order_id'";  
					$res_ct = mysqli_query($conn,$sql_ct);
					while($row_ct = mysqli_fetch_array($res_ct)) {
					echo $row_ct['order_id'];
					?>
	<div class="wrapper group">
    	
        <div class="image"><?php $row_ct['product_type'];?></div>
        
         <div class="quantity">
        	<span class="group"><?php  $tot = $row_ct['no_people'] * $row_ct['no_days_detox']; echo $tot;  ?></span>
        <!--    <span class="last group">3</span>  -->
        </div>
        <div class="price">
        	<span class="group">¥<?php  echo $row_ct['detox_total']; ?> RMB</span>
        <!--    <span class="last group">¥RMB</span> -->
        </div>
        <div class="manage">
        	<span class="group"><a href="detox.php" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>
        	<!--<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>-->
        </div>
    </div>
</section>
					<?php } ?>
<!--
// Life Style program starts here //-->
<section class="subscription-box border-bottom group">
 <?php 
					$sql_ct_ls = "select * from farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
					$res_ct_ls = mysqli_query($conn,$sql_ct_ls);
					$row_ct_ls = mysqli_fetch_array($res_ct_ls)
					
					?>
	<div class="wrapper group">
    	
        <div class="image"><img src="images/icon-basket-lifestyle-blue.png" alt="Lifestyle" /></div>
        <div class="type">
            <span class="last group"><?php echo $row_ct_ls['lifestyle_name'];?></span>
        </div>
        <div class="quantity">
            <span class="last group"><?php  $tot_ls = $row_ct_ls['no_people'] * $row_ct_ls['no_days_beauty']; echo $tot_ls;  ?></span>
        </div>
        <div class="price">
            <span class="last group">¥<?php  echo $row_ct_ls['lifestyle_total']; ?> RMB</span>
        </div>
        <div class="manage">
        	<span class="last group"><a href="#" class="reschedule">Reschedule</a><a href="#" class="delete">Delete</a></span>
        </div>
    </div>
</section>


<section class="retail-box group">
<?php 
//echo $cid;
$sql_ct = "select * from farmhouse_temp_cart_fh  where customer_id = '$cid'";
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
            <span class="last group" id="tot">¥<?php echo $row_ct['product_price']; ?> RMB</span>
        </div>
        <div class="manage">
		
		<span class="last group"><a href="" onClick="fun_del_row(<?php echo $row_ct['trans_id'];?>)">Delete</a></span>
        <span class="last group"><a href="#" id="keyword" onclick='fun_save(<?php echo $row_ct['product_id'];?>,document.getElementById(<?php echo $row_ct['product_id'];?>).value,<?php echo $row_ct['trans_id'];?>);'>Save</a></span>
        </div>
    </div>
	<?php	} ?>
</section>




</form>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src=".../js/classie.js"></script>
<script type="text/javascript" src=".../js/modernizr.js"></script>
<script type="text/javascript" src=".../js/custom.js"></script>

</body>
</html>