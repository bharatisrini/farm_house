<?php include('database/db_connect.php'); 
error_reporting(0);
session_start();
$cid = $_SESSION["customer_id"];
?>

<!DOCTYPE html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='webstyle/style.css' rel='stylesheet' type='text/css'>
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

    <link href="skins/flat/blue.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
	
	  
	
	<script language="javascript">
	$(function() {
	$(".payonlinestat").hide();
	if ($('input[name=pay-on]').is(':checked')) {
	 var checklink=$('input:radio[name=pay-on]:checked').val();
	 //alert(checklink);
	 $(".payonlinestat").show();
	}else{
	 $(".payonlinestat").hide();
	}
	//checkrd=$('input[name=pay-on]').val();
	//if(checkrd=='Pay on delivery'){
	//checkrd.removeAttr('checked');  
	//}else{
	//checkrd.removeAttr('checked');  
	//}
	$('input[name=pay-on]').click(function(){
	 // var checklink=$('input:radio[name=pay-on]:checked').val();
	//alert("hii");
	 //if(checklink==""){
	 
	 //}
	});

	//$('#submitData').click(function(e){ 
	
	//});
	//final close
	});
	
	
	
	function getcard(id) {
	                
					var xmlhttp; var card = id; 
					var card_name = document.getElementById(card).innerHTML; //alert(card_name);
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
						 //if(xmlhttp.responseText == "")
						 //window.location.href="card2.php";
						}
					  }
					xmlhttp.open("POST","add_to_cart.php?msg=card&card_name="+card_name,true);
					xmlhttp.send();
	
	}
	</script>
	<script language="javascript">
	function fun_pay_save() {
	
var dataPass;	  
var urls;			               
						 if( document.getElementById("p_d").checked ) 
						  var p_typ = document.getElementById("p_d").value;
						else if(document.getElementById("p_o").checked)
						var p_typ = document.getElementById("p_o").value; 
                         if(p_typ!="Pay on delivery"){
						 											 						
												 						
						//alert(p_typ);
						 
						   					 
						 var i;
						 var form = document.forms['form1'];					 
						 var radios = form.elements['pick-bank'];
						 for (i= 0; i<=radios.length; i++) 
						 	 if(radios[i].checked) {
						 	    var bank_name = radios[i].value;
					        
							  banks = bank_name.split(",");
bnk_name=banks[0];  //alert(bnk_name);
bnk_img=banks[1];  //alert(bnk_img);
path_img=banks[2];							   
var dataPass;
dataPass="msg=pay&p_typ="+p_typ+"&bank_name="+bnk_name;
//alert(dataPass);
//alert(selectedDate);
url="add_to_cart.php"
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							//alert(html);
							//$(".step-1").removeClass("active");
							//$(".step-2").addClass("active");
							//confirm
							 urls = "card3.php?bnkimg="+path_img+","+bnk_img;
					
							$(window.location).attr('href', urls);
						//$("#datError").html(html).show();
					}
			});
													
					}
					}else{
						 dataPass="msg=pay&p_typ="+p_typ+"&bank_name=";
						 urls = "card3.php?bnkimg=payondelivery";
						 url="add_to_cart.php"

						//alert(dataPass);
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							//alert(html);
							//$(".step-1").removeClass("active");
							//$(".step-2").addClass("active");
							//confirm
					
							$(window.location).attr('href', urls);
						//$("#datError").html(html).show();
					}
			});

					}// ends if
					
					
	
} // ends funtion	
	</script>
	
    
	<script type="text/javascript">
    $(document).ready(function(){
        $("input[name=pay-on]").click(function(){
            var radioValue = $("input:radio[name=pay-on]:checked").val();
            if(radioValue=='Pay on delivery'){
                //alert("Your are a - " + radioValue);
				$(".tabs").hide();
				
            }
			else
			$(".tabs").show();
        });
        
    });
    
    </script>

</head>


<body class="payment">

<form name="form1" id="form1">

<?php include("includes/header.php"); ?>

<section class="process fixed-top group">
	<div class="wrapper group">
    	<section class="back-button group">
            <div class="wrapper group">
                <a href="card1.php">BACK</a>
            </div>
        </section>
		
        <div class="steps group">
                <div class="step-1 active"><a href="card2.php">Choose Mode of Payment<span class="right"></span></a></div>
                <div class="step-2"><a href="card3.php" id="confirm">Confirm Payment<span class="right"></span><span class="left"></span></a></div>
                <div class="step-3"><a href="card4.php">Done<span class="left"></span></a></div>
        </div>
        
        <div class="sum group">
        	<div class="values">
            	<div class="half">The Order:<span>
 <?php $sql2="SELECT sum(total_item_amount) as total FROM farmhouse_temp_cart_fh where customer_id = '$cid'";
				      $res2 = mysqli_query($conn,$sql2); 
														  
				// Fetch one and one row
				      $row2=mysqli_fetch_assoc($res2);
					  
					     $sql_ct = "select sum(detox_total) as total_detox  from farmhouse_temp_schedule_detox where customer_id = '$cid'";
					$res_ct = mysqli_query($conn,$sql_ct);
					$row_ct = mysqli_fetch_array($res_ct);
					
					$sql_ls = "select sum(lifestyle_total) as total_ls from farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
					$res_ls = mysqli_query($conn,$sql_ls);
					$row_ls = mysqli_fetch_array($res_ls);
					
						$tot_cart = $row2['total'] + $row_ct['total_detox'] + $row_ls['total_ls'];
					
					
				
                      echo "¥ ".$tot_cart." RMB"; ?>
                </span></div>
                <div class="half">Delivery Fee:<span>¥0.00 RMB</span></div>
            </div>
            <div class="total"><a href="#"><?php echo "¥ ".$tot_cart." RMB"; ?> </a></div>
        </div>
        
        <div class="pay group">
        	<div class="pay-on group">
            	<p>
            	 <input type="radio" name="pay-on" id="p_d" value="Pay on delivery"/>
           	    <span>Pay on delivery</span></p>
            	<p><input type="radio" name="pay-on"  id="p_o" value="Pay online" checked="checked"/> <span>Pay online</span></p>
          </div>
