
<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>
<html>
<head>
<table width="300" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
<tr>
<form name="form1" method="post" action="check.php">
<td>
<table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
<tr>
<td colspan="3"><strong>Member Login </strong></td>
</tr>
<tr>
<td width="78">CLID</td>
<td width="6">:</td>
<td width="294"><input name="CLID" type="text" id="CLID"></td>
</tr>
<tr>
<td>Password</td>
<td>:</td>
<td><input name="user_password" type="text" id="user_password">
</td>
</tr>
<tr>
<td>&nbsp;</td>
<form action="check.php">
<td><input type="submit" name="Submit" value="Login" method = "POST"></td>
</form>

<form action="add_user.php">
<td><input type="submit" name="Submit" value="Create Account"></td>
</form>


</tr>
</table>
</td>

</tr>
</table>

</html>
</head>
