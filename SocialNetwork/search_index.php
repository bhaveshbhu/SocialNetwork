<html>
<head>
<script src="js/jquery.js" type="text/javascript"></script>
<style type="text/css">
#SearchResults {
background: #000000;
display: none;
overflow: auto;
position: absolute;
width: 330px;
z-index: 99;
}
#searchfield {color:#dadada;}
</style>
<script type="text/javascript">
function showResult(str)
{
if (str.length<4)
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
else
{
var serach_var=str;
 var url="search.php";
$.post(url,{ request: "", ser: str} ,function(data) {
	    
$("#results").html(data).show();

   });

}
}
</script>
</head>
<body>
<table>
<tr><td>
<form>
<input  id="livesearch" type="text" size="30" onkeyup="showResult(this.value)" />
<div ></div>
</form></td></tr>
<tr>
<td></td>
<td>
<div style="position:absolute; width:500px; height:auto; border:1px white; overflow:hidden; background:#fff">
<div id="results" ></div>
</div>
</td>
</tr></table>
</body>
</html>