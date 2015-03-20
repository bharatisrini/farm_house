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
    
    
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
	
</head>
<body class="info">

<?php include("includes/header.php"); ?>
<?php $sql = "select * from farmhouse_info_faq where countrylang_id = '$lid'";
				$res = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($res);
?>				

<section class="info-faq fixed-top group">
	<div class="wrapper group">
    	<div class="tab-box group">
			<div class="tabs group">
				<ul>
					<li><a href="#" class="active" id="tab1-click"><?php echo $row['why_button_name']; ?></a></li>
                    <li><a href="#" id="tab2-click"><?php echo $row['how_button_name']; ?></a></li>
                    <li><a href="#" id="tab3-click"><?php echo $row['tips_button_name']; ?></a></li>
                    <li><a href="#" id="tab4-click"><?php echo $row['story_button_name']; ?></a></li>
                    <li><a href="#" id="tab5-click"><?php echo $row['tech_button_name']; ?></a></li>	
                </ul>
            </div>
            <div class="tab-content group">
             	<div id="tab1" class="display">
                	<h3><?php echo $row['why_heading']; ?></h3>
					<p>&nbsp;</p>
					<img src="<?php echo $row['why_image']; ?>" alt="#" class="full-width" />
                    <p>&nbsp;</p>
                    <p class="text-center"><?php echo $row['why_discription']; ?></p>
                </div>
             	<div id="tab2">
                	<h3><?php echo $row['how_heading']; ?></h3>
                    <p>&nbsp;</p>
                    <img src="<?php echo $row['why_image']; ?>" alt="#" class="image-center" />
                    <p>&nbsp;</p>
                    <p class="text-justify"><?php echo $row['why_discription']; ?>.</p>
                </div>
                <div id="tab3">
                	<h3><?php echo $row['tips_heading']; ?></h3>
                    <img src="<?php echo $row['tips_image']; ?>" class="image-center" />
                    <p>&nbsp;</p>
                    <ul>
                    	<li class="leaf"><?php echo $row['tips_discription']; ?></li>
                    </ul>
                    
                    
                </div>
                <div id="tab4">
                	<h3><?php echo $row['story_heading']; ?></h3>
					<p>&nbsp;</p>
					<img src="<?php echo $row['story_image']; ?>" alt="#" class="full-width" />
                    <p>&nbsp;</p>
                    <p class="text-center"><?php echo $row['story_discription']; ?></p>
                </div>
                <div id="tab5">
                	<h3><?php echo $row['tech_heading']; ?></h3>
                    <p>&nbsp;</p>
                    <img src="<?php echo $row['tech_image']; ?>" alt="#" class="image-center" />
                    <p>&nbsp;</p>
                    <p class="text-justify"><?php echo $row['tech_discription']; ?></p>
                </div>
            </div>

		</div>
    </div>
</section>

<script>

		$('#tab1-click').click(function (e) {
			e.stopPropagation();
			$('#tab1').toggleClass('display');
			$(this).toggleClass('active');
			$('#tab3, #tab2, #tab4, #tab5').removeClass('display');
			$('#tab3-click, #tab2-click, #tab4-click, #tab5-click').removeClass('active');

		});
		$('#tab2-click').click(function (e) {
			e.stopPropagation();
			$('#tab2').toggleClass('display');
			$(this).toggleClass('active');
			$('#tab3, #tab1, #tab4, #tab5').removeClass('display');
			$('#tab3-click, #tab1-click, #tab4-click, #tab5-click').removeClass('active');
		});
		$('#tab3-click').click(function (e) {
			e.stopPropagation();
			$('#tab3').toggleClass('display');
			$(this).toggleClass('active');
			$('#tab1, #tab2, #tab4, #tab5').removeClass('display');
			$('#tab1-click, #tab2-click, #tab4-click, #tab5-click').removeClass('active');
		});
		$('#tab4-click').click(function (e) {
			e.stopPropagation();
			$('#tab4').toggleClass('display');
			$(this).toggleClass('active');
			$('#tab3, #tab2, #tab1, #tab5').removeClass('display');
			$('#tab3-click, #tab2-click, #tab1-click, #tab5-click').removeClass('active');
		});
		$('#tab5-click').click(function (e) {
			e.stopPropagation();
			$('#tab5').toggleClass('display');
			$(this).toggleClass('active');
			$('#tab3, #tab2, #tab4, #tab1').removeClass('display');
			$('#tab3-click, #tab2-click, #tab4-click, #tab1-click').removeClass('active');
		});
	
</script>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>