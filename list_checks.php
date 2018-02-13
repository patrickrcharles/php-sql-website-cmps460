<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>

<html>
<head>

<?php
session_start();
if (!isset($_SESSION['CLID'] ) ) //not logged in
{
echo "you need to login <BR>";
header("location:login.php");
exit();
}

$acctCLID = $_SESSION['CLID'] ;
echo "Welcome $acctCLID <br>";
?>

<?php
$host="localhost";
$user="root";
$password="student";
$database="website";
$table_name="UserAccount";

//////Connect to the database
$connect = mysql_connect($host,$user,$password);
if (!$connect) {die("Could not connect: " . mysql_errori());}

////// Select the database
mysql_select_db($database, $connect) or die("Unable to select database <br>");

////////////////home button/////////////////////////
?>
<br>
<!--  go to user_summary.php for this user -->
<form method="post" action="home.php" >
<td><input type="submit" name="loadbtn" value="home" /></td>

</form>
<!--  go to login screen -->
<form method="post" action="logout.php" >
<td><input type="submit" name="loadbtn" value="logout" /></td>
</tr>
</form>

<?php


$userSummary = "SELECT * FROM Transaction where user_CLID = '$acctCLID'and check_num > 0 order by transaction_date ASC";   
$userResult = mysql_query($userSummary);

echo "<table border='1'>
<tr>
<th>date of check</th>
<th>check #</th>
<th>amount</th>
<th>business</th>
<th>category</th>
</tr>";

while($row = mysql_fetch_assoc($userResult))
  {
  echo "<tr>";
  echo "<td>" . $row['transaction_date'] . "</td>";
  echo "<td>" . $row['check_num'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" . $row['inst_name'] . "</td>";
  echo "<td>" . $row['inst_subcategory'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?>


</html>
</head>
