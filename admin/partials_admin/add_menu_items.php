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
	

	if (document.add_menu_items.menuname.value == '')
          {
		alert('Name : Please Enter menuname name');
		document.add_menu_items.menuname.focus();
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
  $menuname1 = $_REQUEST['menuname1'];
  $link1 = $_REQUEST['link1'];
  $menuname2 = $_REQUEST['menuname2'];
  $link2 = $_REQUEST['link2'];
  $menuname3 = $_REQUEST['menuname3'];
  $link3 = $_REQUEST['link3'];
  $menuname4 = $_REQUEST['menuname4'];
  $link4 = $_REQUEST['link4'];
  $menuname5 = $_REQUEST['menuname5'];
  $link5 = $_REQUEST['link5'];
  $menuname6 = $_REQUEST['menuname6'];
  $link6 = $_REQUEST['link6'];
  $menuname7 = $_REQUEST['menuname7'];
  $link7 = $_REQUEST['link7'];
  $menuname8 = $_REQUEST['menuname8'];
  $link8 = $_REQUEST['link8'];
  $menuname9 = $_REQUEST['menuname9'];
  $link9 = $_REQUEST['link9'];
  $menuname10 = $_REQUEST['menuname10'];
  $link10 = $_REQUEST['link10'];
  $menuname11 = $_REQUEST['menuname11'];
  $link11 = $_REQUEST['link11'];
  $menuname12 = $_REQUEST['menuname12'];
  $link12 = $_REQUEST['link12'];
  $menuname13 = $_REQUEST['menuname13'];
  $link13 = $_REQUEST['link13'];
  $menuname14 = $_REQUEST['menuname14'];
  $link14 = $_REQUEST['link14'];
  $menuname15 = $_REQUEST['menuname15'];
  $link15 = $_REQUEST['link15'];
  
/*	$sql_lid = "select countrylang_id from  farmhouse_country_language where language = '$language'";  
	$res_lid = mysqli_query($conn,$sql_lid);
	$row_lid = mysqli_fetch_array($res_lid);
$langid = $row_lid['countrylang_id'];
  echo $langid; echo " "; 
  echo $menuname; echo "<br>";*/
 // $date_added = date("Y/m/d");
//echo $name;

  $sql = "INSERT INTO farmhouse_menu (menu_name1, menu_link1, menu_name2, menu_link2, menu_name3, menu_link3, menu_name4, menu_link4, menu_name5, menu_link5, menu_name6, menu_link6, menu_name7, menu_link7, menu_name8, menu_link8, menu_name9, menu_link9, menu_name10, menu_link10, 
menu_name11, menu_link11, menu_name12, menu_link12, menu_name13, menu_link13, menu_name14, menu_link14, menu_name15, menu_link15, 
countrylang_id) 
  values('$menuname1', '$link1','$menuname2', '$link2','$menuname3', '$link3','$menuname4', '$link4','$menuname5', '$link5','$menuname6', '$link6',
'$menuname7', '$link7','$menuname8', '$link8','$menuname9', '$link9','$menuname10', '$link10',
'$menuname11', '$link11','$menuname12', '$link12','$menuname13', '$link13','$menuname14', '$link14','$menuname15', '$link15','1')";
  
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
                        <strong>  <h4>Add Menu Items</h4></strong>  
                            </div>
                            <div class="panel-body">
                                <form role="form">
