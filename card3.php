<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"];
if($_REQUEST["bnkimg"]=='payondelivery')
$delivery = $_REQUEST["bnkimg"];
else
$img = $_REQUEST["bnkimg"];
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

    <link href="skins/flat/blue.css" rel="stylesheet">
	<script src="js/icheck.js"></script>

</head>
<body class="payment">

<?php include("includes/header.php"); ?>

<section class="process fixed-top group">
	<div class="wrapper group">
    	<section class="back-button group">
            <div class="wrapper group">
                <a href="card2.php">BACK</a>
            </div>
        </section>
		
        <div class="steps group">
                <div class="step-1"><a href="card2.php">Choose Mode of Payment<span class="right"></span></a></div>
                <div class="step-2 active"><a href="card3.php">Confirm Payment<span class="right"></span><span class="left"></span></a></div>
                <div class="step-3"><a href="card4.php">Done<span class="left"></span></a></div>
        </div>
        
        <div class="pay-confirm-online group">
        	<div class="image"><img src="images/confirm-banner.jpg" alt="#" /></div>
            <div class="details">
            <p class="payment">Payment:<span>
            <?php 
			$sql2="SELECT sum(total_item_amount) as total FROM farmhouse_temp_cart_fh where customer_id = '$cid'";
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
					  
            	</span></p>
				<?php
					$card_image_path =str_replace(',', '/', $img);
				
                      ?>

			
                <p class="selected">Selected:<span><?php if(isset($delivery)) { echo "Pay on Deliery"; } else {?>
				<img src="<?php echo $card_image_path?>"  alt="#"/><?php } ?> </span></p>
                <p class="tips">*Tips: Please make sure you have opened an online bank account.</p>
                <p>&nbsp;</p>
                <a href="order_details.php" class="pay-now"><?php if(isset($delivery)) { echo "Confirm Order"; } else { echo "Pay Now"; } ?></a>
                <p class="info">A new window will open when Payment page is displayed.</p>
            </div>
            
            <div class="pay-process-modal">
            	<div class="padding">
                	<a href="#" class="close"><img src="images/icon-close.png" /></a> 
                	<div class="text">
                    	<div class="image"><img src="images/icon-attention.png" alt="#" /></div>
                        <div class="desc">Don’t close this page until payment complete!</div>
                    </div>
                    <div class="links">
                    	<a href="card4.php" class="complete">Payment Complete</a>
                        <a href="card2.php" class="problem active">Payment Has a Problem</a>
                    </div>
                </div>
            	
            </div>
        </div>
        
    </div>
</section>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>