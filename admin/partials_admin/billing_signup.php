<?php
include('database/db_connect.php');
error_reporting(0);
?>
<?php 
      if(isset($_POST['submit'])) {
	  
	   // echo "hii";
		$firstname = $_POST["fname"];
		$lname = $_POST["lname"];
		
		$email = $_POST["email"];
		$mobile = $_POST["mobile"]; //echo $mobile; exit;
		$password = MD5($_POST["password"]);
		$address = $_POST["address"];
			
		$ip = $_SERVER["REMOTE_ADDR"];
		$status = 1;
		$date_added = date("Y/m/d h:i:sa");
		$type = "billing";
		
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
						  echo "successfully signed up";
						  header("Location:index.php");
						 
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
    <link href="./css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="./css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="./css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

	
	<script type="text/javascript" src="../js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript">
function validate()
     {
	
	if (document.billing_signup.fname.value == "!`@#$%^&*()+=[]\\\';,./{}|\":<>?~_")
          {
		alert('Name : Please Enter valid first name without special character');
		document.billing_signup.fname.focus();
		return false;
          }
		  
	if (document.billing_signup.lname.value == "!`@#$%^&*()+=[]\\\';,./{}|\":<>?~_")
          {
		alert('Name : Please Enter valid last name without special character');
		document.billing_signup.lname.focus();
		return false;
          }
		  
	if (document.billing_signup.image1.value== '')
          {
		alert('Image : Please Select an image for Juice');
		document.billing_signup.image1.focus();
		return false;
          }	 
      return true;
     }
			
function checkEmail() {

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
 
		function isNumberKey(evt)
			{
				var charCode = (evt.which)?evt.which:event.keyCode;
				if(charCode > 31 && (charCode <48 || charCode>57)) {
				return false; }
				return true;
			}
</script>	   
</head>

<body>
<form method="POST" name='billing_signup' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
 <div class="container">
        
         <div class="row pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Billing Registration </h4></strong>  
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
                                            <input type="text" name="lname" id="lname" class="form-control" required="" placeholder="Last Name" />
                                        </div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="email" id="email" onclick = 'Javascript:checkEmail();' class="form-control" required="" placeholder="Your Email" />
                                        </div>
										
										    <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"  ></i></span>
                                            <input type="text" name="mobile" id="mobile" onKeyPress="return isNumberKey(event)" maxlength = "12" class="form-control" required="" placeholder="Mobile No" />
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
                                            <textarea name="address" id="address" class="form-control" rows="4" required="" placeholder = "Adress"></textarea>
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
    <script src="./js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="./js/bootstrap.js"></script>
	
<?php //include('footer.php');  ?>
</form>
</body>
</html>
