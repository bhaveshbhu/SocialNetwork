<?php 
session_start();
$id=5;
$_SESSION['idx'] = base64_encode("g4p3h9xfn8sq03hs2234$id");
$decryptedID = base64_decode($_SESSION['idx']);
$id_array = explode("xfn8sq03hs2234", 'xfn8sq03hs22345');

echo "  ".$id_array[1];
?>