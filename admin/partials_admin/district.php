<?php
include('database/db_connect.php');
error_reporting(0);
?>
<html>
 <head> 
   <title> - Farm House- </title> <meta  http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
       <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
    
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLE CSS -->
    <link href="./css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="./css/style.css" rel="stylesheet" />    
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


   </head> 
<script language="JavaScript" type="text/javascript">
function validate()
     {
	

	if (document.district.districtname.value == '')
          {
		alert('Name : Please Enter city name');
		document.district.districtname.focus();
		return false;
          }
      return true;
     }
 
</script> 
<?php
if(isset($_POST['submit']))
{
  $district_name = $_REQUEST['district_name'];
  
  
 // $date_added = date("Y/m/d");
//echo $name;

  $sql = "INSERT INTO farmhouse_user_district (district) 
  values('$district_name')";
  
  if(mysqli_query($conn,$sql))
				{
					echo $district_name. " added successfully";
					
				}
			else
				{
					echo "Error:".$sql."<br>".mysqli_error($conn);
				}
}

?>

  <body> 
    <form method="POST" name='district' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
<br><br>
    <div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4>District</h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">District Name</span>
                                            <input type="text" name= "district_name" id  = "district_name" class="form-control" maxlength="50" placeholder="District Name" />
                                        </div>
										
										
										
<!--                                     <a href="#" class="btn btn-success ">Register Me</a> -->
   <input name = "submit" type = "submit" value = "Add"  class="btn btn-success">
                                    
                            </div>
                           
                        </div>
                    </div>
                
                
        </div>
    </div>


    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="./js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="./js/bootstrap.js"></script>
</form>   
</body>
<


                  </body> 
               </html> 



