<?php 
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cu_id = $_SESSION['customer_id'];
?>
<?php
//echo $_REQUEST['msg'];
if($_REQUEST['msg']=="addtocart") {

$product_id = $_REQUEST['pd']; //echo $product_id; //exit;
$cu_id = $_SESSION['customer_id']; //echo $cu_id;

$sql_address = "select address_id from farmhouse_customer_address where customer_id = '$cu_id' ";
$res_adderess = mysqli_query($conn,$sql_address);
$row_adderess = mysqli_fetch_array($res_adderess);
$address = $row_adderess['address_id'];


$sql_vals_from_db = "select * from farmhouse_juice_details where product_id = '$product_id'";
$res_vals_from_db = mysqli_query($conn,$sql_vals_from_db);
$row_vals_from_db = mysqli_fetch_array($res_vals_from_db);
$order_name = "******";

$product_price = $row_vals_from_db['price']; //echo $product_price; 
$no_items = $_REQUEST['qty']; 
//echo $no_items; exit;//echo "<br>".$product_price; 
$total_item_amount = $product_price * $no_items; //echo $total_item_amount;
$image_url = "product_images/".$row_vals_from_db['image']; //echo $image_url;
$ip = $_SERVER["REMOTE_ADDR"]; //echo $ip;//exit;
$product_name = $row_vals_from_db['name']; //echo $product_name; //exit;


$sql_check = "select trans_id from farmhouse_temp_cart_fh where product_id = '$product_id' and customer_id='$cu_id' "; $res_check = mysqli_query($conn,$sql_check); 
if(mysqli_num_rows($res_check) == 0) {
$sql_add = "INSERT INTO farmhouse_temp_cart_fh(product_image_url, product_price, no_items, total_item_amount, ip, product_name, customer_id, product_id,order_name,address,date_added) values('$image_url','$product_price','$no_items','$total_item_amount','$ip','$product_name','$cu_id', '$product_id','$order_name','$address',NOW())";
$res_added = mysqli_query($conn,$sql_add);
echo "Added to your cart ".$product_name."  Quantitys ".$no_items;
}
else 
   echo "your item has already been added into cart";
   
} // addtocart

if($_REQUEST['msg']=='update') {

	$product_id = $_REQUEST['pd']; //echo $product_id; //echo "<br>"; //exit;
	$cu_id = $_SESSION['customer_id']; //echo $cu_id; echo "<br>";
	$tr_id = $_REQUEST['t_id']; //echo $tr_id; echo "<br>";
	
	$sql_vals_from_db = "select * from farmhouse_temp_cart_fh where trans_id = '$tr_id'";
	$res_vals_from_db = mysqli_query($conn,$sql_vals_from_db);
	$row_vals_from_db = mysqli_fetch_array($res_vals_from_db);
	
	$product_price = $row_vals_from_db['product_price']; //echo $product_price; echo "<br>";
	$no_items = $_REQUEST['qty1'];  //echo $no_items; echo "<br>";
	//echo $no_items; exit;//echo "<br>".$product_price; 
	$total_item_amount = $product_price * $no_items; //echo $total_item_amount; echo "<br>";
	$image_url = "product_images/".$row_vals_from_db['image']; //echo $image_url;
	$ip = $_SERVER["REMOTE_ADDR"]; //echo $ip;//exit;
	$product_name = $row_vals_from_db['name']; //echo $product_name; //exit;
   
    //echo $cu_id; echo "<br>";
   $sql_up = "update farmhouse_temp_cart_fh set total_item_amount = '$total_item_amount' , no_items='$no_items' where trans_id='$tr_id' ";
   $res_up = mysqli_query($conn,$sql_up);
   if($res_up) {
   //header("Location:card1.php"); exit; 
   ?>
       				<script>
					window.location = "card1.php";
					</script>
					<?php
   }
   else
    echo "error";
}//ends if for update

