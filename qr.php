<?php
require_once 'phpqrcode/qrlib.php';
$qr ='ddd0-';
$path = 'images/qr';
$qrcode = $path.time().".png";
QRcode :: png($qr , $qrcode, 'H',4,4);
echo "<img src='".$qrcode."'>"; 
?>