<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>



<html>
<head>
<title> 
Admin account 
</title>
</head>

<h3>Admin account page</h3>



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

?>

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

<!--  go to login screen -->
<form method="post" action="businesses.php" >
<td><input type="submit" name="loadbtn" value="list all businesses" /></td>
</tr>
</form>
</form>

<?php

//USER ACCT summary//////////////////////////
$userSummary = "SELECT * FROM UserAccount order by CLID asc ";  
$userResult = mysql_query($userSummary);

echo "<table border='1'>
<tr>
<th>CLID</th>
<th>user password </th>
<th>checking account #</th>
<th>check_balance</th>
<th>savings account #</th>
<th>saving balance</th>
</tr>";
while($row = mysql_fetch_assoc($userResult))
  {
  echo "<tr>";
  echo "<td>" . $row['CLID'] . "</td>";
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

///////////////display user info //////////////////////////

//end php start html form
?> 

<!--  display data for this user -->
<form method="POST" action="user_summary.php">
<tr>
<td>Display user info by CLID</td>
<td><input type="text" name="load" /></td>
<td><input type="submit"  value="load" /></td>
</tr>
</form>


<!--  delete this user for this user -->
<form method="POST" action="perform_action.php">
<td>Delete this user</td>
<td><input type="text" name="delete" /></td>
<td><input type="submit" name="loadbtn" value="delete" /></td>
</form>
<br />
<br />


<?php

/*
////////display income/expenses///////
$expenseSummary = "SELECT * FROM Transaction where user_CLID = '$acctCLID'";  
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
*/
?>

</body>
</html>
