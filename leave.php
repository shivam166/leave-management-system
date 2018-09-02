<?php
error_reporting(0);
session_start();
include('includes/header.html');
include('dbcon.php');
if(isset($_POST['submitted'])) {

$uploadLocation  = "C:\wamp\www\CCSE- Online Leave System\sick-leave";
 	$target_path = $uploadLocation . $_FILES['sick-leave'];
 	if(move_uploaded_file($_FILES['sick-leave'], $target_path)){    echo "upload success";  }

	$empl = $_POST['empl_id'];
$lev = $_POST['leavenames'];
$year = $_POST['year'];
$month = $_POST['month'];
$day = $_POST['day'];
$year2 = $_POST['year2'];
$month2 = $_POST['month2'];
$day2 = $_POST['day2'];
$msg = $_POST['mssg'];
$date = date('Y-m-d');
list($mon, $dy, $yr) = explode("-",$date);

if(strcmp($empl,
         strval(intval($empl)))) {
         echo "Please enter the employee id!</FONT>";
		}else{
		$empl = trim($empl);
	}
if (empty ($lev)) {
	echo '<p>Please enter type of leaves!.</p>';	
}
if (is_numeric ($year)) {
	$edate = $year . '-';
} else {
	echo '<p>Please enter the year.</p>';
}
if (is_numeric ($month)) {
	$edate .= $month . '-';
} else {
	echo '<p>Please select the month.</p>';
}
// Validate the day.
if (is_numeric ($day)) {
	$edate .= $day ;
} else {
	echo '<p>Please select the day.</p>';
}
if (is_numeric ($year2)) {
	$endate = $year2 . '-';
} else {
	echo '<p>Please enter the year.</p>';
}
if (is_numeric ($month2)) {
	$endate .= $month2 . '-';
} else {
	echo '<p>Please select the month.</p>';
}
// Validate the day2.
if (is_numeric ($day2)) {
	$endate .= $day2 ;
} else {
	echo '<p>Please select the day.</p>';
}
if (empty ($msg)) {
	echo '<p>Please enter reason!.</p>';	
}

if($empl && $lev  && $year && $month && $day && $year2 && $month2 && $day2 && $msg){
$query = "INSERT INTO leaves (eid, fdate, leavetype, edate, endate, reason, recommending) VALUES ('$empl', '$date', '$lev', '$edate', '$endate', '$msg', 'pending')";
$result = @mysql_query($query);
if($result){
echo '<p><h2><b><center>Leave Succesfully Submitted!</center></b></h2></p>';
echo "<br>"; echo "<br>"; echo "<br>"; echo "<br>";echo "<br>";echo "<br>";
 echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";echo "<br>";
 require_once('includes/footer.html');
 exit();
}else{
echo '<p>System Error!</p>';
echo '<p>'.mysql_error().'<br /><br />Query:'.$query.'</p>';
exit();

}
}
}
?>
<table align="center" border="2" bgcolor="lightgreen" cellpadding="2" cellspacing="3" cols="2" width="405"><font color="black">
<tr>
<form action="leave.php" method="post">
<br>
<tr>
                <td><b>Filed Date:</span></div></td>
                                       <td valign="top"><label>
                          <input name="day" type="text" id="day" value="<?php echo date('Y-m-d'); ?>" size="10" maxlength="15"  readonly />
                      </label>
                        <label></label></td>
                </tr>
<tr>
<td><b>Employee ID:</td><td><input type="text" name="empl_id" size="28" value="<?php echo $_SESSION['eid']; ?>"/></td></tr>
<tr><td>&nbsp;</td>
	<td><i><b>To the NSC Director<br>&nbsp;&nbsp;&nbsp;I have the honor to request for leave:</b></i></td>
<tr>
<td><b>Leave Type:</td><td>
<select name="leavenames">
<option></option>
<option>day/s vacation leave with pay</option>
<option>day/s emergency leave with pay</option>
<option>day/s sick leave with pay</option>
<option>birthday leave with pay</option>
<option>day/s paternity leave with pay</option>
<option>day/s maternity leave without pay</option>
<option>day/s vacation leave without pay</option>
<option>day/s emergency leave without pay</option>
<option>day/s sick without pay</option>
</select>

</td></tr>
<tr>
<td><b>Effective Date:</td><td>

<select name="year">
<option value="">--Year--</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
</select>

<select name="month">
<option value="">--Month--</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="day">
<option value="">--Day--</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

</td></tr>
<tr><td>&nbsp;</td>
<td><p><center><b>TO</b></center></p></td></tr>
<tr>
<td><b>Due Date:</td><td>
<select name="year2">
<option value="">--Year--</option>
<option value="2009">2009</option>
<option value="2010">2010</option>
<option value="2011">2011</option>
<option value="2012">2012</option>
<option value="2013">2013</option>
<option value="2014">2014</option>
<option value="2015">2015</option>
<option value="2016">2016</option>
<option value="2017">2017</option>
<option value="2018">2018</option>
<option value="2019">2019</option>
<option value="2020">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
</select>

<select name="month2">
<option value="">--Month--</option>
<option value="01">January</option>
<option value="02">February</option>
<option value="03">March</option>
<option value="04">April</option>
<option value="05">May</option>
<option value="06">June</option>
<option value="07">July</option>
<option value="08">August</option>
<option value="09">September</option>
<option value="10">October</option>
<option value="11">November</option>
<option value="12">December</option>
</select>
<select name="day2">
<option value="">--Day--</option>
<option value="01">1</option>
<option value="02">2</option>
<option value="03">3</option>
<option value="04">4</option>
<option value="05">5</option>
<option value="06">6</option>
<option value="07">7</option>
<option value="08">8</option>
<option value="09">9</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>

</td></tr>

<tr>
<td><b>Reason:</td>
<td>
<TEXTAREA name="mssg" rows="3" cols="30" MAXLENGTH="100"></TEXTAREA></td>
</tr>
<tr><td><b>For Sick Leave:</td>
<td><input type="hidden" name="MAX_FILE_SIZE" value="100000" />
<input type="file" name="sick" size="28"></td></tr>
<tr>
<td>&nbsp;</td>
<td><input type="submit" value="Submit Leave" name="Submit" /></td>
<input type="hidden" name="submitted" />
</tr>
</form>
</tr>
</table>
<br><br><br><br>
<?php
require_once('includes/footer.html');
?>