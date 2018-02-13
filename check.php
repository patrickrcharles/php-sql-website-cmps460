<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>
<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="root"; // Mysql password 
$db_name="website"; // Database name 
$tbl_name="UserAccount"; // Table name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['CLID']; 
$mypassword=$_POST['user_password']; 

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);
$sql="SELECT * FROM UserAccount WHERE CLID ='$myusername' and user_password='$mypassword'";
$result=mysql_query($sql);


$count = mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1)
{

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_start();
$_SESSION['CLID'] = $myusername;
$_SESSION['user_password'] = $mypassword;

header("location:login_success.php");
}
else {
echo "Wrong Username or Password<br>";
echo "go back to login screen";
?>
<!--  go to user_summary.php for this user -->
<form method="post" action="home.php" >
<td><input type="submit" name="loadbtn" value="home page" /></td>
</tr>
</form>
<?php


$result = mysql_query("select  balance from UserAccount where CLID = '$add_CLID';");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}

$row = mysql_fetch_row($result);
$current_check_balance = $row[0];

$result = mysql_query("select sbalance from UserAccount where CLID = '$add_CLID';");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);
$current_sav_balance = $row[0];

}
?>
