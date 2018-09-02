<?php
session_start();
include('includes/header.html');
include('dbcon.php');
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="style.css" rel="stylesheet" type="text/css" />

<?php
error_reporting(0);
if(session_is_registered(not)){
?>
<script language="JavaScript" type="text/javascript">
alert("Employee Reach maximum days of leave!");
</script>
<?php
}else if(session_is_registered(field)){
?>
<script language="JavaScript" type="text/javascript">
alert("Please Input Employee ID!");
</script>
<?php
}
session_unregister("not");
session_unregister("field");
?>


</head>
<body><center><b>
<p>Please input Employee ID<br> to verify if there are still available leaves</b></p></center>
<br><br>
<table bgcolor="lightgreen" align="center" border="2"  cellpadding="2" cellspacing="3" cols="2" width="325"><font color="black">
<tr>
<form action="setid.php" method="POST">
<td><b>Employee ID:</td><td><input type="text" name="eid" size="28"/></td></tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" value="Submit" name="Submit" />
<input type="reset" value="Reset" name="clear" /></td>
<input type="hidden" name="submitted" />
</form>
</table><br><br>
<p><center><b> Reminder: Permanent Employee, allowed leave is 30 working days maximum<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Provisionary Employee, allowed leave is 7 working days maximum</b><br>
</p>			</center>  
<br><br><br>
<?php
require_once('includes/footer.html');
?>
</html>