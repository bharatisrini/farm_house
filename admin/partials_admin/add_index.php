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
	

	if (document.add_index.menuname.value == '')
          {
		alert('Name : Please Enter menuname name');
		document.add_index.menuname.focus();
		return false;
          }
      return true;
     }
 
</script> 
<?php
	$sql_show = "select * from farmhouse_menu";  
	$res_show= mysqli_query($conn,$sql_show);
	while($row_show= mysqli_fetch_array($res_show)){
$pid = $row_show['menu_name'];
//        echo $pid; echo "s. <br>";
}

if(isset($_POST['submit']))
{
	
  $language = $_REQUEST['language'];
  $image1 = $_REQUEST['image1'];
  $heading1 = $_REQUEST['heading1'];
  $discription1 = $_REQUEST['discription1'];
  $image2 = $_REQUEST['image2'];
  $heading2 = $_REQUEST['heading2'];
  $discription2 = $_REQUEST['discription2'];
  $image3 = $_REQUEST['image3'];
  $heading3 = $_REQUEST['heading3'];
  $discription3 = $_REQUEST['discription3'];
   

 
 // $date_added = date("Y/m/d");
//echo $name;
$sql_lid = "select countrylang_id from  farmhouse_country_language where language = '$language'";  
	$res_lid = mysqli_query($conn,$sql_lid);
	$row_lid = mysqli_fetch_array($res_lid);
$langid = $row_lid['countrylang_id'];

  $sql = "INSERT INTO farmhouse_index (image1, heading1, discription1,image2, heading2, discription2,image3, heading3, discription3,countrylang_id)
  values('$image1', '$heading1','$discription1', '$image2', '$heading2','$discription2','$image3', '$heading3','$discription3','$langid')";
  
  if(mysqli_query($conn,$sql))
				{
					echo "New Menu Item "; echo $menuname; echo" "; echo "added";
					
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
                        <strong>  <h4>Add Index</h4></strong>  
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

                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Image 1 </span>
                                            <input type="text" name= "image1" id  = "image1" class="form-control" maxlength="50" placeholder="Menu Name" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Heading 1 </span>
                                            <input type="text" name= "heading1" id  = "heading1" class="form-control" maxlength="255" placeholder="Heading 1" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Descripition 1 </span>
                                            <textarea name= "discription1" id  = "discription1" class="form-control" maxlength="255" placeholder="Description 1" ></textarea>
                                        </div>
										<div class="form-group input-group">
											
                                        </div>
	
                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Image 2  </span>
                                            <input type="text" name= "image2" id  = "image2" class="form-control" maxlength="50" placeholder="Menu Name" />
											</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Heading 2 </span>
                                            <input type="text" name= "heading2" id  = "heading2" class="form-control" maxlength="255" placeholder="Heading 2" />
											</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Descripition 2 </span>
                                            <textarea name= "discription2" id  = "discription2" class="form-control" maxlength="255" placeholder="Description 2" ></textarea>
                                        </div>	
<div class="form-group input-group">
											
                                        </div>
											<div class="form-group input-group">
                                            <span class="input-group-addon">Image 3  </span>
                                            <input type="text" name= "image3" id  = "image3" class="form-control" maxlength="50" placeholder="Menu Name" />
											</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Heading 3 </span>
                                            <input type="text" name= "heading3" id  = "heading3" class="form-control" maxlength="255" placeholder="Heading 3" />
											</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Descripition 3 </span>
                                            <textarea name= "discription3" id  = "discription3" class="form-control" maxlength="255" placeholder="Description 3" ></textarea>
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



