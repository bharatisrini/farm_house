<?php
include('database/db_connect.php');


$fname = $_POST["fname"];
$lname = $_POST["lname"];
$district = $_POST["district"];
$city = $_POST["city"];
$email = $_POST["email"];
$mobile = $_POST["mobile"]; //echo $mobile; exit;
$password = MD5($_POST["password"]);
$address = $_POST["address"];


  
$ip = $_SERVER["REMOTE_ADDR"];
$status = 1;
$date_added = date("Y/m/d h:i:s");

 $sql = "SELECT * from farmhouse_customer where email = '$email'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
     {
		echo("This Email is already existed");
     }
 else
     {
		   $sql = "INSERT INTO farmhouse_customer(firstname,lastname,email,telephone,password,address,city,district,ip,status,date_added) 
		   values('$fname','$lname','$email',$mobile,'$password','$address','$city','$district','$ip','$status','$date_added')";


		   if(mysqli_query($conn,$sql))
			{
			$sql_get_cust_id = "Select * from farmhouse_customer where email = '$email'";
			$result_get_cust_id = mysqli_query($conn,$sql_get_cust_id);
			$row_get_cust_id = mysqli_fetch_array($result_get_cust_id);
			
			$cid = $row_get_cust_id['customer_id'];
			
			$add_id = "1";
			


		  $sql_address = "INSERT INTO farmhouse_customer_address(customer_id,address_id,address,address_district,address_city) values ('$cid','$add_id','$address','$district','$city')";
		   
					if(mysqli_query($conn,$sql_address))
					{ ?>
		             <script> window.location.href ="front.php"; </script>
					<?php }
					else
					echo "Wrong in Sign-Up";
					
			}
			else
			{
				 //echo "not added";
				 //echo "Error:".$sql."<br>".mysqli_error($conn);
			}
			
	 } // ends else
 

?>




