<?php
include('database/db_connect.php'); 
session_start();
error_reporting(0);
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
    
<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
   <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>
	
<script type="text/javascript" src="js/custom.js"></script>
	 <script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){
 	
                          var email=$("#email").val();
                          var password=$("#password").val();
 
                          $.ajax({
                              type:"post",
                              url:"front_process.php",
                              data:"email="+email+"&password="+password,
                              success:function(data){
							 // alert(data);
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });
       </script>
</head>
<body class="front">
<?php include("includes/header-front.php"); ?>


<section class="front-content gray group">
	<div class="wrapper">
    	<div class="image"><img src="images/famhouse-juice.png" alt="#" /></div>
        <div class="form">
        	<div class="padding">
            <form  method="post">            
                     <p style="color:#FF0000" id="info"></p>
                	<input type="text" name="email" id = "email" placeholder="Email Address" />
			
			        <input type="password" name="password" id = "password" placeholder="Password" style="border-color:#959ca1;" />
			        <input type="button" name="submit" id="button" value="Log In" />
			        <p><a href="forgot.php">Forgot password</a></p>
                    <p><a href="signup.php">Create Account</a></p>
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