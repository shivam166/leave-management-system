<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
require_once('dbcon.php');
if($_POST['eid'] == ""){
session_register("field");
header("Location: fidfrm.php");
}else{
session_unregister("field");

$_SESSION['eid'] = $_POST['eid'];

//select posid to determine poisiton code
$query = mysql_query("SELECT posid FROM employee where employee.eid = '$_SESSION[eid]'");
$row = mysql_fetch_array($query);
$pos = $row[0];

//selecet posid to ldays to restrict employee leave
$query = mysql_query("SELECT ldays.adays FROM ldays where posid = '$pos'");
$row = mysql_fetch_array($query);
$adays = $row[0];

//calculate the days will an employee will take for leave
$query = mysql_query("SELECT DATEDIFF(leaves.endate, leaves.edate) from leaves where eid = '$_SESSION[eid]'");
$row = mysql_fetch_array($query);
$ldays = $row[0];
$rdays = $adays - $ldays;
if ( $rdays <= 0){
session_register("not");
header("Location: fidfrm.php?page=leaveform");
exit(0);
}
else{
header("Location: leave.php?page=fileleave");
}
}




?>
</body>
</html>
