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

$add_name = $_POST['add_name'];
$add_cat= $_POST['add_cat'];
$add_subcat= $_POST['add_subcat'];

$del_name = $_POST['del_name'];

$change_name = $_POST['change_name'];
$change_cat = $_POST['change_cat'];
$change_subcat = $_POST['change_subcat'];


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
<?php

?>
</form>
<!--  change business -->

<form method="post" action="businesses.php" >
<td><input type="submit" name="loadbtn" value="change business" /></td>
<td> name <input type="text" name = "change_name" /></td>

<td> category <input type="text" name = "change_cat" /></td>
<td> subcategory <input type="text" name = "change_subcat" /></td>


</tr>
</form>
<?php
$userSummary = "update Institution 
	set cat_category = '$change_cat', cat_subcategory = '$change_subcat' 
	where name = '$change_name'"; 
   
$userResult = mysql_query($userSummary);

/////////////////////display table////////


$userSummary = "SELECT name, cat_category, cat_subcategory FROM Institution order by name ASC ";   
$userResult = mysql_query($userSummary);

echo "<table border='1'>
<tr>
<th>business name</th>
<th>category </th>
<th>subcategory </th>
<th># of users</th>
</tr>";

while($row = mysql_fetch_assoc($userResult))
  {
  echo "<tr>";
  echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['cat_category'] . "</td>";
  echo "<td>" . $row['cat_subcategory'] . "</td>";
  echo "<td>" . $row[''] . "</td>";
  echo "</tr>";
  }
echo "</table>";

?>


</html>
</head>
