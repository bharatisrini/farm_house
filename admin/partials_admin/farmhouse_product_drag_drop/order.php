<?php
define('INCLUDE_CHECK',1);
//require "connect.php";
session_start();
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
				$dname = $_REQUEST['dname'];
				 $langId = $_REQUEST['langId'];
						//echo "Product Name".$dname;
				
				$a="";
				$pdId="";
				$cnt = array();
				$products = array();

				foreach($_POST as $key=>$value)
				{
					$key=(int)str_replace('_cnt','',$key);

					$products[]=$key;
					$cnt[$key]=$value;
				}
				
				$result = mysqli_query($conn,"SELECT * FROM farmhouse_juice_details WHERE  countrylang_id = '$langId' and product_id IN(".join($products,',').")");
				

				/*if(mysqli_num_rows($result))

				{

		echo '<h1>There was BLUNDER with your order!</h1>';
				}

				else

				{
			echo '<h1>There was no BLUNDER with your order!</h1>';

				}
*/


				//$result = mysql_query("SELECT * FROM internet_shop WHERE id IN(".join($products,',').")");

				if(mysqli_num_rows($result)<=0)
				{
					echo '<h1>There was A big error with your order!</h1>';
				}
				else
				{
					echo '<h1>Detox Items:</h1>';
                    $total=0; $name="";
					while($row=mysqli_fetch_array($result))
					{
					
                        $name="";
						echo '<h2>'.$cnt[$row['product_id']].' - '.$row['name'].'</h2>';
						
						$reg_name = $row['name'];
						
						$total_items = $cnt[$row['product_id']]*$row['price'];
						$total = $total + $total_items;
						$id=$row['product_id'];
						$qty=$cnt[$row['product_id']];
						
						for($i=1; $i<=$qty; $i++){
							
						  if($qty>1) {
						  $name .= $row['name'];
						
						  if($qty != $i){
						  
						  $name .= ",";}
						  }
						  else
						   
						  $name .= $row['name'];
						}
							
						$price = $row['price'];
						$id_tot= $qty * $price;
					
					 $query_in = "insert into farmhouse_admin_temp_insert_prg (prod_id,name,price,qty,id_total) values ('$id','$name','$price','$qty','$id_tot') ";
		  		      mysqli_query($conn,$query_in); //or die(mysqli_error($conn));

				$a = $a.",".$name;
				$pdId=$pdId.",".$id;
						
						//$sql_insert_items = "insert into farmhoue_program_items (program_id,program_name,product_id,product_name,status)";
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
				$pdId=substr($pdId,1);
				$arr_item = explode(",",$a);
				$no_of_rows = count($arr_item);

				for($j=0; $j<$no_of_rows; $j++){
				//echo $a;
				$sql_pro = "select * from farmhouse_juice_details where name = '$arr_item[$j]'";
		$res_pro = mysqli_query($conn,$sql_pro);
		$row_pro = mysqli_fetch_array($res_pro);
	     $pro_id = $row_pro['product_id'];
				$sql_query_in_prod = "insert into farmhouse_program_items(program_name,product_id,product_name,program_type)values('$dname','$pro_id','$arr_item[$j]','Detox')";
							mysqli_query($conn,$sql_query_in_prod);
					}		
				$sql_get_id = "select MAX(detox_id) as d_id from farmhouse_detox_program ";
				$result_get_id = mysqli_query($conn,$sql_get_id);
				$row_get_id = mysqli_fetch_array($result_get_id);
				$d_id = $row_get_id['d_id'];

				      $sql_up = "update farmhouse_detox_program set detox_items = '$a' , detox_price='$total', detox_item_id='$pdId' where detox_id = '$d_id'";
   $res_up = mysqli_query($conn,$sql_up);
   if($res_up) {

   $sql_del = "delete from farmhouse_admin_temp_insert_prg";
$res_del = mysqli_query($conn,$sql_del);

   //header("Location:/partials_admin/index.php"); exit;

   ?>
       				<script>
					//window.location = "../index.php";
					</script>
					<?php
   }

   else
    echo "error";
}
			$names;
			        
					echo "<input type='text' value='$total' size=2 id='pr'><input type='button' value='Save' id='buton' onclick='save_price()'>";
					echo "<strong>You can change the amount here</strong>";

					//$sql_get_item = "select name from farmhouse_admin_temp_insert_prg";

					//echo $sql_get_item;
					//<h1 id='tot'>Total Price: $".$total."</h1>
						

				 ?>
				 <script>
					function save_price()
					{
					var xmlhttp;
					var get_price = document.getElementById("pr").value; //alert(get_price);
					if (window.XMLHttpRequest)
					{// code for IE7+, Firefox, Chrome, Opera, Safar
					xmlhttp=new XMLHttpRequest();
					}
					else
					{// code for IE6, IE5
					xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function()
					{
					if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					document.getElementById("pr").value=xmlhttp.responseText;
					window.location = "../index.php";
					}
					}
					xmlhttp.open("GET","save_price.php?msg=detox&price="+get_price,true);
					xmlhttp.send();
					}
                 </script>

       	        <div class="clear"></div>
            </div>

        </div>

        <div class="bottom-container-border">
        </div>

    </div>

</div>

</body>
</html>
