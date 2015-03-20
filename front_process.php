<?php
include('database/db_connect.php');
error_reporting(0);
session_start();
$lgurl=$_SESSION["loginurl"];
//echo $lgurl;
$chklg=$_SESSION["chklg"];
if($lgurl==""){
$lgurl="index.php";
}
?>
<?php
  $email=$_POST["email"];
  $password= MD5($_POST["password"]);
  $ip = $_SERVER["REMOTE_ADDR"];
  $logged_in = date("Y/m/d h:i:sa");

 $sql = "SELECT * from farmhouse_customer where email = '$email' and password = '$password'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

	while($row = mysqli_fetch_array($result))
		{
			$cid = $row["customer_id"];
			$cname = $row["lastname"];
			$ip = $_SERVER["REMOTE_ADDR"];
		
			$_SESSION["customer_id"]=$cid;
			$_SESSION["customer_name"]=$cname;
			$_SESSION["ip"] = $ip;
			if($chklg==""){ $lgurl=$lgurl;}else if($lgurl!=$chklg){
			$lgurl=$chklg;
			}else{
			$lgurl=$lgurl;
			}
		//echo $lgurl;
			$sql_insert_login = "INSERT INTO farmhouse_customer_login(customer_id,email,ip,logged_in_time) values
			('$cid','$email','$ip','$logged_in')";
			if(mysqli_query($conn,$sql_insert_login))
				{
				   $sql_addid = "select * from farmhouse_customer_address where customer_id = '$cid' order by address_id "; 
				   $res_addid = mysqli_query($conn,$sql_addid); $row_id = mysqli_fetch_array($res_addid);
				   $ad_id = $row_id['address_id'];
					//insert the customer id in the farmhouse_temp_cart_fh if it has an ip similar to this and no customer id
                        $sql_ip = "update farmhouse_temp_cart_fh set customer_id = '$cid' where ip='$ip' ";
						$res_ip = mysqli_query($conn,$sql_ip);
					
						//insert the customer id in the farmhouse_temp_schedule_detox if it has an ip similar to this and no customer id
                        $sql_dip = "update farmhouse_temp_schedule_detox set customer_id = '$cid' , address_id=REPLACE(address_id,'0','$ad_id')  where ip='$ip' ";
						//echo $sql_dip;
						$res_dip = mysqli_query($conn,$sql_dip);// or die("".mysqli_error($conn));	
						
						$sql_ds = "update farmhouse_delivery_schedule set customer_id = '$cid' ,delivery_address=REPLACE(delivery_address,'0','$ad_id')  where ip='$ip' ";
						//echo $sql_ds;
						$res_ds = mysqli_query($conn,$sql_ds);//  or die("".mysqli_error($conn));	
						
						//insert the customer id in the farmhouse_temp_schedule_lifestyle if it has an ip similar to this and no customer id
                        $sql_lip = "update farmhouse_temp_schedule_lifestyle set customer_id = '$cid' , delivery_address=REPLACE(delivery_address,'0','$ad_id')  where ip='$ip' ";
						$res_lip = mysqli_query($conn,$sql_lip);					
					   // echo $sql_lip; //exit;
					
					
					?>
					<script>
					window.location.href = "<?=$lgurl?>";
					</script>
					<?php
				}
			else
				{
					echo "Error:<br>".mysqli_error($conn);
				}
		}
 }
else
{
echo "username/password wrong";
}	
?>