<div class="payonlinestat">
            <div class="pay-online group display">
            	<div class="tabs group">
                	<div class="tabs-links group">
                    	<ul>
                        	<li><a href="#" id="tab-1" onClick="getcard(this.id)">Debit Card</a></li>
                            <li><a href="#" id="tab-2" onClick="getcard(this.id)">Credit Card</a></li>
                            <li><a href="#" id="tab-3" onClick="getcard(this.id)">Third-Party Payment</a></li>
                        </ul>
                    </div>
                    <div class="tabs-content group">
                    	<div class="debit-card-content display">
						<?php
						$sql = "select * from  farmhouse_debit_card_details";
						$result = mysqli_query($conn,$sql); $rows = mysqli_num_rows($result);
							while($row = mysqli_fetch_array($result))
							{
								$img = $row['image'];
								$imgpath = "db_card_images/".$img;
							?>	
								<figure>
                            	<div class="input">
								<input type="radio" name="pick-bank" class="round" value="<?=$row['card_name'].",".$img.",db_card_images"?>" id="card_type"/></div>
                                <div class="image"><img src='<?php echo $imgpath; ?>'/></div>
                            </figure>
							<?php
							}
							//}//for
						    ?>
						
                        	
                        </div>
                        
                        <div class="credit-card-content">
                        							<?php
						$sql = "select * from  farmhouse_credit_card_details";
						$result = mysqli_query($conn,$sql);
						
							while($row = mysqli_fetch_array($result))
							{
								$img = $row['image'];
								$imgpath = "cr_card_images/".$img;
							?>	
							<figure>
                            	<div class="input"><input type="radio" name="pick-bank" class="round" id="card_type" value="<?=$row['card_name'].",".$img.",cr_card_images"?>"/></div>
                                <div class="image"><img src = '<?php echo $imgpath; ?>'/></div>
                            </figure>
                            <?php
							}
						    ?>
                            
                            
                        </div>
                        
                        <div class="third-party-payment-content">
						<?php
						$sql = "select * from farmhouse_third_party_payment_details";
						$result = mysqli_query($conn,$sql);
						
							while($row = mysqli_fetch_array($result))
							{
								$img = $row['image'];
								
								$imgpath = "th_party_images/".$img;
								
							?>	
                        	<figure>
                            	<div class="input"><input type="radio" name="pick-bank" class="round" id="card_type" value="<?=$row['tpp_name'].",".$img.",th_party_images"?>" /></div>
                                <div class="image"><img src = '<?php echo $imgpath; ?>'></div>
                            </figure>
							 <?php
							}
						    ?> 
                        </div>
                    </div>
                </div>
                </div>
                <section class="next-button group">
                    <div class="wrapper group">
                        <a href="#" onClick="fun_pay_save()">NEXT</a>
                    </div>
                </section>
                
            </div>
        </div>
    </div>
</section>
</form>
<?php include("includes/footer.php"); ?>

<script>
		$(document).ready(function() {
			$('#tab-1').click(function() {
				$(this).addClass('active');
				$('#tab-2').removeClass('active');
				$('#tab-3').removeClass('active');
				$('.debit-card-content').addClass('display');
				$('.credit-card-content').removeClass('display');
				$('.third-party-payment-content').removeClass('display');
			});
			
			$('#tab-2').click(function() {
				$(this).addClass('active');
				$('#tab-1').removeClass('active');
				$('#tab-3').removeClass('active');
				$('.debit-card-content').removeClass('display');
				$('.credit-card-content').addClass('display');
				$('.third-party-payment-content').removeClass('display');
			});
			
			$('#tab-3').click(function() {
				$(this).addClass('active');
				$('#tab-1').removeClass('active');
				$('#tab-2').removeClass('active');
				$('.debit-card-content').removeClass('display');
				$('.credit-card-content').removeClass('display');
				$('.third-party-payment-content').addClass('display');
			});
			
				// $('input.round1').click(function(){
			// 	if($(this).attr("value")=="pod"){
			// 		$(".pay-on-delivery").addClass('display');
			// 		$(".pay-online").removeClass('display');
			// 	}
			// 	if($(this).attr("value")=="po"){
			// 		$(".pay-online").addClass('display');
			// 		$(".pay-on-delivery").removeClass('display');
			// 	}
			// });
		});
        </script>
		
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>