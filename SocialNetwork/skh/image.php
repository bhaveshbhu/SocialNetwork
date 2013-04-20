<?php
session_start();

$fl = $_SESSION['ur'];//"upload/chair.1.jpg";//
if(!is_string($fl))
    $fl = (string)$fl;
$imagepath= $fl;
$image=imagecreatefromjpeg($imagepath);
header('Content-Type: image/jpeg');
imagejpeg($image);
?>