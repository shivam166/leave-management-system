
<?php
error_reporting(0);
include('includes/start.php');
require_once('includes/header.html');
//Get variables from config.php to connect to mysql server
require 'dbcon.php';

//search variable = data in search box or url
if(isset($_GET['search']))
{
$search = $_GET['search'];
}

//trim whitespace from variable
$search = trim($search);
$search = preg_replace('/\s+/', ' ', $search);

//seperate multiple keywords into array space delimited
$keywords = explode(" ", $search);

//Clean empty arrays so they don't get every row as result
$keywords = array_diff($keywords, array(""));

//Set the MySQL query
if ($search == NULL or $search == '%'){
} else {
for ($i=0; $i<count($keywords); $i++) {
$query = "SELECT * FROM employee ".
"WHERE fname LIKE '%".$keywords[$i]."%'".
" OR mname LIKE '%".$keywords[$i]."%'" .
" OR lname LIKE '%".$keywords[$i]."%'" .
" OR eid LIKE '%".$keywords[$i]."%'" .
" OR posid LIKE '%".$keywords[$i]."%'" .


"ORDER BY fname";
}

//Store the results in a variable or die if query fails
$result = mysql_query($query) or die(mysql_error());
}
if ($search == NULL or $search == '%'){
} else {
//Count the rows retrived
$count = mysql_num_rows($result);
}

echo "<html>";
echo "<head>";
echo "<title>Search Record</title>";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"loginmodule.css\" />";
echo "</head>";
echo "<body onLoad=\"self.focus();document.searchform.search.focus()\">";
echo "<center>";
echo "<br /><form name=\"searchform\" method=\"GET\" action=\"search.php\">";
echo "<input type=\"text\" name=\"search\" size=\"20\" TABINDEX=\"1\" />";
echo " <input type=\"submit\" value=\"Search\" />";
echo "</form>";
//If search variable is null do nothing, else print it.
if ($search == NULL) {
} else {
echo "You searched for <b><FONT COLOR=\"blue\">";
foreach($keywords as $value) {
   print "$value ";
}
echo "</font></b>";
}
echo "<p> </p><br />";
echo "</center>";

//If users doesn't enter anything into search box tell them to.
if ($search == NULL){
echo "<center><b><FONT COLOR=\"red\">Search Employee.</font></b><br /></center>";
} elseif ($search == '%'){
echo "<center><b><FONT COLOR=\"red\">Search Employee.</font></b><br /></center>";
//If no results are returned print it
} elseif ($count <= 0){
echo "<center><b><FONT COLOR=\"red\">Sorry! No name found on database!</font></b><br /></center>";
//ELSE print the data in a table
} else {
//Table header

echo "<center><table align='center' border='1' bgcolor='lightgreen'>";
echo "<tr bgcolor='lightgreen'>";
echo "<tr>
<td colspan='111' align='center'><b>Employees</td></tr>";
echo "<td align=center><b>Employee ID</b></td>";
echo "<td align=center><b>First Name</b></td>";
echo "<td align=center><b>Middle Name</b></td>";
echo "<td align=center><b>Last Name</b></td>";
echo "<td align=center><b>Position</b></td>";
echo "</tr>";

$bg = '#eeeeee';

while($row = mysql_fetch_array($result))
{

$bg = ($bg == '#eeeeee' ? '#ffffff' : '#eeeeee');

echo '<tr bgcolor="'.$bg.'">';
echo "<td>".$row['eid']."</td>";
echo "<td>".$row['fname']."</td>";
echo "<td>".$row['mname']."</td>";
echo "<td>".$row['lname']."</td>";
echo "<td>".$row['posid']."</td>";

echo "</tr>";

$row_count++;
}

}
echo "</table></center>";
echo "</body>";
echo "</html>";
if ($search == NULL or $search == '%') {
} else {

mysql_free_result($result);
}
?>
<?php
echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
include('includes/footer.html');
?>