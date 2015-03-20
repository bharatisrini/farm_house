<?php
include('database/db_connect.php'); 
//session_start();
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
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>

    <link href="skins/flat/blue.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
    
    <script type="text/javascript">
              /* $(document).ready(function(){
                    $("#button").click(function(){
                          
						 
                          var fname=$("#fname").val();
                          var lname=$("#lname").val();
						  var email=$("#email").val();
						  var mobile=$("#mobile").val();
                          var password=$("#password").val();
						  var address=$("#address").val();
 						   var district=$("#district").val();
						   var city=$("#city").val();
                          $.ajax({
                              type:"post",
                              url:"signup_process.php",
                              data:"fname="+fname+"&lname="+lname+"&email="+email+"&mobile="+mobile+"&password="+password+"&address="+address+"&district="+district+"&city="+city,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });*/
			   
			   function isNumberKey(evt)
			{
				var charCode = (evt.which)?evt.which:event.keyCode;
				if(charCode > 31 && (charCode <48 || charCode>57) && (charCode <189 || charCode>191)) {
				return false; }
				return true;
			}
			   
       </script>
	   
	  	<script language="javascript">
		// checking passwords do not match
		$(document).ready(function(){
		      $("#confirm_password").keyup(function(){
			  var pwd = $("#password").val();
			  var c_pwd = $("#confirm_password").val();
				if(pwd != c_pwd)
				$("#cp").html("Passwords should be same!");
				else
				$("#cp").html("");
				});
		});
		
		//checking email is existed or not
		$(document).ready(function(){
		 $("#email").keyup(function(){
		   var emil = $("#email").val(); 
		   $("#em").load("ex.php?msg=em&email="+emil);
		 });
		});
       </script>
	   <script language="javascript">
	   
	    $(document).ready(function(){
		    $("#sub_button").click(function(){
			var fname=$("#fname").val(); if(fname =="") { alert("First Name should be filled out!"); document.myform.fname.focus(); return false;}
			var lname=$("#lname").val(); if(lname =="") { alert("Last Name should be filled out!"); document.myform.lname.focus(); return false;}
			var email=$("#email").val(); var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  		if (!filter.test(email) || email =="") {
				alert('Please provide a valid email address');
				document.myform.email.focus();
				return false; }
			var mobile=$("#mobile").val(); if(mobile =="") { alert("Mobile Number should be filled out!"); document.myform.mobile.focus(); return false;}
			var password=$("#password").val(); if(password =="") { alert("password should be filled out!"); document.myform.password.focus(); return false;}
			var address=$("#address").val(); if(address =="") { alert("address should be filled out!"); document.myform.address.focus(); return false;}
			var district=$("#district").val();  var doc = document.myform; if(district == "0" || district == null) {
		    alert("Please Choose District!");
			district = "";
			document.myform.district.focus();
			return false;
		  }
			var city=$("#city").val(); var doc = document.myform; if(city == "0" || city == null) {
		    alert("Please Choose city!");
			city = "";
			document.myform.city.focus();
			return false;
		  }
		  
			 $.ajax({
                              type:"post",
                              url:"signup_process.php",
                              data:"fname="+fname+"&lname="+lname+"&email="+email+"&mobile="+mobile+"&password="+password+"&address="+address+"&district="+district+"&city="+city,
                              success:function(data){
                                 $("#form_status").html(data);
                              }
 
                          });
			});
		});
	   </script>
	
</head>
<body>

<?php include("includes/header-signup.php"); ?>
<div class="signup">
<section>
<h2>SIGNUP / REGISTRATION</h2>
</section>

<form action="#" method="post" name="myform">
<table>
	<tr>
    	<td colspan="2"><span id="form_status"></span></td>
    </tr>
	<tr>
    	<th>First name</th>
    	<td><input type="text" name="fname" id="fname" placeholder="First Name" class="form-control" required/></td>
    </tr>
    <tr>
    	<th>Last name</th>
    	<td><input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required/></td>
    </tr>
    <tr>
    	<th>Your email</th>
    	<td><input type="text" name="email" id="email" class="form-control" placeholder="Your Email" required /></td>
    </tr>
    <tr>
    	<th>Mobile No.</th>
    	<td><input type="text" name="mobile" id="mobile" onKeyPress="return isNumberKey(event)" maxlength = "12" class="form-control" placeholder="Mobile No" required/></td>
    </tr>
    <tr>
    	<th>Enter Password</th>
    	<td><input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required/></td>
    </tr>
    <tr>
    	<th>Re-Type Password</th>
    	<td><input type="password" name="confirm_password" class="form-control" placeholder="Retype Password" required id="confirm_password"/></td>
    </tr>
    <tr>
    	<th>Address</th>
    	<td><textarea name="address" id="address" class="form-control" rows="4" placeholder = "Adress" required></textarea></td>
    </tr>
    <tr>
    	<?php
			$sql = "select * from farmhouse_user_district";
			$result = mysqli_query($conn,$sql);
		?>
    	<th>District</th>
    	<td>
            <select name="district" id="district" tabindex="1">
                <option value="0">Choose District</option>
                <?php while($row = mysqli_fetch_array($result)) { ?>
                <option value="<?php echo $row['district'];?>"> <?php echo $row['district']; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
    	<?php
			$sql_city = "select * from farmhouse_user_city";
			$result_city = mysqli_query($conn,$sql_city);
		?>
    	<th>City</th>
    	<td>
            <select name="city" id="city" tabindex="1">
                <option value="0">Choose City</option>
                <?php while($row_city = mysqli_fetch_array($result_city)) { ?>
                <option value="<?php echo $row_city['city_name'];?>"> <?php echo $row_city['city_name']; ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
   <tr>
    	<td colspan="2" align="right">
            <input type="button" value="SignMe Up" name="submit" id="sub_button">
        </td>
    </tr>
    <tr>
    	<td colspan="2" align="right">Already signuped ?  <a href="index.php?link=login" >Login here</a></td>
    </tr>
</table>

    </form>
     </div>
<div id="info"> </div>


<?php include("includes/footer.php"); ?>
<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>