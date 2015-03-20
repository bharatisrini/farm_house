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
    <title>ecomm Sign up Page</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet" />
	 <link href="../css/bootstrap.min.css" rel="stylesheet" />
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

	if (document.add_new_juices.name.value == "!`@#$%^&*()+=[]\\\';,./{}|\":<>?~_")
          {
		alert('Name : Please Enter valid juice name');
		document.add_new_juices.name.focus();
		return false;
          }

	if (document.add_new_juices.image1.value== '')
          {
		alert('Image : Please Select an image for Juice');
		document.add_new_juices.image1.focus();
		return false;
          }

      return true;
     }

</script>
<?php
if(isset($_POST['submit']))
{
  $language = $_REQUEST['language'];
  $name = $_REQUEST['name'];
  $image = $_FILES['image1']["name"];
  $image2 = $_FILES['image2']["name"];
  $price = $_REQUEST['price'];
  $quantity = $_REQUEST['quantity'];
  $weight = $_REQUEST['weight'];
  $ingredients = $_REQUEST['ingredients'];
  $benifits = $_REQUEST['benifits'];
  $ptype = $_REQUEST['ptype'];
  $nutritional_content = $_REQUEST['nutritional_content'];
  $date_added = date("Y/m/d");
//echo $name;


$sql_pid = "select MAX(product_id) as prid from farmhouse_juice_details";
$result= mysqli_query($conn,$sql_pid);
$row = mysqli_fetch_assoc($result);
$pid = $row['prid'];
$pid = $pid+1;

$sql_lid = "select countrylang_id from  farmhouse_country_language where language = '$language'";  
	$res_lid = mysqli_query($conn,$sql_lid);
	$row_lid = mysqli_fetch_array($res_lid);
$langid = $row_lid['countrylang_id'];


  $sql = "INSERT INTO farmhouse_juice_details (product_id,name,quantity,image,price,weight,ingredients,benifits,nutritional_content,date_added,image2,product_type,countrylang_id,name_lang)
  values('$pid','$name','$quantity','$image','$price','$weight','$ingredients','$benifits','$nutritional_content','$date_added','$image2','$ptype','$langid','$name')";

  if(mysqli_query($conn,$sql))
				{

                    if (copy($_FILES["image1"]["tmp_name"], "../../product_images/". $_FILES["image1"]["name"])) {
                           if (copy($_FILES["image2"]["tmp_name"], "../../product_images/". $_FILES["image2"]["name"])) {
                           echo("<B> values added successfully and File successfully copied!</B>");
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
  <br><br>
    <form method="POST" name='add_new_juices' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">

    <div class="container">

         <div class="row  pad-top">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" >
                        <strong>  <h4> Add New Juice </h4></strong>
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
	<div class="form-group input-group">
							
										<?php 
										$sql_go = "select * from  farmhouse_country_language";  
										$res_go = mysqli_query($conn,$sql_go);
										$row_go = mysqli_fetch_array($res_go);
											?>
							        <input type="hidden" name= "language" id  = "language" class="form-control" maxlength="3" value = "<?php echo $row_go['language']; ?>"/>
										
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Name</span>
                                            <input type="text" name= "name" id  = "name" class="form-control" maxlength="50" required="" placeholder="Juice Name" />
                                        </div>

										    <div class="form-group input-group">
                                            <span class="input-group-addon">Image </span>
													<input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
								                    <input type="file" name="image1" id = "image1" size = 30 /> Two Views <br><br>

													<input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
								                    <input type="file" name="image2" id = "image2" size = 30 /> Single View
                                        </div>

                                      <div class="form-group input-group">
                                            <span class="input-group-addon">Price</span>
                                            <input type="price" name= "price" id  = "price" class="form-control" required="" placeholder="Price" />
                                        </div>

									 <div class="form-group input-group">
                                            <span class="input-group-addon">Quantity</span>
                                            <input type="text" name= "quantity" id  = "quantity" class="form-control" required="" placeholder="Quantity" />
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Weight</span>
                                            <input type="text" name= "weight" id  = "weight" class="form-control" required="" placeholder="Weight" />
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Ingredients</span>
                                            <textarea name= "ingredients" id  = "ingredients" class="form-control" required="" placeholder="Ingradients" /></textarea>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Benefits</span>
                                            <textarea name= "benifits" id  = "benifits" class="form-control" required="" placeholder="Benefits" /></textarea>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Nutritional Content</span>
                                            <textarea name= "nutritional_content" id  = "nutritional_content" class="form-control" required="" placeholder="Nutrional Content" /></textarea>
                                        </div>
										<div class="form-group input-group">
										<span class="input-group-addon"><label>product type</label></span>
										<select name="ptype" id="ptype" tabindex="1">
										<option value="juice">Juice</option>
										<option value="hydration">Hydration</option>
										</select>
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



