<?php
session_start();
include('includes/header.html');
include('dbcon.php');

$query = "SELECT
    employee.eid, employee.fname
    , employee.lname
    , position.posid
    , ldays.adays
FROM
    ccse.employee
    INNER JOIN ccse.position 
        ON (employee.posid = position.posid)
    INNER JOIN ccse.ldays 
        ON (ldays.posid = position.posid)
WHERE (position.position in('Permanent','Provisionary'))";
    
$result = @mysql_query($query);



if($result){
echo "<br>";echo "<br>";
echo '<table border="1" align="center" bgcolor="lightgreen">
<tr>
<td colspan="111" align="center"><b>Available Leaves</td></tr>
<tr>
<td><center><b>Empoyee ID</center></td>
<td><center><b>First Name</center></td>
<td><center><b>Last Name</center></td>
<td><center><b>Position</center></td>
<td><center><b>Days</center></td>
</tr>';

$bg = '#eeeeee';
while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
$bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');

echo '<tr bgcolor="'.$bg.'">
<td align="left">'.$row['eid'].'</td>
<td align="left">'.$row['fname'].'</td>
<td align="left">'.$row['lname'].'</td>
<td align="left">'.$row['posid'].'</td>
<td align="left">'.$row['adays'].'</td>
	</tr>';
	}
echo '</table>';
mysql_free_result($result);

}else{
echo '<p>'.mysql_error().'<br /><br />Query:'.$query.'</p>';
}
mysql_close();
?>
<br><br><br><br><br><br><br><br>
<?php
require_once('includes/footer.html');
?>