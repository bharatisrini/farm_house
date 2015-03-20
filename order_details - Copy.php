<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cdate=date("Y-m-d");
$cid = $_SESSION["customer_id"];
//echo $cid;
//$order_id = rand(100,9999999);
$order_id='9142464';
/* Juice or Retail */
$ch=0;

					  $sql_jdn="SELECT * FROM farmhouse_customer where customer_id = '$cid'";
				      $res_jdn = mysqli_query($conn,$sql_jdn); 
					  $row_jdn=mysqli_fetch_assoc($res_jdn);
					  $customer_name = $row_jdn['firstname'] . " " . $row_jdn['lastname'];
						  
					  $sql_jda="SELECT * FROM farmhouse_customer_address where customer_id = '$cid' and address_id = '1'";
				      $res_jda = mysqli_query($conn,$sql_jda); 
					  $row_jda = mysqli_fetch_assoc($res_jda);
					  $customer_juice_address = $row_jda['address']. ", " . $row_jda['address_district'].  ", " . $row_jda['address_city'];
					  $address_id = $row_jda['address_id'];
					  $sql_juice="SELECT * FROM farmhouse_temp_cart_fh where customer_id = '$cid'";
				      $res_juice = mysqli_query($conn,$sql_juice); 
				      while($row_juice=mysqli_fetch_assoc($res_juice)){
						 $product_id = $row_juice['product_id'];
						 $product_name= $row_juice['product_name'];
						 $qty= $row_juice['no_items'];
						 $product_price= $row_juice['product_price'];
						 $product_total= $row_juice['total_item_amount'];
						 $product_type = "Retail";
						 $payment_method = $row_juice['payment_method'];
						 $payment_type = $row_juice['payment_type'];
						 $card_name = $row_juice['card_name'];
						 $delivery_address = $row_juice['address'];
						 $delivery_date = $row_juice['date_added'];
						$sql_order_insert = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name, product_price, quantity_ordered, product_total, delivery_address, 
						customer_id, payment_method, payment_type, card_name, delivery_dates,program_type,date_added) values 			
						('$order_id','$customer_name','$product_id','$product_type','$product_name','$product_price','$qty','$product_total','$customer_juice_address','$cid','$payment_method',
						'$payment_type','$card_name','$delivery_date','$product_type','$cdate')";
				    	$res_order_insert = mysqli_query($conn,$sql_order_insert);
					
							 
					 
					 	$sql_juice_delivery = "insert into  farmhouse_delivery_schedule 
						(order_id, customer_id, product_type, delivery_date, delivery_address,program_type) values 
					   ('$order_id', '$cid','$product_type',$cdate, '$address_id','Retail')";
				   $res_juice_delivery = mysqli_query($conn,$sql_juice_delivery);
					 		

					$sql_juice_delete="delete  FROM farmhouse_temp_cart_fh where customer_id = '$cid'";
				$res_detox = mysqli_query($conn,$sql_juice_delete);
