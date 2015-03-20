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


	<script type="text/javascript" src="../../js/jquery-1.11.0.min.js"></script>
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
	 
	 $(function(){
	 //alert("y");
	 $("#product").click(function(e){
	 var prd_name=$("#product").val();
	// if(prd_name==""){
	// alert("Please Select Product");
	// return false;
	 //}
	 dataPass="prd_name="+prd_name;
	 urls="changejuice.php";
	 $("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :urls,
						data :dataPass,
						cache :false,
						success : function(html) {
							//alert(html);	
						//$("#dsp").html(html).show();
						var datasp=html.toString().split('#');
						//alert(datasp[0]);
						$("#prc").html(datasp[0]);
						$("#qty").html(datasp[1]);
						$("#wgt").html(datasp[2]);
						$("#ingr").html(datasp[3]);
						$("#benf").html(datasp[4]);
						$("#nutcon").html(datasp[5]);

						
					//	if(html.tostring()=='deleted File'){
												//}
					}
			});
	 
	 $("#prdname").html(prd_name);
	 });
	 
	 });

</script>
<?php
if(isset($_POST['submit']))
{
  $langid = $_REQUEST['language'];
  $name = $_REQUEST['name'];
  $name_lang = $_REQUEST['product'];
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


$sql_pid = "select product_id from farmhouse_juice_details where name_lang = '$name_lang'";
$result= mysqli_query($conn,$sql_pid);
$row = mysqli_fetch_assoc($result);
$pid = $row['product_id'];
//$pid = $pid+1;



  $sql = "INSERT INTO farmhouse_juice_details (product_id,name,quantity,image,price,weight,ingredients,benifits,nutritional_content,date_added,image2,product_type,countrylang_id,name_lang)
  values('$pid','$name','$quantity','$image','$price','$weight','$ingredients','$benifits','$nutritional_content','$date_added','$image2','$ptype','$langid','$name_lang')";

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
    <form method="POST" name='add_new_juices'  action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
<div id="dsp"></div>
    <div class="container">

         <div class="row  pad-top">

                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading" >
                        <strong>  <h4> Convert Juice to Other Languages </h4></strong>
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
									<div class="form-group input-group">
								<span class="input-group-addon"><label>Language</label></span>
										
				
									<select name="language">
										<option value="">Select Language</option>
										<?php
										$sql_go = "select * from  farmhouse_country_language where language != 'Eng'";  
										$res_go = mysqli_query($conn,$sql_go);
										while($row_go = mysqli_fetch_array($res_go)) {

										?>
										<option value="<?php echo $row_go['countrylang_id']; ?>"><?php echo $row_go['language']; ?></option>
									<?php } ?>
									</select>
										
										</div>
	
									<div class="form-group input-group">
								<span class="input-group-addon"><label>Product</label></span>
										
				
									<select name="product" id="product">
										<option value="">Select product</option>
										<?php
										$sql_go = "select * from  farmhouse_juice_details where countrylang_id = '1'";  
										$res_go = mysqli_query($conn,$sql_go);
										while($row_go = mysqli_fetch_array($res_go)) {

										?>
										<option value="<?php echo $row_go['name']; ?>"><?php echo $row_go['name']; ?></option>
									<?php } ?>
									</select>
										
										</div>
										
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Name</span>
											<span class="input-group-addon1" id="prdname"></span>
                                            <input type="text" name= "name" id  = "name" class="form-control" maxlength="50" value = "<?php ?>" />
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
											<span class="input-group-addon1" id="prc"><?php ?></span>
                                            <input type="price" name= "price" id  = "price" class="form-control" value = "<?php ?>" />
                                        </div>

									 <div class="form-group input-group">
                                            <span class="input-group-addon">Quantity</span>
											<span class="input-group-addon1" id="qty"><?php ?></span>
                                            <input type="text" name= "quantity" id  = "quantity" class="form-control" value = "<?php ?>" />
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Weight</span>
											<span class="input-group-addon1" id="wgt"><?php ?></span>
                                            <input type="text" name= "weight" id  = "weight" class="form-control" value = "<?php ?>" />
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Ingredients</span>
											<span class="input-group-addon1" id="ingr"><?php ?></span>
                                            <textarea name= "ingredients" id  = "ingredients" class="form-control" value = "<?php ?>" /></textarea>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Benefits</span>
											<span class="input-group-addon1" id="benf"><?php ?></span>
                                            <textarea name= "benifits" id  = "benifits" class="form-control" value = "<?php ?>" /></textarea>
                                        </div>

										<div class="form-group input-group">
                                            <span class="input-group-addon">Nutritional Content</span>
											<span class="input-group-addon1" id="nutcon" style= bgcolor:#wer;><?php ?></span>
                                            <textarea name= "nutritional_content" id  = "nutritional_content" class="form-control" value = "<?php ?>" /></textarea>
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



