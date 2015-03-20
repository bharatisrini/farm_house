<?php 
include('database/db_connect.php'); 
error_reporting(0);
session_start();
$cid = $_SESSION["customer_id"];
?>

<header class="group">
	<div class="wrapper group">
    	<div class="logo group"><a href="index.php"><img src="images/logo-big.png" alt="Logo" /></a></div>
		
        <div class="top-menu">
        	<ul>
            	<?php if(isset($cid)) {?><li><a href="javascript:void(0)" class="card"></a></li><?php } ?>
                <li><a href="javascript:void(0)" class="lang"></a>
                	<ul class="sub-menu">
                    	<li><a href="" class="active">Eng</a></li>
                        <li><a href="">Chi</a></li>
                    </ul>
                </li>
            </ul>

             
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
				$sql_ct = "select * from farmhouse_temp_cart_fh where customer_id = '$cid'";
				$res_ct = mysqli_query($conn,$sql_ct);
				while($row_ct = mysqli_fetch_array($res_ct))
				{
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
				
				?>
                
                
             
                
            </div>
        </div>
		
        <nav class="menu group">
        	<ul>
            	<li><a href="index.php" class="home active"></a></li>
                <li><a href="jucie.php">JUICE</a></li>
                <li><a href="lifestyle.php">FARMHOUSE LIFESTYLE</a></li>
                <li><a href="detox.php">DETOX</a></li>
                <li><a href="info.php">INFO AND F.A.Q</a></li>
                <li> <a href="front.php">LOGIN </a></li>  	
				
            </ul>
        </nav>
        <a href="#" class="menu-toggle"></a>
    </div>
</header>
