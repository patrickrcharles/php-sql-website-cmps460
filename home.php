<?php
// author: Patrick Charles, Kevin Pearson, Erik Schneider, Sean Hngerford
// date :
// i certify that this code is the work of the author
?>

<?php
session_start();
if (!isset($_SESSION['CLID'] ) ) //not logged in
{
echo "you need to login";
header("location:login.php");
exit();
}
$acctCLID = $_SESSION['CLID'] ;
echo "$acctCLID";

if ($acctCLID == 'admin')
{
header("location:admin.php");
}
else
{header("location:user_summary.php");} //go user account

?>