//========for cart item deletion===========

 if($_REQUEST['msg']=='del') {

    $tr_id = $_REQUEST['tr_id'];
    $sql_vals_del = "delete from farmhouse_temp_cart_fh where trans_id = '$tr_id'";
	$res_vals_del = mysqli_query($conn,$sql_vals_del);
	if($res_vals_del) {
   //header("Location:card1.php"); exit; 
   ?>
       				<script>
					window.location = "card1.php";
					</script>
					<?php
   }
   else
    echo "error";

}



  if($_REQUEST['msg']=='save_adrs') {

    $cu_id = $_SESSION['customer_id'];
	$add = $_REQUEST['add'];
    $sql_vals_add = " update farmhouse_temp_cart_fh set address='$add' where customer_id='$cu_id' ";
	$res_vals_add = mysqli_query($conn,$sql_vals_add);
	if($res_vals_add)
	   echo "";

}
 
 if($_REQUEST['msg']=='pay') {

    $cu_id = $_SESSION['customer_id'];
	$p_typ = $_REQUEST['p_typ'];
	$bank_name = $_REQUEST['bank_name'];
	//echo $cu_id." ".$p_typ." ".$bank_name;
	if($p_typ=="Pay on delivery") {
	$sql_vals_add = " update farmhouse_temp_cart_fh set payment_type='$p_typ',card_name ='' , payment_method='' where customer_id='$cu_id' ";
	$res_vals_add = mysqli_query($conn,$sql_vals_add);
	$sql_vals_detox = " update farmhouse_temp_schedule_detox set payment_type='$p_typ',card_name ='' , payment_method='' where customer_id='$cu_id' "; 
	$res_vals_detox = mysqli_query($conn,$sql_vals_detox);
	$sql_vals_lifestyle = " update farmhouse_temp_schedule_lifestyle set payment_type='$p_typ',card_name ='' , payment_method='' where customer_id='$cu_id' "; 
	$res_vals_lifestyle = mysqli_query($conn,$sql_vals_lifestyle);}
	
	else {
	$sql_vals_add = " update farmhouse_temp_cart_fh set payment_type='$p_typ',card_name = '$bank_name' where customer_id='$cu_id' ";
	$res_vals_add = mysqli_query($conn,$sql_vals_add); 
	$sql_vals_detox = " update farmhouse_temp_schedule_detox set payment_type='$p_typ',card_name = '$bank_name' where customer_id='$cu_id' ";
	$res_vals_detox = mysqli_query($conn,$sql_vals_detox);
	$sql_vals_lifestyle = " update farmhouse_temp_schedule_lifestyle set payment_type='$p_typ',card_name = '$bank_name' where customer_id='$cu_id' ";
	$res_vals_lifestyle = mysqli_query($conn,$sql_vals_lifestyle);
	}
	
	/*if($res_vals_add)
	   echo "";*/

}
 
 if($_REQUEST['msg']=='card') {

    $cu_id = $_SESSION['customer_id'];
	$payment_method = $_REQUEST['card_name'];
		
    $sql_vals_add_juice = " update farmhouse_temp_cart_fh set payment_method='$payment_method' where customer_id='$cu_id' ";
	$res_vals_add_juice = mysqli_query($conn,$sql_vals_add_juice);
	$sql_vals_add_detox = " update farmhouse_temp_schedule_detox set payment_method='$payment_method' where customer_id='$cu_id' ";
	$res_vals_add_detox = mysqli_query($conn,$sql_vals_add_detox);
	$sql_vals_add_lifestyle = " update farmhouse_temp_schedule_lifestyle set payment_method='$payment_method' where customer_id='$cu_id' ";
	$res_vals_add_lifestyle = mysqli_query($conn,$sql_vals_add_lifestyle);
	if($res_vals_add_juice || $res_vals_add_detox || $res_vals_add_lifestyle)
	   echo "";
}

if($_REQUEST['back_id'] != "") {
   $dtx_id = $_REQUEST['back_id'];
   $sql_del_detox = "delete from farmhouse_temp_schedule_detox where detox_id = '$dtx_id' ";
   $res_del_detox = mysqli_query($conn,$sql_del_detox);
   if($res_del_detox)
   header("Location:detox.php");
}
if($_REQUEST['back_id_lf'] != "") {
   $dtx_id = $_REQUEST['back_id_lf'];
   $sql_del_detox = "delete from farmhouse_temp_schedule_lifestyle where lifestyle_id = '$dtx_id' ";
   $res_del_detox = mysqli_query($conn,$sql_del_detox);
   if($res_del_detox)
   header("Location:lifestyle.php");
}

if($_REQUEST['msg']=="save_addd") {
   
   $cu_id = $_SESSION['customer_id'];
   $add_id = $_REQUEST['add_no'];
   $add    = $_REQUEST['adrs'];
   $add_dist = $_REQUEST['district'];
   $add_city = $_REQUEST['city'];
   $sql_sav_addr2 = "insert into farmhouse_customer_address(customer_id, address_id, address, address_district, address_city) values ('$cu_id', '$add_id' , '$add' , '$add_dist' , '$add_city')";
   $res_sav_addr2 = mysqli_query($conn,$sql_sav_addr2);
   if($res_sav_addr2)
   echo ""; 
}

