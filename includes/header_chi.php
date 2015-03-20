<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
$cid = $_SESSION["customer_id"];
?>
	<style>
.click-nav ul {
	font-weight:500;
}
.click-nav ul li {
	position:relative;
	list-style:none;
	cursor:pointer;
}
.click-nav ul li ul {
	position:absolute;
	left:0;
	right:0;
}
.click-nav ul .clicker {
	background:#FFFFFF;
	color:#22222;
}
.click-nav ul .clicker:hover,
.click-nav ul .active {

}
.dsp img {
	position:absolute;
}
.click-nav ul li a {
	transition:background-color 0.2s ease-in-out;
	-webkit-transition:background-color 0.2s ease-in-out;
	-moz-transition:background-color 0.2s ease-in-out;
	display:block;
	
	background:#FFF;
	color:#333;
	text-decoration:none;
	width:130px;
	font-size:14px;
}
.click-nav ul li a:hover {
	background:#F2F2F2;
}
/* Fallbacks */
.click-nav .no-js ul {
	display:none;
}
.click-nav .no-js:hover ul {
	display:block;

}</style>

<header class="group">
	<div class="wrapper group">
    	<div class="logo group"><a href="index.php"><img src="images/logo-big.png" alt="Logo" /></a></div>
        <div class="top-menu">
        	<ul>
				
				<?php if(isset($cid)) {?><li><a href="javascript:void(0)" class="card"></a></li><?php } ?>
                <li><a href="javascript:void(0)" class="lang"></a>
                	<ul class="sub-menu">
		<?php		$sql_lan = "select distinct language from farmhouse_country_language";
				$res_lan = mysqli_query($conn,$sql_lan); 
				while($row_lan = mysqli_fetch_array($res_lan)){ ?>
                    	<li><a href="#" class="active" onclick="chnglang('<?=$row_lan['language']; ?>')"><?=$row_lan['language']; ?></a></li>
                        <!-- <li><a href="">Chi</a></li>-->
						<?php } ?>
                    </ul>
                </li>
            </ul>
			
			<script>
			function chnglang(lang) {
			   var lang_fn = lang;
			   window.location.href="./includes/chng_lang.php?lang1="+lang_fn;
					
					
			}
			</script>


            <div class="check-my-card group">
								  
            	<div class="check-it group"><a href="card1.php">CHECK MY CART <br /></div>
             <!--   <div class="subscriptions white group">-->
                	<!-- <div class="image detox group">DETOX</div> -->
					<!--  </div>-->
              <!-- <div class="subscriptions gray group"> </div>-->
              <!-- <div class="reatil-box gray group"> </div>-->
			</div>
        </div>
		
        <nav class="menu">
		<ul>
            	<li><a href="index.php" class="home active"></a></li>
                <li><a href="jucie.php">果汁</a></li>
                <li><a href="lifestyle.php">农舍生活方式</a></li>
                <li><a href="detox.php">排毒</a></li>
                <li><a href="info.php">信息和F.A.Q</a></li>
				<?php if ($_SESSION["customer_name"]=="")
					 {?>
                <li><a href='front.php'>登录</a>  | <a href='signup.php'>登录</a></li>
					<?php }else{  ?>
				<li>
			<div class="click-nav">
			<ul class="no-js">
			
				<li><a class="clicker">您好,<?=$_SESSION["customer_name"]; ?></a>
				<ul>
					<li class="dsp"><img src="customer_images/default-image.png" alt="Icon"><?=$_SESSION["customer_name"]; ?><li>
					<li> <a href='view_order_details.php'>查看订单</a></li>
					<!--  <li> <a href='reschedule.php'>Reschedule </a> </li> -->
					  <li> <a href='logout.php'>注销</a> </li>
						</ul>
				</li>
			</ul>
	</div>
				 	 
				 <?php
				 }
				 				 
				 ?></li>
				</li>
            </ul>
        </nav>
        <a href="#" class="menu-toggle"></a>
    </div>
</header>