$ch++;			
					
					 
}					 //Adding from  farmhouse_temp_schedule_detox For Detox-A
			
					  $sql_detox="SELECT * FROM farmhouse_temp_schedule_detox where customer_id = '$cid'";
				      $res_detox = mysqli_query($conn,$sql_detox); 
				      while($row_detox=mysqli_fetch_array($res_detox)){
						 $product_id = $row_detox['detox_id'];
						 $product_name= $row_detox['detox_name'];
						 $product_price= $row_detox['detox_price'];
						 $qty= $row_detox['no_people'] * $row_detox['no_days_detox'];
						 $no_people= $row_detox['no_people'];
						 $no_days= $row_detox['no_days_detox'];
						 $hydrator_id= $row_detox['detox_hydrator_id'];
						 $hydrator_price= $row_detox['detox_hydrator_price'];
						 
						 $detox_total= $row_detox['detox_total'];
						 $product_total= $row_detox['detox_total'];
						 $product_type = "Detox";
						 
						 $order_id_detox = $order_id;
						 $delivery_dates = $row_detox['delivery_dates'];
						 $delivery_address = $row_detox['address_id'];
						 $payment_type = $row_detox['payment_type'];
						 $payment_method = $row_detox['payment_method'];
						 $card_name = $row_detox['card_name'];
						 $sht_type = $row_detox['program_name'];
						 
	$sql_order_insert_detox = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name,product_price, quantity_ordered, ordered_num_of_people, ordered_day_beauty, product_total, delivery_dates,delivery_address, customer_id, payment_type, payment_method, card_name,program_name,program_type,date_added) values ('$order_id', '$customer_name','$product_id','$product_name','$product_name','$product_price','$qty','$no_people','$no_days','$product_total','$delivery_dates','$delivery_address','$cid', '$payment_type', '$payment_method','$card_name','$sht_type','$product_type','$cdate')";
					// echo $sql_order_insert_detox;
					 $res_order_insert_detox = mysqli_query($conn,$sql_order_insert_detox);
				
					
			$sql_order_deliverys = "update farmhouse_delivery_schedule set order_id = '$order_id' where customer_id = '$cid' and order_id=0 and  product_type = '$product_name'";
										 
					 $res_order_deliverys = mysqli_query($conn,$sql_order_deliverys);
					 	

			$sql_detox_delete="delete  FROM farmhouse_temp_schedule_detox where customer_id = '$cid'";
			$res_detox = mysqli_query($conn,$sql_detox_delete); 
$ch++;
					
			
}			
$sql_lifestyle="SELECT * FROM farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
				      $res_lifestyle = mysqli_query($conn,$sql_lifestyle); 
				      while($row_lifestyle=mysqli_fetch_assoc($res_lifestyle)){
						 $product_id = $row_lifestyle['lifestyle_id'];
						 $product_name= $row_lifestyle['lifestyle_name'];
						 $product_price= $row_lifestyle['lifestyle_price'];
						 $qty= $row_lifestyle['no_people'] * $row_lifestyle['no_days_beauty'];
						 $no_people= $row_lifestyle['no_people'];
						 $no_days= $row_lifestyle['no_days_beauty'];
						 
						 
						 $lifestyle_total= $row_lifestyle['lifestyle_total'];
						 $product_total= $row_lifestyle['lifestyle_total'];
						 $product_type = "LifeStyle";
						 $sht_type = $row_lifestyle['program_name'];
						 $order_id_lifestyle = $order_id;
						 $delivery_dates = $row_lifestyle['delivery_dates'];
						 $delivery_address = $row_lifestyle['address_id'];
						 $payment_type = $row_lifestyle['payment_type'];
						 $payment_method = $row_lifestyle['payment_method'];
						 $card_name = $row_lifestyle['card_name'];
						 
					$sql_order_insert_lifestyle = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name, 
					product_price, quantity_ordered, ordered_num_of_people, ordered_day_beauty, product_total, delivery_dates, 
					delivery_address, customer_id, payment_type, payment_method, card_name,program_name,program_type,date_added) values 
					('$order_id', '$customer_name','$product_id','$product_name','$product_name',
					 '$product_price','$qty', '$no_people','$no_days','$product_total','$delivery_dates',
					 '$delivery_address','$cid', '$payment_type', '$payment_method', '$card_name','$sht_type','$product_type','$cdate')";
					 //echo $sql_order_insert_lifestyle;
					 $res_order_insert_lifestyle = mysqli_query($conn,$sql_order_insert_lifestyle);
					 //echo "<br>I". $res_order_insert_lifestyle;
					 //inserting data into delivery_schedule table//
					
					 
					 		 
			 	$sql_order_delivery = "update farmhouse_delivery_schedule set order_id = '$order_id' where customer_id = '$cid' and order_id=0 and  product_type = '$product_name'";
						//echo $sql_order_delivery;		 
					 $res_order_delivery = mysqli_query($conn,$sql_order_delivery);
					 					 			

			$sql_lifestyle_delete="delete  FROM farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
			$res_lifestyle = mysqli_query($conn,$sql_lifestyle_delete); 

		

$ch++;			
}
					  
		if($ch>0){			  
	header("Location:order_confirmation.php");
}
?>