<?php
session_start();
include_once("scripts/checkuserlog.php");
include_once("scripts/connect_to_mysql.php");
?>
<?php
$var=$_POST['ser'];
$limit = 10;
$trimmed = trim($var);
 $trimmed1 = trim($var);
// //separate key-phrases into keywords
$trimmed_array = explode(" ",$trimmed);
 $trimmed_array1 = explode(" ",$trimmed1);
 
if (!isset($var))
{
   $resultmsg =  "<p>Search Error</p><p>We don't seem to have a search parameter! </p>" ;
}
foreach ($trimmed_array as $trimm){

// $query = "SELECT lastname FROM mymembers WHERE MATCH ( lastname ) AGAINST ('".$trimm."')";
 // // Execute the query to  get number of rows that contain search kewords
 // $numresults=mysql_query($query) or die (mysql_error());
 // $row_num_links_main = mysql_num_rows($numresults);
 // echo "hiiiiiiii";
  // if($row_num_links_main < 1){
    $query = "SELECT * FROM mymembers WHERE firstname LIKE '%$trimm%' OR lastname LIKE '%$trimm%' OR username LIKE '%$trimm%'";
    $numresults=mysql_query($query) or die(mysql_error());
    $row_num_links_main1=mysql_num_rows($numresults);
 $row= mysql_fetch_array ($numresults);
 
  do{
      $adid_array[] = $row[ 'id' ];
  }while( $row= mysql_fetch_array($numresults));
} 
 
if($row_num_links_main1 == 0){
    $resultmsg = "<p>Search results for: ". $trimmed."</p><p>Sorry, your search returned zero results</p>" ;
}
 
//delete duplicate record id's from the array. To do this we will use array_unique function
$tmparr = array_unique($adid_array);

$i=0;
foreach ($tmparr as $v) {
   $newarr[$i] = $v;
   $i++;
}
 //echo count($newarr);
//total result
 $row_num_links_main = $row_num_links_main1;
 
// display an error or, what the person searched
if( isset ($resultmsg)){
    echo $resultmsg;
}else{
 $outputList = '';
    foreach($newarr as $value){
 
    // EDIT HERE and specify your table and field unique ID for the SQL query
    $query_value = "SELECT * FROM mymembers WHERE id = '".$value."'";
    $num_value=mysql_query ($query_value);
    $row= mysql_fetch_array ($num_value);
   // $row_num_links= mysql_num_rows ($num_value);
 
    //create summary of the long text. For example if the field2 is your full text grab only first 130 characters of it for the result
    $idlist = $row["id"];
	$username = $row["username"];
	$lastname = $row["lastname"];
	$place = $row["place"];
	$gender = $row["gender"];
	$check_pic = "members/$idlist/image01.jpg";
	$default_pic = "members/0/image01.jpg";
	if (file_exists($check_pic)) {
    $user_pic = "<img src=\"$check_pic\" width=\"80px\" height=\"100%\" border=\"0\" />"; // forces picture to be 120px wide and no more
	} else {
	$user_pic = "<img src=\"$default_pic\" width=\"80px\" height=\"100%\" border=\"0\" />"; // forces default picture to be 120px wide and no more
	}
    
	$outputList .= '
<div style=" width:100%; height:80px;  display:block;  border-bottom: 1px solid lightgrey; margin:5px; ">
                  <div  style=" border:1px solid black; width:80px; float:left; height:100%; display:block; overflow:hidden;"><a href="profile.php?id=' . $idlist . '" target="_self">' . $user_pic . '</a></div>
                 <div id="name" style="padding-left:5px; float:right; width:360px; height:100%; display:inline; line-height:30px; position:relative; top:0px; border:1px; solid black;"><span style="color: #3B5998; "><a style="text-decoration:none;" href="profile.php?id=' . $idlist . '" target="_self"><b>Name: </b>' . $username ." ".$lastname . '</a> </span> 
				 <div id="place" style="position:relative; top:0px ; bottom:0px; padding-bottom:0px;  height:20px; "><span style="color:#3B5998; "><b>Gender:</b>'.$gender.'</span></div>
				 <div id="place" style="position:relative; bottom:0px; padding-bottom:0px; height:20px; "><span style="color:#3B5998; "><b>Place:</b> '.$place.'</span></div>
				 </div>
				 </div>';
	}
?>
<html>
<body>
<div id="search_head" style="padding:5px; margin:10px;">
<div id="userdetails" style="width: 100%;
background-color: #4ECD1F;
margin-left: 0px;
font-family: tahoma, verdana, arial;
height: 40px; -webkit-border-radius: 3px 3px 3px 3px;
border-radius: 3px 3px 3px 3px;
border: 1px solid #4ECD1F;
line-height: 40px; display: block; text-align: -webkit-center;" >
<div style="float:left; font-weight:bold;margin-left:20px; height:40px;font-size:22px;color:white;font-family:tahoma,vardana,arial; line-height:40px;" >USERS</div>
</div>
<div id="user_search" style="border: 1px solid lightGrey;
float: left;
width: 450px;
padding: 10px; box-shadow: 0px 0px 2px 0px lightgrey;
background-color: white;
 display: block; text-align: left;">
<?php echo $outputList; } ?>
</div>
</div>
</body>
</html>
