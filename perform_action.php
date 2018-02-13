<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>
<?php
session_start();
if (!isset($_SESSION['CLID'] ) ) //not logged in
{
echo "you need to login <BR>";
header("location:login.php");
exit();
}

$acctCLID = $_SESSION['CLID'] ;
$add_CLID = $_SESSION['add_CLID'] ;

echo "Welcome $acctCLID <br>";
?>


<?php
$host="localhost";
$user="root";
$password="student";
$database="website";
$table_name="UserAccount";

$add_amount = $_POST['add_amount'];
$add_category = $_POST['add_category'];
$add_date = $_POST['add_date'];
$add_check_no = $_POST['add_check_no'];
$add_business = $_POST['add_business'];

$del_amount = $_POST['del_amount'];
$del_category = $_POST['del_category'];
$del_date = $_POST['del_date'];
$del_business = $_POST['del_business'];

$delete = $_POST['delete']; //clid from 'delete user' in admin screen
$load = $_POST['load']; //clid from 'load user' in admin screen

echo "acctCLID : $acctCLID<br>";
if ($acctCLID = 'admin' or 'ADMIN') //if admin logged in, send 'load user' to query
{ $acctCLID = $delete;}

if (empty($acctCLID))
{ $acctCLID = $load;}

if (empty($load))
{ $acctCLID =  $_SESSION['add_CLID'] ;}

echo "acctCLID : $acctCLID<br>";

//test vars
echo "load : $load<br>";
echo "acctCLID : $acctCLID<br>";
echo "delete : $delete<br>";


echo "amt : $add_amount<br>";
echo "cat : $add_category<br>";
echo "date : $add_date<br>";
echo "add clid : $add_CLID<br>";


echo "amt : $del_amount<br>";
echo "cat : $del_category<br>";
echo "date : $del_date<br>";



//////Connect to the database
$connect = mysql_connect($host,$user,$password);
if (!$connect) {die("Could not connect: " . mysql_errori());}

////// Select the database
mysql_select_db($database, $connect) or die("Unable to select database <br>");

echo "database : $database selected <br>";
echo "connect = $connect <br>";
/////////////////////////////////////////

//////////////////add income transaction//////////////

///get current check / save balances

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

// insert transactions

$sql = "insert into Transaction (user_CLID, amount, inst_name, inst_category,check_num, transaction_date)
values ('$add_CLID','$add_amount','$add_business','income','$add_check_no','$add_date')";
mysql_query( $sql );

/////updates balances

echo "$current_check_balance<br>";
echo "$current_sav_balance<br>";

if($add_category = 'income' or 'INCOME' and $add_check_no > 0)
{ $current_check_balance += $add_amount;}

if($add_category = 'income' or 'INCOME')
{ $current_check_balance += $add_amount;}

echo "$current_check_balance<br>";
echo "$current_sav_balance<br>";

$update = "UPDATE UserAccount 
	set balance = $current_check_balance
	where CLID = '$add_CLID'";
mysql_query( $update );

$_SESSION['add_CLID'] = $acctCLID;
header("location:user_summary.php");

//************************************************************************
//////////////////add expense transaction/////////////////

///get current check / save balances

$result = mysql_query("select balance from UserAccount where CLID = '$add_CLID';");
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

///insert expenses

//check for insufficient funds
if ( $del_amount > $current_check_balance)
{ echo "check rejected: insufficient funds";
$_SESSION['add_CLID'] = $acctCLID;
header("location:user_summary.php");
} 

// add expense
$sql = "insert into Transaction (user_CLID, amount, inst_name, inst_category,check_num, transaction_date)
values ('$add_CLID','$del_amount','$del_business','expense','$del_check_no','$del_date')";
mysql_query( $sql );

// update balance

if($add_category = 'expense' or 'EXPENSE' and $add_check_no > 0)
{$current_check_balance -= $del_amount;}

if($add_category = 'expense' or 'expense')
{ $current_check_balance -= $del_amount;}

echo "$current_check_balance<br>";
echo "$current_sav_balance<br>";

$update = "UPDATE UserAccount 
	set balance = $current_check_balance
	where CLID = '$add_CLID'";

mysql_query( $update );



//********this line makes it work DONT DELETE**************
$_SESSION['add_CLID'] = $acctCLID;
//*********************************************************
//header("location:user_summary.php");

/////////////////delete user//////////////////////////

//delete from UserAccount
$sql = "Delete from UserAccount 
	where CLID = '$delete'";
mysql_query( $sql );

//delete transactions
$sql = "Delete from Transaction 
	where user_CLID = '$delete'";
mysql_query( $sql );

//delete from goals
$sql = "Delete from GOALS 
	where user_CLID = '$delete'";
mysql_query( $sql );

////user deleted, return
echo "user deleted successfully <br>";
//header("location:admin.php");

//////////////////////////////////////////////////////

?>
