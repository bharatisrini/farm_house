<?php
session_start();
include('database/db_connect.php');
error_reporting(0);

$cid = $_SESSION["customer_id"];

$_SESSION["loginurl"]="lifestyle.php";
?>


<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FARMHOUSE JUICE</title>
    <meta name="keywords" content="FARMHOUSE JUICE"/>
    <meta name="description" content="FARMHOUSE JUICE"/>
    <meta name="robots" content="index, follow" />
    <link href='webstyle/style.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/reset.css' rel='stylesheet' type='text/css'>
    <link href='webstyle/fonts.css' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

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



	<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js"></script>

    <link href="webstyle/sumoselect.css" rel="stylesheet" />
	<script src="js/jquery.sumoselect.min.js"></script>

    <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<script type="text/javascript" src="slick/slick.min.js"></script>

    <link href="skins/flat/grey.css" rel="stylesheet">
	<script src="js/icheck.js"></script>
	<style>
.tooltips {
    position:absolute; top:110px; left:480px; background-color:rgba(255,255,255,0.93); border-radius:10px; -moz-border-radius:10px; -webkit-border-radius:10px; -webkit-box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.75); box-shadow: 0px 0px 19px 0px rgba(0,0,0,0.75); z-index:999; min-width:340px; color:#7f878e; cursor: auto; font-family: 'CenturyGothic'; font-size:18px; display:none; height:300px;
}
.tooltips {
    z-index:999;
}
.circle {
    display:block;
}
.circle:hover + .tooltips {
    display:block;
}
.tooltips:hover {
    display:block;
}

</style>
		<script type="text/javascript">
		$(window).load(function(){
$(function(){
    $('.circle').hover(
        function(){
            $(this).next().show();
        },
        function(){
            $(this).next().hide();   
        }
    )   
})
});

	$(function() {

$('.schedule-detox').click(function(e){
var dataPass;
 var id=$(this).attr('name');
//alert(id);
var cid="<?=$cid?>";
//alert(cid);
if(cid==""){
alert("You should be login");
var urls = "front.php";
 $(window.location).attr('href', urls);
 return false;
}

if($("#no_ppl"+id).val()=='ppl'){
$("#dataError"+id).html("<font color='red'>Please Select No of Pleople</font>").delay(3000).fadeOut();
$("#no_ppl"+id).focus();
return false;
}
if($("#no_dtx"+id).val()=='days'){

$("#dataError"+id).html("<font color='red'>Please Select No of Detox</font>").delay(3000).fadeOut();
$("#no_dtx"+id).focus();
return false;
}

dataPass=$("#forms"+id).serialize();
//alert(dataPass);
//alert(selectedDate);
url="lifestyleTmpData.php"
$("#dataError"+id).hide();
$("#datError").html('Loading.....');
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
						//alert(html);
						$("#datError").html(html).show();
					}
			});
});


$('#myowncreate').click(function(e){
var dataPass;
 var id=$(this).attr('name');
//alert(id);
var cid="<?=$cid?>";
if($("#selitems").val()==""){
$("#dataErrormyown").html("<font color='red'>Please Select MyOwn Box</font>").delay(3000).fadeOut();
return false;
}

if($("#no_pplmyown").val()=='ppl'){
$("#dataErrormyown").html("<font color='red'>Please Select No of Pleople</font>").delay(3000).fadeOut();
$("#no_pplmyown").focus();
return false;
}
if($("#no_dtxmyown").val()=='days'){
$("#dataErrormyown").html("<font color='red'>Please Select No of Detox</font>").delay(3000).fadeOut();
$("#no_dtxmyown").focus();
return false;
}


dataPass=$("#formsmmyown").serialize();
//alert(dataPass);

url="lifestylemyOwnData.php"
$("#dataError"+id).hide();
$("#datError").html('Loading.....');
  $.ajax( {
						type :"POST",
						url :url,
						data :dataPass,
						cache :false,
						success : function(html) {
						//alert(html);
						$("#datError").html(html).show();
					}
			});
//alert(cid);
/*if(cid==""){
alert("You should be login");
var urls = "front.php";
 $(window.location).attr('href', urls);
}
*/
});

var maxAppend=1;
var prices=0;
var itms="";


