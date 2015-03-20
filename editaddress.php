<?php 
include('database/db_connect.php');
error_reporting(0);
session_start();
$cid = $_SESSION['customer_id'];
?>
<script>
$(function(){
$("#address_save").click(function(e){
var Id=$(this).attr("name");
var add_no = Id;
	 var adrs   = $("#adrs").val(); //alert(adrs);
     var district  = $("#district").val();
	 var city  = $("#city").val();
					 if(district==""){
					 alert("Please select District");
					 $("#district").focus;
					 return false;
					 } //alert(district);
					  //alert(city);
					if(city==""){
					 alert("Please select City");
					 $("#city").focus;
					 return false;
					 }
					 urls="add_to_cart.php";
					 dataPass="msg=save_addd&add_no="+add_no+"&adrs="+adrs+"&district="+district+"&city="+city;
				    $("#dspaddress").html('Loading.....'); 
                    $.ajax( {
						type :"GET",
						url :urls,
						data :dataPass,
						cache :false,
						success : function(html) {
							//alert(html);	
						$("#dspaddress").html(html).show();
					var srdataPass;
					 srurl="editaddress.php";
				    $("#dspaddress").html('Loading.....'); 
                    $.ajax( {
						type :"GET",
						url :srurl,
						data :srdataPass,
						cache :false,
						success : function(html) {
							//alert(html);	
						$("#dspaddress").html(html).show();
					//	if(html.tostring()=='deleted File'){
						//}
					}
			});
					//	if(html.tostring()=='deleted File'){
						//}
					}
			});

//$("#dspselect").show();
//alert("Sl");
});
});
</script>
    <div class="address-list group">
		
		     <?php $sql_addr = "select * from farmhouse_customer_address where customer_id = $cid order by address_id"; $res_addr = mysqli_query($conn,$sql_addr); 
			 while($row_addr = mysqli_fetch_array($res_addr) ) {
			       ?>
        	<figure class="group">
            	<!--<a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2">-->
				<?php $address_icon = "address_icons/". $row_addr['address_id'].".png" ?>
			<div class="dragit">	<img src="<?php echo $address_icon; ?>" id="drag<?=$row_addr['address_id']?>" draggable="true" ondragstart="drag(event,<?=$row_addr['address_id']?>)" /><!--</a>--></div>
				
                <div class="address-no">Address <?php echo $row_addr['address_id'];?>:</div>
                <div class="address-details"><?php echo $row_addr['address'];?>,  <?php echo $row_addr['address_district'];?>,  <?php echo $row_addr['address_city'];?></div>
                <div class="address-action"><a href="#">Edit</a></div>
            </figure> <?php } ?>
            
            <!--<figure class="group">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2"><img src="images/icon-pointer.png" /></a></div>
                <div class="address-no">Address 2:</div>
                <div class="address-details">No.,  Bilding,  Street,  District,  City</div>
                <div class="address-action"><a href="#">Edit</a></div>
            </figure>
            
            <figure class="group">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2"><img src="images/icon-pointer.png" /></a></div>
                <div class="address-no">Address 3:</div>
                <div class="address-details">No.,  Bilding,  Street,  District,  City</div>
                <div class="address-action"><a href="#">Edit</a></div>
            </figure>-->
            <?php $sql_max = "select max(address_id) as maxid from farmhouse_customer_address where customer_id = $cid"; $res_max = mysqli_query($conn,$sql_max); $row_max = mysqli_fetch_array($res_max);?>
            <figure class="group">
            	<div class="dragit"><a href="#" class="single-adress-tooltip" title="3Day Detox for 1 person to Address 2">&nbsp;&nbsp;&nbsp;</a></div>
                <div class="address-no">Address <?php echo $row_max['maxid']+1 ;?>:</div>
				 <div class="address-details">
                	  <textarea name="address" placeholder="No.,  Building,  Street" rows="5" cols="16" id="adrs"></textarea>
                    District:<select class="SletBox" name="district" id="district" style="width: 100px !important; min-width: 100px; max-width: 100px; color:#7f878e;">
					  <option value="">District</option>
					<?php $sql_dst="SELECT * FROM farmhouse_user_district";
				      $res_dst = mysqli_query($conn,$sql_dst); 
				      while($row_dst=mysqli_fetch_assoc($res_dst)){?>
                            <option value="<?=$row_dst["district"]?>"><?=$row_dst["district"]?></option>
                          <?php }?>
                        </select>, City:<select class="SletBox" name="city" id="city" style="width: 100px !important; min-width: 100px; max-width: 100px; color:#7f878e;">
						<option value="">City</option>
                    <?PHP $sql_city="SELECT * FROM farmhouse_user_city";
				      $res_city = mysqli_query($conn,$sql_city); 
				      while($row_city=mysqli_fetch_assoc($res_city)){?>
                            <option value="<?=$row_city["city_name"]?>"><?=$row_city["city_name"]?></option>
                          <?php }?>
                        </select>
						</div>
					<div class="address-action">
                 <a  id="address_save" name="<?=$row_max['maxid']+1 ?>" style="cursor:pointer;"> Save </a></div>
       </div>
