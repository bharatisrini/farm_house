<?php
error_reporting(0);
define('INCLUDE_CHECK',1);
require "db_connect.php";

$sql_lan_id = "select countrylang_id from farmhouse_country_language where selected = '1'";
				$res_lan_id = mysqli_query($conn,$sql_lan_id);
				$row_lan_id = mysqli_fetch_array($res_lan_id);
				$lid = $row_lan_id['countrylang_id'];
		

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add Lifestyle Items</title> 

<link rel="stylesheet" type="text/css" href="demo.css" />

<!--[if lt IE 7]>
<style type="text/css">
	.pngfix { behavior: url(pngfix/iepngfix.htc);}
    .tooltip{width:200px;};
</style>
<![endif]-->


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js"></script>


<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main-container">

    <div class="container">
    
        <div class="content-area">
    
    		<div class="content drag-desired">
            	
                <?php
				$dname = $_REQUEST['dname'];
				 $langId = $_REQUEST['langId'];

				$result = mysqli_query($conn,"SELECT * FROM farmhouse_juice_details where product_type = 'juice' and countrylang_id = '$langId' order by product_id");
				while($row=mysqli_fetch_assoc($result))
				{
					echo '<div class="product"><img src="img/products/'.$row['image'].'" alt="'.htmlspecialchars($row['name']).'" width="128" height="128" class="pngfix" /></div>';
				}

				?>
                
                
       	        <div class="clear"></div>
            </div>

        </div>
        
        <div class="bottom-container-border">
        </div>

    </div>



    <div class="container">
    
    	
        <div class="content-area">
    
    		<div class="content drop-here">
            	<div id="cart-icon">
	            	<img src="img/icon-basket-lifestyle-blue.png" alt="shopping cart" class="pngfix" width="128" height="128" />
					<img src="img/ajax_load_2.gif" alt="loading.." id="ajax-loader" width="16" height="16" />
                </div>

				<form name="checkoutForm" method="post" action="order_lifestyle.php">
                
                <div id="item-list">
                </div>
                <input type = "hidden" name = "dname" value = '<?=$dname?>' />
                <input type = "hidden" name = "langId" value = '<?=$langId?>' />
				</form>                
                <div class="clear"></div>

				<div id="total"></div>

       	        <div class="clear"></div>
                
                <a href="" onclick="document.forms.checkoutForm.submit(); return false;" class="button">Save and Back</a>
                
          </div>

        </div>
        
        <div class="bottom-container-border">
        </div>

    </div>


</body>
</html>
