<?php 
session_start();
$step=$_SESSION['step'];

if($step==2) 
{ 
   include_once "and2.php";
      
}
else if(isset($_POST['step3'])) 
{ 
    include_once "and3.php";
}else 
{ 
   include_once "and1.php";
     
} 
?>