<?php
  include ('partials_admin/database/db_connect.php');
 
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
		<link href="./css/bootstrap.min.css" rel="stylesheet">
		<link href="./css/bootstrap-glyphicons.css" rel="stylesheet">

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

<?php include("partials_admin/header.php"); ?>
</td>
         </tr>    
      </table>
      
           <table width = 100% border="0" cellspacing="0" cellpadding="0" background="../images/bg.png">
	<tr>
	  <td bgcolor="#ffffff">
		
<?php
 $sql = "SELECT * from farmhouse_admin_registration where type = 'admin'";
 $result = mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {
 	?>
	<script>
	window.location ="login.php";
	</script>
	<?php
 }
 else
 {
    ?>
	<script>
	window.location ="partials_admin/signup_admin.php";
	</script>
	<?php
 }
         
?>

</td>
</tr>
</table>
        


</body>
</html>