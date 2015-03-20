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
	

	if (document.add_new_credit_cards.name.value == '')
          {
		alert('Name : Please Enter credit card name');
		document.add_new_credit_cards.name.focus();
		return false;
          }
	
	if (document.add_new_credit_cards.bname.value == '')
          {
		alert('Name : Please Enter bank name');
		document.add_new_credit_cards.bname.focus();
		return false;
          }
	if (document.add_new_credit_cards.image1.value== '')
          {
		alert('Image : Please Select an image');
		document.add_new_credit_cards.image1.focus();
		return false;
          }	
	
      return true;
     }
 
</script> 
<?php
if(isset($_POST['submit']))
{
  $cname = $_REQUEST['cname'];
  $bname = $_REQUEST['bname'];
  $image = $_FILES['image1']["name"];
  //$uploaddir = "product_images";
  $path = "../cr_card_images/".$file;
  $date_added = date("Y/m/d");
//echo $name;

  $sql = "INSERT INTO farmhouse_credit_card_details (card_name,bank_name,image,date_added) 
  values('$cname','$bname','$image','$date_added')";
  
  if(mysqli_query($conn,$sql))
				{
					echo "values added successfully";
					if (copy($_FILES["image1"]["tmp_name"], "../../cr_card_images/". $_FILES["image1"]["name"]))
                        {
                           echo("<B>File successfully copied!</B>");
       echo "<br>";echo "<br>";
                        }
                    else
                        {
                           echo("<B>Error: failed to copy file...</B>");
       echo "<br>";echo "<br>";
                        }
				}
			else
				{
					echo "Error:".$sql."<br>".mysqli_error($conn);
				}
}

?>

  <body> 
    <form method="POST" name='add_new_credit_cards' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
<br><br>
    <div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Add New Credit Cards </h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Card Name</span>
                                            <input type="text" name= "cname" id  = "cname" class="form-control" maxlength="50" placeholder="Credit Card Name" />
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Bank Name</span>
                                            <input type="text" name= "bname" id  = "bname" class="form-control" maxlength="50" placeholder="Bank Name" />
                                        </div>
										
										    <div class="form-group input-group">
                                            <span class="input-group-addon">Image </span> 
													<input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />                                      
								                    <input type="file" name="image1" id = "image1" size = 30 />
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



