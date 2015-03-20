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

         $golink = $_REQUEST['link']; 
         Switch($golink)
	 {
   	      case "home": include("home.php");
          break;
		
   	      case "add_menu_items": include("add_menu_items.php");
          break;
		  
   	      case "add_index": include("add_index.php");
          break;

		  case "add_footer": include("add_footer.php");
          break;
		  
		  case "add_info_faq": include("add_info_faq.php");
          break;
		  
		  case "add_juice_language": include("add_juice_language.php");
          break;
		  
		  case "add_detox_language": include("add_detox_language.php");
          break;
		  
		  case "add_lifestyle_language": include("add_lifestyle_language.php");
          break;

		  
		  case "program_schedule": include("program_schedule.php");
          break;
		  
		  case "country_language": include("country_language.php");
          break;
		  
		   case "signup_admin": include("signup_admin.php");
          break;
		  
		  case "city": include("city.php");
          break;
		  
		  case "district": include("district.php");
          break;
		  
		   case "add_detox": include("add_detox.php");
          break;
		  
		  case "add_lifestyle": include("add_lifestyle.php");
          break;
		  
		  case "manufacturing_products": include("manufacturing_products.php");
          break;
		  
		  case "view_orders": include("view_orders.php");
          break;
		  
		  
		  
		  case "login": include("login.php");
          break;
		  
          case "add_new_juices": include("add_new_juices.php");
          break;

          case "giftcards": include("add_new_gift_cards.php");
          break;

		  case "debitcards": include("add_new_debit_cards.php");
          break;
		  
		  case "creditcards": include("add_new_credit_cards.php");
          break;
		  
		  case "third_party_payments": include("add_third_party_payments.php");
          break;
            
		  case "production_signup": include("production_signup.php");
          break;
		  
		  case "billing_signup": include("billing_signup.php");
          break;
		  
		  case "dispatch_signup": include("dispatch_signup.php");
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