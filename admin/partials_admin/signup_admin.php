<?php
include('database/db_connect.php');

error_reporting(0);
?>
<?php 
      if(isset($_POST['submit'])) {
	  
	    echo "hii";
		$firstname = $_POST["fname"];
		$lname = $_POST["lname"];
		
		$email = $_POST["email"];
		$mobile = $_POST["mobile"]; //echo $mobile; exit;
		$password = MD5($_POST["password"]);
		$address = $_POST["address"];
			
		$ip = $_SERVER["REMOTE_ADDR"];
		$status = 1;
		$date_added = date("Y/m/d h:i:sa");
		$type = "admin";
		
		 $sql = "SELECT * from farmhouse_admin_registration where email = '$email' and password = '$password'";
		 $result = mysqli_query($conn,$sql);
		 if(mysqli_num_rows($result)>0)
			 {
				echo("The email already signuped with us");
			 }
		 else
			 {
				   $sql = "INSERT INTO farmhouse_admin_registration(firstname,lastname,email,telephone,password,address,ip,status,date_added,type) 
				   values('$firstname','$lname','$email',$mobile,'$password','$address','$ip','$status','$date_added','$type')";
				   if(mysqli_query($conn,$sql))
					{
						  echo "successfully added";
						  header("Location:../login.php");
						 
					}
					else
					{
						 echo "not added";
						 echo "Error:".$sql."<br>".mysqli_error($conn);
					}
			 }
      }//ends main if
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
    <title>Farmhouse Sign up Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="../css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="../css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	
	
	
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	 <script type="text/javascript">
	   function isNumberKey(evt)
			{
				var charCode = (evt.which)?evt.which:event.keyCode;
				if(charCode > 31 && (charCode <48 || charCode>57)) {
				return false; }
				return true;
			}
	 /*function addtocart()
					{
					var xmlhttp; //alert(qty); alert(id); alert("hii"); 
					  var fname=$("#fname").val();
					  var lname=$("#lname").val();
					  var email=$("#email").val();
					  var mobile=$("#mobile").val();
					  var password=$("#password").val();
					  var address=$("#address").val(); 
					
					if (window.XMLHttpRequest)
					  {// code for IE7+, Firefox, Chrome, Opera, Safari
					  xmlhttp=new XMLHttpRequest();
					  }
					else
					  {// code for IE6, IE5
					  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					  }
					xmlhttp.onreadystatechange=function()
					  {
					  if (xmlhttp.readyState==4 && xmlhttp.status==200)
						{
						 if(xmlhttp.responseText == "")
						 window.location.href="jucie.php";
						 
						 else
						 //document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
						 alert(xmlhttp.responseText);
						}
					  }
					xmlhttp.open("GET","add_to_cart.php?fname="+fname+"&lname="+lname+"email="+email+"",true);
					xmlhttp.send();
					}				*/
               /*$(document).ready(function(){
                    $("#but").click(function(){
                         
                          var fname=$("#fname").val();
                          var lname=$("#lname").val();
						  var email=$("#email").val();
						  var mobile=$("#mobile").val();
                          var password=$("#password").val();
						  var address=$("#address").val();
 
                          $.ajax({
                              type:"post",
                              url:"signup_process.php",
                              data:"fname="+fname+"&lname="+lname+"&email="+email+"&mobile="+mobile+"&password="+password+"&address="+address,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });*/
       </script>
	   
</head>

<body>
<table border="0" width = "100%" cellspacing="10" cellpadding="10"  bgcolor="#FFFFFFF">
<tr>
  <td width= "50%">
    &nbsp; &nbsp; <img src = "../images/logo.png" width="270"> 
	
   </td>

         </tr>    
      </table>
	  <br>
 <div class="container">
        
         <div class="row pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Sign Up / Registration </h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="" method="post">
<br/>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="fname" id = "fname" class="form-control" required="" placeholder="First Name" />
                                        </div>
										<div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-circle-o-notch"  ></i></span>
                                            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="email" id="email" class="form-control" required="" placeholder="Your Email" />
                                        </div>
										
										    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <input type="text" name="mobile" id="mobile" onKeyPress="return isNumberKey(event)" maxlength = "12" required="" class="form-control" placeholder="Mobile No" />
                                        </div>
										
										
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" id="password" class="form-control" required="" placeholder="Enter Password" />
                                        </div>
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" name="confirm_password" class="form-control" required="" placeholder="Retype Password" />
                                        </div>

										    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <textarea name="address" id="address" class="form-control" rows="4" required="" placeholder = "Address"></textarea>
                                        </div>
										
										
									
									<input type="submit" value = "Signme Up" name="submit">
                                    <br>
                                    Already signuped ?  <a href="index.php?link=login" >Login here</a>
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
<div id = "info"></div>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="../js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../js/bootstrap.js"></script>
	
<?php //include('footer.php');  ?>

</body>
</html>
