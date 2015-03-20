<?php
 session_start();
 include('partials_admin/database/db_connect.php');
 error_reporting(0);  
 ?>

<?php
 if($_POST['submit']=='Login')
{

$email=$_POST["email"];
$password=MD5($_POST["password"]);
$ip = $_SERVER["REMOTE_ADDR"];
$logged_in = date("Y/m/d h:i:sa");
	$status = 1;
 $sql = "SELECT * from farmhouse_admin_registration where email = '$email' and password = '$password'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {

	while($row = mysqli_fetch_array($result))
		{
			$type = $row['type'];
			
			
			$ip = $_SERVER["REMOTE_ADDR"];
			
			$_SESSION["ip"] = $ip;
			$_SESSION["id"] = $row[admin_id];
			$id =  $row[admin_id];

			$sql_insert_login = "INSERT INTO farmhouse_admin_login(admin_id,email,ip,logged_in_time,status,type) values
			('$id','$email','$ip','$logged_in','$status','$type')";
			if(mysqli_query($conn,$sql_insert_login))
				{
					echo"successfully logged in";
					echo $type;
					if($type == "admin")
					{
						?>
						<script>
						window.location ="partials_admin/index.php";
						</script>
						<?php
					}
					else if($type == "production")
					{
						?>
						<script>
						window.location ="partials_production/index.php";
						</script>
						<?php
					}
					else if($type == "billing")
					{
						?>
						<script>
						window.location ="partials_billing/index.php";
						</script>
						<?php
					}
					else if($type == "dispatch")
					{
						?>
						<script>
						window.location ="partials_dispatch/index.php";
						</script>
						<?php
					}
				}
			else
				{
					echo "Error:".$sql_insert_login."<br>".mysqli_error($conn);
					
				}
				
		}
 }
 else
{
echo "username/password wrong";
}	
} 
//emds main if 



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

	
	
	
	<script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>


</head>
<body>

<table border="0" width = "100%" cellspacing="10" cellpadding="10"  bgcolor="#FFFFFFF">
<tr>
  <td width= "50%">
    &nbsp; &nbsp; <img src = "./images/logo.png" width="270"> 
  </td>
 </tr>    
 </table>
<br>
 <div class="container">
        
         <div class="row pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Login </h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form" action="" method="post">
<br/>
                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" />
                                        </div>
										
                                      <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" />
                                        </div>
       
									<input type="submit" value = "Login" name="submit">
                                    <br>
                                  <!-- <a href="index.php?link=login" >Signup here</a>-->
                                    </form>
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>
<div id = "info"></div>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <!--<script src="js/jquery-1.10.2.js"></script>-->
    <!-- BOOTSTRAP SCRIPTS  -->
   <!-- <script src="js/bootstrap.js"></script>-->
	
<?php //include('footer.php');  ?>

</body>
</html>
