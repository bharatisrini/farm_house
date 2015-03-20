<?php 
include('database/db_connect.php'); 
error_reporting(0);
//session_start();
//$cid = $_SESSION["customer_id"];
?>

<?php 

if(isset($_POST['submit'])) {
	
	$date = date_create($_POST['date1']);
	$date1 = date_format($date,"Y-m-d");
	//echo $date1; exit;
	$date11 = date_create($_POST['date2']);
	$date2 = date_format($date11,"Y-m-d");
	//$date2 = $_POST['date2'];
	//echo ($date1."-".$date2); exit;
	
	echo "<h2 align=center>Total items to be produced for date <span style='color:#F90'>$date1</span></h2><br><br><table align='center' width='80%' border='0'>
	
	<tr height='35' bgcolor='#00aeef'>
    
    <th>&nbsp;Product Name</th>
	<th>Image</th>
    <th align='center'><p align='center'>Total items to be prepared</p></th>
     </tr>";
	 
	 
	 $sql_showorders = "SELECT name, (SELECT count(product_name) FROM farmhouse_program_items a where b.name=a.product_name ) as items,
(select distinct count(no_people) from farmhouse_delivery_schedule c, farmhouse_program_items d where d.program_name=c.product_type and d.product_name=b.name and order_id!=0 and delivery_date between '$date1' and '$date2' and delivery_status=0 ) as noofppl,
(select distinct  count(no_people) from farmhouse_delivery_schedule e where e.product_type=b.name and order_id!=0 and delivery_date between '$date1' and '$date2' and delivery_status=0 and program_type='Retail') as retails
FROM farmhouse_juice_details b where countrylang_id='1' order by items desc, noofppl desc";
	 //$sql_showorders = "SELECT product_type, delivery_date FROM farmhouse_delivery_schedule";
	 
	$res_showorders = mysqli_query($conn,$sql_showorders);
	while($row_showorders = mysqli_fetch_array($res_showorders)) { 
	
	echo "<tr>
    
    <td>".$row_showorders['name']."</td>";
	
	$sql_img = "select image2 from farmhouse_juice_details where name='$row_showorders[name]'";
	$res_img = mysqli_query($conn,$sql_img);
	$row_img = mysqli_fetch_array($res_img);
	
	
	echo "<td>" ;
	echo "<img src='../../images/$row_img[image2]' width='55'>";
     
	echo "</td>";
		
    //echo "<td>".$row_showorders['noofppl']."</td>";
	if($row_showorders['retails']==0) {
	echo "<td align=center>".$row_showorders['items']*$row_showorders['noofppl']."</td>"; }
	else {
	echo "<td align=center>".$row_showorders['items']*$row_showorders['noofppl']*$row_showorders['retails']."</td>"; }
	
	
    echo "</tr><tr><td colspan=3><hr/></td></tr>"; 
	}// ends while
	
    echo "</table>";
	
	
	
	
	
	
	
	
	exit;
} // ends if



?>









<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='../webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='../webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='../webstyle/fonts.css' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie8-fixs.css" />
    <![endif]-->
    <!--[if gt IE 8]>
    <link rel="stylesheet" type="text/css" href="webstyle/ie-fixs.css" />
    <![endif]-->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
    <![endif]-->
    
    
	<script type="text/javascript" src="../js/jquery-1.11.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../slick/slick.css"/>
	<script type="text/javascript" src="../slick/slick.min.js"></script>

    <link href="webstyle/sumoselect.css" rel="stylesheet" />
    <script src="../js/jquery.sumoselect.min.js"></script>
    
	<link href="skins/flat/grey.css" rel="stylesheet">
	<script src="../js/icheck.js"></script>
 
 
 <script>
  $(function() {
    $( "#datepicker" ).datepicker();
  });
  $(function() {
    $( "#datepicker2" ).datepicker();
  });
  </script>
 
	 
</head>

<body class="shopping-card">

<?php include("includes/header.php"); ?>
<div style="padding:100px;">

<form method="POST" action = "#">
<section class="wrapper group">

<div class="container">
        
         <div class="row  pad-top">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                        <div class="panel panel-default">
                            <div class="panel-heading">
	<div class="wrapper group" >
    	<h2>Orders to be prepared</h2> 
		<div class="form-group input-group">
        <span class="input-group-addon">From</span>
        <input type="text" name= "date1" id="datepicker" class="form-control" required maxlength="50" placeholder="YYYY-MM-DD" />
     </div>
	 <div class="form-group input-group">
        <span class="input-group-addon">To</span>
        <input type="text" name= "date2" id="datepicker2" class="form-control" required maxlength="50" placeholder="YYYY-MM-DD" />
     </div>
	    <input name = "submit" type = "submit" value = "Submit"  class="btn btn-success">
	</form>
	</section>
  
		</div>
		</div>
		</div>
		</div>
		</div>			
          
</div>

<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="../js/classie.js"></script>
<script type="text/javascript" src="../js/modernizr.js"></script>
<script type="text/javascript" src="../js/custom.js"></script>

</body>
</html>