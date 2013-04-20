<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Delete</title>
<script language="javascript">
var popup; //A global variable that will act as the Popup ID
function makeExternalPopup() {
	//Create the popup and store the returning id in the variable 
	popup = window.open("pop.html", "popup_id",
		"scrollbars,resizable,width=300,height=400");
}
function getData() {
	//Check for the existence of the popup before doing anything
	if(!popup) {
		alert("Please create the popup first."); 
		return;
	}
	//Access the popup elements using this ID and fetch data from it 
	var data = popup.document.getElementById('popup_data').value; 
	document.frm.txt.value = data;
}
function putData() {
	//Check for the existence of the popup before doing anything
	if(!popup) {
		alert("Please create the popup first."); 
		return;
	}
	//Access the popup elements using this ID and put data into it
	var data = document.frm.txt.value;
	popup.document.getElementById('popup_data').value = data;
}
</script>
</head>
    <body>
        
    </body>
</html>