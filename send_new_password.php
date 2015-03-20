<?php
include('database/db_connect.php');
?>
<?php
//$username=$_REQUEST['username'];
//echo $username;

//echo "haiii";
$email = $_REQUEST['email'];

$pass = rand(100,9999999);

//$url = "";
//echo '<h2>'; echo $url; echo '</h2>';

$sql = "SELECT * from farmhouse_customer where email = '$email'";
$result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)<=0)
     {
		echo("This Email is Not existed"); exit;
     }
    else
      
	   {
          //echo "OK";
	  		      $sql_up = "update farmhouse_customer set password = '$pass' where email = '$email' ";
                  $res_up = mysqli_query($conn,$sql_up);
                  if($res_up) {
                   
					$from = $email;
					$to   = $email;
					$subject = "Your Request has been submitted and your New Password is: <strong>".$pass."</strong>";
					//$txt = "Please contact this person and send him your broucher!";
					$headers = "From: ".$from . "\r\n" ;
					//"CC: srinivasmandapaka.vizag@gmail.com";
					
					mail($to,$subject,$headers);
					header("Location:front.php");
							
					} //ends if
					
                  	echo "Wrong Details";
                 	unset($email);
           } //end else


?>


