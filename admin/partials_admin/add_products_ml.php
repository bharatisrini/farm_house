<?php
include('database/db_connect.php');
error_reporting(0);
	
?>
<html>
 <head> 
   <title> - Farm House- </title> <meta  http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
       <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="discription" content="" />
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
	

	if (document.add_footer.menuname.value == '')
          {
		alert('Name : Please Enter menuname name');
		document.add_footer.menuname.focus();
		return false;
          }
      return true;
     }
 
</script> 
<?php
	echo "<h1> added so far </h1>";
	$sql_show = "select * from farmhouse_menu";  
	$res_show= mysqli_query($conn,$sql_show);
	while($row_show= mysqli_fetch_array($res_show)){
$pid = $row_show['menu_name'];
//        echo $pid; echo "s. <br>";
}

if(isset($_POST['submit']))
{
	
 $language  = $_REQUEST['language'];
$heading = $_REQUEST['heading'];
  $placeholder = $_REQUEST['placeholder'];
  $button_name = $_REQUEST['button_name'];
  $carrers = $_REQUEST['carrers'];
  $carrers_link = $_REQUEST['carrers_link'];
  $contactus = $_REQUEST['contactus'];
  $contactus_link = $_REQUEST['contactus_link'];
  $copyright = $_REQUEST['copyright'];


 
 // $date_added = date("Y/m/d");
//echo $name;
$sql_lid = "select countrylang_id from  farmhouse_country_language where language = '$language'";  
	$res_lid = mysqli_query($conn,$sql_lid);
	$row_lid = mysqli_fetch_array($res_lid);
$langid = $row_lid['countrylang_id'];
//echo $langid;

  $sql = "INSERT INTO farmhouse_product_multi_language (name, ingredients,benifits,nutritional_content,product_type,countrylang_id)
  values('$name', '$ingredients','$benifits','$nutritional_content','$product_type','$langid')";
  
  if(mysqli_query($conn,$sql))
				{
					echo "New Footer ";  echo "added";
					
				}
			else
				{
					echo "Error:".$sql."<br>".mysqli_error($conn);
				}
}

?>

  <body> 
    <form method="POST" name='menuname' action = "<?php $PHP_SELF ?>" enctype="multipart/form-data" onsubmit = "return validate()">
<br><br>
    <div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4>Add Product Details Multi Language</h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
									<div class="form-group input-group">
								<span class="input-group-addon"><label>Language</label></span>
										
				
									<select name="language">
										<option value="">Select Language</option>
										<?php
										$sql_go = "select * from  farmhouse_country_language";  
										$res_go = mysqli_query($conn,$sql_go);
										while($row_go = mysqli_fetch_array($res_go)) {

										?>
										<option value="<?php echo $row_go['language']; ?>"><?php echo $row_go['language']; ?></option>
									<?php } ?>
									</select>
										
										</div>
										<?php
										$sql_get = "select * from   farmhouse_product_multi_language";  
										$res_get = mysqli_query($conn,$sql_get);
										$row_get = mysqli_fetch_assoc($res_get);
										?>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Name</span>
											<span class="input-group-addon"><?php echo $row_get['name']; ?> </span>
                                            <input type="text" name= "name" id  = "name" class="form-control" maxlength="50" placeholder="Name" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">	</span>
												<span class="input-group-addon"><?php echo $row_get['placeholder']; ?> </span>
                                            <input type="text" name= "placeholder" id  = "placeholder" class="form-control" maxlength="255" placeholder="Placeholder" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Button Name </span>
												<span class="input-group-addon"><?php echo $row_get['button_name']; ?> </span>
                                            <input type="text" name= "button_name" id  = "button_name" class="form-control" maxlength="255" placeholder="Button Name" />
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Carrers </span>
												<span class="input-group-addon"><?php echo $row_get['carrers']; ?> </span>
                                            <input type="text" name= "carrers" id  = "carrers" class="form-control" maxlength="50" placeholder="Carrers" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Carrers Link </span>
												<span class="input-group-addon"><?php echo $row_get['carrers_link']; ?> </span>
                                            <input type="text" name= "carrers_link" id  = "carrers_link" class="form-control" maxlength="255" placeholder="Carrers Link" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Contactus </span>
												<span class="input-group-addon"><?php echo $row_get['contactus']; ?> </span>
                                            <input type="text" name= "contactus" id  = "contactus" class="form-control" maxlength="255" placeholder="Contact Us" />
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Contactus Link </span>
												<span class="input-group-addon"><?php echo $row_get['contactus_link']; ?> </span>
                                            <input type="text" name= "contactus_link" id  = "contactus_link" class="form-control" maxlength="50" placeholder="Contactus Link" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Copyright </span>
												<span class="input-group-addon"><?php echo $row_get['copyright']; ?> </span>
                                            <input type="text" name= "copyright" id  = "copyright" class="form-control" maxlength="255" placeholder="Copyright" />
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