<br/>
	

                                        
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name  &nbsp; 1</span>
                                            <input type="text" name= "menuname1" id  = "menuname1" class="form-control" maxlength="50" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 1</span>
                                            <input type="text" name= "link1" id  = "link1" class="form-control" maxlength="255" placeholder="Link 1" />
                                        </div>
										
	
                                         <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 2</span>
                                            <input type="text" name= "menuname2" id  = "menuname2" class="form-control" maxlength="50" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 2</span>
                                            <input type="text" name= "link2" id  = "link2" class="form-control" maxlength="255" placeholder="Link 2" />
                                        </div> 
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 3</span>
                                            <input type="text" name= "menuname3" id  = "menuname3" class="form-control" maxlength="50" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 3</span>
                                            <input type="text" name= "link3" id  = "link3" class="form-control" maxlength="255" placeholder="Link 3" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 4</span>
                                            <input type="text" name= "menuname4" id  = "menuname4" class="form-control" maxlength="50" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 4</span>
                                            <input type="text" name= "link4" id  = "link4" class="form-control" maxlength="255" placeholder="Link 4" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 5</span>
                                            <input type="text" name= "menuname5" id  = "menuname5" class="form-control" maxlength="50" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 5</span>
                                            <input type="text" name= "link5" id  = "link5" class="form-control" maxlength="255" placeholder="Link 5" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 6</span>
                                            <input type="text" name= "menuname6" id  = "menuname6" class="form-control" maxlength="60" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 6</span>
                                            <input type="text" name= "link6" id  = "link6" class="form-control" maxlength="266" placeholder="Link 6" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 7</span>
                                            <input type="text" name= "menuname7" id  = "menuname7" class="form-control" maxlength="70" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 7</span>
                                            <input type="text" name= "link7" id  = "link7" class="form-control" maxlength="277" placeholder="Link 7" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 8</span>
                                            <input type="text" name= "menuname8" id  = "menuname8" class="form-control" maxlength="80" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 8</span>
                                            <input type="text" name= "link8" id  = "link8" class="form-control" maxlength="288" placeholder="Link 8" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name &nbsp; 9</span>
                                            <input type="text" name= "menuname9" id  = "menuname9" class="form-control" maxlength="90" placeholder="Menu Name" />
											<span class="input-group-addon">Link &nbsp; 9</span>
                                            <input type="text" name= "link9" id  = "link9" class="form-control" maxlength="299" placeholder="Link 9" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name 10</span>
                                            <input type="text" name= "menuname10" id  = "menuname10" class="form-control" maxlength="100" placeholder="Menu Name" />
											<span class="input-group-addon">Link 10</span>
                                            <input type="text" name= "link10" id  = "link10" class="form-control" maxlength="21010" placeholder="Link 10" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name 11</span>
                                            <input type="text" name= "menuname11" id  = "menuname11" class="form-control" maxlength="110" placeholder="Menu Name" />
											<span class="input-group-addon">Link 11</span>
                                            <input type="text" name= "link11" id  = "link11" class="form-control" maxlength="21111" placeholder="Link 11" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name 12</span>
                                            <input type="text" name= "menuname12" id  = "menuname12" class="form-control" maxlength="120" placeholder="Menu Name" />
											<span class="input-group-addon">Link 12</span>
                                            <input type="text" name= "link12" id  = "link12" class="form-control" maxlength="21212" placeholder="Link 12" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name 13</span>
                                            <input type="text" name= "menuname13" id  = "menuname13" class="form-control" maxlength="130" placeholder="Menu Name" />
											<span class="input-group-addon">Link 13</span>
                                            <input type="text" name= "link13" id  = "link13" class="form-control" maxlength="21313" placeholder="Link 13" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name 14</span>
                                            <input type="text" name= "menuname14" id  = "menuname14" class="form-control" maxlength="140" placeholder="Menu Name" />
											<span class="input-group-addon">Link 14</span>
                                            <input type="text" name= "link14" id  = "link14" class="form-control" maxlength="21414" placeholder="Link 14" />
                                        </div>
										
										 <div class="form-group input-group">
                                            <span class="input-group-addon">Menu Name 15</span>
                                            <input type="text" name= "menuname15" id  = "menuname15" class="form-control" maxlength="150" placeholder="Menu Name" />
											<span class="input-group-addon">Link 15</span>
                                            <input type="text" name= "link15" id  = "link15" class="form-control" maxlength="21515" placeholder="Link 15" />
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