$('.imgAdd').click(function(e){
var dataPass;
 var id=$(this).attr('id');
 var prc=$(this).attr('name');
  var name=$(this).attr('alt');
   var imgs=$(this).attr('title');
   var data=$(this).attr('align');

    //alert(maxAppend);
  if(maxAppend==6){
    $(".circle-add").hide();
  }
  if (maxAppend>6){
  $(".circle-add").hide();
  return;
  }
  if(id>6){
 img=id+"<br>"+name;
  }else{
  img="<img src='images/icon-num"+id+".png' alt='"+name+"' class='image-center'>"+name;
  }
var adds="<div class='circle' data-val='detoxown-1'><div class='padding'>"+img+"</div></div><div class='tooltips'><table width='340' border='0' cellspacing='0' cellpadding='0' id='tbname'><tr><td width='170' valign='top'><img src='images/"+imgs+"' alt='#' width='150'  height='300' /></td><td width='153' style='vertical-align:top;'><table width='98%' border='0' cellspacing='0' cellpadding='0'><tr><td align='right'>&nbsp;</td></tr><tr><td><span class='title'>"+name+"</span></td></tr><tr><td>"+data+"</td></tr><tr><td>&nbsp;</td></tr><tr><td align='right'>&nbsp; <span class='price'>¥"+prc+"RMB</span></td></tr></table></td></tr></table></div>";
var dsps="<li><h3>"+name+"</h3><h4>1</h4></li>";
  //alert(adds);
  var ites=itms+","+name;

   var total = parseInt(prices) + parseInt(prc);
  var totals="¥"+total+"RMB";
        $("#total").empty().append(total);
$("#addimg").append(adds);
$("#seldsp").append(dsps);
$("#prcdsp").empty().append(totals);

document.getElementById("selitems").value=ites;
document.getElementById("amt").value=total;
 maxAppend++;
  itms=itms+","+name;
prices=parseInt(prices)+parseInt(prc);
//alert(addhtml);
});
//close
 });
	</script>

