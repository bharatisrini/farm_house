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
                <a href="card1.php">BACK</a>
            </div>
        </section>
		
        <div class="steps group">
                <div class="step-1 active"><a href="card2.php">Choose Mode of Payment<span class="right"></span></a></div>
                <div class="step-2"><a href="card3.php">Confirm Payment<span class="right"></span><span class="left"></span></a></div>
                <div class="step-3"><a href="card4.php">Done<span class="left"></span></a></div>
        </div>
        
        <div class="sum group">
        	<div class="values">
            	<div class="half">The Order:<span>¥2244.00 RMB</span></div>
                <div class="half">Delivery Fee:<span>¥0.00 RMB</span></div>
            </div>
            <div class="total"><a href="#">¥2244.00 RMB</a></div>
        </div>
        
        <div class="pay group">
        	<div class="pay-on group">
            	<p><input type="radio" name="pay-on" class="round" checked /> <span>Pay on delivery</span></p>
                <p><input type="radio" name="pay-on" class="round" /> <span>Pay online</span></p>
            </div>
            <div class="pay-on-delivery">
            	<p><input type="radio" name="way-of-pay" class="round" /> <span>Pay by cash on delivery.</span></p>
                <p>&nbsp;</p>
                <p><input type="radio" name="way-of-pay" class="round" /> <span>Debit and credit card payments on point of sale (POS) terminal.</span></p>
            </div>
            
            <section class="next-button group">
         		<div class="wrapper group">
           			<a href="card6.php">NEXT</a>
           		</div>
       		</section>
            
        </div>
    </div>
</section>

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