<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>


<?php
include('login.php'); // Include Login Script

if ((isset($_SESSION['CLID']) != '')) 
{
header('Location: home.php');
}
?>
 
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PHP Login Form with Session</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
 
<body>
<h1>PHP Login Form with Session</h1>
<div class="loginBox">
<h3>Login Form</h3>
<form method="post" action="">
<label>CLID:</label><br>
<input type="text" name="CLID" placeholder="CLID" /><br><br>
<label>Password:</label><br>
<input type="text" name="user_password" placeholder="password" />  <br><br>
<input type="submit" value="Login" /> 
<input type="submit" value="Create account" /> 
</form>
<div class="error"><?php echo $error;?></div>
</div>
</body>
</html>