</head>
<body class="lifestyle">
<span id="datError"></span>
<?php include("includes/header.php"); ?>



		 <section class="detox-content fixed-top group">
		 <div class="wrapper group">
		 <h2>FARMHOUSE LIFESTYLE</h2>
			<?php
	 $sql_detox1 = "select * from farmhouse_lifestyle_program";
				      $res_detox1 = mysqli_query($conn,$sql_detox1);

  while($row_detox1=mysqli_fetch_assoc( $res_detox1)){
					 $detox=$row_detox1["lifestyle_id"];
					 $detoxn=$row_detox1["lifestyle_name"];
					  //$detlwc=strtolower($detoxn);
					  $detlwc="ls".$detox;
		 ?>
		 <form action="#" method="post" id="forms<?=$detlwc?>">
        <div class="detox-box group">
        	<aside class="basket">
            	<div class="basket-box">
                	<div class="basket-padding">

					    <?php
					  $sql_detox = "select * from farmhouse_lifestyle_program where lifestyle_id=$detox";
				      $res_detox = mysqli_query($conn,$sql_detox);
					  $row_detox = mysqli_fetch_array($res_detox);
					   //echo "Y".$arr_detox[$i];
					  $arr_detox = explode(",",trim($row_detox['lifestyle_items']));
						 for ($i=1; $i<=6; $i++) {
						$k=$i-1;
						   $sql_juice = "select * from farmhouse_juice_details where name='$arr_detox[$k]'";
						   //echo $sql_juice;
				      $res_juice = mysqli_query($conn,$sql_juice);
					  $row_juice = mysqli_fetch_array($res_juice);
					   $prd_id = $row_juice['product_id'];
					    $imgs2=$row_juice['image2'];

					  //echo "Y".$prd_id;

						 ?>
						 <div class="product-popup group detox<?=$detlwc?>-<?php echo $i;?>">
                            	<div class="padding group">
                                	<a href="#" class="close" data-val="detox<?=$detlwc?>-<?php echo $i;?>">close</a>
                                    <div class="image"><img src="product_images/<?=$imgs2?>" alt="#" /></div>
                                    <div class="details">
                                    	<p class="title"><?php
										$sql = "select * from farmhouse_juice_details where product_id =  $prd_id";
					 					$result = mysqli_query($conn,$sql);
										if(mysqli_num_rows($result)>0)
											{
											$row = mysqli_fetch_array($result);

										 echo $row['name']?></p>
                                        <ul><li>
                    						<?php
					  $sql_no_items = "select * from farmhouse_juice_details where product_id = $prd_id";
				      $res_no_items = mysqli_query($conn,$sql_no_items);
					  $row_no_items = mysqli_fetch_array($res_no_items);
					  $arr_res = explode(",",$row_no_items['ingredients']);
					  $no_of_rows = count($arr_res);
					  $j = 0;
					  for($j=0; $j<$no_of_rows; $j++){
					  ?>


											<?php echo $arr_res[$j]; echo "<br>";  ?></li> </ul><?php } ?>

                                        <p>&nbsp;</p><p>&nbsp;</p>
                                        <p class="price">¥ <?php echo $row_no_items['price'];?>RMB</p>
                                    </div>
                                </div>
                      </div>


						<?php }  ?>


							<?php
					  ?>
                    	    <div class="circle" data-val="detox<?=$detlwc?>-<?php echo $i; ?>">
                        	<div class="padding">
                        	<img src="images/icon-num<?=$prd_id?>.png" alt="<?php echo $arr_detox[$k];?>" class="image-center">
                            <?php echo $arr_detox[$k]?>
                            </div>

                        </div><?php } ?>

                    </div>


			  </div>
            </aside>
            <aside class="product-details">
            	<h2><?=strtoupper($detoxn)?></h2>
				 <ul class="selected-products group">
				<?php $sql_detoxA = "select lifestyle_items,lifestyle_price,lifestyle_id from farmhouse_lifestyle_program where lifestyle_id =$detox ";
				      $res_detoxA = mysqli_query($conn,$sql_detoxA);
					  $row = mysqli_fetch_array($res_detoxA);
					  $arr_res = explode(",",trim($row['lifestyle_items']));
					  $no_of_rows = count($arr_res);
					  //echo $no_of_rows;
					  $i = 0;
					  for ($i=0; $i<$no_of_rows; $i++){
				    // for looping enum values--mar
				?>

				    <li><h3><?php echo $arr_res[$i];?></h3><h4>1</h4></li> <?php } ?>

                </ul>
                <p class="nomargin">Click the bottle, add extra for your DETOX.</p>
                <p class="highlighted">*Add Rehydrator to your packge for optimal hydration </p>
                <p class="price">¥ <?php echo $row['lifestyle_price']; ?>RMB</p><p class="price"> + ¥ 0 RMB</p><p class="price" id="hyd_totamt<?=$detlwc?>"> = ¥ <?php echo $row['lifestyle_price']; ?> RMB</p>
				   <input type="hidden" name="amnt" value="<?php echo $row['lifestyle_price']; ?>" id="amnt<?=$detlwc?>">
            </aside>
            <div class="clear"></div>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.</p>
            <p>&nbsp;</p>
            <div class="clear"></div>
          <div class="select"><input type="hidden" value="<?php echo $row['lifestyle_id'];?>" name="dtx_id">
                  <select class="SlectBox" placeholder="Order for how many people?"id="no_ppl<?=$detlwc?>" name="no_ppl">
                	<option selected="selected" value="ppl">disabled selected</option>
					<?php
					  $sql_no_ppl = "select * from farmhouse_no_people";
				      $res_no_ppl = mysqli_query($conn,$sql_no_ppl);
					  while($row_no_ppl = mysqli_fetch_array($res_no_ppl)) { ?>
                    <option value="<?php echo $row_no_ppl['no_people'];?>" id="<?php echo $row_no_ppl['no_people'];?>">For <?php echo $row_no_ppl['no_people'];?> people</option><?php } ?>
                </select>
          </div>
			<div class="clear"></div>
			<div class="select">
			  <select class="SlectBox" id="no_dtx<?=$detlwc?>" name="no_dtx" >
			    <option selected="selected" value="days">select days of BEAUTY</option>
                <?php
					  $sql_no_detox = "select * from farmhouse_no_detox";
				      $res_no_detox = mysqli_query($conn,$sql_no_detox);
					  while($row_no_detox = mysqli_fetch_array($res_no_detox)) { ?>
                <option value="<?php echo $row_no_detox['no_detox'];?>" id="<?php echo $row_no_detox['no_detox'];?>"> <?php echo $row_no_detox['no_detox'];?> day BEAUTY</option>
                <?php } ?>
              </select>
		    <span id="dataError<?=$detlwc?>"></span></div>
            <div class="clear"></div>
			<input type="hidden" value="<?=$detoxn?>" name="detox_name">
            <input type="button" value="SCHEDULE MY LIFESTYLE" name="<?=$detlwc?>" id="submitData" class="schedule-detox"/>
        </div>
		</form>
       <?php }?>
 <form action="#" method="post" id="formsmmyown">
