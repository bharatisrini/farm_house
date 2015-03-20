<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cdate=date("Y-m-d");
$tm=date("H:m:s");
$cid = $_SESSION["customer_id"];
//echo $cid;
$order_id = rand(100,9999999);
//$order_id='9142464';
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
					  $sql_juice="SELECT *, date(date_added) as tmpdate FROM farmhouse_temp_cart_fh where customer_id = '$cid'";
				      $res_juice = mysqli_query($conn,$sql_juice); 
				      while($row_juice=mysqli_fetch_assoc($res_juice)){
					     $tmp_ju_id= $row_juice['trans_id'];
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
						 $delivery_date = $row_juice['tmpdate'];
						$sql_order_insert = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name, product_price, quantity_ordered, product_total, delivery_address, customer_id, payment_method, payment_type, card_name, delivery_dates,program_type,date_added) values ('$order_id','$customer_name','$product_id','$product_type','$product_name','$product_price','$qty','$product_total',' $delivery_address','$cid','$payment_method','$payment_type','$card_name','$delivery_date','$product_type',now())";
					//	echo $sql_order_insert."<br>";
						
				    	$res_order_insert = mysqli_query($conn,$sql_order_insert) or die('Could not connect31: ' . mysqli_error($conn));
					
							 
					 
					 	$sql_juice_delivery = "insert into  farmhouse_delivery_schedule(order_id, customer_id, product_type,delivery_date, delivery_address,program_type) values 
					   ('$order_id', '$cid','$product_name','$delivery_date', ' $delivery_address','Retail')";
					//  echo $sql_juice_delivery."<br>";
				  $res_juice_delivery = mysqli_query($conn,$sql_juice_delivery);// or die('Could not connect3: ' . mysqli_error($conn));
					 		

$ch++;			  
					
					 
}					 //Adding from  farmhouse_temp_schedule_detox For Detox-A
			
					  $sql_detox="SELECT * FROM farmhouse_temp_schedule_detox where customer_id = '$cid'";
				      $res_detox = mysqli_query($conn,$sql_detox); 
				      while($row_detox=mysqli_fetch_array($res_detox)){
					     $tmp_dt_id= $row_detox['trans_id'];  
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
						 
	$sql_order_insert_detox = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name,product_price, quantity_ordered, ordered_num_of_people, ordered_day_beauty, product_total, delivery_dates,delivery_address, customer_id, payment_type, payment_method, card_name,program_name,program_type,date_added) values ('$order_id', '$customer_name','$product_id','$product_type','$product_name','$product_price','$qty','$no_people','$no_days','$product_total','$delivery_dates','$delivery_address','$cid', '$payment_type', '$payment_method','$card_name','$sht_type','$product_type',NOW())";
			//echo $sql_order_insert_detox."<br>";
			$res_order_insert_detox = mysqli_query($conn,$sql_order_insert_detox);//or die('Could not connect2: ' . mysqli_error($conn));
				
					
			$sql_order_deliverys = "update farmhouse_delivery_schedule set order_id = '$order_id' where customer_id = '$cid' and order_id=0 and  product_type = '$product_name'";
			// echo $sql_order_deliverys."<br>";							 
			$res_order_deliverys = mysqli_query($conn,$sql_order_deliverys) or die('Could not connect21: ' . mysqli_error($conn));
					 	
 
	       // echo "Dx  ".$res_detox;
$ch++;
					
			
}			
$sql_lifestyle="SELECT * FROM farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
				      $res_lifestyle = mysqli_query($conn,$sql_lifestyle); 
				      while($row_lifestyle=mysqli_fetch_assoc($res_lifestyle)){
					     $tmp_ls_id= $row_lifestyle['trans_id'];
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
						 $delivery_address = $row_lifestyle['delivery_address'];
						 $payment_type = $row_lifestyle['payment_type'];
						 $payment_method = $row_lifestyle['payment_method'];
						 $card_name = $row_lifestyle['card_name'];
						 
					$sql_order_insert_lifestyle = "insert into farmhouse_order (order_id, order_name, product_id, product_type, product_name,product_price, quantity_ordered, ordered_num_of_people, ordered_day_beauty, product_total, delivery_dates, delivery_address, customer_id, payment_type, payment_method,card_name,program_name,program_type,date_added) values('$order_id', '$customer_name','$product_id','$product_type','$product_name','$product_price','$qty', '$no_people','$no_days','$product_total','$delivery_dates','$delivery_address','$cid', '$payment_type', '$payment_method', '$card_name','$sht_type','$product_type',NOW())";
					// echo $sql_order_insert_lifestyle."<br>";
					 $res_order_insert_lifestyle = mysqli_query($conn,$sql_order_insert_lifestyle) or die('Could not connect1: ' .mysqli_error($conn));
					 //echo "<br>I". $res_order_insert_lifestyle;
					 //inserting data into delivery_schedule table//
				 
					 		 
			 	$sql_order_delivery = "update farmhouse_delivery_schedule set order_id = '$order_id' where customer_id = '$cid' and order_id=0 and  product_type = '$product_name'";
				//echo $sql_order_delivery;		 
			 $res_order_delivery = mysqli_query($conn,$sql_order_delivery) or die('Could not connect11: ' .mysqli_error($conn));
					 					 			
$ch++;			
}
echo $ch;					  
if($ch>0){
			$sql_juice_delete="delete  FROM farmhouse_temp_cart_fh where customer_id='$cid'";
					//echo $sql_juice_delete;
			$res_juice = mysqli_query($conn,$sql_juice_delete);// or die('Could not connect21: ' . mysqli_error($conn));
	     	$sql_detox_delete="delete FROM farmhouse_temp_schedule_detox where customer_id = '$cid'";
		//	echo $tmp_dt_id."  ".$sql_detox_delete;
			$res_detox = mysqli_query($conn,$sql_detox_delete) or die('Could not connect21: ' . mysqli_error($conn));
    		$sql_lifestyle_delete="delete  FROM farmhouse_temp_schedule_lifestyle where customer_id = '$cid'";
//			echo $sql_lifestyle_delete;		 
			$res_lifestyle = mysqli_query($conn,$sql_lifestyle_delete) or die('Could not connect11: ' .mysqli_error($conn)); 
 			  
header("Location:order_confirmation.php");
}
?>