<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head><title>Quality Planning and Quality Control</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
function showDiv(e) {
var divs = document.getElementsByTagName('div');
if (e==1) {
	for(i=0;i<divs.length;i++){
	if (divs[i].id=="hidevar1")	divs[i].style.visibility="visible"; 
	else if (divs[i].id=="hidevar2") divs[i].style.visibility="hidden"; 
	}
} else {
	for(i=0;i<divs.length;i++){
	if (divs[i].id=="hidevar1")	divs[i].style.visibility="hidden"; 
	else if (divs[i].id=="hidevar2") divs[i].style.visibility="visible"; 
	}
}
}
</script>

</head>
<body>

<div id="hidevar1" style="visibility: visible;">
	<form name="frm1" method="post">
		Module1 Name : <input type="text" name="txtname" value="Raja">
	</form>
</div>
<div id="hidevar2" style="visibility: hidden;">
	<form name="frm2" method="post">
		Module 2 Name : <input type="text" name="txtname1" value="Rajan">
	</form>
</div>

<input type="submit" name="submit" value="Show Form1" onClick="showDiv(1)">
<input type="submit" name="commit" value="Show Form2" onClick="showDiv(2)">
</body>
</html>