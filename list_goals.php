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

$add_cat = $_POST['add_cat'];
$add_goal= $_POST['add_goal'];

$del_cat = $_POST['del_cat'];

$change_cat = $_POST['change_cat'];
$change_goal = $_POST['change_goal'];

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

</form>
<!--  add goal -->
<form method="POST" action="list_goals.php" >
<td> <input type="submit" name="loadbtn" value="add goal" /></td>

<td> category <input type="text" name = "add_cat" /></td>
<td>goal amount <input type="text" name = "add_goal" /></td>

</tr>
</form>

<?php
////////////////////add goal
$userSummary = "INSERT INTO Goals 
		values ('','$acctCLID','Misc.','$add_cat','$add_goal') ";
   
$userResult = mysql_query($userSummary);

?>

</form>
<!--  delete goal -->
<form method="post" action="list_goals.php" >
<td><input type="submit" name="loadbtn" value="delete goal" /></td>
<td> category <input type="text" name = "del_cat" /></td>
</tr>
</form>

<?php
$userSummary = "delete from Goals 
		where USER_CLID = '$acctCLID' and
		inst_subcategory = '$del_cat' and
		inst_category = 'Misc.'";  
   
$userResult = mysql_query($userSummary);
?>

</form>
<!--  change goal -->
<form method="post" action="list_goals.php" >
<td><input type="submit" name="loadbtn" value="change goal" /></td>
<td> category <input type="text" name = "change_cat" /></td>
<td> goal amount <input type="text" name = "change_goal" /></td>
</tr>
</form>


<?php
$userSummary = "update Goals set goal_amount = '$change_goal' where inst_subcategory = '$change_cat'"; 
   
$userResult = mysql_query($userSummary);
?>
<?php

echo "CLID : $acctCLID";

$userSummary = "SELECT inst_category,inst_subcategory, goal_amount FROM Goals where user_CLID = '$acctCLID'";   
$userResult = mysql_query($userSummary);

echo "<table border='1'>
<tr>
<th>type</th>
<th>category #</th>
<th>goal amount</th>

</tr>";

while($row = mysql_fetch_assoc($userResult))
  {
  echo "<tr>";
  echo "<td>" . $row['inst_category'] . "</td>";
  echo "<td>" . $row['inst_subcategory'] . "</td>";
    echo "<td>" . $row['goal_amount'] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?>


</html>
</head>