if($_REQUEST['msg']=="save_addd_ls") {
   
   $cu_id = $_SESSION['customer_id'];
   $add_id = $_REQUEST['add_no'];
   $add    = $_REQUEST['adrs'];
   $add_dist = $_REQUEST['district'];
   $add_city = $_REQUEST['city'];
   $sql_sav_addr2_ls = "insert into farmhouse_customer_address(customer_id, address_id, address, address_district, address_city) values ('$cu_id', '$add_id' , '$add' , '$add_dist' , '$add_city')";
   $res_sav_addr2_ls = mysqli_query($conn,$sql_sav_addr2_ls);
   if($res_sav_addr2_ls)
   echo ""; 
}

if($_REQUEST['msg']=="store_adres") {

 //echo "hii"; 
 $tr_id = $_REQUEST['tid'];
 $cu_id = $_SESSION['customer_id'];
 $sql_getdat_adrs = "select trans_id,delivery_address,delivery_dates from farmhouse_temp_schedule_detox  where customer_id='$cu_id' and trans_id = '$tr_id' "; 
 $res_getdat_adrs = mysqli_query($conn,$sql_getdat_adrs); $row_getdat_adrs = mysqli_fetch_array($res_getdat_adrs); 
 if($row_getdat_adrs['delivery_address'] != "" && $row_getdat_adrs['delivery_dates'] != "") {
 $addres = $row_getdat_adrs['delivery_address']."/".$_REQUEST['address']; 
 $date   = $row_getdat_adrs['delivery_dates']."-".$_REQUEST['date1']; }
 else {
 $addres = $_REQUEST['address'];
 $date  =  $_REQUEST['date1']; }
 
 $sql_adrs = "update farmhouse_temp_schedule_detox set delivery_address= '$addres' , delivery_dates='$date' where customer_id = '$cu_id'  and trans_id = '$tr_id' ";
 $res_adrs = mysqli_query($conn,$sql_adrs);
 if($res_adrs) 
 echo "";

}

if($_REQUEST['msg']=="store_adres_ls") {

 //echo "hii"; 
 $tr_id = $_REQUEST['tid'];
 $cu_id = $_SESSION['customer_id'];
 $sql_getdat_adrs = "select trans_id,delivery_address,delivery_dates from farmhouse_temp_schedule_lifestyle  where customer_id='$cu_id' and trans_id = '$tr_id' "; 
 $res_getdat_adrs = mysqli_query($conn,$sql_getdat_adrs); $row_getdat_adrs = mysqli_fetch_array($res_getdat_adrs); 
 if($row_getdat_adrs['delivery_address'] != "" && $row_getdat_adrs['delivery_dates'] != "") {
 $addres = $row_getdat_adrs['delivery_address']."/".$_REQUEST['address']; 
 $date   = $row_getdat_adrs['delivery_dates']."-".$_REQUEST['date1']; }
 else {
 $addres = $_REQUEST['address'];
 $date  =  $_REQUEST['date1']; }
 
 $sql_adrs = "update farmhouse_temp_schedule_lifestyle set delivery_address= '$addres' , delivery_dates='$date' where customer_id = '$cu_id'  and trans_id = '$tr_id' ";
 $res_adrs = mysqli_query($conn,$sql_adrs);
 if($res_adrs) 
 echo "";

}

if($_REQUEST['back_id2'] != "") {
   $tr_id = $_REQUEST['back_id2'];
   $sql_del_detox = "delete from farmhouse_temp_schedule_detox where trans_id = '$tr_id' ";
   $res_del_detox = mysqli_query($conn,$sql_del_detox);
   if($res_del_detox)
   header("Location:detox_schedule1.php");
}
//<!--commented by ram-23_022015-->
if(($_REQUEST['msg']=="chngadd") ) {
   $old_add = "Address ".$_REQUEST['send_add']; 
   
   $old_dat = $_REQUEST['send_dat']; //$addid_updt = "Address ".$old_add;
   $sql_save_new_add = "update farmhouse_delivery_schedule set delivery_address = '$old_add' where delivery_date = '$old_dat' and customer_id = '$cu_id' ";
      
   //$sql_getinx = "select * from farmhouse_customer_address where customer_id = '$cu_id' and address_id = '$old_add' "; 
   $res_getinx = mysqli_query($conn,$sql_save_new_add);
   
   $sql_getadd = "select * from farmhouse_customer_address where address_id= '$_REQUEST[send_add]' "; 
   $res_getadd = mysqli_query($conn,$sql_getadd);
   $row_getadd = mysqli_fetch_array($res_getadd) ;
   if($res_getinx && $res_getadd)
   echo $row_getadd['address'].$row_getadd['address_district'].$row_getadd['address_city'];
   else
   echo "query not executed".$old_add.$cu_id;
}
 
//commented by ram-23_022015-->
?>

