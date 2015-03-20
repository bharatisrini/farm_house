<?php
define('INCLUDE_CHECK',1);
require "connect.php";
include("db_connect.php");

if(!$_POST)
{
echo "gone";
	if($_SERVER['HTTP_REFERER'])
	header('Location : '.$_SERVER['HTTP_REFERER']);
	
	exit;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Checkout! | Tutorialzine demo</title>

<link rel="stylesheet" type="text/css" href="demo.css" />

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>

<script type="text/javascript" src="simpletip/jquery.simpletip-1.3.1.pack.js.txt"></script>


<script type="text/javascript" src="script.js"></script>

</head>

<body>

<div id="main-container">

    <div class="container">
    
    	<span class="top-label">
            <span class="label-txt">Your order</span>
        </span>
        
        <div class="content-area">
    
    		<div class="content">
            	
                <?php
				$a="";
				$cnt = array();
				$products = array();
				
				foreach($_POST as $key=>$value)
				{
					$key=(int)str_replace('_cnt','',$key);
				
					$products[]=$key;
					$cnt[$key]=$value;
				}
				$sql = "select * from internet_shop where id IN(".join($products,',').")";
				$result = mysqli_query($conn,$sql);

				//$result = mysql_query("SELECT * FROM internet_shop WHERE id IN(".join($products,',').")");
				
				if(!mysqli_num_rows($result))
				{
					echo '<h1>There was an error with your order!</h1>';
				}
				else
				{
					echo '<h1>You ordered:</h1>';
					
					while($row=mysqli_fetch_assoc($result))
					{
					
						echo '<h2>'.$cnt[$row['id']].' - '.$row['name'].'</h2>';
						$total+=$cnt[$row['id']]*$row['price'];
						$id=$row['id'];
						$qty=$cnt[$row['id']];
						$name = $row['name'];
						$price = $row['price'];
						$id_tot= $qty * $price;
					
					 $query_in = "insert into farmhouse_admin_temp_insert_prg (prod_id,name,price,qty,id_total) values ('$id','$name','$price','$qty','$id_tot') ";						
		  		      mysqli_query($conn,$query_in) or die(mysqli_error($conn));
				
				$a = $a.",".$name;
				//echo "Coming here ";
				/*echo $row['name'];
								
						$sql_get_item = "Select * from farmhouse_admin_temp_insert_prg";
						$result_get_item = mysql_query($sql_get_item);
						while($row_get_item = mysql_fetch_array($result_get_item))
						{
				     		$p_name =$row_get_item['name'];
					 		$qty = $row_get_item['qty'];
					 
								echo $p_name;
								echo $qty;
					} //$price = $row['id_total'];  */                                                                                     
				}
				$a=substr($a,1);
				echo $a;
					
				      $sql_up = "update farmhouse_lifestyle_program set lifestyle_items = '$a' , lifestyle_price='$total'";
   $res_up = mysqli_query($conn,$sql_up);
   if($res_up) {
   //header("Location:/partials_admin/index.php"); exit;
   $sql_del = "delete from farmhouse_admin_temp_insert_prg";
$res_del = mysqli_query($conn,$sql_del);

	
   ?>
       				<script>
					window.location = "../index.php";
					</script>
					<?php
   }
 
   else
    echo "error";
}
			$names;
					echo '<h1>Total: $'.$total.'</h1>';
					
					$sql_get_item = "Select name from farmhouse_admin_temp_insert_prg";
					
					//echo $sql_get_item;
						$result_get_item = mysql_query($sql_get_item);
						while($row_get_item = mysql_fetch_array($result_get_item))
						{
						$name = $row_get_item['name'];
						echo $name;
					   $names= $names . ",". $name;
						//echo $names;		
   
				}
		 
			
               
				 ?>						
										 
       	        <div class="clear"></div>
            </div>

        </div>
        
        <div class="bottom-container-border">
        </div>

    </div>

</div>

</body>
</html>
