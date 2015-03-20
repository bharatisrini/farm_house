
<?php
session_start();
include('database/db_connect.php'); 
error_reporting(0);
$cid = $_SESSION["customer_id"];
$oid = $_GET['order'];
//echo "O".$oid;
?>
	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
		<style>
		#overlay {
				position:fixed; 
				top:0;
				left:0;
				width:100%;
				height:100%;
				background:#000;
				opacity:0.5;
				filter:alpha(opacity=50);
			}

			#modal {
				position:absolute;
				top:125px;
				background:0 0 repeat;
				border-radius:5px;
				padding:2px;
          	}

			#content {
				border-radius:8px;
				background:#EEEBDC;
				padding:8px;
			}

			#close {
				position:absolute;
				background:url(images/icon-close.png) 0 0 no-repeat;
				width:24px;
				height:27px;
				display:block;
				text-indent:-9999px;
				top:0px;
				right:-5px;
			}
		.style1 {color: #000000}
     
</style>
<script language="javascript">
  var modal = (function(){
				var 
				method = {},
				$overlay,
				$modal,
				$content,
				$close;

				// Center the modal in the viewport
				method.center = function () {
					var top, left;

						top =280; 
					left =320;

					$modal.css({
						top:top + $(window).scrollTop(), 
						left:left + $(window).scrollLeft()
					});
				};

				// Open the modal
				method.open = function (settings) {
					$content.empty().append(settings.content);

					$modal.css({
						width: settings.width || 'auto', 
						height: settings.height || 'auto'
					});

					method.center();
					$(window).bind('resize.modal', method.center);
					$modal.show();
					$overlay.show();
				};

				// Close the modal
				method.close = function () {
					$modal.hide();
					$overlay.hide();
					$content.empty();
					$(window).unbind('resize.modal');
				};

				// Generate the HTML and add it to the document
				$overlay = $('<div id="overlay"></div>');
				$modal = $('<div id="modal"></div>');
				$content = $('<div id="content"></div>');
				$close = $('<a id="close" href="#">close</a>');

				$modal.hide();
				$overlay.hide();
				$modal.append($content, $close);

				$(document).ready(function(){
					$('body').append($overlay, $modal);						
				});

				$close.click(function(e){
					e.preventDefault();
					method.close();
				});

				return method;
			}());


$(function() {

//alert("Add");
$(".reschedule").click(function(e){
var dataPass;
var stat=$(this).attr("id");
var data=$(this).attr("name");
//alert(stats);
dataPass=data;
 var url1 = "view_reschedule.php?stat="+stat+"&"+dataPass;
 //alert(url1);
//$(window.location).attr('href', url1);
$.get(url1, function(data){
	modal.open({content: data});
					//alert(data);
		e.preventDefault();
	});

});
});

</script>
<body>
<?php
$sql_get_datas = "select date(date_added) as orderDate, sum(product_total) as total from farmhouse_order where customer_id='$cid' and order_id = '$oid'";
//echo $sql_get_datas;
	$res_get_datas = mysqli_query($conn,$sql_get_datas);
	$row_get_datas = mysqli_fetch_array($res_get_datas);

?>
 
  <table width="80%" align="center" cellpadding="0" cellspacing="0" class="tbname">
  <tr class="tbthname">
    <td width="24%" height="50" align="center" >
    <?=date("F d, Y", strtotime($row_get_datas['orderDate']))?><br>
Order #:
<?=$oid?>    </td>
    <td width="23%" align="center" >Quantity</td>
    <td width="29%" height="35" align="center" >Total (Including shipping)<br>
       ¥ <?=$row_get_datas['total']?> RMB</td>
    <td width="24%" height="35" align="center" >Delivered</td>
  </tr>
  <?php
$sql_get_data = "select * from farmhouse_order where customer_id='$cid' and order_id = '$oid' and program_type='Retail' ";
//echo $sql_get_data;
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$row_get_data = mysqli_fetch_array($res_get_data);
	if($row_get_data) { 
	$sql_get_data = "select * from farmhouse_order where customer_id='$cid' and program_type='Retail' and order_id = '$oid' ";
	
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$sno=1; 
	while($row_get_data = mysqli_fetch_array($res_get_data)) { 
?>

  <tr class="tbtdname">
    <td height="100" align="center"><?=$row_get_data['product_type']?></td>
    <td height="100" align="center"><?=($row_get_data['ordered_num_of_people'])*($row_get_data['ordered_day_beauty'])?></td>
    <td height="100" align="center">¥ <?=$row_get_data['product_total']?> RMB</td>
    <td height="100" align="center" class="tdname">&nbsp;</td>
  </tr>
     <?php $sno++;}
  } ?><?php
$sql_get_data = "select * from farmhouse_order where customer_id='$cid' and order_id = '$oid' and program_type='Detox' ";
//echo $sql_get_data;
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$row_get_data = mysqli_fetch_array($res_get_data);
	if($row_get_data) { 
	$sql_get_data = "select *, date(date_added) as order_date, time(date_added) as tm  from farmhouse_order where customer_id='$cid' and program_type='Detox' and order_id = '$oid' ";
	
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$sno=1; 
	while($row_get_data = mysqli_fetch_array($res_get_data)) { 
?>

  <tr class="tbtdname">
    <td height="100" align="center" background="images/icon-basket-detox-blue-blank.png" style="background-repeat:no-repeat; background-position:center; color:#FFFFFF;"><?=$row_get_data['product_type']?></td>
    <td height="100" align="center" ><?=($row_get_data['ordered_num_of_people'])*($row_get_data['ordered_day_beauty'])?></td>
    <td height="100" align="center" >¥ <?=$row_get_data['product_total']?> RMB</td>
    <td height="100" align="center" class="tdname"><?php if($row_get_data['ordered_day_beauty']>='4'){ ?><a  name="ppl=<?=$row_get_data['ordered_num_of_people']?>&dtx=<?=$row_get_data['ordered_day_beauty']?>&id=&orderid=<?=$oid?>&per_name=<?=$row_get_data['program_name']?>&date=<?=$row_get_data['order_date']?>&tm=<?=$row_get_data['tm']?>" id="detox" class="reschedule" style="cursor:pointer;">Check Details</a><?php }?></td>
  </tr>
    <?php $sno++;}
  } ?><?php
$sql_get_data = "select * from farmhouse_order where customer_id='$cid' and order_id = '$oid' and program_type='LifeStyle' ";
//echo $sql_get_data;
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$row_get_data = mysqli_fetch_array($res_get_data);
	if($row_get_data) { 
	$sql_get_data = "select *, date(date_added) as order_date, time(date_added) as tm  from farmhouse_order where customer_id='$cid' and program_type='LifeStyle' and order_id = '$oid' ";
	
	$res_get_data = mysqli_query($conn,$sql_get_data);
	$sno=1; 
	while($row_get_data = mysqli_fetch_array($res_get_data)) { 
?>

  <tr >
    <td height="100" align="center" background="images/icon-basket-detox-blue-blank.png" style="background-repeat:no-repeat; background-position:center; color:#FFFFFF;"><?=$row_get_data['product_type']?></td>
    <td height="100" align="center"><?=($row_get_data['ordered_num_of_people'])*($row_get_data['ordered_day_beauty'])?></td>
    <td height="100" align="center">¥ <?=$row_get_data['product_total']?> RMB</td>
    <td height="100" align="center" class="tdname"><?php if($row_get_data['ordered_day_beauty']>='4'){ ?> <a name="ppl=<?=$row_get_data['ordered_num_of_people']?>&dtx=<?=$row_get_data['ordered_day_beauty']?>&id=&orderid=<?=$oid?>&per_name=<?=$row_get_data['program_name']?>&date=<?=$row_get_data['order_date']?>&tm=<?=$row_get_data['tm']?>" id="LifeStyle" class="reschedule" style="cursor:pointer;">Check Details</a><?php }?></td>
  </tr>
       <?php $sno++;}
  } ?>
</table>

</body>


