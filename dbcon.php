<?PHP
$con = mysql_connect("localhost","root");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }mysql_select_db("ccse", $con);
  //print_r($con);
  
 function escape_data($data){

if(ini_get('magic_quotes_gpc')){
$data = stripslashes($data);
}

if(function_exists('mysql_real_escape_string')){
global $con;
$data = mysql_real_escape_string(trim($data),$con);
}else{
$data=mysql_escape_string(trim($data));
}
return $data;
}
?>