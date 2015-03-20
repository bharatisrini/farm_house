<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
$ip = $_SERVER["REMOTE_ADDR"];
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
				
				<li><a href="javascript:void(0)" class="card"></a></li>
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
								  
            	<?php
				      $sql2="SELECT sum(total_item_amount) as total FROM farmhouse_temp_cart_fh where customer_id = '$cid'";
				      $res2 = mysqli_query($conn,$sql2); 
														  
				// Fetch one and one row
				      $row2=mysqli_fetch_assoc($res2);
				?>
					  
            	<div class="check-it group"><a href="card1.php">CHECK MY CART <br />
				
				 <?php  if(isset($cid)) { echo "¥".$row2['total']."RMB"; } else {  echo "¥"."0"."RMB"; } ?></a>
			</div>
                <div class="title gray group">Subscriptions:</div>
                
                <div class="subscriptions white group">
                	<div class="image detox group">DETOX</div>
					<?php 
					$sql_ct = "select * from farmhouse_temp_schedule_detox where customer_id = '$cid'";
					$res_ct = mysqli_query($conn,$sql_ct);
					$row_ct = mysqli_fetch_array($res_ct)
					
					?>
			
					<div class="details-two group">
                    	<div class="row group">
                        	<div class="f-left">A</div>
                            <div class="f-right"><?php  $tot = $row_ct['no_people'] * $row_ct['no_days_detox']; echo $tot;  ?></div>
                        </div>
                        <div class="clear"></div>
                    <!-- //    <div class="row group">
                      //  	<div class="f-left">C</div>
                        //    <div class="f-right">2</div>
                       // </div> -->
                    </div>
					<?php  ?>
				
                </div>
                
                <div class="subscriptions gray group">
                	<div class="image lifestyle group">LIFESTYLE</div>
                    <!--<div class="details-one group">
                    	<div class="row group">
                        	<div class="f-left">B</div>
                            <div class="f-right">3</div>
                        </div>
                    </div>-->
                </div>
                
                 <div class="title white group">Retail:</div>
				<?php 
				if (!$cid){
				$sql_ct = "select * from farmhouse_temp_cart_fh where ip = '$ip' and customer_id = ''";
				
				$res_ct = mysqli_query($conn,$sql_ct);
				
				while($row_ct = mysqli_fetch_array($res_ct))
				{
//					echo $row_ct['product_image_url'];
				?>
				<div class="reatil-box gray group">
                	<div class="image"><img src="<?php  echo $row_ct['product_image_url'];?>"  height="60"/> </div>
                    <div class="name"><?php  echo $row_ct['product_name'];  ?></div>
                    <div class="number">
                    	<div class="value">
                        	 <a href="#" class="remove"></a> 
                            <div class="num"><?php if(isset($cid)) { echo $row_ct['no_items']; } ?></div>
                            <a href="#" class="add"></a>
                        </div>
                    </div>
                </div>
				
				<?php }
				
				
				}
				else{
	//			echo " Yes CID ";
				$sql_ct = "select * from farmhouse_temp_cart_fh where customer_id = '$cid'";
				$res_ct = mysqli_query($conn,$sql_ct);
				while($row_ct = mysqli_fetch_array($res_ct))
				{
		//			echo $row_ct['product_image_url'];
				?>
				<div class="reatil-box gray group">
                	<div class="image"><?php if(isset($cid)) { ?><img src="<?php  echo $row_ct['product_image_url'];?>"  height="60"/> <?php } ?></div>
                    <div class="name"><?php if(isset($cid)) { echo $row_ct['product_name']; } ?></div>
                    <div class="number">
                    	<div class="value">
                        	 <a href="#" class="remove"></a> 
                            <div class="num"><?php if(isset($cid)) { echo $row_ct['no_items']; } ?></div>
                            <a href="#" class="add"></a>
                        </div>
                    </div>
                </div>
				
				<?php }
				
				
				}
?>
				
                
             
                
            </div>
          
        </div>
		 
        <nav class="menu">
		<ul>
		
				<?php $sql_lan_id = "select countrylang_id from farmhouse_country_language where selected = '1'";
				$res_lan_id = mysqli_query($conn,$sql_lan_id);
				$row_lan_id = mysqli_fetch_array($res_lan_id);
				$lid = $row_lan_id['countrylang_id'];
				$sql_menu = "select * from farmhouse_menu where countrylang_id = '$lid'";
				$res_menu = mysqli_query($conn,$sql_menu);
				$row_menu = mysqli_fetch_array($res_menu);
                    ?>
						
										
				<li><a href="index.php" class="home active"></a></li>
                <li><a href="<?php echo $row_menu['menu_link1']; ?>"><?php echo $row_menu['menu_name1']; ?></a></li>
                <li><a href="<?php echo $row_menu['menu_link2']; ?>"><?php echo $row_menu['menu_name2']; ?></a></li>
                <li><a href="<?php echo $row_menu['menu_link3']; ?>"><?php echo $row_menu['menu_name3']; ?></a></li>
                <li><a href="<?php echo $row_menu['menu_link4']; ?>"><?php echo $row_menu['menu_name4']; ?></a></li>
				<?php if ($_SESSION["customer_name"]=="")
					 {?>
                <li><a href='<?php echo $row_menu['menu_link5']; ?>'><?php echo $row_menu['menu_name5']; ?></a>  | <a href='<?php echo $row_menu['menu_link6']; ?>'><?php echo $row_menu['menu_name6']; ?></a></li>
					<?php }else{  ?>
				<li>
			<div class="click-nav">
			<ul class="no-js">
			
				<li><a class="clicker">Hi,<?=$_SESSION["customer_name"]; ?></a>
				<ul>
					<li class="dsp"><img src="customer_images/default-image.png" alt="Icon"><?=$_SESSION["customer_name"]; ?><li>
					<li> <a href='<?php echo $row_menu['menu_link7']; ?>'><?php echo $row_menu['menu_name7']; ?> </a></li>
					 <li> <a href='<?php echo $row_menu['menu_link8']; ?>'><?php echo $row_menu['menu_name8']; ?> </a> </li> 
					  <li> <a href='<?php echo $row_menu['menu_link9']; ?>'><?php echo $row_menu['menu_name9']; ?></a> </li>
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
