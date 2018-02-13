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

$transfer_amt = $_POST['transfer_amt'];


//////Connect to the database
$connect = mysql_connect($host,$user,$password);
if (!$connect) {die("Could not connect: " . mysql_errori());}

////// Select the database
mysql_select_db($database, $connect) or die("Unable to select database <br>");



////////////////home button/////////////////////////
?>
<!--  go to user_summary.php for this user -->
<form method="post" action="home.php" >
<td><input type="submit" name="loadbtn" value="home" /></td>

</form>
<!--  go to login screen -->

<form method="post" action="logout.php" >
<td><input type="submit" name="loadbtn" value="logout" /></td>
</tr>
</form>

<form method="post" action="savings_transfer.php" >
<td><input type="submit" name="loadbtn" value="transfer" /></td>
<td> amount <input type="text" name = "transfer_amt" /></td>
<td> from checking to savings
<br>

<?php
///get current check / save balances

$result = mysql_query("select balance from UserAccount where CLID = '$acctCLID';");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

$row = mysql_fetch_row($result);
$current_check_balance = $row[0];

$result = mysql_query("select sbalance from UserAccount where CLID = '$acctCLID';");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);
$current_sav_balance = $row[0];

////////////////////// update


$current_check_balance -= $transfer_amt;
$current_sav_balance += $transfer_amt;


$update = "UPDATE UserAccount 
	set balance = '$current_check_balance', sbalance = '$current_sav_balance'
	where CLID = '$acctCLID'";
mysql_query( $update );


$userSummary = "SELECT * FROM UserAccount where CLID = '$acctCLID '";   
$userResult = mysql_query($userSummary);

echo "<table border='1'>
<tr>
<th>checking balace</th>
<th>savings balance </th>
</tr>";

while($row = mysql_fetch_assoc($userResult))
  {
  echo "<tr>";
  echo "<td>" . $row['balance'] . "</td>";
  echo "<td>" . $row['sbalance'] . "</td>";

  echo "</tr>";
  }
echo "</table>";

?>


