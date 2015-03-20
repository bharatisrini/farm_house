<!DOCTYPE>
<html>
<head>
<body>
<?php
$from = $_POST['email'];
$to = "divya.nadiminti91@gmail.com";
$subject = "Thanyou for your interest in Farmhouse Juice";
$txt = "Please contact this person and send him your broucher!";
$headers = "From: ".$from . "\r\n" ;
//"CC: srinivasmandapaka.vizag@gmail.com";

mail($to,$subject,$txt,$headers);
// Reply from the company

$to = $_POST['email'];
$from = "divya.nadiminti91@gmail.com";
$subject = "Thank You";
$txt = "Plase find our details in the attachments, we are looking forward to see you, in our site.";
$headers = "From: ".$from . "\r\n" ;
//"CC: srinivasmandapaka.vizag@gmail.com";

mail($to,$subject,$txt,$headers);

<script>
window.location.href="index.php";
</script>
?>
</body>
</head>
</html>