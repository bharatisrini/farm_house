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


	if (document.country_language.country_name.value == '')
          {
		alert('Name : Please Enter Country name');
		document.country_language.country_name.focus();
		return false;
          }
	if (document.country_language.language_name.value == '')
          {
		alert('Name : Please Enter Country name');
		document.country_language.language_name.focus();
		return false;
          }
      return true;
     }

</script>
<?php
if(isset($_POST['submit']))
{
  $country_name = $_REQUEST['country_name'];
  $language_name = $_REQUEST['language_name'];

 // $date_added = date("Y/m/d");
//echo $name;

  $sql = "INSERT INTO farmhouse_country_language (country, language)
  values('$country_name','$language_name')";

  if(mysqli_query($conn,$sql))
				{
					echo "values added successfully";

				}
			else
				{
					echo "Error:".$sql."<br>".mysqli_error($conn);
				}
}

?>

  <body>
    <form method="POST" name='country_language' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
<br><br>
    <div class="container">

         <div class="row  pad-top">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4>Country Language</h4></strong>
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>

                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Country Name</span>
                                            <input type="text" name= "country_name" id  = "district_name" class="form-control" maxlength="50" placeholder="Country Name" />
                                        </div>

										  <div class="form-group input-group">
                                            <span class="input-group-addon">Language Name</span>
                                            <input type="text" name= "language_name" id  = "language_name" class="form-control" maxlength="3" placeholder="Language Name" />
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



