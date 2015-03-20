<?php
include('database/db_connect.php'); 
error_reporting(0);
?>

<br>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    <title>Farmhouse Sign up Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
	 <script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){
 
                          var fname=$("#fname").val();
                          var lname=$("#lname").val();
						  var email=$("#email").val();
						  var mobile=$("#mobile").val();
                          var password=$("#password").val();
						  var address=$("#address").val();
 
                          $.ajax({
                              type:"post",
                              url:"index.php?link=register_process",
                              data:"fname="+fname+"&lname="+lname+"&email="+email+"&mobile="+mobile+"&password="+password+"&address="+address,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });
       </script>
	   
</head>

<body>

 <form  method="POST">

<br><br><br><br>
 <div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Sign Up / Registration </h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="fname" id = "fname" class="form-control" placeholder="First Name" />
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" />
                                        </div>
										
										    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <input type="text" name="mobile" id="mobile" onkeypress="return isNumberKey(event)" maxlength = "12" class="form-control" placeholder="Mobile No" />
                                        </div>
										
										
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="confirm_password" class="form-control" placeholder="Retype Password" />
                                        </div>

										    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <textarea name="address" id="address" class="form-control" rows="4" required="" placeholder = "Adress"></textarea>
                                        </div>

									
									<input type = "button" value = "signup Me" id = "button">
                                    <br>
                                    Already signuped ?  <a href="index.php?link=login" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
<div id = "info" />

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="js/bootstrap.js"></script>
	
	<?php include('footer.html');  ?>
</form>   
</body>
</html>
