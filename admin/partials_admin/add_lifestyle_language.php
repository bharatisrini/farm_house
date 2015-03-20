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
	
	if (document.add_lifestyle_language.name.value == "!`@#$%^&*()+=[]\\\';,./{}|\":<>?~_")
          {
		alert('Name : Please Enter valid juice name');
		document.add_lifestyle_language.name.focus();
		return false;
          }
	
	if (document.add_lifestyle_language.image1.value== '')
          {
		alert('Image : Please Select an image for Juice');
		document.add_lifestyle_language.image1.focus();
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
                              url:"detox_temp_items_insert.php",
                              data:"ditems="+ditems,
                              success:function(data){
                                 $("#info").html(data);
                              }
 
                          });
 
                    });
               });
} */
$(function(){
	 //alert("y");
	 $("#product").click(function(e){
	 var prd_name=$("#product").val();
	// if(prd_name==""){
	// alert("Please Select Product");
	// return false;
	 //}
	 dataPass="prd_name="+prd_name;
	 urls="changelifestyle.php";
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
						$("#dtxitems").html(datasp[1]);
						$("#ttl").html(datasp[2]);
						$("#des").html(datasp[3]);
						
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
  $detox_id = $_REQUEST['detox_id'];
  $dname = $_REQUEST['dname'];
  $ditems = $_REQUEST['ditems'];
  $price = $_REQUEST['price'];
  $product=$_REQUEST['product'];
  $t_1 = $_REQUEST['t_1'];
  $d_1 = $_REQUEST['d_1'];
  $ip = $_SERVER["REMOTE_ADDR"];
  $date_added = date("Y/m/d");
//echo $name;
 $sql_d_id = "select * from farmhouse_lifestyle_program where lifestyle_name ='$product'";
   $res_id = mysqli_query($conn,$sql_d_id);
   $row_id = mysqli_fetch_array($res_id);
   $lsitem_id = $row_id['lifestyle_items_id'];
   
   
  $sql = "INSERT INTO farmhouse_lifestyle_program (lifestyle_id,lifestyle_name,lifestyle_items,lifestyle_price,title_1,discription_1,ip,date_added,countrylang_id,lifestyle_items_id) 
  values('$detox_id','$dname','$ditems','$price','$t_1','$d_1','$ip','$date_added','$langid','$lsitem_id')";
  
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
    <form method="POST" action = "">
<br><br>
    <div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                        <strong>  <h4> Convert Lifestyle to Other Languages </h4></strong>  
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
								<span class="input-group-addon"><label>Lifestyle Name</label></span>
									
									<select  name="product" id="product">
										<option value="">Select Lifestyle Name</option>
										<?php
										$sql_go = "select * from  farmhouse_lifestyle_program where countrylang_id = '1'";  
										$res_go = mysqli_query($conn,$sql_go);
										while($row_go = mysqli_fetch_array($res_go)) {

										?>
										<option value="<?php echo $row_go['lifestyle_name']; ?>"><?php echo $row_go['lifestyle_name']; ?></option>
									<?php } ?>
									</select>
										
										</div>

                                        <div class="form-group input-group">
                                           <!--<span class="input-group-addon">Detox Id</span>-->
                                            <input type="hidden" name= "detox_id" id  = "detox_id" class="form-control" required="" maxlength="50" placeholder="Detox Id" />
                                        </div>
                                         
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Lifestyle Name</span>
                                            <span class="input-group-addon1" id="prdname"><?php ?></span>
											<input type="text" name= "dname" id  = "dname" class="form-control" required="" value="<?php ?>"  placeholder="Lifestyle Name" maxlength="50"  />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Lifestyle Items</span>
                                            <span class="input-group-addon1" id="dtxitems"><?php ?></span>
											<textarea name= "ditems" id  = "ditems" class="form-control" required="" value="<?php ?>"  placeholder="Detox Name"> </textarea>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Price</span>
											<span class="input-group-addon1" id="prc"><?php ?></span>
                                            <input type = "text" name= "price" id  = "price" class="form-control" required="" placeholder="Price" />
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Title</span>
											<span class="input-group-addon1" id="ttl"><?php ?></span>
                                            <textarea name= "t_1" id  = "t_1" class="form-control" value="<?php ?>" required="" placeholder="Detox Title" /></textarea>
                                        </div>
										
										<div class="form-group input-group">
                                            <span class="input-group-addon">Description</span>
											<span class="input-group-addon1" id="des"><?php ?></span>
                                            <textarea name= "d_1" id  = "d_1" class="form-control" value="<?php ?>" required="" placeholder="Description" /></textarea>
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



