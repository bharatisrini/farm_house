<?php

define('INCLUDE_CHECK',1);
require "../db_connect.php";

if(!$_POST['img']) die("There is no such product!");
$list = explode('/',$_POST['img']);
$img=mysqli_real_escape_string($conn,end($list) );

$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM farmhouse_juice_details WHERE image ='".$img."'"));

echo json_encode(array(
	'status' => 1,
	'id' => $row['product_id'],
	'price' => (float)$row['price'],
	'txt' => '<table width="100%" id="table_'.$row['product_id'].'">
  <tr>
    <td width="60%">'.$row['name'].'</td>
    <td width="10%">$'.$row['price'].'</td>
    <td width="15%"><select name="'.$row['product_id'].'_cnt" id="'.$row['product_id'].'_cnt" onchange="change('.$row['product_id'].');">
	<option value="1">1</option>
	<option value="2">2</option>
	<option value="3">3</option>
	<option value="4">4</option>
	<option value="5">5</option>
	<option value="6">6</option></slect>
	
	</td>
	<td width="15%"><a href="#" onclick="window.remove('.$row['product_id'].');return false;" class="remove">remove</a></td>
  </tr>
</table>'
));

?>
