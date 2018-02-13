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

echo "database : $database selected <br>";
echo "connect = $connect <br>";

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
<br />
<br />
<!--  record income tranasction -->
<form method="POST" action="perform_action.php">
<tr>
<td>record income transaction</td>
<br>
<br>
<td>amount	<input type="text" name="add_amount" /></td>
<td>business	<input type="text" name="add_business" /></td>
<td>category	<input type="text" name="add_category" /></td>
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

<html>
</body>

