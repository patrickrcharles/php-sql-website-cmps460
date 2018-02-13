<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>

<html>
<head>
<title> 
User account summary
</title>
</head>

<h3>User account summary</h3>

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

$load = $_POST['load']; //clid from 'load user' in admin screen
$delete = $_POST['delete']; //clid from 'delete user' in admin screen

if ($acctCLID = 'admin' or 'ADMIN') //if admin logged in, send 'load user' to query
{ $acctCLID = $load;}


if (empty($acctCLID))  // if not admin and nothing loaded, CLID loaded from delete user button
{ $acctCLID = $delete; }

if (empty($load))
{ $acctCLID = $_SESSION['add_CLID'];}



if (empty($acctCLID))
{ $acctCLID = $_SESSION['CLID'] ;}



//////Connect to the database
$connect = mysql_connect($host,$user,$password);
if (!$connect) {die("Could not connect: " . mysql_errori());}

////// Select the database
mysql_select_db($database, $connect) or die("Unable to select database <br>");

//USER ACCT summary

$userSummary = "SELECT * FROM UserAccount where CLID = '$acctCLID'";  
$userResult = mysql_query($userSummary);

echo "<table border='1'>
<tr>
<th>CLID</th>
<th>fname</th>
<th>lname</th>
<th>user password </th>
<th>checking</th>
<th>check_balance</th>
<th>savings</th>
<th>saving balance</th>

</tr>";

while($row = mysql_fetch_assoc($userResult))
  {
  echo "<tr>";
  echo "<td>" . $row['CLID'] . "</td>";
  echo "<td>" . $row['fname'] . "</td>";
  echo "<td>" . $row['lname'] . "</td>";
  echo "<td>" . $row['user_password'] . "</td>";
  echo "<td>" . $row['checking'] . "</td>";
  echo "<td>" . $row['balance'] . "</td>";
  echo "<td>" . $row['savings'] . "</td>";
  echo "<td>" . $row['sbalance'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

////////////////home button/////////////////////////
?>
<br>
<!--  go to user_summary.php for this user -->
<form method="post" action="home.php" >
<td><input type="submit" name="loadbtn" value="home" /></td>
</tr>
</form>
<!--  go to login screen -->
<form method="post" action="logout.php" >
<td><input type="submit" name="loadbtn" value="logout" /></td>
</tr>
</form>
</form>
<!--  list checks -->
<form method="post" action="list_checks.php" >
<td><input type="submit" name="loadbtn" value="list checks" /></td>
</tr>
</form>
<!--  list goals -->
<form method="post" action="list_goals.php" >
<td><input type="submit" name="loadbtn" value="list goals" /></td>
</tr>
</form>

<!--  list income -->
<form method="post" action="list_transaction.php" >
<td><input type="submit" name="loadbtn" value="list all transactions" /></td>
</tr>
</form>

<!--  list businesses -->
<form method="post" action="businesses.php" >
<td><input type="submit" name="loadbtn" value="list all businesses" /></td>
</tr>
</form>

<!--  list businesses -->
<form method="post" action="savings_transfer.php" >
<td><input type="submit" name="loadbtn" value="transfer to savings account" /></td>
</tr>
</form>


<!--  record income tranasction -->
<form method="POST" action="perform_action.php">
<tr>
<td>record income transaction</td>
<br>
<br>
<td>amount	<input type="text" name="add_amount" /></td>
<td>business	<input type="text" name="add_business" /></td>
<td><input type="hidden" name="add_category" /></td>
<br>
<td>date (format: yyyymmdd)<input type="type" name="add_date"/></td></td>
<br>
<td>check # (if applicable)<input type="type" name="add_check_no"/></td></td>
<tr><td> <input type="hidden" name="acct_CLID" value="<?php echo $acctCLID; ?>" ></td></tr>
<?php
$_SESSION['add_CLID'] = $acctCLID;
?>
</tr>
<td><input type="submit"  value="add" /></td>
</form>

<!--  record expense tranasction -->
<form method="POST" action="perform_action.php">
<tr>
<td>record expense transaction</td>
<br>
<br>
<td>amount	<input type="text" name="del_amount" /></td>
<td>business	<input type="text" name="del_business" /></td>
<td><input type="hidden" name="del_category" /></td>
<br>
<td>date (format: yyyymmdd)<input type="type" name="del_date"/></td></td>
<br>
<td>check # (if applicable)<input type="type" name="del_check_no"/></td></td>
<tr><td> <input type="hidden" name="acct_CLID" value="<?php echo $acctCLID; ?>" ></td></tr>
<?php
$_SESSION['add_CLID'] = $acctCLID;

?>
</tr>
<td><input type="submit"  value="add" /></td>
</form>


<?php
/*
////////display income/expenses///////
$expenseSummary = "SELECT * FROM Transaction where user_CLID = '$acctCLID'and check_num > 0 order by transaction_date ASC";  
$expenseResult = mysql_query($expenseSummary);

echo "<table border='1'>
<tr>
<th>tranasction date</th>
<th>check number </th>
<th>amount</th>
<th>business</th>
<th>category</th>
<th>subcategory</th>
</tr>";

while($row = mysql_fetch_assoc($expenseResult))
  {
  echo "<tr>";
  echo "<td>" . $row['transaction_date'] . "</td>";
  //echo "<td>" . $row['transaction_id'] . "</td>";
  echo "<td>" . $row['check_num'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" . $row['inst_name'] . "</td>";
  echo "<td>" . $row['inst_category'] . "</td>";
  echo "<td>" . $row['inst_subcategory'] . "</td>";
  echo "</tr>";
  }
echo "</table>";
*/

?>

</body>
</html>
