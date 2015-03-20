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
<!--<script language="JavaScript" type="text/javascript">
function validate()
     {
	

	if (document.city.cityname.value == '')
          {
		alert('Name : Please Enter city name');
		document.city.cityname.focus();
		return false;
          }
      return true;
     }
	 
</script> -->

<script>
function myFunction(id) {
	
	var j=document.getElementById(id).innerHTML;
    if(j == "")
	document.getElementById(id).innerHTML = '<img src="../../images/icon-deliver.png"/>';
	else
	document.getElementById(id).innerHTML ="";
		
}
</script>
<?php
if(isset($_POST['submit']))
{
  $prog_name = $_REQUEST['pname'];
  
 // $date_added = date("Y/m/d");
//echo $name;

  $sql = "INSERT INTO farmhouse_schedule_delivery_program () 
  values('')";
  
  if(mysqli_query($conn,$sql))
				{
					
					
				}
			else
				{
					echo "Error:".$sql."<br>".mysqli_error($conn);
				}
}

?>

  <body> 
    <form method="POST" name='city' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
<br><br>
    <table width="80%" border="1">
  <tr>
    <th width="21%" rowspan="2" scope="col"><div align="center">Programe Name </div></th>
    <th colspan="7" scope="col"><div align="center">Days Of Delivery Schedule </div></th>
    <th width="13%" rowspan="2" scope="col"><div align="center">Status</div></th>
  </tr>
  <tr>
    <th width="10%" scope="col"><div align="center">Mon</div></th>
    <th width="10%" scope="col"><div align="center">Tue</div></th>
    <th width="10%" scope="col"><div align="center">Wed</div></th>
    <th width="10%" scope="col"><div align="center">Thu</div></th>
    <th width="10%" scope="col"><div align="center">Fri</div></th>
    <th width="10%" scope="col"><div align="center">Sat</div></th>
    <th width="10%" scope="col"><div align="center">Sun</div></th>
  </tr>
  <tr>
    <th scope="row"><input type = "text" style="border:none" id = "pname"/></th>
    <td onClick="myFunction(this.id)" id = "a" bgcolor="#33CCFF" width="110" height="85"></td>
    <td onClick="myFunction(this.id)" id = "b" bgcolor="#33CCFF" width="110" height="85"></td>
    <td onClick="myFunction(this.id)" id = "c" bgcolor="#33CCFF" width="110" height="85"></td>
    <td onClick="myFunction(this.id)" id = "d" bgcolor="#33CCFF" width="110" height="85"></td>
    <td onClick="myFunction(this.id)" id = "e" bgcolor="#33CCFF" width="110" height="85"></td>
    <td onClick="myFunction(this.id)" id = "f" bgcolor="#33CCFF" width="110" height="85"></td>
    <td onClick="myFunction(this.id)" id = "g" bgcolor="#33CCFF" width="110" height="85"></td>
    <td align="center"><input type="radio" name="active" value="active" checked>Active
<br><br>
<input type="radio" name="active" value="inactive">Inactive</td>
  </tr>
 
</table>
<br><br>
<div align="center"><input name = "submit" type = "submit" value = "Submit"  class="btn btn-success"></div>
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="./js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="./js/bootstrap.js"></script>
</form>   
</body>
</html> 



