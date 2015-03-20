<?php
include('database/db_connect.php');
session_start();

echo "hai";

$name = $_POST["name"];
$email = $_POST["email"];
$mobile = $_POST["mobile"]; 
$password = MD5($_POST["password"]);
$address = $_POST["address"];
    
$ip = $_SERVER["REMOTE_ADDR"];
$status = 1;
$date_added = date("Y/m/d h:i:sa");

 $sql = "SELECT * from farmhouse_admin_registration where email = '$email'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
     {
		printf ("The email already registered with us");
     }
 else
     {
		   $sql = "INSERT INTO farmhouse_admin_registration(name,email,mobile,password,address,ip,status,date_added) 
		   values('$name','$email',$mobile,'$password','$address','$ip','$status','$date_added')";
		   if(mysqli_query($conn,$sql))
			{
				  echo "successfully added";
			}
			else
			{
				 echo "not added";
				echo "Error:".$sql."<br>".mysqli_error($conn);
			}
	 }
 
?>
