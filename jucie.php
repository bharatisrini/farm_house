<?php
	error_reporting(0);
	include('database/db_connect.php');
	session_start();
	$cu_id = $_SESSION['customer_id'];
	$_SESSION["loginurl"]="jucie.php";
	$sql_lan_id = "select countrylang_id from farmhouse_country_language where selected = '1'";
				$res_lan_id = mysqli_query($conn,$sql_lan_id);
				$row_lan_id = mysqli_fetch_array($res_lan_id);
				$lid = $row_lan_id['countrylang_id'];
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

			function fun_add(id,qty) {
			
                    if(document.getElementById(id).value){
					//alert("check qty");
					document.getElementById(id).value++;
					$("#ErroOut"+id).html("");
					}
					}
		function fun_del(id,qty) {

					//var qt = qty;
					var p_id = id; var qt = qty;
					if( (document.getElementById(p_id).value - 1  <= 0))
					return;
					else
					document.getElementById(p_id).value--;

					}

		function addtocart(id,qty)
		{
//alert(id); 
             $("#ErroOut"+id).hide();
            /* if(document.getElementById(id).value==0){
					//alert("check qty");
					$("#ErroOut"+id).html("<font color='red'>0 Quantity</font>");
					}*/
			var dataPass;

			if($("#"+id).val()<=0){
			$("#ErroOut"+id).show();
			$("#ErroOut"+id).html("<font color='red'>0 Quantity</font>");
			return false;
			}
			dataPass="msg=addtocart&qty="+qty+"&pd="+id;
			//alert(dataPass);
			//alert(selectedDate);
			url="add_to_cart.php"
			$("#checkOut"+id).html('Loading.....');
			$.ajax( {
			type :"POST",
			url :url,
			data :dataPass,
			cache :false,
			success : function(html){
			//alert(html);
			//$("#checkOut").html(html).show();
			if(html.toString().match("your item has already been added into cart")){ $("#checkOut"+id).html("<font color='red'>Already Added<font color='red'>");}
			else{
			$("#checkOut"+id).html("<font color='green'> Added to Cart</font>");
			//				var urls="jucie.php";
			//alert(urls);
			//$(window.location).attr('href', urls);
			}}
		});


		/*	var xmlhttp; //alert(qty); alert(id); alert("hii");

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
		// window.location.href="jucie.php";


		//else
		//document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
		//alert(xmlhttp.responseText);
		//}
		}
		xmlhttp.open("GET","add_to_cart.php?msg=addtocart&qty="+qty+"&pd="+id,true);
		xmlhttp.send();
		document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
		alert(xmlhttp.responseText);
		$('.check-my-card group').hide();*/
	}



	</script>
</head>
<body class="jucie">

<?php include("includes/header.php"); ?>

<section class="slider fixed-top group">
	<div class="wrapper group">
    	<div class="center-slider-jucie">
			<?php
				$sql = "select image2 from farmhouse_juice_details where image2 != '' and countrylang_id='$lid' order by product_id";
				$sql_res = mysqli_query($conn,$sql);
				while($row = mysqli_fetch_array($sql_res)) {
			?>
        	<div><a href="product.php?image=<?php echo $row['image2'];?>"><img src="product_images/<?php echo $row['image2'];?>" alt="" /></a></div> <?php } ?>
        </div>

        <div class="clear"></div>
        <h2>OUR JUICES</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.</p>
    </div>
</section>

<section class="juices-list group">
	<div class="wrapper group">
    	<h2>JUICES LIST</h2>
		<form action="" method="post">
		<?php
			$sql_pro = "select * from farmhouse_juice_details where countrylang_id='$lid' order by product_id ASC";
			$res_pro = mysqli_query($conn,$sql_pro);
			while($row_pro = mysqli_fetch_array($res_pro)) {
			$product_id = $row_pro['product_id'];
		?>
        <figure>
        	<div class="image">
				<a href="product.php?pr_id=<?php echo $product_id; ?>"><img src="product_images/<?php echo $row_pro['image']; ?>" alt="#" /></a>
				<h3><?php echo $row_pro['name']; echo ' - '.' ¥ '.$row_pro['price'].' RMB '; ?></h3>
			</div>

            <div class="number">
				<div class="value">
				<!-- Decrease Button -->
				<input class="remove" type='button' name='subtract' onclick='return fun_del(<?php echo $row_pro['product_id'];?>,<?php echo $row_pro['quantity'];?>);' value=' - ' id="subtract"/>
				<!-- Current Value -->
				<input class="num" type='text' name='no1' class="no1" id='<?php echo $row_pro['product_id'];?>' value='<?php echo $row_pro['quantity'];?>' size = "1"/>

				<!-- Increase Button -->
				<input class="add" type='button' name='add' onclick='return fun_add(<?php echo $row_pro['product_id'];?>,<?php echo $row_pro['quantity'];?>);' id="add" value=' + '/>
				<input type="hidden" value="<?php echo $row_pro['product_id'];?>" id="p_id">
				 <span id="ErroOut<?=$product_id?>"></span>
				</div>

			</div>
            <div class="add" id="checkOut<?=$product_id?>">

				<!--
				<input type='button' name='add_to_cart' class="addtocart" onclick='addtocart(<?php echo $row_pro['product_id'];?>,document.getElementById(<?php echo $row_pro['product_id'];?>).value);'/>
				-->
				<a name='add_to_cart' onclick='addtocart(<?php echo $row_pro['product_id'];?>,document.getElementById(<?php echo $row_pro['product_id'];?>).value);'>Add into</a>

			</div>

        </figure>
        <?php
		}
		?>
		</form>

        <div class="clear"></div>
        <div class="line"></div>
        <div class="links-more group">
        	<a href="detox.php" class="detox">GO FOR OUR DETOX</a>
            <a href="lifestyle.php" class="lifestyle">OR CHECK OUR LIFESTYLE</a>
        </div>
    </div>
</section>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>