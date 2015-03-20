<?php

define('INCLUDE_CHECK',1);
require "../db_connect.php";

if(!$_POST['img']) die("There is no such product!");

$list = explode('/',$_POST['img']);
$img=mysqli_real_escape_string($conn,end($list) );

$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM farmhouse_juice_details WHERE image ='".$img."'"));

if(!$row) die("There is no such product!");

echo '<strong>'.$row['name'].'</strong>

<p class="descr">'.$row['ingredients'].'</p>

<strong>price: $'.$row['price'].'</strong>
<small>Drag it to your Cart</small>';
?>
