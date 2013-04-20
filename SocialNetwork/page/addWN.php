<?php
session_start();
include("connect.php");
$a = qwerty;//(string)$_POST['new'];
//"qwerty";
//$tp = "new";
$tp = "new";//$_GET["type"];
//echo $tp;

$q = "SELECT * FROM details WHERE CampID = ".$_SESSION['clg'];
//echo $q;
$res = mysql_query($q) or die(mysql_error());
$ro = mysql_fetch_array($res);

$file = ((string)($ro['Campus'].".xml"));
$doc = new DOMDocument();

$doc->load($file);
$doc->formatOutput = true;

$b = $doc->getElementsByTagName($tp)->item(0);
$z = $b->child_nodes[0];
//echo (string)$z->node_value;
switch($tp)
	{
		case "new": $elem = "n1";
					break;
		case "story": $elem = "s1";
					break;
		case "events": $elem = "e1";
					break;
		case "other": $elem = "o1";
					break;
	}
if($z->node_value === "Add New")
{
	$x=$b->child_nodes[0];
	$x->nodeValue = $a;
	$doc->replaceChild($x, $x);
}
else
{
	$we = $ro[$tp] + 1;
	$que = "UPDATE details SET ".$tp." = ".$we." WHERE CampID = ".$_SESSION['clg'];
	//echo $que;
	$result = mysql_query($que) or die(mysql_error());
	$t = $doc->createTextNode($a);
  
  $name = $doc->createElement($elem);
  $name->appendChild($t);
  $b->appendChild($name);
}
 
  $doc->save($file);
  header("Location: main.php");
?>