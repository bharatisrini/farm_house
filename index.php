<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
$cid = $_SESSION["customer_id"];
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
    
    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
    
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>

</head>
<body class="home">

<?php include("includes/header.php"); ?>
<?php $sql = "select * from farmhouse_index where countrylang_id = '$lid'";
				$res = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($res);
?>				
		 		
<section class="slider fixed-top group">
	<div class="wrapper">
    	<div class="index-slider">
          <div><img src="<?php echo $row['image1']; ?>" alt="Food" /></div>
          <div><div align="center"><img src="images/single-big-bottle-1.jpg" /></div></div>
          <div><img src="<?php echo $row['image1']; ?>" alt="Food" /></div>
        </div>
        
        <div class="clear"></div>
        <h2><?php echo $row['heading1']; ?></h2>
        <p><?php echo $row['discription1']; ?></p>
    </div>
</section>

<section class="buy-now">
	<div class="wrapper">
    	<div class="bottles">
        	<a href="#" class="mask"><img src="<?php echo $row['image2']; ?>" alt="Buy Now" /></a>
        </div>
        <h2><?php echo $row['heading2']; ?></h2>
        <p><?php echo $row['discription2']; ?>.</p>
    </div>
</section>

<section class="detox">
	<div class="wrapper">
    	<img src="<?php echo $row['image3']; ?>" class="full-image" />
        <div class="clear"></div>
        <h2><?php echo $row['heading3']; ?></h2>
        <p><?php echo $row['discription3']; ?></p>
        <p><?php echo $row['discription3']; ?></p>
	</div>
</section>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>