<div class="detox-box group">
        	<aside class="basket">
            	<div class="basket-box">
                	<div class="basket-padding">


                    <div id="addimg">
                        </div>

                        <div class="circle-add">
                          <a href="#" class="add-new-product"><img src="images/icon-add-jucie.png" alt="ADD"  /></a>
                          <div class="product-select-popup-add-custom group">
                            <div class="padding group">
                                <a href="#" class="close" id="close">close</a>
								<?php
								$sqls = "select * from farmhouse_juice_details where product_type ='juice'";
					 			 $ress = mysqli_query($conn,$sqls);
									 while($rows=mysqli_fetch_array($ress)){
									  $nrw=$rows['name'];
									 $nrs=$row_no_items['ingredients'];
									 ?>
                                <div><img src="images/<?=$rows["image2"]?>" class="imgAdd" id="<?=$rows["product_id"]?>" name="<?=$rows["price"]?>" alt="<?=$rows["name"]?>" title='<?=$rows["image2"]?>' align="<?=$nrs?>" /></div>
                               <?php }?>
							    </div>

                         </div>
                      </div>


                    </div>

                </div>

            </aside>
            <aside class="product-details own-detox">
            	<h2>MAKE MY OWN LIFESTYLE</h2>
                <ul class="selected-products group">
                	<span id="seldsp"></span>
                </ul>
                <p class="price"><span id="prcdsp"></span><input type="hidden" id="amt" name="amt" value=""><input name='selitems' id='selitems' type='hidden' value="" ></p>
            </aside>
            <div class="clear"></div>
            <p class="text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce pellentes risus in enim porta aliquam aenean at felis.</p>
            <p>&nbsp;</p>
            <div class="clear"></div>
            <div class="half-left group">
           	  <div class="select">
                    <select class="SlectBox" placeholder="Order for how many people?"id="no_pplmyown" name="no_ppl">
                	<option selected="selected" value="ppl">disabled selected</option>
					<?php
					  $sql_no_ppl = "select * from farmhouse_no_people";
				      $res_no_ppl = mysqli_query($conn,$sql_no_ppl);
					  while($row_no_ppl = mysqli_fetch_array($res_no_ppl)) { ?>
                    <option value="<?php echo $row_no_ppl['no_people'];?>" id="<?php echo $row_no_ppl['no_people'];?>">For <?php echo $row_no_ppl['no_people'];?> people</option><?php } ?>
                </select>
           	       </div>

      <!--      <div class="same-amount">Order the same amount for everybody? &nbsp;&nbsp;&nbsp;<input type="radio" name="iCheck1" value="yes" checked> Yes <input type="radio" name="iCheck1" value="no"> No
</div> -->
			<div class="clear"></div>
			<div class="select">
			  <select class="SlectBox" id="no_dtxmyown" name="no_dtx" >
			    <option selected="selected" value="days">select days of BEAUTY</option>
                <?php
					  $sql_no_detox = "select * from farmhouse_no_detox";
				      $res_no_detox = mysqli_query($conn,$sql_no_detox);
					  while($row_no_detox = mysqli_fetch_array($res_no_detox)) { ?>
                <option value="<?php echo $row_no_detox['no_detox'];?>" id="<?php echo $row_no_detox['no_detox'];?>"> <?php echo $row_no_detox['no_detox'];?> day BEAUTY</option>
                <?php } ?>
              </select>
		    <span id="dataErrormyown"></span></div>

            </div>

            <div class="half-right"><a class="schedule-lifes" id="myowncreate" name="myownlifestyle">SCHEDULE MY LIFESTYLE</a> </div>
        </div>
    </div>
</section>
</form>
<section class="juices-list group">
	<div class="wrapper group">
		<div class="links-more group">
        	<a href="detox.php" class="detox">GO FOR OUR DETOX</a>
            <a href="lifestyle.php" class="lifestyle">OR CHECK OUR LIFESTYLE</a>
        </div>
    </div>
</section>
<?php include("includes/footer.php"); ?>

<script type="text/javascript" src="js/classie.js"></script>
<script type="text/javascript" src="js/modernizr.js"></script>
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>