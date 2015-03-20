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
    <title>farmhouse</title>
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
	
	if (document.add_lifestyle.name.value == "!`@#$%^&*()+=[]\\\';,./{}|\":<>?~_")
          {
		alert('Name : Please Enter valid juice name');
		document.add_lifestyle.name.focus();
		return false;
          }
	
	if (document.add_lifestyle.image1.value== '')
          {
		alert('Image : Please Select an image for Juice');
		document.add_lifestyle.image1.focus();
		return false;
          }	
	
      return true;
     }
 
 
 
 /* function addItems(){
 
 $(document).ready(function(){
                    $("#button").click(function(){
                        
                          var ditems=$("#ditems").val();
                          
                          $.ajax({
                              type:"post",
                              url:"lifestyle_temp_items_insert.php",
                              data:"ditems="+ditems,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });
} */
</script> 
<?php
if(isset($_POST['submit']))
{
  $lifestyle_id = $_REQUEST['lifestyle_id'];
  $dname = $_REQUEST['dname'];
   $langId = $_REQUEST['langId'];
  $ditems = $_REQUEST['ditems'];
  $price = $_REQUEST['price'];
  $t_1 = $_REQUEST['t_1'];
  $d_1 = $_REQUEST['d_1'];
  
  $ip = $_SERVER["REMOTE_ADDR"];
  $date_added = date("Y/m/d");
//echo $name;

  $sql = "INSERT INTO farmhouse_lifestyle_program (lifestyle_id,lifestyle_name,lifestyle_items,lifestyle_price,title_1,discription_1,ip,date_added,countrylang_id) 
  values('$lifestyle_id','$dname','$ditems','$price','$t_1','$d_1','$ip','$date_added','1')";
  
  if(mysqli_query($conn,$sql))
				{
					?>
					<script>
					
					window.location='farmhouse_product_drag_drop/demo_lifestyle.php?dname=<?=$dname?>&langId=<?=$langId?>';
					
					</script>
					<?php
				}
			else
				{
					echo "Error:".$sql."<br>".mysqli_error($conn);
				}
}

?>


  <body> 
    <form method="POST" action = "">
<br><br>
    <div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Add lifestyle </h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
                                        <div class="form-group input-group">
                                           
                                            <input type="hidden" name= "lifestyle_id" id  = "lifestyle_id" class="form-control" required="" maxlength="50" placeholder="lifestyle Id" />
                                        </div>
                                         
										 <div class="form-group input-group">
                                            <span class="input-group-addon">lifestyle Name</span>
                                            <input type="text" name= "dname" id  = "dname" class="form-control" required="" maxlength="50" placeholder="lifestyle Name" />
                                        </div>
										
										
										<div class="form-group input-group">
                                           
                                            <input type = "hidden" name= "added_lifestyle_items" id  = "added_lifestyle_items" class="form-control" placeholder="Added lifestyle Items" />
                                        </div>
										
										 <div class="form-group input-group">
                                           
                                            <input type = "hidden" name= "price" id  = "price" class="form-control" required="" placeholder="Price" />
                                             <input type = "hidden" name= "langId" id  = "langId" class="form-control" value="1" />
										</div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Title</span>
                                            <textarea name= "t_1" id  = "t_1" class="form-control" required="" placeholder="lifestyle Title" /></textarea>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Description</span>
                                            <textarea name= "d_1" id  = "d_1" class="form-control" required="" placeholder="Description" /></textarea>
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



