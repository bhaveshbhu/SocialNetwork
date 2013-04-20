<?php
session_start();
include("connect.php");
function add($clg)
{
	/*$q = "SELECT Campus from details WHERE CampID = ".$clg;
	$res = mysql_query($q) or die(mysql_error());
	$row = mysql_fetch_array($res);
	$file = (string)($row['Campus'].".xml");
	//echo $file;*/
	$file = (string)($clg.".xml");

	$doc = new DOMDocument();
	//$doc->load("write.xml");
	$doc->formatOutput = true;

	$r = $doc->createElement("campus");
	$doc->appendChild($r);

	$b = $doc->createElement("new");
	$name = $doc->createElement("n1");
	$name->appendChild(
	  $doc->createTextNode("Add New Events")
	  );
	$b->appendChild($name);
	$r->appendChild($b);

	$b = $doc->createElement("story");
	$name = $doc->createElement("s1");
	$name->appendChild(
	  $doc->createTextNode("Add Stories")
	  );
	$b->appendChild($name);
	$r->appendChild($b);


	$b = $doc->createElement("events");
	$name = $doc->createElement("e1");
	$name->appendChild(
	  $doc->createTextNode("Add Events")
	  );
	$b->appendChild($name);
	$r->appendChild($b);

	$b = $doc->createElement("photos");
	$name = $doc->createElement("p1");
	$name->appendChild(
	  $doc->createTextNode("No Photos")
	  );
	$b->appendChild($name);
	$r->appendChild($b);

	$b = $doc->createElement("other");
	$name = $doc->createElement("o1");
	$name->appendChild(
	  $doc->createTextNode("Other Items")
	  );
	$b->appendChild($name);
	$r->appendChild($b);

	//echo $doc->saveXML();
	  $doc->save($file);
  }
?>