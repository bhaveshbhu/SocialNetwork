<?php
session_start();
include("connect.php");
$a = qwertyuiop;//(string)$_POST['new'];
//"qwerty";
$tp = "new";
//$tp = $_GET["type"];
echo $tp;

$q = "SELECT * FROM details WHERE CampID = ".$_SESSION['clg'];
echo $q;
$res = mysql_query($q) or die(mysql_error());
$ro = mysql_fetch_array($res);

$file = ((string)($ro['Campus'].".xml"));
$doc = new DOMDocument();

$doc->load($file);
$doc->formatOutput = true;

$employees = $doc->getElementsByTagName($tp);
$arr = $_POST['typ'];
$N = count($arr);
if(!empty($_POST['typ']))
{
	for($j = 0; $j < $N; $j++)
	{
		$chkval = $arr[$j];
		foreach($employees as $employee)
		{
			for($i = 0; $i < $employees->length; $i++)
			{
				switch($type)
				{
					case "new": $el = "n1";
								break;
					case "story": $el = "s1";
								break;
					case "events": $el = "e1";
								break;
					case "photos": $el = "p1";
								break;
					case "other": $el = "o1";
								break;
				}
				$names = $employee->getElementsByTagName($el);
				$name = $names->item($i)->nodeValue;				
				if($name === $chkval)
				{
					$doc->removeChild($names);
				}
			}			
		}
	}
}
		$doc->save($file);
  header("Location: main.php");
?>