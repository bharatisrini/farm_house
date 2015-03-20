<?php
include('../database/db_connect.php'); 
error_reporting(0);
session_start();
$cid = $_SESSION["customer_id"];
?>



<?php
echo $_REQUEST['lang1']; //exit;
if(isset($_REQUEST['lang1'])){

//echo "hii"; exit;
$lang = $_REQUEST['lang1'];
$sql ="SELECT * FROM `farmhouse_country_language` WHERE `language` = '$lang' ";
$res = mysqli_query($conn,$sql);
if(!$res)
echo("not exe");

while($row = mysqli_fetch_array($res)) {
 
   
 if($row['language']==$lang) {
    //echo "hii".$row['selected'];
    $sql_updt ="update farmhouse_country_language set selected=1 where language = '$lang' ";
    $res_updt = mysqli_query($conn,$sql_updt);
	if(!$res_updt)
	echo ("not updated");
   
    $sql_updt_remaing ="update farmhouse_country_language set selected='0' where language != '$lang'";
    $res_updt_remaing = mysqli_query($conn,$sql_updt_remaing);
	if(!$res_updt_remaing)
	echo ("not updated");
	if($lang=='Eng')
	$page = "index.php";
	else
	$page = "index_".$row['language'].".php"; echo "hii";
	header("Location:../$page ");
	echo "hii";
  }
  
  


}//ends while 

 }// ends main if


?>
