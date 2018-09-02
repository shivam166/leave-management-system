<?php
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <style type="text/css" title="text/css" media="all">
	
</style>
<title>Nzoia-Sugar Online Leave System</title>
</head><br><br><br><br>
<center><img src="images/login.gif" height="100" width="400"></center>
<body background="images/logoi.jpg">
<p>
  <?php
 if(isset($_POST['submitted'])) {
 
require_once('dbcon.php');

$errors = array();

if(empty($_POST['username'])){
$errors [] = 'Please enter username!';
}else{
$us = trim($_POST['username']);
}

if(empty($_POST['pass'])) {
$errors [] = 'Please enter the password!';
}else{
$p = trim($_POST['pass']);
}

if(empty($errors)){

$query = "SELECT userid, fname, posid FROM users WHERE username = '$us' AND password = SHA('$p')";
$result = @mysql_query($query);
$row = mysql_fetch_array($result, MYSQL_NUM);
if($row){

session_start();
$_SESSION['user_id'] = $row[0];
$_SESSION['fname'] = $row[1];
$_SESSION['posid'] = $row[2];
$_SESSION['lname'] = $row[3];

ob_end_clean();
if ($_SESSION['posid'] == 'AD-1'){
$url ='admin/main-index.php';
}
elseif ($_SESSION['posid'] == 'DR-2'){
$url ='director/main-index.php';
}
else{
$url ='main-index.php';
}
header("Location: $url");
exit();
}else{
echo "<center><b>Incorrect UserName or Password!</b></center>";

}
}
mysql_close();

}//End submitted
?>
</p><BR><BR><br>
<table border="1" align="center"  bgcolor="lightgreen"/>
<form action="index.php" method="post" id="frm">
<tr>
<td><strong>UserName:</strong></td><td><input type="text" name="username" /></td>
</tr>
<tr>
<td><strong>Password:</strong></td><td><input type="password" name="pass" /></td>
</tr>
<tr>
<td></td>
<input type="hidden" name="submitted" value="TRUE">
<td>  <input type="submit" name="submit" value="Login"><input type="reset" name="reset" value="Clear" />
</td>
</tr>
</form>
</table>
</body>
</html><br><br>
<?php
echo "<br>";echo "<br>";
include('includes/footer.html');
?>