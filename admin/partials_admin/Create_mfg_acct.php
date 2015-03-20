<?php
include('database/db_connect.php');
//error_reporting(0);
?>
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
    <title>Admin Sign up Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="./css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="./css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<script type="text/javascript">
               $(document).ready(function(){
                    $("#button").click(function(){
                          var name=$("#name").val();
						  var email=$("#email").val();
						  var mobile=$("#mobile").val();
                          var password=$("#password").val();
						  var address=$("#address").val();
                          $.ajax({
                              type:"post",
                              url:"register_process.php",
                              data:"name="+name+"&email="+email+"&mobile="+mobile+"&password="+password+"&address="+address,
                              success:function(data){
                                 $("#info").html(data);
                              }
                           });
                     });
               });
       </script>
</head>
<body>
 <form method="POST">
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
                                            <input type="text" name="name" class="form-control" id= "name" placeholder="Your Name" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="email" class="form-control" id="email" placeholder="Your Email" />
                                        </div>
										
										    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <input type="text" name="mobile" class="form-control" id="mobile" placeholder="Mobile No" />
                                        </div>
										
										
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="confirm_password" class="form-control"  id="confirm_password" placeholder="Retype Password" />
                                        </div>
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <textarea  name="address" id = "address" class="form-control" placeholder="Address" /></textarea>
                                        </div>
<!--                                     <a href="#" class="btn btn-success ">Register Me</a> -->
									<input type = "button" value = "Register Me" id = "button">
                                    <hr />
                                    Already Registered ?  <a href="index.php?link=login" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
<div id = "info" >  Msg </div>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="./js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="./js/bootstrap.js"></script>
</form>   
</body>
</html>
