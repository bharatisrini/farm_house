<?php
include ('database/db_connect.php');
?>
<html>
 <head>
   <title> </title>
<style>
  table.registration div 
  {
    color: #ffffff;
    font-size : 15px;
}
a#mnu:link{
	color:#ffffff;
}
a#mnu:visited{
	color:#ffffff;
}
</style>
</head>
 <body>
<table class="registration" width="100%"  align=center bgcolor="#324259"> 
  <tr  align="center"> 

    <td height= "30" width = "12%">
       <a href="index.php?link=home" style= 'text-decoration:none'>
         <div> Home </div>
       </a>
    </td>
		<td height= "30" width = "12%">
       <a href="index.php?link=country_language" style= 'text-decoration:none'>
         <div> Language </div>
       </a>
    </td>
  <td  width = "12%"> 
    <li class="dropdown">
								<a href="#" style= 'text-decoration:none' data-toggle="dropdown" id="mnu">Add Content in English<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
								    <li>
										<a href="index.php?link=city">City</a>
									</li>

									<li>
										<a href="index.php?link=district">District</a>
									</li>
									
									<li>
										<a href="index.php?link=add_menu_items">Menu</a>
									</li>

									<li>
										<a href="index.php?link=add_index">Index</a>
									</li>

									<li>
										<a href="index.php?link=add_footer">Footer</a>
									</li>
		
									<li>
										<a href="index.php?link=add_info_faq">Info & FAQ</a>
									</li>
							
									<li>
										<a href="index.php?link=add_new_juices"> Add Juices & Hydration</a>
									</li>

									<li>
										<a href="index.php?link=add_detox">Add Detox</a>
									</li>
									<li>
										<a href="index.php?link=add_lifestyle">Add LifeStyle</a>
									</li>
									
									</ul><!-- end dropdown-menu -->
						
   
</td>
	<td  width = "12%"> 
    <li class="dropdown">
								<a href="#" style= 'text-decoration:none' data-toggle="dropdown" id="mnu">Convert to Languages<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
							
									<li>
										<a href="index.php?link=add_menu_items_language">Menu</a>
									</li>

									<li>
										<a href="index.php?link=add_index">Index</a>
									</li>

									<li>
										<a href="index.php?link=add_footer">Footer</a>
									</li>
		
									<li>
										<a href="index.php?link=add_info_faq">Info & FAQ</a>
									</li>

									<li>
										<a href="index.php?link=add_juice_language">Convert Juice Language</a>
									</li>
									
									<li>
										<a href="index.php?link=add_detox_language">Convert Detox Language</a>
									</li>
									
									<li>
										<a href="index.php?link=add_lifestyle_language">Convert Lifestyle Language</a>
									</li>

									
									<li>
										<!--<a href="index.php?link=program_schedule">Program Schedule</a>-->
									</li>

									</ul><!-- end dropdown-menu -->
	</li>					
   
</td>

<td  width = "12%"  bgcolor="#324259"> 
    <li class="dropdown">
								<a href="#" style= 'text-decoration:none' data-toggle="dropdown" id="mnu">Reports<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
												

									<li>
										<a href="index.php?link=manufacturing_products">Products to be Manufactured</a>
									</li>
									
									<li>
										<a href="index.php?link=delivery_products">Product to be Delivered</a>
									</li>
                                    <li>
										<a href="index.php?link=view_orders">View Orders</a>
									</li>
									
									
									</ul><!-- end dropdown-menu -->
						
   
</td>
	

	
	

    
     

<td  width = "12%"> 
    <li class="dropdown">
								<a href="#" style= 'text-decoration:none' data-toggle="dropdown" id="mnu">Add cards<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
							
									<li>
										<a href="index.php?link=giftcards">Add New Gift Cards</a>
									</li>

									<li>
										<a href="index.php?link=debitcards">Add New Debit Cards</a>
									</li>
									<li>
										<a href="index.php?link=creditcards">Add New Credit Cards</a>
									</li>
									<li>
										<a href="index.php?link=third_party_payments">Add Third Party Payments</a>
									</li>
									</ul> <!-- end dropdown-menu -->
						
   
</td>

<td  width = "12%"  bgcolor="#324259"> 
    <li class="dropdown">
								<a href="#" style= 'text-decoration:none' data-toggle="dropdown" id="mnu">Create Accounts<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
												

									<li>
										<a href="index.php?link=dispatch_signup">Dispatch</a>
									</li>
									
									
									</ul><!-- end dropdown-menu -->
						
   
</td>

<!--<td  width = "12%"  bgcolor="#324259"> 
    <li class="dropdown">
								<a href="#" style= 'text-decoration:none' data-toggle="dropdown" id="mnu">View Orders<strong class="caret"></strong></a>

								<ul class="dropdown-menu">
												

									<li>
										<a href="index.php?link=view_orders">View Orders</a>
									</li>
									
									
									</ul>
						
   
</td>
-->
  </tr>
 </table>
 
 <script src="../js/jquery-1.10.2.min.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="../js/bootstrap.js"></script>
</body>
</html>