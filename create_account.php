<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>



<html><head><title>Account Update Screen</title></head><body>

<?php

$host="localhost";
$user="root";
$password="root";
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

echo "form variables <br>";
echo "host: $host <br>";
echo "user: $user <br>";
echo "password: $password <br>";
echo "database: $database <br>";
echo "table name: $table_name <br>";
echo "clid: $acctCLID <br>";
echo "user password: $userpassword <br>";
echo "check acct: $checkAcctNo <br>";
echo "sav acct: $savAcctNo <br>";
echo "check amt:$ $checkAmt <br>";
echo "sav amt: $ $savAmt <br>";


//////Connect to the database
$connect = mysql_connect($host,$user,$password);
if (!$connect) {die("Could not connect: " . mysql_errori());}

////// Select the database
mysql_select_db($database, $connect) or die("Unable to select database <br>");

echo "database : $database selected <br>";
echo "connect = $connect <br>";
/////////////////////////////////////////


//check for unique CLID, checking account number, savings account no//////
/*
$checkID = "SELECT * from $table_name where CLID = '$acctCLID')";
echo "check id : $checkID <br>";
$result = mysql_query($checkID);

*/

////// insert data to database //////////

//sql string to insert
$sql = "INSERT INTO UserAccount (CLID, fname, lname, user_password, checking, balance, savings,sbalance )
 	VALUES ('$acctCLID','$fname','$lname','$userpassword','$checkAcctNo', '$checkAmt','$savAcctNo','$savAmt' )"; 

//query database
mysql_query( $sql );

echo "Entered data successfully <br>";

mysqli_close($connect);
echo "<br>";
echo "TODO : move to userAccountSummary.php and carry over CLID variable somehow<br>";
echo "TODO : errorr : checking/saving account number too long<br>";
echo "TODO : error : clid/checking acct/saving acct already exists<br>";

/////////redirect to user summary////////////////

session_start();

$_SESSION['CLID'] = $acctCLID;
$_SESSION['user_password'] = $userpassword;

header("location:user_summary.php");

///////////////////////////////////////////////////
?>
</body></html>
