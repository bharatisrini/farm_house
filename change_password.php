<?php
include('database/db_connect.php'); 
session_start();
//error_reporting(0);
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/fonts.css' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie8-fixs.css" />
    <![endif]-->
    <!--[if gt IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie-fixs.css" />
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
	
    <script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
	 <!--<script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){
 	
                          var email=$("#email").val();
                          var password=$("#password").val();
 
                          $.ajax({
                              type:"post",
                              url:"front_process.php",
                              data:"email="+email+"&password="+password,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });
       </script>-->
<?PHP
if(isset($_POST['submit']))
{
	$email = $_REQUEST['email'];
	$temp_password = $_REQUEST['temp_password'];
	$new_password = MD5($_REQUEST['new_password']);
	
	
	$sql = "SELECT * from farmhouse_customer where email = '$email'";
	
    $result = mysqli_query($conn,$sql);
	 if(mysqli_num_rows($result)<=0)
     {
		echo("This Email is Not existed"); exit;
     }
    else
      
	   {
	   $row = mysqli_fetch_array($result);
	   $password = $row['password'];
	  
	   			  if($password == $temp_password){
          //echo "OK";
	  		      $sql_up = "update farmhouse_customer set password = '$new_password' where email = '$email' ";
                  $res_up = mysqli_query($conn,$sql_up);
                  if($res_up) {
				      echo "reset password succefully";
				  }
				  }
				  else
				  {
				    echo"temporary password is wrong";
				  }
				  }
				  
}
?>   
	   
</head>
<body class="front">
<?php include("includes/header-front.php"); ?>


<section class="front-content gray group">
	<div class="wrapper">
    	<div class="image"><img src="images/famhouse-juice.png" alt="#" /></div>
        <div class="form">
        	<div class="padding">
            <form  method="post" action="">            
                     <p style="color:#FF0000" id="info"></p>
                	<input type="text" name="email" id = "email" placeholder="Email Address" />
					<input type="text" name="temp_password" id = "temp_password" placeholder="Temporary Password" />
					<input type="password" name="new_password" id = "new_password" placeholder="New Password" />
					<input type="password" name="confirm_password" id = "confirm_password" placeholder="Confirm New Password" />
			
 		            <input type="submit" name="submit" id="button" value="Submit" />

                    <!--<p><a href="signup.php">Create Account</a></p>-->
            </form>
            </div>
        </div>
    </div>
	<!--<div id="info" />--> 
</section>

<?php include("includes/footer.php"); ?>


<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>