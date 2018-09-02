<?php
include('includes/start.php');
include('includes/header.html');
require_once('dbcon.php');

//select the employee who file leave
$query = "    SELECT
    leaves.eid
    , employee.fname
    , employee.lname
    , leaves.edate
    , leaves.endate
    , leaves.recommending
FROM
    ccse.leaves
    INNER JOIN ccse.employee 
        ON (leaves.eid = employee.eid) and employee.eid='$_GET[id]'";
$result = @mysql_query($query);



if($result){
echo "<br>";echo "<br>";
echo '<table border="1" align="center" bgcolor="lightgreen">
<tr>
<td colspan="111" align="center"><b>Employee Leave Status</td></tr>
<td><center><b>Empoyee ID</center></td>
<td><center><b>Employee Name</center></td>
<td><center><b>Effective Date</center></td>
<td><center><b>Due Date</center></td>
<td><center><b>Status</center></td>
</tr>';
$bg = '#eeeeee';
while($row = mysql_fetch_array($result)){
$bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');

$e = $row['edate'];
list($yr, $mon2, $day) = explode("-",$e);
require_once('admin/edate.php');
$edate = $mon2." ".$day.", ".$yr ;

$ef = $row['endate'];
list($yr, $mon3, $day) = explode("-",$ef);
require_once('admin/endate.php');
$endate = $mon3." ".$day.", ".$yr ;

echo '<tr bgcolor="'.$bg.'">
	<td>'.$row[0].'</td>
	<td>'.$row[2].', '.$row[1].'</td>
	<td>'.$edate.'</td>
	<td>'.$endate.'</td>
	<td>'.$row[5].'</td>
	</tr>';
	}
echo '</table>';
mysql_free_result($result);

}else{
echo '<p>'.mysql_error().'<br /><br />Query:'.$query.'</p>';
}
mysql_close();
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
echo "<br>";echo "<br>";echo "<br>";
include('includes/footer.html');

?>

