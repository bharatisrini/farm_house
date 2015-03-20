<?php
include('database/db_connect.php');
error_reporting(0);
session_start();
  ?>

<!DOCTYPE html>
<html>
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
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    
	<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>


	
	
</head>
<body class="home">

<header class="group">
	<div class="wrapper group">
    	<div class="logo group"><a href="index.html">&nbsp;</a></div>
        <div class="top-menu">
        	<ul>
            	<li>
                <?php if ($_SESSION["customer_name"]=="")
				  {
					  echo "<a href='sigin.php' class='card'>";
				  }
				  else
				  {
				      echo "<a href='cart.php' class='card'>";	  
				  }
				  
                ?>
                
                </a></li>
                <li><a href="#" class="lang"></a>
                	<ul class="sub-menu">
                    	<li><a href="#" class="active">Eng</a></li>
                        <li><a href="#">Chi</a></li>
                    </ul>
                </li>
            </ul>
            <script>
			   	$('.card').click(function (e) {
					e.stopPropagation();
					$('.check-my-card').toggleClass('display');
					$(this).toggleClass('active')
				});
				/*
				$(document).click(function (e) {
					if (e.target.className == 'check-my-card') return;
					$('.check-my-card').removeClass('display');
					$('.card').removeClass('active');
				});*/
			</script> 

            <div class="check-my-card group">
            	<div class="check-it group"><a href="#">CHECK MY CART</a></div>
                
                <div class="title gray group">Subscriptions:</div>
                
                <div class="subscriptions white group">
                	<div class="image detox group">DETOX</div>
                    <div class="details-two group">
                    	<div class="row group">
                        	<div class="f-left">A</div>
                            <div class="f-right">5</div>
                        </div>
                        <div class="clear"></div>
                        <div class="row group">
                        	<div class="f-left">C</div>
                            <div class="f-right">2</div>
                        </div>
                    </div>
                </div>
                
                <div class="subscriptions gray group">
                	<div class="image lifestyle group">LIFESTYLE</div>
                    <div class="details-one group">
                    	<div class="row group">
                        	<div class="f-left">B</div>
                            <div class="f-right">3</div>
                        </div>
                    </div>
                </div>
                
                <div class="title white group">Retail:</div>
                
                <div class="reatil-box gray group">
                	<div class="image"><img src="images/icon-bottle-4-card.png" alt="SPICY LEMONADE" /></div>
                    <div class="name"><img src="images/icon-4.png" alt="SPICY LEMONADE" /><br><br>SPICY LEMONADE</div>
                    <div class="number">
                    	<div class="value">
                        	<a href="#" class="remove">-</a>
                            <div class="num">8</div>
                            <a href="#" class="add">+</a>
                        </div>
                    </div>
                </div>
                
                <div class="reatil-box white group">
                	<div class="image"><img src="images/icon-bottle-8-card.png" alt="REHYDRATOR" /></div>
                    <div class="name"><img src="images/icon-8.png" alt="REHYDRATOR" /><br><br>REHYDRATOR</div>
                    <div class="number">
                    	<div class="value">
                        	<a href="#" class="remove">-</a>
                            <div class="num">1</div>
                            <a href="#" class="add">+</a>
                        </div>
                    </div>
                </div>
                
                <div class="reatil-box gray group">
                	<div class="image"><img src="images/icon-bottle-6-card.png" alt="HORCHATA" /></div>
                    <div class="name"><img src="images/icon-6.png" alt="HORCHATA" /><br><br>HORCHATA</div>
                    <div class="number">
                    	<div class="value">
                        	<a href="#" class="remove">-</a>
                            <div class="num">8</div>
                            <a href="#" class="add">+</a>
                        </div>
                    </div>
                </div>
                
                <div class="reatil-box white group">
                	<div class="image"><img src="images/icon-bottle-7-card.png" alt="AMINO HYDRATE" /></div>
                    <div class="name"><img src="images/icon-7.png" alt="AMINO HYDRATE" /><br><br>AMINO HYDRATE</div>
                    <div class="number">
                    	<div class="value">
                        	<a href="#" class="remove">-</a>
                            <div class="num">1</div>
                            <a href="#" class="add">+</a>
                        </div>
                    </div>
                </div>
                
                <div class="total-price">¥2244.00 RMB</div>
                
            </div>
        </div>
        <nav class="menu group">
        	<ul>
            	<li><a href="index.php" class="home active"></a></li>
                <li><a href="jucie.php">JUICE</a></li>
                <li><a href="#">FARMHOUSE LIFESTYLE</a></li>
                <li><a href="detox.php">DETOX</a></li>
                <li><a href="info.php">INFO AND F.A.Q</a></li>
                <li> <?php if ($_SESSION["customer_name"]=="")
					 {
					        echo "<a href='front.php'>"; echo "LOGIN"; echo "</a>";  echo "| <a href='signup.php'>SIGN UP</a>";
							 }
					 else
					 { echo $_SESSION["customer_name"];
				 echo "| <a href='logout.php'>Logout</a></li> </a>";
				 }						 
				 ?>
            </ul>
        </nav>
        <a href="#" class="menu-toggle"></a>
    </div>
</header>
</body>
</html>