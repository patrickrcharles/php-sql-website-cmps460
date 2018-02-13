<html>
<head>
<title> 
create user screen
</title>
</head>

<h3>Financial tracking</h3>
<h3>Create new account</h3>
<br>
<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>


<form action="create_account.php" method="POST">
<table border="1" >
enter clid
<input type="text" size="5" name="acctCLID">
<br>
enter password
<input type="text" size="15" name="userpassword">
<br>
First Name
<input type="text" size="15" name="fname">
<br>
Last Name
<input type="text" size="15" name="lname">
<br>
Checking account #
<input type="text" size="10" name="checkAcctNo">
<br>
Checking
amount
<input type="text" size="10" name="checkAmt">
<br>
Saving account #
<input type="text" size="10" name="savAcctNo">
<br>
Savings amount
<input type="text" size="10" name="savAmt">

<form action="create_account.php" method="POST">
<br>
<input type="submit" value="create account">
</form>

<form action="login.php" >
<br>
<input type="submit" name="Submit" value="back to login screen">
</form>

 </table>
</form>
</body>
</html>
