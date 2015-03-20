<?php 
include('database/db_connect.php');
error_reporting(0);
session_start();
$cid = $_SESSION['customer_id'];
//$cid = 40;
$ip = $_SERVER["REMOTE_ADDR"];
$no_ppl = $_REQUEST['ppl'];
$no_dtx = $_REQUEST['dtx'];
$dtx_detox = $_REQUEST['dtx'];
$rstat = $_REQUEST['stat'];
$dtx_id_detox = $_REQUEST['id'];
$ppl_detox = $_REQUEST['ppl'];
$transId = $_REQUEST['tid'];
$sh_type = $_REQUEST['per_name'];
$order_id=$_REQUEST['orderid'];
$no_ppl  = $ppl_detox; 
$no_dtx = $dtx_detox;
//echo "Pwoplw " ; echo $no_ppl; echo "<br>";
//echo $no_dtx;
$dt = $_REQUEST['date'];
$tm=$_REQUEST['tm'];
$select_box=$_REQUEST['per_name'];
				$sbox = $_REQUEST['dtx'];
				$snop=$_REQUEST['selno'];
		$r = $dtx_detox;
		$wds = 9;
		$cals = $r/$wds;
$sno=$cals;



?>

	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script src="js/jquery-ui.js"></script>
	<script>
$(function(){
//default load
		 var dfdataPass;
		 dfurl="editaddress.php";
				    $("#dspaddress").html('Loading.....'); 
                    $.ajax( {
						type :"GET",
						url :dfurl,
						data :dfdataPass,
						cache :false,
						success : function(html) {
							//alert(html);	
						$("#dspaddress").html(html).show();
					//	if(html.tostring()=='deleted File'){
						//}
					}
			});


$('#submitData').click(function(e){ 
//alert("click");
var dataPass;
dataPass=$("#addrforms").serialize();
//tempDeliveryMoreData
//alert(dataPass);
url="changerescheduleData.php"
$("#datError").html('Loading.....'); 
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
							// alert(html);	
						//$("#datError").html(html).show();
						$("#datError").html(html).delay(3000).fadeOut("slow").promise().done(function(){ 
   modal.close();
     
});
$('#submitData').hide();
					}
			});

});			



});

  	
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev, ids) {

    ev.dataTransfer.setData("text", ev.target.id);
	ev.dataTransfer.setData("addrtext", ids);
}

function drop(ev, els) {

	$("#"+ev.target.id).find('img').remove();
    var data = ev.dataTransfer.getData("text");
	 var datas = ev.dataTransfer.getData("addrtext");
	// alert(els);
    ev.target.appendChild(document.getElementById(data).cloneNode());
	//$("#"+els).val(datas);
	document.getElementById("saddr"+els).value =datas;	
	  ev.preventDefault();
}
</script>   
</head>


<body class="adresses">

<form action="#" id="addrforms" method="post">
<span id="datError"></span>

<section class="plan">
	<div class="wrapper">
        <div class="pick-plan group">
            	<div class="row-top group">
	<?php
	 for($i=1; $i<=7; $i++){         
		$adwk=$i-1;	
	 $dat2 =strtotime(date("Y-m-d", strtotime($dt))."+".$adwk." day"); 
	 $wk_dt=date("D", $dat2);  

	?>  
                <div class="col-<?=($i+1)?>" id="2"><?=$wk_dt?></div>
            
        <?php }?>        
            </div> 
<?php 
		for($n=0; $n<$sno; $n++) {
		//$m=$n+1;
		//echo $n;
		if($n!=0){
		$m=($n)*7;
        }
		//echo $m;
?>			
 	
	<div class="row group" >
	<?php 
	$drpdrop="";
	$tmp_id="";
	$addr_input="";
	$imgDefault="";
	for($k=1; $k<=7; $k++){
	$addt=($k+$m)-1;
	//echo $addt;	
	 $dat2 =strtotime(date("Y-m-d", strtotime($dt))."+".$addt." day"); 
	 $ren_dt=date("M d", $dat2);  
	 $ch_dt=date("Y-m-d", $dat2);
	 $ch_stat="";
	 $classimg="";
	 $drv_id_input=""; 
	 if($ch_dt==$dt){
	 $classimg="col-".($k+1); 
	 $ch_stat=$ren_dt." ".$tm." Ordered";
	 $addr_input="";
	 $drpdrop="";
	 $drv_id_input="";
	 $imgDefault="";
	 }else{
	 
	$sql_dt = "select * from farmhouse_delivery_schedule where order_id = '$order_id' and no_people='$snop' and delivery_date='$ch_dt' and program_type='$rstat' and program_name='$sh_type' and customer_id='$cid'";
			//	echo $sql_dt;
					$res_dt = mysqli_query($conn,$sql_dt);
			        if($row_dt = mysqli_fetch_array($res_dt)){
					
					$drv_stat=$row_dt["delivery_status"];
					if($row_dt["program_type"]=='Detox'){
					$tmp_id=$row_dt["tmp_trans_id"];
					}else{
					$tmp_id=$row_dt["tmp_life_id"];
					}
					
					$drv_date=$row_dt["delivery_date"];
					 $custAddressId =$row_dt['delivery_address'];

					$drv_id=$row_dt["trans_id"];
					if($drv_stat=="0"){
					$classimg="col-".($k+1)." can-chedule";
					$ch_stat=$ren_dt;
					$addr_input="<input name='saddr[]' id='saddr".(($k+$m))."' value='".$custAddressId."' type='hidden' size='8'>";
					$drpdrop="ondrop='drop(event,".(($k+$m)).")' ondragover='allowDrop(event)'";
					$imgDefault="<img src='address_icons/".$custAddressId.".png' id='df".(($k+$m))."'>";
					$drv_id_input="<input name='sdrvid[]' id='sdrvid".(($k+$m))."' value='".$drv_id."' type='hidden' size='8'>";	
					}else{
					$drv_id_input="";
					$ch_stat=" ";
					$classimg="col-".($k+1)." can-devlivered";
					$addr_input="";
					$drpdrop="";
					$imgDefault="";
					}
					//echo $classimg;
					//$classimg="col-".($i+1); 
					
					}else{
					$classimg="col-".($k+1); 
					$ch_stat=$ren_dt;
					$addr_input="";
					$drv_id_input="";
					$drpdrop="";
					$imgDefault="";
					}
			}	
	?>
            	<div class="<?=$classimg?>" id="c<?=($k+$m)?>" <?=$drpdrop?>><?=$ch_stat?><?=$addr_input?><?=$imgDefault?><?=$drv_id_input?></div>
            
             <?php }?>
 				
			</div>
	       <?php }?>
		<div id="dspaddress">
		</div>
    <section class="center-link group">
	<div class="wrapper group">
	    <!--<input type="submit" value="Add Into" name="submit"> -->
		<input type="hidden" name="snopp" id="snopp" value='<?=$snop?>'>
		<input type="hidden" name="orderid" id="orderid" value='<?=$order_id?>'>
		<input type="hidden" name="tmpid" id="tmpid" value='<?=$tmp_id?>'>
		<input type="hidden" name="pstat" id="pstat" value='<?=$rstat?>'>
    	<a href="#" class="address-action" id="submitData" >Update</a>
    </div>
	
</section>

</section>

</form>