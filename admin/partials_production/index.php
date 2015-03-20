<?php
include ('database/db_connect.php');
  error_reporting(0);
?>
<!DOCTYPE html>
<html>
<head>

<title>Farmhouse-Admin</title>

		<!-- Website Title & Description for Search Engine purposes -->
		<title></title>
		<meta name="description" content="eciomm">

		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/bootstrap-glyphicons.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link rel="stylesheet" href="..css/styles.css">

		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="../js/modernizr-2.6.2.min.js"></script>

</head>
<body>
      
<table width="100%"  border="0" cellspacing="0" cellpadding="0">      
      </table>      
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">      
         <tr>
         <td bgcolor="#ffffff">

<?php include("header.php"); ?>
</td>
         </tr>    
      </table>
      <table width="100%"  border="0" cellspacing="0" cellpadding="0">      
         <tr>
         <td bgcolor="#324259">

<?php include("menu.php"); ?>
</td>
         </tr>    
      </table>      
           <table width = 100% border="0" cellspacing="0" cellpadding="0" background="../images/bg.png">
	<tr>
	  <td bgcolor="#ffffff">
		
<?php

         $golink = $_REQUEST['link']; //echo $golink;
         Switch($golink)
	 {
   	      case "home": include("home.php");
          break;
		  
		   case "logout": include("logout.php");
          break;
		  
		  		  
	      default: include("home.php");
          break;
	
        }	
?>

</td>
</tr>
</table>
      


</body>
</html>