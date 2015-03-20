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
	

	if (document.add_info_faq.menuname.value == '')
          {
		alert('Name : Please Enter menuname name');
		document.add_info_faq.menuname.focus();
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
$why_button_name= $_REQUEST['why_button_name'];  
$why_heading= $_REQUEST['why_heading'];
$why_image= $_REQUEST['why_image'];
$why_discription= $_REQUEST['why_discription'];
$how_button_name= $_REQUEST['how_button_name'];
$how_heading= $_REQUEST['how_heading'];
$how_image= $_REQUEST['how_image'];
$how_discription= $_REQUEST['how_discription'];
$tips_button_name= $_REQUEST['tips_button_name'];
$tips_heading= $_REQUEST['tips_heading'];
$tips_image= $_REQUEST['tips_image'];
$tips_discription= $_REQUEST['tips_discription'];
$story_button_name= $_REQUEST['story_button_name'];
$story_heading= $_REQUEST['story_heading'];
$story_image= $_REQUEST['story_image'];
$story_discription= $_REQUEST['story_discription'];
$tech_button_name= $_REQUEST['tech_button_name'];
$tech_heading= $_REQUEST['tech_heading'];
$tech_image= $_REQUEST['tech_image'];
$tech_discription= $_REQUEST['tech_discription'];
$countrylang_id= $_REQUEST['language'];



 
 // $date_added = date("Y/m/d");
//echo $name;
$sql_lid = "select countrylang_id from  farmhouse_country_language where language = '$language'";  
	$res_lid = mysqli_query($conn,$sql_lid);
	$row_lid = mysqli_fetch_array($res_lid);
$langid = $row_lid['countrylang_id'];

  $sql = "INSERT INTO farmhouse_info_faq (why_button_name, why_heading, why_image, why_discription,how_button_name, how_heading, how_image, how_discription,tips_button_name,tips_heading, tips_image, tips_discription,story_button_name, story_heading, story_image, story_discription,tech_button_name, tech_heading, tech_image, tech_discription,countrylang_id)
  values('$why_button_name','$why_heading','$why_image','$why_discription','$how_button_name','$how_heading','$how_image','$how_discription','$tips_button_name','$tips_heading','$tips_image','$tips_discription','$story_button_name','$story_heading','$story_image','$story_discription','$tech_button_name','$tech_heading','$tech_image','$tech_discription','$langid')";
  
  if(mysqli_query($conn,$sql))
				{
					echo "New Item "; echo" "; echo "added";
					
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
                        <strong>  <h4>Add Info & FAQ</h4></strong>  
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
                                            <span class="input-group-addon">Why Button Name</span>
                                            <input type="text" name= "why_button_name" id  = "why_button_name" class="form-control" maxlength="50" placeholder="Why Button Name" />
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Why Heading </span>
                                            <input type="text" name= "why_heading" id  = "why_heading" class="form-control" maxlength="50" placeholder="Why Heading" />
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Why Image </span>
                                            <input type="text" name= "why_image" id  = "why_image" class="form-control" maxlength="50" placeholder="Why Image" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Why Descripition</span>
											<textarea name= "why_discription" id  = "why_discription" class="form-control"  placeholder="Enter Descripition for Why" /></textarea>
										</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">How Button Name</span>
                                            <input type="text" name= "how_button_name" id  = "how_button_name" class="form-control" maxlength="50" placeholder="How Button Name" />
										</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">How Heading </span>
                                            <input type="text" name= "how_heading" id  = "how_heading" class="form-control" maxlength="50" placeholder="How Heading" />
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">How Image </span>
                                            <input type="text" name= "how_image" id  = "how_image" class="form-control" maxlength="50" placeholder="How Image" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">How Descripition</span>
                                            <textarea name= "how_discription" id  = "how_discription" class="form-control" placeholder="Enter Descripition for How" /></textarea>
										</div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Tips Button Name</span>
                                            <input type="text" name= "tips_button_name" id  = "tips_button_name" class="form-control" maxlength="50" placeholder="Tips Button Name" />
										</div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Tips Heading </span>
                                            <input type="text" name= "tips_heading" id  = "tips_heading" class="form-control" maxlength="50" placeholder="tips Heading" />
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Tips Image </span>
                                            <input type="text" name= "tips_image" id  = "tips_image" class="form-control" maxlength="50" placeholder="tips Image" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Tips Descripition</span>
                                            <textarea name= "tips_discription" id  = "tips_discription" class="form-control" placeholder="Enter Descripition for tips" /></textarea>
										</div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Story Button Name</span>
                                            <input type="text" name= "story_button_name" id  = "story_button_name" class="form-control" maxlength="50" placeholder="Story Button Name" />
										</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">Story Heading </span>
                                            <input type="text" name= "story_heading" id  = "story_heading" class="form-control" maxlength="50" placeholder="story Heading" />
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Story Image </span>
                                            <input type="text" name= "story_image" id  = "story_image" class="form-control" maxlength="50" placeholder="story Image" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Story Descripition</span>
                                            <textarea name= "story_discription" id  = "story_discription" class="form-control" maxlength="255" placeholder="Enter Descripition for story" /></textarea>
										</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">Tech Button Name</span>
                                            <input type="text" name= "tech_button_name" id  = "tech_button_name" class="form-control" maxlength="50" placeholder="Tech Button Name" />
										</div>
										<div class="form-group input-group">
                                            <span class="input-group-addon">Tech Heading </span>
                                            <input type="text" name= "tech_heading" id  = "tech_heading" class="form-control" maxlength="50" placeholder="tech Heading" />
										</div>
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Tech Image </span>
                                            <input type="text" name= "tech_image" id  = "tech_image" class="form-control" maxlength="50" placeholder="tech Image" />
										</div>
										<div class="form-group input-group">
											<span class="input-group-addon">Tech Descripition</span>
                                            <textarea name= "tech_discription" id  = "tech_discription" class="form-control" maxlength="255" placeholder="Enter Descripition for tech" /></textarea>
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



