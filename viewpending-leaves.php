<?php
	include('includes/start.php');
	require_once('includes/header.html');
?>
<?php


$page_title = 'View Employees';

require_once("dbcon.php");
$query = "SELECT
    leaves.eid
    , employee.fname
    , employee.lname
    , leaves.fdate
FROM
    ccse.leaves
    INNER JOIN ccse.employee 
        ON (leaves.eid = employee.eid)";
$result = @mysql_query($query);
$num = mysql_num_rows($result);

if($result){

echo '<table align="center" border="1" bgcolor="lightgreen">
<tr>
<td colspan="111" align="center"><b>View Leaves</td></tr>
<tr>
<td align="center"><b>Employee ID</a></b></td>
<td align="center"><b>First Name</a></b></td>
<td align="center"><b>Last Name</a></b></td>
<td align="center"><b>Action</a></b></td>
</tr>';

$bg = '#eeeeee';
while($row=mysql_fetch_array($result, MYSQL_ASSOC)){
$bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');


echo '<tr bgcolor="'.$bg.'">
<td align="left">'.$row['eid'].'</td>
<td align="left">'.$row['fname'].'</td>
<td align="left">'.$row['lname'].'</td>
<td align="left"><a href="view-leave.php?id='.$row['eid'].'"><img src="images/view.gif" width="50" height="20"></a></td>

</tr>';

}

echo '</table>';
//------------------End of Get list of Employees--------
mysql_free_result($result);
}else{
echo '<p class="error">There are currently no entered employees in the system!</p>';
/*echo '<p class="error">Data Can Not Be Retrieved!</p>';
echo '<p>'.mysql_error().'<br /><br />Query:'.$query.'</p>';*/
}
mysql_close();
$num_pages=1;
if($num_pages > 1){
echo '<br /><p>';
$current_page = ($start/$display) + 1;

if($current_page !=1){
 echo '<a href="profile_emp.php?s='.($start - $display).'&np='.$num_pages.'$sort='.$sort.'" />Previous</a>';
 }
 
 for($i = 1; $i <=$num_pages; $i++){
  if($i !=$current_page){
  echo '<a href="emp-list.php?s='.(($display * ($i-1))).'&np='.$num_pages.'$sort='.$sort.'" />'.$i.'</a>';
  }else{
  echo $i.'';
  }
 }
 
 if($current_page !=$num_pages){
 echo '<a href="emp-list.php?s='.($start + $display).'&np='.$num_pages.'$sort='.$sort.'" />Next</a>';
 }
 echo '</p>';
 }
//------End of Paging Result----


?>
<?php
echo "<br>";echo "<br>";
include('includes/footer.html');
?>
