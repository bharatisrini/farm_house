<?php
include ('database/db_connect.php');
error_reporting(0);
 $sql_lan_id = "select countrylang_id from farmhouse_country_language where selected = '1'";
				$res_lan_id = mysqli_query($conn,$sql_lan_id);
				$row_lan_id = mysqli_fetch_array($res_lan_id);
				$langid = $row_lan_id['countrylang_id'];
				
				$sql_menu = "select * from farmhouse_footer where countrylang_id = '$langid'";
				$res_menu = mysqli_query($conn,$sql_menu);
				$row_menu = mysqli_fetch_array($res_menu);
                				
?>

<section class="main-links group">
    <div class="wrapper group">
    	<ul class="small group">
        	<li><a href="lifestyle.php" class="small-1"></a></li>
            <li><a href="index.php" class="small-2"></a></li>
            <li><a href="detox.php" class="small-3"></a></li>
        </ul>
        <div class="newsletter group">
        	<p class="text"><?php echo $row_menu['heading']; ?></p>
            <form action="./email.php" method="post" class="group">
            	<input type="text" name="email"  placeholder="<?php echo $row_menu['placeholder']; ?>" >
                <input type="submit" name="submit" value="<?php echo $row_menu['button_name']; ?>" />
            </form>
            <ul class="big group">
                <li><a href="#" class="big-1"></a></li>
                <li><a href="#" class="big-2"></a></li>
                <li><a href="#" class="big-3"></a></li>
                <li><a href="http://www.wechat.com" class="big-4"></a></li>
                <li><a href="https://www.facebook.com/FarmhouseJuiceChina?fref=ts" class="big-5"></a></li>
                <li><a href="#" class="big-6"></a></li>
            </ul>
        </div>
    </div>
</section>

<footer class="group">
	<div class="wrapper group">
    	<div class="bottom-logo f-left"><a href="index.php" class="logo"></a></div>
        <div class="copy">
        	<ul>
            	<li><a href="<?php echo $row_menu['carrers_link']; ?>"><?php echo $row_menu['carrers']; ?></a></li>
                <li><a href="<?php echo $row_menu['contactus_link']; ?>"><?php echo $row_menu['contactus']; ?></a></li>
            </ul>
            <span><?php echo $row_menu['copyright']; ?></span>
        </div>
    </div>
</footer>

<!--  <section class="main-links group">
	<div class="wrapper group">
    	<ul class="small group">
        	<li><a href="#" class="small-1"></a></li>
            <li><a href="#" class="small-2"></a></li>
            <li><a href="#" class="small-3"></a></li>
        </ul>
        <div class="newsletter group">
        	<p class="text">STAY INFORMED. JOIN OUR NEWSLETTER</p>
            <form action="#" method="post" class="group">
            	<input type="text" name="email"  placeholder="Enter your email address" >
                <input type="submit" name="submit" value="SEND" />
            </form>
            <ul class="big group">
                <li><a href="#" class="big-1"></a></li>
                <li><a href="#" class="big-2"></a></li>
                <li><a href="#" class="big-3"></a></li>
                <li><a href="#" class="big-4"></a></li>
                <li><a href="#" class="big-5"></a></li>
                <li><a href="#" class="big-6"></a></li>
            </ul>
        </div>
    </div>
</section>

<footer class="group">
	<div class="wrapper group">
    	<div class="bottom-logo f-left"><a href="#" class="logo"></a></div>
        <div class="copy">
        	<ul>
            	<li><a href="#">Careers</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
            <span>Copyright © 2014 Farmhouse Juice Hospitality Group China.</span>
        </div>
    </div>
</footer> -->