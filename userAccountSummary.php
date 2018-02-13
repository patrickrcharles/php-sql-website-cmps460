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
$host="localhost";
$user="root";
$password="student";
$database="website";
$table_name="UserAccount";


// Access form variables
$acctCLID = $_POST['acctCLID'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$userpassword = $_POST['userpassword'];
$checkAcctNo = $_POST['checkAcctNo'];
$savAcctNo = $_POST['savAcctNo']; 
$checkAmt = $_POST['checkAmt'];
$savAmt = $_POST['savAmt'];

//////Connect to the database
$connect = mysql_connect($host,$user,$password);
if (!$connect) {die("Could not connect: " . mysql_errori());}

////// Select the database
mysql_select_db($database, $connect) or die("Unable to select database <br>");

echo "database : $database selected <br>";
echo "connect = $connect <br>";
/////////////////////////////////////////

//USER ACCT summary
$userSummary = "SELECT * FROM UserAccount ";  
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

//////////////////////////

echo "<br>";
echo "<br>";
////////display income/expenses///////
$expenseSummary = "SELECT * FROM Transaction where user_CLID = 'test'";  
$expenseResult = mysql_query($expenseSummary);

echo "<table border='1'>
<tr>
<th>tranasction date</th>
<th>transaction ID</th>
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
  echo "<td>" . $row['transaction_ID'] . "</td>";
  echo "<td>" . $row['check_num'] . "</td>";
  echo "<td>" . $row['amount'] . "</td>";
  echo "<td>" . $row['inst_name'] . "</td>";
  echo "<td>" . $row['inst_category'] . "</td>";
  echo "<td>" . $row['inst_subcategory'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

//////////////////////////////
/*

///////////////////record income tranaction //////

where user_CLID = clid && inst_category = 'income'
if checking/ get check balance /UserAccount
if saving/ get saving balance /UserAccount

$userBalance = "SELECT * FROM UserAccount where CLID = 'test'";  
$userBalanceResult = mysql_query($userSummary);

$result = mysql_query($userBalance);


$checkTrans; //post amount entered
$savTrans; /post amount entered

$newCheckBalance = amount entered + UserAccount.balance;
$newSAvBalance = amount entered + UserAccount.sbalance;

$checkUpdate = "update UserAccount set balance = $newCheckBalance";
$savUpdate = "update UserAccount set balance = $newCheckBalance";






//////////////////////////////////////////////////////


///////////////////record expense tranaction //////





//////////////////////////////////////////////////////
echo "<br>";
echo "TODO : add button to record income/expense transaction <br>";
echo "TODO : dropdown menu to display categories with miscellaneous expense as default<br>";
echo "TODO : display all income and expenses<br>";
echo "TODO : totals for all goals in categories in use and comparison to goals if exist. if goal exceeded, flag it<br>";
echo "TODO : list of checks issued, order by date most recent first, include date check_no, amy,business, and category <br>";
echo "TODO : add/delete goals for categories of choice<br>";
echo "TODO : add/delete categories and subcategories of choice<br>";
echo "TODO : add/delete businesses<br>";
echo "TODO : list businesses and change category assocaited with // ALTER/UPDATE TABLE i think<br>";

?>

</body>
</html>
