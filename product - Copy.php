<?php
error_reporting(0);
include('database/db_connect.php');
session_start();
$cu_id = $_SESSION['customer_id'];
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
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    <script type="text/javascript" src="slick/slick.min.js"></script>

	<script language="javascript">
	function fun_del(qty,id) {

					//var qt = qty;
					 var qt = qty; var p_id = id; //alert(id); alert(qty);
					if( (document.getElementById(p_id).value - 1  <= 0))
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
					// ajax for add_to_cart
					function add(id,qty)
					{
					var xmlhttp; //alert(qty); alert(id); alert("hii");
                    if($("#"+id).val()<=0){
								$("#ErroOut"+id).html("<font color='red'>0 Quantity</font>").delay(1000).fadeOut();
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
						 window.location.href="jucie.php";
						 //alert(xmlhttp.responseText);
						//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
						}
					  }
					xmlhttp.open("GET","add_to_cart.php?msg=addtocart&qty="+qty+"&pd="+id,true);
					xmlhttp.send();
					}

	</script>

</head>
<body class="product">

<?php include("includes/header.php"); ?>

<section class="back-button fixed-top group">
	<div class="wrapper group">
    	<a href="jucie.php">BACK</a>
    </div>
</section>

<!--changes done from here-->
<?php
$image = $_GET['image'];
$pr_id = $_GET['pr_id'];
if(isset($pr_id))
$sql_subimage = "select * from farmhouse_juice_details where product_id= '$pr_id' and status=0 ";
elseif(isset($image))
$sql_subimage = "select * from farmhouse_juice_details where image2 = '$image' and status=0 ";
$res_subimage = mysqli_query($conn,$sql_subimage);
$row_subimage = mysqli_fetch_array($res_subimage);


?>
<section class="single-product group">
	<div class="wrapper group">
    	<aside class="image"><img src="product_images/<?php if($image) { echo $row_subimage['image2']; } else echo $row_subimage['image'];?>" alt="#" height="495" /></aside>
        <aside class="details">
        	<h2><?php if($image) { echo $row_subimage['name']; } else echo $row_subimage['name'];?></h2>
            <div class="tab-box">
            	<div class="tabs group">
                	<ul>
                    	<li><a href="#" class="active" id="tab1-click">INGREDIENTS</a></li>
                        <li><a href="#" id="tab2-click">BENEFITS</a></li>
                        <li><a href="#" id="tab3-click">NUTRITIONAL CONTENT</a></li>
                    </ul>
                </div>
                <div class="tab-content group">
                	<div id="tab1" class="display">
                    	<p><?php $ingre = explode(",",$row_subimage['ingredients']);
						
					  $no_of_rows = count($ingre);
					 if($no_of_rows>1){
						 for($i=0;$i<=$no_of_rows;$i++){echo $ingre[i];}}else{ echo $row_subimage['ingredients'];}?></p>
                        <p>&nbsp;</p>
                        <p><img src="images/icon-nuts.png" alt="#" class="f-right" /></p>

                    </div>
                    <div id="tab2">
					<p><?php echo $row_subimage['benifits'];?></p>
                        <p>&nbsp;</p>
					</div>
                    <div id="tab3"><p><?php echo $row_subimage['nutritional_content'];?></p>
                        <p>&nbsp;</p></div>
                </div>

                <div class="price">¥<?php echo $row_subimage['price'];?>RMB</div>
                <div class="order">

				   <div class="number">

				    <input type='button' name='add' onclick='return fun_add(<?php echo $row_subimage['quantity'];?>,<?php echo $row_subimage['product_id'];?>);' value=' + '/>

				    <input type='text' name='no1' class="no1" id='<?php echo $row_subimage['product_id'];?>' value='<?php echo $row_subimage['quantity'];?>' size = "1" />

				    <input type='button' name='subtract' onclick='return fun_del(<?php echo $row_subimage['quantity'];?>,<?php echo $row_subimage['product_id'];?>);' value=' - '/>

			     </div>
                	<!--<div class="number">
                        <div class="value">
                            <a href="#" class="remove">-</a>
                            <div class="num">1</div>
                            <a href="#" class="add">+</a>
                        </div>
                    </div>-->
                    <div class="add"><input type="button" onClick="add(<?php echo $row_subimage['product_id'];?>,document.getElementById(<?php echo $row_subimage['product_id'];?>).value );" value="Add into">
                    <div id="ErroOut<?=$row_subimage['product_id']?>"></div>
					</div>
                </div>
            </div>
        </aside>
    </div>
</section>
<!--changes done from here-->

<section class="slider group">
	<div class="wrapper group">
    	<div class="center-slider-jucie"> <?php $sql = "select * from farmhouse_juice_details where image2 != '' order by product_id";
		        $sql_res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($sql_res)) { ?>

          <div><a href="product.php?image=<?php echo $row['image2'];?>"><img src="product_images/<?php echo $row['image2'];?>" alt="" /></a><span><?php echo $row['name'];?></span></div> <?php }?>
          <!--<div><a href="#"><img src="images/single-bottle-rotated-2.png" alt="" /></a><span>INTERNAL FIX</span></div>
          <div><a href="#"><img src="images/single-bottle-rotated-3.png" alt="" /></a><span>BEAUTY GLOW</span></div>
          <div><a href="#"><img src="images/single-bottle-rotated-4.png" alt="" /></a><span>SPICY LIMONADE</span></div>
          <div><a href="#"><img src="images/single-bottle-rotated-5.png" alt="" /></a><span>BEET IT</span></div>
          <div><a href="#"><img src="images/single-bottle-rotated-6.png" alt="" /></a><span>HORCHATA</span></div>
          <div><a href="#"><img src="images/single-bottle-rotated-7.png" alt="" /></a><span>AMNIO HYDRATE</span></div>
          <div><a href="#"><img src="images/single-bottle-rotated-8.png" alt="" /></a><span>THE REHYDRATOR</span></div>-->
        </div>

    </div>
</section>

<?php include("includes/footer.php"); ?>

<script>
	$('#tab1-click').click(function (e) {
		e.stopPropagation();
		$('#tab1').toggleClass('display');
		$(this).toggleClass('active');
		$('#tab3, #tab2').removeClass('display');
		$('#tab3-click, #tab2-click').removeClass('active');

	});
	$('#tab2-click').click(function (e) {
		e.stopPropagation();
		$('#tab2').toggleClass('display');
		$(this).toggleClass('active');
		$('#tab1, #tab3').removeClass('display');
		$('#tab1-click, #tab3-click').removeClass('active');
	});
	$('#tab3-click').click(function (e) {
		e.stopPropagation();
		$('#tab3').toggleClass('display');
		$(this).toggleClass('active');
		$('#tab1, #tab2').removeClass('display');
		$('#tab1-click, #tab2-click').removeClass('active');
	});
</script>


<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>